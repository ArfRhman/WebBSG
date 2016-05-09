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
            Add Detail Sales Order
          </h3>
          <span class="pull-right">
            <i class="glyphicon glyphicon-chevron-up clickable"></i>
          </span>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/save_detail/'.$this->uri->segment(4));?>" method="post">
            <fieldset>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Item ID</label>
                <div class="col-md-3">
                 <select name="item" class="form-control" id="itemID">
                  <option value=""> -- Pilih Item ID --</option>
                  <?php
                  $sql = $this->mddata->getAllDataTbl('tbl_dm_item');
                  foreach($sql->result() as $s)
                  {
                    ?>
                    <option value="<?php echo $s->id; ?>"><?php echo $s->id ?> - <?php echo $s->nama ?></option>
                    <?php
                  }
                  ?>
                </select> </div>																						<label class="col-md-2 control-label" for="email">Item Name</label>											<div class="col-md-3">                                                <input id="itemName" name="item_name" placeholder="Item Name" class="form-control" type="text" readonly></div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="email">Brand</label>
                <div class="col-md-3">
                  <input id="brand" name="brand" placeholder="Brand" class="form-control" type="text" readonly></div>																						<label class="col-md-2 control-label" for="email">MoU</label>                                            <div class="col-md-3">                                                <input id="mou" name="mou" placeholder="MoU" class="form-control" type="text" readonly></div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="email">Qty</label>
                  <div class="col-md-3">
                    <input id="email" name="qty" placeholder="Qty" class="form-control" type="text"></div>																						<label class="col-md-2 control-label" for="email">Unit Price</label>                                            <div class="col-md-3">                                                <input id="unit_price" name="price" placeholder="Unit Price" class="form-control" type="text" readonly></div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label" for="email">Disc</label>
                    <div class="col-md-3">
                      <input id="email" name="disc" placeholder="Disc" class="form-control" type="text"></div>					
                      
                      <label class="col-md-2 control-label" for="email">Delivery Cost</label>                                            <div class="col-md-3">                                                <input id="email" name="delivery" placeholder="Delivery Cost" class="form-control" type="text"></div>
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
   $("#itemID").change(function(){
    if($("#itemID").val()!=""){
      $.ajax({
        type:'POST',
        url: "<?php echo site_url('dm/item/get_item') ?>",
        data: "id=" + $("#itemID").val(),
        success: function(data){
         var obj = JSON.parse(data);
         $('#itemName').val(obj.nama);
       }
     }); 
    }else{
      $('#itemName').val('');
    } 

    if($("#itemID").val()!=""){
      $.ajax({
        type:'POST',
        url: "<?php echo site_url('op/price/getItemPrice') ?>",
        data: "id=" + $("#itemID").val(),
        success: function(data){
         var obj = JSON.parse(data);
         $('#mou').val(obj.mou);
         $('#brand').val(obj.brand);
         $('#unit_price').val(obj.DDP_IDR);
       }
     }); 
    }else{
      $('#mou').val('');
      $('#brand').val('');
      $('#unit_price').val('');
    } 
  });
 });		</script>
</body>
</html>