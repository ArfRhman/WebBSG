<?php
if($this->session->userdata('active') == FALSE)
{
	redirect('site/index');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>BSG</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="<?php echo base_url();?>style/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url();?>style/vendors/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/css/styles/black.css" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="<?php echo base_url();?>style/css/panel.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>style/css/metisMenu.css" rel="stylesheet" type="text/css"/>    
    <!-- end of global css -->    
    <!--page level css -->
    <link href="<?php echo base_url();?>style/vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="<?php echo base_url();?>style/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>style/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>style/css/only_dashboard.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/vendors/datatables/css/dataTables.colReorder.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/vendors/datatables/css/dataTables.scroller.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/vendors/datatables/css/dataTables.bootstrap.css" />		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap-datepicker.min.css" />
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css">
    <!--end of page level css-->
</head>
<body class="skin-josh">
    <header class="header">
        <a href="<?php echo site_url('site/home'); ?>" class="logo">
            <img src="<?php echo base_url();?>style/img/logo.png" alt="Logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="riot">
                                <div>
                                    <?php echo $this->session->userdata('username');?>
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Body -->
                            <li role="presentation"></li>
                            <li>
                                <a href="<?php echo site_url('site/logout'); ?>">
                                    <i class="livicon" data-name="sign-out" data-s="18"></i>
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
						<li <?php if($ac == 'home') echo "class='active'"; ?>>
                            <a href="#">
                                <i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Home Page</span>
                            </a>
						</li>
                        <li <?php if($this->uri->segment(1) == "sales") echo "class='active'"; ?>>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Sales And Marketing</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php
								if($this->mddata->access($this->session->userdata('group'), 'd1')->d1 >= 1)
								{
								?>
								<li>
									<a href="#">
										<i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Dashboard</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Forecast Vs Sale
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Period
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Product
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Account Manager
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Customer
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales Profit & Loss Summary
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												A/R Performance
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Stock Performance
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Sales Report</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Forecast vs Sales
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Period
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Product
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Account
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales By Customer
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales Profit & Loss Summary
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												A/R Performance
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Stock Performance
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Achievement Report
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Profit Analysis Report
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												External Commision Report
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Division Budget vs Actual
											</a>
										</li>
									</ul>
								</li>
								<?php } ?>
								<li <?php if($this->uri->segment(1) == "sales") echo "class='active'"; ?>>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Transaction</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php 
										if($this->mddata->access($this->session->userdata('group'), 'd3')->d3 >= 1)
										{
										?>
										<li <?php if($ac == "s_so") echo "class='active'"; ?>>
											<a href="<?php echo site_url('sales/so/view');?>">
												<i class="fa fa-angle-double-right"></i>
												Sales Order
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd3')->d3 >= 1)
										{
										?>
										<li <?php if($ac == "s_budget") echo "class='active'"; ?>>
											<a href="<?php echo site_url('sales/budget/view');?>">
												<i class="fa fa-angle-double-right"></i>
												Budget
											</a>
										</li>
										<li <?php if($ac == "s_realisasi") echo "class='active'"; ?>>
											<a href="<?php echo site_url('sales/realisasi/view');?>">
												<i class="fa fa-angle-double-right"></i>
												Realisasi
											</a>
										</li>
										<li  <?php if($ac == "s_target") echo "class='active'"; ?>>
											<a href="<?php echo site_url('sales/target/view');?>">
												<i class="fa fa-angle-double-right"></i>
												Forecast/Target
											</a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<li <?php if($ac == "s_memo" || $ac == "s_incoming" || $ac == "s_outgoing") echo "class='active'";?>>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Other Forms</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php
										if($this->mddata->access($this->session->userdata('group'), 'd3')->d3 >= 1)
										{
										?>
										<li <?php if($ac == "s_memo") echo "class='active'";?>>
											<a href="<?php echo site_url('sales/memo/view');?>">
												<i class="fa fa-angle-double-right"></i>
												Internal Memo
											</a>
										</li>
										<li <?php if($ac == "s_incoming") echo "class='active'";?>>
											<a href="<?php echo site_url('sales/incoming/view');?>">
												<i class="fa fa-angle-double-right"></i>
												Incoming Letter Registration
											</a>
										</li>
										<li <?php if($ac == "s_outgoing") echo "class='active'";?>>
											<a href="<?php echo site_url("sales/outgoing/view"); ?>">
												<i class="fa fa-angle-double-right"></i>
												Outgoing Letter Registration
											</a>
										</li>
										<li <?php if($ac == "s_direksi") echo "class='active'";?>>
											<a href="<?php echo site_url("sales/direksi/view"); ?>">
												<i class="fa fa-angle-double-right"></i>
												Catatan Direksi
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Letter Of Support
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd4')->d4 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Customer Visit Report
											</a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<?php
								if($this->mddata->access($this->session->userdata('group'), 'd5')->d5 >= 1)
								{
								?>
								<li>
									<a href="#">
										<i class="livicon" data-name="users" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
										<span class="title">Profile</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Short Brief
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Organization Structure
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Jobdesc And KPI
											</a>
										</li>
									</ul>
								</li>
								<?php
								}
								if($this->mddata->access($this->session->userdata('group'), 'd6')->d6 >= 1)
								{
								?>
								<li>
									<a href="#">
										<i class="livicon" data-name="map" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Rules And Downloads</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												List Of Policies
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales SOP
											</a>
										</li>
									</ul>
								</li>
								<?php
								}
								?>
                            </ul>
                        </li>
						<li <?php if($this->uri->segment(1) == "op") echo "class='active'"; ?>>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Operational</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
									<a href="#">
										<i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Dashboard</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php
										if($this->mddata->access($this->session->userdata('group'), 'd7')->d7 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Graphic Import Cost
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Graphic Transport Cost
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Import Lead Time Performance
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Supply Lead Time Performance
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd8')->d8 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Budget vs Actual
											</a>
										</li>
										<?php } ?>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Operational Report</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php
										if($this->mddata->access($this->session->userdata('group'), 'd9')->d9 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Import Cost Report
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Transport Cost Report
											</a>
										</li>
										<?php
										} 
										if($this->mddata->access($this->session->userdata('group'), 'd10')->d10 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Import Lead Time Report
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Supply Lead Time Report
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd11')->d11 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Budget vs Actual Report
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd8')->d8 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Cases
											</a>
										</li>
										<?php
										}
										?>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Transaction</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php
										if($this->mddata->access($this->session->userdata('group'), 'd12')->d12 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Purchase Order
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd13')->d13 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Stock Transaction
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd14')->d14 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Petty Cash
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Price List
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Budget
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Realisasi
											</a>
										</li>
										<?php
										}
										?>
									</ul>
								</li>
								<li <?php if($ac == "op_memo" || $ac == "op_incoming" || $ac == "op_outgoing") echo "class='active'; "?>>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Other Forms</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php
										if($this->mddata->access($this->session->userdata('group'), 'd15')->d15 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Payment Memo
											</a>
										</li>
										<li <?php if($ac == "op_incoming") echo "class='active'"; ?>>
											<a href="<?php echo site_url('op/incoming/view');?>">
												<i class="fa fa-angle-double-right"></i>
												Incoming Letter Registration
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd16')->d16 >= 1)
										{
										?>
										<li <?php if($ac == "op_outgoing") echo "class='active'"; ?>>
											<a href="<?php echo site_url('op/outgoing/view')?>">
												<i class="fa fa-angle-double-right"></i>
												Outgoing Letter Registration
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Letter Of Authorization
											</a>
										</li>
										<li <?php if($ac == "op_memo") echo "class='active'; "?>>
											<a href="<?php echo site_url('op/memo/view'); ?>">
												<i class="fa fa-angle-double-right"></i>
												Internal Memo
											</a>
										</li>
										<?php
										}
										?>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="users" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
										<span class="title">Profile</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php
										if($this->mddata->access($this->session->userdata('group'), 'd18')->d18 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Short Brief
											</a>
										</li>
										<?php
										}
										if($this->mddata->access($this->session->userdata('group'), 'd19')->d19 >= 1)
										{
										?>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Organization Structure
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Jobdesc And KPI
											</a>
										</li>
										<?php
										}
										?>
									</ul>
								</li>
								<?php
								if($this->mddata->access($this->session->userdata('group'), 'd20')->d20 >= 1)
								{
								?>
								<li <?php if($ac == "op_hs") echo "class='active'"; ?>>
									<a href="#">
										<i class="livicon" data-name="map" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Rules And Downloads</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li <?php if($ac == "op_hs") echo "class='active'"; ?>>
											<a href="<?php echo site_url('op/hs/view'); ?>">
												<i class="fa fa-angle-double-right"></i>
												HS Code List
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Import Licences
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Operational SOP
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Government Regulation
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Business Document Template
											</a>
										</li>
									</ul>
								</li>
								<?php
								}
								?>
							</ul>
						</li>
						<?php
						if($this->mddata->access($this->session->userdata('group'), 'd21')->d21 >= 1)
						{
						?>
						<li <?php if($this->uri->segment(1) == "dm") echo "class='active'"; ?>>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Data Master</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
								<li <?php if($ac == 'dm_item') echo "class='active'";?>>
									<a href="<?php echo site_url('dm/item/view');?>">
										<i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Item</span>
									</a>
								</li>
								
								<li <?php if($ac == 'dm_customer') echo "class='active'";?>>
									<a href="<?php echo site_url('dm/customer/view');?>">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Customer</span>
									</a>
								</li>
								<li <?php if($ac == "dm_operator") echo "class='active'"; ?>>
									<a href="<?php echo site_url('dm/operator/view');?>">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Operator</span>
									</a>
								</li>
								<li <?php if($ac == "dm_supplier") echo "class='active'"; ?>>
									<a href="<?php echo site_url('dm/supplier/view');?>">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Supplier</span>
									</a>
								</li>
								<li <?php if($ac == "dm_brand") echo "class='active'"; ?>>
									<a href="<?php echo site_url('dm/brand/view');?>">
										<i class="livicon" data-name="users" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
										<span class="title">Brand</span>
									</a>
								</li>
								<li <?php if($ac == "dm_forwarder") echo "class='active'"; ?>>
									<a href="<?php echo site_url('dm/forwarder/view');?>">
										<i class="livicon" data-name="mail" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Forwarder / Transporter</span>
									</a>
								</li>
								<li <?php if($ac == "dm_agent") echo "class='active'"; ?>>
									<a href="<?php echo site_url('dm/agent/view'); ?>">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Other Agent / Broker</span>
									</a>
								</li>
								<li <?php if($ac == "dm_personnel") echo "class='active'"; ?>>
									<a href="<?php echo site_url('dm/personnel/view'); ?>">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Personnel</span>
									</a>
								</li>
								<li <?php if($ac == "dm_budget") echo "class='active'"; ?>>
									<a href="<?php echo site_url('dm/budget/view');?>">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Budget Account</span>
									</a>
								</li>
							</ul>
						</li>
						<?php
						}
						?>
						<li>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Information</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
								<?php
								if($this->mddata->access($this->session->userdata('group'), 'd22')->d22 >= 1)
								{
								?>
								<li>
									<a href="#">
										<i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Price List</span>
									</a>
								</li>
								<?php
								}
								if($this->mddata->access($this->session->userdata('group'), 'd23')->d23 >= 1)
								{
								?>
								<?php
								}
								if($this->mddata->access($this->session->userdata('group'), 'd24')->d24 >= 1)
								{
								?>
								<li>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Dummy Of Profit Analysis</span>
									</a>
								</li>
								<?php
								}
								if($this->mddata->access($this->session->userdata('group'), 'd25')->d25 >= 1)
								{
								?>
								<li>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Dummy Of Import Analysis</span>
									</a>
								</li>
								<?php
								}
								if($this->mddata->access($this->session->userdata('group'), 'd26')->d26 >= 1)
								{
								?>
								<li>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Dummy Of Transport Analysis</span>
									</a>
								</li>
								<?php
								}
								?>
							</ul>
						</li>
						<li>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Help</span>
                            </a>
						</li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>
		<!-- Right side column. Contains the navbar and content of the page -->