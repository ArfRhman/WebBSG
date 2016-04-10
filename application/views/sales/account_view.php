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
                        Sales Report by Account Manager: (1) Year to date, (2) Quarterly, (3) Monthly
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2" width="20%">PERIODE</th>
                            <?php
                            $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','position',1);
                            foreach ($am->result() as $a) {
                                ?>
                                <th colspan="6"><a href="<?php echo site_url('sales/account/detail/'.$a->id)?>"><?php echo $a->name?></th>
                                <?php
                            }
                            ?>

                        </tr>
                        <tr>
                            <?php
                            $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','position',1);
                            foreach ($am->result() as $a) {
                                ?>
                                <th>TARGET</th>
                                <th>SO</th>
                                <th>% SO</th>
                                <th>INVOICED</th>
                                <th>% INV-SO</th>
                                <th>% INV-TARGET</th>
                                <?php
                            }
                            ?>

                        </tr>

                    </thead>
                    <tbody>
                     <?php
                     $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                     $thn = date('Y');
                     $no = 1;
                     $kalk = array();
                     foreach($bln as $b)
                     {
                         ?>
                         <tr>
                             <td><?php echo $no?></td>
                             <td><?php echo $b?></td>
                             <?php
                             $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','position',1);
                             $i = 0;

                             foreach ($am->result() as $a) {
                                if($no <= date('n')) {
                                $target = $this->db->query('SELECT
                                    SUM(amount) as total
                                    FROM
                                    tbl_sale_target
                                    WHERE
                                        operator = '.$a->id.'
                                        AND SUBSTR(periode, 1, 3) = "'.substr($b, 0,3).'"
                                        AND SUBSTR(periode, 5, 4) = '.$thn
                                        )->row();
                                $so = $this->db->query('SELECT
                                    SUM(grand_total) as so_total
                                    FROM
                                    tbl_sale_so_detail
                                    WHERE
                                    id_so IN (
                                        SELECT
                                        id
                                        FROM
                                        tbl_sale_so
                                        WHERE
                                        am = '.$a->id.'
                                        AND SUBSTR(so_date, 4, 3) = "'.substr($b, 0,3).'"
                                        AND SUBSTR(so_date, 8, 4) = '.$thn.'
                                        )')->row();
                                $inv = $this->db->query('SELECT
                                    SUM(amount) as inv_total
                                    FROM
                                    tbl_sale_so_invoicing
                                    WHERE
                                    id_so IN (
                                        SELECT
                                        id
                                        FROM
                                        tbl_sale_so
                                        WHERE
                                        am = '.$a->id.'
                                        AND SUBSTR(so_date, 4, 3) = "'.substr($b, 0,3).'"
                                        AND SUBSTR(so_date, 8, 4) = '.$thn.'
                                        )')->row();
                                        if($so->so_total!=0) $p_inv_so = 100*$inv->inv_total/$so->so_total;
                                        else $p_inv_so = 0;
                                        if($target->total!=0){
                                            $p_so=100*$so->so_total/$target->total;
                                            $p_inv_target=100*$inv->inv_total/$target->total;
                                        }else{
                                            $p_so= 0;
                                            $p_inv_target=0;
                                        }
                                        if(isset($kalk[$i]['so'])) {
                                            $kalk[$i]['target']+=$target->total; 
                                            $kalk[$i]['so']+=$so->so_total; 
                                            $kalk[$i]['inv'] +=$inv->inv_total;
                                            
                                        }
                                        else {
                                            $kalk[$i]['target']=0; 
                                            $kalk[$i]['so']=0; 
                                            $kalk[$i]['inv'] =0;
                                        }
                                         
                                        ?>
                                        <td align="right"><?php echo number_format($target->total,0)?></td>
                                        <td align="right"><?php echo number_format($so->so_total,0)?></td>
                                        <td align="right"><?php echo number_format($p_so,1,'.','')."%"?></td>
                                        <td align="right"><?php echo number_format($inv->inv_total,0)?></td>
                                        <td align="right"><?php echo number_format($p_inv_so,1,'.','')."%"?></td>
                                        <td align="right"><?php echo number_format($p_inv_target,1,'.','')."%"?></td>
                                        <?php
                                        $i++;
                                        }else{
                                            ?>
                                            <td></td><td></td><td></td><td></td><td></td><td></td>
                                        <?php 
                                        }
                                    }
                                    //array_push($kalk,array("so"=>$so_total,"inv"=>$inv_total,"p_inv_so"=>$p_inv_so_total));
                                    ?>
                                </tr>
                                <?php
                                if($no % 3 == 0){
                                    ?>
                                    <tr style="font-weight:bold">
                                        <td></td>
                                        <td><b>&nbsp;&nbsp;&nbsp;&nbsp;QUARTER  <?php echo $no/3?></b></td>
                                        <?php
                                        foreach ($kalk as $k) {
                                        ?>
                                        <?php if($no/3 <= ceil(date('n')/3)) {?>
                                        <td align="right"><?php echo number_format($k['target'],0)?></td>
                                        <td align="right"><?php echo number_format($k['so'],0) ?></td>
                                        <td align="right"><?php if($k['target']!=0) echo number_format(100*$k['so']/$k['target'],1,'.','')."%"; else echo "0.0%";?></td>
                                        <td align="right"><?php echo number_format($k['inv'],0)?></td>
                                        <td align="right"><?php if($k['so']!=0) echo number_format(100*$k['inv']/$k['so'],1,'.','')."%"; else echo "0.0%"?></td>
                                        <td align="right"><?php if($k['target']!=0) echo number_format(100*$k['inv']/$k['target'],1,'.','')."%"; else echo "0.0%";?></td>
                                        <?php }else{ ?>
                                        <td></td><td></td><td></td><td></td><td></td><td></td>
                                           <?php } ?>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                }
                                if($no  %6 == 0){
                                    ?>
                                    <tr style="font-weight:bold">
                                        <td></td>
                                        <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEMESTER <?php echo $no/6?></b></td>
                                        <?php
                                        foreach ($kalk as $k) {
                                        ?>
                                        <?php if($no/6 <= ceil(date('n')/6)) {?>
                                       <td align="right"><?php echo number_format($k['target'],0)?></td>
                                        <td align="right"><?php echo number_format($k['so'],0) ?></td>
                                        <td align="right"><?php if($k['target']!=0) echo number_format(100*$k['so']/$k['target'],1,'.','')."%"; else echo "0.0%";?></td>
                                        <td align="right"><?php echo number_format($k['inv'],0)?></td>
                                        <td align="right"><?php if($k['so']!=0) echo number_format(100*$k['inv']/$k['so'],1,'.','')."%"; else echo "0.0%"?></td>
                                        <td align="right"><?php if($k['target']!=0) echo number_format(100*$k['inv']/$k['target'],1,'.','')."%"; else echo "0.0%";?></td>
                                        <?php }else{ ?>
                                        <td></td><td></td><td></td><td></td><td></td><td></td>
                                           <?php } ?>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php

                                }
                                $no++;
                            }

                            ?>

                            <tr style="font-weight:bold">
                                <td></td>
                                <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEAR TO DATE</b></td>
                                <?php
                                        foreach ($kalk as $k) {
                                        ?>
                                        <?php if($no/12 <= ceil(date('n')/12)) {?>
                                        <td align="right"><?php echo number_format($k['target'],0)?></td>
                                        <td align="right"><?php echo number_format($k['so'],0) ?></td>
                                        <td align="right"><?php if($k['target']!=0) echo number_format(100*$k['so']/$k['target'],1,'.','')."%"; else echo "0.0%";?></td>
                                        <td align="right"><?php echo number_format($k['inv'],0)?></td>
                                        <td align="right"><?php if($k['so']!=0) echo number_format(100*$k['inv']/$k['so'],1,'.','')."%"; else echo "0.0%"?></td>
                                        <td align="right"><?php if($k['target']!=0) echo number_format(100*$k['inv']/$k['target'],1,'.','')."%"; else echo "0.0%";?></td>
                                        <?php }else{ ?>
                                        <td></td><td></td><td></td><td></td><td></td><td></td>
                                           <?php } ?>
                                        <?php
                                        }
                                        ?>
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