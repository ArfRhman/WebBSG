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
         <div class="row">
          <div class="col-lg-12">

            <?php 
            $thn = date('Y');
            $sql = $this->db->query("SELECT p.id AS id,p.image AS image,p.name AS name,COUNT(scv.am) AS total_vis FROM tbl_sale_customer_visit AS scv,tbl_dm_personnel AS p WHERE scv.am = p.id AND YEAR(str_to_date(visit_date,'%d' '%b' '%Y')) = '".$thn."' GROUP BY scv.am ORDER BY total_vis DESC LIMIT 4"); 
            $coun = count($sql->result());
            foreach ($sql->result() as $s) {?>
            <div class="col-md-3" style="height: 310px !important;">
             <div class="thumbnail" style="height: 100%;">
             <img src="<?php echo base_url().$s->image ?>" width="200px">
              <div class="caption">
                <h3> <?php echo $s->name ?></h3>
                <p>Total Visit : <b><?php echo $s->total_vis ?></b></p>
              </div>
            </div>

            <!--   <table class="table table-bordered" height="100%">
                <tr>
                  <td style="vertical-align: middle;">
                    <img src="<?php echo base_url().$s->image ?>" width="200px">
                  </td>
                </tr>
                <tr>
                  <th style="vertical-align: middle;">
                    <?php echo $s->name ?>
                  </th>
                </tr>
                <tr>
                  <th style="vertical-align: middle;">
                    <h4><?php echo $s->total_vis ?></h4>
                  </th>
                </tr>
              </table> -->
            </div>
            <?php }
            ?>
          </div>
        </div>
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
      <table class="table table-bordered table-stripped">
        <tr>
          <th rowspan="2" style="vertical-align: middle;">No</th>
          <th rowspan="2" style="vertical-align: middle;">Periode</th>
          <th colspan="<?php echo $coun?>" style="text-align:center"> AM Name </th>
        </tr>
        <tr>
          <?php
          $no = 1;
          $am_id = array();
          foreach ($sql->result() as $s) {
            array_push($am_id, $s->id);
            ?>
            <th>
            <a href="<?php echo site_url('sales/visit/detail/'.$s->id.'') ?>"> <?php echo $s->name ?> </a>
           </th>
           <?php } ?>
         </tr>
         <?php 
         $bln = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

         foreach ($bln as $b) { ?>
         <tr>
          <td> <?php echo $no;  ?></td>
          <td> <?php echo $b ?> </td>
          <?php  
          $count_id = 0;
          foreach ($sql->result() as $d) {
           $data = $this->db->query("SELECT COUNT(scv.am) AS total_vis_am FROM tbl_sale_customer_visit AS scv WHERE scv.am = '".$d->id."' AND MONTH(str_to_date(visit_date,'%d' '%b' '%Y')) = '".$no."'")->row(); ?>


           <td style="text-align:right"><?php echo $data->total_vis_am ?></td>
           <?php } ?>
         </tr>
         <?php $no++; }?>


       </table>




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
              <input name="from" placeholder="Date" class="form-control datepicker" type="text"> 
            </div>  
            <div class="col-md-1" style="text-align:center;margin:0 -4%">
              -
            </div>
            <div class="col-md-2" style="text-align:left">
             <input name="to" placeholder="Date" class="form-control datepicker" type="text"> 
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