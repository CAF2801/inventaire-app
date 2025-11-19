<?php

require_once "../data/connect.php";

global $db;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $ab_name = $_POST['ab-name'];
    $fluo = $_POST['fluo'];

    $check_query = $db->prepare("SELECT NomAnticorps, Fluorophore FROM antibody WHERE NomAnticorps = :NomAnticorps AND Fluorophore = :Fluorophore");
    $check_query->execute([
        'NomAnticorps' => $ab_name,
        'Fluorophore' => $fluo
    ]);

    $result = $check_query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $new_delete_query = $db->prepare('DELETE FROM antibody  WHERE NomAnticorps = :NomAnticorps AND Fluorophore = :Fluorophore');
        $new_delete_query->execute([
            'NomAnticorps' => $ab_name,
            'Fluorophore' => $fluo
        ]);

        if ($new_delete_query->rowCount() > 0) {
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
    <div id="delete-title-container">
        <h2>Supprimer un anticorps</h2>
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
                    echo "<br>";
                } else {
                    echo "Aucun anticorps trouvé dans la table";
                }

                $db = null;
                ?>
            </div>
            <div class='input-container'>
                <label for="submit"></label>
                <br>
                <input type="submit" name="submit" id="delete-btn" value="Supprimer"/>
            </div>
        </form>
    </div>
</main>

<?php

require_once "../partials/_footer.php";

?>