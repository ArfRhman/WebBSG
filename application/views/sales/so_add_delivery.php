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
            Add Delivery Information
          </h3>
          <span class="pull-right">
            <i class="glyphicon glyphicon-chevron-up clickable"></i>
          </span>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/save_delivery/'.$this->uri->segment(4));?>" method="post">
            <fieldset>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Do No</label>
                <div class="col-md-3">
                  <input id="name" name="do_no" placeholder="Do No" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Do Date</label>											<div class="col-md-3">                                                <input id="name" name="do_date" placeholder=" Do Date" class="form-control datepicker" type="text"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="email">Delivery Date</label>
                  <div class="col-md-3">
                    <input id="email" name="delivery" placeholder=" Delivery Date" class="form-control datepicker" type="text"></div>																						<label class="col-md-2 control-label" for="email">Delivery By</label>                                            <div class="col-md-3">                                                <select name="delivery_by" class="form-control">
                    <option>Own Transportation</option>
                    <option>Pick up</option>
                    <option>Expediture</option>
                  </select>    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="email">Expediture Name</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Expediture Name" name="name" list="divisionList">
                    <datalist id="divisionList">
                     <?php
                     $sql = $this->mddata->getAllDataTbl('tbl_dm_forwarder');
                     foreach($sql->result() as $s)
                     {
                      ?>
                      <option value="<?php echo $s->forwarder_id; ?>"></option>
                      <?php
                    }
                    ?>
                  </datalist>
                </div>
                <label class="col-md-2 control-label" for="email">Delivery Method</label>
                <div class="col-md-3">
                  <select name="method" class="form-control">
                    <option value="Land">Land</option>
                    <option value="Charter">Charter</option>
                    <option value="Air">Air</option>
                    <option value="Train">Train</option>
                    <option value="Sea">Sea</option>
                  </select>                                               
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="email">Awb/Receipt No</label>
                <div class="col-md-3">
                  <input id="email" name="awb_no" placeholder="Awb/Receipt No" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Depart Date</label>                                            <div class="col-md-3">                                                <input id="email" name="depart" placeholder="Depart Date" class="form-control datepicker" type="text"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="email">Received Date</label>
                  <div class="col-md-3">
                    <input id="email" name="received" placeholder="Received Date" class="form-control datepicker" type="text"></div>																						<label class="col-md-2 control-label" for="email">Received By</label>                                            <div class="col-md-3">                                                <input id="email" name="received_by" placeholder="Received By" class="form-control " type="text"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="email">Nett Delivery Cost</label>
                    <div class="col-md-3">
                      <input id="email" name="nett" placeholder="Nett Delivery Cost" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">AWB/Received</label>                                            <div class="col-md-3">                                                <input name="awb_file" type="file"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="email">Debit Note Amount</label>
                      <div class="col-md-3">
                        <input id="email" name="debit_note" placeholder="Debit Note Amount" class="form-control" type="text">
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
  <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>	    <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
  <!-- end of page level js -->		<script>		$(document).ready(function(){			$('.datepicker').datepicker({				format:'dd M yyyy'			});		});		</script>
</body>
</html>