<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller
{
    public function index()
    {
            $is_logged_in = $this->session->userdata('is_logged_in');
            $data['logged_in_user'] = $this->session->userdata('email');
            $email = $data['logged_in_user'];

            $this->load->model('Account_settings_model');
            $this->lang->load('english', 'english');
            
            $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);
            
           $data['page_title'] = 'Home';
           $data['all_ads'] = $this->lang->line('all_ads');
           $data['login'] = $this->lang->line('login');
           $data['register'] = $this->lang->line('register');
           $data['search'] = $this->lang->line('search');
           $data['welcome'] = $this->lang->line('welcome');
           $data['welcome_text'] = $this->lang->line('welcome_text');
           $data['sell_fast'] = $this->lang->line('sell_fast');
           $data['about_us'] = $this->lang->line('about_us');
           $data['terms'] = $this->lang->line('terms');
           $data['privacy_policy'] = $this->lang->line('privacy_policy');
           $data['faq'] = $this->lang->line('faq');
           $data['contact_us'] = $this->lang->line('contact_us');
           $data['help_support'] = $this->lang->line('help_support');
           $data['vehicle'] = $this->lang->line('vehicle');
           
           
           if (!isset($is_logged_in) || $is_logged_in != true) 
            {
                $this->load->view('includes/header',array(
                'page_title' => $data['page_title'],
                'all_ads' =>  $data['all_ads'],
                'login' => $data['login'],
                'register' => $data['register']
            ));
            }
            else{
            $this->load->view('includes/header',array(
                'logged_in_user_name' => $data['logged_in_user_name'],
                'page_title' =>  $data['page_title'],
                'all_ads' =>  $data['all_ads'],
                'login' => $data['login'],
                'register' => $data['register']
            ));
            }
            
            //$this->load->view('language_header');
            
            $this->load->model('Search_model');
            $data['categories'] = $this->Search_model->getAllCategories();
            $data['locations'] = $this->Search_model->getAllLocations();
            
            $this->load->model('Search_model');
            $this->load->view('includes/search',$data);
            
            $categories = Search_model::getCategory();
            $locations = Search_model::getLocations();
            $electronic_categories = Search_model::getElectronicSubcategory();
            $vehical_categories = Search_model::getVehicalSubCategory();
            $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
            $property_categories = Search_model::getPropertySubcategory();

            $data['categories'] = $categories;
            $data['locations'] = $locations;
            $data['electronic_categories'] = $electronic_categories;
            $data['vehical_categories'] = $vehical_categories;
            $data['homeandpersonal_categories'] = $homeandpersonal_categories;
            $data['property_categories'] = $property_categories;
            
            $this->load->model('Search_model');
            $this->load->view('home',$data);
            $this->load->view('includes/footer');
    }
    
    public function index_sinhala()
    {
            $is_logged_in = $this->session->userdata('is_logged_in');
            $data['logged_in_user'] = $this->session->userdata('email');
            $email = $data['logged_in_user'];

            $this->load->model('Account_settings_model');
            
            $this->lang->load('sinhala', 'sinhala');
            
            $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);
            
           $data['page_title'] = 'Home';
           $data['all_ads'] = $this->lang->line('all_ads');
           $data['login'] = $this->lang->line('login');
           $data['register'] = $this->lang->line('register');
           $data['search'] = $this->lang->line('search');
           $data['welcome'] = $this->lang->line('welcome');
           $data['welcome_text'] = $this->lang->line('welcome_text');
           $data['sell_fast'] = $this->lang->line('sell_fast');
           $data['about_us'] = $this->lang->line('about_us');
           $data['terms'] = $this->lang->line('terms');
           $data['privacy_policy'] = $this->lang->line('privacy_policy');
           $data['faq'] = $this->lang->line('faq');
           $data['contact_us'] = $this->lang->line('contact_us');
           $data['help_support'] = $this->lang->line('help_support');
           $data['vehicle'] = $this->lang->line('vehicle');
           
           if (!isset($is_logged_in) || $is_logged_in != true) 
            {
                $this->load->view('includes/header',array(
                'page_title' => $data['page_title'],
                'all_ads' =>  $data['all_ads'],
                'login' => $data['login'],
                'register' => $data['register']
            ));
            }
            else{
            $this->load->view('includes/header',array(
                'logged_in_user_name' => $data['logged_in_user_name'],
                'page_title' =>  $data['page_title'],
                'all_ads' =>  $data['all_ads'],
                'login' => $data['login'],
                'register' => $data['register']
            ));
            }
            $this->load->view('language_header');
           
            
            $this->load->model('Search_model');
            $data['categories'] = $this->Search_model->getAllCategories();
            $data['locations'] = $this->Search_model->getAllLocations();
            
            $this->load->model('Search_model');
            $this->load->view('includes/search',$data);
            
            $categories = Search_model::getCategory();
            $locations = Search_model::getLocations();
            $electronic_categories = Search_model::getElectronicSubcategory();
            $vehical_categories = Search_model::getVehicalSubCategory();
            $homeandpersonal_categories = Search_model::getHomeAndPersonalSubcategory();
            $property_categories = Search_model::getPropertySubcategory();

            $data['categories'] = $categories;
            $data['locations'] = $locations;
            $data['electronic_categories'] = $electronic_categories;
            $data['vehical_categories'] = $vehical_categories;
            $data['homeandpersonal_categories'] = $homeandpersonal_categories;
            $data['property_categories'] = $property_categories;
            
            $this->load->model('Search_model');
            $this->load->view('home',$data);
            $this->load->view('includes/footer');
    }
}