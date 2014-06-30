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
        $this->load->view('includes/footer');
   }
   
   /*
    * Function to delete a specific user
    */
   
   public function delete($user_id)
   {
         $this->load->model('user_management_model');
         $this->user_management_model->delete($user_id);
         redirect('admin_user_management_controller');
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
