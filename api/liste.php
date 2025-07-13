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
        <h2>Liste d'anticorps</h2>
        <button><a href="./ajouter.php">Ajouter un anticorps</a></button>
    </div>
   <table>
       <thead>
           <tr>
               <th>Nom Ac</th>
               <th>Fluorophore</th>
               <th>#Catalogue</th>
               <th>Fournisseur</th>
               <th>Volume Initiale</th>
               <th>% Restant</th>
               <th>Stock</th>
           </tr>
       </thead>
       <tbody>
        <tr>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
        </tr>
       </tbody>
   </table>
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