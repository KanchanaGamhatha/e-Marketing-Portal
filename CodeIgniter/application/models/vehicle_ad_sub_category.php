<?php
class Vehicle_ad_sub_category extends MY_Model {
    
        const DB_TABLE = 'VehicleAdSubcategory';
        const DB_TABLE_PK = 'vehicle_subcategory_id';
    /**
     *Location unique identifire
     * @var int
     */
    public $vehicle_subcategory_id;
    /**
     *electronic_subcategory_name
     * @var string
     */
    public $vehicle_subcategory_name;
}
