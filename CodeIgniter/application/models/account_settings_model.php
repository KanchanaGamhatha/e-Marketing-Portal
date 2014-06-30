<?php

/* 
 *Account_settings_model class which handle the funtions related to the settings of the account
 * of a logged user
 */
class Account_settings_model extends CI_Model{
   
    /*
     * Function to get the username of a logged user when the email is passed
     */
    function getUsername($email) 
    {
        $this->db->select('name as name')->from('registered_user')->where('email',$email);
        $query =$this->db->get();
        return $query->row();
    }
    
    /*
     * Function to get the user type of a logged useer when the email is passed 
     */
    function get_user_type($email) 
    {
        $this->db->select('type as type')->from('registered_user')->where('email',$email);
        $query =$this->db->get();
        return $query->row();
    }
    
     /*
     * Function to get the phone number of a logged useer when the email is passed 
     */
    function get_user_phone($email) 
    {
        $this->db->select('phone as phone')->from('registered_user')->where('email',$email);
        $query =$this->db->get();
        return $query->row();
    }
    
    /*
     *  Function to get the password of a logged useer when the email is passed 
     */
     function get_user_password($email) 
    {
        $this->db->select('password as password')->from('registered_user')->where('email',$email);
        $query =$this->db->get();
        return $query->row();
    }
    
    function get_user_location($email) 
    {
        $this->db->select('location_id as location_id')->from('registered_user')->where('email',$email);
        $query =$this->db->get();
        return $query->row();
    }
    
    function get_user_city($email) 
    {
        $this->db->select('city_id as city_id')->from('registered_user')->where('email',$email);
        $query =$this->db->get();
        return $query->row();
    }
    /*
     * Function to update the details of a specific logged user
     */
    function update_user_details($email,$name,$phone,$type,$location_id,$city_id) 
    {
        $update_user_data = array(
            'name' => $name,
            'phone' => $phone,
            'type' => $type ,
            'location_id' => $location_id,
            'city_id' => $city_id
	);
        
        $this->db->where('email',$email);
	$this->db->update('registered_user',$update_user_data);
    }
    
    /*
     * Function to update the password of a specific logged user
     */
    function update_password($email) 
    {
        $update_user_data = array(
            'password' => md5($this->input->post('confirmPassword'))
	);
        
        $this->db->where('email',$email);
	$this->db->update('registered_user',$update_user_data);
    }
    
    function getCities($location_id)
        {

            $this->db->select('*');
            $this->db->from('city');
            $this->db->where('location_id', $location_id);

            $query = $this->db->get();
            //return $query->result_array();
            if($query->num_rows() > 0)
            {
               foreach ($query->result() as $row)
               {
                  $data[] = $row;
               }
               return $data;
            }
        }
    
}

