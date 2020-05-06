<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Naked Mole Flats</title>
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/styles.css" type="text/css">
    <script src="https://kit.fontawesome.com/c90803ff49.js" crossorigin="anonymous"></script>
  </head>
  <body id="top">
    <?php
        require_once 'vendor/autoload.php';
        
        // Load the information for this property from the database, and place it into a dwelling object
        $hydrator = new NMF\DwellingHydrator(new PDO('mysql:host=db; dbname=NakedMoleFlats', 'root', 'password'));
        $dwelling = $hydrator->loadSingleDwelling();
    ?>
    <header>
        <div class="headerContent">
            <a href="index.php"><img src="src/images/nakedMoleFlatsLogo.png" alt="Naked Mole Flats Logo"></a>
            <div class="headerText">
                <h1>NAKED MOLE FLATS</h1>
                <h2>PROPERTIES OF DISTINCTION</h2>
            </div>
        </div>
        <div class="headerBaseBar"></div>
    </header>
    <?php
        require_once('vendor/autoload.php');

        use NMF\DisplayDwellings;
        use NMF\DwellingHydrator;
        $hydrator = new DwellingHydrator(new PDO('mysql:host=db; dbname=NakedMoleFlats', 'root', 'password'));
        echo DisplayDwellings::displayDwelling($hydrator->loadSingleDwelling());
    ?>
    <footer>
        <div class="footerText">©Copyright Naked Mole Rats 2020</div>
        <div class="toTop">
            <?php //classes on this element are for the fontawesome icon font ?>
            <a href="#top"><i class="fas fa-angle-double-up"></i></a>
        </div>
    </footer>
  </body>