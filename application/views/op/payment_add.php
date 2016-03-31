	<aside class="right-side">

	<!-- Main content -->

    <section class="content-header">

		<h1>Welcome to Dashboard</h1>

    </section>

    <section class="content">

				<div class="row">

                    <div class="col-lg-12">

						<?php

						if($this->mddata->access($this->session->userdata('group'), 'd15')->d15 > 1)

						{

						?>
						
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

										Add Payment Memo

									</h3>

									<span class="pull-right">

										<i class="glyphicon glyphicon-chevron-up clickable"></i>

									</span>

								</div>

								<div class="panel-body">

									<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/incoming/save');?>" method="post">

										<fieldset>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="name">Memo No</label>

												<div class="col-md-3">

													<input id="no" name="no" placeholder="Memo No" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="account">Bank Acoount</label>

												<div class="col-md-3">

													<input id="account" name="account" placeholder="Bank Acoount" class="form-control" type="text"></div>


											</div>

											<div class="form-group">
												
												<label class="col-md-2 control-label" for="date">Memo Date</label>

												<div class="col-md-3">

													<input id="date" name="date" placeholder="Memo Date" class="form-control datepicker" type="text"></div>
												<label class="col-md-2 control-label" for="beneficiary">Beneficiary</label>

												<div class="col-md-3">

													<input id="beneficiary" name="beneficiary" placeholder="Beneficiary" class="form-control" type="text"></div>
												
											</div>


											<div class="form-group">
												
												<label class="col-md-2 control-label" for="addressed">Addressed to</label>

												<div class="col-md-3">

													<input id="addressed" name="addressed" placeholder="Addressed to" class="form-control" type="text"></div>
												<label class="col-md-2 control-label" for="other">Other Info</label>

												<div class="col-md-3">
													<input id="other" name="other" placeholder="Other Info" class="form-control" type="text"></div>
												

											</div>


											<div class="form-group">
											
												<label class="col-md-2 control-label" for="cc">CC to</label>

												<div class="col-md-3">
													<select name="cc">
														<option></option>
													</select>
												</div>
												<label class="col-md-2 control-label" for="payment_date">Payment Date</label>

												<div class="col-md-3">

													<input id="payment_date" name="due" placeholder="dd MM YYYY" class="form-control  datepicker" type="text"></div>	
												

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="due">Due Date</label>

												<div class="col-md-3">

													<input id="due" name="due" placeholder="dd MM YYYY" class="form-control  datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="amount">Payment Amount</label>

												<div class="col-md-3">
													<input id="amount" name="amount" placeholder="Payment Amount" class="form-control" type="text"></div>
													

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="payment">Payment Type</label>

												<div class="col-md-3">

													<input id="payment" name="payment" placeholder="Payment Type" class="form-control" type="text"></div>
												<label class="col-md-2 control-label" for="proof">Payment Proof</label>

												<div class="col-md-3">
													<input id="proof" name="proof" placeholder="Payment Proof" class="form-control" type="text"></div>
												

													

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="bank">Bank Name</label>

												<div class="col-md-3">

													<input id="bank" name="bank" placeholder="Bank Name" class="form-control" type="text"></div>
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
<?php

}

?>
						