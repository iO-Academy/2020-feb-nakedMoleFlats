<?php

require_once 'vendor/autoload.php';

use NMF\DwellingAPI;
use NMF\DwellingHydrator;
use NMF\DwellingImporter;

$db = new PDO('mysql:host=db; dbname=NakedMoleFlats', 'root', 'password');
$api = new DwellingAPI('https://dev.maydenacademy.co.uk/resources/property-feed/');
$importer = new DwellingImporter($db, $api);
$hydrator = new DwellingHydrator($db);

$importer->refreshDB();