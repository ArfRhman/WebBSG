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
                        Sales Report by Period:  (1) Year to date, (2) Quarterly, (3) Monthly
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
                            <th>No</th>
                            <th>PERIODE</th>
                            <th>TARGET</th>
                            <th>SO</th>
                            <th>% SO</th>
                            <th>INVOICED</th>
                            <th>% INV-SO</th>
                            <th>% INV-Target</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                     $thn = isset($_POST['tahun'])?$_POST['tahun']:date('Y');
                     $no = 1;
                     $total_so = 0;
                     $total_inv = 0;
                     $total_target = 0;
                     $total_so_s = 0;
                     $total_inv_s = 0;
                     $total_target_s = 0; 
                     $total_so_y = 0;
                     $total_inv_y = 0;
                     $total_target_y = 0;                   
                     foreach($bln as $b)
                     {
                        $mnth = date('M', mktime(0, 0, 0, $no, 10)); 
                        //$so = $this->db->query('SELECT SUM(grand_total) as total from tbl_sale_so_detail WHERE id_so IN (SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3)="'.$mnth.'" AND SUBSTR(so_date,8,4)='.$thn.')')->row();
                        //$target = $this->db->query('SELECT SUM(amount) as total from tbl_sale_target WHERE SUBSTR(periode,1,3)="'.$mnth.'" AND SUBSTR(periode,5,4)='.$thn)->row();
                         $so = $this->db->query("SELECT SUM(total) as sub_total,
                            SUM(disc) as total_disc,
                            SUM(delivery) as total_delivery
                            FROM tbl_sale_so_detail WHERE id_so IN(SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3) = '".$mnth."' AND SUBSTR(so_date,8,4)=".$thn.")")->row();
                        $nett = $so->sub_total - $so->total_disc + $so->total_delivery;
                        $vat = 0.1 * $nett;
                        $grand_total_so = $nett + $vat;
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
                        $inv = $this->db->query('SELECT
                            SUM(amount) as total
                            FROM
                            tbl_sale_so_invoicing
                            WHERE
                            id_so IN (
                                SELECT
                                id
                                FROM
                                tbl_sale_so
                                WHERE
                                SUBSTR(so_date, 4, 3) = "'.$mnth.'" AND SUBSTR(so_date,8,4)='.$thn.'
                                )')->row();
                        if($grand_total_so!=0){
                            $pers_inv = 100*$inv->total/$grand_total_so;
                        }else{
                            $pers_inv = 0;
                        }
                        if($target->total!=0){
                            $pers_so= 100*$grand_total_so/$target->total;
                            $pers_inv_t= 100*$inv->total/$target->total;
                        }else{
                            $pers_so = 0;
                            $pers_inv_t = 0;
                        }

                        ?>
                        <tr>
                            <td><?php echo $no?></td>
                            <td><?php echo $b?></td>
                            
                            <td align="right"><?php echo number_format($target->total, 0)?></td>
                            <td align="right"><?php echo number_format($grand_total_so, 0)?></td>
                            <td align="center"><?php  echo number_format($pers_so,2,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($inv->total,0)?></td>
                            <td align="center"><?php  echo number_format($pers_inv,2,'.','')."%"?></td>
                            <td align="center"><?php  echo number_format($pers_inv_t,2,'.','')."%"?></td>
                            <?php 
                            $total_so +=$grand_total_so;
                            $total_inv +=$inv->total;
                            $total_target +=$target->total;
                         ?>
                    </tr>
                    <?php                            
                    if($no  %3 == 0){
                        if($total_so!=0){
                            $t_pers_inv = 100*$total_inv/$total_so;
                        }else{
                            $t_pers_inv = 0;
                        }
                        if($total_target!=0){
                            $t_pers_so = 100*$total_so/$total_target;
                            $t_pers_inv_t= 100*$total_inv/$total_target;
                        }else{
                            $t_pers_so = 0;
                            $t_pers_inv_t = 0;
                        }
                        ?>
                        <tr style="font-weight:bold">
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;QUARTER <?php echo $no/3?></td>
                            
                            <td align="right"><?php echo number_format($total_target,0)?></td>
                            <td align="right"><?php echo number_format($total_so,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_so,2,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_inv,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv,2,'.','')."%"?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv_t,2,'.','')."%"?></td>
                            <?php 
                            $total_so_s +=  $total_so;
                            $total_inv_s += $total_inv;
                            $total_target_s += $total_target;
                            $total_so = 0;
                            $total_inv = 0;
                            $total_target = 0;
                        ?>

                    </tr>
                    <?php

                }
                if($no % 6 ==0){
                    if($total_so_s!=0){
                        $t_pers_inv = 100*$total_inv_s/$total_so_s;
                    }else{
                        $t_pers_inv = 0;
                    }
                    if($total_target_s!=0){
                        $t_pers_so = 100*$total_so_s/$total_target_s;
                        $t_pers_inv_t= 100*$total_inv_s/$total_target_s;
                    }else{
                        $t_pers_so = 0;
                        $t_pers_inv_t = 0;
                    }
                    ?>
                    <tr style="font-weight:bold">
                        <td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEMESTER <?php echo $no/6?></td>
                        
                        <td align="right"><?php echo number_format($total_target_s,0)?></td>
                        <td align="right"><?php echo number_format($total_so_s,0)?></td>
                        <td align="center"><?php  echo number_format($t_pers_so,2,'.','')."%"?></td>
                        <td align="right"><?php echo number_format($total_inv_s,0)?></td>
                        <td align="center"><?php  echo number_format($t_pers_inv,2,'.','')."%"?></td>
                        <td align="center"><?php  echo number_format($t_pers_inv_t,2,'.','')."%"?></td>
                        <?php 
                        $total_so_y +=  $total_so_s;
                        $total_inv_y += $total_inv_s;
                        $total_target_y += $total_target_s;
                        $total_so_s = 0;
                        $total_inv_s = 0;
                        $total_target_s = 0;
                    ?>

                </tr>
                <?php
            }
            $no++;
        }
        ?>                        
        <tr style="font-weight:bold">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEAR TO DATE</td>
            <?php 
            if($total_so_y!=0){
                $t_pers_inv = 100*$total_inv_y/$total_so_y;
            }else{
                $t_pers_inv = 0;
            }
            if($total_target_y!=0){
                $t_pers_so = 100*$total_so_y/$total_target_y;
                $t_pers_inv_t= 100*$total_inv_y/$total_target_y;
            }else{
                $t_pers_so = 0;
                $t_pers_inv_t = 0;
            }
            ?>
            <td align="right"><?php echo number_format($total_target_y,0)?></td>
            <td align="right"><?php echo number_format($total_so_y,0)?></td>
            <td align="center"><?php  echo number_format($t_pers_so,2,'.','')."%"?></td>
            <td align="right"><?php echo number_format($total_inv_y,0)?></td>
            <td align="center"><?php  echo number_format($t_pers_inv,2,'.','')."%"?></td>
            <td align="center"><?php  echo number_format($t_pers_inv_t,2,'.','')."%"?></td>

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
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>		<script type="text/javascript" src="<?php echo base_url();?>style/js/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
<!-- end of page level js -->		<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>