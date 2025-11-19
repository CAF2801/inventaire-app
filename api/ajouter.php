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
    header('Location: /api/message/error.php?message=volume_invalide');
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

    header('Location: /api/message/success.php');
    exit;
}

require_once "../partials/_header.php";

?>



<main class="api">
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

<?php

    require_once "../partials/_footer.php";

?>