<div class="container">

    <div class="breadcrumb">
        <h3>Publish an advertisement</h3>
        <?php echo validation_errors(); ?>

        <?php echo form_open('my_ads_controller/editMyAd'); ?>
        <div>
            <?php echo form_hidden('ad_id', $ad_id, set_value('ad_id')); ?>
            <?php echo form_hidden('ad_user_id', $ad_user_id, set_value('ad_user_id')); ?>
            <?php echo form_hidden('ad_post_date', $ad_post_date, set_value('ad_post_date')); ?>
            
            <?php echo form_label('Title', 'advertisement_title'); ?>
            <?php echo form_input('advertisement_title', $one_ad_details->advertisement_title, set_value('advertisement_title')); ?>
        </div>
        <div>
            <?php echo form_label('Category', 'catogory_id'); ?>
            <?php //echo form_dropdown('catogory_id',$one_ad_details->catogory_id ,set_value('catogory_id')); ?>
            <?php echo form_hidden('catogory_id', $one_ad_details->catogory_id, set_value('catogory_id')); ?>
            
            <select id="catogory_name" name="catogory_name" class="form-control" disabled>
                        <?php
                        foreach ($categories as $row) {
                            echo '<option value="' . $row->catogory_id . '"';
                            if (isset($one_ad_details->catogory_id)) {
                                if ($row->catogory_id == $one_ad_details->catogory_id) {
                                    echo 'selected="selected"';
                                }
                            }
                            echo '>';
                            echo $row->catogory_name . '</option>';
                        }
                        ?>
            </select>

        </div>
        <?php if(isset($vehicle_ad_data->vehicle_type)) {?>
        <div class="row">
            <div class="span3">
                <?php echo form_label('Vehicle Type ', 'vehicle_type'); ?>
                <?php echo form_input('vehicle_type',$vehicle_ad_data->vehicle_type, set_value('vehicle_type'), 'required'); ?>
            </div>

            <div class="span3">
                <?php echo form_label('Brand ', 'vehicle_brand'); ?>
                <?php echo form_input('vehicle_brand',$vehicle_ad_data->vehicle_brand ,set_value('vehicle_brand'), 'required'); ?>
            </div>
            <div class="span3">
                <?php echo form_label('Model ', 'vehicle_model'); ?>   
                <?php echo form_input('vehicle_model',$vehicle_ad_data->vehicle_model , set_value('vehicle_model'), 'required'); ?>

            </div>
        </div>

        <div class="row">
            <div class="span3">
                <?php echo form_label('Manufacture Year ', 'vehicle_manufacture_year'); ?>
                <?php echo form_input('vehicle_manufacture_year',$vehicle_ad_data->vehicle_manufacture_year , set_value('vehicle_manufacture_year'), 'required'); ?>
            </div>
            <div class="span3">
                <?php echo form_label('Milage ', 'vehicle_milage'); ?>
                <div class="input-append">
                <?php echo form_input('vehicle_milage',$vehicle_ad_data->vehicle_milage , set_value('vehicle_milage'), 'required'); ?>
                    <span class="add-on">km</span>
                </div>

            </div>

            <div class="span3">
                <div class="input-append">
                    <?php echo form_label('Engine ', 'vehicle_engine'); ?>
                    <?php echo form_input('vehicle_engine',$vehicle_ad_data->vehicle_engine , set_value('vehicle_engine'), 'required'); ?>
                    <span class="add-on">cc</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <?php echo form_label('Transmission ', 'vehicle_transmission'); ?>
                <?php echo form_input('vehicle_transmission',$vehicle_ad_data->vehicle_transmission , set_value('vehicle_transmission'), 'required'); ?>
            </div>
            <div class="span3">
                <?php echo form_label('Vehicle Subcategory', 'vehicle_subcategory'); ?>
                <?php echo form_dropdown('vehicle_subcategory', $vehicle_ad_sub_category_form_options, set_value('vehicle_subcategory')); ?>
            </div>
            <div class="span3">
                <?php echo form_label('Condition ', 'vehicle_condition'); ?>
                <?php echo form_input('vehicle_condition', $vehicle_ad_data->vehicle_condition ,set_value('vehicle_condition'), 'required'); ?>
            </div>
        </div>
        <?php }?>
        
        <?php if(isset($electronic_ad_data->electronic_type)) {?>
        <div class="row">
            <div class="span3">
                        <?php echo form_label('Electronic Type ', 'electronic_type'); ?>
                        <?php echo form_input('electronic_type',$electronic_ad_data->electronic_type, set_value('electronic_type'),'required'); ?>
                    </div>

            <div class="span3">
                        <?php echo form_label('Brand ', 'electronic_brand'); ?>
                        <?php echo form_input('electronic_brand',$electronic_ad_data->electronic_brand, set_value('electronic_brand'),'required'); ?>
                    </div>
                <div class="span3">
                        <?php echo form_label('Model ', 'electronic_model'); ?>   
                        <?php echo form_input('electronic_model',$electronic_ad_data->electronic_model, set_value('model'),'required'); ?>

                    </div>
                <div class="span3">
                     <?php echo form_label('Electronic Subcategory', 'electronic_subcategory'); ?>
                        <?php echo form_dropdown('electronic_subcategory', $electronic_ad_sub_category_form_options, set_value('electronic_subcategory')); ?>
                </div>
            </div>
        
        <?php }?>
        
        <?php if(isset($property_ad_data->property_address)) {?>
        <div class="row">
            <div class="span3">
                        <?php echo form_label('Property Address ', 'property_address'); ?>
                        <?php echo form_input('property_address',$property_ad_data->property_address, set_value('property_address'),'required'); ?>
                    </div>

                <div class="span3">
                     <?php echo form_label('Property Subcategory', 'property_subcategory'); ?>
                     <?php echo form_dropdown('property_subcategory', $property_ad_sub_category_form_options, set_value('property_subcategory')); ?>
                </div>
        </div>
        <?php }?>
        
        <?php if(isset($home_and_personal_ad_data->home_personal_type)) {?>
        <div class="row">
            <div class="span3">
                        <?php echo form_label('Home and personal Type ', 'home_personal_type'); ?>
                        <?php echo form_input('home_personal_type',$home_and_personal_ad_data->home_personal_type, set_value('home_personal_type'),'required'); ?>
           </div>


                <div class="span3">
                        <?php $sale_or_want =Array('Sale','Want');       ?>
                     <?php echo form_label('sale / want', 'sale_or_want'); ?>
                        <?php echo form_dropdown('sale_or_want', $sale_or_want, set_value('sale_or_want'),'required'); ?>

                    </div>
                <div class="span3">
                     <?php echo form_label('Home Personal Subcategory', 'home_personal_subcategory'); ?>
                     <?php echo form_dropdown('home_personal_subcategory', $home_personal_ad_sub_category_form_options, set_value('home_personal_subcategory')); ?>
               </div>
        </div>
        <?php }?>
        
        <div>
            <?php echo form_label('Description', 'advertisement_Description'); ?>
            <?php echo form_textarea('advertisement_Description', $one_ad_details->advertisement_Description, 'required <div style="width:450px"'); ?>
        </div>
        <div>
            <?php echo form_label('Price ', 'advertisement_Price'); ?>
            <?php echo form_input('advertisement_Price', $one_ad_details->advertisement_Price, set_value('advertisement_Price')); ?>
        </div>
        <div>
            <?php echo form_label('Location', 'location_id'); ?>
            <?php //echo form_dropdown('location_id', $one_ad_details->advertisement_location, set_value('location_id'));  ?>
            <select id="location_id" name="location_id" class="form-control">
                        <?php
                        foreach ($locations as $row) {
                            echo '<option value="' . $row->location_id . '"';
                            if (isset($one_ad_details->advertisement_location)) {
                                if ($row->location_id == $one_ad_details->advertisement_location) {
                                    echo 'selected="selected"';
                                }
                            }
                            echo '>';
                            echo $row->location_name . '</option>';
                        }
                        ?>
                    </select>
        </div>
        <div>
                <?php echo form_label('Phone Number', 'advertisement_phonnumber'); ?>
<?php echo form_input('advertisement_phonnumber', $one_ad_details->advertisement_phonnumber, set_value('advertisement_phonnumber')); ?>
        </div>




        <div>
<?php echo form_submit('Upadte', 'Update', 'class="btn btn-primary"'); ?>
        </div>
<?php echo form_close(); ?>
    </div>
</div>
