<?php

    require_once "../data/connect.php";

    global $db;

    $select_query = "SELECT id, NomAnticorps, Fluorophore, NuméroCatalogue, Fournisseur, VolumeInitial, VolumeRestant FROM antibody";
    $select_stmt = $db->prepare($select_query);
    $select_stmt->execute();
    $rows = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once "../partials/_header.php";

?>


<main class="api">
    <div id="list-title-container">
        <h2>Liste d'anticorps</h2>
        <a href="./ajouter.php">Ajouter un anticorps</a>
    </div>
    <div id="ab-table">
    <?php
    global $rows;
    if ($rows === FALSE) {
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
            echo "<td class='cell'>
                    <a href=\"./modifier.php?id=" . htmlspecialchars($row['id']) . "\" class='btn'>Modifier</a>
                    <a href=\"./supprimer.php?id=" . htmlspecialchars($row['id']) . "\" class='btn'>Supprimer</a>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

    } else {
        echo "Aucun anticorps trouvé dans la table";
    }
    $rows = null;
    $db = null;
   ?>
    </div>
</main>

<?php
    require_once "../partials/_footer.php";
?>

