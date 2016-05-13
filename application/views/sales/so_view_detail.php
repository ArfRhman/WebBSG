	<aside class="right-side">
     <!-- Main content -->
     <section class="content-header">
      <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
        <div class="col-lg-12">
          <?php
          if($this->mddata->access($this->session->userdata('group'), 'd3')->d3 > 1)
          {
              ?>
              <a href="<?php echo site_url('sales/so/add_detail/'.$this->uri->segment(4))?>" class="btn btn-success">Add New Data</a>
              <?php
          }
          ?>
          <div class="panel panel-primary filterable">
            <div class="panel-heading clearfix  ">
                <div class="panel-title pull-left">
                   <div class="caption">
                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Sales Order Detail
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Brand</th>
                        <th>MoU</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Disc</th>
                        <th>Nett Unit</th>
                        <th>Total Price</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                 <?php
                 $no = 1;
                 $subtotal = 0;
                 $disc = 0;
                 $deliv = 0;

                 foreach($so->result() as $c)
                 {
                     $subtotal = $subtotal + $c->total;
                     $disc = $disc + $c->disc;
                     $deliv = $deliv + $c->delivery;

                     ?>
                     <tr>
                       <td><?php echo $no;$no++; ?></td>
                       <td><?php echo $c->item; ?></td>
                       <td><?php echo $c->item_name; ?></td>
                       <td><?php echo $c->brand; ?></td>
                       <td><?php echo $c->mou; ?></td>
                       <td><?php echo $c->qty; ?></td>
                       <td><?php echo !empty($c->price)?number_format($c->price,0):'-'; ?></td>
                       <td><?php echo !empty($c->disc)?number_format($c->disc,0):'-'; ?></td>
                       <td><?php echo !empty($c->nett)?number_format($c->nett,0):'-'; ?></td>
                       <td><?php echo !empty($c->total)?number_format($c->total,0):'-'; ?></td>
                       <td>
                        <div class='btn-group'>
                         <button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>
                         <ul class='dropdown-menu pull-right' role='menu'>															
                           <li><a href='<?php echo site_url('sales/so/edit_detail/'.$c->id);?>' >Edit</a></li>
                           <li><a href='<?php echo site_url('sales/so/delete_detail/'.$c->id);?>'>Delete</a></li>
                       </ul>													
                   </div>
               </td>
           </tr>
           <?php
       }
         $nbtax = $subtotal - $disc + $deliv;
         $vat = (10/100) * $nbtax;
         $gran = $nbtax + $vat;
       ?>
       <tr>
           <table class="table table-responsive" style="width: 45%;" align="right">
           <tr>
               <th class="text-right">Subtotal</th>
                <th class="text-left"><?php echo number_format($subtotal,0); ?></th>
           </tr>
           <tr>
                <th class="text-right">Discount</th>
                <th class="text-left"><?php echo number_format($disc,0); ?></th>
           </tr>
           <tr>
                <th class="text-right">Delv. Cost</th>
                <th class="text-left"><?php echo number_format($deliv,0); ?></th>
           </tr>
           <tr>
                <th class="text-right">Nett Before Tax</th>
                <th class="text-left"><?php echo number_format($nbtax,0); ?></th>
           </tr>
           <tr>
                <th class="text-right">Vat 10%</th>
                <th class="text-left"><?php echo number_format($vat,4); ?></th>
           </tr>
           <tr>
                <th class="text-right">Grand Total</th>
                <th class="text-left"><?php echo number_format($gran,4); ?></th>
           </tr>
           </table>
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
<!-- end of page level js -->		
<script>		$(document).ready(function(){			$('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('sales/so/delete');?>/"+btn.data('id');					}				});			});		});	</script>
</body>
</html>