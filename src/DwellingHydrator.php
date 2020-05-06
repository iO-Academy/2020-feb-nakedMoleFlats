<?php

namespace NMF;

class DwellingHydrator{
    private $db;

    /**
     * Class constructor.
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    /**
     * takes database connection and joins data from tables into single object
     */
    public function loadAllDwellings(){
        $query = $this->db->prepare('SELECT `dwellings`.`dwellingId`, `dwellings`.`agentRef`, `dwellings`.`address1`, `dwellings`.`address2`, `dwellings`.`town`, `dwellings`.`postcode`, `dwellings`.`description`, `dwellings`.`bedrooms`, `dwellings`.`price`, `dwellings`.`image`, `types`.`type`, `statuses`.`status` 
                                    FROM ((`dwellings` 
                                    INNER JOIN `types` ON `dwellings`.`typeId` = `types`.`typeId`) 
                                    INNER JOIN `statuses` ON `dwellings`.`statusId` = `statuses`.`statusId`);'
                                    );
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, 'NMF\Dwelling');
    }
    /**
     * takes database connection and joins data from tables to return one dwelling object
     */
    public function loadDwelling() {
        //todo
    }
}