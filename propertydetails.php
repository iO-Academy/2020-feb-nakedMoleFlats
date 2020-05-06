
<?php
require_once ('vendor/autoload.php');
use \NMF\DisplayDwellings;
use \NMF\DwellingHydrator;

$hydrator = new DwellingHydrator(new PDO('mysql:host=db; dbname=NakedMoleFlats', 'root', 'password'));
// to be deleted
var_dump($hydrator->loadSingleDwelling());
// echo DisplayDwellings::displaySingleDwellings($hydrator->loadAllDwellings());
?>