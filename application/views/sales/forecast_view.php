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
              Forecast vs Sales - Detail
            </div>
          </div>
        </div>
        <div class="panel-body">
          
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
             <?php
             
    $no = 1;
    if(count($in)>0){
      foreach($in->result() as $c)
      {
        $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','id',$c->a_m)->row();
        $cust = $this->mddata->getDataFromTblWhere('tbl_dm_customer','id',$c->customer)->row();
        $opr = $this->mddata->getDataFromTblWhere('tbl_dm_operator','id',$c->operator)->row();
        $so = $this->mddata->getDataMultiWhere('tbl_sale_so',array('customer_id'=>$cust->customer_id,'operator'=>$c->operator))->row();
        $inv = $this->mddata->getDataFromTblWhere('tbl_sale_so_invoicing','id_so',isset($so->id)?$so->id:'')->row();
        $id = isset($so->id)?$so->id:'';
        $so_d = $this->db->query('SELECT SUM(grand_total) as total from tbl_sale_so_detail WHERE id_so="'.$id.'"')->row();
        ?>
        <tr>
          <td><?php echo $no; $no++;?></td>
          <td><?php echo $opr->name?></td>
          <td><?php echo $cust->name?></td>
          <td><?php echo $am->name?></td>
          <td><?php echo isset($so->so_no)?$so->so_no:''?></td>
          <td><?php echo isset($so->so_date)?$so->so_date:''?></td>
          <td><?php echo isset($inv->no)?$inv->no:''?></td>
          <td><?php echo isset($so_d->total)?$so_d->total:''?></td>

        </tr>
        <?php
      }
    }else
    {
      echo"<tr><td colspan=8>Tidak Ada Data</td></tr>";
    }
             ?>
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