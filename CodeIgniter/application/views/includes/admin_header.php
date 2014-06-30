<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css" type="text/css" media="screen" charset="UTF-8"/>-->
        <link rel="stylesheet" href="/CodeIgniter/css/bootstrap.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="/CodeIgniter/css/bootstrap.min.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="/CodeIgniter/css/bootstrap-responsive.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="/CodeIgniter/css/bootstrap-responsive.min.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>jquery/jRating.jquery.css"/>
        <style>
            body {
                background-color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <br>
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">

                        <a href="http://localhost/CodeIgniter/index.php/admin" class="brand active"><h3>Administrator Area</h3></a>

                        <a data-toggle="collapse" data-target=".nav-collapse" class="btn btn-navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>

                        <div class="collapse nav-collapse">


                            <ul class="nav pull-right">
                               
                                <?php if (isset($admin_id) && $admin_id != NULL ) { ?>
                                    
                                <li><a><?php echo '<h4> Welcome ' . $admin_id . '</h4>'; ?></a></li>
                                    <li><?php echo anchor('admin/logout', 'Logout', 'class="btn btn-inverse"') . "<br/>"; ?></li>
                                <?php } else {
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>index.php/admin" class="btn btn-inverse">Login</a></li>

                                <?php } ?>
                            </ul>
                        </div>
                        <br>

                        <br>

                        <br>


                    </div>
                </div>
            </div> 



        </div>
        <div class="container" style="background-color: #ffffff">
