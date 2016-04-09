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
                <option>-- Pilih Grafik --</option>
                <option value="1">Year to date of Operator</option>
                <option value="2">Year to date of Customer</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control" id="am" style="display:none;">
                <?php
                $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                foreach($sql->result() as $s)
                {
                  ?>
                  <option value="<?php echo $s->id;?>-<?php echo $s->name;?>"><?php echo $s->name ?></option>
                  <?php
              }
              ?>
          </select>
      </div>
  </div>
  <div id="containers" style="width:100%;height:auto;margin-top:5%;"></div>
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
        var data1;
        var amsplit;
        var am;
        var title;
        $("#categories").change(function(){
            var cat = $("#categories").val();
            if(cat == "1"){ // data operator
               $("#am").show();
               amsplit = $("#am").val().split('-');
               am = amsplit[1];
               data1 = [ // data operator default
               {name: 'Operator 1',y: 96.33}, 
               {name: 'Operator 2',y: 16.33},
               {name: 'Operator 3',y: 36.33},
               {name: 'Operator 4',y: 56.33},
               {name: 'Operator 5',y: 16.33},
               {name: 'Others',y: 16.33},
               ];
               title = 'Year to Date of Operators ('+am+')';
                graphic(data1,title);
               $("#am").change(function(){
                 amsplit = $("#am").val().split('-');
                 am = amsplit[1];
                 data1 = [  // data operator by AM
                 {name: 'Operator 1',y: 66.33}, 
                 {name: 'Operator 2',y: 16.33},
                 {name: 'Operator 3',y: 36.33},
                 {name: 'Operator 4',y: 96.33},
                 {name: 'Operator 5',y: 16.33},
                 {name: 'Others',y: 16.33},
                 ];
                 title = 'Year to Date of Operators ('+am+')';
                 graphic(data1,title);
             });
              
           }else if(cat == "2"){ // data customer
               $("#am").show();
               amsplit = $("#am").val().split('-');
               am = amsplit[1];
               data1 = [ // data customer default
               {name: 'Customer 1',y: 56.33}, 
               {name: 'Customer 2',y: 23.33},
               {name: 'Customer 3',y: 17.33},
               {name: 'Customer 4',y: 51.33},
               {name: 'Customer 5',y: 21.33},
               {name: 'Others',y: 16.33},
               ];
               title = 'Year to Date of Customer ('+am+')';
               graphic(data1,title);
               $("#am").change(function(){
                 amsplit = $("#am").val().split('-');
                 am = amsplit[1];
                 data1 = [ // data customer by operator
                 {name: 'Customer 1',y: 16.33}, 
               {name: 'Customer 2',y: 23.33},
               {name: 'Customer 3',y: 37.33},
               {name: 'Customer 4',y: 51.33},
               {name: 'Customer 5',y: 81.33},
               {name: 'Others',y: 6.33},
                 ];
                title = 'Year to Date of Customer ('+am+')';
                 graphic(data1,title);
             });
           }
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
</script>
</body>
</html>