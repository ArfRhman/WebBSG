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
                                Edit Visit Report Customer
                            </h3>
                            <span class="pull-right">
                                <i class="glyphicon glyphicon-chevron-up clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/visit/update');?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $data->no ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Visit Date</label>
                                        <div class="col-md-3">
                                            <input id="email" name="visit_date" placeholder="Visit Date" class="form-control datepicker" type="text" value="<?php echo $data->visit_date ?>">
                                        </div>                                                                                      <label class="col-md-2 control-label" for="email">AM / Visitor</label>                                          <div class="col-md-3">                                                 <select name="visit_am" class="form-control">
                                        <?php
                                        $sql = $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'position', '1');
                                        foreach($sql->result() as $s)
                                        {
                                            if($data->am==$s->id){?>
                                            <option value="<?php echo $s->id; ?>" selected><?php echo $s->name ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                                            <?php }
                                        }
                                        ?>
                                    </select></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Accompanied by</label>
                                    <div class="col-md-3">
                                        <input id="email" name="visit_accompanied_by" placeholder="Accompanied by" class="form-control" type="text" value="<?php echo $data->accompanied_by ?>"></div>                                                                                      <label class="col-md-2 control-label" for="email">Company To Visit</label>                                            <div class="col-md-3">                                                 <select name="visit_company" class="form-control">
                                        <?php
                                        $sql = $this->mddata->getAllDataTbl('tbl_dm_customer');
                                        foreach($sql->result() as $s)
                                        {
                                             if($data->company_to_visit==$s->id){?>
                                            <option value="<?php echo $s->id; ?>" selected><?php echo $s->name ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                                            <?php }

                                        }
                                        ?>
                                    </select></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Person to Visit</label>
                                    <div class="col-md-3">
                                       <select name="visit_person" class="form-control">
                                        <?php
                                        $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                                        foreach($sql->result() as $s)
                                        {

                                             if($data->person_to_visit==$s->id){?>
                                            <option value="<?php echo $s->id; ?>" selected><?php echo $s->name ?></option>
                                            <?php }else{ ?>
                                            <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                                            <?php }

                                                                                   }
                                        ?>
                                    </select> </div>                                                                                      <label class="col-md-2 control-label" for="email">People of PTV</label>   
                                    <div class="col-md-3">                                              
                                      <input id="email" name="visit_people" placeholder="People of PTV" class="form-control" type="text" value="<?php echo $data->people_of_PTV ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                               <label class="col-md-2 control-label" for="email">Purpose of Visit</label>   
                               <div class="col-md-3">                                              
                                  <input id="email" name="visit_purpose" placeholder="Purpose of Visit" class="form-control" type="text" value="<?php echo $data->purpose_of_visit ?>">                                                                               
                              </div>
                              <label class="col-md-2 control-label" for="email">Result of Visit</label>   
                              <div class="col-md-3">                                              
                                  <input id="email" name="visit_result" placeholder="Result of Visit" class="form-control" type="text" value="<?php echo $data->result_of_visit ?>">                                                                               
                              </div>
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
<!-- end of page level js -->       <script>        $(document).ready(function(){           $('.datepicker').datepicker({               format:'dd M yyyy'          });     });     </script>
</body>
</html>