<?php

try {

    $db = new PDO('sqlite:data/db.sqlite');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à SQLite!";

} catch (PDOException $e) {

    echo "Erreur de connexion : " . $e->getMessage();

}