<?php if (isset($myFavoriteAdDetails)) : foreach ($myFavoriteAdDetails as $row) : ?>
        <div class="container">

            <div class="well well-small">
                <div class="row">
                    <div class="span4">
                        <ul class="thumbnails img-rounded">
                                    <?php if ($row->advertisement_image) { ?>
                                        <li class="span2"><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="thumbnail"><?php echo img('uploads/' . $row->advertisement_image); ?></a></li>
                                    <?php } else { ?>
                                        <li class="span2"><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="thumbnail"><?php echo img('img/emark.jpg'); ?></a></li>
                                    <?php } ?>
                        </ul>
                    </div>
                    <div class="span5">
                        <h4><?php echo $row->advertisement_title ?></h4>
                            <?php echo $row->advertisement_Description ?><br>
                            <h5>Rs<?php echo $row->advertisement_Price ?></h5>
                            <b class="icon-hand-right"></b><?php echo $row->advertisement_phonnumber ?>
                    </div>
                    <div class="span2">
                        <br>
                        <?php
                        //echo anchor("", 'Delete', 'class="btn btn-danger btn-mini"');
                        ?>
                        <a href="<?php echo base_url(); ?>index.php/favorite_controller/deleteFavoriteAd/<?php echo html_escape($row->advertisement_id); ?>" class="btn btn-inverse btn-small" onclick="return confirm('Are you sure to remove?');"> Remove from Favorites</a>
                    </div>


                </div>


            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="hero-unit">
        <center>
            <h3> You Haven't got any Favorite Ads</h3>
            <a href="<?php echo base_url(); ?>index.php/advertisement_Controller" class="btn btn-primary btn-large">Browse all Ads Now</a>
        </center>
    </div>
<?php endif; ?> 