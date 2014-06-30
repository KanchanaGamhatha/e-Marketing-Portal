<?php

/* 
 * User_management_model class which get details of all registered users 
 * and delete a specific user
 */

class User_management_model extends CI_Model
{
    
     /*
     * Function to get details of all the user registered in the wesite
     */
     function get_all_users() 
     {
         $this->db->select('*')->from('registered_user');
         $query =$this->db->get();
         
          if($query->num_rows() > 0)
          {
              foreach ($query->result() as $row)
              {
                $data[] = $row;
              }
              return $data;
          }
     }
     
    /*
    * Function to delete a specific user
    */
   public function delete($user_id)
   {
         $this->db->where('user_id',$user_id);
         $this->db->delete('registered_user');
         redirect('admin_user_management_controller');
   }
}