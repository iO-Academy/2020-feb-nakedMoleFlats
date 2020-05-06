<?php

namespace NMF;

class DwellingImporter
{
    private $db;
    private $api;

    /**
     * class to import the data from the API into the database
     *
     * @param \PDO $db PDO connection to the db
     * @param DwellingAPI $api instance of dwelling api
     */
    public function __construct(\PDO $db, DwellingAPI $api)
    {
        $this->db = $db;
        $this->api = $api;
    }
    /**
     * Deletes the data in all the tables
     *
     * @return void
     */
    private function deleteTables() :void
    {
        $query = $this->db->prepare("TRUNCATE TABLE `dwellings`;");
        $query->execute();
        $query = $this->db->prepare("TRUNCATE TABLE `statuses`;");
        $query->execute();
        $query = $this->db->prepare("TRUNCATE TABLE `types`;");
        $query->execute();
    }
    /**
     * Inserts the dwellings returned by the api into the database
     *
     * @return void
     */
    private function insertDwellings(): void
    {
        $dwellings = $this->api->loadEndpoint('properties.json');

        foreach ($dwellings as $dwelling) {
            $query = $this->db->prepare(
                'INSERT INTO `dwellings` (`agentRef`, `address1`, `address2`, `town`, `postcode`, `description`, `bedrooms`, `price`, `image`, `typeId`, `statusId`) 
                                        VALUES (:agentRef, :address1, :address2, :town, :postcode, :description, :bedrooms, :price, :image, :typeId, :statusId)'
            );
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
     * Inserts the Types returned by the api into the database
     *
     * @return void
     */
    private function insertTypes(): void
    {
        $types = $this->api->loadEndpoint('types.json');
        foreach ($types as $type) {
            $query = $this->db->prepare('INSERT INTO `types` (`type`) VALUES (:type)');
            $query->bindParam(':type', $type->TYPE_NAME);
            $query->execute();
        }
    }
    /**
     * Inserts the Statuses returned by the api into the database
     *
     * @return void
     */
    private function insertStatuses(): void
    {
        $statuses = $this->api->loadEndpoint('statuses.json');
        foreach ($statuses as $status) {
            $query = $this->db->prepare('INSERT INTO `statuses` (`status`) VALUES (:status)');
            $query->bindParam(':status', $status->STATUS_NAME);
            $query->execute();
        }
    }
    /**
     * Checks the API is up if up deletes all data in the database, inserts new data from the api and returns a confirmation string.
     * If the API is not up it returns a failure string
     * 
     * @return String whether the API is up or not.
     */
    public function refreshDB(): String
    {
        if ($this->api->checkIsUp()) {
            $this->deleteTables();
            $this->insertDwellings();
            $this->insertTypes();
            $this->insertStatuses();
            return "Database has been refreshed.";
        }
        return "The database has not been refreshed as the API is down.";
    }
}
