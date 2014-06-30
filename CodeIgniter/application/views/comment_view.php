<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
    <div class="accordion" id="my-accordion">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a href="#collapse-1" data-toggle="collapse" data-parent="#my-accordion" class="accordion-toggle"><b class="btn btn-inverse">Post your comment</b></a>
            </div>
            <div class="accordion-body collapse" id="collapse-1">
                <div class="accordion-inner">
                    <div class="row">
                        <div class="span6">
                            <div class="well well-small">
                                <h4>Post your comment</h4>
                            </div>
                            <?php
                            $this->load->helper('form');

                            echo form_open('comment_controller/post_comment');

                            echo form_hidden('advertisement_id', $advertisement_id, set_value('advertisement_id'));
                            echo form_label('<h4>Comment</h4>', 'comment');
                            $data = array(
                                'name' => 'comment',
                                'id' => 'comment',
                                'value' => set_value('comment')
                            );

                            echo form_textarea($data, '', 'required <div style="width:555px; height:125px"');
                            echo form_error('comment', '<p class ="alert alert-danger">');

                            echo '<br>';
                            ?>
                            <div class="row">
                                <div class="span4">
                                    <?php echo form_submit('submit', 'Submit', 'class="btn btn-inverse"'); ?>
                                </div>
                                <div class="span2">
                                    <?php echo form_reset('clear', 'Clear', 'class="btn btn-inverse" onclick=\'clear();\''); ?>
                                </div>
                            </div>


                            <?php
                            echo form_close();
                            //echo '<div style="width:350px;float: left;"></div>';
                            ?>

                            <?php if (isset($records)): echo '<hr><h4>Previous Comments</h4>';
                                foreach ($records as $row) :
                                    ?>
                                    <div class="well well-small span5">
                                        <div class="row" >
                                            <div class="span4">
                                                <?php echo form_open('comment_controller/deleteComment'); ?>
        <?php echo form_hidden('advertisement_id', $advertisement_id, set_value('advertisement_id')); ?>
                                                <?php echo form_hidden('comment_id', $row->comment_Id, set_value('comment_id')); ?>
                                                <h5 style="color: highlight"><?php echo $row->name ?></h5>
                                                <div class="panel-body"><?php echo $row->comment ?></div>
                                                <?php echo $row->date ?>
                                            </div>
                                            <div class="span1">
        <?php echo form_submit('submit', 'x', 'class="btn btn-info btn-mini"'); ?>
                                            </div>
                                        </div>

        <?php echo form_close(); ?>

                                    </div>



                                <?php endforeach; ?>

<?php else : ?>
                                <hr>
                                <h5 class="alert alert-info"> No comments available currently. Be the first to comment on this Ad</h5>
                                <br>
<?php endif; ?> 


                        </div>
                        <div class="span2"></div>
                        <div class="span4">
                            <div class="fb-like-box" data-href="https://www.facebook.com/pages/E-marketing-Portal/565211040266910?skip_nax_wizard=true" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Email/js/clear.js"></script>