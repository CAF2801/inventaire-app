<?php

require_once "../data/connect.php";

global $db;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $ab_name = $_POST['ab-name'];
    $fluo = $_POST['fluo'];
    $volume_used = $_POST['volume-used'];

    if (!is_numeric($volume_used) || $volume_used < 0) {
        header('Location: error.php?message=volume_invalide');
        exit;
    }

    $check_query = $db->prepare("SELECT NomAnticorps, Fluorophore FROM antibody WHERE NomAnticorps = :NomAnticorps AND Fluorophore = :Fluorophore");
    $check_query->execute([
            'NomAnticorps' => $ab_name,
            'Fluorophore' => $fluo
    ]);

    $result = $check_query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $new_update_query = $db->prepare('UPDATE antibody SET VolumeRestant = :VolumeRestant WHERE NomAnticorps = :NomAnticorps AND Fluorophore = :Fluorophore');
        $new_update_query->execute([
            'NomAnticorps' => $ab_name,
            'Fluorophore' => $fluo,
            'VolumeRestant' => $volume_used
        ]);

        if ($new_update_query->rowCount() > 0) {
            header('Location: /api/message/success.php');
        } else {
            header('Location: /api/message/error.php?message=update_echec');
        }
    } else {
        header('Location: /api/message/error.php?message=association_incorrecte');
    }
    exit;


}

    $sql_select = "SELECT NomAnticorps, Fluorophore FROM antibody";
    $select_stmt = $db->prepare($sql_select);
    $select_stmt->execute();
    $rows = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once "../partials/_header.php";

?>

<main class="api">
    <div id="modify-title-container">
        <h2>Modifier un anticorps</h2>
    </div>
    <div class="form-container">
        <form action="#" method="post">
            <div>
                <?php

                if ($select_stmt === FALSE) {
                    echo "Erreur de la requête SQL : " . $db->error;
                } elseif (count($rows) > 0) {
                    echo "<div class='input-container'>";
                    echo "<label for='ab-name'>Nom de l'anticorps</label>";
                    echo "<br>";
                    echo "<select class='select-input' name='ab-name' id='ab-name' required>";

                    foreach ($rows as $row) {
                        $value = htmlspecialchars($row['NomAnticorps']);
                        echo "<option value=\"$value\">$value</option>";
                    }

                    echo '</select><br><br>';
                    echo "</div>";
                    echo "<div class='input-container'>";
                    echo "<label for='fluo'>Fluorophore</label>";
                    echo "<br>";
                    echo "<select class='select-input' name='fluo' id='fluo' required>";

                    foreach ($rows as $row) {
                        $value_fluo = htmlspecialchars($row['Fluorophore']);
                        echo "<option value=\"$value_fluo\">$value_fluo</option>";
                    }

                    echo '</select><br><br>';
                    echo "</div>";
                    echo "<div class='input-container'>";
                    echo '<label for="volume-used">Volume restant (uL)</label>';
                    echo '<br>';
                    echo '<input class="text-input" type="text" name="volume-used" id="volume-used" placeholder="Volume restant" required/>';
                    echo "</div>";
                } else {
                    echo "Aucun anticorps trouvé dans la table";
                }

                $db = null;
                ?>
            </div>
            <div class='input-container'>
                <label for="submit"></label>
                <br>
                <input type="submit" name="submit" id="modify-btn" value="Modifier"/>
            </div>
        </form>
    </div>
</main>

<?php

    require_once "../partials/_footer.php";

?>