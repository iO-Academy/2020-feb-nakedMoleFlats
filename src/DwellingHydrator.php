<?php

namespace NMF;

class DwellingHydrator
{
    private $db;

    /**
     * Class constructor.
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    /**
     * Queries the DB to get all dwellings, joins on statuses and types to return human readable type and status and returns an array of Dwelling objects
     *
     * @return array of dwelling objects
     */
    public function loadAllDwellings(): array
    {
        $query = $this->db->prepare(
            'SELECT `dwellings`.`dwellingId`, `dwellings`.`agentRef`, `dwellings`.`address1`, `dwellings`.`address2`, `dwellings`.`town`, `dwellings`.`postcode`, `dwellings`.`description`, `dwellings`.`bedrooms`, `dwellings`.`price`, `dwellings`.`image`, `types`.`type`, `statuses`.`status`
                                    FROM ((`dwellings`
                                    INNER JOIN `types` ON `dwellings`.`typeId` = `types`.`typeId`)
                                    INNER JOIN `statuses` ON `dwellings`.`statusId` = `statuses`.`statusId`);'
        );
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, 'NMF\Dwelling');
    }
    /**
     * takes database connection and joins data from tables to return one dwelling object
     * @return array of single dwelling object
     */
    public function loadSingleDwelling(): object {
        $query = $this->db->prepare('SELECT `dwellings`.`dwellingId`, `dwellings`.`agentRef`, `dwellings`.`address1`, `dwellings`.`address2`, `dwellings`.`town`, `dwellings`.`postcode`, `dwellings`.`description`, `dwellings`.`bedrooms`, `dwellings`.`price`, `dwellings`.`image`, `types`.`type`, `statuses`.`status`                      
                                    FROM ((`dwellings` 
                                    INNER JOIN `types` ON `dwellings`.`typeId` = `types`.`typeId`) 
                                    INNER JOIN `statuses` ON `dwellings`.`statusId` = `statuses`.`statusId`)
                                    WHERE `dwellings`.`dwellingId` = :dwellingId'
                                    );
        $query->bindParam(':dwellingId', $_GET['dwellingId']);

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, 'NMF\Dwelling')[0];
    }
}
