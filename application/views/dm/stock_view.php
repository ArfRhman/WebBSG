	<aside class="right-side">
	<!-- Main content -->
    <section class="content-header">
		<h1>Welcome to Dashboard</h1>
    </section>
    <section class="content">
				<div class="row">
                    <div class="col-lg-12">
						<?php
						if($this->mddata->access($this->session->userdata('group'), 'd21')->d21 > 1)
						{
						?>
							<a href="<?php echo site_url('dm/stock/add')?>" class="btn btn-success">Add New Data</a>
							<br />
							<br />
						<?php
						}
						?>
                        <div class="portlet box info">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i style="width: 16px; height: 16px;" id="livicon-49" class="livicon" data-name="rocket" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Stock List
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Location</th>
                                                <th>UOM</th>
                                                <th>Item Group</th>
                                                <th>Item Type</th>
                                                <th>Description</th>
                                                <th>Costing Method</th>
                                                <th>QTY</th>
                                                <th>Total Cost</th>
                                                <th>Average Cost / Qty</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$totQty = 0;
											$total = 0;
											$average = 0;
											foreach($stock->result() as $c)
											{
											?>
                                            <tr>
												<td><?php echo $c->code ?></td>
												<td><?php echo $c->location ?></td>
												<td><?php echo $c->uom ?></td>
												<td><?php echo $c->group ?></td>
												<td><?php echo $c->type ?></td>
												<td><?php echo $c->description ?></td>
												<td><?php echo $c->method ?></td>
												<td><?php echo $c->qty; $totQty += $c->qty; ?></td>
												<td><?php echo $c->total; $total += $c->total; ?></td>
												<td><?php echo $c->average; $average += $c->average; ?></td>
												<td>
													<a href="<?php echo site_url('dm/stock/delete/'.$c->id)?>" class="btn btn-danger">Delete</a>
													<a href="<?php echo site_url('dm/stock/edit/'.$c->id)?>" class="btn btn-info">Edit</a>
												</td>
                                            </tr>
											<?php
											}
											?>
											<tr>
												<td colspan="7">Total</td>
												<td><?php echo $totQty ?></td>
												<td><?php echo $total ?></td>
												<td><?php echo $average ?></td>
												<td></td>
											</tr>
                                        </tbody>
                                    </table>
                                </div>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
    <!-- end of page level js -->
</body>
</html>