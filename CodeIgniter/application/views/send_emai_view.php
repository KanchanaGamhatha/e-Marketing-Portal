<div class="container">
    
        <div class="breadcrumb">
            <div class="well well-small">
                <h4>Contact seller by email</h4>
                <?php
                
                if((isset($sellers_email->email))||(isset($sellers_email_validate)))
                {
                    if (isset($sellers_email->email)) {
                     $sellers_emailTo = $sellers_email->email;
                    //$sellers_emailTo = set_value('seller_email'); //'kanchanagsm@hotmail.com';
                    }
                    if (isset($sellers_email_validate)) {
                        $sellers_emailTo = $sellers_email_validate;//$sellers_emailTo = set_value('seller_email'); //'kanchanagsm@hotmail.com';
                    }
                   
                }
                else {
                    $sellers_emailTo = "Email Sent";
                }
                 echo '<p class ="alert alert-info"> <b>Seller\'s email : </b> ' . $sellers_emailTo;
                ?>
            </div>
                <?php
                $this->load->helper('form');

                //Display success message if email is sent
                if (isset($message)) {
                    echo '<p class ="alert alert-success"> ' . $message;
                }
                //Display error message if email is not sent
                if (isset($errormessage)) {
                    echo '<p class ="alert alert-error"> ' . $errormessage;
                }


                echo form_open('email_controller/send_email');
                
                echo form_hidden('seller_email', $sellers_emailTo, set_value('seller_email'));

                echo form_label('Your Name', 'name');

                $data = array(
                    'name' => 'name',
                    'id' => 'name',
                    'value' => set_value('name')
                );

                echo form_input($data, '', '<div style="width:300px;" required');
                echo form_error('name', '<p class ="alert alert-danger">');

                echo form_label('Email', 'email');

                $data = array(
                    'name' => 'email',
                    'id' => 'email',
                    'value' => set_value('email')
                );
                ?>
                <input type="email" name="email" id="email" placeholder="you@example.com" style="width:300px " />
                <?php
                //echo form_input($data, '', '<div style="width:300px;" required type="email"');
                echo form_error('email', '<p class ="alert alert-danger">');

                echo form_label('Phone Number', 'phone');

                $data = array(
                    'name' => 'phone',
                    'id' => 'phone',
                    'value' => set_value('phone')
                );
                echo form_input($data, '', '<div style="width:300px;" required');
                echo form_error('phone', '<p class ="alert alert-danger">');

                echo form_label('Message', 'message');
                $data = array(
                    'name' => 'message',
                    'id' => 'message',
                    'value' => set_value('message')
                );

                echo form_textarea($data, '', '<div style="width:450px;" required');
                echo form_error('message', '<p class ="alert alert-danger">');

                echo '<hr>';
                echo form_reset('clear', 'Clear', 'class="btn btn-primary" onclick=\'clear();\'');
                echo '<div style="width:350px;float: left;">';
                echo form_submit('submit', 'Send Email', 'class="btn btn-primary"');

                echo form_close();
                ?>
        </div>
    
</div>    
<script type="text/javascript" src="/js/validations.js"></script>

