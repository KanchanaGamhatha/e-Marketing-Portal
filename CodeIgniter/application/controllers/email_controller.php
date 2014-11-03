<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Email_controller class which handles tasks related to sending email to the seller
 * 
 */

class Email_controller extends CI_Controller 
{

    public function index($adID) 
    {
        $this->load_header();
        
        $this->load->model('email_model');

        //Getting the sellers user ID from ad ID
        
        $sellers_user_id = $this->email_model->get_user_id($adID);

        //Getting the sellers email from sellers user ID
        
        $data['sellers_email'] = $this->email_model->get_user_email($sellers_user_id->user_id);
        
        $this->load->view('send_emai_view', array(
            'sellers_email' => $data['sellers_email']
        ));
        $this->load->view('includes/footer');
    }

    /*
     * LoaadHeader function which load the header
     */
    public function load_header()
    {
        //Getting the logged user details from the session
        $is_logged_in = $this->session->userdata('is_logged_in');
        $data['logged_in_user'] = $this->session->userdata('email');
        $email = $data['logged_in_user'];
        
        $this->load->model('account_settings_model');
        //Finding logged user name from email
        $data['logged_in_user_name'] = $this->account_settings_model->getUsername($email);
        
        //if no logged user present load header without name
        if (!isset($is_logged_in) || $is_logged_in != true) 
       {
            $this->load->view('includes/header');
       } 
       else 
       {
           //if a logged user present send name to the header view
            $this->load->view('includes/header', array(
                'logged_in_user_name' => $data['logged_in_user_name']
            ));
       }
    }
    
    /*
 * Fuction which handles seding of email
 */
    public function send_email_status($error,$ad_id) 
    {
        $this->load_header();
        $this->load->view('send_email_success', array(
            'error' => $error,
            'ad_id' => $ad_id
        ));
        $this->load->view('includes/footer');
        
    }
/*
 * Fuction which handles seding of email
 */
    public function send_email() 
    {
        //Get the sellers email through the hidden field in the send_email_view
        $seller_email = $this->input->post('seller_email');
        $ad_id = $this->input->post('ad_id');
        $this->load->model('email_model');
        $ad_name = email_model::get_ad_name($ad_id);
        //Validating name, email address, message fields
        
        $this->form_validation->set_rules('name', 'Name', 'required|apha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|max_length[10]|min_length[10]');
        $this->form_validation->set_rules('message', 'Message', 'required');
        
        $name = $this->input->post('name');
        $sender_email =$this->input->post('email');
        $phone = $this->input->post('phone');
        $message_text = $this->input->post('message');
        
        $message = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0EDE4;"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#333333;"> <tr> <td align="center" valign="top"><div width="600" height="80" border="0" style="display:block"><h2 style="color: #ffffff">Email by eMarketting Portal</h2></td> </tr> </table> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" > <tr> <td width="520" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;"> <h3>'; 
        $message = $message . '<u style="color: #0066cc; font-weight: bolder">' . $name . '</u> has sent you a message about you ad <u style="color: #0066cc; font-weight: bolder">' . $ad_name->advertisement_title . '</u></h3> <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;"><hr> '; 
        $message = $message . $message_text; 
        $message = $message . '<br><br>Contact<hr>Name -' . $name . '<br>Email -' . $sender_email . '<br>Phone -' . $phone; 
        $message = $message . '</p> </tr> </table> <table width="600" height="108" border="0" cellspacing="0" cellpadding="0" style="background-color:#4C4D4F; margin-bottom:50px;" > <tr> <td align="center"> <table width="600" height="88" border="0" cellspacing="0" cellpadding="0" > <tr> <td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"><p style="font-family:Helvetica, Arial;font-size:12px;color:#fefefe;line-height:18px; text-align:left;"><a href="http://www.utk.edu/" style="color:#fefefe; text-decoration:none;">CONTACT US<br> </a><a href="" style="color:#fefefe; text-decoration:none;">eMarketting Portal</a><br> E-mail: <a href="" style="color:#ffffff; text-decoration:none;">info@emarketting.lk</a><br></p></td> </tr> </table></td> </tr> </table></td> </tr></table>';

        //If form validation fails reload same page with error messages
        if ($this->form_validation->run() == FALSE) 
        {
            
            $this->load_header();
            
            //Loading the email view with sellers email
             $this->load->view('send_emai_view',array(
                        'sellers_email_validate' => $seller_email
                        ));
              
              $this->load->view('includes/footer');
            
        } 
        
        //Sending the emails if the validation is passed
        else
        {
            //Configuring neccessary details to send an email
            $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'validation' => TRUE,
            'smtp_timeout' => 300,
            'smtp_port' => 465,
            'smtp_user' => 'wesep004@gmail.com',
            'smtp_pass' => 'WESEP004@sliit',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE

            );

            //Loding the email library with the provided configurations
            $this->load->library('email' ,$config);
            
            //Setting up the fields of the email
            
            $this->email->set_newline("\r\n");
            $this->email->from(set_value('email'), set_value('name'));
            $this->email->to($seller_email);
            $this->email->subject('e Marketting Portal Ad Contact');
            $this->email->message($message);

            //Sending the email. 
            if ($this->email->send())//IF successful 
            {
                //Save the emails details in the database if email was successfully sent
                
                if ($query = $this->email_model->create_email($name,$seller_email,$sender_email,$phone,$message_text)) 
                {
                   $this->send_email_status(0,$ad_id); 
                }
            }
            //If the email is not sent
            else 
            {
                $this->send_email_status(1,$ad_id);
            }
        }
    }

    
    public function send_share_email() 
    {
        //Get the sellers email through the hidden field in the send_email_view
        $your_email = $this->input->post('your_email');
        $your_name = $this->input->post('your_name');
        $friend_email = $this->input->post('friend_email');
        $share_message = $this->input->post('share_message');
        $ad_ink = $this->input->post('ad_link');
        $ad_id = $this->input->post('advertisement_id');
        
        //$message = "Please click <b><a href=\" ".$ad_ink ." \"> this link </a></b> to view ad shared by ".$your_name."<br><br>";
        $message = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0EDE4;"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#333333;"> <tr> <td align="center" valign="top"><div width="600" height="80" border="0" style="display:block"><h2 style="color: #ffffff">Email by eMarketting Portal</h2></td> </tr> </table> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" > <tr> <td width="520" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;"> <h3>'; 
        $message = $message . '<u style="color: #0066cc; font-weight: bolder">' . $your_name . '</u> has shared an ad with you <b></b></h3> <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;"><hr> '; 
        $message = $message . $share_message; 
        $message = $message . '<br><br>Click the link below to view the ad<hr>' ;
        $message = $message . '<a href="'.$ad_ink.'">'.$ad_ink.'</a>';
        $message = $message . '</p> </tr> </table> <table width="600" height="108" border="0" cellspacing="0" cellpadding="0" style="background-color:#4C4D4F; margin-bottom:50px;" > <tr> <td align="center"> <table width="600" height="88" border="0" cellspacing="0" cellpadding="0" > <tr> <td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"><p style="font-family:Helvetica, Arial;font-size:12px;color:#fefefe;line-height:18px; text-align:left;"><a href="http://www.utk.edu/" style="color:#fefefe; text-decoration:none;">CONTACT US<br> </a><a href="" style="color:#fefefe; text-decoration:none;">eMarketting Portal</a><br> E-mail: <a href="" style="color:#ffffff; text-decoration:none;">info@emarketting.lk</a><br></p></td> </tr> </table></td> </tr> </table></td> </tr></table>';

        //Validating name, email address, message fields
        
        $this->form_validation->set_rules('your_name', 'Name', 'required|apha');
        $this->form_validation->set_rules('your_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('friend_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('share_message', 'Message', 'required');

        //If form validation fails reload same page with error messages
        if ($this->form_validation->run() == FALSE) 
        {
            redirect('advertisement_Controller/view/'.$ad_id);
        } 
        
        //Sending the emails if the validation is passed
        else
        {
            //Configuring neccessary details to send an email
            $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'validation' => TRUE,
            'smtp_timeout' => 300,
            'smtp_port' => 465,
            'smtp_user' => 'wesep004@gmail.com',
            'smtp_pass' => 'WESEP004@sliit',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE

            );

            //Loding the email library with the provided configurations
            $this->load->library('email' ,$config);
            
            //Setting up the fields of the email
            
          $this->email->set_newline("\r\n");
            $this->email->from($your_email,$your_name);
            $this->email->to($friend_email);
            $this->email->subject('e Marketting Portal Ad Share');
            $this->email->message($message);

            //Sending the email. 
            if ($this->email->send())//IF successful 
            {
                //redirect('advertisement_Controller/view/'.$ad_id);
                $this->send_email_status(0,$ad_id);
            }
            //If the email is not sent
            else 
            {
                //redirect('advertisement_Controller/view/'.$ad_id);
                $this->send_email_status(1,$ad_id);
            }
        }
    }
}

?>
