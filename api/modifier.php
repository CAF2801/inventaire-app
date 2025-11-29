<?php

require_once "../data/connect.php";

global $db;

$item_data = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

    $id_item = filter_input(INPUT_POST, 'id_item', FILTER_VALIDATE_INT);
    $ab_name = $_POST['ab-name'];
    $fluo = $_POST['fluo'];
    $volume_used = $_POST['volume-used'];

    if (!$id_item || !is_numeric($volume_used) || $volume_used < 0) {
        header('Location: error.php?message=donnees_invalides');
        exit;
    }

    $new_update_query = $db->prepare(
            'UPDATE antibody SET NomAnticorps = :NomAnticorps, Fluorophore = :Fluorophore, VolumeRestant = :VolumeRestant WHERE id = :id'
    );

    $new_update_query->execute([
            'NomAnticorps' => $ab_name,
            'Fluorophore' => $fluo,
            'VolumeRestant' => $volume_used,
            'id' => $id_item
    ]);

    if ($new_update_query->rowCount() > 0) {
        header('Location: /api/message/success.php?action=modification');
    } else {
        header('Location: /api/message/success.php?action=pas_de_changement');
    }
    exit;
}

$id_a_modifier = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id_a_modifier) {

    $select_query = "SELECT id, NomAnticorps, Fluorophore, VolumeRestant FROM antibody WHERE id = :id";
    $select_stmt = $db->prepare($select_query);
    $select_stmt->execute([
            ':id' => $id_a_modifier
    ]);
    $item_data = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item_data) {
        header('Location: error.php?message=id_non_trouve');
        exit;
    }
} else {

    $item_data = false;

}

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
                if ($item_data) {
                    echo '<input type="hidden" name="id_item" value="' . htmlspecialchars($item_data['id']) . '">';

                    echo "<div class='input-container'>";
                    echo "<label for='ab-name'>Nom de l'anticorps</label>";
                    echo "<br>";
                    echo '<input class="text-input" type="text" name="ab-name" id="ab-name" required value="' . htmlspecialchars($item_data['NomAnticorps']) . '"/>';
                    echo "</div>";

                    echo "<div class='input-container'>";
                    echo "<label for='fluo'>Fluorophore</label>";
                    echo "<br>";
                    echo '<input class="text-input" type="text" name="fluo" id="fluo" required value="' . htmlspecialchars($item_data['Fluorophore']) . '"/>';
                    echo "</div>";

                    echo "<div class='input-container'>";
                    echo '<label for="volume-used">Volume restant (uL) - Actuel : ' . htmlspecialchars($item_data['VolumeRestant']) . ' uL</label>';
                    echo '<br>';

                    echo '<input class="text-input" type="text" name="volume-used" id="volume-used" required value="' . htmlspecialchars($item_data['VolumeRestant']) . '"/>';
                    echo "</div>";
                } else {
                    echo "Impossible d'afficher le formulaire de modification. Veuillez sélectionner un anticorps depuis la liste.";
                }

                $db = null;

                ?>
            </div>

            <?php if ($item_data): ?>
                <div class='input-container'>
                    <label for="submit"></label>
                    <br>
                    <input type="submit" name="submit" id="modify-btn" value="Enregistrer les modifications"/>
                </div>
            <?php endif; ?>
        </form>
    </div>
</main>

<?php

    require_once "../partials/_footer.php";

?>