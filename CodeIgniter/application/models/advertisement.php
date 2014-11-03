<?php

class Advertisement extends CI_Model {
    
//         const DB_TABLE = 'advertisement';
//         const DB_TABLE_PK = 'advertisement_id';
   
 /**
  *Advertisement unique Identifire.
  * @var int
  */    
public $advertisement_id;
/**
 *Catogory  id
 * @var int
 */
public $catogory_id;
/**
 *Sub Catogory  id
 * @var int
 */
public $subcategory_id;
/**
 *Advertisement title.
 * @var string
 */

public $advertisement_title;
/**
 *Advertisement description.
 * @var string
 */
public $advertisement_Description;
/**
 *Advertisement price.
 * @var float
 */
public $advertisement_Price;
/**
 *Advertisement image path.
 * @var float
 */
public $advertisement_image;
/**
 *Advertisement contact number.
 * @var int
 */
public $advertisement_phonnumber;

/**
 *Advertisement location number
 * @var int 
 */
public $advertisement_location; 
/**
 *Advertisement user_id
 * @var int 
 */
public $city_id;

public $user_id;

/**
 *Advertisement post_date_time
 * @var datetime 
 */
public $post_date_time;
    
    /**
     * Create record.
     */
    public function insert(){
        
        $this->db->insert('advertisement',  $this);
        $this->{'advertisement_id'} = $this->db->insert_id();
        
    }
    /**
     * Update record.
     */
    
    public function  update()
    {
        $this->db->update('advertisement',$this,'advertisement_id');
        
        
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
        
        $query = $this->db->get_where('advertisement',array('advertisement_id' => $id, 
            ));
            $this->populate($query->row());
            
    }
    
    
    /**
     * Delete current record
     */
    public function delete(){
        
        $this->db->delete('advertisement',array(
            'advertisement_id' => $this->{'advertisement_id'},
        ));
        unset($this->{'advertisement_id'});
    }
    /**
     * Save the record.
     */
    public function  save(){
        if(isset($this->{'advertisement_id'})){
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
            $query = $this->db->get('advertisement',$limit,$offset);
        }
    else {
            $query = $this->db->get('advertisement');
        }
        
        $ret_val = array();
        $class = get_class($this);
        foreach($query-> result() as $row){
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{'advertisement_id'}] = $model;
        }
        return $ret_val;
    }
}
?>