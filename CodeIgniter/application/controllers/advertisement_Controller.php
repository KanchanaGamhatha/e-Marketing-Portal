<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advertisement_Controller extends CI_Controller {
    /*
     * view advertisement details
     */
    public function index() 
       {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');

        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        $page_title = 'View Ads';

        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
             $this->load->view('includes/header',$page_title);
        } 
        else 
         {
            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name'],
                'page_title' => $page_title
            ));
        }
        
        $this->load->model('search_model');
        $data['categories'] = $this->search_model->getAllCategories();
        $data['locations'] = $this->search_model->getAllLocations();
        
        $this->load->model('Search_model');
        
        $search_keyword = $this->input->post('search');
        $search_category = $this->input->post('catogory_id');
        $search_location = $this->input->post('location_id');
        $search_type = $this->input->post('ad_type');
        
        $data['search_keyword'] =$search_keyword;
        $data['search_category'] =-1;
        $data['search_location'] =$search_location;
        $data['search_type'] =$search_type;
        
        $this->load->view('includes/search',$data);
        $this->load->helper('html');
        
        //Send data to advertisement view 
        $this->load->model('Advertisement');
        
        //Get advertisement details from table
        $advertisements = $this->Advertisement->get();
        
        //Create object from advertisement
        $advertisement = new Advertisement();
        
        //Category Code
        
       /*$categories = Search_model::getCategory();
        //$data['categories']=$categories;
        
        $this->load->view('category_view', array(
                    'categories' => $categories
                ));    
        $this->load->view('search_ads_view');*/
        
        /*foreach ($advertisements as $id => $advertisement) {
            $advertisement->load($id);
            $location_id = $advertisement->advertisement_location;
            $this->load->model('Location');
            $location = new Location();
            $location->load($location_id);
            //$data['location'] = $location;
            //$data['advertisement'] = $advertisement;
            
            //$data);
        }*/

        $categories = Search_model::getCategory();
        $locations = Search_model::getLocations();
        $data['categories'] = $categories;
        $data['locations'] = $locations;
        
        $this->load->view('category_view',$data);
        
        $this->load->view('all_ads_view', array(
                'advertisement' => $advertisements
            ));

        $this->load->model('Location');
        $locations = $this->Location->get();
        $location_form_options = array();
        foreach ($locations as $id => $location) {
            $location_form_options[$id] = $location->location_name;
        }
        $this->load->view('filter_view');
        $this->load->view('includes/footer');
    }
    
    
    public function check_add() 
    {
            $data['logged_in_user'] = $this->session->userdata('email');
            $email = $data['logged_in_user'];
            $this->load->model('Account_settings_model');
            $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

            //get user id from email
            $this->load->model('comment_model');
            $userID = $this->comment_model->getUserID($email);
            
            $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));
        
            $this->load->model('Advertisement');
            $advertisement = new Advertisement();
            $advertisement->catogory_id = $this->input->post('catogory_id');
            $advertisement->advertisement_title = $this->input->post('advertisement_title');
            $advertisement->advertisement_Description = $this->input->post('advertisement_Description');
            $advertisement->advertisement_Price = $this->input->post('advertisement_Price');
            $advertisement->advertisement_phonnumber = $this->input->post('advertisement_phonnumber');
            $advertisement->advertisement_location = $this->input->post('advertisement_location');
            $advertisement->user_id = $userID->user_id;
            $post_date_time = date('Y-m-d H:i:s');
            $advertisement->post_date_time = $post_date_time;
            //var_dump($this->add());
            if ($this->input->post('advertisement_image') != NULL) 
            {
                $advertisement->advertisement_image = $this->input->post('advertisement_image');
            }
            else
            {
                $advertisement->advertisement_image ="";
            }
            
            $this->load->model('Vehicle_ad');
            $vehicle_ad = new Vehicle_ad();
            $vehicle_ad->vehicle_condition = $this->input->post('vehicle_condition');
            $vehicle_ad->vehicle_engine = $this->input->post('vehicle_engine');
            $vehicle_ad->vehicle_manufacture_year = $this->input->post('vehicle_manufacture_year');
            $vehicle_ad->vehicle_milage = $this->input->post('vehicle_milage');
            $vehicle_ad->vehicle_model = $this->input->post('vehicle_model');
            $vehicle_ad->vehicle_transmission = $this->input->post('vehicle_transmission');
            $vehicle_ad->vehicle_brand = $this->input->post('vehicle_brand');
            $vehicle_ad->vehicle_subcategory = $this->input->post('vehicle_subcategory');
            $vehicle_ad->vehicle_type = $this->input->post('vehicle_type');
            $vehicle_ad->user_id = $userID->user_id;
            $vehicle_ad->post_date_time = $post_date_time;
            
            $this->load->model('Electronic_ad');
            $electronic_ad = new Electronic_ad();
            $electronic_ad->electronic_type = $this->input->post('electronic_type');
            $electronic_ad->electronic_brand = $this->input->post('electronic_brand');
            $electronic_ad->electronic_model = $this->input->post('electronic_model');
            $electronic_ad->electronic_subcategory = $this->input->post('electronic_subcategory');
            $electronic_ad->user_id = $userID->user_id;
            $electronic_ad->post_date_time = $post_date_time;
            
            
            //Load model and create object
            $this->load->model('Home_and_personal_ad');
            $home_and_personal_ad = new Home_and_personal_ad();
            
            //Set values to database from the form post
            $home_and_personal_ad->home_personal_subcategory = $this->input->post('home_personal_subcategory');
            $home_and_personal_ad->home_personal_type = $this->input->post('home_personal_type');
            $home_and_personal_ad->sale_or_want = $this->input->post('sale_or_want');
            $home_and_personal_ad->post_date_time = $post_date_time;
            $home_and_personal_ad->user_id = $userID->user_id;
            
             //Load model and create object
            $this->load->model('Property_ad');
            $property_ad = new Property_ad();
            
            //Set values to database from the form post
            $property_ad->property_address = $this->input->post('property_address');
            $property_ad->property_subcategory = $this->input->post('property_subcategory');
            $property_ad->user_id = $userID->user_id;
            $property_ad->post_date_time= $post_date_time;
            
            if($vehicle_ad->vehicle_model != NULL)
            {
                $advertisement->save();
                $vehicle_ad->save();
            }
            else if($property_ad->property_address != NULL)
            {
                $advertisement->save();
                $property_ad->save();
            }
            
            else if($electronic_ad->electronic_brand != NULL)
            {
                //insert electronic advertisement
                $advertisement->save();
                $electronic_ad->save();
            }
            
            else if ($home_and_personal_ad->home_personal_type != NULL)
            {
                $advertisement->save();
                $home_and_personal_ad->save();
            }
            else 
            {
                $advertisement->save();
            }
            
            $this->load->view('advertisement_form_success');
            
            $this->load->view('includes/footer');
    }
    
    /*
    * Add advertisement details
    */
    
    
    public function add() 
        {
        
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];
        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        //get user id from email
        $this->load->model('comment_model');
        $userID = $this->comment_model->getUserID($email);
        
        $this->load->model('account_settings_model');
        $data['logged_in_user_location'] = $this->account_settings_model->get_user_location($email);
        $data['logged_in_user_phone'] = $this->account_settings_model->get_user_phone($email);
        $data['logged_in_user_city'] = $this->account_settings_model->get_user_city($email);
        
        $this->checkLogin();
        
        $page_title = 'Post an Ad';
        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name'],
            'page_title' => $page_title
        ));

        $config = array(
            'upload_path' => './uploads',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => '4000',
        );
        $this->load->library('upload', $config);

        $this->load->helper('form');

        //Populate Location
        $this->load->model('Location');
        $locations = $this->Location->get();
        $location_form_options = array();
        foreach ($locations as $id => $location) {
            $location_form_options[$id] = $location->location_name;
        }

        //Populate Catogory
        $this->load->model('Catogory');
        $Catogories = $this->Catogory->get();
        $catogory_form_options = array();
        foreach ($Catogories as $id => $catogory) {
            $catogory_form_options[$id] = $catogory->catogory_name;
        }

        //Validate form filed
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'advertisement_title',
                'label' => 'Title',
                'rules' => 'required|apha',
            ),
            array(
                'field' => 'catogory_id',
                'label' => 'Catogory',
                'rules' => 'required',
            ),
            array(
                'field' => 'advertisement_Description',
                'label' => 'Description',
                'rules' => 'required',
            ),
            array(
                'field' => 'location_id',
                'label' => 'Location',
                'rules' => 'required',
            ),
            array(
                'field' => 'advertisement_Price',
                'label' => 'Price',
                'rules' => 'required|is_numeric',
            ),
            array(
                'field' => 'advertisement_phonnumber',
                'label' => 'Phone number',
                'rules' => 'required|is_numeric|max_length[10]|min_length[10]',
            ),
        ));
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        $check_file_upload = FALSE;
        if (isset($_FILES['issue_cover']['error']) && $_FILES['issue_cover']['error'] != 4) 
        {
            $check_file_upload = TRUE;
        }
        if (!$this->form_validation->run() || ($check_file_upload && !$this->upload->do_upload('issue_cover'))) 
         {

            $this->load->view('advertisement_form', array(
                'location_form_options' => $location_form_options,
                'locations' => $locations,
                'catogory_form_options' => $catogory_form_options,
                'logged_in_user_name' => $data['logged_in_user_name'],
                'logged_in_user_location' => $data['logged_in_user_location'],
                'logged_in_user_phone' => $data['logged_in_user_phone'],
                'logged_in_user_city' => $data['logged_in_user_city']
            ));
        } 
        else 
        {
            $this->load->model('Advertisement');
            $advertisement = new Advertisement();
            $advertisement->catogory_id = $this->input->post('catogory_id');
            $advertisement->advertisement_title = $this->input->post('advertisement_title');
            $advertisement->advertisement_Description = $this->input->post('advertisement_Description');
            $advertisement->advertisement_Price = $this->input->post('advertisement_Price');
            $advertisement->advertisement_phonnumber = $this->input->post('advertisement_phonnumber');
            $advertisement->advertisement_location = $this->input->post('location_id');
            $advertisement->user_id = $userID->user_id;
            $post_date_time = date('Y-m-d H:i:s');
            $advertisement->post_date_time = $post_date_time;
            //var_dump($this->add());
            $upload_data = $this->upload->data();
            if (isset($upload_data['file_name'])) 
            {
                $advertisement->advertisement_image = $upload_data['file_name'];
                
//                $config['image_library'] = 'gd2';
//                $config['source_image'] = 'gd2';
            }
            
            
            $this->load->model('Vehicle_ad');
            $vehicle_ad = new Vehicle_ad();
            $vehicle_ad->vehicle_condition = $this->input->post('vehicle_condition');
            $vehicle_ad->vehicle_engine = $this->input->post('vehicle_engine');
            $vehicle_ad->vehicle_manufacture_year = $this->input->post('vehicle_manufacture_year');
            $vehicle_ad->vehicle_milage = $this->input->post('vehicle_milage');
            $vehicle_ad->vehicle_model = $this->input->post('vehicle_model');
            $vehicle_ad->vehicle_transmission = $this->input->post('vehicle_transmission');
            $vehicle_ad->vehicle_brand = $this->input->post('vehicle_brand');
            $vehicle_ad->vehicle_subcategory = $this->input->post('vehicle_subcategory');
            $vehicle_ad->vehicle_type = $this->input->post('vehicle_type');
            $vehicle_ad->user_id = $userID->user_id;
            $vehicle_ad->post_date_time = $post_date_time;
            
            
            
            $this->load->model('Electronic_ad');
            $electronic_ad = new Electronic_ad();
            $electronic_ad->electronic_type = $this->input->post('electronic_type');
            $electronic_ad->electronic_brand = $this->input->post('electronic_brand');
            $electronic_ad->electronic_model = $this->input->post('electronic_model');
            $electronic_ad->electronic_subcategory = $this->input->post('electronic_subcategory');
            $electronic_ad->user_id = $userID->user_id;
            $electronic_ad->post_date_time = $post_date_time;
            
            
            //Load model and create object
            $this->load->model('Home_and_personal_ad');
            $home_and_personal_ad = new Home_and_personal_ad();
            
            //Set values to database from the form post
            $home_and_personal_ad->home_personal_subcategory = $this->input->post('home_personal_subcategory');
            $home_and_personal_ad->home_personal_type = $this->input->post('home_personal_type');
            $home_and_personal_ad->sale_or_want = $this->input->post('sale_or_want');
            $home_and_personal_ad->post_date_time = $post_date_time;
            $home_and_personal_ad->user_id = $userID->user_id;
            
             //Load model and create object
            $this->load->model('Property_ad');
            $property_ad = new Property_ad();
            
            //Set values to database from the form post
            $property_ad->property_address = $this->input->post('property_address');
            $property_ad->property_subcategory = $this->input->post('property_subcategory');
            $property_ad->user_id = $userID->user_id;
            $property_ad->post_date_time= $post_date_time;
            
            //Call the save function
            //insert advertisement
            $this->load->view('check_ad', array(
                'advertisement' => $advertisement,
                'vehicle_ad' => $vehicle_ad,
                'electronic_ad' => $electronic_ad,
                'home_and_personal_ad' => $home_and_personal_ad,
                'property_ad' => $property_ad
            ));
            
            /*if($vehicle_ad->vehicle_model != NULL)
            {
                $advertisement->save();
                $vehicle_ad->save();
            }
            
            else if($property_ad->property_address != NULL)
            {
                $advertisement->save();
                $property_ad->save();
            }
            
            else if($electronic_ad->electronic_brand != NULL)
            {
                //insert electronic advertisement
                $advertisement->save();
                $electronic_ad->save();
            }
            
            else if ($home_and_personal_ad->home_personal_type != NULL)
            {
                $advertisement->save();
                $home_and_personal_ad->save();
            }
            
            else 
            {
                $advertisement->save();
            }*/
            //load the success view
//            $this->load->view('advertisement_form_success', array(
//                'advertisement' => $advertisement,
//            ));
            }
        $this->load->view('includes/footer');
    }
    
    /*
     * View one advertisement details
     */

    public function view($advertisement_id) 
        {
        $this->load->model(array('Advertisement'));// what is the array?
        //get date and user id of $advertisement_id
        $advertisement = new Advertisement();
        $advertisement->load($advertisement_id);
        
        $ad_user_id = $advertisement->user_id;
        $ad_post_date = $advertisement->post_date_time;
        
        $sub_category_name='Other';
        $sub_category_id = 0;
        /*
         * Check whether an vehicle ad and get details
         */
        $this->load->model('Vehicle_ad');
        
        $vehicle_ad = new Vehicle_ad();
        $vehicle_ads = $this->Vehicle_ad->get();
        
        $vehicle_ad_data = new Vehicle_ad();
        
        foreach ($vehicle_ads as $id => $vehicle_ad) {
            $vehicle_ad_user_id = $vehicle_ad->user_id;
            $vehicle_ad_post_date = $vehicle_ad->post_date_time;
            if(($vehicle_ad_user_id ==  $ad_user_id ) && ($vehicle_ad_post_date == $ad_post_date))
            {
                $vehicle_ad_id = $vehicle_ad->vehicle_ad_id;
                
                $vehicle_ad_data->load($vehicle_ad_id);
                $sub_category_id = $vehicle_ad->vehicle_subcategory;
                
                $sub_category_name = $this->getSubctegoryName('Vehicle_ad_sub_category', 'vehicle_subcategory_id', $sub_category_id, 'vehicle_subcategory_name');
                
            }
        }
        //get all electronic ads
        
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
                $sub_category_id = $electronic_ad->electronic_subcategory;
                
                $sub_category_name = $this->getSubctegoryName('Electronic_ad_sub_category', 'electronic_subcategory_id', $sub_category_id, 'electronic_subcategory_name');
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
                
                $sub_category_id = $home_and_personal_ad->home_personal_subcategory;
                
                $sub_category_name = $this->getSubctegoryName('Home_and_personal_ad_sub_category', 'home_personal_subcategory_id', $sub_category_id, 'home_personal_subcategory_name');
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
                
                $sub_category_id = $property_ad->property_subcategory;
                
                $sub_category_name = $this->getSubctegoryName('Property_ad_sub_category', 'property_subcategory_id', $sub_category_id, 'property_subcategory_name');
            }
        }
        
        $this->load->model('Location');
        $locations = $this->Location->get();
        $location = new Location();
        
        foreach ($locations as $id => $location) {
            if( $advertisement->advertisement_location == $location->location_id) 
            {
                $location_name = $location->location_name;
            }
        }
        
        
        $this->load->helper('html');

        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];
        $this->load->model('Account_settings_model');

        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        if (!isset($is_logged_in) || $is_logged_in != true) {

            $this->load->view('includes/header');
        } 
        else
        {
            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));
        }

        

        //Load email_model
        $this->load->model('email_model');

        //Getting the sellers user ID from ad ID
        $sellers_user_id = $this->email_model->get_user_id($advertisement_id);

        //Getting the sellers email from sellers user ID
        $data['sellers_email'] = $this->email_model->get_user_email($sellers_user_id->user_id);

        /*$advertisement = new Advertisement();
        $advertisement->load($advertisement_id);
        */
        
        //Show erro if not have advertisement id
        if (!$advertisement->advertisement_id)
        {
            show_404();
        }

        
        //Rating model functions
        
        $this->load->model('rating_model');
        $userID = $this->rating_model->getUserID($advertisement_id);
        $data['currentRating'] = $this->rating_model->getCurrentRating($userID->user_id);
        $data['seller_type'] = $this->rating_model->get_seller_type($sellers_user_id->user_id);
                
        //Loading the comment model 

        $this->load->model('comment_model');
        $data['records'] = $this->comment_model->getComment($advertisement_id);
        $data['sellerName'] = $this->comment_model->getUsername($data['sellers_email']->email);
        
        
        $this->load->view('one_ad_details', array(
            'advertisement' => $advertisement,
            'location_name' => $location_name,
            'sub_category_id' => $sub_category_id,
            'sub_category_name' => $sub_category_name,
            'electronic_ad_data' => $electronic_ad_data,
            'home_and_personal_ad_data' => $home_and_personal_ad_data,
            'vehicle_ad_data' => $vehicle_ad_data,
            'property_ad_data' => $property_ad_data,
            'sellerName' => $data['sellerName'],
            'currentRating' => $data['currentRating'] ,
            'seller_type' => $data['seller_type'],
            'sellers_email' => $data['sellers_email']
        ));




        $this->load->view('comment_view', array(
            'records' => $data['records'],
            'advertisement_id' => $advertisement_id
        ));
        //Loading the comment model & get comment function
        //Loading the email view with sellers email
        $this->load->model('search_model');
        $category_id = $this->search_model->getCategoryID($advertisement_id);
        $data['related_ads'] = $this->search_model->getRelatedAds($category_id->catogory_id);
        
         $this->load->view('related_ads_view', array(
            'related_ads' => $data['related_ads']
        ));
        /* $this->load->view('send_emai_view', array(
          'sellers_email' => $data['sellers_email']
          ));

         */

        $this->load->view('includes/footer');
    }

    function checkLogin() {


        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {

            redirect('login', $data);
        }
    }
    
    function  loadVehicalForm(){
        $this->load->helper('form');
        
        $this->load->model('Vehicle_ad_sub_category');
        $vehicle_ad_sub_category = new Vehicle_ad_sub_category();
       
        $vehicle_ad_sub_categories = $this->Vehicle_ad_sub_category->get();
        $vehicle_ad_sub_category_form_options = array();
        foreach ($vehicle_ad_sub_categories as $id => $vehicle_ad_sub_category) {
            $vehicle_ad_sub_category_form_options[$id] = $vehicle_ad_sub_category->vehicle_subcategory_name;
        }
        
        $this->load->view('ajax_category/vehicle',array(
                'vehicle_ad_sub_category_form_options' => $vehicle_ad_sub_category_form_options
            ));
        
    }

    function  loadElectronicForm(){
        $this->load->helper('form');
        
        
        $this->load->model('Electronic_ad_sub_category');
        $electronic_ad_sub_category = new Electronic_ad_sub_category();
       
        $electronic_ad_sub_categories = $this->Electronic_ad_sub_category->get();
        $electronic_ad_sub_category_form_options = array();
        foreach ($electronic_ad_sub_categories as $id => $electronic_ad_sub_category) {
            $electronic_ad_sub_category_form_options[$id] = $electronic_ad_sub_category->electronic_subcategory_name;
        }
        
        $this->load->view('ajax_category/electronic',array(
                'electronic_ad_sub_category_form_options' => $electronic_ad_sub_category_form_options
            ));
    }
    
    function  loadHomeAndPersonalForm(){
        $this->load->helper('form');
        
        $this->load->model('Home_and_personal_ad_sub_category');
        $home_personal_ad_sub_category = new Home_and_personal_ad_sub_category();
       
        $home_personal_ad_sub_categories = $this->Home_and_personal_ad_sub_category->get();
        $home_personal_ad_sub_category_form_options = array();
        
        foreach ($home_personal_ad_sub_categories as $id => $home_personal_ad_sub_category) {
            $home_personal_ad_sub_category_form_options[$id] = $home_personal_ad_sub_category->home_personal_subcategory_name;
        }
        
        $this->load->view('ajax_category/home_and_personal',array(
                'home_personal_ad_sub_category_form_options' => $home_personal_ad_sub_category_form_options
            ));
    }

    function  loadPropertyForm(){
        $this->load->helper('form');
        
        $this->load->model('Property_ad_sub_category');
        $property_ad_sub_category = new Property_ad_sub_category();
       
        $property_ad_sub_categories = $this->Property_ad_sub_category->get();
        $property_ad_sub_category_form_options = array();
        
        foreach ($property_ad_sub_categories as $id => $property_ad_sub_category) {
            $property_ad_sub_category_form_options[$id] = $property_ad_sub_category->property_subcategory_name;
        }
        $this->load->view('ajax_category/property',array(
                'property_ad_sub_category_form_options' => $property_ad_sub_category_form_options
            ));
    }
    
   function getSubctegoryName($table,$id_field,$sub_category_id,$sub_category_name)
    {
        $this->load->model($table);
                $sub_categories = $this->$table->get();
                $sub_category = new $table();
        
                foreach ($sub_categories as $id => $sub_category) {
                    if( $sub_category->$id_field == $sub_category_id ) 
                    {
                        //$location_name = $location->location_name;
                        return $sub_category->$sub_category_name;
                    }
                }
    }
     /*
    function getVehicleSubctegoryName($sub_category_id)
    {
                $this->load->model('Vehicle_ad_sub_category');
                $sub_categories = $this->Vehicle_ad_sub_category->get();
                $sub_category = new Vehicle_ad_sub_category();
        
                foreach ($sub_categories as $id => $sub_category) {
                    if( $sub_category->vehicle_subcategory_id == $sub_category_id ) 
                    {
                        //$location_name = $location->location_name;
                        return $sub_category->$sub_category_name;
                    }
                }
    }*/
    
}
