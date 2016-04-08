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
                    Graphic Import Cost
                </div>
            </div>
        </div>
        <div class="panel-body">

            <div id="containers" style="width:100%; height:auto;"></div>

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
   	

    $(document).ready(function () {

        var chart = new Highcharts.Chart({
      chart: {
        type: 'column',
        renderTo: 'containers',
    }, 

    title: {
        text: 'Import Cost'
    },
    credits: {
        enabled: false
    },
    xAxis: {
             categories: [2016,2017,2018,2019], // json tahun periode
             title: {
              text: ' Period'
          }
      },
      yAxis: {
        title: {
            text: ' Import Cost (All Import Cost)'
        }
    },
    tooltip: {
        formatter: function () {
            return 'Import Without VAT : <b>' + this.point.myData[0] + '</b><br>Import Without VAT : <b>' + this.point.myData[1] + '</b><br>Taxes & Duties : <b>' + this.point.myData[2] + '</b><br>Custom Clearance : <b>' + this.point.myData[3] + '</b><br>';
        }
    },
    legend: {
        enabled: true
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
     series: [{
        name: 'Item1',
        // json data
        data: [
        {y: 3,myData: [20,10,20,20]},  // mydata [allimport,import without VAT,taxes,custom]
        {y: 7,myData: [20,10,20,40]}, 
        {y: 1,myData: [10,10,20,20]},
        {y: 1,myData: [10,10,20,120]},
        ]
    },{
        name: 'Item2',
        data: [
        {y: 3,myData: [20,50,20,20]}, 
        {y: 7,myData: [30,10,20,20]}, 
        {y: 1,myData: [20,10,10,60]},
        {y: 1,myData: [20,10,10,160]},
        ]
    },{
        name: 'Item3',
        data: [
        {y: 3,myData: [20,50,20,20]}, 
        {y: 1,myData: [30,10,20,20]}, 
        {y: 1,myData: [20,10,10,60]},
        {y: 1,myData: [20,10,10,160]},
        ]
    },{
        name: 'Item4',
        data: [
        {y: 5,myData: [20,50,20,20]}, 
        {y: 7,myData: [30,10,20,20]}, 
        {y: 9,myData: [20,10,10,60]},
        {y: 11,myData: [20,10,10,100]},
        ]
    }]
});
});

</script>
</body>
</html>