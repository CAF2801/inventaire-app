<?php

require_once "../data/connect.php";

global $db;
$item_data = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

    $id_item = filter_input(INPUT_POST, 'id_item', FILTER_VALIDATE_INT);
    $ab_name = $_POST['ab-name'];
    $fluo = $_POST['fluo'];

    if (!$id_item) {
        header('Location: error.php?message=donnees_invalides');
        exit;
    }
    $new_delete_query = $db -> prepare(
            'DELETE FROM antibody WHERE id = :id'
    );

    $new_delete_query -> execute([
            'id' => $id_item
    ]);

    if ($new_delete_query->rowCount() > 0) {
        header('Location: /api/message/success.php?action=modification');
    } else {
        header('Location: /api/message/success.php?action=pas_de_changement');
    }
    exit;
}

$id_a_supprimer = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id_a_supprimer) {

    $sql_select = "SELECT id, NomAnticorps, Fluorophore FROM antibody WHERE id = :id";
    $select_stmt = $db->prepare($sql_select);
    $select_stmt->execute([
            'id' => $id_a_supprimer
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
    <div id="delete-title-container">
        <h2>Supprimer un anticorps</h2>
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
                    } else {
                    echo "Impossible d'afficher le formulaire de suppression. Veuillez sélectionner un anticorps depuis la liste.";
                }

                $db = null;
                ?>
            </div>

            <?php if($item_data): ?>
                <div class='input-container'>
                    <label for="submit"></label>
                    <br>
                    <input type="submit" name="submit" id="delete-btn" value="Supprimer"/>
                </div>
            <?php endif; ?>
        </form>
    </div>
</main>

<?php

require_once "../partials/_footer.php";

?>