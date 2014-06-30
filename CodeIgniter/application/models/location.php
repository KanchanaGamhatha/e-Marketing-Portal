<?php
class Location extends MY_Model {
    
        const DB_TABLE = 'Location';
        const DB_TABLE_PK = 'location_id';
    /**
     *Location unique identifire
     * @var int
     */
    public $location_id;
    /**
     *Location name
     * @var string
     */
    public $location_name;
}
