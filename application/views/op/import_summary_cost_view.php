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
              Import Cost Report
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div style="overflow-x:scroll">
            <table class="table table-striped table-responsive" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>PO No</th>
                  <th>Supplier</th>
                  <th>Category</th>
                  <th>Item Name</th>
                  <th>Total Purchase</th>
                  <th>Moda</th>
                  <th>Forwarder Name</th>
                  <th>All Import Cost</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $no = 1;
               foreach($in->result() as $c)
               {
                $tabel = $this->mddata->getDataFromTblWhere('tbl_op_po_tabel', 'no_po', $c->no)->row();
                $doc = $this->mddata->getDataFromTblWhere('tbl_op_po_documentation', 'no_po', $c->no)->row();
                $lead = $this->mddata->getDataFromTblWhere('tbl_op_po_lead_time', 'no_po', $c->no)->row();
                $costing = $this->mddata->getDataFromTblWhere('tbl_op_po_costing', 'no_po', $c->no)->row();
                $kate = $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $tabel->item_code)->row();
                if(!empty($kate)){
                  $kat = $kate->kategori;
                }else{
                  $kat ="";
                }
                if($costing->po_amount==0){
                  $amount = 1;
                }else{
                  $amount = $costing->po_amount;
                }
                ?>
                <tr>
                  <td><?php echo $no;$no++; ?></td>
                  <td><a href="<?=base_url()?>index.php/op/import_cost/analysis/<?=$c->po_no?>"><?php echo $c->po_no; ?></a></td>
                  <td>
                    <?php 
                    $supp = $this->mddata->getDataFromTblWhere('tbl_dm_supplier', 'id', $c->supplier)->row();
                    if(!empty($supp)){
                      echo $supp->supplier; 
                    }
                    ?>
                  </td>
                  <td><?php echo $kat?></td>
                  <td><?php echo $tabel->item?></td>
                  <td><?php echo $tabel->qty*$tabel->unit_price?></td>
                  <td><?php echo $c->moda ?></td>
                  <td>
                    <?php 
                    $forwarder_name = $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'id', $c->forwarder)->row();
                    if(!empty($forwarder_name)){
                      echo $forwarder_name->name; 
                    }
                    ?></td>
                    <td><?php echo $costing->total_cost?></td>
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