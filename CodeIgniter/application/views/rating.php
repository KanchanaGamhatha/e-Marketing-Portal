 
<div class="well" id= "modal-rate">
    <div class="modal-header">

        <h3>Rate the seller</h3>
    </div>

    <div class="modal-body">
        <div class="well">
            <h3>Rate Now</h3>
            <?php
            echo form_open('');
            echo form_hidden('logged_in_user_id', $logged_in_user_id->user_id, set_value('logged_in_user_id'));
            ?>
            <div class="basic" data-average="20" id="rate" name="rate"></div>
            <?php
            echo form_hidden('seller_id', $seller_id, set_value('seller_id'));
            echo '<br>';
            echo form_submit('submit', 'OK', 'class="btn btn-primary"');
            ?>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>jquery/jRating.jquery.js"></script>