<link href="<?php echo base_url(); ?>css/style_slider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flexisel.js"></script>
<div class="container">
<div class="">
    <h4>You Might Also Like</h4>
    
    <?php if (isset($related_ads)) : ?>
        <ul id="flexiselDemo3">
            <?php foreach ($related_ads as $row) : ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class=""><h4><?php echo $row->advertisement_title ?></h4></a>
                    <?php if ($row->advertisement_image) { ?>
                        <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="">
                            <img src="<?php echo base_url() . '/uploads/' . $row->advertisement_image; ?>" style="height:100px ;width:150px ">
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="">
                            <img src="<?php echo base_url() . '/img/emark.jpg'; ?>" style="height:100px ;width:150px ">
                        </a>
                    <?php } ?>
                </li>    
            <?php endforeach; ?>
        </ul> 
    <?php else : ?>
        <div class="alert alert-error">
            No More images
        </div>
    <?php endif; ?>
<!--    <table class="table table-bordered">
        <tr>
            <?php if (isset($related_ads)) : foreach ($related_ads as $row) : ?>
                    <td>
                        <div align="center">
                            <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class=""><h4><?php echo $row->advertisement_title ?></h4></a>
                            
                        </div>
                    </td>
                <?php endforeach; ?>
            <?php endif; ?> 

        </tr>
    </table>-->
</div>
</div>
<hr>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/slider.js"></script>