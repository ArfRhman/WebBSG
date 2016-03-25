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
                                    Add Sales Order
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/save');?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Sales Order No</label>
                                            <div class="col-md-3">
                                                <input id="name" name="so_no" placeholder="Sales Order No" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Sales Order Date</label>											<div class="col-md-3">                                                <input id="name" name="so_date" placeholder="Sales Order Date" class="form-control datepicker" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">PO No</label>
                                            <div class="col-md-3">
                                                <input id="email" name="po_no" placeholder="PO NO" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">PO Date</label>                                            <div class="col-md-3">                                                <input id="email" name="po_date" placeholder="PO Date" class="form-control datepicker" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Customer ID</label>
                                            <div class="col-md-3">
                                                <input id="email" name="customer_id" placeholder="Customer ID" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Customer Name</label>   
												<div class="col-md-3">												
												<select name="customer_name" class="form-control">
												<?php
													$sql = $this->mddata->getAllDataTbl('tbl_dm_customer');
													foreach($sql->result() as $s)
													{
														?>
														<option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
														<?php
													}
												?>
												</select> 
												</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Address</label>
                                            <div class="col-md-3">
                                                <input id="email" name="address" placeholder="Address" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Phone</label>                                            <div class="col-md-3">                                                <input id="email" name="phone" placeholder="Phone" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Fax</label>
                                            <div class="col-md-3">
                                                <input id="email" name="fax" placeholder="Fax" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Account Manager</label>                                            <div class="col-md-3">
                                                <select name="am" class="form-control">
												<?php
													$sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
													foreach($sql->result() as $s)
													{
														?>
														<option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
														<?php
													}
												?>
												</select> 
												</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Division</label>
                                            <div class="col-md-3">
                                                <input id="email" name="division" placeholder="Division" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Operator</label>                                            <div class="col-md-3">
                                                <select name="operator" class="form-control">
												<?php
													$sql = $this->mddata->getAllDataTbl('tbl_dm_operator');
													foreach($sql->result() as $s)
													{
														?>
														<option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
														<?php
													}
												?>
												</select> 
												</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Project Name</label>
                                            <div class="col-md-3">
                                                <input id="email" name="pn" placeholder="Project Name" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Description</label>                                            <div class="col-md-3">                                                <input id="email" name="description" placeholder="Description" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Payment Term</label>
                                            <div class="col-md-3">
                                                <input id="email" name="payment_term" placeholder="Payment Term" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Delivery Term</label>                                            <div class="col-md-3">                                                <input id="email" name="delivery_term" placeholder="Delivery Term" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Delivery Cost Term</label>
                                            <div class="col-md-3">
                                                <input id="email" name="delivery_cost_term" placeholder="Delivery Cost Term" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Other Term</label>                                            <div class="col-md-3">                                                <input id="email" name="other_term" placeholder="Other Term" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Other Status</label>
                                            <div class="col-md-3">
                                                <input id="email" name="other_status" placeholder="Other Status" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Softcopy</label>                                            <div class="col-md-3">                                                <input name="softcopy" type="file"></div>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>	    <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
    <!-- end of page level js -->		<script>		$(document).ready(function(){			$('.datepicker').datepicker({				format:'dd M yyyy'			});		});		</script>
</body>
</html>