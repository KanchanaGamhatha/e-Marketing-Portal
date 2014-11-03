<?php

class Electronic_ad extends CI_Model {
    
//         const DB_TABLE = 'electronicad';
//         const DB_TABLE_PK = 'electron_ad_id';
   
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
     * Create record.
     */
    private function insert(){
        
        $this->db->insert('electronicad',  $this);
        $this->{'electron_ad_id'} = $this->db->insert_id();
        
    }
    /**
     * Update record.
     */
    
    private function  update()
    {
        $this->db->update('electronicad',$this,'electron_ad_id');
        
        
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
        
        $query = $this->db->get_where('electronicad',array('electron_ad_id' => $id, 
            ));
            $this->populate($query->row());
            
    }
    
    
    /**
     * Delete current record
     */
    public function delete(){
        
        $this->db->delete('electronicad',array(
            'electron_ad_id' => $this->{'electron_ad_id'},
        ));
        unset($this->{'electron_ad_id'});
    }
    /**
     * Save the record.
     */
    public function  save(){
        if(isset($this->{'electron_ad_id'})){
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
            $query = $this->db->get('electronicad',$limit,$offset);
        }
    else {
            $query = $this->db->get('electronicad');
        }
        
        $ret_val = array();
        $class = get_class($this);
        foreach($query-> result() as $row){
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{'electron_ad_id'}] = $model;
        }
        return $ret_val;
    }

/**
     * Load from the database 
     * @param int $id
     */
    public function  load_by_user_date($userid,$date_time){
        
        $query = $this->db->get_where('electronicad',array($this->user_id => $userid, $this->post_date_time= $date_time 
            ));
            $this->populate($query->row());
            
    }
    
}
?>
