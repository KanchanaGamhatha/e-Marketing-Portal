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
         $this->db->where('admin',0);
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
     * Function to get details of all the user registered in the wesite
     */
     function search_all_users($search_text) 
     {
         $this->db->select('*')->from('registered_user');
         $this->db->where('admin',0);
         $this->db->like('name', $search_text);
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
      * Function to get specific details of a registered user
      */
     function getUserDetails($user_id) 
     {
        $this->db->select('*');
        $this->db->from('registered_user');
        $this->db->where('user_id', $user_id);

        $query = $this->db->get();
        return $query->row();
        
     }
     
     /*
      * Function to get district id of a specific registered user
      */
     function get_district_id($user_id) 
     {
        $this->db->select('location_id as location_id')->from('registered_user')->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
     }
     
     /*
      * Function to get city id of a specific registered user
      */
     function get_city_id($user_id) 
     {
        $this->db->select('city_id as city_id')->from('registered_user')->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
     }
     
      /*
      * Function to get district name of a specific district id
      */
     function get_district_name($location_id) 
     {
        $this->db->select('location_name as location_name')->from('location')->where('location_id', $location_id);
        $query = $this->db->get();
        return $query->row();
     }
     
     /*
      * Function to get city name of a specific city id
      */
     function get_city_name($city_id) 
     {
        $this->db->select('city_name as city_name')->from('city')->where('city_id', $city_id);
        $query = $this->db->get();
        return $query->row();
     }
     
     /*
      * Function to get approved posted ad count of a specific user
      */
     function get_ads_count($user_id)
     {
         $this->db->where('user_id',$user_id);
         $this->db->where('approval',1);
         $this->db->from('advertisement');
         return $this->db->count_all_results();
     }
     
     /*
      * Function to get pending ad count of a specific user
      */
     function get_pend_ads_count($user_id)
     {
         $this->db->where('user_id',$user_id);
         $this->db->where('approval',0);
         $this->db->from('advertisement');
         return $this->db->count_all_results();
     }
     
     /*
      * Function to get comments count of a specific user
      */
     function get_comments_count($user_id)
     {
         $this->db->where('user_id',$user_id);
         $this->db->from('comment');
         return $this->db->count_all_results();
     }
     
     /*
      * Function to get rates count of a specific user
      */
     function get_rates_count($user_id)
     {
         $this->db->where('user_Id',$user_id);
         $this->db->from('rate');
         return $this->db->count_all_results();
     }
     
     /*
      * Function to get feedbacks count of a specific user
      */
     function get_feedbacks_count($user_id)
     {
         $this->db->where('user_id',$user_id);
         $this->db->from('feedback');
         return $this->db->count_all_results();
     }
     
     /*
      * Function to get current overall rating of a specific user
      */
     function get_current_rate($user_id) 
     {
        $this->db->select('current_rate as current_rate')->from('ratings')->where('seller_Id', $user_id);
        $query = $this->db->get();
        return $query->row();
     }
     
     /*
      * Function to get user name of a specific registered user
      */
     function get_user_name($user_id) 
     {
        $this->db->select('name as name')->from('registered_user')->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
     }
     
     /*
      * Function to get approved ads of a specific registered user
      */
     function get_ads_by_user($user_id) 
     {
         
         $this->db->select('*')->from('advertisement')->where('user_id',$user_id)->where('approval',1);
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
      * Function to get comments posted by a specific registered user
      */
     function get_comments_by_user($user_id) 
     {
         
         $this->db->select('*')->from('comment')->where('user_id',$user_id);
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
      * Function to get ratings done by a specific registered user
      */
     function get_ratings_by_user($user_id) 
     {
         
         $this->db->select('*')->from('rate')->where('user_Id',$user_id);
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
      * Function to get feedbacks given by a specific registered user
      */
     function get_feedbacks_by_user($user_id) 
     {
         
         $this->db->select('*')->from('feedback')->where('user_id',$user_id);
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
     /*
    * Function to delete a specific user
    */
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
    /*
     * Get the seller id of a specific advetisement
     */
    function get_ad_user($advertisement_id) 
     {
        $this->db->select('user_id as user_id')->from('advertisement')->where('advertisement_id', $advertisement_id);
        $query = $this->db->get();
        return $query->row();
     }
     
     /*
      * Function to get image name of a specific advetisement
      */
     function getImageName($adID) 
     {
        $this->db->select('advertisement_image as advertisement_image')->from('advertisement')->where('advertisement_id', $adID);
        $query = $this->db->get();
        return $query->row();
     }
    
     /*
      * Function to delete a specific advertisement
      */
    function deleteAd($advertisement_id)
    {
         $image_name = $this->getImageName($advertisement_id)->advertisement_image;
         if ($image_name)
         {
             $filename = "uploads/".$image_name;
            unlink($filename);
         }
        
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('comment');
            
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('favorite');
            
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('report');
            
            $this->db->where('advertisement_id',$advertisement_id);
            $this->db->delete('advertisement');
        
    }
    
    /*
     * Get the seller id of a specific comment
     */
    function get_comment_user($comment_id) 
     {
        $this->db->select('user_id as user_id')->from('comment')->where('comment_Id', $comment_id);
        $query = $this->db->get();
        return $query->row();
     }
    
     /*
      * Function to delete a specific comment
      */
    function deleteComment($comment_id)
    {
        
            $this->db->where('comment_Id',$comment_id);
            $this->db->delete('comment');
    }
   
   ///////////////////////////////////////////////////////////
   
    /*
     * Function to search all ads by category and user
     */
   function searchByCategory($category_id,$user_id) 
   {

        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('catogory_id', $category_id);
        $this->db->where('approval', 1);
        $this->db->where('user_Id',$user_id);

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
    }

    /*
     * Function to search all ads by location and user
     */
    function searchByLocations($location_id,$user_id) 
    {

        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('advertisement_location', $location_id);
        $this->db->where('approval', 1);
        $this->db->where('user_Id',$user_id);

        $query = $this->db->get();
        //return $query->result_array();
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    /*
     * Function to search all ads by category, location and user
     */
    function searchByCategoryLocations($category_id,$location_id,$user_id) 
    {

        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('catogory_id', $category_id);
        $this->db->where('advertisement_location', $location_id);
        $this->db->where('approval', 1);
        $this->db->where('user_Id',$user_id);

        $query = $this->db->get();
        //return $query->result_array();
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    /*
     * Function to insert a new feedback
     */
    function insertFeedback($seller_id,$user_id,$feedback,$comment) 
    {
        $new_feedback = array(
            'seller_id' => $seller_id,
            'user_id' => $user_id,
            'feedback' => $feedback,
            'comment' => $comment,
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
         );
        
         return $this->db->insert('feedback', $new_feedback);
        
    }
    
    /*
     * Function to get feedbacks count
     */
    function get_feedback_count($user_id,$filter)
     {
 
         $this->db->where('seller_id',$user_id);
         $this->db->where('feedback',$filter);
         $this->db->from('feedback');
         return $this->db->count_all_results();
         
     }
     
     function feedback_count($user_id,$filter)
     {
         $data[] = $this->get_feedback_count($user_id, $filter);
         $count = 0;
         foreach ($data as $row)
         {
              $count ++;
         }
         return $count;
     }
     
     /*
     * Function to check feedback by a user
     */
    function check_feedback($user_id,$seller_id)
     {
 
         $this->db->where('user_id',$user_id);
         $this->db->where('seller_id',$seller_id);
         $this->db->from('feedback');
         return $this->db->count_all_results();
         
     }
     /*
      * Function to get the feedback of a specific logged user
      */
     function get_provided_feedback($logged_user,$seller_id)
     {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('user_id', $logged_user);
        $this->db->where('seller_id', $seller_id);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
     }


     /*
      * Function to Last 5 feedbacks on a specifc seller
      */
     function get_feedback($user_id)
     {
            $sql = "SELECT * FROM `feedback` 
            WHERE seller_id = '".$user_id."'"
            . "ORDER BY date DESC LIMIT 5";
            
            $query = $this->db->query($sql);
         
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