<?php

class Home_and_personal_ad extends MY_Model {
    
         const DB_TABLE = 'homeandpersonalad';
         const DB_TABLE_PK = 'home_personal_ad_id';
   
 /**
  *Electronic_ad unique Identifire.
  * @var int
  */    
public $home_personal_ad_id;
/**
 *home_personal_type
 * @var string
 */
public $home_personal_type;
/**
 *home_personal_subcategory
 * @var string
 */
public $home_personal_subcategory;
/**
 *Electronic sale_or_want
 * @var string
 */
public $sale_or_want;
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
