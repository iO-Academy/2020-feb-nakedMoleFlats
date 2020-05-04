<?php

namespace NMF;

class DwellingImporter{
    private $db;
    private $api;

    public function __construct(\PDO $db,Object $api)
    {
        $this->db = $db;
        $this->api = $api;
    }

    private function deleteTables()
    {
        $query = $this->db->prepare("DROP TABLE IF EXISTS `dwellings`;");
        $query->execute();
        $query = $this->db->prepare("CREATE TABLE `dwellings` (
            `dwellingId` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `agentRef` varchar(13) NOT NULL DEFAULT '',
            `address1` varchar(100) NOT NULL DEFAULT '',
            `address2` varchar(100) DEFAULT NULL,
            `town` varchar(100) NOT NULL DEFAULT '',
            `postcode` varchar(10) NOT NULL DEFAULT '',
            `description` varchar(1000) NOT NULL DEFAULT '',
            `bedrooms` int(11) NOT NULL,
            `price` decimal(10,0) NOT NULL,
            `image` varchar(11) NOT NULL DEFAULT '',
            `typeId` int(11) NOT NULL,
            `statusId` int(11) NOT NULL,
            PRIMARY KEY (`dwellingId`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $query->execute();
        $query = $this->db->prepare("DROP TABLE IF EXISTS `statuses`;");
        $query->execute();
        $query = $this->db->prepare("CREATE TABLE `statuses` (
            `statusId` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `status` varchar(11) NOT NULL DEFAULT '',
            PRIMARY KEY (`statusId`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $query->execute();
        $query = $this->db->prepare("DROP TABLE IF EXISTS `types`;");
        $query->execute();
        $query = $this->db->prepare("CREATE TABLE `types` (
            `typeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `type` varchar(11) NOT NULL DEFAULT '',
            PRIMARY KEY (`typeId`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $query->execute();
    }

    private function insertDwellings()
    {
        $dwellings = $this->api->loadDwellings();

       foreach ($dwellings as $dwelling) {
           $query = $this->db->prepare('INSERT INTO dwellings VALUES (:agentRef, :address1, :address2, :town, :postcode, :description, :bedrooms, :price, :image, :typeId, :statusId)');
           $query->execute($dwelling);
       }
    }

    private function insertTypes(){
        $types = $this->api->loadTypes();
        foreach ($types as $type) {
            $query = $this->db->prepare('INSERT INTO types VALUES (:type)');
            $query->execute($type);
        }
    }

    private function insertStatuses(){
        $statuses = $this->api->loadTypes();
        foreach ($statuses as $status) {
            $query = $this->db->prepare('INSERT INTO statuses VALUES (:status)');
            $query->execute($status);
        }
    }

    public function refreshDB(){
        $this->deleteTables();
        $this->insertDwellings();
        $this->insertTypes();
        $this->insertStatuses();        
    }
}