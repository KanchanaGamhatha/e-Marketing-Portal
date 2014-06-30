<?php
class Property_ad_sub_category extends MY_Model {
    
        const DB_TABLE = 'PropertyAdSubcategory';
        const DB_TABLE_PK = 'property_subcategory_id';
    /**
     *Location unique identifire
     * @var int
     */
    public $property_subcategory_id;
    /**
     *electronic_subcategory_name
     * @var string
     */
    public $property_subcategory_name;
}