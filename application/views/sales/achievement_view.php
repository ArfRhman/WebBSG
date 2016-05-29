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
                    Achievement Report
                </div>
            </div>
        </div>
        <div class="panel-body" style="width:99%;overflow-x:scroll">
            <table class="table table-striped table-responsive" style="
    width: 150%;
    max-width: 150%;
">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Target</th>
                        <th>Potential Order</th>
                        <th>%Potential Order</th>
                        <th>Achievement</th>
                        <th>% Achievement</th>
                        <th>Acknowledged</th>
                        <th>Penalty</th>
                        <th>Net Sales</th>
                        <th>%SalesCom</th>
                        <th>SalesCom Amount</th>
                        <th>Paid</th>
                        <th>SalesCom to be paid</th>
                        <th>SalesCom Outstanding</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                   $thn = date('Y');
                   $no = 1;
                   $total_target = 0;
                   $total_payment = 0;
                   foreach($bln as $b)
                   {
                    $mnth = date('M', mktime(0, 0, 0, $no, 10)); 
                     //$target = $this->db->query('SELECT SUM(amount) as total from tbl_sale_target WHERE SUBSTR(periode,1,3)="'.$mnth.'" AND SUBSTR(periode,5,4)='.$thn)->row();
                    $target = $this->db->query('
                        select
                        SUM(a.amount) as total
                        from
                        tbl_sale_target a
                        inner join 
                        (select amount, max(no) as maxid from tbl_sale_target WHERE
                            SUBSTR(periode, 1, 3) = "'.$mnth.'"
                            AND SUBSTR(periode, 5, 4) = "'.$thn.'" group by a_m) as b on
                    a.no = b.maxid
                    ')->row();
                    $payment = $this->db->query('SELECT SUM(amount) as total from tbl_sale_so_payment WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = "'.$mnth.'" AND SUBSTR(so_date,8,4)='.$thn.')')->row();
                     //$so = $this->db->query("SELECT SUM(grand_total) as total FROM tbl_sale_so_detail WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                    $so = $this->db->query("SELECT SUM(total) as sub_total,
                        SUM(disc) as total_disc,
                        SUM(delivery) as total_delivery
                        FROM tbl_sale_so_detail WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                    $nett = $so->sub_total - $so->total_disc + $so->total_delivery;
                    $vat = 0.1 * $nett;
                    $grand_total_so = $nett + $vat;
                    $inv = $this->db->query("SELECT SUM(amount) as total FROM tbl_sale_so_invoicing WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                    $d = $this->db->query("SELECT
                        other_status,
                        inv.amount,
                        DATEDIFF(STR_TO_DATE(payment_date, '%d %M %Y'),STR_TO_DATE(due_date, '%d %M %Y')) as overdue
                        FROM
                        tbl_sale_so so
                        LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
                        LEFT JOIN tbl_sale_so_payment p ON p.id_so = so.id
                        WHERE
                        SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".date('Y'))->result();
                    $total_penalty = 0;
                    $total_net_claim = 0;
                    foreach ($d as $c) {
                        if($c->other_status == "Maintain") $net = $c->amount * 50/100;
                        else $net = $c->amount;

                        if($c->overdue>0 AND $c->overdue!="") $pen = ($c->overdue/180) * $net;
                        else $pen= 0;
                        $total_penalty +=$pen;
                        $total_net_claim += $net - $pen;


                    }  
                    $ap = $this->db->query("SELECT
                        SUM(sales) as sales,
                        SUM(extcom_pro) as extcom_pro,
                        SUM(bank) as bank,
                        SUM(transport) as transport,
                        SUM(adm) as adm,
                        SUM(other) as other,
                        SUM(adjustment) as adjustment
                        FROM
                        tbl_sale_so_cost 
                        JOIN tbl_sale_so ON tbl_sale_so_cost.id_so = tbl_sale_so.id
                        WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                    $pc = $this->db->query("
                        SELECT
                        SUM(DDP_IDR) as total_purchase
                        FROM
                        tbl_op_price_list pl
                        WHERE
                        pl.item_id IN (
                            SELECT
                            item
                            FROM
                            tbl_sale_so_detail dt
                            WHERE
                            dt.id_so IN (SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")
                            )
                    ")->row();
                    $gross = $grand_total_so - $pc->total_purchase;
                    $total_cost = $ap->sales + $ap->extcom_pro + $ap->bank + $ap->transport + $ap->adm + $ap->other;
                    $enp1 = $gross - $total_cost;
                    $enp2 = $enp1 +  $ap->adjustment;
                    $prc_enp = ($grand_total_so != 0)?100* $enp2/$grand_total_so:0;
                    if($target->total!=0){
                        $prc_achievement = 100 * $inv->total / $target->total;
                    }else{
                        $prc_achievement = 0;
                    }
                    if($prc_achievement >=71 AND $prc_achievement<=90){
                        if($prc_enp>=15 AND $prc_enp<=19.99)  $prc_salescom = 0.6 * 0.014;
                        elseif($prc_enp>=20) $prc_salescom = 0.6 * 0.016;
                        else $prc_salescom = 0;
                    }elseif($prc_achievement > 90 AND $prc_achievement<=100){
                        if($prc_enp>=15 AND $prc_enp<=19.99)  $prc_salescom = 0.6 * 0.017;
                        elseif($prc_enp>=20) $prc_salescom = 0.6 * 0.018;
                        else $prc_salescom = 0;
                    }elseif($prc_achievement > 100){
                        if($prc_enp>=15 AND $prc_enp<=19.99)  $prc_salescom = 0.6 * 0.02;
                        elseif($prc_enp>=20) $prc_salescom = 0.6 * 0.021;
                        else $prc_salescom = 0;
                    }else{
                        $prc_salescom = 0;
                    }
                    ?>
                    <tr>
                        <td><?php echo $no?></td>
                        <td><a href='<?php echo site_url('sales/achievement/detail/'.$no)?>' style="cursor:pointer';color:blue"><?php echo $b?></a></td>
                        <td><?php echo number_format($target->total, 0)?></td>
                        <td><?php echo number_format($grand_total_so, 0)?></td>
                        <td><?php echo ($target->total!=0)?number_format(100 * $grand_total_so/$target->total, 2,'.',''):'0'?>%</td>
                        <td><?php echo number_format($inv->total, 0)?></td>
                        <td><?php 

                            echo number_format($prc_achievement, 2,'.','');
                            ?>%</td>
                            <td><?php echo number_format(abs($inv->total-$grand_total_so), 0)?></td>
                            <td><?php echo number_format($total_penalty, 2)?></td>
                            <td><?php echo number_format($total_net_claim, 0)?></td>
                            <td><?php echo number_format($prc_salescom * 100,2,'.','')?>%</td>
                            <td><?php $sc_amount = $total_net_claim * $prc_salescom; echo number_format($sc_amount, 0)?></td>
                            <td><?php echo number_format($payment->total, 0)?></td>
                            <td><?php $sc_paid = $payment->total * $prc_salescom; echo number_format($sc_paid, 0)?></td>
                            <td><?php echo number_format(abs($sc_amount - $sc_paid), 0)?></td>

                            <td>                                                                                                       
                                <div class='btn-group'>                                                     
                                    <button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>    
                                    <ul class='dropdown-menu pull-right' role='menu'>       
                                        <li><a href='<?php echo site_url('sales/achievement/detail/'.$no)?>' >Detail</a></li>    
                                    </ul>                                                 
                                </div>
                            </td>
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
<!-- Back to Top-->
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/countUp/countUp.js"></script>
<!--   maps -->
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>		<script type="text/javascript" src="<?php echo base_url();?>style/js/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
<!-- end of page level js -->		<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>