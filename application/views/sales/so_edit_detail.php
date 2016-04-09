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
                        Edit Detail Sales Order
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/so/update_detail/'.$this->uri->segment(4));?>" method="post">
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
                                        if($s->id == $so->row()->item){ ?>
                                        <option value="<?php echo $s->id; ?>" selected><?php echo $s->id ?> - <?php echo $s->nama ?></option>
                                        <?php } else { ?>
                                        <option value="<?php echo $s->id; ?>"><?php echo $s->id ?> - <?php echo $s->nama ?></option>
                                        <?php }
                                    }
                                    ?>
                                </select>
                               </div>																						<label class="col-md-2 control-label" for="email">Item Name</label>											<div class="col-md-3">                                                <input id="itemName" name="item_name" placeholder="Item Name" class="form-control" type="text" value="<?php echo $so->row()->item_name; ?>" readonly></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="email">Brand</label>
                                <div class="col-md-3">
                                    <input id="email" name="brand" placeholder="Brand" class="form-control" type="text" value="<?php echo $so->row()->brand; ?>"></div>																						<label class="col-md-2 control-label" for="email">MoU</label>                                            <div class="col-md-3">                                                <input id="email" name="mou" placeholder="MoU" class="form-control" type="text" value="<?php echo $so->row()->mou; ?>"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Qty</label>
                                    <div class="col-md-3">
                                        <input id="email" name="qty" placeholder="Qty" class="form-control" type="text" value="<?php echo $so->row()->qty; ?>"></div>																						<label class="col-md-2 control-label" for="email">Unit Price</label>                                            <div class="col-md-3">                                                <input id="email" name="price" placeholder="Unit Price" class="form-control" type="text" value="<?php echo $so->row()->price; ?>"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="email">Disc</label>
                                        <div class="col-md-3">
                                            <input id="email" name="disc" placeholder="disc" class="form-control" type="text" value="<?php echo $so->row()->disc; ?>"></div>																						<label class="col-md-2 control-label" for="email">Nett Unit Price</label>                                            <div class="col-md-3">                                                <input id="email" name="nett" placeholder="Nett Unit Price" class="form-control" type="text" value="<?php echo $so->row()->nett; ?>"></div>
                                        </div>

                                        <div class="form-group">
                                          <label class="col-md-2 control-label" for="email">Delivery Cost</label>                                            <div class="col-md-3">                                                <input id="email" name="delivery" placeholder="Delivery Cost" class="form-control" type="text" value="<?php echo $so->row()->delivery; ?>"></div>
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
$.get( "<?php echo site_url('dm/item/get_item') ?>", { id: $("#itemID").val(), } )
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
  });
  });		</script>
</body>
</html>