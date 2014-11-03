<?php

/* 
 * Rules_model class which handle the funtions related to the approval 
 * of advertisement and managing rules by the administrator
 */

class Rules_model extends CI_Model
{
    /*
     * function to insert rules in to table
     */
    function insertRules($rule) 
    {
        $new_rule = array(
          'rule_text' => $rule   
        );
        $this->db->insert('rules',$new_rule);
    }
    
    /*
     * function to retrieve all data from rules table
     */
    function getRules() 
    {
        $this->db->select()->from('rules');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    /*
     * 
     */
    function deleteRule($rule_id)
    {
        $this->db->where('rule_id', $rule_id);
        $this->db->delete('rules');
    }


    /*
     * function to get all pending advertisements yet to be approved
     */
    function getPendingAds($category) 
    {
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('approval', 0);
        if($category != -1)
        {
            $this->db->where('catogory_id', $category);
        }
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    /*
     * Function to get a category id of a given advertisemrnt
     */
    function getCategoryID($advertisement_id) 
    {
        $this->db->select('catogory_id as catogory_id')->from('advertisement')->where('advertisement_id', $advertisement_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    /*
     * Function to approve an advertisement by setting approval to 1
     */
    function approveAd($advertisement_id) 
    {
        $approval = array(
                    'approval' => 1
                   );
      $this->db->where('advertisement_id',$advertisement_id);
      $this->db->update('advertisement',$approval);
    }
    
    /*
     * Functio to count the number of pending advertisements
     */
    function getPendingAdsCount() 
    {
        $this->db->where('approval', 0);
        $this->db->from('advertisement');
        return $this->db->count_all_results();
    }
    
    /*
     * Function to get details about one advertisement
     */
    function getOneAdDetails($advertisement_id) 
    {
        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('advertisement_id', $advertisement_id);
        
        $query = $this->db->get();
        return $query->row();
        
    }
    
    /*
     * Function to get seller details of a specific seller
     */
    function getSellerDetails($user_id) 
    {
        $this->db->select('*');
        $this->db->from('registered_user');
        $this->db->where('user_id', $user_id);
        
        $query = $this->db->get();
        return $query->row();
        
    }
    
    /*
     * Function to get seller id details of a advertisement
     */
    function getUserID($adID) 
    {
        $this->db->select('user_id as user_id')->from('advertisement')->where('advertisement_id',$adID);
        $query =$this->db->get();
        return $query->row();
    }
    
    /*
     * Function to get ad post date of a specific advertisement
     */
     function getAdPostDate($adID) 
    {
        $this->db->select('post_date_time as post_date_time')->from('advertisement')->where('advertisement_id',$adID);
        $query =$this->db->get();
        return $query->row();
    }
    
    /*
     * Function to get email address of a specific seller
     */
    function getUserEmail($user_id) 
    {
        $this->db->select('email as email')->from('registered_user')->where('user_id',$user_id);
        $query =$this->db->get();
        return $query->row();
    }
    
    /*
     * Function to get title address of a specific advertisement
     */
    function getAdTitle($ad_id) 
    {
        $this->db->select('advertisement_title as advertisement_title')->from('advertisement')->where('advertisement_id',$ad_id);
        $query =$this->db->get();
        return $query->row();
    }
}

