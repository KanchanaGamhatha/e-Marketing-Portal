<div class="pagination pagination-large">
    <ul>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/my_ads_controller/">My Ads</a></li>
        <li class=""><a href="<?php echo base_url(); ?>index.php/favorite_controller/viewMyFavorite">Favorites</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/account_settings_controller">Account Settings</a></li>
    </ul>
</div>
<div class="container">

    <div class="row">
        <div class="span12">
            <table class="table table-hover">
                <?php if (isset($myAds)) : foreach ($myAds as $row) : ?>
                        <tr>
                            <td>
                                <?php if ($row->advertisement_image) { ?>
                                    <ul class="thumbnails img-rounded">
                                        <li class="span2"><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="thumbnail"><?php echo img('uploads/' . $row->advertisement_image); ?></a></li>
                                    </ul>
                                <?php } ?>
                            </td>
                            <td>
                                <h4>
                                    <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class=""><?php echo $row->advertisement_title ?></a>
                                </h4>
                                <?php //echo $row->advertisement_Description ?>
                                <b>Rs. <?php echo $row->advertisement_Price ?></b>
                            <td><br>
                                <?php //echo $row->advertisement_phonnumber ?></td>
                            <td><br>
                                <a href="<?php echo base_url(); ?>index.php/my_ads_controller/deleteMyAd/<?php echo html_escape($row->advertisement_id); ?>" class="btn btn-inverse btn-small" style="width: 70px" onclick="return confirm('Are you sure to delete the ad?');">Delete</a>
                             <br>
                             <br>
                             <a href="<?php echo base_url(); ?>index.php/my_ads_controller/viewEditMyAd/<?php echo html_escape($row->advertisement_id); ?>" class="btn btn-inverse btn-small" style="width: 70px" onclick="return confirm('Are you sure to Edit the ad?');">Edit</a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <center>
                    <div class="alert alert-info">
                        <?php echo '<h3> Welcome ' . $logged_in_user_name->name . '</h3>'; ?>
                        <h3> You Haven't Posted any Ads Yet</h3>
                    </div>


                    <div class="alert alert-success">
                        <h4>Now Post your Ad For FREE</h4>
                        <br>
                        <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/add" class="btn btn-primary btn-large">Post Your Free Ad</a>
                        <br>
                        <br>

                    </div>
                </center>
            <?php endif; ?> 

        </div>
    </div>
</div>

