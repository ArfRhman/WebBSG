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
                                    Edit Memo
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/memo/update/'.$this->uri->segment(4));?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Memo ID</label>
                                            <div class="col-md-9">
                                                <input id="name" name="memo_id" value="<?php echo $memo->row()->memo_id; ?>" placeholder="Memo ID" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Ref No</label>
                                            <div class="col-md-9">
                                                <input id="name" name="ref" value="<?php echo $memo->row()->ref; ?>" placeholder="Ref no" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Kepada</label>
											<div class="col-md-9">
                                                <select name="kepada" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_personnel')->result() as $c)
														{
														?>
														<option <?php if($memo->row()->kepada == $c->name) echo "selected"; ?> value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>	
														<?php
														}
													?>
												</select>
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Tembusan</label>
                                            <div class="col-md-9">
                                                <select name="tembusan" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_personnel')->result() as $c)
														{
														?>
														<option <?php if($memo->row()->tembusan == $c->name) echo "selected"; ?> value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>	
														<?php
														}
													?>
												</select>
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Devisi</label>
                                            <div class="col-md-9">
												<select name="devisi" class="form-control">
													<option <?php if($memo->row()->devisi == "1.Wireline") echo "selected"; ?> value="1.Wireline">1.Wireline</option>	
													<option <?php if($memo->row()->devisi == "2.Wireless") echo "selected"; ?> value="2.Wireless">2.Wireless</option>	
													<option <?php if($memo->row()->devisi == "3.Claim") echo "selected"; ?> value="3.Claim">3.Claim</option>	
													<option <?php if($memo->row()->devisi == "4.Operational") echo "selected"; ?> value="4.Operational">4.Operational</option>	
													<option <?php if($memo->row()->devisi == "5.Finance") echo "selected"; ?> value="5.Finance">5.Finance</option>	
													<option <?php if($memo->row()->devisi == "6.HRD") echo "selected"; ?> value="6.HRD">6.HRD</option>	
													<option <?php if($memo->row()->devisi == "7.Retail") echo "selected"; ?> value="7.Retail">7.Retail</option>	
													<option <?php if($memo->row()->devisi == "8.Project") echo "selected"; ?> value="8.Project">8.Project</option>	
													<option <?php if($memo->row()->devisi == "9.Other") echo "selected"; ?> value="9.Other">9.Other</option>	
												</select>   
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Tanggal Jatuh Tempo</label>
                                            <div class="col-md-9">
                                                <input id="email" value="<?php echo $memo->row()->tempo; ?>" name="tempo" placeholder="2016-12-30 yy-mm-dd" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Cara Pembayaran</label>
                                            <div class="col-md-9">
                                                <input id="email" value="<?php echo $memo->row()->pembayaran; ?>" name="pembayaran" placeholder="Cara Pembayaran" class="form-control" type="text"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Diajukan</label>
                                            <div class="col-md-9">
												<select name="diajukan" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_personnel')->result() as $c)
														{
														?>
														<option <?php if($memo->row()->diajukan == $c->name) echo "selected"; ?> value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>	
														<?php
														}
													?>
												</select>   
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Diketahui</label>
                                            <div class="col-md-9">
												<select name="diketahui" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_personnel')->result() as $c)
														{
														?>
														<option <?php if($memo->row()->diketahui == $c->name) echo "selected"; ?> value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>	
														<?php
														}
													?>
												</select>   
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Diverifikasi</label>
                                            <div class="col-md-9">
												<select name="diverifikasi" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_personnel')->result() as $c)
														{
														?>
														<option <?php if($memo->row()->diverifikasi == $c->name) echo "selected"; ?> value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>	
														<?php
														}
													?>
												</select>   
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