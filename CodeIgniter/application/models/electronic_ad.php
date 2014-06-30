<?php

class Electronic_ad extends MY_Model {
    
         const DB_TABLE = 'electronicad';
         const DB_TABLE_PK = 'electron_ad_id';
   
 /**
  *Electronic_ad unique Identifire.
  * @var int
  */    
public $electron_ad_id;
/**
 *Electronic type
 * @var string
 */
public $electronic_type;
/**
 *Electronic brand
 * @var string
 */
public $electronic_brand;
/**
 *$electronic_model
 * @var string
 */
public $electronic_model;
/**
 *Electronic subcategory
 * @var string
 */
public $electronic_subcategory;
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

/**
     * Load from the database 
     * @param int $id
     */
    public function  load_by_user_date($userid,$date_time){
        
        $query = $this->db->get_where($this::DB_TABLE,array($this->user_id => $userid, $this->post_date_time= $date_time 
            ));
            $this->populate($query->row());
            
    }
    
}
?>
