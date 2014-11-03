<?php

/* 
 * Admin_user_management_controller class which handle the managaement of 
 * registered users in the website
 * 
 */
class Admin_user_management_controller extends CI_Controller{

    /*
     * Function to view details of registered users
     */
   public function index()
   {
        $this->checkLogin();
        $this->load->model('user_management_model');
        $data['users'] = $this->user_management_model->get_all_users();
       
        $data['admin_id'] = $this->session->userdata('admin_id');
        
        $this->load->view('includes/admin_header',$data);
        $this->load->view('user_management',$data);
        $this->load->view('includes/admin_footer');
   }
   
   /*
    * Funtion to search for users requested through ajax
    */
   public function search_user()
   {
        $search_text = $this->input->post('search_text');
        $this->checkLogin();
        $this->load->model('user_management_model');
        $data['users'] = $this->user_management_model->search_all_users($search_text);
       
        $this->load->view('user_search_result',$data);
        
   }
   
   /*
    * Function to get specific details of a registered user
    */
   public function get_user_details($user_id)
   {
       $this->checkLogin();
       $this->load->model('user_management_model');
       
       $data['admin_id'] = $this->session->userdata('admin_id');
       $data['user_details'] = $this->user_management_model->getUserDetails($user_id);
       
       //Get necessary details of the user through method calls and assigning to variables
       $location = $this->user_management_model->get_district_id($user_id);
       $city = $this->user_management_model->get_city_id($user_id);
       $data['location_name'] = $this->user_management_model->get_district_name($location->location_id);
       $data['city_name'] = $this->user_management_model->get_city_name($city->city_id);
       $data['add_count'] = $this->user_management_model->get_ads_count($user_id);
       $data['pend_ad_count'] = $this->user_management_model->get_pend_ads_count($user_id);
       $data['comment_count'] = $this->user_management_model->get_comments_count($user_id);
       $data['rate_count'] = $this->user_management_model->get_rates_count($user_id);
       $data['feedback_count'] = $this->user_management_model->get_feedbacks_count($user_id);
       $data['current_rate'] = $this->user_management_model->get_current_rate($user_id);
       $data['positive'] = $this->user_management_model->get_feedback_count($user_id,1);
       $data['nagative'] = $this->user_management_model->get_feedback_count($user_id,-1);
       $data['neutral'] = $this->user_management_model->get_feedback_count($user_id,0);
       $data['feedbacks'] = $this->user_management_model->get_feedback($user_id);
       
       
       $this->load->view('includes/admin_header',$data);
       $this->load->view('more_user_details',$data);
       $this->load->view('includes/admin_footer');
   }
   
   /*
    * Function to get advertisements posted by a specific registered user
    */
   public function get_ads_by_user($user_id)
   {
       $this->checkLogin();
       $this->load->model('user_management_model');
       $this->load->model('Search_model');
       $data['admin_id'] = $this->session->userdata('admin_id');
       $data['user_ads'] = $this->user_management_model->get_ads_by_user($user_id);
       $data['user_name'] = $this->user_management_model->get_user_name($user_id);
       $data['user_id'] = $user_id;
       
       $this->load->view('includes/admin_header',$data);
       $this->load->view('ads_by_user',$data);
       $this->load->view('includes/admin_footer');
   }
   
    /*
    * Function to get comments posted by a specific registered user
    */
   public function get_comments_by_user($user_id)
   {
       $this->checkLogin();
       $this->load->model('user_management_model');
       $this->load->model('report_model');
       $data['admin_id'] = $this->session->userdata('admin_id');
       $data['user_comments'] = $this->user_management_model->get_comments_by_user($user_id);
       $data['user_name'] = $this->user_management_model->get_user_name($user_id);
       $data['user_id'] = $user_id;
       
       $this->load->view('includes/admin_header',$data);
       $this->load->view('comments_by_user',$data);
       $this->load->view('includes/admin_footer');
   }
   
    /*
    * Function to get advratings done by a specific registered user
    */
   public function get_ratings_by_user($user_id)
   {
       $this->checkLogin();
       $this->load->model('user_management_model');
       $data['admin_id'] = $this->session->userdata('admin_id');
       $data['user_ratings'] = $this->user_management_model->get_ratings_by_user($user_id);
       $data['user_name'] = $this->user_management_model->get_user_name($user_id);
       $data['user_id'] = $user_id;
       
       $this->load->view('includes/admin_header',$data);
       $this->load->view('rating_by_user',$data);
       $this->load->view('includes/admin_footer');
   }
   
    /*
    * Function to get feedbacks by a specific registered user
    */
   public function get_feedbacks_by_user($user_id)
   {
       $this->checkLogin();
       $this->load->model('user_management_model');
       $data['admin_id'] = $this->session->userdata('admin_id');
       $data['user_feedbacks'] = $this->user_management_model->get_feedbacks_by_user($user_id);
       $data['user_name'] = $this->user_management_model->get_user_name($user_id);
       $data['user_id'] = $user_id;
       
       $this->load->view('includes/admin_header',$data);
       $this->load->view('feedbacks_by_user',$data);
       $this->load->view('includes/admin_footer');
   }

   /*
    * Function to delete a specific user
    */
   
   public function deleteUser($user_id)
   {
         $this->load->model('user_management_model');
         $this->user_management_model->deleteUser($user_id);
         redirect('admin_user_management_controller');
   }
   
   /*
    * Function to delete a specific advertisement
    */
   function deleteAd($advertisement_id)
   {
        $this->load->model('user_management_model');
        $user_id = $this->user_management_model->get_ad_user($advertisement_id);
        $this->user_management_model->deleteAd($advertisement_id);

        redirect('admin_user_management_controller/get_ads_by_user/'.$user_id->user_id);
        
    }
    
    /*
    * Function to delete a specific comment
    */
    function deleteComment($comment_id)
   {
        $this->load->model('user_management_model');
        $user_id = $this->user_management_model->get_comment_user($comment_id);
        $this->user_management_model->deleteComment($comment_id);

        redirect('admin_user_management_controller/get_comments_by_user/'.$user_id->user_id);
        
    }
   
    /*
     * Function to check whether administrator has logged in
     */
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
