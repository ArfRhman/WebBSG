	<style type="text/css">
    .tooltip-inner {
    max-width: 200px;
    padding: 3px 8px;
    color: #333;
    text-align: center;
    text-decoration: none;
    background-color: #f5f5f5;
    border-radius: 4px;
    border: 2px solid #000;
        /*margin-left: 15px;*/
}
.tooltip.left {
    padding: 0 5px;
    margin-left: -10px;
    font-size: 20px;
}
.cal-bg{
    background: url('<?php echo base_url()?>style/img/cal.png') no-repeat 140px;
    height: 220px;
    padding-top:50px !important;
    cursor:pointer;
}
</style>
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
                            Import Lead Time Performance
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                   <!-- <div id="containers" style="width:100%; height:auto;"></div> -->
                   <div class="col-md-6 text-center">
                    <table class="table">
                        <tr> <th style="font-size: 18px;"> Sea </th> </tr>
                        <tr> <td class="cal-bg"> 
                        <span style="font-size: 110px;" data-toggle="tooltip" data-placement="left" title="adasd"><?=$sea['overall']?></span></td> </tr>
                    </table>
                   
                </div>
                <div class="col-md-6 text-center">
              <table class="table">
                        <tr> <th style="font-size: 18px;"> Air </th> </tr>
                        <tr> <td class="cal-bg"> 
                        <span style="font-size: 110px;" data-toggle="tooltip" data-placement="left" title="Tooltip on left"><?=$air['overall']?></span></td> </tr>
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
<!-- end of page level js -->		
<script src="<?php echo base_url();?>style/highchart/js/highcharts.js"></script>
<!-- end of page level js -->
</body>
</html>