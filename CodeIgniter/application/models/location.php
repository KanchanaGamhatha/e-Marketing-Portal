<?php
class Location extends CI_Model {
    
        const DB_TABLE = 'location';
        const DB_TABLE_PK = 'location_id';
    /**
     *Location unique identifire
     * @var int
     */
    public $location_id;
    /**
     *Location name
     * @var string
     */
    public $location_name;
    
        
    /**
     * Create record.
     */
    private function insert(){
        
        $this->db->insert('location',  $this);
        $this->{'location_id'} = $this->db->insert_id();
        
    }
    /**
     * Update record.
     */
    
    private function  update()
    {
        $this->db->update('location',$this,'location_id');
        
        
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
        
        $query = $this->db->get_where('location',array('location_id' => $id, 
            ));
            $this->populate($query->row());
            
    }
    
    
    /**
     * Delete current record
     */
    public function delete(){
        
        $this->db->delete('location',array(
            'location_id' => $this->{'location_id'},
        ));
        unset($this->{'location_id'});
    }
    /**
     * Save the record.
     */
    public function  save(){
        if(isset($this->{'location_id'})){
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
            $query = $this->db->get('location',$limit,$offset);
        }
    else {
            $query = $this->db->get('location');
        }
        
        $ret_val = array();
        $class = get_class($this);
        foreach($query-> result() as $row){
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{'location_id'}] = $model;
        }
        return $ret_val;
    }
}
