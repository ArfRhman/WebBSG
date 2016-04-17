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

									Edit Tabel Payment Memo

								</h3>

								<span class="pull-right">

									<i class="glyphicon glyphicon-chevron-up clickable"></i>

								</span>

							</div>

							<div class="panel-body">

								<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/payment/tabel_update');?>" method="post">
									<input type="hidden" name="no" value="<?=$op->no?>">
									<fieldset>
										<div class="form-group">

											<label class="col-md-2 control-label" for="date">Budget Code</label>

											<div class="col-md-3">
												<select name="code" class="form-control" id="cdBudget">
													<option>-- Pilih Code Budget --</option>
													<?php
													$sql = $this->mddata->getAllDataTbl('tbl_dm_budget');
													foreach($sql->result() as $s)
													{
														?>
														<option value="<?php echo $s->id; ?>-<?php echo $s->code; ?>" <?=$s->id.'-'.$s->code==$op->budget_code ? 'selected' : ''?>><?php echo $s->code ?></option>
														<?php
													}
													?>
												</select>
											</div>
											<label class="col-md-2 control-label" for="addressed">Main Budget</label>

											<div class="col-md-3">
												<input value="<?=$op->main_budget?>" id="mainBudget" name="main" placeholder="Main Budget" class="form-control" type="text" readonly>
											</div>

										</div>

										<div class="form-group">

											<label class="col-md-2 control-label" for="cc">Vendor</label>

											<div class="col-md-3">
												<select name="vendor" class="form-control">
													<?php
													$sql = $this->mddata->getAllDataTbl('tbl_dm_forwarder');
													foreach($sql->result() as $s)
													{
														?>
														<option value="<?php echo $s->forwarder_id; ?>" <?=$s->forwarder_id==$op->vendor ? 'selected' : ''?>><?php echo $s->name ?></option>
														<?php
													}
													?>
												</select>
											</div>
											<label class="col-md-2 control-label" for="due">Currency Type</label>

											<div class="col-md-3">
												<select name="currency" class="form-control">
													<option <?=$op->currency_type=='IDR' ? 'selected' : ''?>>IDR</option>
													<option <?=$op->currency_type=='USG' ? 'selected' : ''?>>USD</option>
													<option <?=$op->currency_type=='SGD' ? 'selected' : ''?>>SGD</option>
													<option <?=$op->currency_type=='EUR' ? 'selected' : ''?>>EUR</option>
												</select>
											</div>	


										</div>
										<div class="form-group">

											<label class="col-md-2 control-label" for="payment">Amount</label>

											<div class="col-md-3">

												<input value="<?=$op->amount?>" id="payment" name="amount" placeholder="Amount" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="bank">Description</label>

												<div class="col-md-3">

													<input value="<?=$op->description?>" id="bank" name="desc" placeholder="Description" class="form-control" type="text"></div>
												</div>

												<div class="form-group">



													<label class="col-md-2 control-label" for="account">Invoice No</label>

													<div class="col-md-3">

														<input value="<?=$op->invoice_no?>" id="account" name="invoice" placeholder="Invoice No" class="form-control" type="text"></div>

														<label class="col-md-2 control-label" for="beneficiary">Remark</label>

														<div class="col-md-3">

															<input value="<?=$op->remark?>" id="beneficiary" name="remark" placeholder="Remark" class="form-control" type="text"></div>
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

							$("#cdBudget").change(function(){
								var cd = $("#cdBudget").val().split('-');
								if($("#cdBudget").val()!=""){
									$.ajax({
										type:'POST',
										url: "<?php echo site_url('dm/budget/get_field') ?>",
										data: "id=" + cd[0],
										success: function(data){
											var obj = JSON.parse(data);
											$('#mainBudget').val(obj.main);

										}
									}); 

								}else{
									$('#mainBudget').val('');
								} 
							});
						});

					</script>

				</body>

				</html>
				<?php

			}

			?>
