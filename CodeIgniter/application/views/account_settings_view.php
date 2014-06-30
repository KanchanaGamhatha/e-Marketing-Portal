<div class="pagination pagination-large">
    <ul>
        <li><a href="<?php echo base_url(); ?>index.php/my_ads_controller/">My Ads</a></li>
        <li class=""><a href="<?php echo base_url(); ?>index.php/favorite_controller/viewMyFavorite">Favorites</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/account_settings_controller">Account Settings</a></li>
    </ul>
</div>
<div class="container">
    <div class="brand">
        <div class="modal-header">
            <h3>Account Settings</h3>
        </div>
        <br>

        <div class="span5">
            <div class="well">
                <?php
                echo '<h4>Change Details</h4><hr>';
                
                echo form_open('account_settings_controller/update_user_details');
                
                /*Checking the user type if user type 
                    Populate the radio buttons according to the data
                 */
                if ($logged_in_user_type->type == 1)
                {
                    echo form_label('User type', 'type');
                    echo form_radio('type',"1", TRUE);
                    echo 'Private User';
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";;
                    echo form_radio('type', "2",FALSE );
                    echo " Business User";
                }
                else if ($logged_in_user_type->type == 2)
                {
                    echo form_label('User type', 'type');
                    echo form_radio('type', "2",TRUE );
                    echo 'Business User';
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
                    echo form_radio('type',"1", FALSE);
                    echo " Private User";
                }
                echo '<br><br>';
                //Displat name and phone number in text boxes by setting the details related to the logged user
                
                echo form_label('Name', 'name'); ?>
                
                <input type="text" id="name" name="name" value="<?php echo $logged_in_user_name->name; ?>" required>
                
                <?php
                //echo form_input('name', $logged_in_user_name->name, set_value('name'));
                echo form_error('name', '<p class ="alert alert-danger">');
                ?>
                
                <div id="errorMessageName" style="color: red" ></div>
                
                <?php
                //echo '<div class="alert alert-success">Add yor contact, Buyers will contact you instantly</div>';
                
                echo form_label('Phone Number', 'phone');
                 ?>
                
                <input type="tel" id="phone" name="phone" value="<?php echo $logged_in_user_phone->phone; ?>" required>
                
                <?php
                //echo form_input('phone', $logged_in_user_phone->phone, set_value('phone')); ?>
                
                <div id="errorMessagePhone" style="color: red" ></div>
                
                <?php echo form_error('phone', '<p class ="alert alert-danger">');
                
                echo form_label('District', 'location_id');
                //echo form_dropdown('location_id', $location_form_options, set_value('location_id')); ?>
                <select id="location_id" name="location_id" class="form-control">
                        <?php
                        foreach ($location_form_options as $row) {
                            echo '<option value="' . $row->location_id . '"';
                            if (isset($logged_in_user_location->location_id)) {
                                if ($row->location_id == $logged_in_user_location->location_id) {
                                    echo 'selected="selected"';
                                }
                            }
                            echo '>';
                            echo $row->location_name . '</option>';
                        }
                        ?>
                </select>
                <?php echo form_label('City', 'city_id'); ?>
                
                <div id ="city_dropdown">
                    <?php if ($logged_in_user_city->city_id == 0) { ?>
                    <select id="city_id" name="city_id" class="form-control">
                        <option>Select city</option>
                    </select>
                    <?php } else { ?>
                        <select id="city_id" name="city_id" class="form-control">
                            <?php
                            foreach ($cities as $row) {
                                echo '<option value="' . $row->city_id . '"';
                                if (isset($logged_in_user_city->city_id)) {
                                    if ($row->city_id == $logged_in_user_city->city_id) {
                                        echo 'selected="selected"';
                                    }
                                }
                                echo '>';
                                echo $row->city_name . '</option>';
                            }
                            ?>
                        </select>
                        
                    <?php } ?>
                    
                </div>
                
                
                <?php echo '<hr>';
                echo form_submit('submit', 'Change Details', 'class="btn btn-inverse"');
                echo form_close();
                ?>
            </div>
        </div>

        <div class="span6">
            <div class="well">
                <?php
                echo '<h4>Change Password</h4><hr>';
                echo form_open('account_settings_controller/update_password');
                
                if(isset($error))
                {
                    echo  '<div class="alert alert-danger">'.$error.'</div>';;
                }
                ?>
                <input type="hidden" id="currentActualPassword" name="currentActualPassword" value="<?php echo $logged_in_user_password->password; ?>">
                <?php 
                //echo form_hidden('currentActualPassword', $logged_in_user_password->password,set_value('currentActualPassword'));
                echo form_label("Current Password", "currnetPasWord");
                
                 ?>
                
                <input type="password" id="currnetPasWord" name="currnetPasWord" required>
                
                <?php
                $data = array(
                    'name' => 'currnetPasWord',
                    'id' => 'currnetPasWord',
                    'value' => set_value('')
                );

                //echo form_password($data);
                echo form_error('currnetPasWord', '<p class ="alert alert-danger">');
                ?>
                
                <div id="errorMessageCurrentPW" style="color: red" ></div>
                
                <?php echo form_label('New Password', 'newPassword');
                
                 ?>
                
                <input type="password" id="newPassword" name="newPassword" required>
                
                <?php
                $data = array(
                    'name' => 'newPassword',
                    'id' => 'newPassword',
                    'value' => set_value('')
                );

                //echo form_password($data);
                echo form_error('newPassword', '<p class ="alert alert-danger">');
                ?>
                
                <div id="errorMessageNewPW" style="color: red" ></div>
                
                <?php echo form_label('Confirm Password', 'confirmPassword');
                
                 ?>
                
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                
                <?php
                $data = array(
                    'name' => 'confirmPassword',
                    'id' => 'confirmPassword',
                    'value' => set_value('')
                );
                //echo form_password($data);
                echo form_error('confirmPassword', '<p class ="alert alert-danger">');
                ?>
                
                <div id="errorMessageConfirmtPW" style="color: red" ></div>
                
                <?php
                echo '<hr>';
                echo form_submit('submit', 'Change Password', 'class="btn btn-inverse"');
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>/js/account_settings.js">
</script>
