<?php
class Admin extends CI_Controller
{
    function index()
    {
        $this->checkLogin();
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header',$data);
        
        $this->load->model('Rules_model');
        $this->load->model('report_model');
        $data['pending_ads_count'] = $this->Rules_model->getPendingAdsCount();
        $data['pending_report_count'] = $this->report_model->count();
        $this->load->view('admin_home',$data);
        $this->load->view('includes/admin_footer');
    }
    /*
    * function to load the admin signup form
    */
    function admin_signup()
    {
        $this->checkLogin();
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header',$data);
        $this->load->view('admin_create');
        $this->load->view('includes/admin_footer');    
    }
    
    function logout()
    {
       
        $this->session->unset_userdata('admin_is_logged_in');
        $this->session->unset_userdata('admin_id');
        session_destroy();
        $this->session->unset_userdata('is_logged_in');
        session_destroy();
        redirect('login');
        
    }
    
    
    /*
    * Function to validate and and insert admin details to the database
    */
     function create_admin()
    {
        $this->checkLogin();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('adminId','Admin User Name','trim|required');

        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');

        if (($this->form_validation->run()) == false) 
        {                
            $this->admin_signup();
        }
        else 
        {
                $this->load->model('admin_model');
                
                $user_name=$this->input->post('adminId');
                $password=md5($this->input->post('password'));
                
                $result = $this->admin_model->create_admin($user_name,$password);
                                
                if ($result) 
                {
                    $data['signup']='success';
                }
                else 
                {
                    $data['signup']='user found';
                }
                $data['admin_id'] = $this->session->userdata('admin_id');
                $this->load->view('includes/admin_header', $data);

                $this->load->view('admin_create', $data);
                $this->load->view('includes/admin_footer');
        }
    }
    /*
    * Function to validate admin login info and session creation
    */
    function validate_credentials()
    {
          
        $this->load->model('admin_model');
        
        $username=$this->input->post('user_name');
        $password=md5($this->input->post('password'));
        $query = admin_model::validate($username,$password);
			
        if ($query) 
        {
                $data = array(
                                'admin_id' => $this->input->post('user_name'),
                                'admin_is_logged_in' => true
                );

                $this->session->set_userdata($data);
                redirect('admin_user_management_controller');
               
        }
        else 
        {
                $data['errorMsg']='Username or Password did not match please retry';
                $data['admin_id'] = $this->session->userdata('admin_id');
                $this->load->view('includes/admin_header', $data);

                $this->load->view('admin_login', $data);
                $this->load->view('includes/admin_footer');
                
        }
    }
    
    function checkLogin() 
    {
        $admin_is_logged_in = $this->session->userdata('admin_is_logged_in');
        //If no user is logged redirect to login page
        if (!isset($admin_is_logged_in) || $admin_is_logged_in != TRUE) 
        {
            redirect('login');
        }
    }
    
    
    ////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////Approval Of Advertisements//////////////////////////////
    
    function viewPendingAds($category_id)
    {
        $this->checkLogin();
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header',$data);
        
        $this->load->model('Rules_model');
        $data['pending_ads'] = $this->Rules_model->getPendingAds($category_id);
        
        $this->load->model('Search_model');
        $data['categories'] = $this->Search_model->getCategory();
        $data['category_name'] = $this->Search_model->getCategoryName($category_id);
        $data['category_id'] = $category_id;
        
        $this->load->view('ads_approve_view',$data);
        
        $this->load->view('includes/admin_footer');
    }
    
    function approveAd($advertisement_id)
    {
        $this->checkLogin();
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header',$data);
        
        $this->load->model('Rules_model');
        $this->Rules_model->approveAd($advertisement_id);
        
        $category_id = $this->Rules_model->getCategoryID($advertisement_id);
        
        $user_id = $this->Rules_model->getUserID($advertisement_id);
        $seller_email = $this->Rules_model->getUserEmail($user_id->user_id);
        
        $message_text = 'Advertisement posted successfully';
        //$this->sendEmail($seller_email->email, $message_text);
        
       $this->viewPendingAds($category_id->catogory_id);
    }
    
    function approveMultipleAds()
    {
        $ad_id = $this->input->post('ad_id');
        $this->load->model('Rules_model');
        $this->Rules_model->approveAd($ad_id);
    }
    
    
    function displayOneAd($advertisement_id)
    {
        $this->load->model('Rules_model');
        
        $data['pending_ad'] = $this->Rules_model->getOneAdDetails($advertisement_id);
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header',$data);
        $this->load->view('ads_approve_single',$data);
        $this->load->view('includes/admin_footer');
 
    }
    
    public function deleteAd($advertisement_id)
    {
        $this->checkLogin();
        $this->load->model('my_ads_model');
        $this->load->model('Rules_model');
        
        
        $ad_user_id = $this->Rules_model->getUserID($advertisement_id);
        $seller_email = $this->Rules_model->getUserEmail($ad_user_id->user_id);
        $ad_post_date = $this->Rules_model->getAdPostDate($advertisement_id);
        $category_id = $this->Rules_model->getCategoryID($advertisement_id);
        
        $this->my_ads_model->deleteMyCategoryAd('vehiclead',$ad_user_id->user_id,$ad_post_date->post_date_time);
        $this->my_ads_model->deleteMyCategoryAd('propertyad',$ad_user_id->user_id,$ad_post_date->post_date_time);
        $this->my_ads_model->deleteMyCategoryAd('electronicad',$ad_user_id->user_id,$ad_post_date->post_date_time);
        $this->my_ads_model->deleteMyCategoryAd('homeandpersonalad',$ad_user_id->user_id,$ad_post_date->post_date_time);
                
        $this->my_ads_model->deleteMyAd($advertisement_id);
        
        $message_text = 'Advertisement rejected due to unallowed content';
        //$this->sendEmail($seller_email->email, $message_text);
        
        $this->viewPendingAds($category_id->catogory_id);
        
    }
    
    function rejectMultipleAds()
    {
        $ad_id = $this->input->post('ad_id');
        
        $this->deleteAd($ad_id);
//        $this->load->view('includes/admin_footer');
    }
    
    function sendEmail($seller_email,$message_text) 
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'validation' => TRUE,
            'smtp_timeout' => 30,
            'smtp_port' => 465,
            'smtp_user' => 'wesep004@gmail.com',
            'smtp_pass' => 'WESEP004@sliit',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE

            );

            $message = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0EDE4;"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#333333;"> <tr> <td align="center" valign="top"><div width="600" height="80" border="0" style="display:block"><h2 style="color: #ffffff">Email by eMarketting Portal</h2></td> </tr> </table> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" > <tr> <td width="520" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;"> <h3>'; 
            $message = $message . '<u style="color: #0066cc; font-weight: bolder"></u> Advertisement Approval <u style="color: #0066cc; font-weight: bolder"> </u></h3> <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;"><hr> '; 
            $message = $message . $message_text;  
            $message = $message . '</p> </tr> </table> <table width="600" height="108" border="0" cellspacing="0" cellpadding="0" style="background-color:#4C4D4F; margin-bottom:50px;" > <tr> <td align="center"> <table width="600" height="88" border="0" cellspacing="0" cellpadding="0" > <tr> <td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"><p style="font-family:Helvetica, Arial;font-size:12px;color:#fefefe;line-height:18px; text-align:left;"><a href="http://www.utk.edu/" style="color:#fefefe; text-decoration:none;">CONTACT US<br> </a><a href="" style="color:#fefefe; text-decoration:none;">eMarketting Portal</a><br> E-mail: <a href="" style="color:#ffffff; text-decoration:none;">info@emarketting.lk</a><br></p></td> </tr> </table></td> </tr> </table></td> </tr></table>';
            //Loding the email library with the provided configurations
            $this->load->library('email', $config);
            
            //Setting up the fields of the email
            
            $this->email->set_newline("\r\n");
            $this->email->from('wesep004@gmail.com', 'E Marketting Portal');
            $this->email->to($seller_email);
            $this->email->subject('e Marketting Portal Ad Approval');
            $this->email->message($message);
            
            $this->email->send();
    }
    
    function reloadView()
    {
        $this->load->model('Rules_model');
        $data['pending_ads'] = $this->Rules_model->getPendingAds();

    }
    
}
?>