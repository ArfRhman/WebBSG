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
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width="40%">Bulan</th>
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
                       $target = $this->db->query('SELECT SUM(amount) as total from tbl_sale_target WHERE SUBSTR(periode,1,3)="'.SUBSTR($b,0,3).'" AND SUBSTR(periode,5,4)='.$thn)->row();
                       $payment = $this->db->query('SELECT SUM(amount) as total from tbl_sale_so_payment WHERE SUBSTR(payment_date,4,3)="'.SUBSTR($b,0,3).'" AND SUBSTR(payment_date,8,4)='.$thn)->row();

                       ?>
                       <tr>
                        <td><?php echo $no?></td>
                        <td><?php echo $b?></td>
                        <td><?php echo number_format($target->total, 0)?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo number_format($payment->total, 0)?></td>
                        <td></td>
                        <td></td>

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
                    $total_target +=$target->total;
                    $total_payment +=$payment->total;
                    if($no%3==0){
                        ?>
                        <tr style="font-weight:bold">
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;QUARTER <?php echo $no/3?></td>
                            <?php if($no/3 <= ceil(date('n')/3)) {?>
                            <td align="right"><?php echo number_format($total_target,0)?></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"><?php echo number_format($total_payment,0)?></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                               <?php } ?>

                        </tr>
                        <?php
                    }
                    if($no%6==0){
                        ?>
                        <tr style="font-weight:bold">
                            <td></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;SEMESTER <?php echo $no/6?></td>
                            <?php if($no/6 <= ceil(date('n')/6)) {?>
                            <td align="right"><?php echo number_format($total_target,0)?></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"><?php echo number_format($total_payment,0)?></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
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
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="right"><?php echo number_format($total_payment,0)?></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <?php }else{ ?>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
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