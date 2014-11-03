<?php

/* 
 * Email_model class which extends from CI_Model
 * 
 */
class Email_model extends CI_Model
{
    /*
     * Getting the user ID of the seller from the Advertisement ID
     */
    function get_user_id($adID) 
    {
        $this->db->select('user_id as user_id')->from('advertisement')->where('advertisement_id',$adID);
        $query =$this->db->get();
        return $query->row();
    }
    
    function get_ad_name($adID) 
    {
        $this->db->select('advertisement_title as advertisement_title')->from('advertisement')->where('advertisement_id',$adID);
        $query =$this->db->get();
        return $query->row();
    }
    
    /*
     * Getting the email address of the seller from the user ID
     */
     function get_user_email($user_id) 
    {
        $this->db->select('email as email')->from('registered_user')->where('user_id',$user_id);
        $query =$this->db->get();
        return $query->row();
    }
    
    /*
     * Function to save email details into the database
     */
    public function create_email($name,$seller_email,$sender_email,$phone,$message_text)
    {
	$new_email_insert_data = array(
            'email_name' => $name,
            'receiver_email_address' => $seller_email,
            'sender_email_address' => $sender_email,
            'phone' => $phone,
            'message' => $message_text
	);
            //
            $insert = $this->db->insert('email',$new_email_insert_data);
            return $insert;
    }
}

