<hr>
<hr>
<div class="container">

    <div class="modal">
        <div class="breadcrumb">
            <div class="modal-header">

                <h3>Email</h3>
            </div>
            <div class="modal-body">
                <?php if (isset($error) && $error == 0) { ?>
                    <p class ="alert alert-success">Email sent successfully</p>
                    <?php } else if(isset($error) && $error == 1) {?>
                    <p class ="alert alert-danger">Problem in sending the email. Please retry.</p>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo $ad_id; ?>" data-dismiss="modal" class="btn btn-success">Go Back</a>
            </div>
            <!--<a href="<?php echo base_url(); ?>/index.php">Back to send email</a>-->
            <?php //echo anchor('email_controller/send_Email','Back to send email'); ?>
        </div>
    </div>
</div>