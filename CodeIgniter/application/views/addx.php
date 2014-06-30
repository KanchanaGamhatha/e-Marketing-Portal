
<div class="container" >
    <div class="well well-small">
        <div class="row">
            <?php if ($advertisement->advertisement_image) { ?>
                <div class="span4" >
                    <h3><?php echo html_escape($advertisement->advertisement_title); ?></h3>
                    <ul class="thumbnails">
                        <li class="span2"><a href="http://localhost/CodeIgniter/index.php/advertisement_Controller/view/<?php echo html_escape($advertisement->advertisement_id); ?>" class="thumbnail" data-toggle="modal"><?php echo img('uploads/' . $advertisement->advertisement_image) ?></a></li>
                    </ul>
                </div>
            <?php } ?>

            <div class="span5"  >
                <br>
                <br>
                <br>
                <div class="">
                    <?php $adID = html_escape($advertisement->advertisement_id); ?><br>
                    <?php echo html_escape($advertisement->advertisement_Description); ?>
                    <h5><?php echo html_escape($location->location_name); ?></h5><br>


                    <?php //echo html_escape($advertisement->advertisement_phonnumber); ?><br>
                </div>
            </div>
            <div class="span2">
                <br>
                <br>
                <br>
                <h4>Rs.<?php echo html_escape($advertisement->advertisement_Price); ?></h4><br>
                <a href="http://localhost/CodeIgniter/index.php/favorite_controller/add_to_favorite/<?php echo $adID; ?>" class="btn btn-small"><b class="icon-star"></b> Favorite</a>
            </div>
        </div>
    </div>
</div>



