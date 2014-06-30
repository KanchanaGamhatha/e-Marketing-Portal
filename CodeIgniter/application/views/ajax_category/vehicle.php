
<div class="row">
    <div class="span3">
        <?php echo form_label('Vehicle Type ', 'vehicle_type'); ?>
        <?php echo form_input('vehicle_type', set_value('vehicle_type'), 'required'); ?>
    </div>

    <div class="span3">
        <?php echo form_label('Brand ', 'vehicle_brand'); ?>
        <?php echo form_input('vehicle_brand', set_value('vehicle_brand'), 'required'); ?>
    </div>
    <div class="span3">
        <?php echo form_label('Model ', 'vehicle_model'); ?>   
        <?php echo form_input('vehicle_model', set_value('vehicle_model'), 'required'); ?>

    </div>
</div>

<div class="row">
    <div class="span3">
        <?php echo form_label('Manufacture Year ', 'vehicle_manufacture_year'); ?>
        <?php echo form_input('vehicle_manufacture_year', set_value('vehicle_manufacture_year'), 'required'); ?>
    </div>
    <div class="span3">
        <?php echo form_label('Milage ', 'vehicle_milage'); ?>
        <div class="input-append">
            <?php echo form_input('vehicle_milage', set_value('vehicle_milage'), 'required'); ?>
            <span class="add-on">km</span>
        </div>

    </div>

    <div class="span3">
        <div class="input-append">
            <?php echo form_label('Engine ', 'vehicle_engine'); ?>
            <?php echo form_input('vehicle_engine', set_value('vehicle_engine'), 'required'); ?>
            <span class="add-on">cc</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="span3">
        <?php echo form_label('Transmission ', 'vehicle_transmission'); ?>
        <?php echo form_input('vehicle_transmission', set_value('vehicle_transmission'), 'required'); ?>
    </div>
    <div class="span3">
        <?php //$vehicle_subcategory =Array('Car','Van','Bus','Lorry');       ?>
        <?php echo form_label('Vehicle Subcategory', 'vehicle_subcategory'); ?>
        <?php echo form_dropdown('vehicle_subcategory', $vehicle_ad_sub_category_form_options, set_value('vehicle_subcategory')); ?>
    </div>
    <div class="span3">
        <?php echo form_label('Condition ', 'vehicle_condition'); ?>
        <?php echo form_input('vehicle_condition', set_value('vehicle_condition'), 'required'); ?>
    </div>
</div>
