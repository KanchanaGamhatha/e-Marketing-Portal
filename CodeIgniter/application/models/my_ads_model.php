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
         
         $this->db->select('*')->from('advertisement')->where('user_id',$userID);
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
     * Function to delete a specific advertisement posted by a user
     * 
     */
     function deleteMyAd($adID)
     {
         $this->db->where('advertisement_id',$adID);
         $this->db->delete('advertisement');
         
         $this->db->where('advertisement_id', $adID);
         $this->db->delete('favorite');
         
         $this->db->where('advertisement_id', $adID);
         $this->db->delete('comment');
     }
     
     function deleteMyCategoryAd($table,$ad_user_id,$ad_post_date)
     {
         $this->db->where('user_id',$ad_user_id);
         $this->db->where('post_date_time',$ad_post_date);
         $this->db->delete($table);
     }
     
     function editMyAd($adID,$advertisement_title,$advertisement_Description,$advertisement_Price,$advertisement_location,$advertisement_phonnumber)
     {
     $update_ad_data = array(
            'advertisement_title' => $advertisement_title,
            'advertisement_Description' => $advertisement_Description,
            'advertisement_Price' => $advertisement_Price,
            'advertisement_location' => $advertisement_location,
            'advertisement_phonnumber' => $advertisement_phonnumber
                        
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
     
}

