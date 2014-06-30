<?php

/*
 * Class My_ads_controller which handles tasks related to view and deleting of advertisements
 *  posted by a specific user
 * 
 */

class My_ads_controller extends CI_Controller {

    public function index() 
   {
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        //If the user is not logged in redirect to login page
        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
            $data['no_rights'] = "You Don't have access to Account area. Please Login";
            $this->load->view('includes/header');
            $this->load->view('login_form', $data);
            $this->load->view('includes/footer');
        }
        // else load the page
        else 
        {
            $this->ViewLoad();
        }
    }
    
    /*
    * Function to load the page
    */
    public function ViewLoad() 
    {
        //Get the email address of logged user    
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        //Getting the user name of the logged user by using the email and store in variables
        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        //Load the header by providing the logged users name
        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));
        
        $this->load->model('my_ads_model');
        //Get the user id of currently logged user
        $userID = $this->my_ads_model->getUserID($email);
        
        //Get all details about the advertisements posted by the current user
        $data['myAds'] = $this->my_ads_model->getMyAds($userID->user_id);
        
        //Load the page by passing the details of advertisemnts
        
        $this->load->view('my_ads_view', array(
            'logged_in_user_name' => $data['logged_in_user_name'],
            'myAds' => $data['myAds']
        ));
        $this->load->view('includes/footer');
    }
/*
 * Function to delete a specific advertisement
 */
    public function deleteMyAd($adID)
    {
        
        $this->load->model('my_ads_model');
        
        
        //Load Advertisement model
        $this->load->model(array('Advertisement'));// what is the array?
        //get date and user id of $advertisement_id
        $advertisement = new Advertisement();
        $advertisement->load($adID);
        
        $ad_user_id = $advertisement->user_id;
        $ad_post_date = $advertisement->post_date_time;
        
        $this->my_ads_model->deleteMyCategoryAd('vehiclead',$ad_user_id,$ad_post_date);
        $this->my_ads_model->deleteMyCategoryAd('propertyad',$ad_user_id,$ad_post_date);
        $this->my_ads_model->deleteMyCategoryAd('electronicad',$ad_user_id,$ad_post_date);
        $this->my_ads_model->deleteMyCategoryAd('homeandpersonalad',$ad_user_id,$ad_post_date);
                
        $this->my_ads_model->deleteMyAd($adID);
        $this->ViewLoad();
        
    }
    
    public function viewEditMyAd($adID)
    {
        
        //Get the email address of logged user    
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        //Getting the user name of the logged user by using the email and store in variables
        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        //Load the header by providing the logged users name
        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));
        $this->load->model('my_ads_model');
        $data['one_ad_details'] = $this->my_ads_model->getOneAdDetails($adID);
        
        $this->load->model('search_model');
        $data['categories'] = $this->search_model->getAllCategories();
        $data['locations'] = $this->search_model->getAllLocations();
        //$data['ad_id']=$adID;
        
        $this->load->model(array('Advertisement'));// what is the array?
        //get date and user id of $advertisement_id
        $advertisement = new Advertisement();
        $advertisement->load($adID);
        
        $ad_user_id = $advertisement->user_id;
        $ad_post_date = $advertisement->post_date_time;
        
        /*$ad_user_id = $this->my_ads_model->getAdUserID($adID);
        $ad_post_date = $this->my_ads_model->getAdPostDate($adID);
        
        $vehicle_ad_post_date = $this->my_ads_model->checkCategoryAd('vehiclead',$ad_user_id->user_id,$ad_post_date->post_date_time);
        
        if($vehicle_ad_post_date->post_date_time == $ad_post_date->post_date_time)
        {
            $data['one_category_ad_details'] = $this->search_model->getOneCategoryAdDetails('vehiclead',$ad_user_id->user_id,$ad_post_date->post_date_time);
        }
        
        $electronic_ad_post_date = $this->my_ads_model->checkCategoryAd('vehiclead',$ad_user_id->user_id,$ad_post_date->post_date_time);
        
        if($electronic_ad_post_date->post_date_time == $ad_post_date->post_date_time)
        {
            $data['one_category_ad_details'] = $this->search_model->getOneCategoryAdDetails('electronicad',$ad_user_id->user_id,$ad_post_date->post_date_time);
        }*/
        
            /*
             * Check whether an vehicle ad and get details
             */
            $this->load->model('Vehicle_ad');

            $vehicle_ad = new Vehicle_ad();
            $vehicle_ads = $this->Vehicle_ad->get();
            $vehicle_ad_data = new Vehicle_ad();


            foreach ($vehicle_ads as $vehicle_ad) {
                $vehicle_ad_user_id = $vehicle_ad->user_id;
                $vehicle_ad_post_date = $vehicle_ad->post_date_time;
                if(($vehicle_ad_user_id ==  $ad_user_id ) && ($vehicle_ad_post_date == $ad_post_date))
                {
                    $vehicle_ad_id = $vehicle_ad->vehicle_ad_id;
                    $vehicle_ad_data->load($vehicle_ad_id);
                }
            }
            
             /*
         * Check whether an electronic ad and get details
         */
        $this->load->model('Electronic_ad');
        $electronic_ad = new Electronic_ad();
        $electronic_ads = $this->Electronic_ad->get();
        
        $electronic_ad_data = new Electronic_ad();
        
        foreach ($electronic_ads as $id => $electronic_ad) {
            $electronic_ad_user_id = $electronic_ad->user_id;
            $electronic_ad_post_date = $electronic_ad->post_date_time;
            if(($electronic_ad_user_id ==  $ad_user_id ) && ($electronic_ad_post_date == $ad_post_date))
            {
                $electronic_ad_id = $electronic_ad->electron_ad_id;
                $electronic_ad_data->load($electronic_ad_id);
            }
        }
        
        /*
         * Check whether an Home_and_personal ad and get details
         */
        $this->load->model('Home_and_personal_ad');
        
        $home_and_personal_ad = new Home_and_personal_ad();
        $home_and_personal_ads = $this->Home_and_personal_ad->get();
        
        $home_and_personal_ad_data = new Home_and_personal_ad();
        
        foreach ($home_and_personal_ads as $id => $home_and_personal_ad) {
            $home_and_personal_ad_user_id = $home_and_personal_ad->user_id;
            $home_and_personal_ad_post_date = $home_and_personal_ad->post_date_time;
            if(($home_and_personal_ad_user_id ==  $ad_user_id ) && ($home_and_personal_ad_post_date == $ad_post_date))
            {
                $home_and_personal_ad_id = $home_and_personal_ad->home_personal_ad_id;
                $home_and_personal_ad_data->load($home_and_personal_ad_id);
            }
        }
        
        /*
         * Check whether an property ad and get details
         */
        $this->load->model('Property_ad');
        
        $property_ad = new Property_ad();
        $property_ads = $this->Property_ad->get();
        
        $property_ad_data = new Property_ad();
        
        foreach ($property_ads as $id => $property_ad) {
            $property_ad_user_id = $property_ad->user_id;
            $property_ad_post_date = $property_ad->post_date_time;
            if(($property_ad_user_id ==  $ad_user_id ) && ($property_ad_post_date == $ad_post_date))
            {
                $property_ad_id = $property_ad->property_ad_id;
                $property_ad_data->load($property_ad_id);
            }
        }
        
        $this->load->model('Vehicle_ad_sub_category');
        $vehicle_ad_sub_category = new Vehicle_ad_sub_category();
       
        $vehicle_ad_sub_categories = $this->Vehicle_ad_sub_category->get();
        $vehicle_ad_sub_category_form_options = array();
        foreach ($vehicle_ad_sub_categories as $id => $vehicle_ad_sub_category) {
            $vehicle_ad_sub_category_form_options[$id] = $vehicle_ad_sub_category->vehicle_subcategory_name;
        }
        
        $this->load->model('Electronic_ad_sub_category');
        $electronic_ad_sub_category = new Electronic_ad_sub_category();
       
        $electronic_ad_sub_categories = $this->Electronic_ad_sub_category->get();
        $electronic_ad_sub_category_form_options = array();
        foreach ($electronic_ad_sub_categories as $id => $electronic_ad_sub_category) {
            $electronic_ad_sub_category_form_options[$id] = $electronic_ad_sub_category->electronic_subcategory_name;
        }
        
        $this->load->model('Home_and_personal_ad_sub_category');
        $home_personal_ad_sub_category = new Home_and_personal_ad_sub_category();
       
        $home_personal_ad_sub_categories = $this->Home_and_personal_ad_sub_category->get();
        $home_personal_ad_sub_category_form_options = array();
        
        foreach ($home_personal_ad_sub_categories as $id => $home_personal_ad_sub_category) {
            $home_personal_ad_sub_category_form_options[$id] = $home_personal_ad_sub_category->home_personal_subcategory_name;
        }
        
        $this->load->model('Property_ad_sub_category');
        $property_ad_sub_category = new Property_ad_sub_category();
       
        $property_ad_sub_categories = $this->Property_ad_sub_category->get();
        $property_ad_sub_category_form_options = array();
        
        foreach ($property_ad_sub_categories as $id => $property_ad_sub_category) {
            $property_ad_sub_category_form_options[$id] = $property_ad_sub_category->property_subcategory_name;
        }
        
        $this->load->view('edit_ad_view', array(
            'ad_id' => $adID,
            'ad_user_id' => $ad_user_id,
            'ad_post_date' =>$ad_post_date,
            'one_ad_details' => $data['one_ad_details'],
            'categories' => $data['categories'],
            'locations' => $data['locations'],
            'vehicle_ad_data' => $vehicle_ad_data,
            'vehicle_ad_sub_category_form_options' => $vehicle_ad_sub_category_form_options,
            'electronic_ad_data' => $electronic_ad_data,
            'electronic_ad_sub_category_form_options' => $electronic_ad_sub_category_form_options,
            'home_and_personal_ad_data' => $home_and_personal_ad_data,
            'home_personal_ad_sub_category_form_options' => $home_personal_ad_sub_category_form_options,
            'property_ad_data' => $property_ad_data,
            'property_ad_sub_category_form_options' => $property_ad_sub_category_form_options
         ));
        
        $this->load->view('includes/footer');
        
        //$this->my_ads_model->editMyAd($adID);
        
      }
       
      public function editMyAd() 
      {

        $advertisement_title = $this->input->post('advertisement_title');
        $catogory_id = $this->input->post('catogory_id');
        $advertisement_Description = $this->input->post('advertisement_Description');
        $advertisement_Price = $this->input->post('advertisement_Price');
        $advertisement_location = $this->input->post('location_id');
        $advertisement_phonnumber = $this->input->post('advertisement_phonnumber');
        $user_id = $this->input->post('ad_user_id');
        $post_date_time = $this->input->post('ad_post_date');
        
        $this->load->model('my_ads_model');
        
        if($catogory_id == 1)
        {
            $vehicle_condition = $this->input->post('vehicle_condition');
            $vehicle_engine = $this->input->post('vehicle_engine');
            $vehicle_manufacture_year = $this->input->post('vehicle_manufacture_year');
            $vehicle_milage = $this->input->post('vehicle_milage');
            $vehicle_model = $this->input->post('vehicle_model');
            $vehicle_transmission = $this->input->post('vehicle_transmission');
            $vehicle_brand = $this->input->post('vehicle_brand');
            $vehicle_subcategory = $this->input->post('vehicle_subcategory');
            $vehicle_type = $this->input->post('vehicle_type');
            
            $this->my_ads_model->editVehicleAd($user_id,$post_date_time,$vehicle_condition,$vehicle_engine,$vehicle_manufacture_year,$vehicle_milage,$vehicle_model,$vehicle_transmission,$vehicle_brand,$vehicle_subcategory,$vehicle_type);
            
        }
        
        else if($catogory_id == 2)
        {
            $property_address = $this->input->post('property_address');
            $property_subcategory = $this->input->post('property_subcategory');
            $this->my_ads_model->editPropertyAd($user_id,$post_date_time,$property_address,$property_subcategory);
        }
        
        else if($catogory_id == 3)
        {
            $electronic_type = $this->input->post('electronic_type');
            $electronic_brand = $this->input->post('electronic_brand');
            $electronic_model = $this->input->post('electronic_model');
            $electronic_subcategory = $this->input->post('electronic_subcategory');
            $this->my_ads_model->editElectronicAd($user_id,$post_date_time,$electronic_type,$electronic_brand,$electronic_model,$electronic_subcategory);
        }
        
        else if($catogory_id == 4)
        {
            $home_personal_subcategory = $this->input->post('home_personal_subcategory');
            $home_personal_type = $this->input->post('home_personal_type');
            $sale_or_want = $this->input->post('sale_or_want');
            $this->my_ads_model->editHomePersonalAd($user_id,$post_date_time,$home_personal_subcategory,$home_personal_type,$sale_or_want);
        }
        $adID = $this->input->post('ad_id');
        //$this->load->model('my_ads_model');
        $this->my_ads_model->editMyAd($adID, $advertisement_title, $advertisement_Description, $advertisement_Price, $advertisement_location, $advertisement_phonnumber);
        $this->ViewLoad();
      }

}
