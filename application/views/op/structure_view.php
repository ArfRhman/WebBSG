  <link href="<?php echo base_url();?>style/orgchart/jquery.orgchart.css" media="all" rel="stylesheet" type="text/css" />
	
  <style type="text/css">
    #orgChart{
      width: auto;
      height: auto;
    }

    #orgChartContainer{
      width: 1000px;
      height: 500px;
      overflow: auto;
      background: rgba(238, 238, 238, 0.2);
    }
   div.orgChart div.node{
      min-height: 75px;
      height: auto; 
         min-width: 100px;
    width: auto;
    }
    div.orgChart div.node h2{
      margin: 7px;
    } 
     div.orgChart div.node p{
      margin-bottom: 15%;
    }
    .org-input{
      width: auto;
    }
  </style>

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
          <a href="<?php echo site_url('op/cases/add')?>" class="btn btn-success">Add New Data</a>
          <?php
        }
        ?>
        <div class="panel panel-primary filterable">
          <div class="panel-heading clearfix  ">
            <div class="panel-title pull-left">
             <div class="caption">
              <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
              Organization Structure
            </div>
          </div>
        </div>
        <div class="panel-body">
        <?php  $s = json_encode($st);?> 
         <div id="orgChartContainer">
          <div id="orgChart"></div>
        </div>
       
        ?>
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
<script src="<?php echo base_url();?>style/orgchart/jquery.orgchart.js" type="text/javascript"></script>
<script>
  $(function(){
    aa();
    org_chart = $('#orgChart').orgChart({
      data: <?php echo $s ?>,
      showControls: true,
      allowEdit: true,
      onAddNode: function(node){ 
        log('Created new node on node '+node.data.id);
        org_chart.newNode(node.data.id); 
      },
      onDeleteNode: function(node){
        log('Deleted node '+node.data.id);
        org_chart.deleteNode(node.data.id); 
      },
      onClickNode: function(node){
        log('Clicked node '+node.data.id);
      }

    });
  });
      // just for example purpose
      function aa(){
        $.ajax({
                type:'GET',
                url: '<?=base_url()?>index.php/dm/personnel/getAllPersonel',
                data: '',
                success: function(daddta){
                   alert(daddta);
               }
           });
      }
      function log(text){
        $('#consoleOutput').append('<p>'+text+'</p>')
      }
    </script>
    <script type="text/javascript"></script>
    <!-- end of global js -->
    <!-- end of page level js -->
  </body>
  </html>