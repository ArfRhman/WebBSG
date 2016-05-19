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
            Petty Cash - Header
          </h3>
          <span class="pull-right">
            <i class="glyphicon glyphicon-chevron-up clickable"></i>
          </span>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/petty/update');?>" method="post">
            <input type="hidden" name="kasbon_id" value="<?=$op->kasbon_id?>">
            <div class="form-group">
              <label class="col-md-2 control-label" for="type">Tanggal Kasbon</label>
              <div class="col-md-3">
                <input value="<?=$op->tanggal_kasbon?>" id="date" name="tgl_kasbon" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>
                <label class="col-md-2 control-label" for="document">Divisi</label>
                <div class="col-md-3">
                  <input value="<?=$op->divisi?>" id="date" name="divisi" placeholder="Divisi" class="form-control" type="text"></div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="no">Personal ID</label>
                  <div class="col-md-3">
                    <select name="personal" class="form-control">
                      <?php
                      $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                      foreach($sql->result() as $s)
                      {
                        ?>
                        <option value="<?php echo $s->id; ?>" <?=$s->id==$op->personal_id ? 'selected' : ''?>><?php echo $s->name ?></option>
                        <?php
                      }
                      ?>
                    </select> </div>
                    <label class="col-md-2 control-label" for="date">Tujuan</label>
                    <div class="col-md-3">
                      <input value="<?=$op->tujuan?>" id="date" name="tujuan" placeholder="Tujuan" class="form-control" type="text"></div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="no">Jumlah Kasbon</label>
                      <div class="col-md-3">
                        <input value="<?=$op->jumlah_kasbon?>" id="date" name="jml_kasbon" placeholder="Jumlah Kasbon" class="form-control" type="text">
                      </div>
                      <label class="col-md-2 control-label" for="date">Jumlah Diapprove</label>
                      <div class="col-md-3">
                        <input value="<?=$op->jumlah_diapprove?>" id="jml_approve" name="jml_approve" placeholder="Jumlah Diapprove" class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="JumlahSelisih(this)"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-2 control-label" for="no">Tanggal Diapprove</label>
                        <div class="col-md-3">
                          <input value="<?=$op->tanggal_diapprove?>" id="date" name="tgl_approve" placeholder="dd MMM YYYY" class="form-control datepicker" type="text">
                        </div>
                        <label class="col-md-2 control-label" for="date">Terbilang</label>
                        <div class="col-md-3">
                          <input value="<?=$op->terbilang?>" id="date" name="terbilang" placeholder="Terbilang" class="form-control" type="text"></div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="no">Tanggal Bayar Kasbon</label>
                          <div class="col-md-3">
                            <input value="<?=$op->tanggal_bayar_kasbon?>" id="tglByr" name="tgl_byr_kasbon" placeholder="dd MMM YYYY" class="form-control datepicker" type="text">
                          </div>
                          <label class="col-md-2 control-label" for="date">Tanggal Warning</label>
                          <div class="col-md-3">
                            <input value="<?=$op->tanggal_warning?>" id="tglWrn" name="tgl_warning" placeholder="dd MMM YYYY" class="form-control datepicker" type="text" readonly></div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 control-label" for="no">Tanggal Overdue Realisasi</label>
                            <div class="col-md-3">
                              <input value="<?=$op->tanggal_overdue_realisasi?>" id="tglOvr" name="tgl_over_realisasi" placeholder="dd MMM YYYY" class="form-control datepicker" type="text" readonly>
                            </div>
                            <label class="col-md-2 control-label" for="date">Tanggal Realisasi</label>
                            <div class="col-md-3">
                              <input value="<?=$op->tanggal_realisasi?>" id="date" name="tgl_realisasi" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="no">Tanggal Submit</label>
                              <div class="col-md-3">
                                <input value="<?=$op->tanggal_submit?>" id="date" name="tgl_submit" placeholder="dd MMM YYYY" class="form-control datepicker" type="text">
                              </div>
                              <label class="col-md-2 control-label" for="date">Jumlah Net Realisasi</label>
                              <div class="col-md-3">
                                <input value="<?=$op->jumlah_net_realisasi?>" id="jml_net" name="jml_net_realisasi" placeholder="Jumlah Net Realisasi" class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="JumlahSelisih(this)"></div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-2 control-label" for="no">Jumlah Selisih</label>
                                <div class="col-md-3">
                                  <input value="<?=$op->jumlah_selisih?>" id="jml_selisih" name="jml_selisih" placeholder="Jumlah Selisih" class="form-control" type="text" readonly>
                                </div>
                                <label class="col-md-2 control-label" for="date">Tanggal Bayar / Kembali</label>
                                <div class="col-md-3">
                                  <input value="<?=$op->tanggal_bayar?>" id="date" name="tgl_byr_kembali" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-responsive btn-primary btn-sm">Save</button>
                                  </div>
                                </div>

                              </form>
                            </div>
                          </div>
                          <?php
                          if($this->mddata->access($this->session->userdata('group'), 'd15')->d15 > 1)
                          {
                            ?>							<a href="<?php echo site_url('op/petty/table_add/'.$this->uri->segment(4))?>" class="btn btn-success">Add  Petty Cash - Table</a>
                            <?php
                          }
                          ?>
                          <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                              <div class="panel-title pull-left">
                               <div class="caption">
                                <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Petty Cash - Table
                              </div>
                            </div>
                          </div>
                          <div class="panel-body">
                            <div style="overflow-x:auto">
                              <table class="table table-striped table-responsive">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Acc. ID</th>
                                    <th>Account</th>
                                    <th>Tanggal</th>
                                    <th>Realisasi No</th>
                                    <th>Kwitansi No</th>
                                    <th>Uraian Realisasi</th>
                                    <th>Realisasi</th>
                                    <th>Adjustment</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $no = 1;
                                 $total=0;
                                 foreach($opt->result() as $c)
                                 {
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
            <script>		
            function JumlahSelisih(e){
              var a;
              var b;
              document.getElementById('jml_approve').value!='' ? a=document.getElementById('jml_approve').value : a=0
              document.getElementById('jml_net').value!='' ? b=document.getElementById('jml_net').value : b=0
              // alert(a);
              var p = document.getElementById('jml_selisih');
              p.value = a - b;
            }
            $(document).ready(function(){
             $('.datepicker').datepicker({
              format:'dd M yyyy'
            });
             $('#tglByr').change(function() {
              var date2 = $('#tglByr').datepicker('getDate', '+1d'); 
              date2.setDate(date2.getDate()+7); 
              $('#tglWrn').datepicker('setDate', date2);

              var date3 = $('#tglByr').datepicker('getDate', '+1d'); 
              date3.setDate(date3.getDate()+14); 
              $('#tglOvr').datepicker('setDate', date3);

            });

             $('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id');					}				});			});		});	</script>
           </body>
           </html>