<?php
class Electronic_ad_sub_category extends MY_Model {
    
        const DB_TABLE = 'ElectronicAdSubcategory';
        const DB_TABLE_PK = 'electronic_subcategory_id';
    /**
     *Location unique identifire
     * @var int
     */
    public $electronic_subcategory_id;
    /**
     *electronic_subcategory_name
     * @var string
     */
    public $electronic_subcategory_name;
}
