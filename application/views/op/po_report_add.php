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
                                    Add Default Report
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/po/report_save');?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="po">PO No</label>
                                            <div class="col-md-3">
                                                <input id="po" name="po" placeholder="PO No" class="form-control" type="text"></div>
                                            <label class="col-md-2 control-label" for="currency">Currency</label>
                                            <div class="col-md-3">
                                                <input id="currency" name="currency" placeholder="Currency" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="date">PO Date</label>
											<div class="col-md-3">
                                                <input id="date" name="date" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>
                                            <label class="col-md-2 control-label" for="amount">Amount</label>
                                            <div class="col-md-3">
                                                <input id="amount" name="amount" placeholder="Amount" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="pureq">Pureq No</label>
                                            <div class="col-md-3">
                                                <input id="pureq" name="pureq" placeholder="Pureq No" class="form-control" type="text"></div>
                                            <label class="col-md-2 control-label" for="gr_no">GR No</label>
                                            <div class="col-md-3">
                                                <input id="gr_no" name="gr_no" placeholder="GR No" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="invoice">Invoice No</label>
                                            <div class="col-md-3">
                                                <input id="invoice" name="invoice" placeholder="Invoice No" class="form-control" type="text"></div>
											<label class="col-md-2 control-label" for="gr_date">GR Date</label>
                                            <div class="col-md-3">
                                                <input id="gr_date" name="gr_date" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="supplier">Supplier</label>
                                            <div class="col-md-3">
                                                <select name="suplier" class="form-control">
                                                    <?php 
                                                        foreach($this->mddata->getAllDataTbl('tbl_dm_supplier')->result() as $c)
                                                        {
                                                        ?>
                                                        <option value="<?php echo $c->id; ?>"><?php echo $c->supplier; ?></option>  
                                                        <?php
                                                        }
                                                    ?>
                                                    </select></div>
                                                    
                                            <label class="col-md-2 control-label" for="type">Payment Type</label>
                                            <div class="col-md-3">
                                                <input id="type" name="type" placeholder="Payment Type" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="forwarder">Forwarder</label>
                                            <div class="col-md-3">
                                                <select name="forwarder" class="form-control">
                                                    <?php 
                                                        foreach($this->mddata->getAllDataTbl('tbl_dm_forwarder')->result() as $c)
                                                        {
                                                        ?>
                                                        <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>  
                                                        <?php
                                                        }
                                                    ?>
                                                    </select></div>
                                            <label class="col-md-2 control-label" for="payment_date">Payment Date</label>
                                            <div class="col-md-3">
                                                <input id="payment_date" name="payment_date" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="moda">Moda</label>
                                            <div class="col-md-3">
                                                <input id="moda" name="moda" placeholder="Moda" class="form-control" type="text"></div>
                                            
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

        <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->

        <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>

        <!-- end of page level js -->

        <script>
            $(document).ready(function(){
                $('.datepicker').datepicker({
                    format:'dd M yyyy'
                });


            });

        </script>
</body>
</html>