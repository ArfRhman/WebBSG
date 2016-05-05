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
                                    Sales Order
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                    <fieldset>
                                        <div class="col-md-12">
                                            <label class="col-md-4 control-label" for="name">Sales Order No</label>
                                            <div class="col-md-8"><?php echo $so->row()->so_no; ?></div>
										</div>
                                        <div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Sales Order Date</label>											
											<div class="col-md-8"><?php echo $so->row()->so_date; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">PO No</label>
                                            <div class="col-md-8"><?php echo $so->row()->po_no; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">PO Date</label>
											<div class="col-md-8"><?php echo $so->row()->po_date; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Customer ID</label>
                                            <div class="col-md-8"><?php echo $so->row()->customer_id; ?></div>						
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Customer Name</label>
											<div class="col-md-3"><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_customer', 'customer_id', $so->row()->customer_id)->row()->name; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Address</label>
                                            <div class="col-md-8"><?php echo $so->row()->address; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Phone</label>
											<div class="col-md-8"><?php echo $so->row()->phone; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Fax</label>
                                            <div class="col-md-8"><?php echo $so->row()->fax; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Account Manager</label>
                                            <div class="col-md-8"><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $so->row()->am)->row()->name; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Division</label>
                                            <div class="col-md-8"><?php echo $so->row()->division; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Operator</label>
											<div class="col-md-8"><?php echo $so->row()->operator; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Project Name</label>
                                            <div class="col-md-8"><?php echo $so->row()->pn; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Description</label>
											<div class="col-md-8"><?php echo $so->row()->description; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Payment Term</label>
                                            <div class="col-md-8"><?php echo $so->row()->payment_term; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Delivery Term</label>
											<div class="col-md-8"><?php echo $so->row()->delivery_term; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Delivery Cost Term</label>
                                            <div class="col-md-8"><?php echo $so->row()->delivery_cost_term; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Other Term</label>  
											<div class="col-md-8"><?php echo $so->row()->other_term; ?></div>
                                        </div>
										<div class="col-md-12">
                                            <label class="col-md-4 control-label" for="email">Other Status</label>
                                            <div class="col-md-8"><?php echo $so->row()->other_status; ?></div>
										</div>
										<div class="col-md-12">
											<label class="col-md-4 control-label" for="email">Softcopy</label>
											<div class="col-md-3"><?php echo anchor(base_url($so->row()->softcopy), 'Download'); ?></div>
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