<?php
class Site extends CI_Controller 
{

    function index()
    {
            $this->is_logged_in();
    }

    function members_area() 
    {
        if($this->is_logged_in())
        {
            redirect('login');
        }
        else 
        {
            redirect('home');
        }
            
    }

    function is_logged_in()
    {
            $is_logged_in = $this->session->userdata('is_logged_in');

            if (!isset($is_logged_in) || $is_logged_in != true) 
            {
                return true;;
            }
    }
}
?>