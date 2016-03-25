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
							<a href="<?php echo site_url('dm/forwarder/add_legal/'.$this->uri->segment(4))?>" class="btn btn-success">Add New Data</a>
						<?php
						}
						?>
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                       <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Forwarder / Transporter Legal List
                                </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                    <thead>
                                        <tr>
                                            <th colspan=3>Akta Pendirian</th>
                                            <th colspan=2>SK Menkeh</th>
                                            <th colspan=3>Akte Perubahan Terakhir</th>
                                            <th colspan=2>SK Menkeh perubahan</th>
                                            <th colspan=3>TDP</th>
                                            <th colspan=3>SIUP</th>
                                            <th colspan=3>SIUJT</th>
                                            <th colspan=2>NPWP</th>
                                            <th colspan=2>PKP</th>
                                            <th colspan=3>Domisili</th>
                                            <th colspan=4>Lisensi Khusus 1</th>
                                            <th colspan=4>Lisensi Khusus 2</th>
                                            <th colspan=3>PKS</th>
                                            <th rowspan=2>Action</th>
                                        </tr>
										<tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Notary</th>
											<th>No</th>
                                            <th>Date</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Notary</th>
											<th>No</th>
                                            <th>Date</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Expire</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Expire</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Expire</th>
											<th>No</th>
                                            <th>Date</th>
											<th>No</th>
                                            <th>Date</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Expire</th>
											<th>Name</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Expire</th>
											<th>Name</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Expire</th>
											<th>No</th>
                                            <th>Date</th>
                                            <th>Expire</th>
                                        </tr>
                                    </thead>
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