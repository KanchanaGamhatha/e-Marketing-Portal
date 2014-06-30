<div id ="search_result">
<div class="container">

    <div class="row">
        <div class="span2">
            <div class="accordion" id="my-accordion">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a href="#collapse-1" data-toggle="collapse" data-parent="#my-accordion" class="accordion-toggle"><b class="btn btn-primary">Categories</b></a>
                    </div>
                    <div class="accordion-body collapse in" id="collapse-1">
                        <div class="accordion-inner">
                            <table class="">
                                <?php if (isset($categories)) : foreach ($categories as $row) : ?>
                                        <tr>
                                            <td>
                                                <ul class="thumbnails img-rounded">
                                                    <li class="span2"><a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?category=<?php echo html_escape($row->catogory_id); ?>" class="thumbnail"><?php echo html_escape($row->catogory_name)."  (".
                                                    $this->Search_model->countCategories($row->catogory_id).")"; ?></a></li>
                                                    <?php
                                                    if (isset($_GET['category']))
                                                    {
                                                        if($_GET['category']==$row->catogory_id && $_GET['category']==1)
                                                        {
                                                            foreach ($vehical_categories as $vehical)
                                                            {

                                                                echo"<br/>";
                                                                echo"<ul class=\"\">";
                                                                echo   "<li class=\"span2\">";
                                                                 echo   "<a href=\" ";
                                                                echo base_url()."index.php/search_controller/getCategories?category=";
                                                                echo html_escape($row->catogory_id);
                                                                echo "&subcategory=";
                                                                echo html_escape($vehical->vehicle_subcategory_id);
                                                                echo"\" class=\"thumbnail\">";
                                                                echo html_escape($vehical->vehicle_subcategory_name); 
                                                                echo"</a></li></ul>";
                                                            }

                                                        }
                                                        if($_GET['category']==$row->catogory_id && $_GET['category']==2)
                                                        {

                                                            
                                                            foreach ($property_categories as $property)
                                                            {

                                                                echo"<br/>";
                                                                echo"<ul class=\"\">";
                                                                echo   "<li class=\"span2\">";
                                                                echo   "<a href=\" ";
                                                                echo base_url()."index.php/search_controller/getCategories?category=";
                                                                echo html_escape($row->catogory_id);
                                                                echo "&subcategory=";
                                                                echo html_escape($property->property_subcategory_id);
                                                                echo"\" class=\"thumbnail\">";
                                                                echo html_escape($property->property_subcategory_name); 
                                                                echo"</a></li></ul>";
                                                            }

                                                        }
                                                        if($_GET['category']==$row->catogory_id && $_GET['category']==3)
                                                        {
                                                            foreach ($electronic_categories as $electronic)
                                                            {

                                                                echo"<br/>";
                                                                echo"<ul class=\"\">";
                                                                echo   "<li class=\"span2\">";
                                                                 echo   "<a href=\" ";
                                                                echo base_url()."index.php/search_controller/getCategories?category=";
                                                                echo html_escape($row->catogory_id);
                                                                echo "&subcategory=";
                                                                echo html_escape($electronic->electronic_subcategory_id);
                                                                echo"\" class=\"thumbnail\">";
                                                                echo html_escape($electronic->electronic_subcategory_name); 
                                                                echo"</a></li></ul>";
                                                            }

                                                        }
                                                        if($_GET['category']==$row->catogory_id && $_GET['category']==4)
                                                        {
                                                            
                                                            foreach ($homeandpersonal_categories as $homeandpersonal)
                                                            {

                                                                echo"<br/>";
                                                                echo"<ul class=\"\">";
                                                                echo   "<li class=\"span2\">";
                                                                 echo   "<a href=\" ";
                                                                echo base_url()."index.php/search_controller/getCategories?category=";
                                                                echo html_escape($row->catogory_id);
                                                                echo "&subcategory=";
                                                                echo html_escape($homeandpersonal->home_personal_subcategory_id);
                                                                echo"\" class=\"thumbnail\">";
                                                                echo html_escape($homeandpersonal->home_personal_subcategory_name); 
                                                                echo"</a></li></ul>";
                                                            }

                                                        }
                                                    }

                                                    ?>
                                                </ul>

                                            </td>

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
                
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a href="#collapse-2" data-toggle="collapse" data-parent="#my-accordion" class="accordion-toggle"><b class="btn btn-primary">Locations</b></a>
                    </div>
                    <div class="accordion-body collapse" id="collapse-2">
                        <div class="accordion-inner">
                            <table class="">
                                <?php if (isset($locations)) : foreach ($locations as $row) : ?>
                                        <tr>
                                            <td>
                                                <ul class="thumbnails img-rounded">
                                                    <li class="span2"><a href="<?php echo base_url(); ?>index.php/search_controller/getCategories?location=<?php echo html_escape($row->location_id); ?>" class="thumbnail"><?php echo html_escape($row->location_name)."  (".
                                                    $this->Search_model->countLocations($row->location_id).")"; ?></a></li>
                                                </ul>

                                            </td>

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
