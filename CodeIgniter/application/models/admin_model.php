<?php

    class admin_model extends CI_Model 
    {
        /*
        * Function to validate admin data from the database
        */
        function validate($user_name="",$password="") 
        {
            $this->db->where('user_name',$user_name);
            $this->db->where('admin_password',$password);

            $query = $this->db->get('administrator');

            if ($query->num_rows == 1) 
            {
                return TRUE;
            }
            else 
            {
                return FALSE;
            }
        }
        /*
        * Function to insert admin data into the database 
        */
        function create_admin($user_name,$password)
        {
            $result=$this->find_admin($user_name,'administrator');
          
            if(!$result)
            {
                $new_member_insert_data = array('user_name' => $user_name,'admin_password' => $password);
                return $this->db->insert('administrator',$new_member_insert_data);
                
            }
            else 
            {
                return FALSE;
            }
            
        }
        /*
        * Function to find admin data from the database 
        */
        function find_admin($user_name="",$table) 
        {
            $this->db->where('user_name',$user_name);

            $query = $this->db->get($table);

            if ($query->num_rows == 1) 
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

        

    }
	