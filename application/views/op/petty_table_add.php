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
                    Add Petty Cash - Table
                </h3>
                <span class="pull-right">
                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/petty/table_save');?>" method="post">
                <input type="hidden" name="pc_no" value="<?=$this->uri->segment(4)?>">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="type">Acc ID</label>
                        <div class="col-md-3">
                        <select name="acc_id" class="form-control" onchange="setAccount(this)"> 
                        <option>0009 - Adjusment</option>
                        <option>0004 - ATK</option>
                        <option>0003 - Entertain</option>
                        <option>0014 - Jasa</option>
                        <option>0013 - Kesehatan</option>
                        <option>0011 - Material</option>
                        <option>0002 - Meal</option>
                        <option>0005 - Ongkos Kirim</option>
                        <option>0008 - Others</option>
                        <option>0012 - Pentry</option>
                        <option>0007 - Pulsa</option>
                        <option>0006 - Swakelola</option>
                        <option>0001 - Transport</option>
                        </select>
                        </div>
                            <label class="col-md-2 control-label" for="document">Account</label>
                            <div class="col-md-3">
                                <input id="account" readonly name="account" placeholder="Account" class="form-control" type="text"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="no">Tanggal</label>
                                <div class="col-md-3">
                                    <input id="date" name="tanggal" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>
                                  <label class="col-md-2 control-label" for="date">Realisasi No.</label>
                                  <div class="col-md-3">
                                    <input id="date" name="real_no" placeholder="Realisasi No." class="form-control" type="text"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="no">Kwitansi No.</label>
                                    <div class="col-md-3">
                                        <input id="date" name="kwitansi" placeholder="Kwitansi No." class="form-control" type="text">
                                    </div>
                                    <label class="col-md-2 control-label" for="date">Uraian Realisasi</label>
                                    <div class="col-md-3">
                                        <input id="date" name="uraian_real" placeholder="Uraian Realisasi" class="form-control" type="text"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="no">Realisasi</label>
                                        <div class="col-md-3">
                                            <input id="date" name="realisasi" placeholder="Realisasi" class="form-control" type="text">
                                        </div>
                                        <label class="col-md-2 control-label" for="date">Adjusment</label>
                                        <div class="col-md-3">
                                            <input id="date" name="adjustment" placeholder="Adjustment" class="form-control" type="text"></div>
                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12 text-right">
                                                                <button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button>
                                                            </div>
                                                        </div>

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
                        function setAccount(e){
                            var a = e.value.split(' - ');
                            document.getElementById('account').value = a[1];
                        }
                            $(document).ready(function(){
                                $('.datepicker').datepicker({
                                    format:'dd M yyyy'
                                });
                                $("#item_code").change(function(){
                                  if($("#item_code").val()!=""){
                                      $.ajax({
                                        type:'POST',
                                        url: "<?php echo site_url('dm/item/get_field') ?>",
                                        data: "id=" + $("#item_code").val(),
                                        success: function(data){
                                         var obj = JSON.parse(data);
                                         $('#item').val(obj.nama);
                                     }
                                 }); 

                                  }else{
                                    $('#item').val('');
                                } 
                            });

                            });

</script>
</body>
</html>