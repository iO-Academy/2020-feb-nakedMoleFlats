<?php

namespace NMF;

class DwellingAPI 
{
    private $apiUrl;
    private $apiConnection;
    /**
     * On construction, value of apiUrl is initialised and the curl connection
     * is set up
     * @param string $apiUrl the base URL of the API. Must include a trailing / for remaining
     *               functions to work
     * 
     * Property API URL as of Tue 5th May: https://dev.maydenacademy.co.uk/resources/property-feed/
     */
    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->apiConnection = curl_init();
        curl_setopt($this->apiConnection, CURLOPT_RETURNTRANSFER, 1);
    }
    /**
     * Close the connection to the API on object destruction
     */
    public function __destruct()
    {
        curl_close($this->apiConnection);
    }
    /**
     * Checks whether the API is currently available
     */
    public function checkIsUp(): boolean
    {
        $retcode = curl_getinfo($apiConnection, CURLINFO_HTTP_CODE);

        if ($retcode < 300) {
            return false;
        }
        return true;
    }
    /**
     * Load the dwellings in from the API
     * 
     * @return Array an indexed array of objects. Each object represents a dwelling
     */
    public function loadDwellings() : Array
    {
        curl_setopt($this->apiConnection, CURLOPT_URL, $this->apiUrl . 'properties.json');
        $output = curl_exec($this->apiConnection);
        return json_decode($output);
    }
    /**
     * Load the types in from the API
     * 
     * @return Array an indexed array of objects. Each object represents a type
     */
    public function loadTypes() : Array
    {
        curl_setopt($this->apiConnection, CURLOPT_URL, $this->apiUrl . 'types.json');
        $output = curl_exec($this->apiConnection);
        return json_decode($output);
    }
    /**
     * Load the statuses in from the API
     * 
     * @return Array an indexed array of objects. Each object represents a status
     */
    public function loadStatuses() : Array
    {
        curl_setopt($this->apiConnection, CURLOPT_URL, $this->apiUrl . 'statuses.json');
        $output = curl_exec($this->apiConnection);
        return json_decode($output);
    }

    /**
     * Get the value of apiUrl
     */ 
    public function getApiUrl()
    {
        return $this->apiUrl;
    }
}