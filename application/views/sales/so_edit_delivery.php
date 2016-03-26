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
                        Edit Delivery Information
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/update_delivery/'.$this->uri->segment(4));?>" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">Do No</label>
                                <div class="col-md-3">
                                    <input id="name" name="do_no" placeholder="Do No" class="form-control" type="text" value="<?php echo $so->row()->do_no; ?>"></div>                                                                                       <label class="col-md-2 control-label" for="email">Do Date</label>                                           <div class="col-md-3">                                                <input id="name" name="do_date" placeholder=" Do Date" class="datepicker form-control" type="text" value="<?php echo $so->row()->do_date; ?>"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Delivery Date</label>
                                    <div class="col-md-3">
                                    <input id="email" name="delivery" placeholder=" Delivery Date" class="form-control datepicker" type="text" value="<?php echo $so->row()->delivery; ?>"></div>                                                                                       <label class="col-md-2 control-label" for="email">Delivery By</label>                                            <div class="col-md-3">                                                <select name="delivery_by" class="form-control">
                                                   <option <?php if($so->row()->delivery_by == 'Own Transportation') echo 'selected' ?>>Own Transportation</option>
                                                   <option <?php if($so->row()->delivery_by == 'Pick up') echo 'selected' ?>>Pick up</option>
                                                   <option <?php if($so->row()->delivery_by == 'Expediture') echo 'selected' ?>>Expediture</option>
                                               </select>    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="email">Expediture Name</label>
                                        <div class="col-md-3">
                                            <input id="email" name="name" placeholder="Expediture Name" class="form-control" type="text" value="<?php echo $so->row()->name; ?>"></div>
                                            <label class="col-md-2 control-label" for="email">Delivery Method</label>
                                            <div class="col-md-3">
                                                <select name="method" class="form-control">
                                                <option value="Land" <?php if($so->row()->method == 'Land') echo 'selected' ?>>Land</option>
                                                   <option value="Charter"> <?php if($so->row()->method == 'Charter') echo 'selected' ?>Charter</option>
                                                   <option value="Air" <?php if($so->row()->method == 'Air') echo 'selected' ?>>Air</option>
                                                   <option value="Train" <?php if($so->row()->method == 'Train') echo 'selected' ?>>Train</option>
                                                   <option value="Sea" <?php if($so->row()->method == 'Sea') echo 'selected' ?>>Sea</option>
                                               </select>                                               
                                           </div>
                                       </div>
                                       <div class="form-group">
                                        <label class="col-md-2 control-label" for="email">Awb/Receipt No</label>
                                        <div class="col-md-3">
                                            <input id="email" name="awb_no" placeholder="awb/receipt no" class="form-control" type="text" value="<?php echo $so->row()->awb_no; ?>"></div>                                                                                        <label class="col-md-2 control-label" for="email">Depart Date</label>                                            <div class="col-md-3">                                                <input id="email" name="depart" placeholder="Depart Date" class="form-control datepicker" type="text" value="<?php echo $so->row()->depart; ?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Received Date</label>
                                            <div class="col-md-3">
                                                <input id="email" name="received" placeholder="Received Date" class="form-control datepicker" type="text" value="<?php echo $so->row()->received;?>"></div>                                                                                       <label class="col-md-2 control-label" for="email">Received By</label>                                            <div class="col-md-3">                                                <input id="email" name="received_by" placeholder="Received By" class="form-control" type="text" value="<?php echo $so->row()->received_by; ?>"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="email">Nett Delivery Cost</label>
                                                <div class="col-md-3">
                                                    <input id="email" name="nett" placeholder="Nett Delivery Cost" class="form-control" type="text" value="<?php echo $so->row()->nett; ?>"></div>                                                                                      <label class="col-md-2 control-label" for="email">AWB/Received</label>                                            <div class="col-md-3">                                               <input name="awb_file" type="file"><span style="color:red;">*leave blank if wont change</span>
                                                       <input name="oldAWB" type="hidden" value="<?php echo $so->row()->awb_file; ?>"></div>
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