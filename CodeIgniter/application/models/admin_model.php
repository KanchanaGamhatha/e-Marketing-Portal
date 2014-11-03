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
                $new_admin_insert_data = array('user_name' => $user_name,'admin_password' => $password);
                $this->db->insert('administrator',$new_admin_insert_data);
                
                $new_member_insert_data = array('name' => $user_name,'email' => $user_name,'type' => 1,'password' => $password ,'admin' => 1);
                return $this->db->insert('registered_user',$new_member_insert_data);
                
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
        
        function add_city($district_id, $city_name)
        {
            $new_city = array(
                    'location_id' => $district_id,
                    'city_name' => $city_name
                );

                //insert comment to the comment table
                $insert = $this->db->insert('city', $new_city);
                return $insert;

        }
        
        function edit_city($city_id, $city_name) 
        {
            $update_city_data = array(
                'city_name' => $city_name
            );

            $this->db->where('city_id', $city_id);
            $this->db->update('city', $update_city_data);
        }
        
        function add_subcategory($dropdown_category_value, $subcatogory_name)
        {
            $new_subcategory = array(
                    'category_id' => $dropdown_category_value,
                    'subcategory_name' => $subcatogory_name
                );

                //insert comment to the comment table
                $insert = $this->db->insert('subcategory', $new_subcategory);
                return $insert;

        }

}
	