    <head>
      <style type="text/css">
        tr.accordion-toggle{
          cursor: pointer;
        }
      </style>
    </head>
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
                Stock Performance
              </div>
            </div>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-responsive">
              <thead>

                <tr>
                  <th>NO</th>
                  <th>ITEM</th>
                  <th>BRAND</th>
                  <th>MOU</th>
                  <th>QTY BALANCE</th>
                  <th>LAST ARRIVAL</th>
                  <th>AGING (days)</th>
                  <th>CATEGORY</th>
                  <th>AVERAGE COST</th>
                  <th>AMOUNT</th>
                  <th>%</th>
                  <th>STORAGING COST</th>
                  <th>COST OF MONEY</th>
                </tr>

              </thead>
              <tbody>
                <?php
                $q = $this->db->query("SELECT
  *, DATEDIFF(
                  CURDATE(),
                  STR_TO_DATE(
                    tbl_op_st_header.document_date,
                    '%d %b %Y'
                    )
                ) AS geer
                FROM
                tbl_op_st_header,
                tbl_op_st_tabel
                WHERE
                tbl_op_st_header. NO = tbl_op_st_tabel.st_no
                ")->result_array();

                $total_amount = 0;
                $total_com = 0;
                $total_amount2 = 0;
                $total_com2 = 0;
                $total_amount3 = 0;
                $total_com3 = 0;
                $dat=array();
                foreach ($q as $r) {
                  if(!array_key_exists($r['item_code'], $dat)){
                    $dat[$r['item_code']]['code'] = $r['item_code'];
                    $dat[$r['item_code']]['item'] = $r['item'];
                    $dat[$r['item_code']]['mou']=$r['mou'];
                    $dat[$r['item_code']]['g_r']=$r['document_date'];
                    if($r['type']=="In" || $r['type']=="Adj in"){
                      $dat[$r['item_code']]['jum']=$r['qty']; 
                    }else if($r['type']=="Out" || $r['type']=="Adj out"){
                      $dat[$r['item_code']]['jum']=0-$r['qty'];
                    }
                    if($r['document']=='GR'){
                      $dat[$r['item_code']]['geer']=$r['geer'];
                    }else{
                      $dat[$r['item_code']]['geer']=0;
                    }
                  }else{
                    if($r['type']=="In" || $r['type']=="Adj in"){
                      $dat[$r['item_code']]['jum']+=$r['qty'];  
                    }else if($r['type']=="Out" || $r['type']=="Adj out"){
                      $dat[$r['item_code']]['jum']-=$r['qty'];
                    }
                    if($r['document']=='GR'){
                      $dat[$r['item_code']]['geer']=$r['geer'];
                    }
                  }
                }

                $active=array();
                $slow=array();
                $dead=array();
                foreach($dat as $r){
                  $pl = $this->db->query("SELECT AVG(ddp_idr) as average_cost FROM tbl_op_pl_tabel WHERE item_id=".$r['code'])->row();
                  $amount = $pl->average_cost * $r['jum'];
                  $com = (0.012 / 30) * $r['geer'] * $amount;

                  if($r['geer']<=90){
                    $active[$r['item']]['code']=$r['code'];
                    $active[$r['item']]['name']=$r['item'];
                    $active[$r['item']]['total']=$r['jum'];
                    $active[$r['item']]['aging']=$r['geer'];
                    $active[$r['item']]['mou']=$r['mou'];
                    $active[$r['item']]['g_r']=$r['g_r'];
                    $total_amount += $amount;
                    $total_com +=$com;
                  }else if($r['geer']>90 && $r['geer']<=180){
                    $slow[$r['item']]['code']=$r['code'];
                    $slow[$r['item']]['name']=$r['item'];
                    $slow[$r['item']]['total']=$r['jum'];
                    $slow[$r['item']]['aging']=$r['geer'];
                    $slow[$r['item']]['mou']=$r['mou'];
                    $slow[$r['item']]['g_r']=$r['g_r'];
                    $total_amount2 += $amount;
                    $total_com2 +=$com;
                  }else if($r['geer']>180){
                    $dead[$r['item']]['code']=$r['code'];
                    $dead[$r['item']]['name']=$r['item'];
                    $dead[$r['item']]['total']=$r['jum'];
                    $dead[$r['item']]['aging']=$r['geer'];
                    $dead[$r['item']]['mou']=$r['mou'];
                    $dead[$r['item']]['g_r']=$r['g_r'];
                    $total_amount3 += $amount;
                    $total_com3 +=$com;
                  }
                }



                $grand_amount = $total_amount + $total_amount2 + $total_amount3;
                $grand_com = $total_com + $total_com2 + $total_com3;
                ?>
                <tr style="font-weight:bold;cursor:pointer';" id="package1" class="accordion-toggle" data-toggle="collapse" data-parent="#OrderPackages" data-target=".packageDetails1">
                  <td>1.</td>
                  <td>ACTIVE / FAST MOVING </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?php echo number_format($total_amount,0)?></td>
                  <td></td>
                  <td></td>
                  <td><?php echo number_format($total_com,0)?></td>
                </tr>

                <?php
                foreach ($active as $d) {
                  $item = $this->mddata->getDataFromTblWhere('tbl_dm_item','id',$d['code'])->row();
                  $brand = $this->mddata->getDataFromTblWhere('tbl_dm_brand','id',$item->merk)->row();
                  $pl = $this->db->query("SELECT AVG(ddp_idr) as average_cost FROM tbl_op_pl_tabel WHERE item_id=".$d['code'])->row();
                  ?>
                  <tr class="accordion-body collapse packageDetails1" id="accordion1">
                   <td></td>
                       <td><?php echo $item->nama?></td>
                       <td><?php echo isset($brand->brand)?$brand->brand:'' ?></td>
                       <td><?php echo isset($d['mou'])?$d['mou']:''?></td>
                       <td><?php echo isset($d['total'])?number_format($d['total'],0):'0'?></td>
                       <td><?php echo isset($d['g_r'])?$d['g_r']:''?></td>
                       <td><?php echo isset($d['aging'])?number_format($d['aging'],0):0?></td>
                       <td>Active</td>
                       <td><?php echo number_format($pl->average_cost,0)?></td>
                       <td><?php 
                        $amount = isset($d['total'])?($pl->average_cost * $d['total']):0;
                        echo number_format($amount,0)
                        ?></td>
                        <td><?php echo number_format(100 * $amount/$grand_amount,2,'.','')?>%</td>
                        <td><?php echo ($item->storaging_cost!="")?number_format($item->storaging_cost,0):0?></td>
                        <td><?php $com = isset($d['aging'])?((0.012 / 30) * $d['aging'] * $amount):0;
                         echo number_format($com,0)?></td>
                     </tr>
                     <?php
                   }
                   ?>
                   <tr style="font-weight:bold;cursor:pointer';" id="package2" class="accordion-toggle" data-toggle="collapse" data-parent="#OrderPackages" data-target=".packageDetails2">
                    <td>2.</td>
                    <td>SLOW MOVING </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo number_format($total_amount2,0)?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo number_format($total_com2,0)?></td>
                  </tr>

                  <?php
                  foreach ($slow as $d) {
                    $item = $this->mddata->getDataFromTblWhere('tbl_dm_item','id',$d['code'])->row();
                    $brand = $this->mddata->getDataFromTblWhere('tbl_dm_brand','id',$item->merk)->row();
                    $pl = $this->db->query("SELECT AVG(ddp_idr) as average_cost FROM tbl_op_pl_tabel WHERE item_id=".$d['code'])->row();
                    ?>
                    <tr class="accordion-body collapse packageDetails2" id="accordion1">
                      <td></td>
                       <td><?php echo $item->nama?></td>
                       <td><?php echo isset($brand->brand)?$brand->brand:'' ?></td>
                       <td><?php echo isset($d['mou'])?$d['mou']:''?></td>
                       <td><?php echo isset($d['total'])?number_format($d['total'],0):'0'?></td>
                       <td><?php echo isset($d['g_r'])?$d['g_r']:''?></td>
                       <td><?php echo isset($d['aging'])?number_format($d['aging'],0):0?></td>
                       <td>Active</td>
                       <td><?php echo number_format($pl->average_cost,0)?></td>
                       <td><?php 
                        $amount = isset($d['total'])?($pl->average_cost * $d['total']):0;
                        echo number_format($amount,0)
                        ?></td>
                        <td><?php echo number_format(100 * $amount/$grand_amount,2,'.','')?>%</td>
                        <td><?php echo ($item->storaging_cost!="")?number_format($item->storaging_cost,0):0?></td>
                        <td><?php $com = isset($d['aging'])?((0.012 / 30) * $d['aging'] * $amount):0;
                         echo number_format($com,0)?></td>
                       </tr>
                       <?php
                     }
                     ?>
                     <tr style="font-weight:bold;"  id="package3" class="accordion-toggle" data-toggle="collapse" data-parent="#OrderPackages" data-target=".packageDetails3">
                      <td>3.</td>
                      <td>DEAD STOCK</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><?php echo number_format($total_amount3,0)?></td>
                      <td></td>
                      <td></td>
                      <td><?php echo number_format($total_com3,0)?></td>
                    </tr>

                    <?php
                    foreach ($dead as $d) {
                      $item = $this->mddata->getDataFromTblWhere('tbl_dm_item','id',$d['code'])->row();
                      $brand = $this->mddata->getDataFromTblWhere('tbl_dm_brand','id',$item->merk)->row();
                      $pl = $this->db->query("SELECT AVG(ddp_idr) as average_cost FROM tbl_op_pl_tabel WHERE item_id=".$d['code'])->row();
                      ?>
                      <tr class="accordion-body collapse packageDetails3" id="accordion3">
                       <td></td>
                       <td><?php echo $item->nama?></td>
                       <td><?php echo isset($brand->brand)?$brand->brand:'' ?></td>
                       <td><?php echo isset($d['mou'])?$d['mou']:''?></td>
                       <td><?php echo isset($d['total'])?number_format($d['total'],0):'0'?></td>
                       <td><?php echo isset($d['g_r'])?$d['g_r']:''?></td>
                       <td><?php echo isset($d['aging'])?number_format($d['aging'],0):0?></td>
                       <td>Active</td>
                       <td><?php echo number_format($pl->average_cost,0)?></td>
                       <td><?php 
                        $amount = isset($d['total'])?($pl->average_cost * $d['total']):0;
                        echo number_format($amount,0)
                        ?></td>
                        <td><?php echo number_format(100 * $amount/$grand_amount,2,'.','')?>%</td>
                        <td><?php echo ($item->storaging_cost!="")?number_format($item->storaging_cost,0):0?></td>
                        <td><?php $com = isset($d['aging'])?((0.012 / 30) * $d['aging'] * $amount):0;
                         echo number_format($com,0)?></td>
                       </tr>
                       <?php
                     }
                     ?>
                     <tr style="font-weight:bold">
                       <td></td>
                       <td>TOTAL</td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td><?php echo number_format($grand_amount,0)?></td>
                       <td></td>
                       <td></td>
                       <td><?php echo number_format($grand_com,0)?></td>
                     </tr>

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
  <script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>     <script type="text/javascript" src="<?php echo base_url();?>style/js/bootbox.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
  <!-- end of page level js -->       <script>        
  $(document).ready(function(){          
   $('.delete').on('click',function(){        
    var btn = $(this);             
    bootbox.confirm('Are you sure to delete this record?', function(result){        
     if(result ==true){                   
      window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id'); 
    }             
  });        
  }); 
   $('#accordion1').on('shown.bs.collapse', function () {
    $("#package1 i.indicator").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
  });
   $('#accordion1').on('hidden.bs.collapse', function () {
    $("#package1 i.indicator").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
  });

   $('#accordion2').on('shown.bs.collapse', function () {
    $("#package2 i.indicator").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
  });
   $('#accordion2').on('hidden.bs.collapse', function () {
    $("#package2 i.indicator").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
  });  
 }); 
  </script>
</body>
</html>