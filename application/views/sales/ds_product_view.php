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
              Sales By Product
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-3">
              <select class="form-control" id="categories">
                <option value="1">Year to date</option>
                <option value="2">Pareto: product vs profit</option>
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
        var data1 = [49.9, 71.5, 106.4, 129.2];
        var data2 = [7.0, 6.9, 9.5, 14.5];
        var title = ' Sales By Product';
        var categories = ['Jan', 'Feb', 'Mar', 'Apr'];
        graphic(data1,data2,title,categories);
        $("#categories").change(function(){
            var cat = $("#categories").val();
            if(cat == "1"){
                title = ' Sales By Product (Year to Date)';
                
            }else if(cat == "2"){
                title = ' Sales By Product (Pareto: product vs profit)';
            }
            categories = ['Jan', 'Feb', 'Mar'];
            data1 = [100, 100, 100,];
            data2 = [7.0, 6.9, 9.5];
            graphic(data1,data2,title,categories);
        });
    });
  function graphic(data1,data2,title,categ) { 
    $('#containers').highcharts({
      chart: {
        type: 'column'
      },
      title: {
        text: title
      },
      xAxis: {
        categories: categ
      },
      yAxis: {
        title: {
          text: ' Sales By Product'
        }
      },
      series: [{
        name: '2',
        data: data1
      }, {
        name: '3',
        data: data2
      }]
    });
  }
</script>
</body>
</html>