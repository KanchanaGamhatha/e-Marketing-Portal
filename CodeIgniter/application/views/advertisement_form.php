<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css" type="text/css" media="screen" charset="UTF-8"/>
<div class="breadcrumb">

    <div class="container">
        <div class="stepwizard">
                <div class="stepwizard-row">
                    <div class="stepwizard-step">
                        <button type="button" class="btn btn-primary btn-circle">1</button>
                        <h5>Enter details</h5>
                    </div>
                    <div class="stepwizard-step">
                        <button type="button" class="btn btn-default btn-circle">2</button>
                        <p>Check Again</p>
                    </div>
                    <div class="stepwizard-step">
                        <button type="button" class="btn btn-default btn-circle">3</button>
                        <p>Success</p>
                    </div> 
                </div>
            </div>
        <div class="row">
            <div class="span1">

            </div>
            <div class="span9">
                <div class="alert alert-block alert-info">
                    <h4>Quick rules</h4><br>
                    <b class="icon-certificate"></b><a href="">Do not post un allowed text in the title and description .</a><br>
                    <b class="icon-certificate"></b>Do not include your Email, Contact numbers and URLs in the title or description.<br>  
                    <b class="icon-certificate"></b>Do not upload unsuitable pictures . Invalid picture ads will be removed after manual checking.<br><br>
                    <a href="">More rules</a>
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="span1">

            </div>
            <div class="span9">
                <h3>Fill in Details</h3>
                <?php echo validation_errors(); ?>
                <?php echo $this->upload->display_errors('<div class="alert alert-error">', '</div>'); ?>
                <?php echo form_open_multipart(); ?>
                <div>
                    <?php echo form_label('Title', 'advertisement_title'); ?>
                    <input type="text" id="advertisement_title" name="advertisement_title" required>
                    <?php //echo form_input('advertisement_title', set_value('advertisement_title'), 'required'); ?>
                    
                    <div id="title_rules" style="color: #999999;" class="hidden" >
                            <b>Quick rules</b><br>
                            Do not post un allowed text in the Title<br>
                            Do not include your Email, Contact numbers and URLs in the Title.
                        </div>
                        <div id="title_error" style="color: red" ></div>
                        <div id="title_error_message" style="color: red" ></div>
                        <div id="title_error_message_phone" style="color: red" ></div>
                        <div id="title_error_message_URL" style="color: red" ></div>
                </div>
                <div>
                    <?php echo form_label('Category', 'catogory_id'); ?>
                    <?php echo form_dropdown('catogory_id', $catogory_form_options, set_value('catogory_id'), 'id ="dropdown_category" '); ?>

                </div>
                <div id ="newcatogory"> </div>
                <div>
                    <div class="">
                        <?php echo form_label('Description', 'advertisement_Description'); ?>
                        <?php //echo form_textarea('advertisement_Description', set_value('advertisement_Description'), 'required <div style="width:450px"'); ?>
                        <textarea id="advertisement_Description" name="advertisement_Description" required style="width:450px; height:150px "></textarea>
                        <div id="description_rules" style="color: #999999;" class="hidden" >
                            <b>Quick rules</b><br>
                            Do not post un allowed text in the description<br>
                            Do not include your Email, Contact numbers and URLs in the Description.
                        </div>
                        <div id="description_error" style="color: red" ></div>
                        <div id="errorMessage" style="color: red" ></div>
                        <div id="errorMessagePhone" style="color: red" ></div>
                        <div id="errorMessageURL" style="color: red" ></div>
                    </div>
                    <div>
                        <?php echo form_label('Price ', 'advertisement_Price'); ?>
                        <div class="input-prepend">
                            <span class="add-on">Rs:</span>
                            <?php //echo form_input('advertisement_Price', set_value('advertisement_Price'),'required'); ?>
                            <input type="text" id="advertisement_Price" name="advertisement_Price" required>
                        </div>
                        <input type="checkbox" id="negotiable" name="negotiable" >Negotiable
                    </div>
                    <div>
                        <?php echo form_label('Location', 'location_id'); ?>
                        <?php //echo form_dropdown('location_id', $location_form_options, set_value('location_id')); ?>
                        <select id="location_id" name="location_id" class="form-control">
                            <?php
                            foreach ($locations as $row) {
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
                    </div>
                    <div>
                        <?php echo form_label('Phone Number', 'advertisement_phonnumber', ''); ?>
                        <input type="text" id="advertisement_phonnumber" name="advertisement_phonnumber" value="<?php echo $logged_in_user_phone->phone ?>" required>
                        <?php //echo form_input('advertisement_phonnumber',$logged_in_user_phone->phone ,set_value('advertisement_phonnumber'),'required'); ?>
                    </div>

                    <div>
                        <?php echo form_label('Image', 'issue_cover'); ?>
                        <?php echo form_upload('issue_cover', 'class="btn btn-primary"'); ?>
                    </div>
                   

                    <hr>
                    <div>
                        <?php echo form_submit('save', 'Check Ad', 'class="btn btn-primary btn-large"'); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>

    </div>
    <script src="<?php echo base_url(); ?>/js/check_description.js">
    </script>
    <script src="<?php echo base_url(); ?>/js/insert_category.js">
    </script>
    <script type="text/javascript">
        var dropdownLocation = document.getElementById("location_id");

        dropdownLocation.onclick = function() {
            var dropdown_location_value = dropdownLocation.options[dropdownLocation.selectedIndex].value;
            //console.log("Select zzzzzzzzzzzz");
            $.ajax({
                //url: 'http://localhost/CodeIgniter/index.php/account_settings_controller/loadCityDropdown',
                url: "<?php echo site_url("account_settings_controller/loadCityDropdown");?>",
                async: false,
                type: 'POST',
                data: ({'dropdown_location_value': dropdown_location_value}),
                //data: {'location_id': selectedLocation},
                success: function(result) {
                    $('#city_dropdown').html(result);
                    //descriptionTextArea.focus();
                }
            });
        }
    </script>

