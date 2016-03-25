	<aside class="right-side">
	<!-- Main content -->
    <section class="content-header">
		<h1>Welcome to Dashboard</h1>
    </section>
    <section class="content">
				<div class="row">
                    <div class="col-lg-12">
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
                                    Add Forwarder Legal
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('dm/forwarder/save_legal/'.$this->uri->segment(4));?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Akta Pendirian</label>
                                            <div class="col-md-2">
                                                <input id="email" name="pendirian_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pendirian_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pendirian_notary" placeholder="Notary" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pendirian" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SK Menkeh</label>
                                            <div class="col-md-2">
                                                <input id="email" name="menkeh_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="menkeh_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="menkeh" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Akte Perubahan Terakhir </label>
                                            <div class="col-md-2">
                                                <input id="email" name="perubahan_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="perubahan_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="perubahan_notary" placeholder="Notary" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="perubahan" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SK Menkeh Perubahan</label>
                                            <div class="col-md-2">
                                                <input id="email" name="menkeh_perubahan_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="menkeh_perubahan_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="menkeh_perubahan" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">TDP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="tdp_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="tdp_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="tdp_expire" placeholder="Expire" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="tdp" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SIUP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="siup_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siup_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siup_expire" placeholder="Expire" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siup" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SIUJT</label>
                                            <div class="col-md-2">
                                                <input id="email" name="siujt_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siujt_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siujt_expire" placeholder="Expire" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siujt" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">NPWP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="npwp_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="npwp_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="npwp" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">PKP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="pkp_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pkp_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pkp" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Domisili</label>
                                            <div class="col-md-2">
                                                <input id="email" name="domisili_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="domisili_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="domisili_expire" placeholder="Expire" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="domisili" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Lisensi Khusus 1</label>
                                            <div class="col-md-2">
                                                <input id="email" name="lisensi1_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi1_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi1_expire" placeholder="Expire" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi1_name" placeholder="Name" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi1" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Lisensi Khusus 2</label>
                                            <div class="col-md-2">
                                                <input id="email" name="lisensi2_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi2_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi2_expire" placeholder="Expire" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi2_name" placeholder="Name" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi2" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">PKS</label>
                                            <div class="col-md-2">
                                                <input id="email" name="pks_no" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pks_date" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pks_expire" placeholder="Expire" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pks" type="file">
											</div>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
    <!-- end of page level js -->
</body>
</html>