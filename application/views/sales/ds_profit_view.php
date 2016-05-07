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
              Sales Profit & Loss Summary
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <div class="col-md-3">
              <select class="form-control" id="categories">
                <option value="1">Year to Date</option>
                <option value="2">Quarterly</option>
                <option value="3">Monthly</option>
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" id="tahun" style="display:none;">
                <option>-- Pilih Tahun --</option>
                <?php 
                foreach(json_decode($kateg) as $k){
                ?>
                <option><?=$k?></option>
                <?php 
                }
                ?>
              </select>
            </div>
          </div>
          <br>
          <div id="containers" style="width:100%; height:auto;margin-top:3%;"></div>
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
        // default tahunan
        var categories = <?=$kateg?> // json period sales disini
        var title = ' Year to Date';
        var dataTahun= <?=$year?>;
        graphicNew(title,categories,dataTahun);
        $("#categories").change(function(){
          var cat = $("#categories").val();
          if(cat == "1"){ // tahun
            $("#tahun").hide();
            title = ' Year to Date'; 
                // data tahunan
                graphicNew(title,categories,dataTahun);
              }else if(cat == "2"){
               $("#tahun").show();
               title = ' Quarterly ' + $("#tahun").val();
                // data quartal
                dataTarget = [99.9, 71.5, 106.4, 129.2]; // json data target disini
                dataSO = [7.0, 6.9, 9.5, 14.5]; // json data so disini
                dataInvoice = [7.0, 6.9, 9.5, 14.5]; // json data invoice disini
                dataCOGS = [7.0, 6.9, 9.5, 14.5]; // json data paid disini
                categories = ['Q1', 'Q2', 'Q3', 'Q4'];
                myDataPerItem = [[1,2,3,4],[3,2,2,3],[3,3,3,3],[4,4,4,4]]; //json ket. data gimana period nya (4 Quartal)
                 graphic(dataTarget,dataSO,dataInvoice,dataCOGS,title,categories,myDataPerItem);
                $("#tahun").change(function(){
                 // data quartal
                 title = ' Quarterly ' + $("#tahun").val();
                dataTarget = [19.9, 71.5, 106.4, 129.2]; // json data target disini
                dataSO = [17.0, 6.9, 9.5, 14.5]; // json data so disini
                dataInvoice = [37.0, 6.9, 9.5, 14.5]; // json data invoice disini
                dataCOGS = [17.0, 6.9, 9.5, 14.5]; // json data paid disini
                categories = ['Q1', 'Q2', 'Q3', 'Q4'];
                myDataPerItem = [[1,2,3,4],[2,2,2,2],[3,3,3,3],[4,4,4,4]]; //json ket. data gimana period nya (4 Quartal)
                graphic(dataTarget,dataSO,dataInvoice,dataCOGS,title,categories,myDataPerItem);
              });
              }else if(cat == "3"){
               $("#tahun").show();
               title = ' Monthly '  + $("#tahun").val();
                // data monthly
                dataTarget = [99.9, 71.5, 106.4, 129.2,12,1,2,3,2,1,2,1]; // json data target disini
                dataSO = [7.0, 6.9, 9.5, 14.5,12,1,2,3,2,1,2,1]; // json data so disini
                dataInvoice = [7.0, 6.9, 9.5, 14.5,12,1,2,3,2,1,2,1]; // json data invoice disini
                dataCOGS = [7.0, 6.9, 9.5, 14.5,12,1,2,3,2,1,2,1]; // json data paid disini
                categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                myDataPerItem = [[1,2,3,4],[2,2,2,2],[3,3,3,3],[4,4,4,4],[1,2,3,4],[2,2,2,2],[3,3,3,3],[4,4,4,4],[1,2,3,4],[2,2,2,2],[3,3,3,3],[4,4,4,4]]; //json ket. data gimana period nya (12 Bulan)
                graphic(dataTarget,dataSO,dataInvoice,dataCOGS,title,categories,myDataPerItem);

                $("#tahun").change(function(){
                 // data quartal
                 title = ' Monthly '  + $("#tahun").val();
                dataTarget = [19.9, 71.5, 106.4, 129.2,1,2,3,2,1,2,1]; // json data target disini
                dataSO = [17.0, 6.9, 9.5, 14.5,1,2,3,2,1,2,1]; // json data so disini
                dataInvoice = [37.0, 6.9, 9.5, 14.5,1,2,3,2,1,2,1]; // json data invoice disini
                dataCOGS = [17.0, 6.9, 9.5, 14.5,1,2,3,2,1,2,1]; // json data paid disini
                categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                 myDataPerItem = [[1,2,3,4],[2,2,2,2],[3,3,3,3],[4,4,4,4],[1,2,3,4],[2,2,2,2],[3,3,3,3],[4,4,4,4],[1,2,3,4],[2,2,2,2],[3,3,3,3],[4,4,4,4]]; //json ket. data gimana period nya (12 Bulan)
                graphic(dataTarget,dataSO,dataInvoice,dataCOGS,title,categories,myDataPerItem);

              });
              }

              graphic(dataTarget,dataSO,dataInvoice,dataCOGS,title,categories);
            });
});
  function graphic(dataTarget,dataSO,dataInvoice,dataCOGS,title,categ,myDataPerItem) { 
    $('#containers').highcharts({
      chart: {
        type: 'column'
      },
      title: {
        text: title
      },
      credits: {
        enabled: false
      },
      xAxis: {
        categories: categ,
        title: {
          text: ' Period'
        }
      },
      yAxis: {
        title: {
          text: ' Amount'
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
      tooltip: {
          
        formatter: function () {
           var s = [];
              $.each(this.points, function(i, point) {
                 s = 'Gross Profit : <b>' + this.point.myData[0] + '</b><br>Direct Cost : <b>' + this.point.myData[1] + '</b><br>Adjusment : <b>' + this.point.myData[2] + '</b><br>ENP : <b>' + this.point.myData[3] + '</b><br>';
              });
          return s;
        },
         shared: true
      },
     
      series: [{
        name: 'Target',
        data: dataTarget,
      }, {
        name: 'SO',
        data:[
        {y:dataSO[0],myData:myDataPerItem[0]},
        {y:dataSO[1],myData:myDataPerItem[1]},
        {y:dataSO[2],myData:myDataPerItem[2]},
        {y:dataSO[3],myData:myDataPerItem[3]},
        ],
      }, {
        name: 'Invoice',
        data: [
        {y:dataInvoice[0],myData:myDataPerItem[0]},
        {y:dataInvoice[1],myData:myDataPerItem[1]},
        {y:dataInvoice[2],myData:myDataPerItem[2]},
        {y:dataInvoice[3],myData:myDataPerItem[3]},
        ]
      }, {
        name: 'COGS',
        data: [
        {y:dataCOGS[0],myData:myDataPerItem[0]},
        {y:dataCOGS[1],myData:myDataPerItem[1]},
        {y:dataCOGS[2],myData:myDataPerItem[2]},
        {y:dataCOGS[3],myData:myDataPerItem[3]},
        ]
      }]
    });
}
function graphicNew(title,categ,data) { 
    $('#containers').highcharts({
      chart: {
        type: 'column'
      },
      title: {
        text: title
      },
      credits: {
        enabled: false
      },
      xAxis: {
        categories: categ,
        title: {
          text: ' Period'
        }
      },
      yAxis: {
        title: {
          text: ' Amount'
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
      tooltip: {
          
        formatter: function () {
           var s = [];
              $.each(this.points, function(i, point) {
                 s = 'Gross Profit : <b>' + this.point.myData[0] + '</b><br>Direct Cost : <b>' + this.point.myData[1] + '</b><br>Adjusment : <b>' + this.point.myData[2] + '</b><br>ENP : <b>' + this.point.myData[3] + '</b><br>';
              });
          return s;
        },
         shared: true
      },
     
      series: data
    });
}
</script>
</body>
</html>