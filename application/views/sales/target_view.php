	<aside class="right-side">
   <!-- Main content -->
   <section class="content-header">
    <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <?php
        if($this->mddata->access($this->session->userdata('group'), 'd3')->d3 > 1)
        {
          ?>
          <div class="panel panel-primary filterable">
            <div class="panel-heading clearfix  ">
              <div class="panel-title pull-left">
               <div class="caption">
                <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                Add Target / Forecast
              </div>
            </div>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-responsive">
              <thead>
                <tr>
                  <th>A/M</th>
                  <th>Periode</th>
                  <th>Operator</th>
                  <th>Customer</th>
                  <th>Amount</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php
                echo form_open('sales/target/save/'.$this->uri->segment(4));
                ?>
                <tr>
                  <td>
                   <select name="am" class="form-control">
                    <?php
                    $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                    foreach($sql->result() as $s)
                    {
                      ?>
                      <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                      <?php
                    }
                    ?>
                  </select> 
                </td>
                <td>
                  <input type="text" name="periode" class="form-control datepicker" placeholder="Periode" />
                </td>
                <td>
                 <select name="operator" class="form-control">
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
              </td>
              <td>
                <select name="customer_name" class="form-control">
                  <?php
                  $sql = $this->mddata->getAllDataTbl('tbl_dm_customer');
                  foreach($sql->result() as $s)
                  {
                    ?>
                    <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                    <?php
                  }
                  ?>
                </select> 
              </td>
              <td>
                <input type="text" name="amount" class="form-control" placeholder="Amount" />
              </td>
              <td>
                <button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button>
              </td>
            </tr>
            <?php
            echo form_close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
  }
  ?>
  <div class="panel panel-primary filterable">
    <div class="panel-heading clearfix  ">
      <div class="panel-title pull-left">
       <div class="caption">
        <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
        Target / Forecast
      </div>
    </div>
  </div>
  <div class="panel-body">
  <table class="table table-striped table-responsive table-bordered">
      <thead>
        <tr>
          <?php  $thn = date('Y'); ?>
          <th rowspan="2" style="vertical-align: middle;">No</th>
          <th rowspan="2" style="vertical-align: middle;">Periode ( <?php echo $thn ?> )</th>
          <?php  
          $am_Code = array();
          $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','position',1); ?>
          <th colspan="<?php echo count($am->result()) ?>"> Account Manager </th>
          <th rowspan="2" style="vertical-align: middle;">Total</th>
        </tr>
        <tr>
         <?php
         foreach ($am->result() as $a) {
          array_push($am_Code, $a->id);
          ?>
          <th><a href="<?php echo site_url('sales/account/detail/'.$a->id)?>"><?php echo $a->name?></th>
          <?php
        }
        ?>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
      $bln2 = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
      $no = 0;

      foreach($bln as $b)
      {
       $total = 0;
       ?>
       <tr>
         <td><?php echo $no+1; ?></td>
         <td><?php echo $b ?></td>
         <?php 
         foreach ($am_Code as $aC) { 
           $amountTarget = $this->db->query("SELECT amount FROM tbl_sale_target 
            WHERE a_m = '".$aC."' 
            AND SUBSTR(periode,1,3) = '".$bln2[$no]."' 
            AND SUBSTR(periode,5,4) = '".$thn."'")->row(); ?>
           <td><?php 
            if(isset($amountTarget->amount)){
             echo number_format($amountTarget->amount); 
             $total = $total + $amountTarget->amount;
           }else{echo "-";}?>
         </td>
         <?php } ?>
         <td><?php echo number_format($total) ?></td>

       </tr>
       <?php
       $no++;
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
<!-- Back to Top--><script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>      
<script>        
  $(document).ready(function(){
    $('.datepicker').datepicker({
      format:'M'
    });

  }); </script>

</body>
</html>