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

										Add Transaksi Purchase Order

									</h3>

									<span class="pull-right">

										<i class="glyphicon glyphicon-chevron-up clickable"></i>

									</span>

								</div>

								<div class="panel-body">
								
									<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('op/po/save');?>" method="post">

										<fieldset>
											<h3>Header</h3>
											<div class="form-group">
												<label class="col-md-2 control-label" for="po_no">PO No</label>

												<div class="col-md-3">

													<input id="po_no" name="po_no" placeholder="PO No" class="form-control" type="text"></div>
												<label class="col-md-2 control-label" for="curr">Currency</label>

												<div class="col-md-3">
												<input type="text" class="form-control" placeholder="Currency" name="curr" list="currList">
                                          			<datalist id="currList">
	                                                	<option value="IDR">
	                                                 	<option value="USD">
	                                                 	<option value="SGD">
	                                                 	<option value="EUR">

                                                  	</datalist>
												</div>		
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" for="po_date">PO Date</label>

												<div class="col-md-3">

													<input id="po_date" name="po_date" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>
												<label class="col-md-2 control-label" for="convertion">Convertion</label>

												<div class="col-md-3">

													<input id="convertion" name="convertion" placeholder="Convertion" class="form-control" type="text"></div>										
												
											</div>


											<div class="form-group">
												
												<label class="col-md-2 control-label" for="pureq_no">Pureq No</label>

												<div class="col-md-3">

													<input id="pureq_no" name="pureq_no" placeholder="Pureq No" class="form-control" type="text"></div>
												<label class="col-md-2 control-label" for="desc">Description</label>

												<div class="col-md-3">

													<input id="desc" name="desc" placeholder="Description" class="form-control" type="text"></div>

												
											</div>


											<div class="form-group">
											
												<label class="col-md-2 control-label" for="pureq_date">Pureq Date</label>

												<div class="col-md-3">

													<input id="pureq_date" name="pureq_date" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="purpose">Purpose Of</label>

												<div class="col-md-3">

													<input id="purpose" name="purpose" placeholder="Purpose Of" class="form-control" type="text"></div>

												
												
											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="suplier">Suplier</label>

												<div class="col-md-3">
													<select name="suplier" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_supplier')->result() as $c)
														{
														?>
														<option value="<?php echo $c->id; ?>"><?php echo $c->supplier; ?></option>	
														<?php
														}
													?>
													</select></div>
													
												
												<label class="col-md-2 control-label" for="type">Payment Type</label>

												<div class="col-md-3">

													<input id="type" name="type" placeholder="Payment Type" class="form-control" type="text"></div>

												
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" for="forwarder">Forwarder</label>

												<div class="col-md-3">
													<select name="forwarder" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_forwarder')->result() as $c)
														{
														?>
														<option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>	
														<?php
														}
													?>
													</select></div>
													<!-- <input id="forwarder" name="" placeholder="forwarder" class="form-control" type="text"></div> -->

												<label class="col-md-2 control-label" for="delivery">Delivery Date</label>

												<div class="col-md-3">

													<input id="delivery" name="delivery" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>

												
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" for="name">Moda</label>

												<div class="col-md-3">
													<input type="text" class="form-control" placeholder="Moda" name="moda" list="modaList">
                                          			<datalist id="modaList">
	                                                 <option value="Air">
	                                                  <option value="Sea">
                                                  	</datalist>
												</div>
												<label class="col-md-2 control-label" for="terms">Other Terms</label>

												<div class="col-md-3">

													<input id="terms" name="terms" placeholder="Other Terms" class="form-control" type="text"></div>

												
											</div>

											

											

											<h3>Tabel</h3>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="item_code">Item Code</label>

												<div class="col-md-3">
													<select name="item_code" id="item_code" class="form-control">
													<?php 
														foreach($this->mddata->getAllDataTbl('tbl_dm_item')->result() as $c)
														{
														?>
														<option value="<?php echo $c->id; ?>"><?php echo $c->code; ?> - <?php echo $c->nama; ?></option>	
														<?php
														}
													?>
													</select>
													</div>

												<label class="col-md-2 control-label" for="currency">Currency</label>

												<div class="col-md-3">

													<input id="currency" name="currency" placeholder="Currency" class="form-control" type="text"></div>

											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="item">Item</label>

												<div class="col-md-3">

													<input id="item" readonly="true" name="item" placeholder="Item" class="form-control" type="text"></div>
												<label class="col-md-2 control-label" for="unit">Unit Price</label>

												<div class="col-md-3">

													<input id="unit" name="unit" placeholder="Unit Price" class="form-control" type="text"></div>

												
											</div>


											<div class="form-group">
											
												<label class="col-md-2 control-label" for="mou">MoU</label>

												<div class="col-md-3">

													<input id="mou" name="mou" placeholder="MoU" class="form-control" type="text"></div>
												<label class="col-md-2 control-label" for="total">Total Price</label>

												<div class="col-md-3">

													<input id="total" name="total" placeholder="Total Price" class="form-control" type="text"></div>

												
											</div>


											<div class="form-group">
												<label class="col-md-2 control-label" for="qty">Qty</label>

												<div class="col-md-3">

													<input id="qty" name="qty" placeholder="Qty" class="form-control" type="text"></div>

												
												
											</div>


											<h3>Lead Time</h3>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="lc">ETF LC</label>

												<div class="col-md-3">

													<input id="lc" name="etf_lc" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="atf_prod">ATF Production</label>

												<div class="col-md-3">

													<input id="atf_prod" name="atf_prod" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="etf_prod">ETF Production</label>

												<div class="col-md-3">

													<input id="etf_prod" name="etf_prod" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="atf_depart">ATF Vessel Depart</label>

												<div class="col-md-3">

													<input id="atf_depart" name="atf_depart" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

											</div>


											<div class="form-group">
											
												<label class="col-md-2 control-label" for="etf_depart">ETF Vessel Depart</label>

												<div class="col-md-3">

													<input id="etf_depart" name="etf_depart" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="atf_arrival">ATF Vessel Arrival</label>

												<div class="col-md-3">

													<input id="atf_arrival" name="atf_arrival" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

											</div>


											<div class="form-group">
											
												<label class="col-md-2 control-label" for="etf_arrival">ETF Vessel Arrival</label>

												<div class="col-md-3">

													<input id="etf_arrival" name="etf_arrival" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="atf_clearance">ATF Clearance</label>

												<div class="col-md-3">

													<input id="atf_clearance" name="atf_clearance" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="etf_clearance">ETF Clearance</label>

												<div class="col-md-3">

													<input id="no" name="etf_clearance" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="atf_wh">ATF WH Arrival</label>

												<div class="col-md-3">

													<input id="atf_wh" name="atf_wh" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="etf_wh">ETF WH Arrival</label>

												<div class="col-md-3">

													<input id="etf_wh" name="etf_wh" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="actual">Actual Lead Time (days)</label>

												<div class="col-md-3">

													<input id="actual" name="actual" placeholder="Actual Lead Time (days)" class="form-control" type="text"></div>

											</div>


											<div class="form-group">
											
												<label class="col-md-2 control-label" for="estimated">Estimated Lead Time (days)</label>

												<div class="col-md-3">

													<input id="estimated" name="estimated" placeholder="Estimated Lead Time (days)" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="deviation">Deviation (days)</label>

												<div class="col-md-3">

													<input id="deviation" name="deviation" placeholder="Deviation (days)" class="form-control" type="text"></div>

											</div>


											<div class="form-group">
											
												<label class="col-md-2 control-label" for="atf_lc">ATF LC</label>

												<div class="col-md-3">

													<input id="atf_lc" name="atf_lc" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="forecast">Forecast Level</label>

												<div class="col-md-3">

													<input id="forecast" name="forecast" placeholder="Forecast Level" class="form-control" type="text"></div>

											</div>



											<h3>Documentation</h3>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="po">Purchase Order</label>

												<div class="col-md-3">

													<input id="po" name="po" placeholder="Purchase Order" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="form_no">Form E/AK/etc No</label>

												<div class="col-md-3">

													<input id="form_no" name="form_no" placeholder="Form E/AK/etc No" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="request">Purchase Request</label>

												<div class="col-md-3">

													<input id="request" name="request" placeholder="Purchase Request" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="form_date">Form E/AK/etc Date</label>

												<div class="col-md-3">

													<input id="form_date" name="form_date" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="csd">CSD</label>

												<div class="col-md-3">

													<input id="csd" name="csd" placeholder="CSD" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="form">Form E/AK/etc</label>

												<div class="col-md-3">

													<input id="form" name="form" placeholder="Form E/AK/etc" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="awb_no">AWB/BL No</label>

												<div class="col-md-3">

													<input id="awb_no" name="awb_no" placeholder="AWB/BL No" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="dnp">DNP Request</label>

												<div class="col-md-3">

													<input id="dnp" name="dnp" placeholder="DNP Request" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="awb_date">AWB/BL Date</label>

												<div class="col-md-3">

													<input id="awb_date" name="awb_date" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="spjk">SPJK/SPJM</label>

												<div class="col-md-3">

													<input id="spjk" name="spjk" placeholder="SPJK/SPJM" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="awb">AWB/BL</label>

												<div class="col-md-3">

													<input id="awb" name="awb" placeholder="AWB/BL" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="sppb">SPPB</label>

												<div class="col-md-3">

													<input id="sppb" name="sppb" placeholder="SPPB" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="invoice_no">Invoice No</label>

												<div class="col-md-3">

													<input id="invoice_no" name="invoice_no" placeholder="Invoice No" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="gr_no">GR No</label>

												<div class="col-md-3">

													<input id="gr_no" name="gr_no" placeholder="GR No" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="invoice_date">Invoice Date</label>

												<div class="col-md-3">

													<input id="invoice_date" name="invoice_date" placeholder="dd MMM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="gr_date">GR Date</label>

												<div class="col-md-3">

													<input id="gr_date" name="gr_date" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="invoice">Invoice</label>

												<div class="col-md-3">

													<input id="invoice" name="invoice" placeholder="Invoice" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="gr">GR </label>

												<div class="col-md-3">

													<input id="gr" name="gr" placeholder="GR " class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="packing_no">Packing List No</label>

												<div class="col-md-3">

													<input id="packing_no" name="packing_no" placeholder="Packing List No" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="kuasa_inklaring">Kuasa Inklaring</label>

												<div class="col-md-3">

													<input id="kuasa_inklaring" name="kuasa_inklaring" placeholder="Kuasa Inklaring" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="packing_date">Packing List Date</label>

												<div class="col-md-3">

													<input id="packing_date" name="packing_date" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="kuasa_do">Kuasa DO</label>

												<div class="col-md-3">

													<input id="kuasa_do" name="kuasa_do" placeholder="Kuasa DO" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="packing">Packing List</label>

												<div class="col-md-3">

													<input id="packing" name="packing" placeholder="Packing List" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="peminjaman">Peminjaman Container</label>

												<div class="col-md-3">

													<input id="peminjaman" name="peminjaman" placeholder="Peminjaman Container" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="lc_no">LC No</label>

												<div class="col-md-3">

													<input id="lc_no" name="lc_no" placeholder="LC No" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="pengembalian">Pengembalian Container</label>

												<div class="col-md-3">

													<input id="pengembalian" name="pengembalian" placeholder="Pengembalian Container" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="lc_date">LC Date</label>

												<div class="col-md-3">

													<input id="lc_date" name="lc_date" placeholder="dd MM YYYY" class="form-control datepicker" type="text"></div>

												<label class="col-md-2 control-label" for="fungsi_guna">Pernyataan Fungsi Guna Barang</label>

												<div class="col-md-3">

													<input id="fungsi_guna" name="fungsi_guna" placeholder="Pernyataan Fungsi Guna Barang" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="lc">LC</label>

												<div class="col-md-3">

													<input id="lc" name="lc" placeholder="LC" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="keaslian_dokumen">Pernyataan Keaslian Dokumen</label>

												<div class="col-md-3">

													<input id="keaslian_dokumen" name="keaslian_dokumen" placeholder="Pernyataan Keaslian Dokumen" class="form-control" type="text"></div>

											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="pib">PIB Date</label>

												<div class="col-md-3">

													<input id="pib" name="pib" placeholder="PIB Date" class="form-control datepicker" type="text"></div>

											</div>


											<h3>Tabel</h3>
											<u>Part 1 - Duty & Tax Base Calculation</u>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="curr">Currency</label>

												<div class="col-md-3">
													<input type="text" class="form-control" placeholder="Currency" name="currency" list="currencyList">
                                          			<datalist id="currencyList">
	                                                	<option value="IDR">
	                                                 	<option value="USD">
	                                                 	<option value="SGD">
	                                                 	<option value="EUR">

                                                  	</datalist>
												</div>

												<label class="col-md-2 control-label" for="cif">CIF BC</label>

												<div class="col-md-3">

													<input id="cif" name="cif" placeholder="CIF BC" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="amount">PO Amount </label>

												<div class="col-md-3">

													<input id="amount" name="amount" placeholder="PO Amount " class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="bc_rate">BC Rate</label>

												<div class="col-md-3">

													<input id="bc_rate" name="bc_rate" placeholder="BC Rate" class="form-control" type="text"></div>

											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="freight">Freight BC</label>

												<div class="col-md-3">

													<input id="freight" name="freight" placeholder="Freight BC" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="cif_idr">CIF BC IDR</label>

												<div class="col-md-3">

													<input id="cif_idr" name="cif_idr" placeholder="CIF BC IDR" class="form-control" type="text"></div>

											</div>

											<div class="form-group">
											
												<label class="col-md-2 control-label" for="insurance">Insurance BC</label>

												<div class="col-md-3">

													<input id="insurance" name="insurance" placeholder="Insurance BC" class="form-control" type="text"></div>

											</div>

											<u>Part 2 – Duty & Taxes</u>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="import_tax">Import Tax</label>

												<div class="col-md-3">

													<input id="import_tax" name="import_tax" placeholder="Import Tax" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="notul">Notul</label>

												<div class="col-md-3">

													<input id="notul" name="notul" placeholder="Notul" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="vat">VAT Import</label>

												<div class="col-md-3">

													<input id="vat" name="vat" placeholder="VAT Import" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="notul_desc">Notul Desc</label>

												<div class="col-md-3">

													<input id="notul_desc" name="notul_desc" placeholder="Notul Desc" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="wht">WHT Import</label>

												<div class="col-md-3">

													<input id="wht" name="wht" placeholder="WHT Import" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="duty_tax">Total Duty & Taxes</label>

												<div class="col-md-3">

													<input id="duty_tax" name="duty_tax" placeholder="Total Duty & Taxes" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="total_tax">Total Tax</label>

												<div class="col-md-3">

													<input id="total_tax" name="total_tax" placeholder="Total Tax" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="duty">% Duty & Taxes</label>

												<div class="col-md-3">

													<input id="duty" name="duty" placeholder="% Duty & Taxes" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="adm">Adm Cost</label>

												<div class="col-md-3">

													<input id="adm" name="adm" placeholder="Adm Cost" class="form-control" type="text"></div>

											</div>

											<u>Part 3 – Real Clearance Costing</u>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="freight_cost">Freight Cost</label>

												<div class="col-md-3">

													<input id="freight_cost" name="freight_cost" placeholder="Freight Cost" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="mechanic">Mechanic</label>

												<div class="col-md-3">

													<input id="mechanic" name="mechanic" placeholder="Mechanic" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="yellow_handling">Yellow Handling</label>

												<div class="col-md-3">

													<input id="yellow_handling" name="yellow_handling" placeholder="Yellow Handling" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="undertable">Undertable</label>

												<div class="col-md-3">

													<input id="undertable" name="undertable" placeholder="Undertable" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="red_handing">Red Handing</label>

												<div class="col-md-3">

													<input id="red_handing" name="red_handing" placeholder="Red Handing" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="trucking">Trucking</label>

												<div class="col-md-3">

													<input id="trucking" name="trucking" placeholder="Trucking" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="do">DO</label>

												<div class="col-md-3">

													<input id="do" name="do" placeholder="DO" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="other_cost">Other Cost</label>

												<div class="col-md-3">

													<input id="other_cost" name="other_cost" placeholder="Other Cost" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="storage">Storage</label>

												<div class="col-md-3">

													<input id="storage" name="storage" placeholder="Storage" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="cost_desc">Other Cost Desc.</label>

												<div class="col-md-3">

													<input id="cost_desc" name="cost_desc" placeholder="Other Cost Desc." class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="demurrage">Demurrage</label>

												<div class="col-md-3">

													<input id="demurrage" name="demurrage" placeholder="Demurrage" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="total_clearance">Total Clearance</label>

												<div class="col-md-3">

													<input id="total_clearance" name="total_clearance" placeholder="Total Clearance" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="lift">Lift On Lift Of</label>

												<div class="col-md-3">

													<input id="lift" name="lift" placeholder="Lift On Lift Of" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="percen_clearance">% Clearance</label>

												<div class="col-md-3">

													<input id="percen_clearance" name="percen_clearance" placeholder="% Clearance" class="form-control" type="text"></div>

											</div>


											<u>Total</u>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="total_cost">Total Cost</label>

												<div class="col-md-3">

													<input id="total_cost" name="total_cost" placeholder="Total Cost" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="total_without_vat">Total Cost without VAT</label>

												<div class="col-md-3">

													<input id="total_without_vat" name="total_without_vat" placeholder="Total Cost without VAT" class="form-control" type="text"></div>

											</div>
											<div class="form-group">
											
												<label class="col-md-2 control-label" for="percen_total">% Total Cost</label>

												<div class="col-md-3">

													<input id="percen_total" name="percen_total" placeholder="% Total Cost" class="form-control" type="text"></div>

												<label class="col-md-2 control-label" for="percen_without_vat">% Cost without VAT</label>

												<div class="col-md-3">

													<input id="percen_without_vat" name="percen_without_vat" placeholder="% Cost without VAT" class="form-control" type="text"></div>

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
<?php

}

?>
						