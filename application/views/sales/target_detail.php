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
        <div class="panel panel-primary filterable">
            <div class="panel-heading clearfix  ">
                <div class="panel-title pull-left">
                 <div class="caption">
                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Detail Target / Forecast
                </div>
            </div>
        </div>
        <div class="panel-body">
           <table class="table table-striped table-responsive table-bordered">
              <thead>
                <tr>
                  <?php  $thn = date('Y'); ?>
                  <th rowspan="2" style="vertical-align: middle;">No</th>
                  <th rowspan="2" style="vertical-align: middle;">Customer</th>
                  <?php  
                  $am_Code = array();
                  $op = $this->db->query("SELECT * FROM tbl_sale_target AS st,tbl_dm_operator AS op WHERE st.operator = op.id AND st.a_m = '".$this->uri->segment(4)."' GROUP BY st.operator"); ?>
                  <th colspan="<?php echo count($op->result()) ?>"> Operator </th>
                  <th rowspan="2" style="vertical-align: middle;">Total</th>
              </tr>
              <tr>
               <?php
               foreach ($op->result() as $a) {
                  array_push($am_Code, $a->operator);
                  ?>
                  <th><a href="<?php echo site_url('sales/target/detail/'.$a->id)?>"><?php echo $a->name?></th>
                  <?php
              }
              ?>

          </tr>
      </thead>
      <tbody>
          <?php
          $no = 0;
         
          ?>


          <?php 
          $cust = $this->db->query("SELECT * FROM tbl_sale_target AS st,tbl_dm_customer AS cs WHERE st.customer = cs.id AND st.a_m = '".$this->uri->segment(4)."' GROUP BY st.customer");
          foreach ($cust->result() as $cs) { 
             $total = 0;
             ?>
          <tr>
              <td><?php echo $no+1; ?></td>
              <td><?php echo $cs->name; ?></td>
              <?php
              foreach ($am_Code as $am) { 
               $opAmount = $this->db->query("SELECT SUM(amount) AS amTot FROM tbl_sale_target AS st WHERE st.a_m = '".$this->uri->segment(4)."' AND operator = '".$am."' AND customer = '".$cs->id."'")->row();
               ?>
               <td><?php 
               if(isset($opAmount->amTot)){
                echo number_format($opAmount->amTot);
                $total = $total + $opAmount->amTot;
            }else{
                    echo '-';
                     } ?></td>
               <?php  }  

               ?>
               <td><?php echo number_format($total) ?></td>
           </tr>
           <?php   $no++; } ?>
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

<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>

<!--<script type="text/javascript" src="<?php //echo base_url();?>style/js/pages/table-advanced.js"></script>-->

<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>
<script>		
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format:'M yyyy'
        });

        $('.delete').on('click',function(){				var btn = $(this);				bootbox.confirm('Are you sure to delete this record?', function(result){					if(result ==true){						window.location = "<?php echo site_url('sales/so/delete');?>/"+btn.data('id');					}				});			});		});	</script>
    </body>
    </html>