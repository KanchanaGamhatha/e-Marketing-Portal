<div id="page-wrapper">
    <div class="col-lg-12">
        <div class="row">
            <div id="pending_reports">
                <h3 class="page-header">View Reports</h3>
                <div class="">
                    <div class="">
                        <div class="accordion" id="my-accordion">


                            <div class="panel panel-primary">
                                <div class="">
                                    <h4>
                                          &nbsp;&nbsp;&nbsp;Reports to be checked 
                                    </h4>
                                    <hr>
                                </div>
                                <div class="panel-body" id="collapse-2">
                                    <div class="accordion-inner">
                                        <div class="row">

                                            <table class="responstable">

                                                <tr>

                                                    <th data-th="Driver details"><span>Ad ID</span></th>
                                                    <th>Advertisement Title</th>
                                                    <th>Number of reports</th>
                                                    <th></th>
                                                </tr>

                                                <?php if (isset($reports)) : foreach ($reports as $row) : ?>
                                                        <tr>


                                                            <td><?php
                                                                $this->load->model('report_model');
                                                                echo $row->advertisement_id;
                                                                ?></td>
                                                            <td><?php echo report_model::get_ad_name($row->advertisement_id)->advertisement_title; ?></td>
                                                            <td><?php echo report_model::countreports($row->advertisement_id); ?></td>
                                                            <td><a href="<?php echo base_url() . "index.php/report_controller/view_single_reports/" . $row->advertisement_id; ?>" class="btn btn-info btn-outline btn-sm">Check</a></td>

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
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>/js/deleteReports.js">
        </script>
    </div>
</div>