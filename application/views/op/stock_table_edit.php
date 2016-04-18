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
                    Edit Stock Transaction - Table
                </h3>
                <span class="pull-right">
                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/stock/table_update');?>" method="post">
                    <input type="hidden" name="no" value="<?=$op->no?>">
                    <div class="form-group">

                        <label class="col-md-2 control-label" for="item_code">Item Code</label>

                        <div class="col-md-3">
                            <select name="item_code" id="item_code" class="form-control">
                                <?php 
                                foreach($this->mddata->getAllDataTbl('tbl_dm_item')->result() as $c)
                                {
                                    ?>
                                    <option value="<?php echo $c->id; ?>" <?=$op->item_code==$c->id ? 'selected' : ''?>><?php echo $c->code; ?> - <?php echo $c->nama; ?></option>    
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <label class="col-md-2 control-label" for="item">Item</label>

                        <div class="col-md-3">

                            <input value="<?=$op->item;?>" id="item" readonly="true" name="item" placeholder="Item" class="form-control" type="text"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="mou">MoU</label>
                            <div class="col-md-3">
                                <input value="<?=$op->mou?>" id="mou" name="mou" placeholder="MoU" class="form-control" type="text"></div>
                                <label class="col-md-2 control-label" for="qty">Qty</label>
                                <div class="col-md-3">
                                    <input value="<?=$op->qty?>" id="qty" name="qty" placeholder="Qty" class="form-control" type="text"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button>
                                    </div>
                                </div>
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

<!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->

<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>

<!-- end of page level js -->

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format:'dd M yyyy'
        });
        $("#item_code").change(function(){
          if($("#item_code").val()!=""){
              $.ajax({
                type:'POST',
                url: "<?php echo site_url('dm/item/get_field') ?>",
                data: "id=" + $("#item_code").val(),
                success: function(data){
                 var obj = JSON.parse(data);
                 $('#item').val(obj.nama);
             }
         }); 

          }else{
            $('#item').val('');
        } 
    });
        
    });
    
</script>
</body>
</html>