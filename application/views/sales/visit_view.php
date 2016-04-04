	<aside class="right-side">
   <!-- Main content -->
   <section class="content-header">
    <h1>Welcome to Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <?php
        if($this->mddata->access($this->session->userdata('group'), 'd3')->d3 > 1)
        {
          ?>
          <a href="<?php echo site_url('sales/visit/add')?>" class="btn btn-success">Add New Data</a>
          <?php
        }
        ?>
        <div class="panel panel-primary filterable">
          <div class="panel-heading clearfix  ">
            <div class="panel-title pull-left">
             <div class="caption">
              <i class="livicon" data-name="grafik-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
              Grafik Summary Visit
            </div>
          </div>
        </div>
        <div class="panel-body">
         <div id="containers" style="width:100%; height:400px;"></div>
       </div>
     </div>
   </div>
 </div>
 <div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary filterable">
      <div class="panel-heading clearfix  ">
        <div class="panel-title pull-left">
         <div class="caption">
          <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
          Visit Report per A/M
        </div>
      </div>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sales/visit/view');?>" method="post">
        <fieldset>
          <div class="form-group">
            <label class="col-md-2 control-label" style="text-align:left" for="name">A/M</label>
            <div class="col-md-4" style="text-align:left">
              <select name="visit_am" class="form-control">
                <?php
                $sql = $this->mddata->getAllDataTbl('tbl_dm_personnel');
                foreach($sql->result() as $s)
                {
                  ?>
                  <option value="<?php echo $s->id; ?>"><?php echo $s->name ?></option>
                  <?php
                }
                ?>
              </select> 
            </div>                                                                                      
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" style="text-align:left" for="name">Range Periode</label>
            <div class="col-md-2" style="text-align:left">
              <input id="email" name="from_date" placeholder="Date" class="form-control datepicker" type="text"> 
            </div>  
            <div class="col-md-1" style="text-align:center;margin:0 -4%">
              -
            </div>
            <div class="col-md-2" style="text-align:left">
             <input id="email" name="to_date" placeholder="Date" class="form-control datepicker" type="text"> 
           </div>  
           <div class="col-md-4">
            <button type="submit" class="btn btn-responsive btn-primary btn-sm">Search</button>
          </div>                                                                                  
        </div>
      </fieldset>
    </form>
    <hr>
    <table class="table table-striped table-responsive" id="table1">
      <thead>
        <tr>
          <th>Period</th>
          <th>AM Name</th>
          <th>Customer</th>
          <th>Total Visit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1; 
        foreach($res as $r){
          ?>
          <tr>
            <td><?=$r['from']?> - <?=$r['to']?></td>
            <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $r['am'])->row()->name; ?></td>
            <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_customer', 'id', $r['company_to_visit'])->row()->name; ?></td>
            <td><?=$r['total']?></td>
          </tr>
          <?php 
        } 
        ?>
      </tbody>
    </table>
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

<script type="text/javascript" src="<?php echo base_url();?>style/js/bootstrap-datepicker.min.js"></script>  

<script type="text/javascript" src="<?php echo base_url();?>style/vendors/countUp/countUp.js"></script>
<!--   maps -->
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>

<!-- end of page level js -->
<!-- end of page level js -->       <script>        $(document).ready(function(){           $('.datepicker').datepicker({               format:'dd/mm/yyyy'          });     });     </script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/countUp/countUp.js"></script>
<script src="<?php echo base_url();?>style/highchart/js/highcharts.js"></script>
<!-- end of page level js -->
<script type="text/javascript">

  $(document).ready(function () {
    var data1 = <?=json_encode(array_values($val))?>;
    var title = 'Total Visit This Month';
    var categories = <?=json_encode(array_values($am))?>;
    graphic(data1,title,categories);
  });
  function graphic(data1,title,categ) { 
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
          text: 'Total Visit'
        }
      },
      series: [{
        name: 'Account Manager',
        data: data1
      }]
    });
  }
</script>
</body>
</html>