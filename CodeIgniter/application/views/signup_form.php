<div class="container">
    <div class="row">
        <div class="span6">
            <div class="modal-header">

                <legend>Sign Up Now It's all for free!</legend>
            </div>
            <div class="well">

                <h5>
                    <b class="icon-envelope"></b><b class="icon-arrow-right"></b>Create an Account to Post an Advertisement free<br><hr>
                    <b class="icon-edit"></b><b class="icon-arrow-right"></b>View, edit and delete your Advertisements<br><hr>
                    <b class="icon-briefcase"></b><b class="icon-arrow-right"></b>Save your contact details to save time<br><hr>
                    <b class="icon-bookmark"></b><b class="icon-arrow-right"></b>Keep in touch with your favorite Advertisements<br><hr>
                </h5>
            </div>
        </div>


        <div class="span5">
            <div class="modal-header">

                <legend>Sign Up</legend>
            </div>
            <div class="well">
                <?php
                if (isset($signup) && ($signup == 'success')) {
                    echo "<div class=\"alert alert-success\">Signup is successful</div>";
                } else if (isset($signup) && ($signup == 'user found')) {
                    echo "<div class=\"alert alert-danger\">Email address exists, Please use another email address</div>";
                }
                ?>
                <?php
                echo form_open('login/create_member');
                echo "<table><tr><td>";
                echo "<input type=\"text\" name=\"name\" id=\"name\" value=\"Name\" onfocus=\"clearName('click')\" onblur=\"clearName('blur')\"/>";
                //echo form_input('name','Name',set_value('Name'));
                echo "</td></tr>";
                echo "<tr><td>";
                echo "<input type=\"email\" name=\"email\" id=\"email\" value=\"Email\" onfocus=\"clearEmail('click')\" onblur=\"clearEmail('blur')\" />";

                echo "</td></tr>";
                echo "<tr><td>";
                echo "<input type=\"text\" name=\"passwordPlain\" id=\"passwordPlain\" value=\"Password\" onfocus=\"swapPasswordBoxesPassword('click')\" />";
                echo "<input type=\"password\" name=\"password\" id=\"password\" value=\"\" onblur=\"swapPasswordBoxesPassword('blur')\" style=\"display:none;\"/>";
                //echo form_password('password','password');
                echo "</td></tr>";
                echo "<tr><td>";
                echo "<input type=\"text\" name=\"passwordPlain2\" id=\"passwordPlain2\" value=\"Confirm Password\" onfocus=\"swapPasswordBoxesConfirmPassword('click')\" />";
                echo "<input type=\"password\" name=\"password2\" id=\"password2\" value=\"\" onblur=\"swapPasswordBoxesConfirmPassword('blur')\" style=\"display:none;\"/>";
                //echo form_password('password2','Confirm Password');
                echo "</td></tr>";
                echo "<tr><td>";
                echo form_radio('type', "1", TRUE);
                echo " Private User";
                echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
                echo form_radio('type', "2", FALSE);
                echo " Business User";
                echo "<hr/>";
                echo "</td></tr></table>";
                echo validation_errors('<p class ="alert alert-danger">');

                echo form_submit('submit', 'Sign Up', 'class="btn btn-primary"');
                echo "<br/><br/>";
                echo anchor('login', 'Go to Login');
                ?>
            </div>
            <div class="modal-footer">

            </div>  
        </div>



    </div>
</div>
<script src="<?php echo base_url(); ?>/js/signup.js"></script>