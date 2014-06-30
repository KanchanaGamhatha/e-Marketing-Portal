
<div class="row">
    <div class="span4">

    </div>
    <div class="span4">
        <div class="modal-header">
            <legend>Administrator Login</legend>
        </div>
        <div class="well">
            <?php
            if (isset($errorMsg)) {
                echo "<div class=\"alert alert-danger\">$errorMsg</div>";
            } else if (isset($msg)) {
                echo "<div class=\"alert alert-success\">$msg</div>";
            }
            ?>
            <?php
            echo form_open('admin/validate_credentials');
            echo "<input type=\"text\" name=\"user_name\" id=\"user_name\" value=\"Username\" onfocus=\"clearUserName('click')\" />";
            //echo form_input('user_name', 'Username');
            echo "<br>";
            echo "<input type=\"text\" name=\"passwordPlain\" id=\"passwordPlain\" value=\"Password\" onfocus=\"swapPasswordBoxes('click')\" />";
            echo "<input type=\"password\" name=\"password\" id=\"password\" value=\"\" onblur=\"swapPasswordBoxes('blur')\" style=\"display:none;\"/>";
            echo '<hr>';
            echo form_submit('submit', "Login", 'class="btn btn-primary"');
            echo '<hr>';
            echo anchor('admin/admin_signup', 'Create Admin');
            ?>
        </div>
        
    </div>
</div>
<div class="span4">

</div>
<script src="<?php echo base_url(); ?>/js/login.js">
</script>