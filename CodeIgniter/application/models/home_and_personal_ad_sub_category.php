<?php
class Home_and_personal_ad_sub_category extends MY_Model {
    
        const DB_TABLE = 'HomeAndPersonalAdSubcategory';
        const DB_TABLE_PK = 'home_personal_subcategory_id';
    /**
     *Location unique identifire
     * @var int
     */
    public $home_personal_subcategory_id;
    /**
     *electronic_subcategory_name
     * @var string
     */
    public $home_personal_subcategory_name;
}