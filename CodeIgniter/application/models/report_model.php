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

    function get_ad_name($ad_id) {
        $this->db->select('advertisement_title as advertisement_title')->from('advertisement')->where('advertisement_id', $ad_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function get_user_id($advertisement_id) {
        $this->db->select('user_id as user_id')->from('advertisement')->where('advertisement_id', $advertisement_id);
        $query = $this->db->get();
        return $query->row();
    }


    function getReport() {
        $sql = "SELECT DISTINCT advertisement_id FROM `report`";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getSingleReport($advertisement_id) {
        $sql = $this->db->select('*')->from('report')->where('advertisement_id', $advertisement_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function countreports($advertisement_id) {
        $this->db->where('advertisement_id', $advertisement_id);
        $this->db->from('report');
        return $this->db->count_all_results();
    }

    function deleteReport($report_id) {
        $this->db->where('report_id', $report_id);
        $this->db->delete('report');
    }

    function count() {
        $this->db->from('report');
        return $this->db->count_all_results();
    }

    function getUserDetails($user_id) {
        $this->db->select('*');
        $this->db->from('registered_user');
        $this->db->where('user_id', $user_id);

        $query = $this->db->get();
        return $query->row();
        
    }

    function getOneAdDetails($advertisement_id) 
    {
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('advertisement_id', $advertisement_id);
        
        $query = $this->db->get();
        return $query->row();
        
    }

    function bookmark($report_id, $flag) {
         $update_bookmark_data = array(
            'bookmark_flag' => $flag
          );
        
        $this->db->where('report_id',$report_id);
        $this->db->update('report',$update_bookmark_data);
        return $this->db->affected_rows();
    }

    
    function getAdsByUser($user_id) 
    {
        $sql = $this->db->select('advertisement_id')->from('advertisement')->where('user_id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    function deleteAd($advertisement_id){
        
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('comment');
            
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('favorite');
            
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('report');
            
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('advertisement');
        
        }
        
    
    function deleteUser($user_id)
    {
        
        $user_ads=  $this->getAdsByUser($user_id);
        foreach ($user_ads as $row) 
        {
            $this->db->where('advertisement_id',$row->advertisement_id);
            $this->db->delete('comment');
            
            $this->db->where('advertisement_id',$row->advertisement_id);
            $this->db->delete('favorite');
            
            $this->db->where('advertisement_id',$row->advertisement_id);
            $this->db->delete('report');
        
        }
        
        $this->db->where('user_id', $user_id);
        $this->db->delete('comment');
        
        $this->db->where('user_id', $user_id);
        $this->db->delete('advertisement');
                
        $this->db->where('user_id', $user_id);
        $this->db->delete('rate');
        
        $this->db->where('user_id', $user_id);
        $this->db->delete('feedback');
        
        $this->db->where('seller_id', $user_id);
        $this->db->delete('feedback');
        
        $this->db->where('user_id', $user_id);
        $this->db->delete('registered_user');
        
        
    }
    
    function getEmailToBeDeleted($user_id){
        $this->db->select('email as email')->from('registered_user')->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
        
    }
    
    function add_to_blacklist($email){
        
        $black_list_email = array(
            'email' => $email
        );
        
        $insert = $this->db->insert('black_list', $black_list_email);
        return $insert;
        
    }

}
