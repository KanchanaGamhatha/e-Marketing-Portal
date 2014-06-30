<div class="well">
    <h4>You Might Also Like</h4>
    <table class="table table-bordered">
        <tr>
            <?php if (isset($related_ads)) : foreach ($related_ads as $row) : ?>
                    <td>
                        <div align="center">
                            <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class=""><h4><?php echo $row->advertisement_title ?></h4></a>
                            <?php if ($row->advertisement_image) { ?>
                                <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo html_escape($row->advertisement_id); ?>" class="">
                                    <img src="<?php echo base_url() . '/uploads/' . $row->advertisement_image; ?>" height="100px" width="150px">
                                </a>
                                
                            <?php } ?>
                        </div>
                    </td>
                <?php endforeach; ?>
            <?php endif; ?> 

        </tr>
    </table>
</div>
<hr>