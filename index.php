<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaire-app</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style/style.css" media="screen">
</head>
<body>
    <h1>Inventaire-App</h1>
    <header>
        <div id="main-title">
            <h2><a href="./index.php">Inventaire-App</a></h2>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="./api/liste.php">Liste d'anticorps</a>
                </li>
                <li>
                    <a href="./api/ajouter.php">Ajouter un anticorps</a>
                </li>
                <li>
                    <a href="./api/modifier.php">Modifier un anticorps</a>
                </li>
                <li>
                    <a href="./api/supprimer.php">Supprimer un anticorps</a>
                </li>
            </ul>
        </nav>
    </header>
    <main id="index-main">
        <section>
            <div id="hero-banner">
                <img src="./assets/img/antibody_image_chatgpt.png" alt="Image d'un anticorps" id="ab-image">
            </div>
            <div id="welcome">
                <h3>Bienvenue sur Inventaire-App</h3>
            </div>
            <div id="inventory-button">
                <a href="./api/liste.php">Allez vers votre inventaire</a>
            </div>
        </section>

    </main>

    <?php

    require_once "./partials/_footer.php";

    ?>