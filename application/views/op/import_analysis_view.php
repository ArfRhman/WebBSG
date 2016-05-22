	<aside class="right-side">
   <!-- Main content -->
   <section class="content-header">
    <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
       <div class="panel panel-primary" id="hidepanel1">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i style="width: 16px; height: 16px;" id="livicon-46" class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
            Analisa Import - Header
          </h3>
          <span class="pull-right">
            <i class="glyphicon glyphicon-chevron-up clickable"></i>
          </span>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-md-2 control-label" for="type">Supplier</label>
            <div class="col-md-3">
              <?php echo $this->mddata->getDataFromTblWhere('tbl_dm_supplier', 'id', $in->supplier)->row()->supplier; ?>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label class="col-md-2 control-label" for="type">PO No</label>
            <div class="col-md-3">
              <?=$in->po_no;?>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label class="col-md-2 control-label" for="type">PO Date</label>
            <div class="col-md-3">
              <?=$in->po_date;?>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label class="col-md-2 control-label" for="type">PIB Date</label>
            <div class="col-md-3">
              <?php echo $this->mddata->getDataFromTblWhere('tbl_op_po_documentation', 'no_po', $in->no)->row()->pib_date; ?>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label class="col-md-2 control-label" for="type">Forwarder</label>
            <div class="col-md-3">
              <?php echo $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'id', $in->forwarder)->row()->name; ?>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label class="col-md-2 control-label" for="type">Moda</label>
            <div class="col-md-3">
              <?=$in->moda;?>
            </div>
          </div>
        </div>
        <div class="panel panel-primary filterable">
          <div class="panel-heading clearfix  ">
            <div class="panel-title pull-left">
             <div class="caption">
              <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
              Analisa Import - Table
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div style="overflow-x:auto">
            <table class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Item Name</th>
                  <th>Qty</th>
                  <th>Total Purchase</th>
                  <th>All Import Cost</th>
                  <th>%</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $no = 1;
               $total=0;
               $tabel=$this->mddata->getDataFromTblWhere('tbl_op_po_tabel', 'no_po', $in->no);
               $opt=array();
               foreach($opt as $c){
                 $total+=$c->realisasi;
                 ?>
                 <tr>
                   <td><?=$no;$no++;?></td>
                   <td><?=$c->acc_id?></td>
                   <td><?=$c->account?></td>
                   <td><?=$c->tanggal?></td>
                   <td><?=$c->realisasi_no?></td>
                   <td><?=$c->kwitansi_no?></td>
                   <td><?=$c->uraian_realisasi?></td>
                   <td><?=$c->realisasi?></td>
                   <td><?=$c->adjustment?></td>
                   <td>                                                                                                       
                    <div class='btn-group'>                                                     
                      <button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>    
                      <ul class='dropdown-menu pull-right' role='menu'>       
                        <li><a href='<?php echo site_url('op/petty/table_edit/'.$c->no)?>' >Edit</a></li>         
                        <li><a href='<?php echo site_url('op/petty/table_delete/'.$c->no)?>' >Delete</a></li>         
                      </ul>                                                 
                    </div>
                  </td>
                </tr>

                <?php
              }
              ?>
              <tr>
                <th colspan="7"> Subtotal </th>
                <td colspan="3"> <?=$total?></td>
              </tr>
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
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>		

<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>


<!-- end of page level js -->		

</body>
</html>