<?php
class Admin extends CI_Controller
{
    function index()
    {
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header',$data);
            
        $this->load->view('admin_login');
        $this->load->view('includes/footer');
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
        $this->load->view('includes/footer');    
    }
    
    function logout()
    {
       
        $this->session->unset_userdata('admin_is_logged_in');
        $this->session->unset_userdata('admin_id');
        session_destroy();
        
        redirect('admin');
        
    }
    
    function view_reports()
    {
            $this->checkLogin();
            
            $data['admin_id'] = $this->session->userdata('admin_id');
            $this->load->view('includes/admin_header',$data);
            
            $this->load->model('Search_model');
            $reports = Search_model::getReports();
            
            $data['reports'] = $reports;
            $this->load->view('view_reports',$data);
            $this->load->view('includes/footer');
    }
    
    public function deleteAd($adID)
    {
        $this->checkLogin();
        $this->load->model('my_ads_model');
        $this->load->model('report_model');
        
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
        
        $this->report_model->delete_report($adID);
        
        $this->view_reports();
        
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
                $this->load->view('includes/footer');
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
                $this->load->view('includes/footer');
                
        }
    }
    
    function checkLogin() 
    {
        $admin_is_logged_in = $this->session->userdata('admin_is_logged_in');
        //If no user is logged redirect to login page
        if (!isset($admin_is_logged_in) || $admin_is_logged_in != TRUE) 
        {
            redirect('admin');
        }
    }
}
    


?>


