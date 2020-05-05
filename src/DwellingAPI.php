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

    public function loadDwellings() : Array
    {
        curl_setopt($this->apiConnection, CURLOPT_URL, $this->apiUrl . 'properties.json');
        $output = curl_exec($this->apiConnection);
        return json_decode($output);
    }

    public function loadTypes() : Array
    {
        curl_setopt($this->apiConnection, CURLOPT_URL, $this->apiUrl . 'types.json');
        $output = curl_exec($this->apiConnection);
        return json_decode($output);
    }

    public function loadStatuses() : Array
    {
        curl_setopt($this->apiConnection, CURLOPT_URL, $this->apiUrl . 'statuses.json');
        $output = curl_exec($this->apiConnection);
        return json_decode($output);
    }
}