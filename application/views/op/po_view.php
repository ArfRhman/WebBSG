	<aside class="right-side">
     <!-- Main content -->
     <section class="content-header">
      <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
        <div class="col-lg-12">
          <?php
          if($this->mddata->access($this->session->userdata('group'), 'd15')->d15 > 1)
          {
              ?>							<a href="<?php echo site_url('op/po/add')?>" class="btn btn-success">Add New Data</a>
              <?php
          }
          ?>
          <a href="<?php echo site_url('op/po/payment')?>" class="btn btn-success">Payment Information</a>
          <a href="<?php echo site_url('op/po/report')?>" class="btn btn-success">Report</a>
          <div class="panel panel-primary filterable">
            <div class="panel-heading clearfix  ">
                <div class="panel-title pull-left">
                   <div class="caption">
                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Purchase Order
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
                        <th>PO Date</th>
                        <th>Pureq No</th>
                        <th>Pureq Recv. Date</th>
                        <th>Supplier</th>
                        <th>Description</th>
                        <th>Purpose of</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Forwarder</th>
                        <th>Payment Type</th>
                        <th>ETF LC</th>
                        <th>ETF Production</th>
                        <th>ETF Vessel Depart</th>
                        <th>ETF Vessel Arrival</th>
                        <th>ETF Clearance</th>
                        <th>ETF WH Arrival</th>
                        <th>Estimated Lead Time (days)</th>
                        <th>ATF LC</th>
                        <th>ATF Production</th>
                        <th>ATF Vessel Depart</th>
                        <th>ATF Vessel Arrival</th>
                        <th>ATF Clearance</th>
                        <th>ATF WH Arrival</th>
                        <th>Actual Lead Time (days)</th>
                        <th>Deviation (days)</th>
                        <th>Forecast Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $no = 1;
                   foreach($data->result() as $c)
                   {
                    $etf=$this->mddata->getDataFromTblWhere('tbl_op_po_lead_time', 'no_po', $c->no)->row();
                    $cost=$this->mddata->getDataFromTblWhere('tbl_op_po_costing', 'no_po', $c->no)->row();
                    ?>
                    <tr>
                        <td><?=$no; $no++;?></td>
                        <td><?=$c->po_no?></td>
                        <td><?=$c->po_date?></td>
                        <td><?=$c->pureq_no?></td>
                        <td><?=$c->pureq_date?></td>
                        <td><?= $this->mddata->getDataFromTblWhere('tbl_dm_supplier', 'id', $c->supplier)->row()->supplier?></td>
                        <td><?=$c->description?></td>
                        <td><?=$c->purpose_of?></td>
                        <td><?= strtoupper($c->currency)?></td>
                        <td><?=$cost->po_amount?></td>
                        <td><?= $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'id', $c->forwarder)->row()->name?></td>
                        <td><?=$c->payment_type?></td>
                        <td><?=$etf->etf_lc?></td>
                        <td><?=$etf->etf_production?></td>
                        <td><?=$etf->etf_vessel_depart?></td>
                        <td><?=$etf->etf_vessel_arrival?></td>
                        <td><?=$etf->etf_clearance?></td>
                        <td><?=$etf->etf_wh_arrival?></td>
                        <td><?=$etf->estimated_lead_time?></td>
                        <td><?=$etf->atf_lc?></td>
                        <td><?=$etf->atf_production?></td>
                        <td><?=$etf->atf_vessel_depart?></td>
                        <td><?=$etf->atf_vessel_arrival?></td>
                        <td><?=$etf->atf_clearance?></td>
                        <td><?=$etf->atf_wh_arrival?></td>
                        <td><?=$etf->actual_lead_time?></td>
                        <td><?=$etf->deviation?></td>
                        <td><?=$etf->forecast_level?></td>
                        <td>                                                                                                       
                            <div class='btn-group'>
                                <button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>
                                <ul class='dropdown-menu pull-right' role='menu'>
                                    <li><a href='<?php echo site_url('op/po/edit/'.$c->no)?>' >Edit</a></li>
                                    <li><a href='<?php echo site_url('op/po/delete/'.$c->no)?>' class="delete">Delete</a></li>
                                </ul>
                            </div>
                        </td>
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