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
          ?>							<a href="<?php echo site_url('op/price/table_add/'.$this->uri->segment(4))?>" class="btn btn-success">Add New Data</a>
          <?php
        }
        ?>

        <div class="panel panel-primary filterable">
          <div class="panel-heading clearfix  ">
            <div class="panel-title pull-left">
             <div class="caption">
              <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
              Price List - Table
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div style="overflow-x:auto;"> 
            <table class="table table-striped table-responsive" id="table1">
              <thead>
                <tr>
                 <th>No</th>
                 <th>Item ID</th>
                 <th>Division</th>
                 <th>Category</th>
                 <th>Item Name </th>
                 <th>MOU</th>
                 <th>Brand</th>
                 <th>Source</th>
                 <th>Incoterm</th>
                 <th>Currency</th>
                 <th>Purchase Price</th>
                 <th>% FTC</th>
                 <th>FTC</th>
                 <th>DDP Price</th>
                 <th>DDP IDR</th>
                 <th>% CrossComp</th>
                 <th>CrossComp Price</th>
                 <th>%Price List</th>
                 <th>Price List</th>
                 <th>%Cash/CBD/COD</th>
                 <th>Cash/CBD/COD</th>
                 <th>%SKBDN</th>
                 <th>SKBDN Price</th>
                 <th>%Credit 1 Month</th>
                 <th>Credit 1 Month</th>
                 <th>%Credit 2 Month</th>
                 <th>Credit 2 Month</th>
                 <th>%Credit 3 Month</th>
                 <th>Credit 3 Month</th>
                 <th>%Credit 4 Month</th>
                 <th>Credit 4 Month</th>
                 <th>Special Condition</th>
                 <th>KHS Price</th>
                 <th>%Pricelist to KHS</th>
                 <th>%Nett Cash to KHS</th>
                 <th>Competitor 1</th>
                 <th>Competitor1 Name</th>
                 <th>Competitor 2</th>
                 <th>Competitor2 Name</th>
                 <th>Competitor 3</th>
                 <th>Competitor3 Name</th>

                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               <?php
               $no = 1;
               foreach($pl->result() as $c)
               {
                 ?>
                 <tr>
                  <td><?php echo $no; $no++; ?></td>
                  <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $c->item_id)->row()->code; ?></td>
                  <td><?=$c->division?></td>
                  <td><?=$c->category?></td>
                  <td><?=$c->item_name?></td>
                  <td><?=$c->mou?></td>
                  <td><?=$c->brand?></td>
                  <td><?=$c->source?></td>
                  <td><?=$c->incoterm?></td>
                  <td><?=$c->currency?></td>
                  <td><?=$c->purchase_price?></td>
                  <td><?=$c->percen_ftc?></td>
                  <td><?=$c->ftc?></td>
                  <td><?=$c->ddp_price?></td>
                  <td><?=$c->ddp_idr?></td>
                  <td><?=$c->percen_crosscomp?></td>
                  <td><?=$c->crosscomp_price?></td>
                  <td><?=$c->percen_price_list?></td>
                  <td><?=$c->price_list?></td>
                  <td><?=$c->percen_cash?></td>
                  <td><?=$c->cash?></td>
                  <td><?=$c->percen_skbdn?></td>
                  <td><?=$c->skbdn_price?></td>
                  <td><?=$c->percen_credit_1_month?></td>
                  <td><?=$c->credit_1_month?></td>
                  <td><?=$c->percen_credit_2_month?></td>
                  <td><?=$c->credit_2_month?></td>
                  <td><?=$c->percen_credit_3_month?></td>
                  <td><?=$c->credit_3_month?></td>
                  <td><?=$c->percen_credit_4_month?></td>
                  <td><?=$c->credit_4_month?></td>
                  <td><?=$c->special_condition?></td>
                  <td><?=$c->khs_price?></td>
                  <td><?=$c->percen_pricelist_to_khs?></td>
                  <td><?=$c->percen_nett_cash_to_khs?></td>
                  <td><?=$c->competitor_1?></td>
                  <td><?=$c->competitor_1_name?></td>
                  <td><?=$c->competitor_2?></td>
                  <td><?=$c->competitor_2_name?></td>
                  <td><?=$c->competitor_3?></td>
                  <td><?=$c->competitor_3_name?></td>
                  <td>
                    <div class='btn-group'>
                      <button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>
                      <ul class='dropdown-menu pull-right' role='menu'>
                        <li><a href='<?php echo site_url('op/price/table_edit/'.$c->no)?>' >Edit</a></li>
                        <li><a href='<?php echo site_url('op/price/table_delete/'.$c->no)?>' class="delete">Delete</a></li>
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