<div class="pagination pagination-large">
    <ul>
        <li class=""><a href="<?php echo base_url(); ?>index.php/admin_user_management_controller">Manage Registered Users</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/admin_signup">Add new Administrator</a></li>
        <li class=""><a href="<?php echo base_url(); ?>index.php/admin/view_reports">View Reports</a></li>

    </ul>
</div>

<div class="">
	<div class="modal-header">
		
                <legend>Create Administrator</legend>
	</div>
	<div class="breadcrumb">
		<?php
                if(isset($signup)&&($signup=='success'))
                {
                    echo "<div class=\"alert alert-success\">Signup is successful</div>";
                }
                else if(isset($signup)&&($signup=='user found'))
                {
                    echo "<div class=\"alert alert-danger\">User exists, Please use another UserId </div>";
                }
		?>
		<?php
				
				echo form_open('admin/create_admin');
				echo "<table class=\"table\"><tr><td>User Name</td><td>";
				echo form_input('adminId','',set_value('adminId'));
				echo "</td></tr>";
                                echo "<tr><td>Passowrd</td><td>";
				echo "<input type=\"text\" name=\"passwordPlain\" id=\"passwordPlain\" value=\"Password\" onfocus=\"swapPasswordBoxesPassword('click')\" />";
                                echo "<input type=\"password\" name=\"password\" id=\"password\" value=\"\" onblur=\"swapPasswordBoxesPassword('blur')\" style=\"display:none;\"/>";
                                //echo form_password('password','password');
				echo "</td></tr>";
                                echo "<tr><td>Confirm</td><td>";
				echo "<input type=\"text\" name=\"passwordPlain2\" id=\"passwordPlain2\" value=\"Confirm Password\" onfocus=\"swapPasswordBoxesConfirmPassword('click')\" />";
                                echo "<input type=\"password\" name=\"password2\" id=\"password2\" value=\"\" onblur=\"swapPasswordBoxesConfirmPassword('blur')\" style=\"display:none;\"/>";
                                //echo form_password('password2','Confirm Password');
                                echo "</td></tr>";
                                echo "</table>";
                                echo validation_errors('<p class ="alert alert-danger">');
				echo form_submit('submit','Create Admin','class="btn btn-primary"');
				echo "<br/><br/>";
                                echo anchor('admin','Go to Admin Login');
				?>
	</div>
	<div class="modal-footer">
		
	</div>
</div>
<script src="<?php echo base_url(); ?>/js/signup.js"></script>