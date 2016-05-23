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
                        Import Lead Time Report
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div style="overflow-x:scroll">
                    <table class="table table-striped table-responsive" id="table1">
                        <thead>
                            <tr>
                                <th>Items Category</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Supplier</th>
                                <th>PO No</th>
                                <th>PO Date</th>
                                <th>B/L Date</th>
                                <th>GR Date</th>
                                <th>Shipment Mode</th>
                                <th>Overall Lead Time (Sea)</th>
                                <th>Production Lead Time (Sea)</th>
                                <th>Shipping Lead Time (Sea)</th>
                                <th>Clearance Lead Time (Sea)</th>
                                <th>Overall Lead Time (Air)</th>
                                <th>Production Lead Time (Air)</th>
                                <th>Shipping Lead Time (Air)</th>
                                <th>Clearance Lead Time (Air)</th>
                                <th>Forwarder Name</th>
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
                            ?>
                            <tr>
                                <td><?php echo $no; $no++; ?></td>
                                <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $tabel->item_code)->row()->kategori; ?></td>
                                <td><?php echo $tabel->item ?></td>
                                <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_supplier', 'id', $c->supplier)->row()->supplier; ?></td>
                                <td><?php echo $c->po_no ?></td>
                                <td><?php echo $c->po_date ?></td>
                                <td><?php echo $doc->awb_bl ?></td>
                                <td><?php echo $doc->gr_date ?></td>
                                <td><?php echo $c->moda ?></td>
                                <td><?= $c->moda=='Sea' ? $lead->actual_lead_time : '-' ?></td>
                                <td><?= $c->moda=='Sea' ? (strtotime($lead->atf_production)-strtotime($c->po_date))/(60*60*24) : '-' ?> Days</td>
                                <td><?= $c->moda=='Sea' ? (strtotime($lead->atf_vessel_arrival)-strtotime($lead->atf_vessel_depart))/(60*60*24) : '-' ?> Days</td>
                                <td><?= $c->moda=='Sea' ? (strtotime($lead->atf_clearance)-strtotime($lead->atf_vessel_arrival))/(60*60*24) : '-' ?> Days</td>
                                <td><?= $c->moda=='Air' ? $lead->actual_lead_time : '-' ?></td>
                                <td><?= $c->moda=='Air' ? (strtotime($lead->atf_production)-strtotime($c->po_date))/(60*60*24) : '-' ?> Days</td>
                                <td><?= $c->moda=='Air' ? (strtotime($lead->atf_vessel_arrival)-strtotime($lead->atf_vessel_depart))/(60*60*24) : '-' ?> Days</td>
                                <td><?= $c->moda=='Air' ? (strtotime($lead->atf_clearance)-strtotime($lead->atf_vessel_arrival))/(60*60*24) : '-' ?> Days</td>
                                <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'id', $c->forwarder)->row()->name; ?></td>
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