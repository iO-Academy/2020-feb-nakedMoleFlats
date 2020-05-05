<?php

namespace NMF;

class DwellingImporter{
    private $db;
    private $api;
    
    /**
     * class to import the data from the API into the database
     *
     * @param \PDO $db PDO connection to the db
     * @param DwellingAPI $api instance of dwelling api
     */
    public function __construct(\PDO $db,DwellingAPI $api)
    {
        $this->db = $db;
        $this->api = $api;
    }
    /** 
     * deletes all data from the dwellings, statuses and types tables 
     */
    private function deleteTables()
    {
        $query = $this->db->prepare("TRUNCATE TABLE `dwellings`;");
        $query->execute();
        $query = $this->db->prepare("TRUNCATE TABLE `statuses`;");
        $query->execute();
        $query = $this->db->prepare("TRUNCATE TABLE `types`;");
        $query->execute();
    }
    /**
     * inserts data from dwellings from API into the db
     */
    private function insertDwellings()
    {
        $dwellings = $this->api->loadDwellings();

       foreach ($dwellings as $dwelling) {
           $query = $this->db->prepare('INSERT INTO `dwellings` (`agentRef`, `address1`, `address2`, `town`, `postcode`, `description`, `bedrooms`, `price`, `image`, `typeId`, `statusId`) VALUES (:agentRef, :address1, :address2, :town, :postcode, :description, :bedrooms, :price, :image, :typeId, :statusId)');
           $query->bindParam(':agentRef', $dwelling->AGENT_REF);
           $query->bindParam(':address1', $dwelling->ADDRESS_1);
           $query->bindParam(':address2', $dwelling->ADDRESS_2);
           $query->bindParam(':town', $dwelling->TOWN);
           $query->bindParam(':postcode', $dwelling->POSTCODE);
           $query->bindParam(':description', $dwelling->DESCRIPTION);
           $query->bindParam(':bedrooms', $dwelling->BEDROOMS);
           $query->bindParam(':price', $dwelling->PRICE);
           $query->bindParam(':image', $dwelling->IMAGE);
           $query->bindParam(':typeId', $dwelling->TYPE);
           $query->bindParam(':statusId', $dwelling->STATUS);
           $query->execute();
       }
    }
    /**
     * inserts types from API
     */
    private function insertTypes(){
        $types = $this->api->loadTypes();
        foreach ($types as $type) {
            $query = $this->db->prepare('INSERT INTO `types` (type) VALUES (:type)');
            $query->bindParam(':type', $type->TYPE_NAME);
            $query->execute();
        }
    }
    /**
     * inserts statuses from API
     */
    private function insertStatuses(){
        $statuses = $this->api->loadStatuses();
        foreach ($statuses as $status) {
            $query = $this->db->prepare('INSERT INTO `statuses` (status) VALUES (:status)');
            $query->bindParam(':status', $status->STATUS_NAME);
            $query->execute();
        }
    }
    /**
     * deletes the data in the tables and inserts the data from the API
     */
    public function refreshDB(){
        if ($this->api->checkIsUp())
        {
            $this->deleteTables();
            $this->insertDwellings();
            $this->insertTypes();
            $this->insertStatuses();  
            echo "The API is up and the database has been refreshed.";
        }
        else
        {
            echo "The API is down and the database has not been refreshed.";
        }
    }
}