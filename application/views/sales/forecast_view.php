	<aside class="right-side">
   <!-- Main content -->
   <section class="content-header">
    <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-primary filterable">
          <div class="panel-heading clearfix  ">
            <div class="panel-title pull-left">
             <div class="caption">
              <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
              Forecast vs Sales: (1) Year to date
            </div>
          </div>
        </div>
        <div class="panel-body">
          <form method="POST"  class="form-horizontal" >
            <fieldset>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Operator</label>
                <div class="col-md-3">
                  <select name="los_customer_support" class="form-control" id="operator"><option>--Pilih--</option>
                    <?php
                    $sql = $this->mddata->getAllDataTbl('tbl_dm_operator');
                    foreach($sql->result() as $s)
                    {
                      ?>
                      <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>                                                                                      
                <label class="col-md-2 control-label" for="email">Order Amount</label>   
                <div class="col-md-3" id="order">                                              

                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Customer</label>
                <div class="col-md-3">
                  <select name="los_customer_support" class="form-control" id="cust"><option>--Pilih--</option>

                  </select>
                </div>                                                                                      
                <label class="col-md-2 control-label" for="email">% (percentage)</label>   
                <div class="col-md-3" id="percentage">                                              
                  -
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Forcast Amount</label>
                <div class="col-md-3" id="forecast">
                  -
                </div>                                                                                      
               
              </div>
            </fieldset>
          </form>
          <table class="table table-striped table-responsive">
            <thead>
              <tr>
                <th>No</th>
                <th>Operator</th>
                <th>Customer</th>
                <th>A/M</th>
                <th>SO No</th>
                <th>SO Tgl</th>
                <th>Inv No</th>
                <th>Amount</th>

              </tr>
            </thead>
            <tbody id="data">
             
          </tbody>
        </table>
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
<!-- end of page level js -->		
<script>		
  $(document).ready(function(){
   $("#operator").change(function(){
     $('#forecast').html('-');
       $('#order').html('-');
       $('#percentage').html('-');
    $.ajax({
      type:'POST',
      url: "<?php echo site_url('sales/forecast/getCustomer') ?>",
      data: "id=" + $("#operator").val(),
      success: function(data){
        $('#cust').html(data);
      }
    }); 
    $.ajax({
      type:'POST',
      url: "<?php echo site_url('sales/forecast/getOtherData') ?>",
      data: "id=" + $("#operator").val(),
      success: function(data){
       var obj = JSON.parse(data);
       $('#forecast').html(obj.forecast);
       $('#order').html(obj.order);
       $('#percentage').html(obj.percentage);
     }
   }); 
    $.ajax({
      type:'POST',
      url: "<?php echo site_url('sales/forecast/getDataForecast') ?>",
      data: "id=" + $("#operator").val(),
      success: function(data){
       $('#data').html(data);
     }
   }); 

  });
 });
</script>

</body>
</html>