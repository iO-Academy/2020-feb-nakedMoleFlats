<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://dev.maydenacademy.co.uk/resources/property-feed/properties.json");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);

curl_close($ch);

var_dump (json_decode($output, true));