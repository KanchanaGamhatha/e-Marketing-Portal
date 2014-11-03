<?php

    class Membership_model extends CI_Model 
    {

        /*
        * Function to validate user data 
        */
        function validate($email="",$password="") 
        {
            $this->db->where('email',$email);
            $this->db->where('password',$password);

            $query = $this->db->get('registered_user');

            if ($query->num_rows == 1) 
            {
                return true;
            }
        }
        /*
        * Function to insert user data into the database 
        */
        function create_member($name,$email,$type,$password)
        {
            $result=$this->find_user($email,'registered_user');
          
            if(!$result)
            {
                $new_member_insert_data = array('name' => $name,'email' => $email,'type' => $type,'password' => $password ,'admin' => 0);
                return $this->db->insert('registered_user',$new_member_insert_data);
                
            }
            else 
            {
                return FALSE;
            }
            
        }
        /*
        * Function to insert user data into a temp table in the database 
        */
        function create_unregistered_member($name,$email,$type,$password,$activation_code)
        {
            $result=$this->find_user($email,'unregistered_user');
          
            if(!$result)
            {
                $new_member_insert_data = array('name' => $name,'email' => $email,'type' => $type,'password' => $password,'string' => $activation_code);
                return $this->db->insert('unregistered_user',$new_member_insert_data);
                
            }
            
        }
        /*
        * Function to find user data from the database using a given email and a table name
        */
        function find_user($email="",$table) 
        {
            $this->db->where('email',$email);

            $query = $this->db->get($table);

            if ($query->num_rows == 1) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        /*
        * Function to reset user password
        */
        function resetPassword($password,$email)
        {
            //$password=  md5($password);
            
            $query = "UPDATE  `registered_user` SET PASSWORD = '$password' WHERE email = '$email'";
            $result = $this->db->query($query);
            if($result)
            {
                return TRUE;
            }
            else 
            {
                return FALSE;
            }
        }
        /*
        * Function to insert user data into the actual user table if the user has activated his account 
        */
        function confirm_registration ($register_code)    
        {
            
            $query = "SELECT user_id from unregistered_user where string = ?";
            $result = $this->db->query($query, $register_code);
            
            
            if ($result->num_rows() == 1) 
            {
               
                $this->db->select('name,password,email,type,location_id,city_id')->from('unregistered_user')->where('string',$register_code);
                $query =$this->db->get();
                $row= $query->row();
                
                $insertResult=$this->create_member($row->name,$row->email,$row->type,$row->password);
                
                $deleteQuery="delete from unregistered_user where email='{$row->email}'";
                $deleteResult=$this->db->query($deleteQuery);
                
                if($insertResult && $deleteResult)
                {
                    return TRUE;
                }
                else 
                {
                    return FALSE;       
                }
                
            }
            else 
            {
                return FALSE;
            }
            
        } 

    }
	