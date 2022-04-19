<?php

if (empty($_GET['id'])) {
    $_GET['id'] = 'aucunresultat';
}

$dsn = "mysql:dbname=autocompletion;host=localhost:8889;port=8889";
try {
    $connexion = new PDO($dsn, 'root', 'root');
} catch (PDOException $e) {
    printf("Échec de la connexion : %s\n", $e->getMessage());
    exit();
}

$req = "SELECT * FROM `villes_france_free` WHERE `ville_id` = ? GROUP BY `ville_nom`";
$stmt = $connexion->prepare($req);
$stmt->execute([$_GET['id']]);
$resultat = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon - Recherche</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="app.js"></script>
    <script src="map.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>Annuaire des villes françaises</li>
                <li><a href="index.php">Acceuil</a></li>
            </ul>
            <div id="searchbar">
                <form action="recherche.php" method="get">
                    <input name="ville" autocomplete="off" placeholder="Votre Recherche..." type="search" id="search">
                </form>
                <div id="collection" class="collection"></div>
                <div id="collection2" class="collection"></div>
            </div>

        </nav>
    </header>
    <main>
        <div class="fiche">
        <h1><?= $resultat['ville_nom_reel'] . ' - ' . $resultat['ville_nom_metaphone'] ?></h1>
        <ul>
            <li>Code Postal : <?= $resultat['ville_code_postal'] ?></li>
            <li>Population 2012 : <?= $resultat['ville_population_2012'] ?> habitants</li>
            <li>Densité population : <?= $resultat['ville_densite_2010'] ?> habitants/km2</li>
            <li></li>
        </ul>
        <div class="info">
            <iframe id="widget_autocomplete_preview" width="150" height="100%" frameborder="0" src="https://meteofrance.com/widget/prevision/<?= $resultat['ville_code_commune'] . "0" ?>"> </iframe>
            <div id="map"></div>
        </div>
        
        </div>
    </main>
    <footer>
        <p>© Copyright - Tous droits réservés</p>
    </footer>

</body>

</html>
<template id="longitude"><?= $resultat["ville_longitude_deg"] ?></template>
<template id="latitude"><?= $resultat["ville_latitude_deg"] ?></template>