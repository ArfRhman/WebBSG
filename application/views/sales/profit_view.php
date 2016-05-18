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
                    Profit Analysis Report
                </div>
            </div>
        </div>
        <div class="panel-body" style="width:99%;overflow-x:scroll">
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
                        <th>Total Purchase</th>
                        <th>Gross Profit</th>
                        <th>Salescom</th>
                        <th>Extcom</th>
                        <th>Interest</th>
                        <th>Transport</th>
                        <th>Adm </th>
                        <th>Other</th>
                        <th>Total Cost</th>
                        <th>E.N.P 1</th>
                        <th>Adjustment</th>
                        <th>E.N.P 2</th>
                        <th>% E.N.P</th>

                        
                    </tr>
                </thead>
                <tbody>
                  <?php
                     $no = 1;
                     foreach($data->result() as $c)
                     {
                        $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','id',$c->am)->row();
                        $cust = $this->mddata->getDataFromTblWhere('tbl_dm_customer','customer_id',$c->customer_id)->row();
                         ?>
                   <tr>
                    <td><?php echo $no; $no++;?></td>
                    <td><?php echo $c->division?></td>
                    <td><?php echo $am->name?></td>
                    <td><?php echo $c->so_date?></td>
                    <td><?php echo $c->so_no?></td>
                    <td><?php echo $c->inv_no?></td>
                    <td><?php echo isset($cust->name)?$cust->name:'-'?></td>
                    <td><?php echo number_format($c->total_so,0)?></td>
                    <td><?php echo number_format($c->total_purchase,0)?></td>
                    <td><?php $gross = $c->total_so - $c->total_purchase; echo $gross ?></td>
                    <td><?php echo $c->sales?></td>
                    <td><?php echo $c->extcom_pro?></td>
                    <td><?php echo $c->bank?></td>
                    <td><?php echo $c->transport?></td>
                    <td><?php echo $c->adm?></td>
                    <td><?php echo $c->other?></td>
                    <td><?php $total_cost = $c->sales + $c->extcom_pro + $c->bank + $c->transport + $c->adm + $c->other;
                    echo number_format($total_cost,0) ?></td>
                    <td><?php $enp1 = $gross - $total_cost; echo number_format($enp1,0);?></td>
                    <td><?php echo number_format($c->adjustment,0); ?></td>
                    <td><?php $enp2 = $enp1 +  $c->adjustment;
                    echo number_format($enp2,0);
                    ?></td>
                    <td><?php echo $c->total_so!=0?number_format(100* $enp2/$c->total_so,2,'.',''):'0'?>%</td>
                    
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