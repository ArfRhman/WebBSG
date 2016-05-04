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
                                Division Budget vs Actual
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div style="overflow:auto;">
                            <?php 
                            $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                            $bln2 = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                            $thn = date('Y');?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       <th colspan="2" rowspan="2">Cost of Account</th>
                                       <?php foreach ($bln as $b) { ?>
                                       <th colspan="3"><?php echo $b.' '.$thn ?></th>
                                       <?php } ?>
                                   </tr>
                                   <tr>
                                       <?php foreach ($bln as $b) { ?>
                                       <th>Budget</th>
                                       <th>Realisasi</th>
                                       <th>%</th>
                                       <?php } ?>
                                   </tr>
                               </thead>
                               <tbody>

                                <?php
                                $sql = $this->db->query("SELECT code,main FROM tbl_dm_budget GROUP BY main");
                                foreach ($sql->result() as $d) { ?>
                                <tr>
                                    <td><b><?php echo substr($d->code,0,1).'0000000' ?></b></td>
                                    <td><b><?php echo $d->main ?></b></td>
                                    <td colspan="36"><?php //echo $no; $no++; ?></td>
                                </tr>
                                <?php
                                $sql2 = $this->db->query("SELECT id,code,level1 FROM tbl_dm_budget WHERE SUBSTR(code,1,1) = substr($d->code,1,1)");
                                foreach ($sql2->result() as $d2) { ?>
                                <tr>
                                    <td><b><?php echo substr($d2->code,0,2).'000000' ?></b></td>
                                    <td><b><?php echo $d2->level1 ?></b></td>

                                    <?php
                                    foreach ($bln2 as $bl) {
                                       $am1 = 0;
                                        $am2 = 0;
                                       $sql31 = $this->db->query("SELECT id,code,level2 FROM tbl_dm_budget WHERE SUBSTR(code,1,2) = substr($d2->code,1,2)");
                                      
                                       foreach ($sql31->result() as $d31) { 
                                       $sql41 = $this->db->query("SELECT amount AS amb FROM tbl_sale_budget WHERE budget_code = '".$d31->id."' AND SUBSTR(periode,1,3) = '".$bl."' AND SUBSTR(periode,5,4) = '".$thn."'")->row();
                                        $sql51 = $this->db->query("SELECT amount AS amr FROM tbl_sale_realisasi WHERE budget_code = '".$d31->id."' AND SUBSTR(date,1,3) = '".$bl."' AND SUBSTR(date,5,4) = '".$thn."'")->row();

                                        isset($sql41->amb)?$am1 = $am1 + $sql41->amb:'-'; 
                                        isset($sql51->amr)?$am2 = $am2 + $sql51->amr:'-'; 
                                       } ?>
                                       <td><?php echo ($am1!=0)?$am1:'-';?></td>
                                       <td><?php echo ($am2!=0)?$am2:'-';?></td>
                                       <td><?php if(isset($am1) AND $am2!=0){
                                        echo number_format($am2/$am1*100,1,'.','')."%";}
                                        else{echo "-";}?></td>
                                      
                                       <?php } ?>
                                   </tr>
                                   <?php
                                   $sql3 = $this->db->query("SELECT id,code,level2 FROM tbl_dm_budget WHERE SUBSTR(code,1,2) = substr($d2->code,1,2)");
                                   foreach ($sql3->result() as $d3) { ?>
                                   <tr>
                                    <td><?php echo $d3->code?></td>
                                    <td><?php echo $d3->level2 ?></td>
                                    <?php
                                    foreach ($bln2 as $bl) {
                                     $sql4 = $this->db->query("SELECT amount AS amb FROM tbl_sale_budget WHERE SUBSTR(periode,1,3) = '".$bl."' AND SUBSTR(periode,5,4) = '".$thn."' AND budget_code='".$d3->id."'")->row();
                                     $sql5 = $this->db->query("SELECT amount AS amr FROM tbl_sale_realisasi WHERE SUBSTR(date,1,3) = '".$bl."' AND SUBSTR(date,5,4) = '".$thn."' AND budget_code='".$d3->id."'")->row();
                                     ?>
                                     <td><?php echo isset($sql4->amb)?$sql4->amb:'-'?></td>
                                     <td><?php echo isset($sql5->amr)?$sql5->amr:'-'?></td>
                                     <td><?php if(isset($sql4->amb) AND isset($sql5->amr)){
                                        echo number_format($sql5->amr/$sql4->amb*100,1,'.','')."%";}
                                        else{echo "-";}?></td>
                                        <?php } ?>


                                    </tr>

                                    <?php } ?>
                                    <?php break; } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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