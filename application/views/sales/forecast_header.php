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
                    Forecast vs Sales
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Operator</th>
                        <th>Forecast Amount</th>
                        <th>SO Amount</th>
                    </tr>
                </thead>
                <tbody>

                 <?php
                 $no = 1;
                 foreach($data->result() as $c)
                 {
                    $id = $c->id;
                    $target = $this->db->query('SELECT
                        SUM(amount) as total
                        FROM
                        tbl_sale_target
                        WHERE
                        operator = '.$id
                        )->row();
                    // $so = $this->db->query('SELECT
                    //     SUM(qty) as total
                    //     FROM
                    //     tbl_sale_so_detail
                    //     WHERE
                    //     id_so IN (
                    //         SELECT
                    //         id
                    //         FROM
                    //         tbl_sale_so
                    //         WHERE
                    //         operator ='.$id.'
                    //         )')->row();
                    $so_t = $this->db->query("SELECT SUM(total) as sub_total,
                            SUM(disc) as total_disc,
                            SUM(delivery) as total_delivery
                            FROM tbl_sale_so_detail WHERE id_so IN (
                             SELECT
                             id
                             FROM
                             tbl_sale_so
                             WHERE
                             operator ='".$id."'
                             )")->row();
                    $nett = $so_t->sub_total - $so_t->total_disc + $so_t->total_delivery;
                    $vat = 0.1 * $nett;
                    $grand_total_so = $nett + $vat;
                            ?>
                            <tr>
                               <td><?php echo $no;?></td>
                               <td><a href="<?php echo site_url('sales/forecast/detail/'.$c->id)?>"><?php echo $c->name ?></td>
                               <td align="right"><?php echo number_format($target->total); ?></td>
                               <td align="right"><?php echo number_format($grand_total_so); ?></td>

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
<!-- end of page level js -->		
<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('sales/so/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>