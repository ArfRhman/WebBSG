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
                      Sales By Period
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
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
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
        var dataTarget = [49.9, 71.5, 106.4, 129.2]; // json data target disini
        var dataSO = [7.0, 6.9, 9.5, 14.5]; // json data so disini
        var dataInvoice = [7.0, 6.9, 9.5, 14.5]; // json data invoice disini
        var dataPaid = [7.0, 6.9, 9.5, 14.5]; // json data paid disini

        var title = ' Sales By Period (Year to Date)';
        
        var categories = [2016, 2017, 2018, 2019]; // json period sales disini

        var persen = 10;

        graphic(dataTarget,dataSO,dataInvoice,dataPaid,title,categories,persen);
        $("#categories").change(function(){
            var cat = $("#categories").val();
            if(cat == "1"){
              $("#tahun").hide();
              title = ' Sales By Period (Year to Date)'; 
                // data tahunan
                dataTarget = [49.9, 71.5, 106.4, 129.2]; // json data target disini
                dataSO = [7.0, 6.9, 9.5, 14.5]; // json data so disini
                dataInvoice = [7.0, 6.9, 9.5, 14.5]; // json data invoice disini
                dataPaid = [7.0, 6.9, 9.5, 14.5]; // json data paid disini
                categories = [2016, 2017, 2018, 2019]; // json period sales disini
            }else if(cat == "2"){
               $("#tahun").show();
               title = ' Sales By Period (Quarterly)';
                // data quartal
                dataTarget = [99.9, 71.5, 106.4, 129.2]; // json data target disini
                dataSO = [7.0, 6.9, 9.5, 14.5]; // json data so disini
                dataInvoice = [7.0, 6.9, 9.5, 14.5]; // json data invoice disini
                dataPaid = [7.0, 6.9, 9.5, 14.5]; // json data paid disini
                categories = ['Q1', 'Q2', 'Q3', 'Q4']; 
                $("#tahun").change(function(){
                 // data quartal
                  title = ' Sales By Period (Quarterly) 2016';
                dataTarget = [19.9, 71.5, 106.4, 129.2]; // json data target disini
                dataSO = [17.0, 6.9, 9.5, 14.5]; // json data so disini
                dataInvoice = [37.0, 6.9, 9.5, 14.5]; // json data invoice disini
                dataPaid = [17.0, 6.9, 9.5, 14.5]; // json data paid disini
                categories = ['Q1', 'Q2', 'Q3', 'Q4'];
                graphic(dataTarget,dataSO,dataInvoice,dataPaid,title,categories,persen);

            });
            }else{
               $("#tahun").show();
               title = ' Sales By Period (Monthly)';
                // data monthly
                dataTarget = [99.9, 71.5, 106.4, 129.2,12,1,2,3,2,1,2,1]; // json data target disini
                dataSO = [7.0, 6.9, 9.5, 14.5,12,1,2,3,2,1,2,1]; // json data so disini
                dataInvoice = [7.0, 6.9, 9.5, 14.5,12,1,2,3,2,1,2,1]; // json data invoice disini
                dataPaid = [7.0, 6.9, 9.5, 14.5,12,1,2,3,2,1,2,1]; // json data paid disini
                categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                $("#tahun").change(function(){
                 // data quartal
                  title = ' Sales By Period (Monthly) 2016';
                dataTarget = [19.9, 71.5, 106.4, 129.2,1,2,3,2,1,2,1]; // json data target disini
                dataSO = [17.0, 6.9, 9.5, 14.5,1,2,3,2,1,2,1]; // json data so disini
                dataInvoice = [37.0, 6.9, 9.5, 14.5,1,2,3,2,1,2,1]; // json data invoice disini
                dataPaid = [17.0, 6.9, 9.5, 14.5,1,2,3,2,1,2,1]; // json data paid disini
                categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                graphic(dataTarget,dataSO,dataInvoice,dataPaid,title,categories,persen);

            });
            }

            graphic(dataTarget,dataSO,dataInvoice,dataPaid,title,categories,persen);
        });
});
  function graphic(dataTarget,dataSO,dataInvoice,dataPaid,title,categ,persen) { 
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
            format: persen+' %'
        }
    }
},

tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">Amount</span>: <b>{point.y:.2f}</b><br/>'
},
series: [{
    name: 'Target/Forecast',
    data: dataTarget
}, {
    name: 'SO',
    data: dataSO
}, {
    name: 'Invoice',
    data: dataInvoice
}, {
    name: 'Paid',
    data: dataPaid
}]
});
}
</script>
</body>
</html>