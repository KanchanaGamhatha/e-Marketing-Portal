<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Account_settings_controller class which handles the tasks related to settings of the 
 * account of a logged user
 * 
 */

class Account_settings_controller extends CI_Controller {

    /*
     * index function which loads initailly when Account_settings_controller is called
     */
    public function index() 
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        //If the user is not logged in redirect to login page
        if (!isset($is_logged_in) || $is_logged_in != TRUE) 
        {
            $data['no_rights'] = "You Don't have access to Account area. Please Login";
            $page_title = 'Login';
            $this->load->view('includes/header',$page_title);
            $this->load->view('login_form', $data);
            $this->load->view('includes/footer');
        }
        // else load the page
        else 
        {
            $this->view_load();
        }
    }

    /*
     * Function to update the details of the logged user
     */
    public function update_user_details() 
   {
        //Check whether a user has logged
        $this->checkLogin();
        
        //Validating name, phone fields
        $this->form_validation->set_rules('name', 'Name', 'required|apha');

        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|max_length[10]|min_length[10]');

        //If form validation fails reload same page with error messages
        if ($this->form_validation->run() == FALSE) 
        {
            $this->view_load();
        } 
        else 
        {
            $data['logged_in_user'] = $this->session->userdata('email');
            $data['success'] = "Details Successfully updated";
            $email = $data['logged_in_user'];
            
            $this->load->model('Account_settings_model');
            //Updating the user details
            $name = $this->input->post('name');
            $phone = $this->input->post('phone');
            $type = $this->input->post('type');
            $location_id = $this->input->post('location_id');
            $city_id = $this->input->post('city_id');
            
            $this->Account_settings_model->update_user_details($email,$name,$phone,$type,$location_id,$city_id);
            
            $this->update_success();
        }
    }
/*
 * Function to update the password
 */
   public function update_password() 
   {
        //Validating current password, new password and confirm paassword fields
        $this->checkLogin();
        
        //Get the actual current password and the entered password
        $currentPassword = $this->input->post('currentActualPassword');
        $currentPasswordEntered = md5($this->input->post('currnetPasWord'));

        //Setting rules for the validation
        $this->form_validation->set_rules('currnetPasWord', 'Current Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('newPassword', 'New Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'trim|required|matches[newPassword]');

        //If form validation fails reload same page with error messages
        if ($this->form_validation->run() == FALSE) 
        {
            $this->view_load();
        } 
        else 
        {
            //Check the current password entered matched with the actual current password
            if ($currentPassword == $currentPasswordEntered) 
            {
                
                $email = $this->session->userdata('email');
                
                //Update the password of the logged user
                $this->load->model('Account_settings_model');
                $this->Account_settings_model->update_password($email);
                
                $this->update_success();
                
            } 
            else 
            {
                //Display an error message if passowod entered is not actual password
                /*echo '<script language="javascript">';
                echo 'confirm("Entered Current Password not matched with actual password")';
                echo '</script>';*/
                $data['error'] = "Entered Current Password not matched with actual password";
                //Get the email address of logged user
                $data['logged_in_user'] = $this->session->userdata('email');
                $email = $data['logged_in_user'];

                //Getting the details of the logged user by using the email and store in variables
                //Getting the details of the logged user by using the email and store in variables
                $this->load->model('account_settings_model');
                $data['logged_in_user_name'] = $this->account_settings_model->getUsername($email);
                $data['logged_in_user_phone'] = $this->account_settings_model->get_user_phone($email);
                $data['logged_in_user_type'] = $this->account_settings_model->get_user_type($email);
                $data['logged_in_user_password'] = $this->account_settings_model->get_user_password($email);
                $data['logged_in_user_location'] = $this->account_settings_model->get_user_location($email);
                $data['logged_in_user_city'] = $this->account_settings_model->get_user_city($email);

                $this->load->view('includes/header', array(
                    'logged_in_user_name' => $data['logged_in_user_name']
                ));

                //Get details fro the location table to be sent to the view
                $this->load->model('Location');
                $locations = $this->Location->get();
                $cities = $this->account_settings_model->getCities($data['logged_in_user_location']->location_id);

                //Loding the account_settings_view page by sending the neccessary details

                $this->load->view('account_settings_view', array(
                    'location_form_options' => $locations,
                    'cities' => $cities,
                    'logged_in_user' => $data['logged_in_user'],
                    'logged_in_user_name' => $data['logged_in_user_name'],
                    'logged_in_user_phone' => $data['logged_in_user_phone'],
                    'logged_in_user_type' => $data['logged_in_user_type'],
                    'logged_in_user_password' => $data['logged_in_user_password'],
                    'logged_in_user_location' => $data['logged_in_user_location'],
                    'logged_in_user_city' => $data['logged_in_user_city'],
                    'error' => $data['error'] 
                ));
                $this->load->view('includes/footer');
               
                
            }
        }
    }
    public function update_success()
    {
        $data['logged_in_user'] = $this->session->userdata('email');
        $data['success'] = "Password Successfully updated";
        $email = $data['logged_in_user'];
        
        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);
                $this->load->view('includes/header', array(
                    'logged_in_user_name' => $data['logged_in_user_name']
                ));
        //Display success message
        $this->load->view('update_success');
        $this->load->view('includes/footer');
    }

    /*
     * Function to load the page
     */
    public function view_load() 
    {
        //Get the email address of logged user
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        //Getting the details of the logged user by using the email and store in variables
        $this->load->model('account_settings_model');
        $data['logged_in_user_name'] = $this->account_settings_model->getUsername($email);
        $data['logged_in_user_phone'] = $this->account_settings_model->get_user_phone($email);
        $data['logged_in_user_type'] = $this->account_settings_model->get_user_type($email);
        $data['logged_in_user_password'] = $this->account_settings_model->get_user_password($email);
        $data['logged_in_user_location'] = $this->account_settings_model->get_user_location($email);
        $data['logged_in_user_city'] = $this->account_settings_model->get_user_city($email);

        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));

        //Get details fro the location table to be sent to the view
        $this->load->model('Location');
        $locations = $this->Location->get();
        $cities = $this->account_settings_model->getCities($data['logged_in_user_location']->location_id);
        
        
        //Loding the account_settings_view page by sending the neccessary details
        
        $this->load->view('account_settings_view', array(
            'location_form_options' => $locations,
            'cities' => $cities,
            'logged_in_user' => $data['logged_in_user'],
            'logged_in_user_name' => $data['logged_in_user_name'],
            'logged_in_user_phone' => $data['logged_in_user_phone'],
            'logged_in_user_type' => $data['logged_in_user_type'],
            'logged_in_user_password' => $data['logged_in_user_password'],
            'logged_in_user_location' => $data['logged_in_user_location'],
            'logged_in_user_city' => $data['logged_in_user_city']
        ));
        $this->load->view('includes/footer');
    }
/*
 * Function to check whether a user has logged
 */
    function checkLogin() 
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        //If no user is logged redirect to login page
        if (!isset($is_logged_in) || $is_logged_in != TRUE) 
        {
            redirect('login', $data);
        }
    }

    function  loadCityDropdown(){
        $this->load->helper('form');
        
        $dropdown_location_value = $this->input->post('dropdown_location_value');
        $this->load->model('account_settings_model');
        $cities = $this->account_settings_model->getCities($dropdown_location_value);
       
        $this->load->view('cities_dropdown',array(
                'cities' => $cities
            ));
    }
    
}
