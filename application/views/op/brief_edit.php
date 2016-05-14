    <aside class="right-side">

        <!-- Main content -->

        <section class="content-header">

            <h1>Welcome to Dashboard</h1>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-lg-12">
                    <?php
                    if($this->session->flashdata('data') == TRUE)
                    {
                       ?>
                       <div class="panel-heading">
                        <h3 class="panel-title">
                            <?php echo $this->session->flashdata('data');?>
                        </h3>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($this->mddata->access($this->session->userdata('group'), 'd18')->d18 >= 1)
                {
                    ?>

                    <div class="panel panel-primary" id="hidepanel1">

                        <div class="panel-heading">

                            <h3 class="panel-title">

                                <i style="width: 16px; height: 16px;" id="livicon-46" class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>

                                Short Brief

                            </h3>

                            <span class="pull-right">

                                <i class="glyphicon glyphicon-chevron-up clickable"></i>

                            </span>

                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/brief/update');?>" method="post">
                                <fieldset>
                                    <div class="form-group"> 
                                        <label class="col-md-6 col-md-offset-3 control-label" for="effective" style="text-align:center;">Short Brief</label>

                                    </div>
                                    <div class="form-group">

                                        <div class="col-md-8 col-md-offset-2">
                                          <textarea name="brief" class="form-control" rows="10"><?=$ds->content?></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </section>

</aside>

<!-- right-side -->

</div>

<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">

    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>

</a>

<!-- global js -->

<script src="<?php echo base_url();?>style/js/jquery-1.11.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>style/js/bootstrap.min.js" type="text/javascript"></script>

<!--livicons-->

<script src="<?php echo base_url();?>style/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>style/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>style/js/josh.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>style/js/metisMenu.js" type="text/javascript"> </script>

<script src="<?php echo base_url();?>style/vendors/holder-master/holder.js" type="text/javascript"></script>

<!-- end of global js -->

<!-- begining of page level js -->

<!-- Back to Top-->


<script type="text/javascript" src="<?php echo base_url();?>style/tinymce/tinymce.min.js"></script>

<!-- end of page level js -->
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
</body>

</html>
<?php } ?>
