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
                                    Edit Forwarder
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="<?php echo site_url('dm/forwarder/update/'.$this->uri->segment(4));?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Forwarder / Transporter ID</label>
                                            <div class="col-md-9">
                                                <input id="name" name="forwarder_id" placeholder="Forwarder / Transporter ID" value="<?php echo $forwarder->row()->forwarder_id; ?>" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Forwarder / Transporter Name</label>
                                            <div class="col-md-9">
                                                <input id="name" name="name" value="<?php echo $forwarder->row()->name; ?>" placeholder="Forwarder / Transporter Name" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Category</label>
                                            <div class="col-md-9">
                                                <select name="category" class="form-control">
													<option <?php if($forwarder->row()->category == "domestic") echo "selected"; ?> value="domestic">domestic</option>
													<option <?php if($forwarder->row()->category == "overseas clearance") echo "selected"; ?> value="overseas clearance">overseas clearance</option>
													<option <?php if($forwarder->row()->category == "shipping line") echo "selected"; ?> value="shipping line">shipping line</option>
												</select>
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Address</label>
                                            <div class="col-md-9">
                                                <input id="email" name="address" placeholder="Address" value="<?php echo $forwarder->row()->address; ?>" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Phone</label>
                                            <div class="col-md-9">
                                                <input id="email" name="phone" placeholder="phone" class="form-control" type="text" value="<?php echo $forwarder->row()->phone; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Fax</label>
                                            <div class="col-md-9">
                                                <input id="email" name="fax" placeholder="Fax" class="form-control" value="<?php echo $forwarder->row()->fax; ?>" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Website</label>
                                            <div class="col-md-9">
                                                <input id="email" name="website" placeholder="Website" class="form-control" type="text" value="<?php echo $forwarder->row()->website; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Email</label>
                                            <div class="col-md-9">
                                                <input id="email" name="email" placeholder="email" class="form-control" type="text" value="<?php echo $forwarder->row()->email; ?>"></div>
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