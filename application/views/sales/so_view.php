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
							<a href="<?php echo site_url('sales/so/add')?>" class="btn btn-success">Add New Data</a>
						<?php
						}
						?>
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Sales Order
                                </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>No SO</th>
                                            <th>SO Date</th>
                                            <th>PO No</th>
                                            <th>PO Date</th>
                                            <th>Cus. ID</th>
                                            <th>Cus. Name</th>
                                            <th>AM</th>
                                            <th>Project Name</th>
                                            <th>PO File</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;
									foreach($so->result() as $c)
									{
									?>
                                        <tr>
                                            <td><?php echo $no; $no++;?></td>
											<td><?php echo $c->so_no; ?></td>
											<td><?php echo $c->so_date; ?></td>
											<td><?php echo $c->po_no; ?></td>
											<td><?php echo $c->po_date; ?></td>
											<td><?php echo $c->customer_id; ?></td>
											<td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_customer', 'id', $c->customer_name)->row()->name; ?></td>
											<td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $c->am)->row()->name; ?></td>
											<td><?php echo $c->pn; ?></td>
											<td><?php 
                                            if($c->softcopy!='') echo anchor(base_url($c->softcopy), 'Download');
                                            else echo '-';
                                             ?></td>
											<td>
												<div class='btn-group'>
													<button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>
														<ul class='dropdown-menu pull-right' role='menu'>															
															<li><a href='<?php echo site_url('sales/so/edit/'.$c->id)?>' >Edit</a></li>
															<li><a href='<?php echo site_url('sales/so/delete/'.$c->id);?>' class="delete" data-id = "<?php echo $c->id;?>">Delete</a></li>
															<li><a href='<?php echo site_url('sales/so/all_view/'.$c->id)?>'>View All Data</a></li>
															<li><a href='<?php echo site_url('sales/so/detail_view/'.$c->id)?>'>SO Detail</a></li>
															<li><a href='<?php echo site_url('sales/so/delivery_view/'.$c->id)?>'>SO Delivery Information</a></li>
															<li><a href='<?php echo site_url('sales/so/invoice_view/'.$c->id)?>'>SO Invoicing & Collection Information</a></li>
															<li><a href='<?php echo site_url('sales/so/payment_view/'.$c->id)?>'>Payment Information</a></li>
															<li><a href='<?php echo site_url('sales/so/cost_view/'.$c->id)?>'>Cost & Commitment Information</a></li>
														</ul>													
												</div>
											</td>
										</tr>
									<?php 
									}
									?>
									</tbody>
								</table>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>		<script type="text/javascript" src="<?php echo base_url();?>style/js/bootbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
    <!-- end of page level js -->		
	<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('sales/so/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>