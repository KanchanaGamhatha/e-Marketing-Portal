<div class="container">



    <div class="row">
        <div class="span5">
            <div class="modal-header">

                <legend>Not Yet Registered.!!! Sign Up Now!</legend>
            </div>
            <div class="well">
                <?php echo anchor('login/signup', 'Sign Up', 'class="btn btn-success btn-large"'); ?>
                <h5>
                    <b class="icon-envelope"></b><b class="icon-arrow-right"></b>Create an Account to Post an Advertisement free<br><hr>
                    <b class="icon-edit"></b><b class="icon-arrow-right"></b>View, edit and delete your Advertisements<br><hr>
                    <b class="icon-briefcase"></b><b class="icon-arrow-right"></b>Save your contact details to save time<br><hr>
                    <b class="icon-bookmark"></b><b class="icon-arrow-right"></b>Keep in touch with your favorite Advertisements<br><hr>
                </h5>
            </div>
        </div>

        <div class="span4">
            <div class="modal-header">

                <legend>Login Now</legend>
            </div>
            <div class="well">
                <?php
                if (isset($errorMsg)) 
                {
                    echo "<div class=\"alert alert-danger\">$errorMsg</div>";
                } 
                else if (isset($msg)) 
                {
                    echo "<div class=\"alert alert-success\">$msg</div>";
                }
                ?>
                <hr>
                <?php
                echo form_open('login/validate_credentials');
                echo "<input type=\"text\" name=\"email\" id=\"email\" value=\"Email\" onfocus=\"clearEmail('click')\" onblur=\"clearEmail('blur')\" />";
                //echo form_input('email','Email');
                echo "<br>";
                echo "<input type=\"text\" name=\"passwordPlain\" id=\"passwordPlain\" value=\"Password\" onfocus=\"swapPasswordBoxes('click')\" />";
                echo "<input type=\"password\" name=\"password\" id=\"password\" value=\"\" onblur=\"swapPasswordBoxes('blur')\" style=\"display:none;\"/>";
                echo '<hr>';
                echo form_submit('submit', "Login", 'class="btn btn-primary"');
                echo '<hr>';
                echo anchor('login/resetPasswordView', 'I forgot my password');
                echo '<br>';
                echo anchor('login/signup', 'Sign Up');
                echo '<br>';
                ?>
            </div>
        </div>

    </div>

</div>
<script src="<?php echo base_url(); ?>/js/login.js">
</script>