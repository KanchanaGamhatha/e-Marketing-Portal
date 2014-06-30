<div class="row">
<div class="span3">
            <?php echo form_label('Property Address ', 'property_address'); ?>
            <?php echo form_input('property_address', set_value('property_address'),'required'); ?>
        </div>
    
    <div class="span3">
        <?php //$property_subcategory =Array('Houses','Commercial Property','Apartments','Land');       ?>
         <?php echo form_label('Property Subcategory', 'property_subcategory'); ?>
            <?php echo form_dropdown('property_subcategory', $property_ad_sub_category_form_options, set_value('property_subcategory')); ?>
    </div>
</div>

