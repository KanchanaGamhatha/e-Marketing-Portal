<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Search_model extends CI_Model
{
    function search($key_word,$ad_filter)
    {

        $this->db->select('*');
        $this->db->from('advertisement');
        $this->db->where('approval',1);
        $this->db->like('advertisement_title', $key_word);
        $this->db->or_like('advertisement_Description', $key_word);
        if($ad_filter == 0)
        {
            $this->db->order_by("post_date_time", "desc");
        }
        else if ($ad_filter == 1) 
        {
            $this->db->order_by("advertisement_Price", "asc");
        }
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
    
    function searchCategoryLocation($key_word,$catogory_id,$location_id,$ad_filter)
    {
        $sql= "SELECT * FROM `advertisement`
        WHERE catogory_id = '".$catogory_id."' AND
        approval = ". 1 ." AND
        advertisement_location = '".$location_id."' AND
        (advertisement_title LIKE '%" . $key_word . "%' OR advertisement_Description LIKE '%" . $key_word . "%')";
        
        if($ad_filter == 0)
        {
            $sql = $sql." ORDER BY post_date_time DESC";
        }
        else if ($ad_filter == 1) 
        {
            $sql = $sql." ORDER BY advertisement_Price ASC";
        }
        
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
    
    function searchCategory($key_word,$catogory_id,$ad_filter)
    {

        $sql= "SELECT * FROM `advertisement`
        WHERE catogory_id = '".$catogory_id."' AND
        approval = ". 1 ." AND
        (advertisement_title LIKE '%" . $key_word . "%' OR advertisement_Description LIKE '%" . $key_word . "%')";
        
        if($ad_filter == 0)
        {
            $sql = $sql." ORDER BY post_date_time DESC";
        }
        else if ($ad_filter == 1) 
        {
            $sql = $sql." ORDER BY advertisement_Price ASC";
        }
        
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
    
    function searchLocation($key_word,$location_id,$ad_filter)
    {

        $sql= "SELECT * FROM `advertisement`
        WHERE advertisement_location = '".$location_id."' AND
        approval = '". 1 ."' AND
        (advertisement_title LIKE '%" . $key_word . "%' OR advertisement_Description LIKE '%" . $key_word . "%')";
        
        if($ad_filter == 0)
        {
            $sql = $sql." ORDER BY post_date_time DESC";
        }
        else if ($ad_filter == 1) 
        {
            $sql = $sql." ORDER BY advertisement_Price ASC";
        }
        
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
    
    function getAds($search_keyword,$type,$ad_filter)
    {
        $sql= "SELECT * FROM `advertisement`
        WHERE approval = '". 1 ."' AND
        user_id IN (SELECT user_id FROM registered_user 
        WHERE type = '".$type."')AND
        (advertisement_title LIKE '%" . $search_keyword . "%' OR advertisement_Description LIKE '%" . $search_keyword . "%')";

        if($ad_filter == 0)
        {
            $sql = $sql." ORDER BY post_date_time DESC";
        }
        else if ($ad_filter == 1) 
        {
            $sql = $sql." ORDER BY advertisement_Price ASC";
        }
        
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
    
    
    function getAdsCategory($search_keyword,$search_category,$type,$ad_filter)
    {
        $sql= "SELECT * FROM `advertisement`
        WHERE catogory_id = '".$search_category."' AND
        approval = '". 1 ."' AND
        user_id IN (SELECT user_id FROM registered_user 
        WHERE type = '".$type."')AND
        (advertisement_title LIKE '%" . $search_keyword . "%' OR advertisement_Description LIKE '%" . $search_keyword . "%')";

        if($ad_filter == 0)
        {
            $sql = $sql." ORDER BY post_date_time DESC";
        }
        else if ($ad_filter == 1) 
        {
            $sql = $sql." ORDER BY advertisement_Price ASC";
        }
        
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
    
    function getAdsLocation($search_keyword,$search_location,$type,$ad_filter)
    {
        $sql= "SELECT * FROM `advertisement`
        WHERE advertisement_location = '".$search_location."' AND
        approval = '". 1 ."' AND
        user_id IN (SELECT user_id FROM registered_user 
        WHERE type = '".$type."')AND
        (advertisement_title LIKE '%" . $search_keyword . "%' OR advertisement_Description LIKE '%" . $search_keyword . "%')";

        if($ad_filter == 0)
        {
            $sql = $sql." ORDER BY post_date_time DESC";
        }
        else if ($ad_filter == 1) 
        {
            $sql = $sql." ORDER BY advertisement_Price ASC";
        }
        
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
        
    function getAdsCategoryLocation($search_keyword,$search_category,$search_location,$type,$ad_filter)
    {
        $sql= "SELECT * FROM `advertisement`
        WHERE catogory_id = '".$search_category."' AND
        advertisement_location = '".$search_location."' AND
        approval = '". 1 ."' AND
        user_id IN (SELECT user_id FROM registered_user 
        WHERE type = '".$type."')AND
        (advertisement_title LIKE '%" . $search_keyword . "%' OR advertisement_Description LIKE '%" . $search_keyword . "%')";

        if($ad_filter == 0)
        {
            $sql = $sql." ORDER BY post_date_time DESC";
        }
        else if ($ad_filter == 1) 
        {
            $sql = $sql." ORDER BY advertisement_Price ASC";
        }
        
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
    
    function filterByPrice($from_price,$to_price) 
    {
        $sql= "SELECT * FROM `advertisement`
        WHERE advertisement_Price > '".$from_price."' AND
        approval = '". 1 ."' AND
        advertisement_Price < '".$to_price."' ORDER BY advertisement_Price ASC";
        
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
    
    function filterVehicleByYear($from_vehicle_year,$to_vehicle_year) 
    {
        $sql= "SELECT * FROM `advertisement`
        INNER JOIN vehiclead  ON advertisement.user_id = vehiclead.user_id
        AND advertisement.post_date_time = vehiclead.post_date_time
        AND vehicle_manufacture_year > '".$from_vehicle_year."' AND
        vehicle_manufacture_year < '".$to_vehicle_year."' ORDER BY vehicle_manufacture_year ASC";
        
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
    
    function filterVehicleByMilage($from_vehicle_milage,$to_vehicle_milage) 
    {
        $sql= "SELECT * FROM `advertisement`
        INNER JOIN vehiclead  ON advertisement.user_id = vehiclead.user_id
        AND advertisement.post_date_time = vehiclead.post_date_time
        AND vehicle_milage > '".$from_vehicle_milage."' AND
        vehicle_milage < '".$to_vehicle_milage."' ORDER BY vehicle_milage ASC";
        
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
    
    function getLocation($location_id) 
    {
        $this->db->select('location_name as location_name')->from('location')->where('location_id', $location_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function getAllCategories()
    {
       
        $query = $this->db->get('catogory');

        if($query->num_rows() > 0)
          {
              foreach ($query->result() as $row)
              {
                $data[] = $row;
              }
              return $data;
          }
    }
    
    function getAllLocations()
    {
       
        $query = $this->db->get('location');

        if($query->num_rows() > 0)
          {
              foreach ($query->result() as $row)
              {
                $data[] = $row;
              }
              return $data;
          }
    }
    
    function getCategoryID($advertisement_id) 
    {
        $this->db->select('catogory_id as catogory_id')->from('advertisement')->where('advertisement_id', $advertisement_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function getSubCategoryID($advertisement_id) 
    {
        $this->db->select('subcategory_id as subcategory_id')->from('advertisement')->where('advertisement_id', $advertisement_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    function getCategoryName($catogory_id) 
    {
        $this->db->select('catogory_name as catogory_name')->from('catogory')->where('catogory_id', $catogory_id);
        $query = $this->db->get();
        return $query->row();
    }
    function getRelatedAds($category_id,$sub_category_id)
        {
            $sql = "SELECT * FROM `advertisement` 
            WHERE catogory_id = '".$category_id."'"
            ."AND approval = '". 1 ."' "
            . "AND subcategory_id = '".$sub_category_id."'"
            . "ORDER BY rand()";
            
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

    /*function getSubCategory($userID) 
    {
        $this->db->select('type as type')->from('registered_user')->where('user_id',$userID);
        $query =$this->db->get();
        return $query->row();
    }*/
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
     * Categories
     */
    function getReports() 
        {
            $this->db->select('*')->from('report');
            $query =$this->db->get();
         
            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                  $data[] = $row;
                }
                return $data;
            }
            else
            {
                return FALSE;
            }
        }
        function getCategory() 
        {
            $this->db->select('*')->from('catogory');
            $query =$this->db->get();
         
            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                  $data[] = $row;
                }
                return $data;
            }
            else
            {
                return FALSE;
            }
        }
        
        function getLocations() 
        {
            $this->db->select('*')->from('location');
            $query =$this->db->get();
         
            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                  $data[] = $row;
                }
                return $data;
            }
            else
            {
                return FALSE;
            }
        }
        
        function searchByCategory($category_id)
        {

            $this->db->select('*');
            $this->db->from('advertisement');
            $this->db->where('catogory_id', $category_id);
            $this->db->where('approval',1);

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
        
        function searchByLocations ($location_id)
        {

            $this->db->select('*');
            $this->db->from('advertisement');
            $this->db->where('advertisement_location', $location_id);
            $this->db->where('approval',1);

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
        function countCategories($category_id) 
        {
             $this->db->where('catogory_id',$category_id);
             $this->db->where('approval',1);
             $this->db->from('advertisement');
             return $this->db->count_all_results();
              
        }
        
        function countLocations($location_id) 
        {
             $this->db->where('advertisement_location',$location_id);
             $this->db->where('approval',1);
             $this->db->from('advertisement');
             return $this->db->count_all_results();
              
        }
        
        function searchBySubCategory($category_id,$sub_category_id)
        {

            $sql = "SELECT * 
            FROM advertisement WHERE
            catogory_id = ".$category_id."
            AND approval = '". 1 ."' 
            AND subcategory_id = ".$sub_category_id;
            
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

     function getSubCategoryName($category_id,$subcategory_id) 
     {
         $this->db->select('subcategory_name as subcategory_name')->from('subcategory');
         $this->db->where('category_id',$category_id);
         $this->db->where('subcategory_id',$subcategory_id);
         $query = $this->db->get();
         return $query->row();
     }
       
        function getSubcategory($category_id) 
        {
            $this->db->select('*')->from('subcategory');
            $this->db->where('category_id',$category_id);
            $query =$this->db->get();
         
            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                  $data[] = $row;
                }
                return $data;
            }
            else
            {
                return FALSE;
            }
        }
		
		function recordKeyWord($keyword)
		{
			$this->db->select('*')->from('keywords')->where('keyword',$keyword);
			$query = $this->db->get();
			
			if($query->num_rows() > 0)
			{
				$this->db->select('keyword_count')->from('keywords')->where('keyword',$keyword);
				$query=$this->db->get();
				$count=$query->row();
				$count=$count->keyword_count;
				$count++;
				
				$update_count_data = array('keyword_count' => $count);
				$this->db->where('keyword',$keyword);
				$this->db->update('keywords',$update_count_data);
			}
			else 
			{
				$keyword_data = array('keyword' => $keyword,'keyword_count' => 1);
				$this->db->insert('keywords',$keyword_data);
			}
			
		}
		function getKeywords($input)
		{
			$query="SELECT * FROM keywords WHERE keywords.keyword LIKE '" . $input . "%' ORDER BY keywords.keyword_count DESC";
			
			$result = $this->db->query($query);
			
			if($result->num_rows() > 0)
			{
				foreach ($result->result() as $row)
				{
				  $data[] = $row;
				}
				return $data;
			}
			else
			{
				//return NULL;
			}

		}
    
    }

