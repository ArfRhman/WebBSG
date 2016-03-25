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
                                    Edit HS Code
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/hs/update/'.$this->uri->segment(4));?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">HS Code</label>
                                            <div class="col-md-9">
                                                <input id="name" name="code" placeholder="HS Code" class="form-control" type="text" value="<?php echo $hs->row()->code; ?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Description</label>
											<div class="col-md-9">
                                                <input id="name" name="description" placeholder="Description" class="form-control" value="<?php echo $hs->row()->description; ?>" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Uraian</label>
                                            <div class="col-md-9">
                                                <input id="email" name="uraian" placeholder="Uraian" class="form-control" type="text" value="<?php echo $hs->row()->uraian; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Import Duty</label>
                                            <div class="col-md-8">
                                                <input id="email" name="duty" placeholder="Import Duty" class="form-control" type="text" value="<?php echo $hs->row()->duty; ?>"></div>
											<label class="col-md-1 control-label" for="email">%</label>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Lartas</label>
                                            <div class="col-md-9">
                                                <input id="email" name="lartas" placeholder="Lartas" class="form-control" type="text" value="<?php echo $hs->row()->lartas; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Jenis Barang</label>
                                            <div class="col-md-9">
                                                <input value="<?php echo $hs->row()->jenis; ?>" id="email" name="jenis" placeholder="Jenis Barang" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Catatan</label>
                                            <div class="col-md-9">
                                                <input id="email" name="catatan" placeholder="Catatan" value="<?php echo $hs->row()->catatan; ?>" class="form-control" type="text"></div>
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