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
                                    Edit Policies
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/policies/update');?>" method="post">
                                <input type="hidden" name="no" value="<?=$poli->no?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Rule/Policy No.</label>
                                            <div class="col-md-3">
                                                <input id="name" value="<?=$poli->policy_no?>" name="policies_no" placeholder="Rule/Policy No" class="form-control" type="text"></div>                                                                                      <label class="col-md-2 control-label" for="email">Rule/Policy Date</label>                                          <div class="col-md-3">                                                <input id="name" value="<?=$poli->policy_date?>" name="policies_date" placeholder="Rule/Policy Date" class="form-control datepicker" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Rule/Policy Type</label>
                                            <div class="col-md-3">
                                                <input id="email" value="<?=$poli->policy_type?>" name="policies_type" placeholder="Rule/Policy Type" class="form-control" type="text"></div>                                                                                      <label class="col-md-2 control-label" for="email">Desciption</label>                                            <div class="col-md-3">                                                <input id="email" value="<?=$poli->description?>" name="policies_desc" placeholder="Desciption" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                           <label class="col-md-2 control-label" for="email">File</label>                                            <div class="col-md-3">                                                <input name="file" type="file"></div> 
                                           <label class="col-md-2 control-label" for="email">Date of Issued</label>                                          <div class="col-md-3">                                                <input value="<?=$poli->date_of_issued?>" id="name" name="policies_date_issued" placeholder="Date of Issued" class="form-control datepicker" type="text"></div>                                                                              
                                        </div>
                                         <div class="form-group">
                                           <label class="col-md-2 control-label" for="email">Date of Expired</label>                                          <div class="col-md-3">                                                <input value="<?=$poli->date_of_expired?>" id="name" name="policies_date_expired" placeholder="Date of Expired" class="form-control datepicker" type="text"></div>
                                           <label class="col-md-2 control-label" for="email">Remark</label>                                          <div class="col-md-3">                                                <input id="name" value="<?=$poli->remark?>" name="policies_remark" placeholder="Remark" class="form-control" type="text"></div>                                                                              
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