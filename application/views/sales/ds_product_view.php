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
              <select class="form-control" id="tahun" style="display:none;">
                <option>-- Pilih Tahun --</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
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
    var data1 = <?=$data?>;
    var title = 'Sales By Product (Year to Date)';
    graphic(data1,title);
    $("#categories").change(function(){
      var cat = $("#categories").val();
                if(cat == "1"){ // year to date SO
                 $("#tahun").hide();
                 title = 'Sales By Product (Year to Date)';
                 graphic(data1,title);
                }else if(cat == "2"){ // pareto
                  $("#tahun").show();
                  title = 'Pareto :Product vs Profit ' + $("#tahun").val(); // default title
                  var categories = [$("#tahun").val()]; // json default period
                  var item = [2,3,4,2]; // default json data [item1,item2,item3,dst...]
                  var myDataPerItem = [[1,1,1,1],[2,2,2,2],[3,3,3,3],[4,4,4,4]]; // default json ket. Data per item  array 2D item1 = [ket1,ket2,ket3,ket4],item2 = [ket2,ket2,ket2,ket2],dst..
                  graphicBar(categories,title,item,myDataPerItem);

                  $("#tahun").change(function(){
                 // data quartal
                 title = ' Pareto :Product vs Profit '+ $("#tahun").val();

                 myDataPerItem = [[1,3,1,1],[2,2,3,2],[3,1,3,3],[4,4,4,4]]; // default json ket. Data per item  array 2D item1 = [ket1,ket2,ket3,ket4],item2 = [ket2,ket2,ket2,ket2],dst..

                item = [4,2,1,5]; // json data from tahun [item1,item2,item3,dst...]
                categories = [$("#tahun").val()];
                graphicBar(categories,title,item,myDataPerItem);

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
function graphicBar(categories,title,item,myDataPerItem){

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
      return 'Amount SO : <b>' + this.point.myData[0] + '</b><br>Profit : <b>' + this.point.myData[1] + '</b><br>% Amount : <b>' + this.point.myData[2] + '</b><br>% Profit : <b>' + this.point.myData[3] + '</b><br>';
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
     // json data
     name: 'Item1',
     data: [
        {y:item[0],myData: myDataPerItem[0]}]  // mydata [Amount SO,Profit, %amount,%profit]
      },{
        name: 'Item2',
        data: [
        {y: item[1],myData:myDataPerItem[1]}]
      },{
        name: 'Item3',
        data: [
        {y: item[2],myData: myDataPerItem[2]}]
      },{
        name: 'Others',
        data: [
        {y: item[3],myData:myDataPerItem[3]}]
      }]
    });
}
</script>
</body>
</html>