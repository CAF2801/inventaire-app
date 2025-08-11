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
                <label for="ab_name">Nom de l'anticorps</label>
                <br>
                <input type="text" name="ab_name" id="ab_name" placeholder="Nom de l'anticorps" required/>
            </div>
            <div>
                <label for="fluo">Fluorophore</label>
                <br>
                <input type="text" name="fluo" id="fluo" placeholder="Fluorophore" required/>
            </div>
            <div>
                <label for="catalogue"># de Catalogue</label>
                <br>
                <input type="text" name="catalogue" id="catalogue" placeholder="# de Catalogue" required/>
            </div>
            <div>
                <label for="fournisseur">Nom du Fournisseur</label>
                <br>
                <input type="text" name="fournisseur" id="fournisseur" placeholder="Nom du Fournisseur" required/>
            </div>
            <div>
                <label for="volume">Volume initial (uL)</label>
                <br>
                <input type="text" name="volume" id="volume" placeholder="Volume initial" required/>
            </div>
            <div>
                <label for="restant">Volume restant (uL)</label>
                <br>
                <input type="text" name="restant" id="restant" placeholder="Volume initial" required/>
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