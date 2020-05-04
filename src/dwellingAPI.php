<?php

Class DwellingAPI 
{
    private $apiUrl;

    private $apiConnection;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->apiConnection = curl_init();
        curl_setopt($this->apiConnection, CURLOPT_RETURNTRANSFER, 1);
    }
    
    public function __destruct()
    {
        curl_close($this->apiConnection);
    }

    public function loadDwellings(): Object 
    {
        curl_setopt($this->apiConnection, CURLOPT_URL, $this->apiUrl . 'properties.json');
        $output = curl_exec($this->apiConnection);
        return json_decode($output);
    }

    
}