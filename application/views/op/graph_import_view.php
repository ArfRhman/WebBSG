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
                <div class="form-group">
                  <div class="col-md-3">
                    <select class="form-control" id="tahun">
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                    </select>
                </div>
            </div>
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

        var categories = [2016]; // json default period
        var title = 'Import Cost ' + 2016 // json default title period
        var item = [2,3,4,2]; // default json data [item1,item2,item3,dst...]
        var myDataPerItem = [[1,1,1,1],[2,2,2,2],[3,3,3,3],[4,4,4,4]]; // default json ket. Data per item  array 2D item1 = [ket1,ket2,ket3,ket4],item2 = [ket2,ket2,ket2,ket2],dst..
        graphic(categories,title,item,myDataPerItem);

        $("#tahun").change(function(){ // data tahun change
        th = $("#tahun").val();
        categories = [th]; // json default period
        title = 'Import Cost ' + th // json default title period
        item = [5,2,1,3]; // default json data [item1,item2,item3,dst...]
        myDataPerItem = [[3,1,3,1],[2,2,2,2],[2,3,2,3],[1,4,1,4]]; // default json ket. Data per item  array 2D item1 = [ket1,ket2,ket3,ket4],item2 = [ket2,ket2,ket2,ket2],dst..
        graphic(categories,title,item,myDataPerItem);
    });
});
        function graphic(categories,title,item,myDataPerItem){

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
        data: [
        {y:5,myData: [3,1,3,1]}]  // mydata [allimport,import without VAT,taxes,custom]
    },{
        name: 'Item2',
        data: [
        {y: 2,myData:[2,2,2,2]}]
    },{
        name: 'Item3',
        data: [
        {y: 1,myData: [2,3,2,3]}]
    },{
        name: 'Item4',
        data: [
        {y: 3,myData:[1,4,1,4]}]
    }]
});
}

</script>
</body>
</html>