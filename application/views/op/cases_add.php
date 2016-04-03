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
                    <div class="panel panel-primary" id="hidepanel1">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i style="width: 16px; height: 16px;" id="livicon-46" class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Add Cases
                            </h3>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/cases/save');?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                         <label class="col-md-2 control-label" for="date_case">Date of Case</label>
                                        <div class="col-md-3">
                                           <input id="date_case" name="date_case" placeholder="dd MMM YYYY" class="form-control datepicker" type="text">
                                       </div>                                                                                       
                                        <label class="col-md-2 control-label" for="date_solving">Date of Solving</label>                                          
                                         <div class="col-md-3">
                                            <input id="date_solving" name="date_solving" placeholder="dd MMM YYYY" class="form-control datepicker" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="subject">Subject of Case</label>
                                        <div class="col-md-3">
                                           <input id="subject" name="subject" placeholder="Subject of Case" class="form-control" type="text">
                                       </div>                               
                                       <label class="col-md-2 control-label" for="solving">Solving</label>
                                       <div class="col-md-3">
                                           <input id="solving" name="solving" placeholder="Solving" class="form-control" type="text">
                                       </div>                                                      
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-2 control-label" for="detail">Detail Case</label>
                                        <div class="col-md-3">
                                           <input id="detail" name="detail" placeholder="Detail Case" class="form-control" type="text">
                                       </div>                                      
                                       <label class="col-md-2 control-label" for="final">Final Action</label>
                                       <div class="col-md-3">
                                           <input id="final" name="final" placeholder="Final Action" class="form-control" type="text">
                                       </div>                                                      
                                   </div>
                                   <div class="form-group">
                                        <label class="col-md-2 control-label" for="personels">Personels Involved</label>
                                        <div class="col-md-3">
                                           <input id="personels" name="personels" placeholder="Personels Involved" class="form-control" type="text">
                                       </div>                                    
                                       <label class="col-md-2 control-label" for="conclusion">Conclusion</label>
                                       <div class="col-md-3">
                                           <input id="conclusion" name="conclusion" placeholder="Conclusion" class="form-control" type="text">
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
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/countUp/countUp.js"></script>
<!--   maps -->
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>     <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
<!-- end of page level js -->       <script>        $(document).ready(function(){           $('.datepicker').datepicker({               format:'dd M yyyy'          });     });     </script>
</body>
</html>