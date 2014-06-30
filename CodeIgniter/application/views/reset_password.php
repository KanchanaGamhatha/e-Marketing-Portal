<div class="row">
    <div class="span5">
        <div class="modal-header">

            <legend>Don't worry!</legend>
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
            <legend>Reset Password</legend>
        </div>
        <div class="well">
            <div class="breadcrumb">
                <?php
                if (isset($errorMsg)) {
                    echo "<div class=\"alert alert-danger\">$errorMsg</div>";
                } else if (isset($msg)) {
                    echo "<div class=\"alert alert-success\">$msg</div>";
                }
                ?>
                <?php
                echo form_open('login/resetPassword');
                //echo "<input type=\"email\" name=\"email\" id=\"email\" value=\"Email\" onfocus=\"clearEmail('click')\" />";
                echo '<hr>';
                echo form_input('email', 'Email');
                echo '<hr>';
                echo form_submit('submit', "Reset", 'class="btn btn-primary"');
                echo '<hr>';
                echo anchor('login', 'Go to Login');
                ?>
            </div>
            <div class="modal-footer">

            </div>
        </div> 
    </div>
</div>
