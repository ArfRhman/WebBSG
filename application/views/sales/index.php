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
                                    Riot
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Body -->
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="user" data-s="18"></i>
                                    My Profile
                                </a>
                            </li>
                            <li role="presentation"></li>
                            <li>
                                <a href="#">
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
						<li class="active">
                            <a href="#">
                                <i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Home Page</span>
                            </a>
						</li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Sales And Marketing</span>
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
								<li>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Transaction</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Sales Order
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Forecast
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
												Target
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Other Forms</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Internal Memo
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Incoming Letter Registration
											</a>
										</li>
										<li>
											<a href="#">
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
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Letter Of Support
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Customer Visit Report
											</a>
										</li>
									</ul>
								</li>
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
												Jobdesc
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
                            </ul>
                        </li>
						<li>
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
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Import Cost
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Transport Cost
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
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Budget vs Actual
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Operational Report</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
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
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Budget vs Actual Report
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Cases
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Transaction</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Purchase Order
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Chase
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
												Target
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Other Forms</span>
										<span class="fa arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Payment Memo
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Incoming Letter Registration
											</a>
										</li>
										<li>
											<a href="#">
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
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Internal Memo
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Agreement Letter
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-angle-double-right"></i>
												Other
											</a>
										</li>
									</ul>
								</li>
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
												Jobdesc
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
							</ul>
						</li>
						<li>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Data Master</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
								<li>
									<a href="#">
										<i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Item</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Customer</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Operator</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Supplier</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="users" data-c="#418BCA" data-hc="#418BCA" data-size="18" data-loop="true"></i>
										<span class="title">Brand</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="mail" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Forwarder</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Local Transporter</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Account Manager</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Personnel</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Budget Account</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
                            <a href="#">
                                <i class="livicon" data-name="data" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Information</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
								<li>
									<a href="#">
										<i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
										<span class="title">Price List</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="barchart" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
										<span class="title">Dummy Of Profit Analysis</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="table" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
										<span class="title">Dummy Of Import Analysis</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18" data-loop="true"></i>
										<span class="title">Dummy Of Transport Analysis</span>
									</a>
								</li>
							</ul>
						</li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Welcome to Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                            Home
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 text-right">
                                            <span>Views Today</span>
                                            <div class="number" id="myTargetElement1"></div>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement1.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement1.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Today's Sales</span>
                                            <div class="number" id="myTargetElement2"></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement2.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement2.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Subscribers</span>
                                            <div class="number" id="myTargetElement3"></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement3.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement3.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Registered Users</span>
                                            <div class="number" id="myTargetElement4"></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <h4 id="myTargetElement4.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">Last Month</small>
                                            <h4 id="myTargetElement4.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row ">
                    <div class="col-md-8 col-sm-6">
                        <div class="panel panel-border">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="dashboard" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                                    Realtime Server Load
                                    <small>- Load on the Server</small>
                                </h3>
                            </div>
                            <div class="panel-body">
                              <div id="realtimechart" style="height:350px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="panel blue_gradiant_bg">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Server Stats
                                    <small class="white-text">- Monthly Report</small>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="sparkline-chart">
                                            <div class="number" id="sparkline_bar"></div>
                                            <h3 class="title">Network</h3>
                                        </div>
                                    </div>
                                    <div class="margin-bottom-10 visible-sm"></div>
                                    <div class="margin-bottom-10 visible-sm"></div>
                                    <div class="col-sm-6">
                                        <div class="sparkline-chart">
                                            <div class="number" id="sparkline_line"></div>
                                            <h3 class="title">Load Rate</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- BEGIN Percentage monitor -->
                        <div class="panel green_gradiante_bg ">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="spinner-six" data-size="16" data-loop="false" data-c="#fff" data-hc="white"></i>
                                    Result vs Target
                                </h3>
                            </div>
                            <div class="panel-body nopadmar">
                                <div class="row">
                                    <div class="col-sm-6 text-center">
                                        <h4 class="small-heading">Sales</h4>
                                        <span class="chart cir chart-widget-pie widget-easy-pie-1" data-percent="45">
                                            <span class="percent">45</span>
                                            <canvas height="110" width="110"></canvas>
                                        </span>
                                    </div>
                                    <!-- /.col-sm-4 -->
                                    <div class="col-sm-6 text-center">
                                        <h4 class="small-heading">Reach</h4>
                                        <span class="chart cir chart-widget-pie widget-easy-pie-3" data-percent="25">
                                            <span class="percent">25</span>
                                            <canvas height="110" width="110"></canvas>
                                        </span>
                                    </div>
                                    <!-- /.col-sm-4 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- END BEGIN Percentage monitor-->
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-border">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="calendar" data-size="16" data-loop="true" data-c="#333" data-hc="#333"></i>
                                    Calendar
                                </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div id='external-events'></div>
                                <div id="calendar"></div>
                                <div class="box-footer pad-5">
                                    <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Create event</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    <i class="fa fa-plus"></i>
                                                    Create Event
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <input type="text" id="new-event" class="form-control" placeholder="Event">
                                                    <div class="input-group-btn">
                                                        <button type="button" id="color-chooser-btn" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                            Type
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right" id="color-chooser">
                                                            <li>
                                                                <a class="palette-primary" href="#">Primary</a>
                                                            </li>
                                                            <li>
                                                                <a class="palette-success" href="#">Success</a>
                                                            </li>
                                                            <li>
                                                                <a class="palette-info" href="#">Info</a>
                                                            </li>
                                                            <li>
                                                                <a class="palette-warning" href="#">warning</a>
                                                            </li>
                                                            <li>
                                                                <a class="palette-danger" href="#">Danger</a>
                                                            </li>
                                                            <li>
                                                                <a class="palette-default" href="#">Default</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group --> </div>
                                                <!-- /input-group --> </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger pull-right"  data-dismiss="modal">
                                                    Close
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <button type="button" class="btn btn-success pull-left" id="add-new-event" data-dismiss="modal">
                                                    <i class="fa fa-plus"></i>
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- To do list -->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="panel panel-primary todolist">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white" data-l="true"></i>
                                    To Do List
                                </h4>
                            </div>
                            <div class="panel-body nopadmar">
                                <form class="row list_of_items">
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck checkbox-custom">
                                                <input type="checkbox" class="striked large" />
                                            </div>
                                            <div class="todotext todoitem">Meeting with CEO</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Team Out</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Review On Sales</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Meeting with Client</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Analysis on Views</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Seminar on Market</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Business Review</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Purchase Equipment</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Meeting with CEO</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="todolist_list showactions">
                                        <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                            <div class="todoitemcheck">
                                                <input type="checkbox" class="striked" />
                                            </div>
                                            <div class="todotext todoitem">Takeover Leads</div>
                                        </div>
                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                            <a href="#" class="todoedit">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            |
                                            <a href="#" class="tododelete redcolor">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <div class="todolist_list adds">
                                    <form role="form" id="main_input_box" class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only" for="AddTask">Add Task</label>
                                            <input id="custom_textbox" name="Item" type="text" required placeholder="Add list item here" class="form-control" />
                                        </div>
                                        <input type="submit" value="Add Task" class="btn btn-primary add_button" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row ">
                    <div class="col-md-4 col-sm-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="mail" data-size="18" data-color="white" data-hc="white" data-l="true"></i>
                                    Quick Mail
                                </h4>
                            </div>
                            <div class="panel-body no-padding">
                                <div class="compose row">
                                    <label class="col-md-3 hidden-xs">To:</label>
                                    <input type="text" class="col-md-9 col-xs-9" placeholder="name@email.com " tabindex="1" />
                                    <div class="clear"></div>
                                    <label class="col-md-3 hidden-xs">Subject:</label>
                                    <input type="text" class="col-md-9 col-xs-9" tabindex="1" placeholder="Subject" />
                                    <div class="clear"></div>
                                    <div class='box-body'>
                                        <form>
                                            <textarea class="textarea textarea_home" placeholder="Write mail content here"></textarea>
                                        </form>
                                    </div>
                                    <br />
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-danger">Send</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="panel panel-border">
                        
                            <div class="panel-heading">
                                <h4 class="panel-title pull-left">
                                    <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#515763" data-hc="#515763"></i>
                                    Visitors Map
                                </h4>

                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="livicon" data-name="settings" data-size="16" data-loop="true" data-c="#515763" data-hc="#515763"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a class="panel-collapse collapses" href="#">
                                                <i class="fa fa-angle-up"></i>
                                                <span>Collapse</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="panel-refresh" href="#">
                                                <i class="fa fa-refresh"></i>
                                                <span>Refresh</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="panel-config" href="#panel-config" data-toggle="modal">
                                                <i class="fa fa-wrench"></i>
                                                <span>Configurations</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="panel-expand" href="#">
                                                <i class="fa fa-expand"></i>
                                                <span>Fullscreen</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="panel-body nopadmar">
                                <div id="world-map-markers" style="width:100%; height:300px;"></div>
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
    <!--  todolist-->
    <script src="<?php echo base_url();?>style/js/todolist.js"></script>
    <!-- EASY PIE CHART JS -->
    <script src="<?php echo base_url();?>style/vendors/charts/easypiechart.min.js"></script>
    <script src="<?php echo base_url();?>style/vendors/charts/jquery.easypiechart.min.js"></script>
    <!--for calendar-->
    <script src="<?php echo base_url();?>style/vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>style/vendors/fullcalendar/calendarcustom.min.js" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="<?php echo base_url();?>style/vendors/charts/jquery.flot.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>style/vendors/charts/jquery.flot.resize.min.js" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="<?php echo base_url();?>style/vendors/charts/jquery.sparkline.js"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="<?php echo base_url();?>style/vendors/countUp/countUp.js"></script>
    <!--   maps -->
    <script src="<?php echo base_url();?>style/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url();?>style/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url();?>style/vendors/jscharts/Chart.js"></script>
    <script src="<?php echo base_url();?>style/js/dashboard.js" type="text/javascript"></script>
    <!-- end of page level js -->
</body>
</html>
