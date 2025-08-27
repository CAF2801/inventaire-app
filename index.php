<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaire-app</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon-32x32.png">
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
        <img id="hamburger" src="./assets/img/hamburger-md-svgrepo-com.png" alt="hamburger-menu">
        <nav id="menu">
            <ul>
                <li>
                    <a href="./api/liste.php">Liste</a>
                </li>
                <li>
                    <a href="./api/ajouter.php">Ajouter</a>
                </li>
                <li>
                    <a href="./api/modifier.php">Modifier</a>
                </li>
                <li>
                    <a href="./api/supprimer.php">Supprimer</a>
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
    <footer>
        <div id="foot">
            <p class="foot-item">copyright CAF @ 2025</p>
            <p class="foot-item">Mon github</p>
            <a href="https://github.com/CAF2801"><img class="foot-item" src="./assets/img/github-svgrepo-com.svg" alt="github"></a>
        </div>
    </footer>
    <script src="./assets/js/main.js"></script>
</body>
</html>