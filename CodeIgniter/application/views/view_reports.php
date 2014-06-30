<div class="pagination pagination-large">
    <ul>
        <li class=""><a href="<?php echo base_url(); ?>index.php/admin_user_management_controller">Manage Registered Users</a></li>
        <li class=""><a href="<?php echo base_url(); ?>index.php/admin/admin_signup">Add new Administrator</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/view_reports">View Reports</a></li>
    </ul>
</div>
<div class="container">

            <div class="accordion" id="my-accordion">
            
                
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h4>&nbsp;&nbsp;&nbsp; Reported Ads</h4>
                    </div>
                    <div class="accordion-body collapse in" id="collapse-2">
                        <div class="accordion-inner">
                            <table class="">
                                <table class="table table-hover table-bordered">
                                    <thead >
                                        <tr class="alert alert-info" >
                                            <td> #</td>
                                            <td> ID</td>
                                            <td> Email</td>
                                            <td> Reason</td>
                                            <td>Message</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                <?php if (isset($reports)) : foreach ($reports as $row) : ?>
                                    <tr>
                                                <td><?php echo $row->report_id; ?></td>
                                                <td><?php echo anchor("advertisement_Controller/view/$row->advertisement_id",  $row->advertisement_id , 'class="" '); ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td><?php echo $row->reason; ?></td>
                                                <td><?php echo $row->message; ?></td>
                                                <td><?php echo anchor("admin/deleteAd/$row->advertisement_id", 'Delete', 'class="btn btn-danger btn-mini" onclick="return confirm(\'Really delete?\');"'); ?></td>


                                     </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php else : ?>
                                <center>
                                    <div class="alert alert-error">
                                        <h3> Sorry Nothing match your search</h3>
                                    </div>

                                </center>
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
