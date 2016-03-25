	<aside class="right-side">
	<!-- Main content -->
    <section class="content-header">
		<h1>Welcome to Dashboard</h1>
    </section>
    <section class="content">
				<div class="row">
                    <div class="col-lg-12">
						<?php
						if($this->mddata->access($this->session->userdata('group'), 'd3')->d3 > 1)
						{
						?>
						<div class="portlet box info">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i style="width: 16px; height: 16px;" id="livicon-49" class="livicon" data-name="rocket" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Add Subfield Data
                                </div>
                            </div>
                            <div class="portlet-body">
								<div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cost ID</th>
                                                <th>Vendor</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                                <th>Uraian</th>
                                                <th>Invoice No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											echo form_open('op/memo/update_subfield/'.$this->uri->segment(4));
											?>
											<tr>
												<td>
												<select name="cost_id" class="form-control">
													<option <?php if($memo->row()->cost_id == "1. Import Taxes" ) echo "selected"; ?> value="1. Import Taxes">1. Import Taxes</option>
													<option <?php if($memo->row()->cost_id == "2. Custom Clearance" ) echo "selected"; ?> value="2. Custom Clearance">2. Custom Clearance</option>
													<option <?php if($memo->row()->cost_id == "3. Freight Cost" ) echo "selected"; ?> value="3. Freight Cost">3. Freight Cost</option>
													<option <?php if($memo->row()->cost_id == "4. Ongkos Kirim Domestik" ) echo "selected"; ?> value="4. Ongkos Kirim Domestik">4. Ongkos Kirim Domestik</option>
													<option <?php if($memo->row()->cost_id == "5. Purchase Cost" ) echo "selected"; ?> value="5. Purchase Cost">5. Purchase Cost</option>
													<option <?php if($memo->row()->cost_id == "6. Facilitator's Fee" ) echo "selected"; ?> value="6. Facilitator's Fee">6. Facilitator's Fee</option>
													<option <?php if($memo->row()->cost_id == "7. Supporting Tools" ) echo "selected"; ?> value="7. Supporting Tools">7. Supporting Tools</option>
													<option <?php if($memo->row()->cost_id == "8. ATK" ) echo "selected"; ?> value="8. ATK">8. ATK</option>
													<option <?php if($memo->row()->cost_id == "9. Marine Insurance" ) echo "selected"; ?> value="9. Marine Insurance">9. Marine Insurance</option>
												</select>
												</td>
												<td>
												<select name="vendor" class="form-control">
												<?php
												foreach($this->mddata->getAllDataTbl('tbl_dm_supplier')->result() as $c)
												{
													?>
													<option <?php if($memo->row()->vendor == $c->supplier) echo "selected"; ?> value="<?php echo $c->supplier; ?>"><?php echo $c->supplier; ?></option>
													<?php
												}
												foreach($this->mddata->getAllDataTbl('tbl_dm_forwarder')->result() as $c)
												{
													?>
													<option <?php if($memo->row()->vendor == $c->name) echo "selected"; ?> value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>
													<?php
												}
												?>
												</select>
												</td>
												<td>
												<select name="rate" class="form-control">
													<option <?php if($memo->row()->rate == "USD") echo "selected"; ?> value="USD">USD</option>
													<option <?php if($memo->row()->rate == "IDR") echo "selected"; ?> value="IDR">IDR</option>
													<option <?php if($memo->row()->rate == "SGD") echo "selected"; ?> value="SGD">SGD</option>
													<option <?php if($memo->row()->rate == "EUR") echo "selected"; ?> value="EUR">EUR</option>
												</select>
												</td>
												<td><input type="text" value="<?php echo $memo->row()->amount; ?>" name="amount" class="form-control" placeholder="Amount ex 1000000" /></td>
												<td><input type="text" value="<?php echo $memo->row()->uraian; ?>" name="uraian" class="form-control" placeholder="Uraian" /></td>
												<td><input type="text" value="<?php echo $memo->row()->invoice; ?>" name="invoice" class="form-control" placeholder="Invoice" /></td>
												<td><button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button></td>
											</tr>
											<?php
											echo form_close();
											?>
                                        </tbody>
                                    </table>
                                </div>
							</div>
						</div>
						<?php
						}
						?>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
    <!-- end of page level js -->
</body>
</html>