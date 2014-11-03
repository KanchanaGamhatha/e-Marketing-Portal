<?php

/* 
 * Class My_ads_model which handle the tasks related to view and delete of 
 * asvertisements posted by a specific user
 * 
 */
class My_ads_model extends CI_Model
{
  /*
  * Function to get the userId of a logged user when the email is passed
  */
      function getUserID($email) {
        $this->db->select('user_id as user_id')->from('registered_user')->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }
    
    /*
     * Function to get details of advertisements posted by 
     * a specific logged user when the user Id is passed
     */
     function getMyAds($userID) 
     {
         
         $this->db->select('*')->from('advertisement')->where('user_id',$userID)->where('approval',1);;
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
     
     function getImageName($adID) 
     {
        $this->db->select('advertisement_image as advertisement_image')->from('advertisement')->where('advertisement_id', $adID);
        $query = $this->db->get();
        return $query->row();
     }
     
     /*
     * Function to delete a specific advertisement posted by a user
     * 
     */
     function deleteMyAd($adID)
     {
         $image_name = $this->getImageName($adID)->advertisement_image;
         if ($image_name)
         {
             $filename = "uploads/".$image_name;
            unlink($filename);
         }
         
         
         $this->db->where('advertisement_id', $adID);
         $this->db->delete('favorite');
         
         $this->db->where('advertisement_id', $adID);
         $this->db->delete('comment');
         
         $this->db->where('advertisement_id',$advertisement_id);
         $this->db->delete('report');
         
         $this->db->where('advertisement_id',$adID);
         $this->db->delete('advertisement');
     }
     
     function deleteMyCategoryAd($table,$ad_user_id,$ad_post_date)
     {
         $this->db->where('user_id',$ad_user_id);
         $this->db->where('post_date_time',$ad_post_date);
         $this->db->delete($table);
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
    
    function getCities()
        {

            $this->db->select('*');
            $this->db->from('city');
            
            $query = $this->db->get();
            if($query->num_rows() > 0)
            {
               foreach ($query->result() as $row)
               {
                  $data[] = $row;
               }
               return $data;
            }
        }
     
     function editMyAd($adID,$advertisement_title,$advertisement_Description,$advertisement_Price,$advertisement_location,$advertisement_phonnumber,$subcategory_id,$city_id)
     {
     $update_ad_data = array(
            'advertisement_title' => $advertisement_title,
            'advertisement_Description' => $advertisement_Description,
            'advertisement_Price' => $advertisement_Price,
            'advertisement_location' => $advertisement_location,
            'advertisement_phonnumber' => $advertisement_phonnumber,
            'subcategory_id' => $subcategory_id,
            'city_id' => $city_id
                        
	);
        
        $this->db->where('advertisement_id',$adID);
	$this->db->update('advertisement',$update_ad_data);
     }
     
     function editVehicleAd($user_id,$post_date_time,$vehicle_condition,$vehicle_engine,$vehicle_manufacture_year,$vehicle_milage,$vehicle_model,$vehicle_transmission,$vehicle_brand,$vehicle_subcategory,$vehicle_type)
     {
     $update_ad_data = array(
            'vehicle_type' => $vehicle_type,
            'vehicle_brand' => $vehicle_brand,
            'vehicle_model' => $vehicle_model,
            'vehicle_manufacture_year' => $vehicle_manufacture_year,
            'vehicle_transmission' => $vehicle_transmission,
            'vehicle_milage' => $vehicle_milage,
            'vehicle_engine' => $vehicle_engine,
            'vehicle_subcategory' => $vehicle_subcategory,
            'vehicle_condition' => $vehicle_condition
                        
	);
        
        $this->db->where('user_id',$user_id);
        $this->db->where('post_date_time',$post_date_time);
        $this->db->update('vehiclead',$update_ad_data);
     }
     
     function editPropertyAd($user_id,$post_date_time,$property_address,$property_subcategory)
     {
     $update_ad_data = array(
            'property_address' => $property_address,
            'property_subcategory' => $property_subcategory
          );
        
        $this->db->where('user_id',$user_id);
        $this->db->where('post_date_time',$post_date_time);
        $this->db->update('propertyad',$update_ad_data);
     }
     
     function editElectronicAd($user_id,$post_date_time,$electronic_type,$electronic_brand,$electronic_model,$electronic_subcategory)
     {
     $update_ad_data = array(
            'electronic_type' => $electronic_type,
            'electronic_brand' => $electronic_brand,
            'electronic_model' => $electronic_model,
            'electronic_subcategory' => $electronic_subcategory
          );
        
        $this->db->where('user_id',$user_id);
        $this->db->where('post_date_time',$post_date_time);
        $this->db->update('electronicad',$update_ad_data);
     }
     
     function editHomePersonalAd($user_id,$post_date_time,$home_personal_subcategory,$home_personal_type,$sale_or_want)
     {
     $update_ad_data = array(
            'home_personal_subcategory' => $home_personal_subcategory,
            'home_personal_type' => $home_personal_type,
            'sale_or_want' => $sale_or_want
          );
        
        $this->db->where('user_id',$user_id);
        $this->db->where('post_date_time',$post_date_time);
        $this->db->update('homeandpersonalad',$update_ad_data);
     }
     
     function getOneAdDetails($adID) 
     {
         
         $this->db->select('*')->from('advertisement')->where('advertisement_id',$adID);
         $query =$this->db->get();
         
         return $query->row();
          /*if($query->num_rows() > 0)
          {
              foreach ($query->result() as $row)
              {
                $data[] = $row;
              }
              return $data;
          }*/
     }
     
  /*
  * Function to get the seller ID of a ad user when the ad ID is passed
  */
      function getAdUserID($adID) 
      {
        $this->db->select('user_id as user_id')->from('Advertisement')->where('advertisement_id',$adID);
        $query =$this->db->get();
        return $query->row();
      }
      
  /*
  * Function to get the seller ID of a ad user when the ad ID is passed
  */
      function getAdPostDate($adID) 
      {
        $this->db->select('post_date_time as post_date_time')->from('Advertisement')->where('advertisement_id',$adID);
        $query =$this->db->get();
        return $query->row();
      }
      
      function checkCategoryAd($table,$ad_user_id,$ad_post_date) 
     {
         
         $this->db->select('post_date_time as post_date_time')->from($table)->where('user_id',$ad_user_id)->where('post_date_time',$ad_post_date);
         $query =$this->db->get();
         
         return $query->row();
     }
      
     function getOneCategoryAdDetails($table,$ad_user_id,$ad_post_date) 
     {
         
         $this->db->select('*')->from($table)->where('user_id',$ad_user_id)->where('post_date_time',$ad_post_date);
         $query =$this->db->get();
         
         return $query->row();
     }
     
     function getAllAds($query) 
     {
        
        //$query = "SELECT * FROM advertisement";
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
	 
     function increasePopularity($advertisementId) 
     {
        $this->db->select('popularity')->from('advertisement')->where('advertisement_id', $advertisementId);
        $query = $this->db->get();
        $populartity = $query->row();
        $populartity = $populartity->popularity;
        $populartity++;

        $update_ad_data = array('popularity' => $populartity);
        $this->db->where('advertisement_id', $advertisementId);
        $this->db->update('advertisement', $update_ad_data);
        //ToDo
    }

}

