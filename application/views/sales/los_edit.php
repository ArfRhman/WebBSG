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
                                Edit Letter Of Support
                            </h3>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/los/update');?>" method="post">
                                <input type="hidden" name="no" value="<?=$in->no?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Version of Support</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="los_version">
                                                <option value="English" <?=$in->version_of_support=='English' ? 'selected' : ''?>>English</option>
                                                <option value="Indonesia" <?=$in->version_of_support=='Indonesia' ? 'selected' : ''?>>Indonesia</option>
                                            </select>
                                        </div>                                                                                      
                                        <label class="col-md-2 control-label" for="email">Product Name</label>   
                                        <div class="col-md-3">                                              
                                          <input id="email" value="<?=$in->product_name?>" name="los_product_name" placeholder="Product Name" class="form-control" type="text">                                                                               
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Date</label>
                                    <div class="col-md-3">
                                        <input id="email" value="<?=$in->date?>" name="los_date" placeholder="Date" class="form-control datepicker" type="text"></div>                                                                                      <label class="col-md-2 control-label" for="email">Addressed To</label>                                            <div class="col-md-3">                                                <input id="email" value="<?=$in->addressed_to?>" name="los_address_to" placeholder="Addressed To" class="form-control" type="text"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="email">Costumer To Support</label>
                                        <div class="col-md-3">
                                            <select name="los_customer_support" class="form-control los_customer_support">
                                                <option value="">-- Pilih Customer --</option>
                                                <?php
                                                $sql = $this->mddata->getAllDataTbl('tbl_dm_customer');
                                                foreach($sql->result() as $s)
                                                {
                                                    ?>
                                                    <option value="<?php echo $s->id; ?>" <?=$in->customer_of_support==$s->id ? 'selected' : ''?>><?php echo $s->name ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select> </div>                                                                                      <label class="col-md-2 control-label" for="email">Project Name</label>   
                                            <div class="col-md-3">                                              
                                              <input id="email" value="<?=$in->project_name?>" name="los_project_name" placeholder="Project Name" class="form-control" type="text">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-2 control-label">Costumer Address</label>
                                          <div class="col-md-3">
                                              <input type="text" value="<?=$in->customer_address?>" name="customer_address" class="form-control customer_address" placeholder="Customer Address"/>
                                          </div> 
                                          <label class="col-md-2 control-label">Period of warranty</label>   
                                          <div class="col-md-3">                                              
                                           <input type="text" value="<?=$in->period_of_warranty?>" name="period" class="form-control" placeholder="Period of Warranty"/>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Signer Name</label>
                                    <div class="col-md-3">
                                        <select name="signer_name" class="form-control signer_name">
                                            <option value="">-- Pilih Signer --</option>
                                            <?php
                                            $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                                            foreach($sql->result() as $s)
                                            {
                                                ?>
                                                <option value="<?php echo $s->id; ?>" <?=$s->id==$in->signer_name ? 'selected' : ''?>><?php echo $s->name ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select> 
                                    </div> 
                                    <label class="col-md-2 control-label">Signer Title</label>   
                                    <div class="col-md-3">                                              
                                      <input value="<?=$in->signer_title?>" name="signer_title" placeholder="Signer Title" class="form-control signer_title" type="text" readonly>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-2 control-label">Archive Code</label>   
                                  <div class="col-md-3">                                              
                                      <input value="<?=$in->archive_code?>" name="archive_code" placeholder="Archive Code" class="form-control" type="text">
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
<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>     <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format:'dd M yyyy'
        });

        $(".los_customer_support").change(function(){
          if($(".los_customer_support").val()!=""){
              $.ajax({
                type:'POST',
                url: "<?php echo site_url('dm/customer/getDataField') ?>",
                data: "id=" + $(".los_customer_support").val(),
                success: function(data){
                   var obj = JSON.parse(data);
                   $('.customer_address').val(obj.address);
               }
           }); 
          }
      });

        $(".signer_name").change(function(){
          if($(".signer_name").val()!=""){
              $.ajax({
                type:'POST',
                url: "<?php echo site_url('dm/personnel/get_field') ?>",
                data: "id=" + $(".signer_name").val(),
                success: function(data){
                   var obj = JSON.parse(data);
                   $('.signer_title').val(obj.position);
               }
           }); 
          }
      });
    });

</script>

</body>
</html>