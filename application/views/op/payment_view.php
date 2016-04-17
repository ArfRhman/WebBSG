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
          ?>							<a href="<?php echo site_url('op/payment/add')?>" class="btn btn-success">Add New Data</a>
          <?php
        }
        ?>

        <div class="panel panel-primary filterable">
          <div class="panel-heading clearfix  ">
            <div class="panel-title pull-left">
             <div class="caption">
              <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
              Payment Memo
            </div>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Memo No</th>
                <th>Memo Date</th>
                <th>Addressed to</th>
                <th>CC to</th>
                <th>Due Date</th>
                <th>Payment Type</th>
                <th>Bank Name</th>
                <th>Bank Account</th>
                <th>Beneficiary</th>
                <th>Other Info</th>
                <th>Payment Date</th>
                <th>Payment Amount</th>
                <th>Payment Proof</th>



                <th>Action</th>

              </tr>
            </thead>
            <tbody>
             <?php
             $no = 1;
             foreach($op->result() as $c)
             {
               ?>
               <tr>
                <td><?php echo $no; $no++; ?></td>
                <td>
                 <?php 
                 $nomor = "";
                 $res = $c->memo_no;
                 if($res >= 1)
                 {
                  $nomor = "00".$res;
                }
                if($res >= 10)
                {
                  $nomor = "0".$res;
                }
                if($res >= 100)
                {
                  $nomor = $res;
                }
                $kode = "/PM-OPS/BSG/";
                $arrDate = explode(' ',$c->memo_date);
                $tahun = $arrDate[0];
                $bulan = $arrDate[1];
                $fb = $this->mddata->decrom_MMM($bulan);
                echo $nomor.$kode.$fb."/".$arrDate[2];
                ?>
              </td>
              <td><?php echo $c->memo_date ?></td>
              <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $c->addressed_to)->row()->name; ?></td>
              <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $c->cc_to)->row()->name; ?></td>
              <td><?php echo $c->due_date ?></td>
              <td><?php echo $c->payment_type ?></td>
              <td><?php echo $c->bank_name ?></td>
              <td><?php echo $c->bank_account ?></td>
              <td><?php echo $c->beneficiary ?></td>
              <td><?php echo $c->other_info?></td>
              <td><?php echo $c->payment_date ?></td>
              <td><?php echo $c->payment_amount ?></td>
              <td>
               <?php 
               if($c->payment_proof != "") 
               {
                echo anchor(base_url($c->payment_proof), "Download File"); 
              } ?>
            </td>
            <td>                                                                                                       
              <div class='btn-group'>                                                     
                <button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>    
                <ul class='dropdown-menu pull-right' role='menu'>       
                  <li><a href='<?php echo site_url('op/payment/edit/'.$c->no)?>' >Edit</a></li>         
                  <li><a href='<?php echo site_url('op/payment/delete/'.$c->no)?>' >Delete</a></li>
                  <li><a href='<?php echo site_url('op/payment/detail/')?>' >Detail</a></li> 
                  <li><a href='<?php echo site_url('op/payment/tabel_view/'.$c->no)?>' >View Tabel</a></li>             
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