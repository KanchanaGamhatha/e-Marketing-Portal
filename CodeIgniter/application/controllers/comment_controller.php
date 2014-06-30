<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Comment_controller extends CI_Controller {

    public function index() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            $data['no_rights'] = "You Don't have access to Account area. Please Login";
            $this->load->view('includes/header');
            $this->load->view('login_form', $data);
            $this->load->view('includes/footer');
        } else {
            $this->ViewLoad();
        }

        $data['main_content'] = 'comment_view';
        $this->load->view('includes/template', $data);
    }

    public function post_comment() {
        //Validating comment field
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {

            redirect('login', $data);
        }
        $data['commentAdID'] = $this->input->post('advertisement_id');
        $this->form_validation->set_rules('comment', 'Comment', 'required|apha');

        //If form validation fails reload same page with error messages
        if ($this->form_validation->run() == FALSE) {

            $data['logged_in_user'] = $this->session->userdata('email');
            $email = $data['logged_in_user'];

            $this->load->model('Account_settings_model');
            $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));
            $this->load->view('comment_error', array(
                'commentAdID' => $data['commentAdID']
            ));
            $this->load->view('includes/footer');
        } else {

            $data['logged_in_user'] = $this->session->userdata('email');
            $email = $data['logged_in_user'];

            $this->load->model('comment_model');
            $userID = $this->comment_model->getUserID($email);
            $data['logged_in_user_name'] = $this->comment_model->getUsername($email);
            $name = $data['logged_in_user_name'];

            $this->comment_model->insertComment($userID->user_id, $name->name);
            //$data['commentAdID'] = $this->input->post('advertisement_id');
            //$data['advertisement_Id']=$this->comment_model->getAdvertisementID($adID);

            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));

            //redirect to currently selected ad
            $commentAdID = $data['commentAdID'];
            redirect('advertisement_Controller/view/' . $commentAdID);

            $this->load->view('includes/footer');
        }
    }

    public function ViewLoad() {

        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);


        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));

        $this->load->model('comment_model');
        //$data['records']=$this->comment_model->getComment($advertisement_id);
        $this->load->view('one_ad_details', array(
            'advertisement' => $data['commentAdID'],
        ));
        //Loading the comment view 

        $this->load->view('comment_view', array(
            'records' => $data['records']
        ));
        $this->load->view('includes/footer');
    }

    public function deleteComment() {
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];

        $this->load->model('Account_settings_model');
        $data['logged_in_user_name'] = $this->Account_settings_model->getUsername($email);

        $this->load->view('includes/header', array(
            'logged_in_user_name' => $data['logged_in_user_name']
        ));
        
        $this->load->model('comment_model');
        $userID = $this->comment_model->getUserID($email);

        $data['commentAdID'] = $this->input->post('advertisement_id');
        $data['commentID'] = $this->input->post('comment_id');
        
        $commentID = $data['commentID'];
        $commentAdID = $data['commentAdID'];
        $this->comment_model->deleteComment($commentID,$commentAdID,$userID->user_id);
        
        redirect('advertisement_Controller/view/'.$commentAdID);

        }

}
?>

