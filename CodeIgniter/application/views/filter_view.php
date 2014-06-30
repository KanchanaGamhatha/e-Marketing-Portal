<?php 
$vehicle_accordian = '';
$ad_accordian ='';

if (isset($vehicle_ad) && ($vehicle_ad == TRUE)) 
    {
        $vehicle_accordian = ' in';
    }
 else 
 {
        $ad_accordian =' in';
 }
?>
<div class="span2">
    <div class="accordion" id="my-accordion2"><div class="accordion" id="my-accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a href="#collapse-filter" data-toggle="collapse" data-parent="#my-accordion2" class="accordion-toggle"><b class="btn btn-inverse">Filter Price</b></a>
                </div>
                <div class="accordion-body collapse<?php echo $ad_accordian; ?>" id="collapse-filter">
                    <div class="accordion-inner">
                        <table class="">
                            <tr>
                                <td>
                                    <?php echo form_open('search_controller/filter_by_price'); ?>
                                    <?php echo form_label('<b>Price</b> ', 'from_filter_advertisement_Price'); ?>
                                    
                                        <span class="add-on">Rs:</span>
                                        <div class="">
                                        <?php //echo form_input('from_filter_advertisement_Price', set_value('filter_advertisement_Price'), 'required style="width:50px"'); ?>
                                        <input type="number" name="from_filter_advertisement_Price" id="from_filter_advertisement_Price" style="width:80px " required />   
                                        <br><b class="icon-arrow-down"></b><br>
                                        <?php //echo form_input('to_filter_advertisement_Price', set_value('filter_advertisement_Price'), 'required style="width:50px"'); ?>
                                        <input type="number" name="to_filter_advertisement_Price" id="to_filter_advertisement_Price" style="width:80px " required />
                                        </div>
                                        <?php echo form_submit('submit', 'Go', 'class="btn btn-inverse"'); ?>
                                        <?php echo form_close(); ?>
                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <?php if (isset($vehicle_ad) && ($vehicle_ad == TRUE)) :?>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a href="#collapse-filter-vehicle" data-toggle="collapse" data-parent="#my-accordion2" class="accordion-toggle"><b class="btn btn-inverse">Filter vehicles</b></a>
                </div>
                <div class="accordion-body collapse <?php echo $vehicle_accordian; ?>" id="collapse-filter-vehicle">
                    <div class="accordion-inner">
                        <table class="">
                            <tr>
                                <td>
                                    <?php echo form_open('search_controller/filter_vehicles'); ?>
                                    <?php echo form_label('<b>Year</b> ', 'from_vehicle_year'); ?>
                                   
                                        <div class="input-prepend input-append">
                                        <?php //echo form_input('from_vehicle_year', set_value('from_vehicle_year'), 'required style="width:50px"'); ?>
                                            <input type="number" name="from_vehicle_year" id="from_vehicle_year" style="width:50px " required />   
                                            <b class="icon-arrow-right"></b>
                                        <?php //echo form_input('to_vehicle_year', set_value('to_vehicle_year'), 'required style="width:50px"'); ?>
                                            <input type="number" name="to_vehicle_year" id="to_vehicle_year" style="width:50px " required />
                                        </div>
                                        <?php echo form_submit('submit', 'Go', 'class="btn btn-inverse"'); ?>
                                    <?php echo form_close(); ?>
                                    <?php echo form_open('search_controller/filter_vehicles'); ?>
                                    <?php echo form_label('<b>Milage</b> ', 'from_vehicle_milage'); ?>
                                   
                                        <div class="input-prepend input-append">
                                        <?php echo form_input('from_vehicle_milage', set_value('from_vehicle_milage'), 'required style="width:50px"'); ?>
                                            <b class="icon-arrow-right"></b>
                                        <?php echo form_input('to_vehicle_milage', set_value('to_vehicle_milage'), 'required style="width:50px"'); ?>
                                        </div>
                                        <?php echo form_submit('submit', 'Go', 'class="btn btn-inverse"'); ?>
                                        <?php echo form_close(); ?>
                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
             <?php endif;?>
        </div>
    </div>  
</div>
</div>
</div>
</div>
