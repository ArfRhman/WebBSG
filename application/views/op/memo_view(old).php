	<aside class="right-side">
	<!-- Main content -->
    <section class="content-header">
		<h1>Welcome to Dashboard</h1>
    </section>
    <section class="content">
				<div class="row">
                    <div class="col-lg-12">
						<?php
						if($this->mddata->access($this->session->userdata('group'), 'd16')->d16 > 1)
						{
						?>
							<a href="<?php echo site_url('op/memo/add')?>" class="btn btn-success">Add New Data</a>
						<?php
						}
						?>
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Memo List
                                </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                    <table class="table table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Memo ID</th>
                                                <th>No Ref</th>
                                                <th>Kepada</th>
                                                <th>Tembusan</th>
                                                <th>Devisi</th>
                                                <th>Jatuh Tempo</th>
                                                <th>Cara Pembayaran</th>
                                                <th>Diajukan</th>
                                                <th>Diketahui</th>
                                                <th>Diverifikasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$no = 1;
											foreach($memo->result() as $c)
											{
											?>
                                            <tr>
												<td><?php echo $c->memo_id ?></td>
												<td><?php echo $c->ref ?></td>
												<td><?php echo $c->kepada ?></td>
												<td><?php echo $c->tembusan ?></td>
												<td><?php echo $c->devisi ?></td>
												<td><?php echo $c->tempo ?></td>
												<td><?php echo $c->pembayaran ?></td>
												<td><?php echo $c->diajukan ?></td>
												<td><?php echo $c->diketahui ?></td>
												<td><?php echo $c->diverifikasi ?></td>
												<td>
													<a href="<?php echo site_url('op/memo/delete/'.$c->id)?>" class="btn btn-danger">Delete</a>
													<a href="<?php echo site_url('op/memo/edit/'.$c->id)?>" class="btn btn-info">Edit</a>
													<a href="<?php echo site_url('op/memo/view_subfield/'.$c->id)?>" class="btn btn-warning">Subfield</a>
													<a href="<?php echo site_url('op/memo/preview/'.$c->id)?>" class="btn btn-success">Print / Preview</a>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
    <!-- end of page level js -->
</body>
</html>