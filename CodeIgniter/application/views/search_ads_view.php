
        <div class="span8">
            <?php  if ((isset($search_category)) && $search_category!= NULL) { ?>
            <ul class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>index.php">Home</a> <span class="divider">/</span></li>
			<li><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/">All Advertisements</a> <span class="divider">/</span></li>
			
                        <li class="active"><?php 
                        $this->load->model('Search_model');
                        //echo $search_category;
                        $search_category_name = $this->Search_model->getCategoryName($search_category);
                        if (isset($search_category_name->catogory_name)){ 
                            echo $search_category_name->catogory_name;
                           }
                        else {
                               echo 'All Categories';
                        }
                        //echo $this->Search_model->getCategoryName($search_category)->catogory_name; ?></li>
            </ul>
            <?php } ?>
            
            <table class="table table-hover">
                <?php if (isset($myAds)) : foreach ($myAds as $row) : ?>
                        <?php $searchAds[] = $row; ?>
                        <tr>
                            <td>
                                <ul class="thumbnails img-rounded">
                                    <?php if ($row->advertisement_image) { ?>
                                            <li class="span2"><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="thumbnail"><?php echo img('uploads/' . $row->advertisement_image); ?></a></li>
                                    <?php } else { ?>
                                            <li class="span2"><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="thumbnail"><?php echo img('img/emark.jpg' ); ?></a></li>
                                    <?php } ?>
                                </ul>
                                <br>
                            </td>

                            <td><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class=""><h4><?php echo $row->advertisement_title ?></h4></a>
                                Posted on <?php echo $row->post_date_time; ?>
                                <h5><?php
                                    $this->load->model('Search_model');
                                    echo $this->Search_model->getLocation($row->advertisement_location)->location_name;
                                    //echo $this->search_controller->get_ad_location($row->advertisement_location);
                                    //echo $row->advertisement_location; 
                                    ?></h5>

                                <h5> <b class="icon-bell"></b>Phone : <?php echo $row->advertisement_phonnumber ?></h5>
                            </td>
                            <td><br>
                                <h4><?php 
                                if($row->advertisement_Price != 0)
                                {
                                    echo 'Rs. '.$row->advertisement_Price;
                                }
                                else
                                {
                                    echo 'Negotiable Price';
                                }?>
                                </h4><br>
                                <a href="<?php echo base_url(); ?>index.php/favorite_controller/add_to_favorite_list/<?php echo $row->advertisement_id; ?>" class="btn btn-small"><b class="icon-star"></b> Favorite</a>
                            </td>


                        </tr>


                <?php endforeach; ?>
                </table>
            <?php else : ?>
            <table class="table">
                <tr>
                    <td>
                            <center>
                                <div class="alert alert-error">
                                    <h3> Sorry No Ad found.</h3>
                                </div>

                            </center>
                    </td>
                </tr>
            </table>
            <?php endif; ?> 

        </div>

