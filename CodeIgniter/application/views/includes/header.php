<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php if (!isset($page_title)) { echo 'e Marketing Portal'; } ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <!--<link rel="stylesheet" href="<?php //echo base_url(); ?>css/styles.css" type="text/css" media="screen" charset="UTF-8"/>-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" media="screen" charset="UTF-8"/>
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" media="screen" charset="UTF-8"/>-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" type="text/css" media="screen" charset="UTF-8"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>jquery/jRating.jquery.css"/>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>jquery/jRating.jquery.js"></script>
        <script src="https://raw.githubusercontent.com/kvz/phpjs/master/functions/strings/md5.js"></script>
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

                        <a href="<?php echo base_url(); ?>index.php" class="brand active"><h3>e Marketing Portal</h3></a>

                        <a data-toggle="collapse" data-target=".nav-collapse" class="btn btn-navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>

                        <div class="collapse nav-collapse">

                            

                            <ul class="nav pull-right">
                                
                                <?php if (isset($logged_in_user_name) && ($logged_in_user_name != NULL)) { ?>
                                    <li><a href="<?php echo base_url(); ?>index.php/my_ads_controller"><?php echo '<h4> ' . $logged_in_user_name->name . '</h4>'; ?></a>
                                <?php }  if (isset($admin_id) && $admin_id != NULL ) { ?>
                                    
                                <li><a><?php echo '<h4> Welcome ' . $admin_id . '</h4>'; ?></a></li>
                                    <?php }?>
                                
                                    <li><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/" class="btn btn-inverse"><?php if(isset($all_ads)){ echo $all_ads;}else { echo 'View Ads';} ?></a></li>
                                <?php if (!isset($logged_in_user_name)) { ?>

                                    <li><a href="<?php echo base_url(); ?>index.php/login" class="btn btn-inverse"><?php if(isset($login)){ echo $login;}else { echo 'Login';} ?></a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/login/signup" class="btn btn-inverse"><?php if(isset($register)){ echo $register;}else { echo 'Register';}  ?></a></li>


                                <?php } else {
                                    ?>
                                    
                                    <li><a href="<?php echo base_url(); ?>index.php/advertisement_Controller/add" class="btn btn-inverse">POST YOUR AD</a></li>
                                    <li><?php echo anchor('login/logout', 'Logout', 'class="btn btn-inverse"') . "<br/>"; ?></li>

                                <?php } ?>




                            </ul>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            
            <!--<script type="text/javascript" src="<?php //echo base_url(); ?>/js/change_language.js"></script>-->
            