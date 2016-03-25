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
                                    Forwarder / Transporter Legal
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('dm/forwarder/update_legal/'.$this->uri->segment(4));?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Akta Pendirian</label>
                                            <div class="col-md-2">
                                                <input id="email" name="pendirian_no" value="<?php echo $legal->row()->pendirian_no; ?>" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pendirian_date" value="<?php echo $legal->row()->pendirian_date; ?>" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pendirian_notary" value="<?php echo $legal->row()->pendirian_notary; ?>" placeholder="Notary" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <?php if($legal->row()->pendirian != ""){echo anchor(base_url($legal->row()->pendirian), "See Picture");}else{echo "there're no picture";}?>
												<input id="email" name="pendirian" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SK Menkeh</label>
                                            <div class="col-md-2">
                                                <input id="email" name="menkeh_no" value="<?php echo $legal->row()->menkeh_no; ?>" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="menkeh_date" value="<?php echo $legal->row()->menkeh_date; ?>" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <?php if($legal->row()->menkeh != ""){echo anchor(base_url($legal->row()->menkeh), "See Picture");}else{echo "there're no picture";}?>
												<input id="email" name="menkeh" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Akte Perubahan Terakhir </label>
                                            <div class="col-md-2">
                                                <input id="email" name="perubahan_no" value="<?php echo $legal->row()->perubahan_no; ?>" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="perubahan_date" value="<?php echo $legal->row()->perubahan_date; ?>" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="perubahan_notary" value="<?php echo $legal->row()->perubahan_notary; ?>" placeholder="Notary" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->perubahan != ""){echo anchor(base_url($legal->row()->perubahan), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="perubahan" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SK Menkeh Perubahan</label>
                                            <div class="col-md-2">
                                                <input id="email" name="menkeh_perubahan_no" value="<?php echo $legal->row()->menkeh_perubahan_no; ?>" placeholder="No" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="menkeh_perubahan_date" value="<?php echo $legal->row()->menkeh_perubahan_date; ?>" placeholder="Date" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->menkeh_perubahan != ""){echo anchor(base_url($legal->row()->menkeh_perubahan), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="menkeh_perubahan" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">TDP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="tdp_no" placeholder="No" value="<?php echo $legal->row()->tdp_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="tdp_date" placeholder="Date" value="<?php echo $legal->row()->tdp_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="tdp_expire" placeholder="Expire" value="<?php echo $legal->row()->tdp_expire; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->tdp != ""){echo anchor(base_url($legal->row()->tdp), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="tdp" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SIUP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="siup_no" placeholder="No" value="<?php echo $legal->row()->siup_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siup_date" placeholder="Date" value="<?php echo $legal->row()->siup_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siup_expire" placeholder="Expire" value="<?php echo $legal->row()->siup_expire; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->siup != ""){echo anchor(base_url($legal->row()->siup), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="siup" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">SIUJT</label>
                                            <div class="col-md-2">
                                                <input id="email" name="siujt_no" placeholder="No" value="<?php echo $legal->row()->siujt_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siujt_date" placeholder="Date" value="<?php echo $legal->row()->siujt_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="siujt_expire" placeholder="Expire" value="<?php echo $legal->row()->siujt_expire; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->siujt != ""){echo anchor(base_url($legal->row()->siujt), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="siujt" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">NPWP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="npwp_no" placeholder="No" value="<?php echo $legal->row()->npwp_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="npwp_date" placeholder="Date" value="<?php echo $legal->row()->npwp_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->npwp != ""){echo anchor(base_url($legal->row()->npwp), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="npwp" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">PKP</label>
                                            <div class="col-md-2">
                                                <input id="email" name="pkp_no" placeholder="No" value="<?php echo $legal->row()->pkp_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pkp_date" placeholder="Date" value="<?php echo $legal->row()->pkp_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->pkp != ""){echo anchor(base_url($legal->row()->pkp), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="pkp" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Domisili</label>
                                            <div class="col-md-2">
                                                <input id="email" name="domisili_no" placeholder="No" value="<?php echo $legal->row()->domisili_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="domisili_date" placeholder="Date" value="<?php echo $legal->row()->domisili_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="domisili_expire" placeholder="Expire" value="<?php echo $legal->row()->domisili_expire; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->domisili != ""){echo anchor(base_url($legal->row()->domisili), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="domisili" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Lisensi Khusus 1</label>
                                            <div class="col-md-2">
                                                <input id="email" name="lisensi1_no" placeholder="No" value="<?php echo $legal->row()->lisensi1_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi1_date" placeholder="Date" value="<?php echo $legal->row()->lisensi1_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi1_expire" placeholder="Expire" class="form-control" value="<?php echo $legal->row()->lisensi1_expire; ?>" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi1_name" placeholder="Name" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->lisensi1 != ""){echo anchor(base_url($legal->row()->lisensi1), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="lisensi1" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Lisensi Khusus 2</label>
                                            <div class="col-md-2">
                                                <input id="email" name="lisensi2_no" placeholder="No" value="<?php echo $legal->row()->lisensi2_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi2_date" placeholder="Date"  value="<?php echo $legal->row()->lisensi2_date; ?>"class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi2_expire" placeholder="Expire" value="<?php echo $legal->row()->lisensi2_expire; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="lisensi2_name" placeholder="Name" value="<?php echo $legal->row()->lisensi2_name; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->lisensi2 != ""){echo anchor(base_url($legal->row()->lisensi2), "See Picture");}else{echo "there're no picture";}?>
                                                <input id="email" name="lisensi2" type="file">
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">PKS</label>
                                            <div class="col-md-2">
                                                <input id="email" name="pks_no" placeholder="No" value="<?php echo $legal->row()->pks_no; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pks_date" placeholder="Date" value="<?php echo $legal->row()->pks_date; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
                                                <input id="email" name="pks_expire" placeholder="Expire" value="<?php echo $legal->row()->pks_expire; ?>" class="form-control" type="text">
											</div>
											<div class="col-md-2">
												<?php if($legal->row()->pks != ""){echo anchor(base_url($legal->row()->pks), "See Picture");}else{echo "there're no picture";}?>
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