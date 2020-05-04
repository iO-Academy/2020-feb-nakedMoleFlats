<?php

namespace NMF;

class DwellingImporter{
    private $db;
    private $api;

    public function __construct($db, $api)
    {
        $this->db = $db;
        $this->api = $api;
    }

    private function deleteTable()
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
    }

    private function insertDwellings()
    {
        $dwellings = $this->api->loadDwellings();

       foreach ($dwellings as $dwelling) {
           $query = $this->db->prepare('INSERT INTO dwellings VALUES (:agentRef, :address1, :address2, :town, :postcode, :description, :bedrooms, :price, :image, :typeId, :statusId)');
           $query->execute($dwelling);
       }
    }
}