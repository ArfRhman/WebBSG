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

                        ?>
                        
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

                                    Edit Price List

                                </h3>

                                <span class="pull-right">

                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>

                                </span>

                            </div>

                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/price/update');?>" method="post">
                                <input type="hidden" name="no" value="<?=$op->no?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="created">Created Date</label>
                                            <div class="col-md-3">
                                                <input value="<?=$op->created_date?>" id="created" name="created" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>
                                                <label class="col-md-2 control-label" for="created">Terms & Condition :</label>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="presented">Presented Date</label>
                                                <div class="col-md-3">
                                                   <input value="<?=$op->presented_date?>" id="presented" name="presented" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>
                                                   <label class="col-md-2 control-label" for="price">Price Term</label>

                                                   <div class="col-md-3">
                                                    <input value="<?=$op->price_term?>" id="price" name="price" placeholder="Price Term" class="form-control" type="text">

                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="shared">Shared Date</label>
                                                <div class="col-md-3">
                                                    <input value="<?=$op->shared_date?>" id="shared" name="shared" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>
                                                    <label class="col-md-2 control-label" for="delivery">Delivery Term</label>

                                                    <div class="col-md-3">
                                                        <input value="<?=$op->delivery_term?>" id="delivery" name="delivery" placeholder="Delivery Term" class="form-control" type="text">

                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="effective">Effective From</label>
                                                    <div class="col-md-3">
                                                        <input value="<?=$op->effective_from?>" id="effective" name="effective" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>
                                                        <label class="col-md-2 control-label" for="validity">Validity Term</label>

                                                        <div class="col-md-3">
                                                            <input value="<?=$op->validity_term?>" id="validity" name="validity" placeholder="Validity Term" class="form-control" type="text">

                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="email">Effective Til</label>
                                                        <div class="col-md-3">
                                                            <input value="<?=$op->effective_fill?>" id="email" name="til" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>
                                                            <label class="col-md-2 control-label" for="other">Other Term</label>

                                                            <div class="col-md-3">
                                                                <input value="<?=$op->other_term?>" id="other" name="other" placeholder="Other Term" class="form-control" type="text">

                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="created">Convertion Rate :</label>
                                                            <div class="col-md-3">&nbsp;
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="presented">1 USD</label>

                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id="basic-addon1">IDR</span>
                                                                    <input value="<?=$op->usd?>" aria-describedby="basic-addon1" id="idr" name="usd" placeholder="00.000" class="form-control" type="text">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="presented">1 SGD</label>

                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id="basic-addon1">IDR</span>
                                                                    <input value="<?=$op->sgd?>" aria-describedby="basic-addon1" name="sgd" placeholder="00.000" class="form-control" type="text">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label" for="presented">1 EUR</label>

                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id="basic-addon1">IDR</span>
                                                                    <input value="<?=$op->eur?>" aria-describedby="basic-addon1" name="eur" placeholder="00.000" class="form-control" type="text">
                                                                </div>
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

                    <!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->

                    <script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>

                    <!-- end of page level js -->

                    <script>
                        $(document).ready(function(){
                            $('.datepicker').datepicker({
                                format:'dd M yyyy'
                            });
                        });

                    </script>

                </body>

                </html>
                <?php

            }

            ?>
