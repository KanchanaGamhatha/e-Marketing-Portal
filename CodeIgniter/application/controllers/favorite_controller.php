<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Email_controller class which handles tasks related to sending email to the seller
 * 
 */

class Favorite_controller extends CI_Controller 
{

    public function add_to_favorite($adId) 
    {
        //check whether the user logged or not
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
            redirect('login');
        } else 
            {
                $data['logged_in_user'] = $this->session->userdata('email');
                $email = $data['logged_in_user'];

                //Getting the user ID from email
                $this->load->model('comment_model');
                $userID = $this->comment_model->getUserID($email);

                $this->load->model('favorite_model');
                $this->favorite_model->add_to_favorite($adId, $userID->user_id);
                redirect('advertisement_Controller/view/'.$adId);
            }
    }

    /*
     * AlreadyExist function which load the view called favourite_already_exsist with login details
     */

    function alreadyExist()
    {
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('account_settings_model');
        $data['logged_in_user_name'] = $this->account_settings_model->getUsername($email);
        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));
        $this->load->view('favourite_already_exsist');
        $this->load->view('includes/footer');
    }

    /*
     * Fuction which handles view favorite advertisements
     */

    public function viewMyFavorite()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) 
        {
            $data['no_rights'] = "You Don't have access to Account area. Please Login";
            $this->load->view('includes/header');
            $this->load->view('login_form', $data);
            $this->load->view('includes/footer');
        } else
            {
                $this->ViewLoad();
            }
    }

    public function viewLoad() 
    {
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('account_settings_model');
        $data['logged_in_user_name'] = $this->account_settings_model->getUsername($email);


        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));
        $this->load->view('my_favourite_header');

        $this->load->model('my_ads_model');
        $this->load->model('favorite_model');
        $userID = $this->my_ads_model->getUserID($email);
        
        //Getting favourite advertisement details  
        $data['myFavoriteAdDetails'] = NULL;
        $data['myFavorites'] = $this->favorite_model->getMyFavoriteAds($userID->user_id);

        if (isset($data['myFavorites'])) 
        {
            foreach ($data['myFavorites'] as $myFavoriteAdId) 
            {
                $data['myFavoriteAdDetails'] = $this->favorite_model->getMyFavoriteAdDetails($myFavoriteAdId->advertisement_id);

                $this->load->view('my_favorite_view', array(
                    'myFavoriteAdDetails' => $data['myFavoriteAdDetails']
                ));
            }
        } else 
            {
                $this->load->view('my_favorite_view', array(
                    'myFavoriteAdDetails' => $data['myFavoriteAdDetails']
                ));
            }

        $this->load->view('includes/footer');
    }
    /*
     * Fuction which handles delete Favorite advertiesments 
     */
    public function deleteFavoriteAd($adId) 
    {

        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));
        $this->load->view('my_favourite_header');

        $this->load->model('comment_model');
        $userID = $this->comment_model->getUserID($email);


        $this->load->model('favorite_model');
        $this->favorite_model->deleteMyFavorites($adId, $userID->user_id);

        $data['myFavoriteAdDetails'] = NULL;
        $data['myFavorites'] = $this->favorite_model->getMyFavoriteAds($userID->user_id);

        if (isset($data['myFavorites']))
        {
            foreach ($data['myFavorites'] as $myFavoriteAdId) 
            {
                $data['myFavoriteAdDetails'] = $this->favorite_model->getMyFavoriteAdDetails($myFavoriteAdId->advertisement_id);

                $this->load->view('my_favorite_view', array(
                    'myFavoriteAdDetails' => $data['myFavoriteAdDetails']
                ));
            }
        } else 
            {
                $this->load->view('my_favorite_view', array(
                    'myFavoriteAdDetails' => $data['myFavoriteAdDetails']
                ));
            }

        $this->load->view('includes/footer');
    }

}
