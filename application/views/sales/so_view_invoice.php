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
							<a href="<?php echo site_url('sales/so/add_invoice/'.$this->uri->segment(4))?>" class="btn btn-success">Add New Data</a>
						<?php
						}
						?>
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Sales Order Invoicing & Collection Information
                                </div>
                                </div>
                            </div>
                            <div class="panel-body" style="overflow-x:auto">
                                <table class="table table-striped table-responsive" id="table1" style="
    width: 254%;
">
                                    <thead>
                                        <tr>
                                            <th>Inv. NO</th>
                                            <th>DO NO</th>
                                            <th>Item</th>
                                            <th>Inv. Date</th>
                                            <th>Inv. Amount</th>
                                            <th>Inv. Desc</th>
                                            <th>Inv. Due Date</th>
                                            <th>Inv. Sent Date</th>
                                            <th>Inv. Sent By</th>
                                            <th>Inv. Received By</th>
                                            <th>Inv. Received Date</th>
                                            <th>Receipt No</th>
                                            <th>Receipt</th>
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
                                            <td><?php echo $c->no; ?></td>

                                            <td><?php echo $c->do_no; ?></td>
                                            <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $c->item_id)->row()->nama; ?></td>
											<td><?php echo $c->date; ?></td>
											<td><?php echo $c->amount; ?></td>
											<td><?php echo $c->desc; ?></td>
											<td><?php echo $c->due; ?></td>
											<td><?php echo $c->sent; ?></td>
											<td><?php echo $c->sent_by; ?></td>
											<td><?php echo $c->received_by; ?></td>
											<td><?php echo $c->received_date; ?></td>
											<td><?php echo $c->receipt_no; ?></td>
											<td><?php 
                                             if($c->receipt_file!='') echo anchor(base_url($c->receipt_file), 'Download');
                                            else echo '-'; ?></td>
											<td>
												<div class='btn-group'>
													<button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>
														<ul class='dropdown-menu pull-right' role='menu'>															
															<li><a href='<?php echo site_url('sales/so/edit_invoice/'.$c->id);?>' >Edit</a></li>
															<li><a href='<?php echo site_url('sales/so/delete_invoice/'.$c->id);?>'>Delete</a></li>
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