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
            header('Location: success.php');
        } else {
            header('Location: error.php?message=update_echec');
        }
    } else {
        header('Location: error.php?message=association_incorrecte');
    }
    exit;

}

$sql_select = "SELECT NomAnticorps, Fluorophore FROM antibody";
$select_stmt = $db->prepare($sql_select);
$select_stmt->execute();
$rows = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaire-app</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style/style.css" media="screen">
</head>
<body>
<h1>Inventaire-App</h1>
<header>
    <div id="main-title">
        <h2><a href="../index.php">Inventaire-App</a></h2>
    </div>
    <img id="hamburger" src="../assets/img/hamburger-md-svgrepo-com.png" alt="hamburger-menu">
    <nav id="menu">
        <ul>
            <li>
                <a href="../api/liste.php">Liste</a>
            </li>
            <li>
                <a href="../api/ajouter.php">Ajouter</a>
            </li>
            <li>
                <a href="../api/modifier.php">Modifier</a>
            </li>
            <li>
                <a href="../api/supprimer.php">Supprimer</a>
            </li>
        </ul>
    </nav>
</header>
<main>
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
<footer>
    <div id="foot">
        <p class="foot-item">copyright CAF @ 2025</p>
        <p class="foot-item">Mon github</p>
        <a href="https://github.com/CAF2801"><img class="foot-item" src="../assets/img/github-svgrepo-com.svg" alt="github"></a>
    </div>
</footer>
<script src="../assets/js/main-api.js"></script>
</body>
</html>