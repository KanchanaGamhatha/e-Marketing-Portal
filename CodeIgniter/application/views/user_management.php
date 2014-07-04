<div class="pagination pagination-large">
    <ul>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/admin_user_management_controller">Manage Registered Users</a></li>
<!--        <li class=""><a href="<?php echo base_url(); ?>index.php/admin/admin_signup">Add new Administrator</a></li>-->
        <li class=""><a href="<?php echo base_url(); ?>index.php/admin/view_reports">View Reported Ads</a></li>
    </ul>
</div>
<div class="container">
    <div class="modal-header">
        <legend>Registered Users</legend>
    </div>

    <div class="">
        <table class="table table-hover table-bordered">
            <thead >
                <tr class="alert alert-info" >
                    <td> #</td>
                    <td> Name</td>
                    <td> Phone</td>
                    <td> Email</td>
                    <td> </td>
                </tr>
            </thead>

            <?php if (isset($users)) : foreach ($users as $row) : ?>
                    <tr>
                        <td><?php echo $row->user_id; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo anchor("admin_user_management_controller/delete/$row->user_id", 'Delete', 'class="btn btn-danger btn-mini" onclick="return confirm(\'Really delete?\');"'); ?></td>

                    </tr>
            <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h2> No records returned</h2>
<?php endif; ?> 
    </div>
</div>
