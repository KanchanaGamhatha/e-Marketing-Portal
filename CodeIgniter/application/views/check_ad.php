<div class="container">

    <div class="breadcrumb">
        <h3>Check Your Ad</h3>
        
        <?php echo form_open('advertisement_Controller/check_add'); ?>
        
        <div class="row">
            <div class="span2">
            <?php echo form_label('Title', 'advertisement_title'); ?>
            </div>
            <div class="span2">
            <label>
                <?php echo html_escape($advertisement->advertisement_title); 
                echo form_hidden('advertisement_title', $advertisement->advertisement_title);?>
                
            </label>
            </div>
        </div>
        <div class="row">
            <div class="span2">
            <?php echo form_label('Category', 'catogory_id'); ?>
            </div>
            <div class="span2">
            <label >
                <?php echo html_escape($advertisement->catogory_id); 
                echo form_hidden('catogory_id', $advertisement->catogory_id); ?>
            </label>
            </div>
            
        </div>
        <div id ="newcatogory"> </div>

        <div class="row">
            <div class="span2">
            <?php echo form_label('Description', 'advertisement_Description'); ?>
            </div>
            <div class="span2">
            <label>
                <?php echo html_escape($advertisement->advertisement_Description); 
                echo form_hidden('advertisement_Description', $advertisement->advertisement_Description);?>
            </label>
            </div>
        </div>
        <div class="row">
            <div class="span2">
            <?php echo form_label('Price ', 'advertisement_Price'); ?>
            </div>
            <div class="span2">
            <label >
                <?php echo html_escape($advertisement->advertisement_Price); 
                echo form_hidden('advertisement_Price', $advertisement->advertisement_Price);?>
            </label>
            </div>
            
        </div>
        <div class="row">
            <div class="span2">
            <?php echo form_label('Location', 'location_id'); ?>
            </div>
            <div class="span2">
            <label>
                <?php echo html_escape($advertisement->advertisement_location); 
                echo form_hidden('advertisement_location', $advertisement->advertisement_location);?>
            </label>
            </div>

        </div>
        <div class="row">
            <div class="span2">
            <?php echo form_label('Phone Number', 'advertisement_phonnumber'); ?>
            </div>
            <div class="span2">
            <label>
                <?php echo html_escape($advertisement->advertisement_phonnumber); 
                echo form_hidden('advertisement_phonnumber', $advertisement->advertisement_phonnumber);?>
            </label>
            </div>
        </div>
        
        <?php if(($advertisement->advertisement_image) != NULL) {?>
        <div class="row">
            <div class="span2">
            <?php echo form_label('Image', 'advertisement_image'); ?>
            </div>
            <div class="span2">
            <label>
                <?php echo html_escape($advertisement->advertisement_image); 
                echo form_hidden('advertisement_image', $advertisement->advertisement_image);?>
            </label>
            </div>
        </div>
        <?php } ?>
        
        <?php if($vehicle_ad->vehicle_model != NULL) {?>
        
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle condition', 'vehicle_condition'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_condition);
                        echo form_hidden('vehicle_condition', $vehicle_ad->vehicle_condition);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle_engine', 'vehicle_engine'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_engine);
                        echo form_hidden('vehicle_engine', $vehicle_ad->vehicle_engine);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle_manufacture_year', 'vehicle_manufacture_year'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_manufacture_year);
                        echo form_hidden('vehicle_manufacture_year', $vehicle_ad->vehicle_manufacture_year);
                        ?>
                    </label>
                </div>
            </div>
           
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle_milage', 'vehicle_milage'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_milage);
                        echo form_hidden('vehicle_milage', $vehicle_ad->vehicle_milage);
                        ?>
                    </label>
                </div>
            </div>
          
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle_model', 'vehicle_model'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_model);
                        echo form_hidden('vehicle_model', $vehicle_ad->vehicle_model);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle transmission', 'vehicle_transmission'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_transmission);
                        echo form_hidden('vehicle_transmission', $vehicle_ad->vehicle_transmission);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle brand', 'vehicle_brand'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_brand);
                        echo form_hidden('vehicle_brand', $vehicle_ad->vehicle_brand);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle_type', 'vehicle_type'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_type);
                        echo form_hidden('vehicle_type', $vehicle_ad->vehicle_type);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('vehicle subcategory', 'vehicle_subcategory'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($vehicle_ad->vehicle_subcategory);
                        echo form_hidden('vehicle_subcategory', $vehicle_ad->vehicle_subcategory);
                        ?>
                    </label>
                </div>
            </div>
            
        <?php } ?>
        
        <?php if($property_ad->property_address != NULL) {?>
        
        <div class="row">
                <div class="span2">
                    <?php echo form_label('property_address', 'property_address'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($property_ad->property_address);
                        echo form_hidden('property_address', $property_ad->property_address);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('property_subcategory', 'property_subcategory'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($property_ad->property_subcategory);
                        echo form_hidden('property_subcategory', $property_ad->property_subcategory);
                        ?>
                    </label>
                </div>
            </div>
            
        <?php } ?>
        
        
        <?php if($electronic_ad->electronic_brand != NULL) {?>
        
        <div class="row">
                <div class="span2">
                    <?php echo form_label('electronic_type', 'electronic_type'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($electronic_ad->electronic_type);
                        echo form_hidden('electronic_type', $electronic_ad->electronic_type);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('electronic_brand', 'electronic_brand'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($electronic_ad->electronic_brand);
                        echo form_hidden('electronic_brand', $electronic_ad->electronic_brand);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('electronic_model', 'electronic_model'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($electronic_ad->electronic_model);
                        echo form_hidden('electronic_model', $electronic_ad->electronic_model);
                        ?>
                    </label>
                </div>
            </div>
           
        <div class="row">
                <div class="span2">
                    <?php echo form_label('electronic_subcategory', 'electronic_subcategory'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape( $electronic_ad->electronic_subcategory);
                        echo form_hidden('electronic_subcategory',  $electronic_ad->electronic_subcategory);
                        ?>
                    </label>
                </div>
            </div>
          
            
        <?php } ?>

        <?php if($home_and_personal_ad->home_personal_type != NULL) {?>
        
        <div class="row">
                <div class="span2">
                    <?php echo form_label('home_personal_subcategory', 'home_personal_subcategory'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape($home_and_personal_ad->home_personal_subcategory);
                        echo form_hidden('home_personal_subcategory', $home_and_personal_ad->home_personal_subcategory);
                        ?>
                    </label>
                </div>
            </div>
            
        <div class="row">
                <div class="span2">
                    <?php echo form_label('home_personal_type', 'home_personal_type'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape( $home_and_personal_ad->home_personal_type);
                        echo form_hidden('home_personal_type',  $home_and_personal_ad->home_personal_type);
                        ?>
                    </label>
                </div>
            </div>
        
        <div class="row">
                <div class="span2">
                    <?php echo form_label('sale_or_want', 'sale_or_want'); ?>
                </div>
                <div class="span2">
                    <label>
                        <?php echo html_escape( $home_and_personal_ad->sale_or_want);
                        echo form_hidden('sale_or_want',  $home_and_personal_ad->sale_or_want);
                        ?>
                    </label>
                </div>
            </div>
            
        <?php } ?>
            <hr>
        <div>
            <?php echo form_submit('submit', 'Post Ad', 'class="btn btn-primary btn-large"'); ?>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>



