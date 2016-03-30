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

									Edit Import Licenses

								</h3>

								<span class="pull-right">

									<i class="glyphicon glyphicon-chevron-up clickable"></i>

								</span>

							</div>

							<div class="panel-body">

								<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/licenses/update');?>" method="post">
									<input type="hidden" name="no" value="<?=$licenses->no;?>">
									<fieldset>

										<div class="form-group">
											
											<label class="col-md-2 control-label" for="license_name">License Name</label>

											<div class="col-md-3">

												<input id="license_name" value="<?=$licenses->license_name;?>" name="license_name" placeholder="License Name" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="issuing">Issuing Institution</label>

												<div class="col-md-3">

													<input id="issuing" value="<?=$licenses->issuing_institution;?>" name="issuing" placeholder="Issuing Institution" class="form-control" type="text"></div>

												</div>

												<div class="form-group">

													<label class="col-md-2 control-label" for="license_no">License No</label>

													<div class="col-md-3">

														<input id="license_no" value="<?=$licenses->no;?>" name="license_no" placeholder="License No" class="form-control" type="text"></div>

														<label class="col-md-2 control-label" for="email">Description</label>

														<div class="col-md-3">

															<input id="email" value="<?=$licenses->description;?>" name="perihal" placeholder="Description" class="form-control" type="text"></div>

														</div>


														<div class="form-group">

															<label class="col-md-2 control-label" for="issurance">Date of Issurance</label>

															<div class="col-md-3">

																<input id="issurance" value="<?=$licenses->date_of_issurance;?>" name="issurance" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>

																<label class="col-md-2 control-label" for="licenses">Licenses</label>

																<div class="col-md-3">
																	<input id="licenses" name="file"  type="file"></div>


																</div>


																<div class="form-group">

																	<label class="col-md-2 control-label" for="expiry">Date Of Expiry</label>

																	<div class="col-md-3">

																		<input id="expiry" value="<?=$licenses->date_of_expiry?>" name="expiry" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>

																		<label class="col-md-2 control-label" for="explanation">Explanation</label>

																		<div class="col-md-3">
																			<input id="explanation" name="fileEx"  type="file"></div>


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
