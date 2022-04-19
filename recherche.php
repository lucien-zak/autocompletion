<?php

if (empty($_GET['ville'])){
    $_GET['ville'] = 'aucunresultat';
}

$dsn="mysql:dbname=autocompletion;host=localhost:8889;port=8889";
    try{
      $connexion=new PDO($dsn,'root','root');
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }

$req = "SELECT * FROM `villes_france_free` WHERE `ville_nom` LIKE ? GROUP BY `ville_nom`";
$stmt = $connexion->prepare($req);
$stmt->execute([$_GET['ville']."%"]);
$resultat = $stmt->fetchAll();
// var_dump(count($resultat));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon - Recherche</title>
    <script src="app.js"></script>
    <script src="pagination.js"></script>
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
        <section>
            <h3><?= count($resultat) > 1 ? count($resultat)." résultats" : count($resultat)." résultat" ?></h3>
        <?php
            foreach ($resultat as $key => $value) {
                echo '
                <a href="element.php?id='.$value['ville_id'].'"><div class="ville invisible">
                    <h2>'.$value['ville_nom'].' - '.$value['ville_departement'].'</h2>
                    <p>'.$value['ville_population_2012'].' habitants</p>
                    <p>'.$value['ville_surface'].' km²</p>
                </div></a>
                ';
            }
        ?>
        <button class="suiv">Lire la suite... <span><?= count($resultat)?></span> résultats restants</button>
        </section>
        
    </main>
    <footer>
        <p>© Copyright - Tous droits réservés</p>
    </footer>
</body>
</html>