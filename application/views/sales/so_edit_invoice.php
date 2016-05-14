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
                                    Edit Invoicing & Collection Information
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/update_invoice/'.$this->uri->segment(4));?>" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Invoice No</label>
                                            <div class="col-md-3">
                                                <input id="name" name="no" placeholder="Invoice No" class="form-control" type="text" value="<?php echo $so->row()->no; ?>"></div>																						<label class="col-md-2 control-label" for="email">Invoice Date</label>											<div class="col-md-3">                                                <input id="name" name="date" placeholder="Invoice Date" class="form-control datepicker" type="text" value="<?php echo $so->row()->date; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Invoice Amount</label>
                                            <div class="col-md-3">
                                                <input id="email" name="amount" placeholder="Invoice Amount" class="form-control" type="text" value="<?php echo $so->row()->amount; ?>"></div>																						<label class="col-md-2 control-label" for="email">Invoice Desc</label>                                            <div class="col-md-3">                                                <input id="email" name="desc" placeholder="Invoice Desc" class="form-control" type="text" value="<?php echo $so->row()->desc; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Due Date</label>
                                            <div class="col-md-3">
                                                <input id="email" name="due" placeholder="Due Date" class="form-control datepicker" type="text" value="<?php echo $so->row()->due; ?>"></div>
												<label class="col-md-2 control-label" for="email">Send Date</label>
												<div class="col-md-3">
												<input id="email" name="sent" placeholder="Sent Date" class="form-control datepicker" type="text" value="<?php echo $so->row()->sent; ?>"></div>
												</div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Sent By</label>
                                            <div class="col-md-3">
                                               <!--  <input id="email" name="sent_by" placeholder="Sent By" class="form-control" type="text" value="<?php echo $so->row()->sent_by; ?>"> -->
                                                <input type="text" class="form-control" name="sent_by" placeholder="Sent By" list="divisionList">
                                                <datalist id="divisionList"  value="<?php echo $so->row()->sent_by; ?>">

                                                    <?php
                                                    $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                                                    foreach($sql->result() as $s)
                                                    {
                                                      ?>
                                                      <option value="<?php echo $s->name; ?>"></option>
                                                      <?php
                                                  }
                                                  ?>


                                              </datalist>
                                              </div>																						<label class="col-md-2 control-label" for="email">Received By</label>                                            <div class="col-md-3">                                                <input id="email" name="received_by" placeholder="Received By" class="form-control" type="text" value="<?php echo $so->row()->received_by; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Received Date</label>
                                            <div class="col-md-3">
                                                <input id="email" name="received_date" placeholder="Received Date" class="form-control datepicker" type="text" value="<?php echo $so->row()->received_date; ?>"></div>																						<label class="col-md-2 control-label" for="email">Receipt No</label>                                            <div class="col-md-3">                                                <input id="email" name="receipt_no" placeholder="Receipt No" class="form-control" type="text" value="<?php echo $so->row()->receipt_no; ?>"></div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Receipt File</label>
                                            <div class="col-md-3">
                                                <input name="file" type="file"><span style="color:red;">*leave blank if wont change</span>
                                                       <input name="old_file" type="hidden" value="<?php echo $so->row()->receipt_file; ?>"></div>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>	    <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
    <!-- end of page level js -->		<script>		$(document).ready(function(){			$('.datepicker').datepicker({				format:'dd M yyyy'			});		});		</script>
</body>
</html>