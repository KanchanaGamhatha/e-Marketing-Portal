<?php

class Vehicle_ad extends MY_Model {
    
         const DB_TABLE = 'vehiclead';
         const DB_TABLE_PK = 'vehicle_ad_id';
   
 /**
  *Electronic_ad unique Identifire.
  * @var int
  */    
public $vehicle_ad_id;
/**
 *home_personal_type
 * @var string
 */
public $vehicle_type;
/**
 *home_personal_subcategory
 * @var string
 */
public $vehicle_brand;
/**
 *Electronic sale_or_want
 * @var string
 */
public $vehicle_model;

/**
 *Electronic sale_or_want
 * @var string
 */
public $vehicle_manufacture_year;
/**
 *Electronic sale_or_want
 * @var string
 */
public $vehicle_transmission;
/**
 *Electronic sale_or_want
 * @var string
 */
public $vehicle_milage;
/**
 *Electronic sale_or_want
 * @var string
 */
public $vehicle_engine;
/**
 *Electronic sale_or_want
 * @var string
 */
public $vehicle_subcategory;
/**
 *Electronic sale_or_want
 * @var string
 */
public $vehicle_condition;

/**
 *user_id
 * @var int
 */
public $user_id;
/**
 *post date time
 * @var datetime
 */
public $post_date_time;

}
?>
