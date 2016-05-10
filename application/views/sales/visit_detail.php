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
                            Detail Visit Report <b><?php echo $am->name ?></b>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-responsive" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Visit Date</th>
                                <th>Company To Visit</th>
                                <th>Person To Visit</th>
                                <th>Purpose Of Visit</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                         $no = 1;
                         foreach($data as $d)
                         {
                             ?>
                             <tr>
                                <td><?php echo $no; $no++; ?></td>
                                <td><?php echo $d->visit_date ?></td>
                                 <?php 
                                $customer = $this->mddata->getDataFromTblWhere('tbl_dm_customer', 'id', $d->company_to_visit)->row();
                                ?>
                                <td><?php echo $customer->name ?></td>
                                <?php 
                                $personel = $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $d->person_to_visit)->row();
                                ?>
                                <td><?php echo $personel->name ?></td>
                                <td><?php echo $d->purpose_of_visit ?></td>
                                <td>
                                    <div class='btn-group'>
                                        <button type='button' class='btn btn-sm dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs'></i></button>
                                        <ul class='dropdown-menu pull-right' role='menu'>                                                           
                                           <li><a href="<?php echo site_url('sales/visit/edit/'.$d->no)?>">Edit</a></li>
                                           <li><a href="<?php echo site_url('sales/visit/delete/'.$d->no)?>">Delete</a></li>
                                       </li>
                                   </ul>
                               </div>
                           </td>
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
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/countUp/countUp.js"></script>
<!--   maps -->
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
<!-- end of page level js -->
</body>
</html>