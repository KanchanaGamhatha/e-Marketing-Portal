<?php
class Login extends CI_Controller
{
    

    function index()
    {
         $this->load->view('includes/header');
        $this->load->view('login_form');
        $this->load->view('includes/footer');
        
    }
     /*
    * Function to logout a user and destroy session
    */
    function logout()
    {
       
        $this->session->unset_userdata('is_logged_in');
        session_destroy();
        
        redirect('login');
        
    }
     /*
    * Function to validate user login info and session creation
    */
    function validate_credentials()
    {
          
        $this->load->model('membership_model');
        
        $email=$this->input->post('email');
        $password=md5($this->input->post('password'));
        $query = membership_model::validate($email,$password);
			
        if ($query) 
        {
                $data = array(
                                'email' => $this->input->post('email'),
                                'is_logged_in' => TRUE
                );

                $this->session->set_userdata($data);
                redirect('site/members_area');
                
        }
        else 
        {
                $data['main_content']='login_form';
                $data['errorMsg']='Username or Password did not match please retry';
                $this->load->view('includes/template',$data);
                
        }
    }
    /*
    * Function to validate user login info and session creation
    */
    function signup() 
    {
        $data['main_content']='signup_form';
        $this->load->view('includes/template',$data);
    }
    /*
    * Function to laod the reset password form
    */
    function resetPasswordView() 
    {
        $data['main_content']='reset_password';
        $this->load->view('includes/template',$data);
    }
    /*
    * Function to reset password
    */
    function resetPassword() 
    {
        $this->load->model('membership_model');
        
        $email=$this->input->post('email');
        $newPassword=  $this->generateRandomString(10);
        $message='Your new Password is '.$newPassword;
        
        
        $memberResult=membership_model::find_user($email,'registered_user');
        
        
        if($memberResult)
        {
            $emailResult=$this->sendEmail($email, 'Password Reset', $message);
            $passwordResult=membership_model::resetPassword(md5($newPassword),$email);
            
            if($emailResult && $passwordResult)
            {
                $data['main_content']='reset_password';
                $data['msg']='Your new password has been sent to your email';
                $this->load->view('includes/template',$data); 
            }
            
        }
        else 
        {
            $data['main_content']='reset_password';
            $data['errorMsg']='User did not found';
            $this->load->view('includes/template',$data);
        }
    }
    /*
    * Function to generate a random string 
    */
    function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString; 
    }
    /*
    * Function to validate user data and insert user data to the database 
    */
    function create_member()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');

        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');

        if (($this->form_validation->run()) == FALSE) 
        {                
            $this->signup();
        }
        else 
        {
                $this->load->model('membership_model');
                
                $name=$this->input->post('name');
                $email=$this->input->post('email');
                $type=$this->input->post('type');
                $password=md5($this->input->post('password'));
                $activation_code = $this->generateRandomString(20);

                $result = $this->membership_model->create_unregistered_member($name,$email,$type,$password,$activation_code);
                
                $message='Click the link below to activate your account '.anchor('http://localhost/CodeIgniter/index.php/login/account_activation/' . $activation_code,'Confirmation Register');
                
                 
                
                if ($result) 
                {
                    $this->sendEmail($email, 'Registration Confirmation', $message);
                    $data['main_content']='signup_form';
                    $data['signup']='success'; 
                    $this->load->view('includes/template',$data);
                }
                else 
                {
                    $data['main_content']='signup_form';
                    $data['signup']='user found';
                    $this->load->view('includes/template',$data);
                }
        }
    }
    /*
    * Function to send an email
    */
    function sendEmail($address,$subject,$message)
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


        $this->load->library('email',$config);

        //Setting up the fields of the email

        $this->email->set_newline("\r\n");
        $this->email->from(set_value('email'), 'e MArketing');
        $this->email->to($address);
        $this->email->subject('Registration Confirmation');
        $this->email->message($message);
        $result=$this->email->send();
        if($result)
        {
            return TRUE;
        }
        else 
        { 
            return FALSE;
        }
    }
    /*
    * Function to activate an user account using the activation code in the confirmation email
    */
    function account_activation() 
    {
        $register_code = $this->uri->segment(3);
       
        if ($register_code == '')    
        {
            echo 'errpr no registration code in URL';
            exit();
        }
        $this->load->model('membership_model');
        $reg_confirm = $this->membership_model->confirm_registration($register_code);
        //$this->output->enable_profiler(1);
        
        if($reg_confirm)    
        {
            $data['main_content']='login_form';
            $data['msg']='you have successfully registered to our system';
            $this->load->view('includes/template',$data);
            
        }
        else 
        {
            $data['main_content']='login_form';
            $data['errorMsg']='you have failed to register';
            $this->load->view('includes/template',$data);
            
        }
            
    } 

    
    }

?>
