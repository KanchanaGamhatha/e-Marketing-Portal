<?php

class Vehicle_ad extends CI_Model {
    
//         const DB_TABLE = 'vehiclead';
//         const DB_TABLE_PK = 'vehicle_ad_id';
   
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

    
    /**
     * Create record.
     */
    private function insert(){
        
        $this->db->insert('vehiclead',  $this);
        $this->{'vehicle_ad_id'} = $this->db->insert_id();
        
    }
    /**
     * Update record.
     */
    
    private function  update()
    {
        $this->db->update('vehiclead',$this,'vehicle_ad_id');
        
        
    }
    /**
     * Populate from array or standard class
     * @param type $row
     */
    public function populate($row){
        foreach ($row as $key => $value){
            $this->$key = $value;
        }
        
    }
    /**
     * Load from the database 
     * @param int $id
     */
    public function  load($id){
        
        $query = $this->db->get_where('vehiclead',array('vehicle_ad_id' => $id, 
            ));
            $this->populate($query->row());
            
    }
    
    
    /**
     * Delete current record
     */
    public function delete(){
        
        $this->db->delete('vehiclead',array(
            'vehicle_ad_id' => $this->{'vehicle_ad_id'},
        ));
        unset($this->{'vehicle_ad_id'});
    }
    /**
     * Save the record.
     */
    public function  save(){
        if(isset($this->{'vehicle_ad_id'})){
            $this->update();
        }
        else
        {
            $this->insert();
        }
    }
    /**
     * Get an array of Models with an optional limit,offset.
     * @param int $limit Optional.
     * @param int $offset Optional.if set requires $limit.
     * @return  array Models Populated by database,keyed by PK.
     */
    public function get($limit = 0, $offset = 0){
        if($limit){
            $query = $this->db->get('vehiclead',$limit,$offset);
        }
    else {
            $query = $this->db->get('vehiclead');
        }
        
        $ret_val = array();
        $class = get_class($this);
        foreach($query-> result() as $row){
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{'vehicle_ad_id'}] = $model;
        }
        return $ret_val;
    }
}
?>
