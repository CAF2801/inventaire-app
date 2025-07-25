<?php

require_once "../connect.php";

global $db;

$sql = "SELECT id, NomAnticorps, Fluorophore, NuméroCatalogue, Fournisseur, VolumeInitial, VolumeRestant FROM antibody";

$result = $db->query($sql);

$rows = $result->fetchAll(PDO::FETCH_ASSOC);
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
        <h2>Liste d'anticorps</h2>
        <button><a href="./ajouter.php">Ajouter un anticorps</a></button>
    </div>
    <?php

    if ($result === FALSE) {
        echo "Erreur de la requête SQL : " . $db->error;
    } elseif (count($rows) > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nom Ac</th>";
        echo "<th>Fluorophore</th>";
        echo "<th>#Catalogue</th>";
        echo "<th>Fournisseur</th>";
        echo "<th>Volume Initial</th>";
        echo "<th>Volume restant</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";



        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['NomAnticorps']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Fluorophore']) . "</td>";
            echo "<td>" . htmlspecialchars($row['NuméroCatalogue']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Fournisseur']) . "</td>";
            echo "<td>" . htmlspecialchars($row['VolumeInitial']) . "</td>";
            echo "<td>" . htmlspecialchars($row['VolumeRestant']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

    } else {
        echo "Aucun anticorps trouvé dans la table";
    }

    $db = null;
   ?>
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