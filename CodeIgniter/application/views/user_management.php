<div id="page-wrapper">    
<div class="col-lg-12">
        <div class="row">
            <h3 class="page-header">Manage Registered Users</h3>
        </div>

            <div class="form-group input-group">
                <input type="text" id="search_users" name="search_users" class="form-control" >
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            <div id="user_search_result">
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
                                <td>
                                    <a href="<?php echo base_url() . "index.php/admin_user_management_controller/get_user_details/" . $row->user_id; ?>" class="btn btn-outline btn-primary btn-xs">More</a>                                    
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else : ?>
                    <h2> No records returned</h2>
                <?php endif; ?> 
            </div>

    </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/user_search.js"></script>
