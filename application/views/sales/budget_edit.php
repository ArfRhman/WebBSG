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
                    Edit Budget
                </h3>
                <span class="pull-right">
                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/budget/update');?>" method="post">
                    <input type="hidden" name="no" value="<?=$budget->no;?>"/>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Budget Code</label>
                            <div class="col-md-3">
                              <select name="budget_cd" class="form-control" id="budgetCd">
                                  <option value="" selected>-- Pilih Budget Code --</option>
                                  <?php
                                  $sql = $this->mddata->getAllDataTbl('tbl_dm_budget');
                                  foreach($sql->result() as $s)
                                  {
                                    ?>
                                    <option value="<?php echo $s->id; ?>" <?=$budget->budget_code == $s->id ? 'selected' : ''?>><?php echo $s->code ?> - <?php echo $s->level2 ?></option>
                                    <?php
                                }
                                ?>
                            </select>   
                        </div>                                                                                  <label class="col-md-2 control-label" for="email">Main Budget</label>
                        <div class="col-md-3">
                            <input id="mainBudget" value="<?=$budget->main_budget;?>" name="main_budget" placeholder="Main Budget" class="form-control" type="text" readonly></div>      
                        </div>
                        <div class="form-group">
                           <label class="col-md-2 control-label" for="email">Sub Budget Level 1</label>
                           <div class="col-md-3">
                            <input id="subBudgetLv1" value="<?=$budget->sub_budget_level1;?>" name="sub_budget_lv1" placeholder="Sub Budget Level 1" class="form-control" type="text" readonly></div>                                                                                            <label class="col-md-2 control-label" for="email">Sub Budget Level 2</label>
                            <div class="col-md-3">
                                <input id="subBudgetLv2" value="<?=$budget->sub_budget_level2;?>" name="sub_budget_lv2" placeholder="Sub Budget Level 2" class="form-control" type="text" readonly></div>
                            </div>
                            <div class="form-group">
                               <label class="col-md-2 control-label" for="email">Periode</label>
                               <div class="col-md-3">
                                <input id="email" value="<?=$budget->periode;?>" name="periode" placeholder="Periode" class="form-control datepicker" type="text"></div>                                                                                       
                                <label class="col-md-2 control-label" for="email">Amount</label>
                                <div class="col-md-3">
                                    <input id="email" value="<?=$budget->amount;?>" name="amount" placeholder="Amount" class="form-control" type="text"></div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
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
<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>     <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
<!-- end of page level js -->       <script>        $(document).ready(function(){           $('.datepicker').datepicker({               format:'M yyyy'          });     
    $("#budgetCd").change(function(){
      if($("#budgetCd").val()!=""){
          $.ajax({
            type:'POST',
            url: "<?php echo site_url('sales/budget/getDataBudget') ?>",
            data: "id=" + $("#budgetCd").val(),
            success: function(data){
               var obj = JSON.parse(data);
               $('#mainBudget').val(obj.main);
               $('#subBudgetLv1').val(obj.level1);
               $('#subBudgetLv2').val(obj.level2);
           }
       }); 

      }else{
       $('#mainBudget').val('');
       $('#subBudgetLv1').val('');
       $('#subBudgetLv2').val('');
   } 
});
});     </script>
</body>
</html>