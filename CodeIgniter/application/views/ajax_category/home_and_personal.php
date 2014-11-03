<div class="row">
<div class="span3">
            <?php echo form_label('Home and personal Type ', 'home_personal_type'); ?>
            <?php echo form_input('home_personal_type', set_value('home_personal_type'),'required'); ?>
        </div>


    <div class="span3">
            <?php $sale_or_want =Array('Sale','Want');       ?>
         <?php echo form_label('sale / want', 'sale_or_want'); ?>
            <?php echo form_dropdown('sale_or_want', $sale_or_want, set_value('sale_or_want'),'required'); ?>
          
        </div>
    <div class="span3">
        <?php //$home_personal_subcategory =Array('Home & Garden','Furniture','Clothes, Footwear & Accessories','Kitchenware');       ?>
         <?php echo form_label('Home Personal Subcategory', 'home_personal_subcategory'); ?>
         <select id="home_personal_subcategory" name="home_personal_subcategory" class="form-control">
            <?php foreach ($home_personal_ad_sub_category_form_options as $row) {
                echo '<option value="' . $row->subcategory_id . '"';
                echo '>';
                echo $row->subcategory_name . '</option>';
            }
            ?>
        </select>
         <?php //echo form_dropdown('home_personal_subcategory', $home_personal_ad_sub_category_form_options, set_value('home_personal_subcategory')); ?>
    </div>
</div>