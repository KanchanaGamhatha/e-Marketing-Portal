<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css" type="text/css" media="screen" charset="UTF-8"/>
<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row">
            <div class="stepwizard-step">
                <button type="button" class="btn btn-default btn-circle">1</button>
                <h5>Enter details</h5>
            </div>
            <div class="stepwizard-step">
                <button type="button" class="btn btn-primary btn-circle">2</button>
                <p>Check Again</p>
            </div>
            <div class="stepwizard-step">
                <button type="button" class="btn btn-default btn-circle">3</button>
                <p>Success</p>
            </div> 
        </div>
    </div>
    <center>
        <div class="row">
            <div class="span2">

            </div>
            <div class="span8">
                <div class="thumbnail">
                    <div class="panel panel-primary">

                        <div class="panel-heading">

                        </div>
                        <div class="panel-body"><!--Load the max advertisement id details  -->
                            <table class="table table-hover">
                                <?php if (isset($ad_one_max_details)) : foreach ($ad_one_max_details as $row) : ?>  
                                        <tr>
                                            <td>Title</td>
                                            <td>
                                                <h4><?php echo $row->advertisement_title; ?></h4>
                                            </td>
                                        </tr>        
                                        <tr>
                                            <td>Image</td>
                                            <td>
                                                <?php if ($row->advertisement_image) { ?>
                                                    <img src="<?php echo base_url() . 'uploads/' . $row->advertisement_image; ?>" height="300px" width="400px">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url() . 'img/emark.jpg'; ?>" height="300px" width="400px">                                    <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Category</td>
                                            <td><?php echo $this->Getdetails_model->get_category_name($row->catogory_id)->catogory_name; ?> </p></td>
                                        </tr>
                                        <?php if ($row->subcategory_id != 0) { ?>
                                            <tr>
                                                <td> Sub Category</td>
                                                <td><?php echo $this->Getdetails_model->get_sub_category_name($row->subcategory_id)->subcategory_name; ?> </p></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td> Location</td>
                                            <td><?php echo $this->Getdetails_model->get_location_name($row->advertisement_location)->location_name; ?> </p></td>
                                        </tr>
                                        <tr>
                                            <td> City</td>
                                            <td><?php echo $this->Getdetails_model->get_city_name($row->city_id)->city_name; ?> </p></td>
                                        </tr>
                                        <tr>
                                            <td> Price</td>
                                            <td><?php echo $row->advertisement_Price; ?> </p></td>
                                        </tr>
                                        <tr>
                                            <td> Description</td>
                                            <td><p><?php echo $row->advertisement_Description; ?></p></td></tr>


                                    <?php endforeach; ?>
                                </table>

                            <?php else : ?>
                                <h2> No records returned</h2>
                            <?php endif; ?> 
                            
                            <?php if (isset($image_names)) : ?>
                                <h4>More Images</h4>
                                <ul id="flexiselDemo3">
                                    <?php foreach ($image_names as $row) : ?>
                                        <li>
                                            <a href="">
                                                <img src="<?php echo base_url() . 'galleries/' . $row->image_name; ?>" height="100px" width="150px" />
                                            </a>
                                        </li>    
                                    <?php endforeach; ?>
                                </ul> 
                            <?php endif; ?>
                        </div>
                        <div class="panel-footer">
                            <hr>
                            <span class="pull-left">
                            <table>
                                <tr>
                                    <td>
                                        <span class="pull-left">
                                            <a href="<?php echo base_url(); ?>index.php/getdetails_cntroller/viewEditMyAd/<?php echo html_escape($row->advertisement_id); ?>" class="btn btn-warning" style="width: 70px" onclick="return confirm('Are you sure to Edit the ad?');">Edit</a>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="pull-left">
                                            <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view_success" class="btn btn-primary ">Post Ad</a>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="pull-left">
                                            <a class="btn btn-primary"  href="<?php echo base_url() . "index.php/upload_controller/"; ?>">Upload more Images</a>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            </span>
                            <hr>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span1">

            </div>
        </div>
    </center>
</div>
