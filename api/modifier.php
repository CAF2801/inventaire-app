<?php

require_once "../data/connect.php";

global $db;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $ab_name = $_POST['ab-name'];
    $fluo = $_POST['fluo'];
    $volume_used = $_POST['volume-used'];


    $new_update_query = $db->prepare('UPDATE antibody SET VolumeRestant = :VolumeRestant WHERE NomAnticorps = :NomAnticorps AND Fluorophore = :Fluorophore');
    $new_update_query->execute([
        'NomAnticorps' => $ab_name,
        'Fluorophore' => $fluo,
        'VolumeRestant' => $volume_used]);

    header('Location: success.php');
    exit;
}

$sql_select = "SELECT NomAnticorps, Fluorophore FROM antibody";

$select_result = $db->query($sql_select);

$rows = $select_result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaire-app</title>
    <style>
        h1 {
            display: none;
        }
    </style>
</head>
<body>
<h1>Inventaire-App</h1>
<header>
    <div>
        <h3><a href="../index.php">Inventaire-App</a></h3>
    </div>
    <nav>
        <ul>
            <li>
                <a href="./liste.php">Liste d'anticorps</a>
            </li>
            <li>
                <a href="./ajouter.php">Ajouter un anticorps</a>
            </li>
            <li>
                <a href="./modifier.php">Modifier un anticorps</a>
            </li>
            <li>
                <a href="./supprimer.php">Supprimer un anticorps</a>
            </li>
        </ul>
    </nav>
</header>
<main>
    <div>
        <h2>Modifier un anticorps</h2>
    </div>
    <div>
        <form action="#" method="post">
            <div>
                <?php

                if ($select_result === FALSE) {
                    echo "Erreur de la requête SQL : " . $db->error;
                } elseif (count($rows) > 0) {
                    echo "<label for='ab-name'>Nom de l'anticorps</label>";
                    echo "<br>";
                    echo "<select name='ab-name' id='ab-name' required>";


                    foreach ($rows as $row) {
                        $value = htmlspecialchars($row['NomAnticorps']);
                        echo "<option value=\"$value\">$value</option>";
                    }

                    echo '</select><br><br>';
                    echo "<label for='fluo'>Fluorophore</label>";
                    echo "<br>";
                    echo "<select name='fluo' id='fluo' required>";

                    foreach ($rows as $row) {
                        $value_fluo = htmlspecialchars($row['Fluorophore']);
                        echo "<option value=\"$value_fluo\">$value_fluo</option>";
                    }

                    echo '</select><br><br>';
                    echo '<label for="volume-used">Volume restant (uL)</label>';
                    echo '<br>';
                    echo '<input type="text" name="volume-used" id="volume-used" placeholder="Volume restant" required/>';
                } else {
                    echo "Aucun anticorps trouvé dans la table";
                }

                $db = null;
                ?>
            </div>
            <div>
                <label for="submit"></label>
                <br>
                <input type="submit" name="submit" id="submit"/>
            </div>
        </form>
    </div>
</main>
<?php

require_once "../partials/_footer.php";
?>