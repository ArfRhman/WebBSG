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
                    Sales Report by Product: (1) Year to date, (2) Pareto: product vs profit
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">ITEM</th>
                        <th colspan="4">SALES AMOUNT</th>
                        <th colspan="4">INVOICED</th>
                        <th colspan="3">PROFIT</th>
                    </tr>
                    <tr>
                        <th>QTY</th>
                        <th>AVG UNIT PRICE</th>
                        <th>TOTAL SALES</th>
                        <th>%</th>
                        <th>QTY</th>
                        <th>AVG UNIT PRICE</th>
                        <th>TOTAL SALES</th>
                        <th>%</th>
                        <th>AMOUNT</th>
                        <th>%</th>
                        <th>% CONT</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $no = 1;
                   $q = $this->db->query('SELECT
                    item,
                    nama,
                    SUM(qty) AS total_qty,
                    AVG(price) AS avg
                    FROM
                    tbl_sale_so_detail so
                    JOIN tbl_dm_item it ON so.item = it.id
                    GROUP BY
                    item
                    ORDER BY total_qty DESC LIMIT 9');
                  
                   $item_no = array();
                   $total_sales = 0;
                   $total_profit = 0;
                   $total_inv = 0;
                   foreach ($q->result() as $h) {
                        $profit = $this->db->query("SELECT AVG(DDP_IDR) as avg from tbl_op_price_list WHERE item_id='".$h->item."'")->row();
                    $inv = $this->db->query("SELECT SUM(amount) as total from tbl_sale_so_invoicing WHERE item_id='".$h->item."'")->row();
                      $profit_amount = ($h->avg - $profit->avg) * $h->total_qty;
                      $total_sales += $h->total_qty * $h->avg;
                       $total_profit +=$profit_amount;

                       $qty_inv = $inv->total/$h->avg;
                       $total_inv += $qty_inv*$h->avg;
                       array_push($item_no, $h->item);
                   }
                   $o = $this->db->query('SELECT
                                                "REST BALANCE" as nama,
                                                SUM(qty) AS total_qty,
                                                AVG(price) AS avg
                                            FROM
                                                tbl_sale_so_detail WHERE item NOT IN('.implode(',',$item_no).')')->row();
                   $total_sales +=$o->total_qty * $o->avg;

                   foreach($q->result() as $c)
                   {  
                    $profit = $this->db->query("SELECT AVG(DDP_IDR) as avg from tbl_op_price_list WHERE item_id='".$c->item."'")->row();
                    $inv = $this->db->query("SELECT SUM(amount) as total from tbl_sale_so_invoicing WHERE item_id='".$c->item."'")->row();
                       $profit_amount = ($c->avg - $profit->avg) * $c->total_qty;
                       ?>
                       <tr>
                        <td align="right"><?php echo $no?></td>
                        <td><?php echo $c->nama?></td>
                        <td align="right"><?php echo number_format($c->total_qty,0)?></td>
                        <td align="right"><?php echo number_format($c->avg,0)?></td>
                        <td align="right"><?php $ts = $c->total_qty * $c->avg; echo number_format($ts,0)?></td>
                        <td align="right"><?php echo number_format( 100*$ts/$total_sales,1)."%"?></td>
                        <td><?php $qty_inv = $inv->total/$c->avg; echo number_format($qty_inv,0)?></td>
                        <td><?php echo number_format($c->avg,0)?></td>
                        <td><?php $inv_sales = $qty_inv * $c->avg; echo number_format($inv_sales,0)?></td>
                        <td><?php echo number_format( 100*$inv_sales/$total_inv,2)."%"?></td>
                        <td align="right"><?php echo number_format( $profit_amount,0)?></td>
                        <td><?php echo ($inv_sales!=0)?number_format( 100*$profit_amount/$inv_sales,2):0?>%</td>
                        <td align="right"><?php echo number_format( 100*$profit_amount/$total_profit,1)."%"?></td>
                    </tr>

                    <?php
                    $no++;

					}
                    if($no==10){
                        $o_profit = $this->db->query("SELECT AVG(DDP_IDR) as avg from tbl_op_price_list WHERE item_id NOT IN(".implode(',',$item_no).")")->row();
                        $o_inv = $this->db->query("SELECT SUM(amount) as total from tbl_sale_so_invoicing WHERE item_id NOT IN(".implode(',',$item_no).")")->row();
                        $o_profit_amount = ($o->avg - $o_profit->avg) * $o->total_qty;
                        $o_qty_inv = $o_inv->total/$o->avg;
                        $total_inv += $o_qty_inv*$o->avg;
                        $o_profit_amount = ($o->avg - $o_profit->avg) * $o->total_qty;
                       $total_profit +=$o_profit_amount;
                    ?>

                    <tr>
                        <td align="right"><?php echo $no?></td>
                        <td><?php echo $o->nama?></td>
                        <td align="right"><?php echo number_format( $o->total_qty,0)?></td>
                        <td align="right"><?php echo number_format( $o->avg,0)?></td>
                        <td align="right"><?php $ts = $o->total_qty * $o->avg; echo number_format($ts,0)?></td>
                        <td><?php echo number_format( 100*$ts/$total_sales,1)."%"?></td>
                        <td><?php $o_qty_inv = $o_inv->total/$o->avg; echo number_format($o_qty_inv,0)?></td>
                        <td><?php echo number_format($o->avg,0)?><</td>
                        <td><?php $o_inv_sales = $o_qty_inv * $o->avg; echo number_format($o_inv_sales,0)?></td>
                        <td><?php echo number_format( 100*$o_inv_sales/$total_inv,2)."%"?></td>
                        <td align="right"><?php echo number_format( $o_profit_amount,0)?></td>
                        <td><?php echo ($o_inv_sales!=0)?number_format( 100*$o_profit_amount/$o_inv_sales,2):0?>%</td>
                        <td align="right"><?php echo number_format( 100*$o_profit_amount/$total_profit,1)."%"?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th></th>

                        <th class="text-right">TOTAL</th>
                        <th></th>
                        <th></th>
                        <th class="text-right"><?php echo number_format($total_sales,0)?></th>
                        <th class="text-right">100%</th>
                        <th></th>
                        <th></th>
                        <th><?php echo number_format($total_inv,0)?></th>
                        <th>100%</th>
                        <th class="text-right"><?php echo number_format($total_profit,0)?></th>
                        <th><?php echo ($total_inv!=0)?number_format( 100*$total_profit/$total_inv,2):0?>%</th>
                        <th class="text-right">100%</th>
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