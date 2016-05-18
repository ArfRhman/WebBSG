	<aside class="right-side">
     <!-- Main content -->
     <section class="content-header">
      <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
        <div class="col-lg-12">
           <?php
           if($this->session->flashdata('data') == TRUE)
           {
               ?>
               <div class="panel-heading">
                <h3 class="panel-title">
                    <?php echo $this->session->flashdata('data');?>
                </h3>
            </div>
            <?php
        }
        ?>
        <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i style="width: 16px; height: 16px;" id="livicon-46" class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Profit Analisis Per Sales Order
                </h3>
                <span class="pull-right">
                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <?php  $am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','id',$data->am)->row();
                $cust = $this->mddata->getDataFromTblWhere('tbl_dm_customer','id',$data->customer_id)->row(); ?>
                <fieldset>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">Div</label>
                        <div class="col-md-3"> : <?php echo $data->division ?></div>
                        <label class="col-md-2 control-label" for="name">A/M</label>
                        <div class="col-md-3"> : <?php echo $am->name?></div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">SO Date</label>
                        <div class="col-md-3"> : <?php echo  $data->so_date ?></div>
                        <label class="col-md-2 control-label" for="name">SO No</label>
                        <div class="col-md-3"> : <?php echo $data->so_no?></div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">Inv No</label>
                        <div class="col-md-3"> : <?php echo $data->inv_no ?></div>
                        <label class="col-md-2 control-label" for="name">Customer</label>
                        <div class="col-md-3"> : <?php echo isset($cust->name)?$cust->name:'-'?></div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">Total Sales</label>
                        <div class="col-md-3"> : <?php echo number_format($data->total_so,0) ?></div>
                        <label class="col-md-2 control-label" for="name">Total Purchaser</label>
                        <div class="col-md-3"> : <?php echo number_format($data->total_purchase,0)?></div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">Gross Profit</label>
                        <div class="col-md-3"> : <?php $gross = $data->total_so - $data->total_purchase; echo $gross ?></div>
                        <label class="col-md-2 control-label" for="name">Salescom</label>
                        <div class="col-md-3"> : <?php echo $data->sales?></div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">Extcom</label>
                        <div class="col-md-3"> : <?php echo $data->extcom_pro ?></div>
                        <label class="col-md-2 control-label" for="name">Interest</label>
                        <div class="col-md-3"> : <?php echo $data->bank?></div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">Transport</label>
                        <div class="col-md-3"> : <?php echo $data->transport ?></div>
                        <label class="col-md-2 control-label" for="name">Adm </label>
                        <div class="col-md-3"> : <?php echo $data->adm?></div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 1%;">
                        <label class="col-md-2 control-label" for="name">Other</label>
                        <div class="col-md-3"> : <?php echo $data->other ?></div>
                        <label class="col-md-2 control-label" for="name">Total Cost</label>
                        <div class="col-md-3"> : <?php $total_cost = $data->sales + $data->extcom_pro + $data->bank + $data->transport + $data->adm + $data->other;
                            echo number_format($total_cost,0); ?></div>
                        </div>
                         <form  enctype="multipart/form-data" action="<?php echo site_url('sales/so/update_adjusment/'.$this->uri->segment(4));?>" method="post">
                        <div class="col-md-12" style="margin-bottom: 1%;">
                            <label class="col-md-2 control-label" for="name">E.N.P 1</label>
                            <div class="col-md-3"> : <?php $enp1 = $gross - $total_cost; echo number_format($enp1,0); ?></div>
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="name">Adjustment</label>
                              <div class="col-md-3">
                                 <input name="adjustment" placeholder="Adjustment" class="form-control" type="text" value="<?php echo $data->adjustment ?>"><input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>"></div>                                                                                                   </div>
                             </div>
                             <div class="col-md-12" style="margin-bottom: 1%;">
                                <label class="col-md-2 control-label" for="name">E.N.P 2</label>
                                <div class="col-md-3"> : <?php if(isset($data->adjustment)){$enp2 = $enp1 +  $data->adjustment; echo number_format($enp2,0);}else{echo '-';}?></div>
                                <label class="col-md-2 control-label" for="name">% E.N.P </label>
                                <div class="col-md-3"> :                                
                                    <?php
                                     if(isset($data->adjustment)){
                                        if($data->total_so!=0){
                                            echo number_format(100 * $enp2/$data->total_so,2,'.','.').' %';
                                        }else{
                                            echo '0';}
                                        }else{
                                    echo '-';} ?></div>
                                    </div>
                                      <div class="form-group">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button>
                                                        </div>
                                                    </div>
                                    </form>
                                </fieldset>
                           
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
<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>	    <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
<!-- end of page level js -->		<script>		$(document).ready(function(){			$('.datepicker').datepicker({				format:'dd M yyyy'			});		});		</script>
</body>
</html>