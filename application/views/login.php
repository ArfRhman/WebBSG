<?php
if($this->session->userdata('active') == TRUE)
{
	redirect('site/home');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>BSG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="<?php echo base_url();?>style/css/bootstrap.min.css" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/pages/login.css" />
    <!-- end of page level css -->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="<?php echo site_url('site/login'); ?>" autocomplete="on" method="post">
                                <h3 class="black_bg">
                                    <img src="<?php echo base_url();?>style/img/logo.png" alt="josh logo">
                                    <br>Log in</h3>
									<?php
									if($this->session->flashdata('data') == TRUE)
									{
										echo '<center>'.$this->session->flashdata('data').'</center>';
									}
									?>
                                <p>
                                    <label style="margin-bottom:0px;" for="username" class="uname"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Username
                                    </label>
                                    <input id="username" name="username" required type="text" placeholder="username or e-mail" />
                                </p>
                                <p>
                                    <label style="margin-bottom:0px;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Password
                                    </label>
                                    <input id="password" name="password" required type="password" placeholder="Password" />
                                </p>
                                <p class="login button">
                                    <input type="submit" value="Login" class="btn btn-success" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="<?php echo base_url();?>style/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>style/js/bootstrap.min.js" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?php echo base_url();?>style/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>style/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>style/js/josh.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>style/js/metisMenu.js" type="text/javascript"> </script>
    <script src="<?php echo base_url();?>style/vendors/holder-master/holder.js" type="text/javascript"></script>
    <!-- end of global js -->
</body>
</html>
