<div class="modal">
    <div class="modal-header">
        <button class="close">&times;</button>
        <h3>Error</h3>
    </div>

    <div class="modal-body">
        <p class="alert alert-error">Error in commenting</p>
    </div>

    <div class="modal-footer">
        <a href="<?php echo base_url(); ?>index.php/advertisement_Controller/view/<?php echo $commentAdID; ?>" data-dismiss="modal" class="btn btn-success">OK</a>
    </div>
</div> 
