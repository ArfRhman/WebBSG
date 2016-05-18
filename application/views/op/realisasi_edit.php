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
                                    Edit Realisasi
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/realisasi/update');?>" method="post">
                                <input type="hidden" name="no" value="<?=$re->no?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="code">Budget Code</label>
                                            <div class="col-md-7">
                                            <select name="code" id="code" class="form-control">
                                                    <?php 
                                                        foreach($this->mddata->getAllDataTbl('tbl_dm_budget')->result() as $c)
                                                        {
                                                        ?>
                                                        <option value="<?php echo $c->id; ?>" <?=$c->id==$re->budget_code ? 'selected' : ''?>><?php echo $c->code; ?> - <?php echo $c->level2; ?></option>    
                                                        <?php
                                                        }
                                                    ?>
                                                    </select></div>
                                                
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="main">Main Budget</label>
                                            <div class="col-md-7">
                                                <input id="main" value="<?=$re->main_budget?>" readonly="true" name="main" placeholder="Main Budget" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="budget_1">Sub Budget Level 1</label>
                                            <div class="col-md-7">
                                                <input id="budget_1" value="<?=$re->sub_budget_level1?>" readonly="true" name="budget_1" placeholder="Sub Budget Level 1" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="budget_2">Sub Budget Level 2</label>
                                            <div class="col-md-7">
                                                <input id="budget_2" value="<?=$re->sub_budget_level2?>" readonly="true" name="budget_2" placeholder="Sub Budget Level 2" class="form-control" type="text"></div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="date">Date</label>
                                            <div class="col-md-7">
                                                <input id="date" value="<?=$re->date?>" name="date" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="desc">Transaction Description</label>
                                            <div class="col-md-7">
                                                <input id="desc" value="<?=$re->transaction_description?>" name="desc" placeholder="Transaction Description" class="form-control" type="text"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="amount">Amount</label>
                                            <div class="col-md-7">
                                                <input id="amount" value="<?=$re->amount?>" name="amount" placeholder="Amount" class="form-control" type="text"></div>
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

    <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->
    
    <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>
    <!-- end of page level js -->
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format:'dd M yyyy'
            });
            
             $("#code").change(function(){
                      if($("#code").val()!=""){
                          $.ajax({
                            type:'POST',
                            url: "<?php echo site_url('dm/budget/get_field') ?>",
                            data: "id=" + $("#code").val(),
                            success: function(data){
                               var obj = JSON.parse(data);
                              
                               $('#main').val(obj.main);
                                $('#budget_1').val(obj.level1);
                                $('#budget_2').val(obj.level2);

                           }
                       }); 

                      }else{
                         $('#main').val('');
                                $('#budget_1').val('');
                                $('#budget_2').val('');
                    } 
            });
              
        });
        
    </script>
</body>
</html>