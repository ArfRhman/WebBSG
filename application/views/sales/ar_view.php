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
                    A/R Performance
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive">
                <thead>
                    
                    <tr>
                        <th>NO</th>
                        <th>PERIODE</th>
                        <th>TARGET</th>
                        <th>SO</th>
                        <th>INVOICED</th>
                        <th>PAID</th>
                        <th>% PAID</th>
                        <th>OUTSTANDING</th>
                        <th>% OUTSTANDING</th>
                        <th>AVG OVERDUE (DAYS)</th>
                        
                    </tr>

                </thead>
                <tbody>
                   <?php
                   $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                   $thn = date('Y');
                   $no = 1;
                   $total_so = 0;
                   $total_inv = 0;
                   $total_target = 0;
                   $total_out = 0;
                   $total_payment = 0;
                   $total_avg = 0;

                   $total_so_s = 0;
                   $total_inv_s = 0;
                   $total_target_s = 0;
                   $total_out_s = 0;
                   $total_payment_s = 0;
                   $total_avg_s = 0;

                   $total_so_y = 0;
                   $total_inv_y = 0;
                   $total_target_y = 0;
                   $total_out_y = 0;
                   $total_payment_y = 0;
                   $total_avg_y = 0;
                   foreach($bln as $b)
                   {
                    $mnth = date('M', mktime(0, 0, 0, $no, 10)); 
                    $target = $this->db->query("SELECT SUM(amount) as total FROM tbl_sale_target WHERE SUBSTR(periode,1,3) = '".$mnth."' AND SUBSTR(periode,5,4)=".$thn)->row();
                    $so = $this->db->query("SELECT SUM(grand_total) as total FROM tbl_sale_so_detail WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                    $inv = $this->db->query("SELECT SUM(amount) as total FROM tbl_sale_so_invoicing WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                    $payment = $this->db->query("SELECT SUM(amount) as total,
    AVG(DATEDIFF(STR_TO_DATE(payment_date, '%d %M %Y'),STR_TO_DATE(due_date, '%d %M %Y'))) AS avg_overdue FROM tbl_sale_so_payment WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                    $outstanding = $payment->total - $inv->total;
                    if($inv->total !=0 ) {
                        $p_inv = $payment->total/$inv->total;
                        $p_out = $outstanding/$inv->total;
                    }else{
                        $p_inv = 0;
                        $p_out = 0;
                    } 
                       ?>
                       <tr>
                        <td><?php echo $no?></td>
                        <td><a href="<?php echo site_url('sales/ar/detail/'.$no)?>"><?php echo $b?></a></td>
                        <?php if($no <= date('n')) {?>
                        <td align="right"><?php echo number_format($target->total,0)?></td>
                        <td align="right"><?php echo number_format($so->total,0)?></td>
                        <td align="right"><?php echo number_format($inv->total,0)?></td>
                        <td align="right"><?php echo number_format($payment->total,0)?></td>
                        <td align="right"><?php echo number_format($p_inv,1,'.','')."%"?></td>
                        <td align="right"><?php echo number_format($outstanding,0)?></td>
                        <td align="right"><?php echo number_format($p_out,1,'.','')."%"?></td>
                        <td align="right"><?php echo number_format($payment->avg_overdue,0)?></td>
                        <?php 
                        $total_so +=$so->total;
                        $total_inv +=$inv->total;
                        $total_target +=$target->total;
                        $total_payment +=$payment->total;
                        $total_out +=$outstanding;
                        $total_avg += $payment->avg_overdue;
                        }else{ ?>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        <?php } ?>
                    </tr>
                    <?php
                        
                    if($no  %3 == 0){
                        if($total_inv !=0 ) {
                            $p_inv_t = $total_payment/$total_inv;
                            $p_out_t = $total_out/$total_inv;
                        }else{
                            $p_inv_t = 0;
                            $p_out_t = 0;
                        } 
                        ?>
                        <tr style="font-weight:bold">
                            <td></td>
                            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;QUARTER <?php echo $no/3?></b></td>
                            <?php if($no/3 <= ceil(date('n')/3)) {?>
                            <td align="right"><?php echo number_format($total_target,0)?></td>
                            <td align="right"><?php echo number_format($total_so,0)?></td>
                            <td align="right"><?php echo number_format($total_inv,0)?></td>
                            <td align="right"><?php echo number_format($total_payment,0)?></td>
                            <td align="right"><?php echo number_format($p_inv_t,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_out,0)?></td>
                            <td align="right"><?php echo number_format($p_out_t,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_avg,0)?></td>
                             <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                               <?php } ?>
                        </tr>
                        <?php


                       $total_so_s += $total_so;
                       $total_inv_s += $total_inv;
                       $total_target_s += $total_target;
                       $total_out_s += $total_out;
                       $total_payment_s += $total_payment;
                       $total_avg_s += $total_avg;

                       $total_so = 0;
                       $total_inv = 0;
                       $total_target = 0;
                       $total_out = 0;
                       $total_payment = 0;
                       $total_avg = 0;
                    }
                    if($no  %6 == 0){
                        if($total_inv_s !=0 ) {
                            $p_inv_t = $total_payment_s/$total_inv_s;
                            $p_out_t = $total_out_s/$total_inv_s;
                        }else{
                            $p_inv_t = 0;
                            $p_out_t = 0;
                        } 
                        ?>
                        <tr>
                            <td></td>
                            <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEMESTER <?php echo $no/6?></b></td>
                           <?php if($no/6 <= ceil(date('n')/6)) {?>
                            <td align="right"><?php echo number_format($total_target_s,0)?></td>
                            <td align="right"><?php echo number_format($total_so_s,0)?></td>
                            <td align="right"><?php echo number_format($total_inv_s,0)?></td>
                            <td align="right"><?php echo number_format($total_payment_s,0)?></td>
                            <td align="right"><?php echo number_format($p_inv_t,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_out_s,0)?></td>
                            <td align="right"><?php echo number_format($p_out_t,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_avg_s,0)?></td>
                             <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                               <?php } ?>

                        </tr>
                        <?php
                        $total_so_y += $total_so_s;
                       $total_inv_y += $total_inv_s;
                       $total_target_y += $total_target_s;
                       $total_out_y += $total_out_s;
                       $total_payment_y += $total_payment_s;
                       $total_avg_y += $total_avg_s;

                        $total_so_s = 0;
                       $total_inv_s = 0;
                       $total_target_s = 0;
                       $total_out_s = 0;
                       $total_payment_s = 0;
                       $total_avg_s = 0;

                       
                    }
                    $no++;
                }
                ?>
                <tr>
                    <td></td>
                    <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEAR TO DATE</b></td>
                    <?php 
                        if($total_inv_y !=0 ) {
                            $p_inv_t = $total_payment_y/$total_inv_y;
                            $p_out_t = $total_out_y/$total_inv_y;
                        }else{
                            $p_inv_t = 0;
                            $p_out_t = 0;
                        } 
                        ?>
                            <td align="right"><?php echo number_format($total_target_y,0)?></td>
                            <td align="right"><?php echo number_format($total_so_y,0)?></td>
                            <td align="right"><?php echo number_format($total_inv_y,0)?></td>
                            <td align="right"><?php echo number_format($total_payment_y,0)?></td>
                            <td align="right"><?php echo number_format($p_inv_t,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_out_y,0)?></td>
                            <td align="right"><?php echo number_format($p_out_t,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_avg_y,0)?></td>
                             
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
<!-- end of page level js -->       <script>        $(document).ready(function(){           $('.delete').on('click',function(){             var btn = $(this);              bootbox.confirm('Are you sure to delete this record?', function(result){                    if(result ==true){                      window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id');                   }               });         });     }); </script>
</body>
</html>