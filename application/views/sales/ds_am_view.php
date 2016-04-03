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
                  Sales By Account Manager
              </div>
          </div>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <div class="col-md-3">
            <select id="categories" class="form-control">
                <option value="1">Year to date of Operator</option>
                <option value="2">Year to date of Mitra</option>
            </select>
        </div>
    </div>
    <div id="containers" style="width:100%; height:400px;"></div>
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
        var data1 = [{
                    name: 'Microsoft Internet Explorer',
                    y: 56.33
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Firefox',
                    y: 10.38
                }, {
                    name: 'Safari',
                    y: 4.77
                }, {
                    name: 'Opera',
                    y: 0.91
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 0.2
                }];
       
        var title = 'Sales By Account Manager';
        graphic(data1,title);
        $("#categories").change(function(){
            var cat = $("#categories").val();
            if(cat == "1"){
                title = 'Sales By Account Manager (Year to Date of Operator)';
                
            }else if(cat == "2"){
                title = 'Sales By Account Manager (Year to Date of Mitra)';
            }
            data1 = [{
                    name: 'Microsoft Internet Explorer',
                    y: 56.33
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Firefox',
                    y: 10.38
                }, {
                    name: 'Safari',
                    y: 4.77
                }, {
                    name: 'Opera',
                    y: 0.91
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 20
                }];
            graphic(data1,title);
        });
    });
    
    function graphic(data1,title,categ){
        // Build the chart
        $('#containers').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: title
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: data1
            }]
        });
    }
</script>
</body>
</html>