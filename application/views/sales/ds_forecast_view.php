<script src="<?php echo base_url();?>style/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<style type="text/css">
  ${demo.css}
</style>
<script type="text/javascript">
 $(function () {
   var defaultTitle = "Forecast vs Sale";
   var drilldownTitle = "Forecast vs Sale ";
   var soColor = "#7CB5EC";
   var forcastColor = "#434348";

    // Create the chart
    var chart = new Highcharts.Chart({
    // $('#container').highcharts({
      chart: {
        type: 'column',
        renderTo: 'container',
        events: {
          drilldown: function(e) {
            chart.setTitle({ text: drilldownTitle + e.point.name });
          },
          drillup: function(e) {
            chart.setTitle({ text: defaultTitle });
          }
        }
      },
      credits: {
        enabled: false
      },
      title: {
        text: defaultTitle
      },
      xAxis: {
        type: 'category',
        title: {
          text: 'Periode'
        },
      },
      yAxis: {
        title: {
          text: 'Amount'
        },
      },
      legend: {
        enabled: true
      },
      
      plotOptions: {
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true
          }
        }
      },
      series: [{
        name: 'Forecast',
        data: <?=$Fo?>
        ,},
        {
          name: 'SO',
          data: <?=$So?>
          ,
        }],

        drilldown: {

          series: 
          //Level 2
          /*
          {
            name: 'Forecast',
            id: 'fc-2016',
            data: [
            {name: 'op1',y: 5,drilldown:'op1'},
            {name: 'op2',y: 3,drilldown:'2015'}, 
            {name: 'op3',y: 2,drilldown:'2014'}
            ]
          },
           {
            name: 'SO',
            id: 'so-2016',
            data: [
            {name: 'op1',y: 6,drilldown:'op1'},
            {name: 'op2',y: 2,drilldown:'2015'}, 
            {name: 'op3',y: 3,drilldown:'2014'}
            ]
          },
          //Level 3
          {
            name: 'Operator1',
            type: 'pie',
            id: 'op1',
            data: [
            ['Customer 1', 10],
            ['Customer 2', 20],
            ['Customer 3', 20],
            ['Customer 4', 10],
           ['Customer 5', 20],
            ]
          },
          */
          <?=$drill_op?>  
       }
     });
});

</script>
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
            Forecast vs Sale
          </div>
        </div>
      </div>
      <div class="panel-body">


        <div id="container" style="width:100%; height:400px;"></div>
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
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
</body>
</html>