<?php

//Refreshes DB from the API

use NMF\DwellingAPI;
use NMF\DwellingImporter;

require_once 'vendor/autoload.php';

//Create a DwellingAPI instance with the API base URL as an argument
$api = new DwellingAPI("https://dev.maydenacademy.co.uk/resources/property-feed/");
//Create a PDO to connect to the NakedMoleFlats DB
$db = new PDO('mysql:host=db; dbname=NakedMoleFlats', 'root', 'password');
//Create an instance of DwellingImporter and pass in the DB connection and the API interface
$importer = new DwellingImporter($db, $api);
//Run the refresh DB method and print its return
echo $importer->refreshDB();