  
<aside class="right-side">
 <!-- Main content -->
 <section class="content-header">
  <h1>Welcome to Dashboard</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
     <?php
     if($this->session->flashdata('data') == TRUE)
     {
       ?>
       <div class="panel-heading">
        <h3 class="panel-title">
          <?php echo $this->session->flashdata('data');?>
        </h3>
      </div>
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
      <?php
      if($this->session->userdata('group')==2)
      {
        ?>
        <div class="row">
          <form  enctype="multipart/form-data" action="<?php echo site_url('op/structure/save');?>" method="post">
            <div class="col-md-7">
              <input type="file" name="file" class="form-control"> 
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          <?php } ?>
        </div>
        <div class="row">
          <hr>
          <img src="<?=base_url()?><?=$st->value?>" style="max-width:1000px;"/>
        </div>
      </div>

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
<script src="<?php echo base_url();?>style/orgchart/jquery.orgchart-sales.js" type="text/javascript"></script>

<!-- end of global js -->
<!-- end of page level js -->
</body>
</html>