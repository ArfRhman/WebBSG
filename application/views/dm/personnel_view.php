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
							<a href="<?php echo site_url('dm/personnel/add')?>" class="btn btn-success">Add New Data</a>
						<?php
						}
						?>
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Personnel List
                                </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                    <table class="table table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Personnel ID</th>
                                                <th>Personnel Name</th>
                                                <th>Last Position</th>
                                                <th>Join Date</th>
                                                <th>Join Date in Div</th>
                                                <th>Residence</th>
                                                <th>Home Phone</th>
                                                <th>Mobile 1</th>
                                                <th>Mobile 2</th>
                                                <th>Whatsapp</th>
                                                <th>BBM</th>
                                                <th>Photo</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$no = 1;
											foreach($personnel->result() as $c)
											{
											?>
                                            <tr>
												<td><?php echo $no; $no++; ?></td>
												<td><?php echo $c->id_personnel ?></td>
												<td><?php echo $c->name ?></td>
												<td><?php echo $this->mddata->getDataFromTblWhere('tbl_position', 'id', $c->position)->row()->position; ?></td>
												<td><?php echo $c->join_date ?></td>
												<td><?php echo $c->join_date_div ?></td>
												<td><?php echo $c->residence ?></td>
												<td><?php echo $c->phone ?></td>
												<td><?php echo $c->mobile1 ?></td>
												<td><?php echo $c->mobile2 ?></td>
												<td><?php echo $c->whatsapp ?></td>
												<td><?php echo $c->bbm ?></td>
												<td>
													<?php
														if($c->image != null)
														{
													?>
													<img src="<?php echo base_url($c->image); ?>" width="100px" />
													<?php
														}
													?>
													</td>
												<td>
													<!--<a href="<?php //echo site_url('dm/personnel/delete/'.$c->id)?>" class="btn btn-danger">Delete</a>-->
													<!--<a href="<?php //echo site_url('dm/personnel/edit/'.$c->id)?>" class="btn btn-info">Edit</a>-->																										<div class='btn-group'>														<button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>														<ul class='dropdown-menu pull-right' role='menu'>															<li><a href='<?php echo site_url('dm/personnel/edit/'.$c->id)?>' >Edit</a></li>															<li><a href='#' class="delete" data-id = "<?php echo $c->id;?>">Delete</a></li>														</ul>													</div>
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
    <!-- end of page level js -->		<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('dm/personnel/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>