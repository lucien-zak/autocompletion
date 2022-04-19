<?php

$dsn="mysql:dbname=autocompletion;host=localhost:8889;port=8889";
    try{
      $connexion=new PDO($dsn,'root','root');
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }

$req = "SELECT * FROM `villes_france_free` WHERE `ville_nom` LIKE ? OR `ville_code_postal` LIKE ?  GROUP BY `ville_nom` LIMIT 5";
$stmt = $connexion->prepare($req);
$stmt->execute([$_GET['name']."%",$_GET['name']."%"]);
$resultat['exact'] = $stmt->fetchAll();
$stmt->execute(["%".$_GET['name']."%",$_GET['name']."%"]);
$resultat['contenu'] = $stmt->fetchAll();
echo json_encode($resultat);
// echo json_encode($_GET['name']) ;