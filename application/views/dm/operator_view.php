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
							<a href="<?php echo site_url('dm/operator/add')?>" class="btn btn-success">Add New Data</a>
						<?php
						}
						?>
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Operator List
                                </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                    <table class="table table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Operator Name</th>
                                                <th>Product / Service</th>
                                                <th>Brand / Trademark</th>
                                                <th>Address</th>
                                                <th>Postal Code</th>
                                                <th>Phone</th>
                                                <th>Fax</th>
                                                <th>Website</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$no = 1;
											foreach($operator->result() as $c)
											{
											?>
                                            <tr>
												<td><?php echo $no; $no++; ?></td>
												<td><?php echo $c->name ?></td>
												<td><?php echo $c->product ?></td>
												<td><?php echo $c->brand ?></td>
												<td><?php echo $c->address ?></td>
												<td><?php echo $c->postal ?></td>
												<td><?php echo $c->phone ?></td>
												<td><?php echo $c->fax; ?></td>
												<td><?php echo $c->website; ?></td>
												<td>
													<!--<a href="<?php //echo site_url('dm/operator/delete/'.$c->id)?>" class="btn btn-danger">Delete</a>-->
													<!--<a href="<?php //echo site_url('dm/operator/edit/'.$c->id)?>" class="btn btn-info">Edit</a>-->																										<div class='btn-group'>														<button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>														<ul class='dropdown-menu pull-right' role='menu'>															<li><a href='<?php echo site_url('dm/operator/edit/'.$c->id)?>' >Edit</a></li>															<li><a href='#' class="delete" data-id = "<?php echo $c->id;?>">Delete</a></li>														</ul>													</div>
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
    <!-- end of page level js -->		<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('dm/operator/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>