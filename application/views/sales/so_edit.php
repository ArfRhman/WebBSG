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
                        Edit Sales Order
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/update/'.$this->uri->segment(4));?>" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">Sales Order No</label>
                                <div class="col-md-3">
                                    <input id="name" name="so_no" placeholder="Sales Order No" value="<?php echo $so->row()->so_no; ?>" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Sales Order Date</label>											<div class="col-md-3">                                                <input id="name" name="so_date" value="<?php echo $so->row()->so_date; ?>"  placeholder="Sales Order Date" class="form-control datepicker" type="text"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">PO No</label>
                                    <div class="col-md-3">
                                        <input id="email" name="po_no" placeholder="PO NO" value="<?php echo $so->row()->po_no; ?>"  class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">PO Date</label>                                            <div class="col-md-3">                                                <input id="email" name="po_date" value="<?php echo $so->row()->po_date; ?>"  placeholder="PO Date" class="form-control datepicker" type="text"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="email">Customer ID</label>
                                        <div class="col-md-3">
                                         <select name="customer_id" class="form-control" id="custID">
                                             <?php
                                             $sql = $this->mddata->getAllDataTbl('tbl_dm_customer');
                                             foreach($sql->result() as $s)
                                             {
                                                if($s->customer_id==$so->row()->customer_id){ ?>
                                                <option value="<?php echo $s->customer_id; ?>" selected><?php echo $s->customer_id.' - '.$s->name ?></option>
                                                <?php }else{ ?>
                                                <option value="<?php echo $s->customer_id; ?>"><?php echo $s->customer_id.' - '.$s->name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select> 
                                </div>																						<label class="col-md-2 control-label" for="email">Customer Name</label>                                            <div class="col-md-3">
                                <input id="custName" name="customer_name" placeholder="Address" class="form-control" type="text" value="<?php echo $so->row()->customer_name ?>" readonly>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="email">Address</label>
                            <div class="col-md-3">
                                <input id="custAddr" name="address" placeholder="address" value="<?php echo $so->row()->address; ?>"  class="form-control" type="text" readonly></div>																						<label class="col-md-2 control-label" for="email">Phone</label>                                            <div class="col-md-3">                                                <input id="custPhone" value="<?php echo $so->row()->phone; ?>"  name="phone" placeholder="Phone" class="form-control" type="text" readonly></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="email">Fax</label>
                                <div class="col-md-3">
                                    <input id="custFax" name="fax" value="<?php echo $so->row()->fax; ?>"  placeholder="Fax" class="form-control" type="text" readonly></div>																						<label class="col-md-2 control-label" for="email">Account Manager</label>                                            <div class="col-md-3">                                               <select name="am" class="form-control">
                                    <?php
                                    $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                                    foreach($sql->result() as $s)
                                    {
                                        if($s->id == $so->row()->am){
                                            ?>
                                            <option value="<?php echo $s->id; ?>" selected><?php echo $s->name ?></option>
                                            <?php }else{?>
                                            <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                                            <?php }
                                        }
                                        ?>
                                    </select></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Division</label>
                                    <div class="col-md-3">
                                       
                                         <input type="text" class="form-control" placeholder="Division" value="<?php echo $so->row()->division; ?>" name="division" list="divisionList">
                                          <datalist id="divisionList">
                                                 <option value="WLN">
                                                  <option value="WLS">
                                                  <option value="PINS">
                                                  <option value="CORP">
                                                  <option value="PRODEV">
                                                  <option value="OTHER">
                                                  </datalist></div>																						<label class="col-md-2 control-label" for="email">Operator</label>                                            <div class="col-md-3">                                                <select name="operator" class="form-control">
                                        <?php
                                        $sql = $this->mddata->getAllDataTbl('tbl_dm_operator');
                                        foreach($sql->result() as $s)
                                        {
                                            if($s->id == $so->row()->operator){
                                                ?>
                                                <option value="<?php echo $s->id; ?>" selected><?php echo $s->name ?></option>
                                                <?php }else{?>
                                                <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="email">Project Name</label>
                                        <div class="col-md-3">
                                            <input id="email" name="pn" placeholder="Project Name" value="<?php echo $so->row()->pn; ?>"  class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Description</label>                                            <div class="col-md-3">                                                <input id="email" value="<?php echo $so->row()->description; ?>"  name="description" placeholder="Description" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="email">Payment Term</label>
                                            <div class="col-md-3">
                                                <input id="email" name="payment_term" placeholder="Payment Term" value="<?php echo $so->row()->payment_term; ?>"  class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Delivery Term</label>                                            <div class="col-md-3">                                                <input id="email" value="<?php echo $so->row()->delivery_term; ?>" name="delivery_term" placeholder="Delivery Term" class="form-control" type="text"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="email">Delivery Cost Term</label>
                                                <div class="col-md-3">
                                                    <input id="email" name="delivery_cost_term" value="<?php echo $so->row()->delivery_cost_term; ?>"  placeholder="Delivery Cost Term" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Other Term</label>                                            <div class="col-md-3">                                                <input id="email" name="other_term" value="<?php echo $so->row()->other_term; ?>" placeholder="Delivery Term" class="form-control" type="text"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="email">Order Status</label>
                                                    <div class="col-md-3">
                                                        <input id="email" name="other_status" value="<?php echo $so->row()->other_status; ?>"  placeholder="Order Status" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Softcopy</label>                                            <div class="col-md-3">                                              <input name="softcopy" type="file"><span style="color:red;">*leave blank if wont change</span></div>
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
                     $("#custID").change(function(){
                      if($("#custID").val()!=""){
                          $.ajax({
                            type:'POST',
                            url: "<?php echo site_url('dm/customer/getDataCustomer') ?>",
                            data: "id=" + $("#custID").val(),
                            success: function(data){
                               var obj = JSON.parse(data);
                               $('#custName').val(obj.name);
                               $('#custAddr').val(obj.address);
                               $('#custPhone').val(obj.phone);
                               $('#custFax').val(obj.fax);
                           }
                       }); 

                      }else{
                        $('#custName').val('');
                        $('#custAddr').val('');
                        $('#custPhone').val('');
                        $('#custFax').val('');
                    } 
                });
                });		</script>
            </body>
            </html>