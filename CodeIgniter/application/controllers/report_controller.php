<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Email_controller class which handles tasks related to sending email to the seller
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
        $email_body = "Report of ad with title <b>".$ad_name->advertisement_title."</b> and ID <b>".$ad_id;
        
        $message = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F0EDE4;"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#333333;"> <tr> <td align="center" valign="top"><div width="600" height="80" border="0" style="display:block"><h2 style="color: #ffffff">Email by eMarketting Portal</h2></td> </tr> </table> <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;" > <tr> <td width="520" style="padding-left:40px; padding-top:40px; padding-right:40px; padding-bottom:40px; vertical-align:top; background-color:#ffffff;"> <h3>'; 
        $message = $message . '<b>' . $email_body . '</b></h3> <p style="color:#4C4D4F; font-family:Cambria, Georgia, \'Times New Roman\', Times, serif;font-size:16px; line-height:24px; text-align:left;"><hr> '; 
        $message = $message . $message_text; 
        $message = $message . '<br><br>Details<hr>Reason -' . $reason . '<br>Reported By -' . $email; 
        $message = $message . '</p> </tr> </table> <table width="600" height="108" border="0" cellspacing="0" cellpadding="0" style="background-color:#4C4D4F; margin-bottom:50px;" > <tr> <td align="center"> <table width="600" height="88" border="0" cellspacing="0" cellpadding="0" > <tr> <td style="text-align:left;padding-left:40px;padding-top:40px;padding-bottom:40px;padding-right:40px;"><p style="font-family:Helvetica, Arial;font-size:12px;color:#fefefe;line-height:18px; text-align:left;"><a href="http://www.utk.edu/" style="color:#fefefe; text-decoration:none;">CONTACT US<br> </a><a href="" style="color:#fefefe; text-decoration:none;">eMarketting Portal</a><br> E-mail: <a href="" style="color:#ffffff; text-decoration:none;">info@emarketting.lk</a><br></p></td> </tr> </table></td> </tr> </table></td> </tr></table>';

        
        if ($this->send_report($email,$message) == TRUE) 
        {
            $this->report_model->insert_report($ad_id, $reason, $email, $message_text);
            redirect('advertisement_Controller/view/'.$ad_id);
        }
        else  
        {
            echo 'Error';
        }
        
        
        
    }

    public function send_report($email,$email_body){
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
            $admin_email='itp2013g7@gmail.com';
            $this->email->set_newline("\r\n");
            $this->email->from($email);
            $this->email->to($admin_email);
            $this->email->subject('e Marketting Portal');
            $this->email->message($email_body);
            
            if ($this->email->send())//IF successful 
            {
                return TRUE;
            }
            else 
            {
                return  FALSE;
            }
    }
}
