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
                <label for="ab-name">Nom de l'anticorps</label>
                <br>
                <select name="ab-name" id="ab-name" required>
                    <option value="test">test</option>
                </select>
            </div>
            <div>
                <label for="volume">Volume utilisé (uL)</label>
                <br>
                <input type="text" name="volume" id="volume" placeholder="Volume utilisé" required/>
            </div>
            <div>
                <label for="submit"></label>
                <br>
                <input type="submit" name="submit" id="submit"/>
            </div>
        </form>
    </div>
</main>
<footer>
    <div>
        copyright CAF @ 2025
    </div>
    <div>
        Mon github
        <div>
            <img src="#" alt="github">
        </div>
    </div>
</footer>
</body>
</html>