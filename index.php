<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recherche ville</title>
    <script src="app.js"></script>
</head>

<body>
    <nav>
        <ul>
            <li>Annuaire des villes françaises</li>
            <li><a href="index.php">Acceuil</a></li>
        </ul>
        <div id="searchbar">
            <form action="recherche.php" method="get">
                <input name="ville" placeholder="Votre Recherche..." type="text" autocomplete="off" id="search">
            </form>
            <div id="collection" class="collection"></div>
            <div id="collection2" class="collection"></div>
        </div>

    </nav>
    <main>

    </main>
    <footer>
        <p>© Copyright - Tous droits réservés</p>
    </footer>

</body>

</html>