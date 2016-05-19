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

  var title = ' Sales By Period (Year to Date)';

  var categories = <?=$kateg?>;

  var persen = 10;

  var data = <?=$year?>;
  graphic(data,title,categories,persen);
  $("#categories").change(function(){
    var cat = $("#categories").val();
    if(cat == "1"){
      $("#tahun").hide();
      title = ' Sales By Period (Year to Date)'; 
                // data tahunan
                categories = <?=$kateg?>;
                graphic(data,title,categories,persen);
              }else if(cat == "2"){
               $("#tahun").show();
               title = ' Sales By Period ('+$("#tahun").val()+')';
                // data quartal
                categories = ['Q1', 'Q2', 'Q3', 'Q4']; 
                $.get('<?=base_url()?>index.php/sales/dashboard/period_quarterly/'+$("#tahun").val(),function(data){
                  graphic(JSON.parse(data),title,categories,persen);
                });
              }else if(cat == "3"){
               $("#tahun").show();
               title = ' Sales By Period ('+$("#tahun").val()+')';
                // data monthly
                categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                $.get('<?=base_url()?>index.php/sales/dashboard/period_monthly/'+$("#tahun").val(),function(data){
                  graphic(JSON.parse(data),title,categories,persen);
                });
              }
            });
  $("#tahun").change(function(){
    var cat = $("#categories").val();
                 // data quartal
                 if(cat == "2"){
                  title = ' Sales By Period (Quarterly)';
                  categories = ['Q1', 'Q2', 'Q3', 'Q4']; 
                  $.get('<?=base_url()?>index.php/sales/dashboard/period_quarterly/'+$("#tahun").val(),function(data){
                    graphic(JSON.parse(data),title,categories,persen);
                  });
                }else if(cat == "3"){
                  title = ' Sales By Period (Monthly)';
                  categories = ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                  $.get('<?=base_url()?>index.php/sales/dashboard/period_monthly/'+$("#tahun").val(),function(data){
                    graphic(JSON.parse(data),title,categories,persen);
                  });
                }
              });
});
  function graphic(data,title,categ,persen) { 
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
            
          }
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">Amount</span>: <b>{point.y}</b><br/>'
      },
      series: data
    });
  }
</script>
</body>
</html>