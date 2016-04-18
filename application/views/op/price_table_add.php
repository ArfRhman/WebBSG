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

                    Add Price List - Table

                  </h3>

                  <span class="pull-right">

                    <i class="glyphicon glyphicon-chevron-up clickable"></i>

                  </span>

                </div>

                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/price/save');?>" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label class="col-md-2 control-label" for="created">Item ID</label>
                        <div class="col-md-3">
                         <select name="item_id" class="form-control" id="itemID">
                           <option value=""> -- Pilih Item ID --</option>
                           <?php
                           $sql = $this->mddata->getAllDataTbl('tbl_dm_item');
                           foreach($sql->result() as $s)
                           {
                            ?>
                            <option value="<?php echo $s->id; ?>"><?php echo $s->code.' - '.$s->nama ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                      <label class="col-md-2 control-label" for="created">Division</label>
                      <div class="col-md-3">
                        <input id="division" name="division" placeholder="Division" class="form-control" type="text" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="presented">Category</label>
                      <div class="col-md-3">
                       <input id="category" name="category" placeholder="Category" class="form-control" type="text" readonly></div>
                       <label class="col-md-2 control-label" for="price">Item Name</label>

                       <div class="col-md-3">
                        <input id="item_nm" name="item_nm" placeholder="Item Name" class="form-control" type="text" readonly>

                      </div>

                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="effective">MOU</label>
                      <div class="col-md-3">
                        <input id="mou" name="mou" placeholder="MOU" class="form-control" type="text" readonly></div>
                        <label class="col-md-2 control-label" for="validity">Brand</label>

                        <div class="col-md-3">
                          <input id="brand" name="brand" placeholder="Brand" class="form-control" type="text" readonly>

                        </div>

                      </div>
                      <div class="form-group">
                        <label class="col-md-2 control-label" for="email">Source</label>
                        <div class="col-md-3">
                          <select name="source" class="form-control">
                            <option>Local</option>
                            <option>Import</option>
                          </select>
                        </div>
                        <label class="col-md-2 control-label" for="other">Incoterm </label>

                        <div class="col-md-3">
                         <select name="incoterm" class="form-control">
                          <option>EXW</option>
                          <option>FOB</option>
                          <option>C&F</option>
                          <option>CIF</option>
                          <option>DDP</option>
                          <option>EX Seller WH</option>
                          <option>EX Cust  WH</option>
                        </select>

                      </div>

                    </div>
                         <!--  <div class="form-group">
                            <label class="col-md-2 control-label" for="created">Convertion Rate :</label>
                            <div class="col-md-3">&nbsp;
                            </div>
                          </div> -->
                          <div class="form-group">
                            <label class="col-md-2 control-label" for="presented">Currency</label>

                            <div class="col-md-3" >
                              <select name="currency" class="form-control">
                                <option>USD</option>
                                <option>SGD</option>
                                <option>IDR</option>
                                <option>EUR</option>
                              </select>
                            </div>
                            <label class="col-md-2 control-label" for="presented">Purchase Price</label>

                            <div class="col-md-3">
                              <input name="purchase" placeholder="00.000.000,0000" class="form-control" type="text">
                            </div>


                          </div>
                          <div class="form-group">
                            <label class="col-md-2 control-label" for="presented">% FTC</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_ftc" placeholder="% FTC" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>

                             <label class="col-md-2 control-label" for="presented">% Cross Comp</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_cross" placeholder="% Cross Comp" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>

                          </div>
                           <div class="form-group">
                            <label class="col-md-2 control-label" for="presented">% Price List</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_price_list" placeholder="% Price List" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>

                             <label class="col-md-2 control-label" for="presented">% Cash/CBD/COD</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_cash" placeholder="% Cash/CBD/COD" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-md-2 control-label" for="presented">% SKBDN</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_skbdn" placeholder="% PSKBDN" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>

                             <label class="col-md-2 control-label" for="presented">% Credit 1 Month</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_credit_1m" placeholder="% Credit 1 Month" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-md-2 control-label" for="presented">% Credit 2 Month</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_credit_2m" placeholder="% Credit 2 Month" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>

                             <label class="col-md-2 control-label" for="presented">% Credit 3 Month</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_credit_3m" placeholder="% Credit 3 Month" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                             <label class="col-md-2 control-label" for="presented">% Credit 4 Month</label>

                            <div class="col-md-3">
                              <div class="input-group">
                                <input aria-describedby="basic-addon1" name="percen_credit_4m" placeholder="% Credit 4 Month" class="form-control" type="text">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                              </div>
                            </div>
                             <label class="col-md-2 control-label" for="presented">Special Condition</label>

                            <div class="col-md-3">
                              <input name="special" placeholder="Special Condition" class="form-control" type="text">
                            </div>

                          </div>
                           <div class="form-group">
                             <label class="col-md-2 control-label" for="presented">KHS Price</label>

                            <div class="col-md-3">
                              <input name="khs_price" placeholder="00.000.000" class="form-control" type="text">
                            </div>
                             <label class="col-md-2 control-label" for="presented">Competitor 1</label>

                            <div class="col-md-3">
                              <input name="comp_1" placeholder="00.000.000" class="form-control" type="text">
                            </div>

                          </div>
                           <div class="form-group">
                             <label class="col-md-2 control-label" for="presented">Competitor 1 Name</label>

                            <div class="col-md-3">
                              <input name="comp_1_name" placeholder="Competitor 1 Name" class="form-control" type="text">
                            </div>
                             <label class="col-md-2 control-label" for="presented">Competitor 2</label>

                            <div class="col-md-3">
                              <input name="comp_2" placeholder="00.000.000" class="form-control" type="text">
                            </div>

                          </div>
                           <div class="form-group">
                             <label class="col-md-2 control-label" for="presented">Competitor 2 Name</label>

                            <div class="col-md-3">
                              <input name="comp_2_name" placeholder="Competitor 2 Name" class="form-control" type="text">
                            </div>
                             <label class="col-md-2 control-label" for="presented">Competitor 3</label>

                            <div class="col-md-3">
                              <input name="comp_3" placeholder="00.000.000" class="form-control" type="text">
                            </div>

                          </div>
                           <div class="form-group">
                             <label class="col-md-2 control-label" for="presented">Competitor 3 Name</label>

                            <div class="col-md-3">
                              <input name="comp_3_name" placeholder="Competitor 3 Name" class="form-control" type="text">
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
            $("#itemID").change(function(){
              if($("#itemID").val()!=""){
                $.ajax({
                  type:'POST',
                  url: "<?php echo site_url('dm/item/get_item') ?>",
                  data: "id=" + $("#itemID").val(),
                  success: function(data){
                   var obj = JSON.parse(data);
                   $('#division').val(obj.devisi);
                   $('#category').val(obj.kategori);
                   $('#item_nm').val(obj.nama);
                   $('#MOU').val('');
                   $('#brand').val('');
                 }
               }); 

              }else{
                $('#division').val('');
                $('#category').val('');
                $('#item_nm').val('');
                $('#MOU').val('');
                $('#brand').val('');
              } 
            });
          });

        </script>

      </body>

      </html>
      <?php

    }

    ?>
