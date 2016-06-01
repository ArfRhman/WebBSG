	<aside class="right-side">
     <!-- Main content -->
     <section class="content-header">
      <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-primary filterable">
                <div class="panel-heading clearfix  ">
                    <div class="panel-title pull-left">
                       <div class="caption">
                        <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Transport Cost Report
                    </div>
                </div>
            </div>
            <div class="panel-body" style="overflow-x:auto">
                <table class="table table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Division</th>
                            <th>A/M</th>
                            <th>SO No</th>
                            <th>SO Date</th>
                            <th>Customer</th>
                            <th>DO Amount</th>
                            <th>Debit Note (Amount & percentage)</th>
                            <th>Nett Transport Cost (Amount & percentage)</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $no = 1;
                       foreach($data->result() as $c)
                       {
                        $transport=0;
                        $nett=0;
                        $debit=0;
                        $deliv = $this->mddata->getDataFromTblWhere('tbl_sale_so_delivery', 'id_so', $c->id)->result();
                        if(!empty($deliv)){
                            foreach($deliv as $d){
                                $debit+=$d->debit_note_amount;
                                $nett+=$d->nett;
                            }
                        }
                        $cost = $this->mddata->getDataFromTblWhere('tbl_sale_so_cost', 'id_so', $c->id)->result();
                        if(!empty($cost)){
                            foreach($cost as $z){
                                $transport+=$z->transport;
                            }
                        }
                        $total=$debit+$nett;
                        if(empty($total)){
                            $total=1;
                        }
                        ?>
                        <tr>
                            <td><?php echo $no; $no++; ?></td>
                            <td><?php echo $c->division ?></td>
                            <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $c->am)->row()->name; ?></td>
                            <td><a href="<?=base_url()?>index.php/op/transport_cost/do/<?=$c->id?>"><?php echo $c->so_no ?></a></td>
                            <td><?php echo $c->so_date ?></td>
                            <td><?php echo $c->customer_name ?></td>
                            <td><?php echo $total?></td>
                            <td><?php echo $debit?> (<?=number_format($debit/$total*100,2)?> %)</td>
                            <td><?php echo $nett?> (<?=number_format($nett/$total*100,2)?> %)</td>

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