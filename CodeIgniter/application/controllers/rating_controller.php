<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

/*
 * Rating_controller class which handles tasks related to rating the seller
 * 
 */

class Rating_controller extends CI_Controller 
{
    
/*
 * Fuction which handles insert the rate
 */
    public function insert_rate($seller_id)//Pass $seller_id from jrating path
    {
        $this->load->model('rating_model');
        
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];
        
         if (!isset($is_logged_in) || $is_logged_in != true) {

            redirect('login', $data);
        }
        
        //$data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);
        $data['logged_in_user_id'] = $this->rating_model->get_user_id($email);
        $logged_in_user_id = $data['logged_in_user_id'];
        
        if ($this->rating_model->check_seller_id_user_id($seller_id,$logged_in_user_id->user_id))
        {
           redirect('Rating_controller/already_rated');
        }
        //Get email of the logged user
        //$data['logged_in_user'] = $this->session->userdata('email');
        //$email = $data['logged_in_user'];
               
        
        
       // $logged_in_user_id = $this->rating_model->get_user_id($email);
        
        if ($_POST)
        {
            $rating = $_POST['rate'];
            echo $rating;
        }
        //$seller_id = $this->input->post('seller_id');
        //$logged_in_user_id = $this->input->post('logged_in_user_id');
        
        
        if ($this->rating_model->insert_rating($seller_id, $logged_in_user_id->user_id, $rating)) 
        {
            echo 'Success ';
        }
        else 
        {
            echo 'Error ';
        }
    }
    
    public function already_rated() 
    {
        $this->load->view('includes/header');
        $this->load->view('rate_error');
        $this->load->view('includes/footer');
    }

}
