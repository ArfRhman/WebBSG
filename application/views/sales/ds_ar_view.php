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
              A/R Performance
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div id="containers" style="width:100%; height:400px;"></div>
          <table class="table table-striped table-responsive" id="table1">
            <thead>
              <tr>
              <th>Invoiced Amount</th>
                <th>Paid Amount</th>
                <th>% Paid Amount</th>
                <th>Outstanding Amount</th>
                <th>% Outstanding Amount</th>
                <th>Payment Range Mark</th>
                <th>Average Overdue</th>
              </tr>
            </thead>
            <tbody>
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
<script src="<?php echo base_url();?>style/highchart/js/highcharts.js"></script>
<!-- end of page level js -->
<script type="text/javascript">
  $(function () { 
    $('#containers').highcharts({
      chart: {
        type: 'column'
      },
      title: {
        text: ' A/R Performance'
      },
      xAxis: {
        categories: ['1', '2', '3']
      },
      yAxis: {
        title: {
          text: ' Forecast vs Sale'
        }
      },
      series: [{
        name: '2',
        data: [1, 0, 4]
      }, {
        name: '3',
        data: [5, 7, 3]
      }]
    });
  });
</script>
</body>
</html>