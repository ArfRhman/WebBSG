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
                    Add Cost & Commitment Information
                </h3>
                <span class="pull-right">
                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/save_cost/'.$this->uri->segment(4));?>" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">%Salescom Proposed</label>
                            <div class="col-md-3">
                                <input id="Psalescom" name="sales_com" placeholder="%Salescom Proposed" class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div>																						<label class="col-md-2 control-label" for="email">Salescom Proposed</label>											<div class="col-md-3">                                                <input id="salescom" name="sales" placeholder="Salescom Proposed" class="form-control" type="text" readonly></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="email">%Bank Interest</label>
                                <div class="col-md-3">
                                    <input id="Pbankint" name="bank_interest" placeholder="%Bank Interest" class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div>																						<label class="col-md-2 control-label" for="email">Bank Interest</label>                                            <div class="col-md-3">                                                <input id="bankint" name="bank" placeholder="Bank Interest" class="form-control" type="text" readonly></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Transport Cost</label>
                                    <div class="col-md-3">
                                        <input id="email" name="transport" placeholder="Transport Cost" class="form-control" type="text"></div>
                                        <label class="col-md-2 control-label" for="email">Adm Cost</label>
                                        <div class="col-md-3">
                                            <input id="email" name="adm" placeholder="Adm Cost" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Other Cost</label>
                                            <div class="col-md-3">
                                                <input id="email" name="other" placeholder="Other Cost" class="form-control" type="text"></div>
                                                <label class="col-md-2 control-label" for="email">%Extcom Proposed</label>
                                                <div class="col-md-3">
                                                    <input id="Pextcom" name="extcom" placeholder="%Extcom Proposed" class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="email">Extcom Proposed</label>
                                                    <div class="col-md-3">
                                                        <input id="extcom" name="extcom_pro" placeholder="Extcom Proposed" class="form-control" type="text" readonly></div>
                                                        <label class="col-md-2 control-label" for="email">Income Tax</label>
                                                        <div class="col-md-3">
                                                            <input id="incomeTax" name="income" placeholder="Income Tax" class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="email">Nett Extcom</label>
                                                            <div class="col-md-3">
                                                                <input id="nettExt" name="nett" placeholder="Nett Extcom" class="form-control" type="text" readonly></div>
                                                                <label class="col-md-2 control-label" for="email">Extcom Receiver</label>
                                                                <div class="col-md-3">
                                                                    <input id="email" name="receiver" placeholder="Extcom Receiver" class="form-control" type="text"></div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label" for="email">Nett ExtCom Approved</label>
                                                                    <div class="col-md-3">
                                                                        <input id="email" name="approved" placeholder="Nett Extcom Approved" class="form-control" type="text"></div>
                                                                        <label class="col-md-2 control-label" for="email">Extcom Payment Date</label>
                                                                        <div class="col-md-3">
                                                                            <input id="email" name="payment_date" placeholder="Extcom Payment Date" class="form-control datepicker" type="text"></div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-2 control-label" for="email">Extcom Payment Through</label>
                                                                            <div class="col-md-3">
                                                                                <input id="email" name="through" placeholder="Extcom Paymoent Through" class="form-control" type="text">
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
                                    <!-- end of page level js -->		<script>		$(document).ready(function(){			$('.datepicker').datepicker({				format:'dd M yyyy'			});		
                                        $('#Psalescom').keyup(function(){
                                         if($("#Psalescom").val()!=""){
                                          $.ajax({
                                            type:'POST',
                                            url: "<?php echo site_url('sales/so/getPsalescom') ?>",
                                            data: "id=" + $("#Psalescom").val() +"&id_so="+ <?php echo $this->uri->segment(4) ?> ,
                                            success: function(data){
                                               $('#salescom').val(data);
                                           }
                                       }); 

                                      }else{
                                        $('#salescom').val('');
                                    } 
                                });

                                        $('#Pbankint').keyup(function(){
                                         if($("#Pbankint").val()!=""){
                                          $.ajax({
                                            type:'POST',
                                            url: "<?php echo site_url('sales/so/getPsalescom') ?>",
                                            data: "id=" + $("#Pbankint").val() +"&id_so="+ <?php echo $this->uri->segment(4) ?> ,
                                            success: function(data){
                                               $('#bankint').val(data);
                                           }
                                       }); 

                                      }else{
                                        $('#bankint').val('');
                                    } 
                                });

                                        $('#Pextcom').keyup(function(){
                                         if($("#Pextcom").val()!=""){
                                          $.ajax({
                                            type:'POST',
                                            url: "<?php echo site_url('sales/so/getPsalescom') ?>",
                                            data: "id=" + $("#Pextcom").val() +"&id_so="+ <?php echo $this->uri->segment(4) ?> ,
                                            success: function(data){
                                               $('#extcom').val(data);
                                           }
                                       }); 

                                      }else{
                                        $('#extcom').val('');
                                    } 
                                });
                                        
                                        $('#incomeTax').keyup(function(){
                                         if($("#incomeTax").val()!=""){
                                            var ext = 0;
                                            if($('#extcom').val()!=''){
                                                ext = $('#extcom').val();
                                            }
                                          $.ajax({
                                            type:'POST',
                                            url: "<?php echo site_url('sales/so/setNett') ?>",
                                            data: "in=" + $("#incomeTax").val() +"&ext="+ ext ,
                                            success: function(data){
                                               $('#nettExt').val(data);
                                           }
                                       }); 

                                      }else{
                                        $('#nettExt').val('');
                                    } 
                                });

                                    });		</script>
                                </body>
                                </html>