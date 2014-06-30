<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="container">
    
    <div class="modal hide fade" id="sendemail-modal">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h4>Send an email to <?php echo html_escape($sellerName->name); ?></h4>
        </div>

        <div class="modal-body">


            <?php
            if ((isset($sellers_email->email)) || (isset($sellers_email_validate))) {
                if (isset($sellers_email->email)) {
                    $sellers_emailTo = $sellers_email->email;
                    //$sellers_emailTo = set_value('seller_email'); //'kanchanagsm@hotmail.com';
                }
                if (isset($sellers_email_validate)) {
                    $sellers_emailTo = $sellers_email_validate; //$sellers_emailTo = set_value('seller_email'); //'kanchanagsm@hotmail.com';
                }
            } else {
                $sellers_emailTo = "Email Sent";
            }
            echo '<h5>Seller\'s email : ' . $sellers_emailTo . '</h5>';
            ?>

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
            echo form_hidden('ad_id', $advertisement->advertisement_id, set_value('ad_id'));

            echo form_label('Your Name', 'name');?>

            <input type="text" name="name" id="name" required />
            <div id="errorMessageName" style="color: red"></div>
            
            <?php echo form_error('name', '<p class ="alert alert-danger">');
            echo form_label('Email', 'email'); ?>
            
            <input type="email" name="email" id="email" required />
            <div id="errorMessage" style="color: red"></div>
            <?php
            echo form_error('email', '<p class ="alert alert-danger">');
            echo form_label('Phone Number', 'phone'); ?>
            <input type="number" name="phone" id="phone" minlength="10" maxlength="10" required />
            <div id="errorMessagePhone" style="color: red"></div>
            
            <?php
            echo form_error('phone', '<p class ="alert alert-danger">');

            echo form_label('Message', 'message');
            $data = array(
                'name' => 'message',
                'id' => 'message',
                'value' => set_value('message')
            );

            echo form_textarea($data, '', '<div style="width:350px; height:150px" required');
            echo form_error('message', '<p class ="alert alert-danger">');
            ?>
            <div class="row">
                <div class="span3">
                    <?php echo form_submit('submit', 'Send Email', 'class="btn btn-inverse"'); ?>
                </div>

                <div class="span1">
                    <?php echo form_reset('clear', 'Clear', 'class="btn btn-inverse" onclick=\'clear();\''); ?>
                </div>
            </div>
                    <?php echo form_close(); ?>

        </div>

        <div class="modal-footer">
            <button class="btn btn-inverse" data-dismiss="modal">Close</button>
        </div>
    </div>
            
    <div class="modal hide fade" id="my-modal">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h3>Call <?php echo html_escape($sellerName->name); ?></h3>
        </div>

        <div class="modal-body">
            <center>
            <h5>Phone Number</h5>
            <h1><?php //echo html_escape($advertisement->advertisement_phonnumber); ?>
            <span class="breadcrumb label-warning">
                <?php echo html_escape($advertisement->advertisement_phonnumber); ?>
            </span>
            </h1>
            </center>
        </div>

        <div class="modal-footer">
            <button class="btn btn-inverse" data-dismiss="modal">Close</button>
        </div>
    </div>
    
    <div class="modal hide fade" id="rate-modal">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h3>Rate <?php echo html_escape($sellerName->name); ?></h3>
        </div>

        <div class="modal-body">
            <?php
            echo form_open('');
            //echo form_hidden('logged_in_user_id', $logged_in_user_id->user_id, set_value('logged_in_user_id'));
            ?>
            <div class="basic" data-average="20" id="rate" name="rate"></div>
            <?php
            echo form_hidden('seller_id', $advertisement->user_id, set_value('seller_id'));
            echo '<br>';
            echo form_submit('submit', 'Rate', 'class="btn btn-warning"');
            ?>

            <?php echo form_close(); ?>
           
        </div>

        <div class="modal-footer">
            <button class="btn btn-inverse" data-dismiss="modal">Close</button>
        </div>
    </div>
    
    <div class="modal hide fade" id="report-modal">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h3>Report Ad</h3>
        </div>

        <div class="modal-body">
            <?php 
            echo form_open('report_controller/insert_report');
            
            echo form_hidden('advertisement_id', $advertisement->advertisement_id, set_value('advertisement_id'));
            echo form_label('Reason', 'report_reason');
            $report_reason =Array('Item sold','Fraud','Duplicate','Spam','Wrong category','Offensive','Other');
            //echo form_dropdown('report_reason', $report_reason, set_value('report_reason'));
            ?>
            <select id="report_reason" name="report_reason" class="form-control">
                <?php
                foreach ($report_reason as $row) {
                    echo '<option value="' . $row . '"';
                    echo '>';
                    echo $row . '</option>';
                }
                ?>
            </select>
            <?php
            echo form_label('Your email', 'report_email');?>
            <input type="email" name="report_email" id="report_email" placeholder="you@example.com" required/>
            <?php //echo form_input('report_email', set_value('report_email'),'required');
            
            echo form_label('Message', 'report_message');
            echo form_textarea('report_message', set_value('report_message'), 'required <div style="width:450px"');
            ?>
            <div class="row">
                <div class="span1">
                <?php echo form_submit('submit', 'Submit', 'class="btn btn-inverse"'); ?>
                </div>
                <div class="span1">
                <?php echo form_reset('clear', 'Clear', 'class="btn btn-inverse"');?>
                </div>
            </div>
            <?php echo form_close();?>
            

        </div>

        <div class="modal-footer">
            <button class="btn btn-inverse" data-dismiss="modal">Close</button>
        </div> 
    </div>
    
    <div class="modal hide fade" id="share-modal">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h3>Share <?php echo html_escape($advertisement->advertisement_title); ?></h3>
        </div>

        <div class="modal-body">


            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class=""><a href="#tab1" data-toggle="tab">Social Sharing</a></li>
                    <li><a href="#tab2" data-toggle="tab">Email</a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="row">
                            <div class="span2">
                                <h5>Share in Facebook</h5>
                                <div class="fb-share-button" data-href="<?php echo base_url() . "index.php/advertisement_Controller/view/" . $advertisement->advertisement_id; ?>" data-type="button_count"></div>
                            </div>
                            <div class="span2">
                                <h5>Share in Twitter</h5>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" target="_blank" data-url="">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <?php
                        echo form_open('email_controller/send_share_email');
                        
                        $ad_ink =  base_url() . "index.php/advertisement_Controller/view/" . $advertisement->advertisement_id; 
                        echo form_hidden('ad_link', $ad_ink, set_value('ad_link'));
                        echo form_hidden('advertisement_id', $advertisement->advertisement_id, set_value('advertisement_id'));
                        
                        echo form_label('Your Name', 'report_email');?>
                        <input type="text" name="your_name" id="your_name"  required/>
                        
                        <?php
                        echo form_label('Your email', 'your_email');?>
                        <input type="email" name="your_email" id="your_email" placeholder="you@example.com" required/>
                        
                        <?php
                        echo form_label('Friend email', 'friend_email');?>
                        <input type="email" name="friend_email" id="friend_email" placeholder="friend@example.com" required/>
                        
                        <?php echo form_label('Message', 'share_message');
                        echo form_textarea('share_message', set_value('share_message'), 'style="width:450px"');
                        ?>
                        
                        <div class="row">
                        <div class="span1">
                        <?php echo form_submit('submit', 'Send', 'class="btn btn-inverse"'); ?>
                        </div>
                        <div class="span1">
                        <?php echo form_reset('clear', 'Clear', 'class="btn btn-inverse"');?>
                        <?php echo form_close(); ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-inverse" data-dismiss="modal">Close</button>
        </div>
    </div>
    
    
    <div class="modal hide fade" id="picture-modal">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <?php echo img('uploads/' . $advertisement->advertisement_image) ?>
        </div>

        
    </div>

    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php">Home</a> <span class="divider">/</span></li>
        <li><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/">All Advertisements</a> <span class="divider">/</span></li>
        <?php if (isset($electronic_ad_data->electronic_type)) { ?>
        <li><a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>">Electronic</a><span class="divider">/</span></li>
        <?php } ?>
        <?php if (isset($home_and_personal_ad_data->home_personal_type)) { ?>
        <li><a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>">Home And Personal</a><span class="divider">/</span></li>
        <?php } ?>
        <?php if (isset($vehicle_ad_data->vehicle_type)) { ?>
        <li><a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>">Vehicle</a><span class="divider">/</span></li>
        <?php } ?>
        <?php if (isset($property_ad_data->property_address)) { ?>
        <li><a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>">Property</a><span class="divider">/</span></li>
        <?php } ?>
        <?php if (isset($sub_category_name) && $sub_category_id != 0){ ?>
        
        <li>
            <a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>&subcategory=<?php echo html_escape($sub_category_id); ?>">
                        <?php echo html_escape($sub_category_name); }?>
           </a><span class="divider">/</span>
        </li>
        <li  class="active"><a href=""><?php echo html_escape($advertisement->advertisement_title); ?></a></li>
    </ul>
    
    <div class="breadcrumb">

        <div class="brand"><h2> <?php echo html_escape($advertisement->advertisement_title); ?></h2></div>
        Posted By <b style="color: #0044cc"><a href="#my-modal" class="" id="my-button">
            <?php echo html_escape($sellerName->name); ?>
            </a></b> on <b style="color: #c67605">
                <?php echo html_escape($advertisement->post_date_time); ?></b>
            
        <a href="<?php echo base_url(); ?>index.php/favorite_controller/add_to_favorite/<?php echo $advertisement->advertisement_id; ?>" class="btn btn-mini btn-inverse"><b class="icon-star"></b> Add to Favorite</a>
        <a href="#share-modal" class="btn btn-mini btn-inverse" id="share-button"><b class="icon-share"></b>Share</a>
        <?php //echo base_url()."index.php/advertisement_Controller/view/".$advertisement->advertisement_id; ?>
        
        
        <?php //if (isset($currentRating->current_rate)): ?>
        <!--<div class="exemple4" data-average="<?php //echo $currentRating->current_rate;  ?>" data-id="<?php //echo $currentRating->rating_Id;  ?>"></div> -->
        <?php
        //endif;
        //echo '';
        ?>

        <br><br>
        <div class="row">
            <div class="span8">
                
                <a class="thumbnail" href="#picture-modal" id="picture-button"><?php echo img('uploads/' . $advertisement->advertisement_image) ?></a>
                <hr>
                <?php echo $advertisement->advertisement_Description; ?>
                 <hr>
                <a href="#report-modal" class="btn btn-small btn-inverse" id="report-button">Report Ad</a>
                
                    
            </div>

            <div class="span3">

                <div class="input-prepend input-append">
                    <h4>
                        <b>Price </b><br><br>
                        <span class="btn-large" style="background-color: darkgray">
                            <?php if($advertisement->advertisement_Price != 0)
                                {
                                    echo 'Rs. '.$advertisement->advertisement_Price;
                                }
                                else
                                {
                                    echo 'Negotiable Price';
                                } ?>
                        </span></h4>
                </div>


                <?php if($advertisement->catogory_id == 0) {?>
                <br>Category :<a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>"><b style="color: #468847">Other</b></a>
                <?php } ?>
                
                <?php if (isset($electronic_ad_data->electronic_type)) { ?>
                <br>Type :<b style="color: #468847"><?php echo html_escape($electronic_ad_data->electronic_type); ?></b>
                <br><br>Brand :<b style="color: #468847"><?php echo html_escape($electronic_ad_data->electronic_brand); ?></b>
                <br><br>Category :<a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>"><b style="color: #468847">Electronic</b></a>


                <?php } ?>

                <?php if (isset($home_and_personal_ad_data->home_personal_type)) {
                    ?>   
                    <br>Type :<b style="color: #468847"><?php echo html_escape($home_and_personal_ad_data->home_personal_type); ?></b>
                    <br><br>Category :<a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>"><b style="color: #468847">Home & Personal</b></a>
                <?php } ?>

                <?php if (isset($vehicle_ad_data->vehicle_type)) {
                    ?>   
                    <br>Type :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_type); ?></b>
                    <br><br>Brand :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_brand); ?></b>
                    <br><br>Model :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_model); ?></b>
                    <br><br>Year :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_manufacture_year); ?></b>
                    <br><br>Transmission :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_transmission); ?></b>
                    <br><br>Milage :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_milage); ?> km</b>
                    <br><br>Engine :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_engine); ?> cc</b>
                    <br><br>Condition :<b style="color: #468847"><?php echo html_escape($vehicle_ad_data->vehicle_condition); ?></b>
                    <br><br>Category :<a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>"><b style="color: #468847">Vehicle</b></a>
                    
                <?php } ?>

                <?php if (isset($property_ad_data->property_address)) {
                    ?>   
                    <br>Address :<b style="color: #468847"><?php echo html_escape($property_ad_data->property_address); ?></b>
                    <br><br>Category :<a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>"><b style="color: #468847">Property</b></a>
                <?php } ?>
                    
                    <?php if (isset($sub_category_name) && $sub_category_id != 0){ ?>
                    <br><br>Sub Category :<a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($advertisement->catogory_id); ?>&subcategory=<?php echo html_escape($sub_category_id); ?>">
                        <b style="color: #468847"><?php echo html_escape($sub_category_name); }?></b>
                    </a>
                    
                    
                    <?php if (isset($location_name)){?>
                    <br><br>Location :<a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?location=<?php echo html_escape($advertisement->advertisement_location); ?>">
                        <b style="color: #468847"><?php echo $location_name;}?></b>
                    </a>
                    
                <hr>

                <h5><a href="#my-modal" class="btn btn-inverse btn-block" id="my-button2">Call <?php echo html_escape($sellerName->name); ?> <span><b class="icon-bell"></b></span></a></h5>
                <br>
                <!--<a href="<?php //echo base_url(); ?>index.php/email_controller/index/<?php //echo $advertisement->advertisement_id; ?>" class="btn btn-success">Reply By email</a>-->
                <h5><a href="#sendemail-modal" class="btn btn-inverse btn-block" id="sendemail-button">Reply By email</a></h5>
                <hr>
                <!-- Display the current rating-->
                
                <?php if (isset($currentRating->current_rate)): ?>
                    <h5> 
                        Current Rating
                        <div class="label label-warning"><?php echo $currentRating->current_rate; ?> </div>
                        <p>
                            <div class="exemple4" data-average="<?php echo $currentRating->current_rate; ?>" data-id="<?php echo $currentRating->rating_Id; ?>"></div>
                        </p>
                        <?php
                    endif;
                    echo '';
                    ?>
                    <?php if (($seller_type->type) == 2): ?>
                        <a class="btn btn-small btn-info" href="#rate-modal" class="" id="rate-button">Rate <?php echo html_escape($sellerName->name); ?></a></h5>
                    <?php endif; ?>
                



            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    $('.basic').jRating({
        phpPath: 'http://localhost/CodeIgniter/index.php/rating_controller/insert_rate/<?php echo $advertisement->user_id; ?>'
    });

});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/ratings.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/validations.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jquery/jRating.jquery.js"></script>