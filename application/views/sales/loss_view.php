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
                        Sales Profit & Loss Summary: (1) Year to date, (2) Quarterly, (3) Monthly
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Pilih Tahun :</label>
                            <div class="col-md-3">
                                <select name="tahun" class="form-control">
                                    <?php
                                    for($i = date('Y');$i>=date('Y')-5;$i--){
                                        if(isset($_POST['tahun']) AND $_POST['tahun']==$i){
                                         ?>
                                         <option value="<?php echo $i?>" selected><?php echo $i?></option>
                                         <?php   
                                     }else{
                                        ?>
                                        <option value="<?php echo $i?>"><?php echo $i?></option>
                                        <?php
                                    }

                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-2"><input type="submit" value="Pilih" class="btn btn-responsive btn-primary btn-sm"></div>
                    </fieldset>
                </form>
                <table class="table table-striped table-responsive">
                    <thead>

                        <tr>
                            <th>NO</th>
                            <th>PERIODE</th>
                            <th>TARGET</th>
                            <th>SO</th>
                            <th>INVOICED</th>
                            <th>COGS (DDP)</th>
                            <th>GROSS PROFIT (GP)</th>
                            <th>DIRECT COST</th>
                            <th>ADJUSTMENT</th>
                            <th>E.N.P</th>
                            <th>% ENP</th>
                        </tr>

                    </thead>
                    <tbody>
                     <?php
                     $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                     $thn = isset($_POST['tahun'])?$_POST['tahun']:date('Y');
                     $no = 1;
                     $total_so = 0; $total_so_s = 0; $total_so_y = 0;
                     $total_inv = 0; $total_inv_s = 0;  $total_inv_y = 0;
                     $total_target = 0; $total_target_s = 0; $total_target_y = 0;
                     $total_cogs = 0; $total_cogs_s = 0; $total_cogs_y = 0;
                     $total_gross = 0; $total_gross_s = 0;  $total_gross_y = 0;
                     $total_direct = 0; $total_direct_s = 0; $total_direct_y = 0;
                     $total_adjustment = 0; $total_adjustment_s = 0; $total_adjustment_y = 0;
                     $total_enp = 0; $total_enp_s = 0; $total_enp_y = 0;


                     foreach($bln as $b)
                     {
                        $mnth = date('M', mktime(0, 0, 0, $no, 10)); 
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
                        //$so = $this->db->query("SELECT SUM(grand_total) as total, SUM(qty) AS qty FROM tbl_sale_so_detail WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".SUBSTR($b,0,3)."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                        $so = $this->db->query("SELECT SUM(total) as sub_total,
                            SUM(disc) as total_disc,
                            SUM(delivery) as total_delivery,
                            SUM(qty) as qty
                            FROM tbl_sale_so_detail WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();

                        $sale = $this->db->query("SELECT SUM(adjustment) as adjustment FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn)->row();
                        $inv = $this->db->query("SELECT SUM(amount) as total FROM tbl_sale_so_invoicing WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                        $cogs = $this->db->query("SELECT
                            SUM(
                                qty * (
                                    SELECT
                                    ddp_idr
                                    FROM
                                    tbl_op_pl_tabel
                                    WHERE
                                    item_id = item
                                    AND pl_no IN (
                                        SELECT
                                        NO
                                        FROM
                                        tbl_op_pl_header
                                        WHERE
                                        YEAR (
                                            STR_TO_DATE(effective_fill, '%d %M %Y')
                                            ) = ".$thn."
                                )
                                ORDER BY
                                NO DESC
                                LIMIT 1
                                )
                                ) AS ddp
                                FROM
                                tbl_sale_so_detail
                                WHERE
                                id_so IN (
                                    SELECT
                                    id
                                    FROM
                                    tbl_sale_so
                                    WHERE
                                    SUBSTR(so_date, 4, 3) = '".$mnth."'
                                    AND SUBSTR(so_date, 8, 4) = ".$thn."
                                    )")->row();
    $direct = $this->db->query("SELECT
        SUM(sales) as sales,
        SUM(extcom_pro) as extcom,
        SUM(bank) as bank,
        SUM(transport) as transport,
        SUM(adm) as adm,
        SUM(other) as other
        FROM
        tbl_sale_so_cost
        WHERE
        id_so IN (
            SELECT
            id
            FROM
            tbl_sale_so
            WHERE
            SUBSTR(so_date, 4, 3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn."
            )")->row();
    $dir_cost = $direct->sales + $direct->extcom + $direct->bank +$direct->transport + $direct->adm +$direct->other;    
    $ddp = $cogs->ddp;
    $gross = $inv->total - $ddp;

    $nett = $so->sub_total - $so->total_disc + $so->total_delivery;
    $vat = 0.1 * $nett;
    $grand_total_so = $nett + $vat;
    ?>
    <tr>
        <td><?php echo $no?></td>
        <td><a href="<?php echo site_url('sales/loss/detail/'.$no)?>"><?php echo $b?></a></td>

        <td align="right"><?php echo number_format($target->total,0)?></td>
        <td align="right"><?php echo number_format($grand_total_so,0)?></td>
        <td align="right"><?php echo number_format($inv->total,0)?></td>
        <td align="right"><?php echo number_format($cogs->ddp,0)?></td>
        <td align="right"><?php echo number_format($gross,0)?></td>
        <td align="right"><?php echo number_format($dir_cost,0)?></td>
        <td align="right"><?php echo number_format($sale->adjustment,0)?></td>
        <td align="right"><?php $enp = $gross - $dir_cost + $sale->adjustment;
            echo number_format($enp,0);
            ?></td>
            <td><?php echo ($inv->total!=0)?number_format(100 * $enp/$inv->total,2,'.',''):'0'?>%</td>
            <?php
            $total_so +=$grand_total_so;
            $total_inv +=$inv->total;
            $total_target +=$target->total;
            $total_cogs +=$ddp;
            $total_gross +=$gross;
            $total_direct +=$dir_cost;
            $total_adjustment +=$sale->adjustment;
            $total_enp +=$enp;
            ?>
        </tr>
        <?php

        if($no  %3 == 0){
            ?>
            <tr style="font-weight:bold">
                <td></td>
                <td><b>&nbsp;&nbsp;&nbsp;&nbsp;QUARTER <?php echo $no/3?></b></td>

                <td align="right"><?php echo number_format($total_target,0)?></td>
                <td align="right"><?php echo number_format($total_so,0)?></td>
                <td align="right"><?php echo number_format($total_inv,0)?></td>
                <td align="right"><?php echo number_format($total_cogs,0)?></td>
                <td align="right"><?php echo number_format($total_gross,0)?></td>
                <td align="right"><?php echo number_format($total_direct,0)?></td>
                <td align="right"><?php echo number_format($total_adjustment,0)?></td>
                <td align="right"><?php echo number_format($total_enp,0)?></td>
                <td><?php echo $inv->total!=0?number_format($total_enp/$total_inv,2,'.',''):'0'?>%</td>
                <?php 
                $total_so_s += $total_so; $total_so = 0;
                $total_inv_s += $total_inv; $total_inv = 0; 
                $total_target_s += $total_target; $total_target = 0;
                $total_cogs_s += $total_cogs; $total_cogs = 0; 
                $total_gross_s += $total_gross; $total_gross = 0; 
                $total_direct_s += $total_direct; $total_direct = 0;
                $total_adjustment_s += $total_adjustment; $total_adjustment = 0; 
                $total_enp_s += $total_enp; $total_enp = 0;
                ?>
            </tr>
            <?php
        }
        if($no  %6 == 0){
            ?>
            <tr>
                <td></td>
                <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEMESTER <?php echo $no/6?></b></td>

                <td align="right"><?php echo number_format($total_target_s,0)?></td>
                <td align="right"><?php echo number_format($total_so_s,0)?></td>
                <td align="right"><?php echo number_format($total_inv_s,0)?></td>
                <td align="right"><?php echo number_format($total_cogs_s,0)?></td>
                <td align="right"><?php echo number_format($total_gross_s,0)?></td>
                <td align="right"><?php echo number_format($total_direct_s,0)?></td>
                <td align="right"><?php echo number_format($total_adjustment_s,0)?></td>
                <td align="right"><?php echo number_format($total_enp_s,0)?></td>
                <td><?php echo $inv->total!=0?number_format($total_enp_s/$total_inv_s,2,'.',''):'0'?>%</td>
                <?php 
                $total_so_y += $total_so_s; $total_so_s = 0;
                $total_inv_y += $total_inv_s; $total_inv_s = 0; 
                $total_target_y += $total_target_s; $total_target_s = 0;
                $total_cogs_y += $total_cogs_s; $total_cogs_s = 0; 
                $total_gross_y += $total_gross_s; $total_gross_s = 0; 
                $total_direct_y += $total_direct_s; $total_direct_s = 0;
                $total_adjustment_y += $total_adjustment_s; $total_adjustment_s = 0; 
                $total_enp_y += $total_enp_s; $total_enp_s = 0;
                ?>

            </tr>
            <?php
        }
        $no++;
    }
    ?>
    <tr>
        <td></td>
        <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEAR TO DATE</b></td>

        <td align="right"><?php echo number_format($total_target_y,0)?></td>
        <td align="right"><?php echo number_format($total_so_y,0)?></td>
        <td align="right"><?php echo number_format($total_inv_y,0)?></td>
        <td align="right"><?php echo number_format($total_cogs_y,0)?></td>
        <td align="right"><?php echo number_format($total_gross_y,0)?></td>
        <td align="right"><?php echo number_format($total_direct_y,0)?></td>
        <td align="right"><?php echo number_format($total_adjustment_y,0)?></td>
        <td align="right"><?php echo number_format($total_enp_y,0)?></td>
        <td><?php echo $inv->total!=0?number_format($total_enp_y/$total_inv_y,2,'.',''):'0'?>%</td>

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