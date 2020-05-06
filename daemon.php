<?php

use NMF\DwellingAPI;
use NMF\DwellingImporter;

require_once 'vendor/autoload.php';

$api = new DwellingAPI("https://dev.maydenacademy.co.uk/resources/property-feed/");

$db = new PDO('mysql:host=db; dbname=NakedMoleFlats', 'root', 'password');

$importer = new DwellingImporter($db, $api);

$importer->refreshDB();