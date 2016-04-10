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
                   $thn = date('Y');
                   $no = 1;
                   $total_so = 0;
                   $total_inv = 0;
                   $total_target = 0;
                   
                   foreach($bln as $b)
                   {

                    $so = $this->db->query('SELECT SUM(grand_total) as total from tbl_sale_so_detail WHERE id_so IN (SELECT id FROM tbl_sale_so WHERE SUBSTR(so_date,4,3)="'.SUBSTR($b,0,3).'" AND SUBSTR(so_date,8,4)='.$thn.')')->row();
                    $target = $this->db->query('SELECT SUM(amount) as total from tbl_sale_target WHERE SUBSTR(periode,1,3)="'.SUBSTR($b,0,3).'" AND SUBSTR(periode,5,4)='.$thn)->row();
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
                                                SUBSTR(so_date, 4, 3) = "'.SUBSTR($b,0,3).'" AND SUBSTR(so_date,8,4)='.$thn.'
                                                )')->row();
                            if($so->total!=0){
                                $pers_inv = 100*$inv->total/$so->total;
                            }else{
                                $pers_inv = 0;
                            }
                            if($target->total!=0){
                                $pers_so= 100*$so->total/$target->total;
                                $pers_inv_t= 100*$inv->total/$target->total;
                            }else{
                                $pers_so = 0;
                                 $pers_inv_t = 0;
                            }

                            ?>
                            <tr>
                                <td><?php echo $no?></td>
                                <td><?php echo $b?></td>
                                <?php if($no <= date('n')) {?>
                                <td align="right"><?php echo number_format($target->total, 0)?></td>
                                <td align="right"><?php echo number_format($so->total, 0)?></td>
                                <td align="center"><?php  echo number_format($pers_so,1,'.','')."%"?></td>
                                <td align="right"><?php echo number_format($inv->total,0)?></td>
                                <td align="center"><?php  echo number_format($pers_inv,1,'.','')."%"?></td>
                                <td align="center"><?php  echo number_format($pers_inv_t,1,'.','')."%"?></td>
                                <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td>
                               <?php } ?>
                            </tr>
                            <?php
                            $total_so +=$so->total;
                            $total_inv +=$inv->total;
                            $total_target +=$target->total;

                            
                            if($no  %3 == 0){
                                if($total_so!=0){
                                $t_pers_inv = 100*$total_inv/$total_so;
                                }else{
                                    $t_pers_inv = 0;
                                }
                                if($total_target!=0){
                                    $t_pers_so= 100*$total_so/$total_target;
                                    $t_pers_inv_t= 100*$total_inv/$total_target;
                                }else{
                                    $t_pers_so = 0;
                                    $t_pers_inv_t = 0;
                                }
                            ?>
                            <tr style="font-weight:bold">
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;QUARTER <?php echo $no/3?></td>
                            <?php if($no/3 <= ceil(date('n')/3)) {?>
                            <td align="right"><?php echo number_format($total_target,0)?></td>
                            <td align="right"><?php echo number_format($total_so,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_so,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_inv,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv,1,'.','')."%"?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv_t,1,'.','')."%"?></td>
                            <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td>
                               <?php } ?>

                        </tr>
                            <?php

                            }
                            if($no % 6 ==0){
                                ?>
                        <tr style="font-weight:bold">
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEMESTER <?php echo $no/6?></td>
                            <?php if($no/6 <= ceil(date('n')/6)) {?>
                            <td align="right"><?php echo number_format($total_target,0)?></td>
                            <td align="right"><?php echo number_format($total_so,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_so,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_inv,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv,1,'.','')."%"?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv_t,1,'.','')."%"?></td>
                            <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td>
                               <?php } ?>

                        </tr>
                                <?php
                            }
                            $no++;
                        }
                        ?>                        
                        <tr style="font-weight:bold">
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEAR TO DATE</td>
                           <?php if($no/12 <= ceil(date('n')/12)) {?>
                            <td align="right"><?php echo number_format($total_target,0)?></td>
                            <td align="right"><?php echo number_format($total_so,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_so,1,'.','')."%"?></td>
                            <td align="right"><?php echo number_format($total_inv,0)?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv,1,'.','')."%"?></td>
                            <td align="center"><?php  echo number_format($t_pers_inv_t,1,'.','')."%"?></td>
                            <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td>
                               <?php } ?>
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