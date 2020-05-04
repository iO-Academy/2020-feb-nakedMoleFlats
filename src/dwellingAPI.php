<?php

Class DwellingAPI 
{
    private $apiUrl;

    private $apiConnection;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $apiConnection = curl_init();
        curl_setopt($apiConnection, CURLOPT_RETURNTRANSFER, 1);
    }

    public function loadDwellings(): Object 
    {
        curl_setopt($apiConnection, CURLOPT_URL, $apiUrl . 'properties.json');
        $output = curl_exec($apiConnection);
        return json_decode($output);
    }
}