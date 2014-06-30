<?php

class Property_ad extends MY_Model {
    
         const DB_TABLE = 'propertyad';
         const DB_TABLE_PK = 'property_ad_id';
   
 /**
  *Electronic_ad unique Identifire.
  * @var int
  */    
public $property_ad_id;
/**
 *home_personal_type
 * @var string
 */
public $property_address;
/**
 *home_personal_subcategory
 * @var string
 */
public $property_subcategory;
/**
 *Electronic sale_or_want
 * @var string
 */
public $user_id;
/**
 *post date time
 * @var datetime
 */
public $post_date_time;

}
?>
