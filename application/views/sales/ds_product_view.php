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
            <div class="col-md-2">
              <select class="form-control" id="tahun">
                <option>-- Pilih Tahun --</option>
                <?php 
                for($i=2016;$i<=date('Y');$i++){
                  ?>
                  <option><?=$i?></option>
                  <?php 
                }
                ?>
              </select>
            </div>
          </div>
          <div id="containers" style="width:100%; height:auto; margin-top:5%;"></div>
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
    var title = 'Sales By Product ('+$("#tahun").val()+')';
    //graphic(data1,title);
    $("#categories").change(function(){
      var cat = $("#categories").val();
                if(cat == "1"){ // year to date SO
                 //$("#tahun").hide();
                 //$("#tahun").val($("#tahun option:first").val());
                 title = 'Sales By Product ('+$("#tahun").val()+')';
                 $.get('<?=base_url()?>index.php/sales/dashboard/product_year/'+$("#tahun").val(),function(data){
                  graphic(JSON.parse(data),title);
                });
                 graphic(data1,title);
                }else if(cat == "2"){ // pareto
                 // $("#tahun").show();
                  title = 'Pareto :Product vs Profit ' + $("#tahun").val(); // default title
                  var categories = [$("#tahun").val()]; // json default period
                  $.get('<?=base_url()?>index.php/sales/dashboard/product_profit/'+$("#tahun").val(),function(data){
                    graphicBar(categories,title,JSON.parse(data));
                  });
                }
              });
    $("#tahun").change(function(){
     categories = [$("#tahun").val()];
     var cat = $("#categories").val();
     if(cat == "1"){
      title = 'Sales By Product (Year to Date)';
      $.get('<?=base_url()?>index.php/sales/dashboard/product_year/'+$("#tahun").val(),function(data){
        graphic(JSON.parse(data),title);
      });
    }else{
      title = ' Pareto :Product vs Profit '+ $("#tahun").val();
      $.get('<?=base_url()?>index.php/sales/dashboard/product_profit/'+$("#tahun").val(),function(data){
        graphicBar(categories,title,JSON.parse(data));
      });
    }
  });
  });
  function graphic(data1,title){
        // Build the chart
        $('#containers').highcharts({
          chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          credits: {
            enabled: false
          },
          title: {
            text: title
          },
          tooltip: {
            pointFormat: 'Amount SO :  <b>{point.y} </b> <br> % :  <b>{point.percentage:.1f} </b>'
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: 'Amount SO :  <b> {point.y} </b> <br> % :  <b> {point.percentage:.1f}  </b>'
                // formatter: function () {
                //   return 'Amount SO : <b> ' + this.point.y + '</b><br> % : <b> ' + this.point.percentage + ' </b>';
                // }
              },
              showInLegend: true
            }
          },
          series: [{
            colorByPoint: true,
            data: data1
          }]
        });
}
function graphicBar(categories,title,data){

  var chart = new Highcharts.Chart({
    chart: {
      type: 'column',
      renderTo: 'containers',
    }, 

    title: {
      text: title
    },
    credits: {
      enabled: false
    },
    xAxis: {
     categories: categories,
     title: {
      text: ' Period'
    }
  },
  yAxis: {
    title: {
      text: ' Profit Amount'
    }
  },
  tooltip: {
    formatter: function () {
      return 'Amount SO : <b>' + this.point.myData[0] + '</b><br>Profit : <b>' + this.point.myData[1] + '</b><br>% Amount : <b>' + this.point.myData[2] + '%</b><br>% Profit : <b>' + this.point.myData[3] + '%</b><br>';
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
  series: data
});
}
</script>
</body>
</html>