<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Administrator Area</title>


        <link rel="stylesheet" href="/CodeIgniter/admin_css/bootstrap.min.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="/CodeIgniter/font-awesome/css/font-awesome.css" type="text/css" media="screen" charset="UTF-8"/>

        <link rel="stylesheet" href="/CodeIgniter/admin_css/plugins/morris/morris-0.4.3.min.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="/CodeIgniter/admin_css/plugins/timeline/timeline.css" type="text/css" media="screen" charset="UTF-8"/>

        <link rel="stylesheet" href="/CodeIgniter/admin_css/sb-admin.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="/CodeIgniter/css/style.css" type="text/css" media="screen" charset="UTF-8"/>

        <link rel="stylesheet" href="<?php echo base_url(); ?>jquery/jRating.jquery.css"/>

        <script type="text/javascript" src="<?php echo base_url(); ?>jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>jquery/jRating.jquery.js"></script>

    </head>
    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php">e Marketing Portal</a>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/admin">Administrator Area</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <ul class="nav navbar-top-links navbar-right">
                        <?php if (isset($admin_id) && $admin_id != NULL) { ?>

                            <li><a><?php echo ' Welcome ' . $admin_id; ?></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>

                        <?php } else {
                            ?>
                            <li><a href="<?php echo base_url(); ?>index.php"><i class="fa fa-fw"></i> Home</a></li>

                        <?php } ?>
                        <!-- /.dropdown -->
                    </ul>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/admin"><i class="fa fa-home fa-fw"></i> Home</a>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ad_approval_controller/viewPendingAds/-1"><i class="fa fa-check-square-o fa-fw"></i>Approve Ads</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/report_controller/view_reports"><i class="fa fa-th-list fa-fw"></i> View Reports</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/admin_user_management_controller"><i class="fa fa-users fa-fw"></i>Manage Registered Users</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>index.php/admin_configure_controller"><i class="fa fa-wrench fa-fw"></i> Configure Site<span class="fa arrow"></span></a>
                            </li>
                            

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
