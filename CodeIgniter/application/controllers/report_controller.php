<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Report_controller class which handles tasks related to reporting
 * 
 */

class Report_controller extends CI_Controller {

    public function insert_report() {
        $ad_id = $this->input->post('advertisement_id');
        $reason = $this->input->post('report_reason');
        $email = $this->input->post('report_email');
        $message_text = $this->input->post('report_message');

        $this->load->model('report_model');

        $ad_name = $this->report_model->get_ad_name($ad_id);
        $email_body = "Report of ad with title <b>" . $ad_name->advertisement_title . "</b> and ID <b>" . $ad_id;

        $message = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0EDE4;"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#333333;"> <tr> <td align="center" valign="top"><div width="600" height="80" border="0" style="display:block"><h2 style="color: #ffffff">Email by eMarketting Portal</h2></td> </tr> </table> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" > <tr> <td width="520" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;"> <h3>';
        $message = $message . '<b>' . $email_body . '</b></h3> <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;"><hr> ';
        $message = $message . $message_text;
        $message = $message . '<br><br>Details<hr>Reason -' . $reason . '<br>Reported By -' . $email;
        $message = $message . '</p> </tr> </table> <table width="600" height="108" border="0" cellspacing="0" cellpadding="0" style="background-color:#4C4D4F; margin-bottom:50px;" > <tr> <td align="center"> <table width="600" height="88" border="0" cellspacing="0" cellpadding="0" > <tr> <td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"><p style="font-family:Helvetica, Arial;font-size:12px;color:#fefefe;line-height:18px; text-align:left;"><a href="http://www.utk.edu/" style="color:#fefefe; text-decoration:none;">CONTACT US<br> </a><a href="" style="color:#fefefe; text-decoration:none;">eMarketting Portal</a><br> E-mail: <a href="" style="color:#ffffff; text-decoration:none;">info@emarketting.lk</a><br></p></td> </tr> </table></td> </tr> </table></td> </tr></table>';


        if ($this->send_report($email, $message) == TRUE) {
            $this->report_model->insert_report($ad_id, $reason, $email, $message_text);
            redirect('advertisement_Controller/view/' . $ad_id);
        } else {
            echo 'Error';
        }
    }

    function view_reports() {
        $this->checkLogin();

        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header', $data);

        $this->load->model('report_model');
        $reports = $this->report_model->getReport();

        $data['reports'] = $reports;
        $this->load->view('view_reports', $data);
        $this->load->view('includes/admin_footer');
    }

    function view_single_reports($advertisement_id) {
        $this->checkLogin();

        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header', $data);

        $this->load->model('report_model');
        $reports = $this->report_model->getSingleReport($advertisement_id);
        $userId = $this->report_model->get_user_id($advertisement_id);


        $data['userId'] = $userId;
        $data['reports'] = $reports;
        $this->load->view('single_report_view', $data);
        $this->load->view('includes/admin_footer');
    }

    public function send_report($email, $email_body) {
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
        //Loding the email library with the provided configurations
        $this->load->library('email',$config);

        //Setting up the fields of the email
        $admin_email = 'itp2013g7@gmail.com';
        $this->email->set_newline("\r\n");
        $this->email->from($email);
        $this->email->to($admin_email);
        $this->email->subject('e Marketting Portal');
        $this->email->message($email_body);

        if ($this->email->send()) {//IF successful 
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function checkLogin() {
        $admin_is_logged_in = $this->session->userdata('admin_is_logged_in');
        //If no user is logged redirect to login page
        if (!isset($admin_is_logged_in) || $admin_is_logged_in != TRUE) {
            redirect('admin');
        }
    }

    function deleteReports() {
        $report_id = $this->input->post('report_id');
        $this->load->model('report_model');
        $this->report_model->deleteReport($report_id);

    }

    function get_UserDetails($user_id) {
        $this->checkLogin();
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header', $data);

        $this->load->model('report_model');
        $data['user_details'] = $this->report_model->getUserDetails($user_id);

        $this->load->view('userProfileR', $data);
        $this->load->view('includes/admin_footer');
    }
    
    function get_oneAdDetails($advertisement_id){
        $this->checkLogin();
        $data['admin_id'] = $this->session->userdata('admin_id');
        $this->load->view('includes/admin_header', $data);

        $this->load->model('report_model');
        $data['report_one_ad_details'] = $this->report_model->getOneAdDetails($advertisement_id);
        
        $seller = $this->report_model->get_user_id($advertisement_id);
        $data['seller_details'] = $this->report_model->getUserDetails($seller->user_id);

        $this->load->view('report_one_ad_view', $data);
        $this->load->view('includes/admin_footer'); 
    }

    function bookmark_handle() {

        $this->load->model('report_model');

        $report_id = $this->input->post('report_id');
        $flag = $this->input->post('flag');

        $status = "false";
        $updateRecords = 0;

        if ($report_id) {
            $updateRecords = $this->report_model->bookmark($report_id, $flag);
        }

        if ($updateRecords > 0) {
            $status = "true";
        }
        echo $status;
    }
    
    public function send_email() 
    {
        $message_text = $this->input->post('message');
        $seller_id = $this->input->post('seller_id');
        $seller_email = $this->input->post('seller_email');
        
        $ad_title = $this->input->post('ad_title');
        $ad_id = $this->input->post('ad_id');

        $ad_link =  base_url() . "index.php/advertisement_Controller/view/" . $ad_id; 
        $link =  '<br><br><a href="'.$ad_link.'">Click to view your Ad in the site</a>';
        
        $message = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0EDE4;"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#333333;"> <tr> <td align="center" valign="top"><div width="600" height="80" border="0" style="display:block"><h2 style="color: #ffffff">Email by eMarketting Portal</h2></td> </tr> </table> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" > <tr> <td width="520" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;"> <h3>'; 
        $message = $message . '<u style="color: #0066cc; font-weight: bolder"></u> Your ad <b>'.$ad_title.' has been reported</b></h3> <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;"><hr> '; 
        $message = $message . $message_text; 
        $message = $message . $link; 
        $message = $message . '</p> </tr> </table> <table width="600" height="108" border="0" cellspacing="0" cellpadding="0" style="background-color:#4C4D4F; margin-bottom:50px;" > <tr> <td align="center"> <table width="600" height="88" border="0" cellspacing="0" cellpadding="0" > <tr> <td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"><p style="font-family:Helvetica, Arial;font-size:12px;color:#fefefe;line-height:18px; text-align:left;"><a href="http://www.utk.edu/" style="color:#fefefe; text-decoration:none;">CONTACT US<br> </a><a href="" style="color:#fefefe; text-decoration:none;">eMarketting Portal</a><br> E-mail: <a href="" style="color:#ffffff; text-decoration:none;">info@emarketting.lk</a><br></p></td> </tr> </table></td> </tr> </table></td> </tr></table>';

         $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            redirect('report_controller/get_oneAdDetails/'.$ad_id);
        } 
        
        //Sending the emails if the validation is passed
        else
        {
            //Configuring neccessary details to send an email
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

            //Loding the email library with the provided configurations
            $this->load->library('email', $config);
            
            //Setting up the fields of the email
            
            $this->email->set_newline("\r\n");
            $this->email->from('wesep004@gmail.com','E marketing portal');
            $this->email->to($seller_email);
            $this->email->subject('e Marketting Portal');
            $this->email->message($message);

            //Sending the email. 
            if ($this->email->send())//IF successful 
            {
                redirect('report_controller/get_oneAdDetails/'.$ad_id);
            }
            //If the email is not sent
            else 
            {
                redirect('report_controller/get_oneAdDetails/'.$ad_id);
            }
        }
    }
    
    function deleteAd($advertisement_id){
        $this->load->model('report_model');
        $this->report_model->deleteAd($advertisement_id);
        
        redirect('report_controller/view_reports');
        
    }
       
    function deleteUser($user_id){
        $this->load->model('report_model');
        $email = $this->report_model->getEmailToBeDeleted($user_id);
        $this->report_model->add_to_blacklist($email->email);
        
        $this->send_deleted_email($user_id,$email->email);
        
        $this->report_model->deleteUser($user_id);
        
        redirect('report_controller/view_reports');
        
    }
    
    
    public function send_deleted_email($user_id,$email) {
                     
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
        //Loding the email library with the provided configurations
        $this->load->library('email', $config);

        //Setting up the fields of the email
        $admin_email = 'itp2013g7@gmail.com';
        $email_body = 'Your Account has been deleted';
        $this->email->set_newline("\r\n");
        $this->email->from($admin_email);
        $this->email->to($email);
        $this->email->subject('e Marketting Portal');
        $this->email->message($email_body);

        if ($this->email->send()) {//IF successful 
            return TRUE;
        } else {
            return FALSE;
        }
    }


}
