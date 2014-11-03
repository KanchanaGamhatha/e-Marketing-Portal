<link href="<?php echo base_url(); ?>css/style_slider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flexisel.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
    $("#basic-tooltip").tooltip();
</script>
<div id ="search_result">

    <div class="container">
        <div class="carousel slide" id="my-carousel">
            <ol class="carousel-indicators">
                <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#my-carousel" data-slide-to="1"></li>
                <li data-target="#my-carousel" data-slide-to="2"></li>
                <li data-target="#my-carousel" data-slide-to="3"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo base_url(); ?>/img/comc.jpg" alt="Demo" />
                    <div class="carousel-caption">
                        <h4>Brand New Computers</h4>
                        <p>Buy according to your need</p>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo base_url(); ?>/img/coma.jpg" alt="Demo" />
                    <div class="carousel-caption">
                        <h4>Samsung Galaxy S5</h4>
                        <p>Special Offers for first purchases</p>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo base_url(); ?>/img/comb.jpg" alt="Demo" />
                    <div class="carousel-caption">
                        <h4>Cameras</h4>
                        <p>Buy according to your need</p>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo base_url(); ?>/img/com.jpg" alt="Demo" />
                    <div class="carousel-caption">
                        <h4>Tablet Computers</h4>
                        <p>Buy according to your need</p>
                    </div>
                </div>
            </div>

            <a href="#my-carousel" class="carousel-control left" data-slide="prev">&lsaquo;</a>
            <a href="#my-carousel" class="carousel-control right" data-slide="next">&rsaquo;</a>
        </div>
    </div>
    <div class="container">
        <div class="well">
            <h3><?php
                if (isset($welcome)) {
                    echo $welcome;
                }
                ?></h3>
            <div class="">
                <h4><?php
                if (isset($welcome_text)) {
                    echo $welcome_text;
                }
                ?></h4>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                            <?php if (isset($populer_ad_details)) : ?>
                            <ul id="flexiselDemo3">
                            <?php foreach ($populer_ad_details as $row) : ?>
                                    <li>
                                        <h5>
                                        <?php echo $row->advertisement_title; ?>
                                        </h5>
                                        <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo $row->advertisement_id; ?>">
                                            <img src="<?php echo base_url() . 'uploads/' . $row->advertisement_image; ?>" height="100px" width="150px" />
                                        </a>
                                    </li>    
                            <?php endforeach; ?>
                            </ul> 
                        <?php else : ?>
                            <div class="alert alert-error">
                                No popular ads
                            </div>
                        <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div align="center">
    <hr>

    <div class="row">
                    <?php if (isset($locations)) : foreach ($locations as $row) : ?>
                <div class="span3">
                    <a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?location=<?php echo html_escape($row->location_id); ?>" class="" data-toggle="tooltip" data-placement="right" data-animation="false" id="basic-tooltip">
                        <h5><?php
                echo html_escape($row->location_name) . "  (" .
                $this->Search_model->countLocations($row->location_id) . " Ads )";
                ?></h5>
                    </a>
                </div>
    <?php endforeach; ?>
<?php endif; ?>
    </div>

</div>
<hr>
<div class="row">
    <div class="span1"></div>
    <div class="span8">
        <section>
            <div class="container">


<?php if (isset($categories)) : foreach ($categories as $row) : ?>

                        <div class="span3">
                            <hr>
                            <h5><a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($row->catogory_id); ?>" class="thumbnail"><?php echo html_escape($row->catogory_name); ?>
                                    <div class="badge badge-info"><?php echo $this->Search_model->countCategories($row->catogory_id); ?> Ads</div>
                                </a></h5>
                            <hr>
                            <a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($row->catogory_id); ?>" >
                                    <?php
                                    if ($row->catogory_id == 0) {
                                        ?>
                                    <div class="alert alert-info"><?php
                                    if (isset($vehicle)) {
                                        echo $vehicle;
                                    }
                                    ?></div>    

                                    <?php
                                }
                                if ($row->catogory_id == 1) {
                                    ?>
                                    <div class="alert alert-info"><?php
                                        if (isset($vehicle)) {
                                            echo $vehicle;
                                        }
                                        ?></div>    
                                    <?php
                                }
                                if ($row->catogory_id == 2) {
                                    ?>
                                    <div class="alert alert-info"><?php
                                        if (isset($vehicle)) {
                                            echo $vehicle;
                                        }
                                        ?></div>

                                        <?php
                                    }
                                    if ($row->catogory_id == 3) {
                                        ?>
                                    <div class="alert alert-info"><?php
                                    if (isset($vehicle)) {
                                        echo $vehicle;
                                    }
                                    ?></div>
                            <?php
                        }
                        if ($row->catogory_id == 4) {
                            ?>
                                    <div class="alert alert-info"><?php
                            if (isset($vehicle)) {
                                echo $vehicle;
                            }
                            ?></div>
            <?php
        }
        ?>
                            </a>
                            <br>
                        </div>

    <?php endforeach; ?>
<?php endif; ?> 
            </div>
        </section>
    </div>
    <div class="span2"></div>
</div>


<table class="table table-striped">
    <tr>
        <td>
            <div align="center">
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/E-marketing-Portal/565211040266910" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="true"></div>
            </div>
        </td>
        <td>
            <h4><?php
                if (isset($sell_fast)) {
                    echo $sell_fast;
                }
                ?></h4>
            <a><?php
                if (isset($sell_fast)) {
                    echo $sell_fast;
                }
                ?></a><br>

        </td>
        <td>
            <h4><?php
                if (isset($about_us)) {
                    echo $about_us;
                }
                ?></h4>
            <a><?php
                if (isset($about_us)) {
                    echo $about_us;
                }
                ?></a><br>
            <a><?php
                if (isset($terms)) {
                    echo $terms;
                }
                ?></a><br>
            <a><?php
                if (isset($privacy_policy)) {
                    echo $privacy_policy;
                }
                ?></a><br>
        </td>
        <td>
            <h4><?php
                if (isset($help_support)) {
                    echo $help_support;
                }
                ?></h4>
            <a><?php
                if (isset($faq)) {
                    echo $faq;
                }
                ?></a><br>
            <a><?php
                if (isset($contact_us)) {
                    echo $contact_us;
                }
                ?></a><br>
        </td>

    </tr>
</table>

</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/slider.js"></script>