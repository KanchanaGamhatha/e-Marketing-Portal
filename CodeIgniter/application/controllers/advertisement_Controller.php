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
        
        $this->load->model('my_ads_model');
        $this->load->model('Search_model');
        
        //Get advertisement details from table
        $categories = Search_model::getCategory();
        $locations = Search_model::getLocations();
        
        $ElectronicSubcategory =Search_model::getSubcategory(3);
        $VehicleSubCategory =Search_model::getSubcategory(1);
        $HomeAndPersonalSubcategory =Search_model::getSubcategory(4);
        $PropertySubcategory =Search_model::getSubcategory(2);
        
        $this->load->model('ad_access_model');
        
        //Get advertisement details from table
        $data['advertisements'] = $this->ad_access_model->get_approved_ads();
        
        $data['categories'] =$categories;
        $data['locations'] =$locations;
        $data['ElectronicSubcategory'] =$ElectronicSubcategory;
        $data['VehicleSubCategory'] =$VehicleSubCategory;
        $data['HomeAndPersonalSubcategory'] =$HomeAndPersonalSubcategory;
        $data['PropertySubcategory'] =$PropertySubcategory;
        
        
        $this->load->view('newAddsView',$data);
        $this->load->view('includes/footer');
        
       
        
    }
    
       
    /*
    * check_email function to check for a email address in the given text by splitting 
    * it into word
    */
   function check_email($description) 
   {
       $email_expr = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
       $keywords = preg_split("/[\s,]+/", $description);
       
       foreach ($keywords as $value) 
       {
           if(preg_match($email_expr, $value))
            {
                return FALSE;
            }
       }
       return TRUE;
       
   }
   
   /*
    * check_url function to check for a url in the given text by splitting 
    * it into word
    */
   function check_url($description) 
   {
       $url_expr = "/(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
       $keywords = preg_split("/[\s,]+/", $description);
       
       foreach ($keywords as $value) 
       {
            if(preg_match($url_expr, $value))
            {
                return FALSE;
            }
            
       }
       return TRUE;
   }
    
   /*
    * check_contact function to check for a phone number in the given text by splitting 
    * it into word
    */
   function check_contact($description) 
   {
       $email_expr = "/^([0-9]{9,11})$/";
       $keywords = preg_split("/[\s,]+/", $description);
       
       foreach ($keywords as $value) 
       {
           if(preg_match($email_expr, $value))
            {
                return FALSE;
            }
       }
       return TRUE;
       
   }
    
   /*
    * check_rule function to check given text  consists of unallowed text retrived from database table
    * by splitting it into word
    */
    function check_rule($description,$seller_email) 
    {
        $this->load->model('Rules_model');
        $keywords = preg_split("/[\s,]+/", $description);
        $error = FALSE;
        foreach ($keywords as $value) 
        {
            $rules = $this->Rules_model->getRules();
            foreach ($rules as $rule) 
            {
                if (strtoupper ($rule->rule_text) == strtoupper ($value))
                {
                    $error = TRUE;
                }
            }
        }
        
        if($error == TRUE)
        {
            $this->send_approve_email('Ad rejected due to violation of rules', $seller_email);
            return FALSE;
        }
        if($error == FALSE)
        {
            $this->send_approve_email('Ad sent for mannual approval', $seller_email);
            return TRUE;
        }
        
    }
    
    /*
     * send_approve_email function which send an email to the seller whether ad was rejected or not
     * 
     */
    public function send_approve_email($message_text,$seller_email) 
    {
        $message = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0EDE4;"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#333333;"> <tr> <td align="center" valign="top"><div width="600" height="140" border="0" style="display:block"><h2 style="color: #ffffff">Email by eMarketting Portal</h2></td> </tr> </table> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" > <tr> <td width="520" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;"> <h3>'; 
        $message = $message . '<u style="color: #0066cc; font-weight: bolder"></u> Advertisement Approval <u style="color: #0066cc; font-weight: bolder"> </u></h3> <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;"><hr> '; 
        $message = $message . $message_text;  
        $message = $message . '</p> </tr> </table> <table width="600" height="108" border="0" cellspacing="0" cellpadding="0" style="background-color:#4C4D4F; margin-bottom:50px;" > <tr> <td align="center"> <table width="600" height="88" border="0" cellspacing="0" cellpadding="0" > <tr> <td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"><p style="font-family:Helvetica, Arial;font-size:12px;color:#fefefe;line-height:18px; text-align:left;"><a href="http://www.utk.edu/" style="color:#fefefe; text-decoration:none;">CONTACT US<br> </a><a href="" style="color:#fefefe; text-decoration:none;">eMarketting Portal</a><br> E-mail: <a href="" style="color:#ffffff; text-decoration:none;">info@emarketting.lk</a><br></p></td> </tr> </table></td> </tr> </table></td> </tr></table>';

        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'validation' => TRUE,
            'smtp_timeout' => 300,
            'smtp_port' => 465,
            'smtp_user' => 'wesep004@gmail.com',
            'smtp_pass' => 'WESEP004@sliit',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE

            );

            //Loding the email library with the provided configurations
            $this->load->library('email' ,$config);
            
            //Setting up the fields of the email
            
            $this->email->set_newline("\r\n");
            $this->email->from('wesep004@gmail.com', 'E Marketting Portal');
            $this->email->to($seller_email);
            $this->email->subject('e Marketting Portal Ad Approval');
            $this->email->message($message);
            
            $this->email->send();
    }
    
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
        $cities = $this->account_settings_model->getCities($data['logged_in_user_location']->location_id);
        
        $this->checkLogin();
        
        $page_title = 'Post an Ad';
        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name'],
            'page_title' => $page_title
        ));

        $config = array(
            'upload_path' => './uploads',
            'allowed_types' => 'gif|jpg|png|jpeg',
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
                'cities' => $cities,
                'catogory_form_options' => $catogory_form_options,
                'logged_in_user_name' => $data['logged_in_user_name'],
                'logged_in_user_location' => $data['logged_in_user_location'],
                'logged_in_user_phone' => $data['logged_in_user_phone'],
                'logged_in_user_city' => $data['logged_in_user_city']
            ));
        } 
        else 
        {
            
            $description =$this->input->post('advertisement_Description');
            $title = $this->input->post('advertisement_title');
            
            $this->load->model('Advertisement');
            $advertisement = new Advertisement();
            $advertisement->catogory_id = $this->input->post('catogory_id');
            $advertisement->advertisement_title = $title;
            $advertisement->advertisement_Description = $description;
            $advertisement->advertisement_Price = $this->input->post('advertisement_Price');
            $advertisement->advertisement_phonnumber = $this->input->post('advertisement_phonnumber');
            $advertisement->advertisement_location = $this->input->post('location_id');
            $advertisement->city_id = $this->input->post('city_id');
            $advertisement->user_id = $userID->user_id;
            $post_date_time = date('Y-m-d H:i:s');
            $advertisement->post_date_time = $post_date_time;
            //var_dump($this->add());
            $upload_data = $this->upload->data();
            if (isset($upload_data['file_name'])) 
            {
                $advertisement->advertisement_image = $upload_data['file_name'];
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
            $home_and_personal_ad->home_personal_subcategory = $this->input->post('home_personal_subcategory');
            $home_and_personal_ad->home_personal_type = $this->input->post('home_personal_type');
            $home_and_personal_ad->sale_or_want = $this->input->post('sale_or_want');
            $home_and_personal_ad->post_date_time = $post_date_time;
            $home_and_personal_ad->user_id = $userID->user_id;
            
             //Load model and create object
            $this->load->model('Property_ad');
            $property_ad = new Property_ad();
            $property_ad->property_address = $this->input->post('property_address');
            $property_ad->property_subcategory = $this->input->post('property_subcategory');
            $property_ad->user_id = $userID->user_id;
            $property_ad->post_date_time= $post_date_time;
            
            //Call the save function
            //insert advertisement
            if ( ( $this->check_rule($description,$email) == TRUE) && ($this->check_email($description) == TRUE) && ($this->check_url($description) == TRUE) && ($this->check_contact($description == TRUE))
                && ( $this->check_rule($title,$email) == TRUE) && ($this->check_contact($title) == TRUE) &&($this->check_email($title)== TRUE) && ($this->check_url($title) == TRUE))
            {
                if($vehicle_ad->vehicle_model != NULL)
                {
                    $advertisement->subcategory_id = $this->input->post('vehicle_subcategory');
                    $advertisement->save();
                    $vehicle_ad->save();
                }

                else if($property_ad->property_address != NULL)
                {
                    $advertisement->subcategory_id = $this->input->post('property_subcategory');
                    $advertisement->save();
                    $property_ad->save();
                }

                else if($electronic_ad->electronic_brand != NULL)
                {
                    $advertisement->subcategory_id = $this->input->post('electronic_subcategory');
                    $advertisement->save();
                    $electronic_ad->save();
                }

                else if ($home_and_personal_ad->home_personal_type != NULL)
                {
                    $advertisement->subcategory_id = $this->input->post('home_personal_subcategory');
                    $advertisement->save();
                    $home_and_personal_ad->save();
                }

                else 
                {
                    $advertisement->subcategory_id = 0;
                    $advertisement->save();
                }
               //$this->load->view('advertisement_form_success');
                $this->load->model('Getdetails_model'); //Load the compare modler 
                $data['ad_one_max_details'] = $this->Getdetails_model->viewAdOne(); //get the Max id advertisment details and set to the array
                $data['ad_id'] = $this->Getdetails_model->getMaxAdvertismentID();
                
                $this->load->view('advertisement_form_success',$data);  //send data to view(advertisment details ,ad ids)
                
            }
            else 
            {
                $this->load->view('advertisement_form_error');
            }
            
            }
        $this->load->view('includes/footer');
    }
    
    /*
     * View one advertisement details
     */

    public function view($advertisement_id) 
        {
	$this->load->model('my_ads_model');
        $advertisements = $this->my_ads_model->increasePopularity($advertisement_id);
		
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
                
                $this->load->model('Search_model');
                $sub_category_name = $this->Search_model->getSubCategoryName(1,$sub_category_id)->subcategory_name;
               // $sub_category_name = $this->getSubctegoryName('Vehicle_ad_sub_category', 'vehicle_subcategory_id', $sub_category_id, 'vehicle_subcategory_name');
                
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
                
                $this->load->model('Search_model');
                $sub_category_name = $this->Search_model->getSubCategoryName(3,$sub_category_id)->subcategory_name;
                //$sub_category_name = $this->getSubctegoryName('Electronic_ad_sub_category', 'electronic_subcategory_id', $sub_category_id, 'electronic_subcategory_name');
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
                $this->load->model('Search_model');
                $sub_category_name = $this->Search_model->getSubCategoryName(4,$sub_category_id)->subcategory_name;
                //$sub_category_name = $this->getSubctegoryName('Home_and_personal_ad_sub_category', 'home_personal_subcategory_id', $sub_category_id, 'home_personal_subcategory_name');
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
                
                $this->load->model('Search_model');
                $sub_category_name = $this->Search_model->getSubCategoryName(2,$sub_category_id)->subcategory_name;
                //$sub_category_name = $this->getSubctegoryName('Property_ad_sub_category', 'property_subcategory_id', $sub_category_id, 'property_subcategory_name');
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
        //get loged user id
        $this->load->model('Account_settings_model');
        $logged_user = $data['log_user_id'] = $this->Account_settings_model->getUserId($email);
        
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
        $data['check_seller_id_user_id'] = $this->rating_model->check_seller_id_user_id($sellers_user_id->user_id,$logged_user->user_id);
                
        
        $this->load->model('getdetails_model');
        $data['image_names'] = $this->getdetails_model->getAllImageDetailsImage($advertisement_id);
        
        //Loading the comment model 
        $this->load->model('comment_model');
        $data['records'] = $this->comment_model->getComment($advertisement_id);
        $data['sellerName'] = $this->comment_model->getUsername($data['sellers_email']->email);
        $admin_id = $this->session->userdata('admin_id');
        
        
        if(!isset($is_logged_in) || $is_logged_in != true)
        {
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
            'sellers_email' => $data['sellers_email'],
            'image_names' => $data['image_names'],
            'is_logged_in'=>$is_logged_in,
            'check_seller_id_user_id'=>$data['check_seller_id_user_id'],
            'logged_user'=>$logged_user,
            'sellers_user_id'=>$sellers_user_id
        ));
        }
        else 
        {
           
            $this->load->model('account_settings_model');
            $logged_in_user_name = $this->account_settings_model->getUsername($email);
            $logged_in_user_phone = $this->account_settings_model->get_user_phone($email);
            
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
            'sellers_email' => $data['sellers_email'],
            'email' => $email,
            'logged_in_user_name' => $logged_in_user_name,
            'logged_in_user_phone' => $logged_in_user_phone,
            'image_names' => $data['image_names'],
            'is_logged_in'=>$is_logged_in,
            'check_seller_id_user_id'=>$data['check_seller_id_user_id'],
            'logged_user'=>$logged_user,
            'sellers_user_id'=>$sellers_user_id
        )); 
        }
        
        $this->load->model('comment_model');
        $user_ID = $this->comment_model->getUserID($email);




       $this->load->view('comment_view', array(
            'records' => $data['records'],
            'advertisement_id' => $advertisement_id,
            'user_id' =>$user_ID,
            'admin_id' => NULL
        )); 
        //Loading the comment model & get comment function
        //Loading the email view with sellers email
        $this->load->model('search_model');
        $category_id = $this->search_model->getCategoryID($advertisement_id);
       
        
        $data['related_ads'] = $this->search_model->getRelatedAds($category_id->catogory_id,$sub_category_id);
        
         $this->load->view('related_ads_view', array(
            'related_ads' => $data['related_ads']
        ));
        

        $this->load->view('includes/footer');
    }

    function checkLogin() {


        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {

            redirect('login', $data);
        }
    }
    
    function  loadVehicalForm(){
        
        $this->load->model('Search_model');
        $data['sub_categories'] = $this->Search_model->getSubcategory(1);
        
        $this->load->view('ajax_category/vehicle',array(
                'vehicle_ad_sub_category_form_options' => $data['sub_categories']
            ));
        
    }

    function  loadElectronicForm(){
        
       $this->load->model('Search_model');
       $data['sub_categories'] = $this->Search_model->getSubcategory(3);
        
        $this->load->view('ajax_category/electronic',array(
                'electronic_ad_sub_category_form_options' => $data['sub_categories']
            ));
    }
    
    function  loadHomeAndPersonalForm(){
        $this->load->model('Search_model');
        $data['sub_categories'] = $this->Search_model->getSubcategory(4);
        
        $this->load->view('ajax_category/home_and_personal',array(
                'home_personal_ad_sub_category_form_options' => $data['sub_categories']
            ));
    }

    function  loadPropertyForm(){
        $this->load->model('Search_model');
        $data['sub_categories'] = $this->Search_model->getSubcategory(2);
        
        $this->load->view('ajax_category/property',array(
                'property_ad_sub_category_form_options' =>$data['sub_categories']
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
    
    function multipleImageupload() 
    {

        $this->load->helper('form');
        $this->load->model('Getdetails_model');
        $max_id = $this->Getdetails_model->getMaxAdvertismentID();
        $file_name = $this->input->post('file_name');
        $this->load->model('Image');
        $image = new Image();
        $image->image_name = $file_name;
        $current_id = $max_id->max_id;
        $new_id = $current_id;
        $image->advertisment_id = $new_id;
        $image->save();

        if (isset($_FILES['uploaded'])) 
        {
            $target = "galleries/" . basename($_FILES['uploaded']['name']);
            var_dump($target);
            print_r($_FILES);

            if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
                echo "OK!"; //$chmod o+rw galleries
        }
    }
    
    function view_success()
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
        
        $this->load->view('to_be_approved',$data);
        $this->load->view('includes/footer');
    }
    
    function end_multiple_upload()
    {
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];
        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        
        $this->checkLogin();
        
        $page_title = 'Post an Ad';
        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name'],
            'page_title' => $page_title
        ));
        $this->load->model('Getdetails_model'); //Load the compare modler 
        $data['ad_one_max_details'] = $this->Getdetails_model->viewAdOne(); //get the Max id advertisment details and set to the array
        $data['ad_id'] = $this->Getdetails_model->getMaxAdvertismentID();

        $this->load->view('advertisement_form_success', $data);
        $this->load->view('includes/footer');
    }

}
