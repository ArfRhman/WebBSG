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
                                    Item Sub-field
                                </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                    <table class="table table-striped table-responsive" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Divisi</th>
                                                <th>Kategori</th>
                                                <th>Nama Barang</th>
                                                <th>Sat</th>
                                                <th>Merk</th>
                                                <th>Dimension</th>
                                                <th>Weight (Kg)</th>
                                                <th>Vol Weight (Kgs)</th>
                                                <th>Vol Cubical (M3)</th>
                                                <th>Vol Land Weight (Kgs)</th>
                                                <th>IEC Vol Weight (Kgs)</th>
                                                <th>HS Code</th>
                                                <th>Tax</th>
                                                <th>Picture</th>
                                                <th>Brochure</th>
                                                <th>Specification</th>
                                                <th>Catatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											foreach($item->result() as $c)
											{
												$ukuran = str_replace(" ","",$c->dimension);
												$arrDimension = explode("x",$ukuran);
												$p = $arrDimension[0];
												$l = $arrDimension[1];
												$t = $arrDimension[2];
												$luas = $p*$l*$t;
											?>
                                            <tr>
												<td><?php echo $c->code ?></td>
												<td><?php echo $c->devisi ?></td>
												<td><?php echo $c->kategori ?></a></td>
												<td><?php echo $c->nama ?></td>
												<td><?php echo $c->sat ?></td>
												<td><?php echo $c->merk ?></td>
												<td><?php echo $c->dimension ?></td>
												<td><?php echo $c->weight ?></td>
												<td><?php echo ceil($luas/6000) ?></td>
												<td><?php echo ceil($luas/1000000) ?></td>
												<td><?php echo ceil($luas/4000) ?></td>
												<td><?php echo ceil($luas/5000) ?></td>
												<td><?php echo $c->id_hs ?></td>
												<td><?php echo $c->tax ?></td>
												<td><?php echo anchor_popup(base_url($c->picture), 'Picture');?></td>
												<td><?php echo anchor_popup(base_url($c->picture), 'Brochure');?></td>
												<td><?php echo anchor_popup(base_url($c->picture), 'Specification');?></td>
												<td><?php echo $c->catatan ?></td>
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
    <script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
    <!-- end of page level js -->
</body>
</html>