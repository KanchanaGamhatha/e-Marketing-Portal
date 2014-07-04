<div class="container">
    <div class="breadcrumb" style="">
        <div class="row">
            <div class="span8">
                <div class=" input-append">
                    <?php
                    echo form_open('search_controller/search');
                    //<input type="text" placeholder="Search" />
                    if (!isset($search_keyword)) {
                        $search_keyword = "";
                    }
                    $data = array(
                        'name' => 'search',
                        'id' => 'search',
                        'value' => $search_keyword,
                        'style' => 'width: 250px'
                    );
                    //<div style="width:300px;">required
                    echo form_input($data, 'placeholder="What do you want?"');
                    ?>
                    <select id="catogory_id" name="catogory_id" class="form-control" style="width: 175px">
                        <?php
                        echo '<option value="-1">' . 'All categories' . '</option>';
                        foreach ($categories as $row) {
                            echo '<option value="' . $row->catogory_id . '"';
                            if (isset($search_category)) {
                                if ($row->catogory_id == $search_category) {
                                    echo 'selected="selected"';
                                }
                            }
                            echo '>';
                            echo $row->catogory_name . '</option>';
                        }
                        ?>
                    </select>
                    <select id="location_id" name="location_id" class="form-control" style="width: 175px">
                        <?php
                        echo '<option value="0">' . 'All of Sri Lanka' . '</option>';
                        foreach ($locations as $row) {
                            echo '<option value="' . $row->location_id . '"';
                            if (isset($search_location)) {
                                if ($row->location_id == $search_location) {
                                    echo 'selected="selected"';
                                }
                            }
                            echo '>';
                            echo $row->location_name . '</option>';
                        }
                        ?>
                    </select>
                    <select id="ad_type" name="ad_type" class="form-control">

                        <option value="0" <?php if (isset($search_type)) {
                            if ($search_type == 0) {
                                echo 'selected="selected"';
                            }
                        } ?> >All Advertisements</option>
                        <option value="1" <?php if (isset($search_type)) {
                            if ($search_type == 1) {
                                echo 'selected="selected"';
                            }
                        } ?> >Private Advertisements</option>
                        <option value="2" <?php if (isset($search_type)) {
                            if ($search_type == 2) {
                                echo 'selected="selected"';
                            }
                        } ?> >Business Advertisements</option>
                    </select>
                    <?php echo form_submit('submit', 'Search', 'class="btn btn-inverse"'); ?>
                    
                   
                </div>
                <div class=" input-append">
                <select id="ad_filter" name="ad_filter" class="form-control" style="width: 200px">

                        <option value="0" <?php if (isset($ad_filter)) {
                            if ($ad_filter == 0) {
                                echo 'selected="selected"';
                            }
                        } ?> >Most Recent</option>
                        <option value="1" <?php if (isset($ad_filter)) {
                            if ($ad_filter == 1) {
                                echo 'selected="selected"';
                            }
                        } ?> >Least Price</option>
                        
                    </select>
                <?php echo form_submit('filter', 'Filter', 'class="btn btn-inverse"'); ?>
                </div>
            </div>
             <?php echo form_close();//<button class="btn btn-primary">Search</button> ?>
        </div>   
    </div>

</div>
<div> 
</div>
<!--<script src="<?php echo base_url(); ?>/js/search_function.js">
</script>-->