<?php

require_once "../data/connect.php";

/* Variables */

global $db;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $ab_name = $_POST['ab_name'];
    $fluo = $_POST['fluo'];
    $catalogue = $_POST['catalogue'];
    $fournisseur = $_POST['fournisseur'];
    $volume = $_POST['volume'];
    $restant = $_POST['restant'];

if (!is_numeric($volume) || $volume < 0) {
    header('Location: error.php?message=volume_invalide');
    exit;
}
    $newAbQuery = $db->prepare('INSERT INTO antibody (NomAnticorps, Fluorophore, NuméroCatalogue, Fournisseur, VolumeInitial, VolumeRestant) VALUES (:NomAnticorps, :Fluorophore, :NuméroCatalogue, :Fournisseur, :VolumeInitial, :VolumeRestant)');
    $newAbQuery->execute([
            'NomAnticorps' => $ab_name,
            'Fluorophore' => $fluo,
            'NuméroCatalogue' => $catalogue,
            'Fournisseur' => $fournisseur,
            'VolumeInitial' => $volume,
            'VolumeRestant' => $restant]);

    header('Location: success.php');
    exit;
}

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
    <div id="add-title-container">
        <h2>Ajouter un anticorps</h2>
    </div>
    <div class="form-container">
        <form action="#" method="post">
            <div class="input-container">
                <label for="ab_name">Nom de l'anticorps</label>
                <br>
                <input class="text-input" type="text" name="ab_name" id="ab_name" placeholder="Nom de l'anticorps" required/>
            </div>
            <div class="input-container">
                <label for="fluo">Fluorophore</label>
                <br>
                <input class="text-input" type="text" name="fluo" id="fluo" placeholder="Fluorophore" required/>
            </div>
            <div class="input-container">
                <label for="catalogue"># de Catalogue</label>
                <br>
                <input class="text-input" type="text" name="catalogue" id="catalogue" placeholder="# de Catalogue" required/>
            </div>
            <div class="input-container">
                <label for="fournisseur">Nom du Fournisseur</label>
                <br>
                <input class="text-input" type="text" name="fournisseur" id="fournisseur" placeholder="Nom du Fournisseur" required/>
            </div>
            <div class="input-container">
                <label for="volume">Volume initial (uL)</label>
                <br>
                <input class="text-input" type="text" name="volume" id="volume" placeholder="Volume initial" required/>
            </div>
            <div class="input-container">
                <label for="restant">Volume restant (uL)</label>
                <br>
                <input class="text-input" type="text" name="restant" id="restant" placeholder="Volume initial" required/>
            </div>
            <div class="input-container">
                <label for="submit"></label>
                <br>
                <input type="submit" name="submit" id="add-btn" value="Ajouter"/>
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