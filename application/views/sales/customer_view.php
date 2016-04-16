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
                        Sales Report by Customer: (1) Year to date of Operator, (2) Year to date of Mitra
                    </div>
                </div>
            </div>
            <div class="panel-body" style="width:99%;overflow-x:scroll">
                <table class="table table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <?php
                            $no = 1;
                            $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                            foreach($bln as $b)
                            {
                                ?>
                                <th><?php echo $b?></th>
                                <?php
                                if($no%3==0){
                                    echo "<th>Quarter ".round($no/3)."</th>";    
                                }
                                if($no%6==0){
                                    echo "<th>Semester ".round($no/6)."</th>";    
                                }
                                $no++;
                            }
                            echo "<th>End Year Date</th>";  
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     $no = 1;
                     $thn = date('Y');
                     foreach($data->result() as $c)
                     {

                         ?>
                         <tr>
                            <td align="right"><?php echo $no;$no++;?></td>
                            <td><a href="<?php echo site_url('sales/customer/detail/'.$c->id) ?>"><?php echo $c->name;?></a></td>
                            <?php
                            $id = $c->id;
                            $total_so = 0;
                            $n = 1;
                            foreach ($bln as $b) {
                               $so = $this->db->query('SELECT
                                SUM(grand_total) as total
                                FROM
                                tbl_sale_so_detail
                                WHERE
                                id_so IN (
                                    SELECT
                                    id
                                    FROM
                                    tbl_sale_so
                                    WHERE
                                    customer_id = '.$id.'
                                    AND SUBSTR(so_date, 4, 3) = "'.substr($b, 0,3).'"
                                    AND SUBSTR(so_date, 8, 4) = '.$thn.'
                                    )')->row();
                                    
                                    if($n <= ceil(date('n'))) echo "<td align='right'>". number_format($so->total,0)."</th>"; 
                                    else echo "<td></td>";   
                                    $total_so +=$so->total;
                                    if($n%3==0){
                                        if($n/3 <= ceil(date('n')/3)) echo "<td align='right'>".number_format($total_so,0)."</th>"; 
                                        else echo "<td></td>";   
                                    }
                                    if($n%6==0){
                                        if($n/6 <= ceil(date('n')/6)) echo "<td align='right'>".number_format($total_so,0)."</th>"; 
                                        else echo "<td></td>";     
                                    }

                                    $n++;
                                }
                                if($n/12 <= ceil(date('n')/12)) echo "<td align='right'>". number_format($total_so,0)."</th>"; 
                                    else echo "<td></td>";  
                                ?>
                                

                            </tr>
                            <?php
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
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>     <script type="text/javascript" src="<?php echo base_url();?>style/js/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
<!-- end of page level js -->       <script>        $(document).ready(function(){           $('.delete').on('click',function(){             var btn = $(this);              bootbox.confirm('Are you sure to delete this record?', function(result){                    if(result ==true){                      window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id');                   }               });         });     }); </script>
</body>
</html>