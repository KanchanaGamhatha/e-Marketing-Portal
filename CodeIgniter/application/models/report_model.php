<?php

class Report_model extends CI_Model {

    public function insert_report($ad_id, $reason, $email, $message) {

        $new_report = array(
            'advertisement_id' => $ad_id,
            'reason' => $reason,
            'email' => $email,
            'message' => $message
        );

        $insert = $this->db->insert('report', $new_report);
        return $insert;
    }
    
    function get_ad_name($ad_id) 
    {
        $this->db->select('advertisement_title as advertisement_title')->from('advertisement')->where('advertisement_id',$ad_id);
        $query =$this->db->get();
        return $query->row();
    }
    
    function delete_report($ad_id) 
    {
        $this->db->where('advertisement_id',$ad_id);
        $this->db->delete('report');
    }

}
