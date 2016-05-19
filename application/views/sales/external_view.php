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
                    External Commision Report
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Div</th>
                        <th>A/M</th>
                        <th>SO Date</th>
                        <th>SO No</th>
                        <th>Inv No</th>
                        <th>Customer</th>
                        <th>Total Sales</th>
                        <th>%Extcom Prop.</th>
                        <th>Extcom Prop.</th>
                        <th>Nett after Tax Prop</th>
                        <th>Nett Approved</th>
                        <th>Payment Date</th>
                        <th>Payment Through</th>
                        <th>Status</th>


                    </tr>
                </thead>
                <tbody>
                   <?php
                   $no = 1;
                   foreach($data->result() as $c)
                   {
                    $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','id',$c->am)->row();
                    $cust = $this->mddata->getDataFromTblWhere('tbl_dm_customer','customer_id',$c->customer_id)->row();
                    $so_t = $this->db->query("SELECT SUM(total) as sub_total,
                        SUM(disc) as total_disc,
                        SUM(delivery) as total_delivery
                        FROM tbl_sale_so_detail WHERE id_so=".$c->id)->row();
                    $nett = $so_t->sub_total - $so_t->total_disc + $so_t->total_delivery;
                    $vat = 0.1 * $nett;
                    $grand_total_so = $nett + $vat;
                    ?>
                    <tr>
                        <td><?php echo $no; $no++;?></td>
                        <td><?php echo $c->division?></td>
                        <td><?php echo $am->name?></td>
                        <td><?php echo $c->so_date?></td>
                        <td><?php echo $c->so_no?></td>
                        <td><?php echo $c->inv_no?></td>
                        <td><?php echo isset($cust->name)?$cust->name:'-'?></td>
                        <td><?php echo number_format($grand_total_so,0)?></td>
                        <td><?php echo $c->extcom?></td>
                        <td><?php echo $c->extcom_pro?></td>
                        <td><?php echo $c->nett?></td>
                        <td><?php echo $c->approved?></td>
                        <td><?php echo $c->payment_date?></td>
                        <td><?php echo $c->through?></td>
                        <td><?php 
                            $now = time(); // or your date as well
                            $your_date = strtotime($c->payment_date);
                            $datediff = floor(($now - $your_date)/(60*60*24));
                            if($datediff > 0){
                                echo "CLOSE";
                            }else{
                                echo "OPEN";
                            }
                            ?></td>

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
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>		<script type="text/javascript" src="<?php echo base_url();?>style/js/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
<!-- end of page level js -->		<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>