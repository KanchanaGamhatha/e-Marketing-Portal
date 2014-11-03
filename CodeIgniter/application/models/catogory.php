<?php

class Catogory extends CI_Model {
    
        const DB_TABLE = 'catogory';
        const DB_TABLE_PK = 'catogory_id';
    /**
     *Catogory unique identifire
     * @var int
     */
    public $catogory_id;
    /**
     *Catogory name
     * @var string
     */
    public $catogory_name;
        
    /**
     * Create record.
     */
    private function insert(){
        
        $this->db->insert('catogory',  $this);
        $this->{'catogory_id'} = $this->db->insert_id();
        
    }
    /**
     * Update record.
     */
    
    private function  update()
    {
        $this->db->update('catogory',$this,'catogory_id');
        
        
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
        
        $query = $this->db->get_where('catogory',array('catogory_id' => $id, 
            ));
            $this->populate($query->row());
            
    }
    
    
    /**
     * Delete current record
     */
    public function delete(){
        
        $this->db->delete('catogory',array(
            'catogory_id' => $this->{'catogory_id'},
        ));
        unset($this->{'catogory_id'});
    }
    /**
     * Save the record.
     */
    public function  save(){
        if(isset($this->{'catogory_id'})){
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
            $query = $this->db->get('catogory',$limit,$offset);
        }
    else {
            $query = $this->db->get('catogory');
        }
        
        $ret_val = array();
        $class = get_class($this);
        foreach($query-> result() as $row){
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{'catogory_id'}] = $model;
        }
        return $ret_val;
    }
}

