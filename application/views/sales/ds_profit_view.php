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
        var title = 'Sales Profit & Loss Summary (Year to Date)';
        var dataTahun= <?=$year?>;
        graphicNew(title,categories,dataTahun);
        $("#categories").change(function(){
          var cat = $("#categories").val();
          if(cat == "1"){ // tahun
            $("#tahun").hide();
            title = 'Sales Profit & Loss Summary (Year to Date)'; 
                // data tahunan
                categories = <?=$kateg?>;
                graphicNew(title,categories,dataTahun);
              }else if(cat == "2"){
               $("#tahun").show();
               title = 'Sales Profit & Loss Summary (' + $("#tahun").val()+')';
               categories = ['Q1', 'Q2', 'Q3', 'Q4'];
               $.get('<?=base_url()?>index.php/sales/dashboard/profit_quarterly/'+$("#tahun").val(),function(data){
                graphicNew(title,categories,JSON.parse(data));
              });
             }else if(cat == "3"){
               $("#tahun").show();
               title = 'Sales Profit & Loss Summary ('  + $("#tahun").val()+')';
                // data monthly
                categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                $.get('<?=base_url()?>index.php/sales/dashboard/profit_monthly/'+$("#tahun").val(),function(data){
                  graphicNew(title,categories,JSON.parse(data));
                });
              }
            });
  $("#tahun").change(function(){
    var cat = $("#categories").val();
                 // data quartal
                 if(cat == "2"){
                   title = ' Quarterly ' + $("#tahun").val();
                   categories = ['Q1', 'Q2', 'Q3', 'Q4'];
                   $.get('<?=base_url()?>index.php/sales/dashboard/profit_quarterly/'+$("#tahun").val(),function(data){
                    graphicNew(title,categories,JSON.parse(data));
                  });
                 }else if(cat == "3"){
                  title = ' Monthly '  + $("#tahun").val();
                  categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                  $.get('<?=base_url()?>index.php/sales/dashboard/profit_monthly/'+$("#tahun").val(),function(data){
                    graphicNew(title,categories,JSON.parse(data));
                  });
                }
              });
});
 
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
           //enabled: true,
           //format: '{point.y}'
        }
      }
    },
    tooltip: {

      formatter: function () {
       var s = [];
       $.each(this.points, function(i, point) {
         s = 'Target : <b>'+this.point.myData[0]+'</b><br>SO : <b>'+this.point.myData[1]+'</b><br>Invoice : <b>'+this.point.myData[2]+'</b><br>COGS : <b>'+this.point.myData[3]+'</b><br>Gross Profit : <b>' + this.point.myData[4] + '</b><br>Direct Cost : <b>' + this.point.myData[5] + '</b><br>Adjusment : <b>' + this.point.myData[6] + '</b><br>ENP : <b>' + this.point.myData[7] + '</b><br>';
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