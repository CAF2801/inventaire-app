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
            <h3><a href="./index.php">Inventaire-App</a></h3>
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
    <main>
        <section>
            <img src="https://placehold.co/600x400" alt="Image d'un anticorps">
        </section>
        <div>
            <h2>Bienvenue sur Inventaire-App</h2>
        </div>
        <div>
            <button><a href="./api/liste.php">Allez vers votre inventaire -></a></button>
        </div>
    </main>

    <?php

    require_once "./partials/_footer.php";

    ?>