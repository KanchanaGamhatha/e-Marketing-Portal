
<div class="row">
<div class="span3">
            <?php echo form_label('Electronic Type ', 'electronic_type'); ?>
            <?php echo form_input('electronic_type', set_value('electronic_type'),'required'); ?>
        </div>

<div class="span3">
            <?php echo form_label('Brand ', 'electronic_brand'); ?>
            <?php echo form_input('electronic_brand', set_value('electronic_brand'),'required'); ?>
        </div>
    <div class="span3">
            <?php echo form_label('Model ', 'electronic_model'); ?>   
            <?php echo form_input('electronic_model', set_value('electronic_model'),'required'); ?>
          
        </div>
    <div class="span3">
        <?php //$electronic_subcategory =Array('Computer','Phone','TV','Radio');       ?>
         <?php echo form_label('Electronic Subcategory', 'electronic_subcategory'); ?>
         <select id="electronic_subcategory" name="electronic_subcategory" class="form-control">
            <?php foreach ($electronic_ad_sub_category_form_options as $row) {
                echo '<option value="' . $row->subcategory_id . '"';
                echo '>';
                echo $row->subcategory_name . '</option>';
            }
            ?>
        </select>
        <?php //echo form_dropdown('electronic_subcategory', $electronic_ad_sub_category_form_options, set_value('electronic_subcategory')); ?>
    </div>
</div>


