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
                    Stock Performance
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive">
                <thead>

                    <tr>
                        <th>NO</th>
                        <th>ITEM</th>
                        <th>BRAND</th>
                        <th>MOU</th>
                        <th>QTY BALANCE</th>
                        <th>LAST ARRIVAL</th>
                        <th>AGING (days)</th>
                        <th>AVERAGE COST</th>
                        <th>AMOUNT</th>
                        <th>%</th>
                        <th>STORAGING COST</th>
                        <th>COST OF MONEY</th>
                    </tr>

                </thead>
                <tbody>
                   <?php
                                            //$no = 1;
                                            //foreach($in->result() as $c)
                                            //{
                   ?>
                   <tr style="font-weight:bold" id="package1" class="accordion-toggle" data-toggle="collapse" data-parent="#OrderPackages" data-target=".packageDetails1">
                    <td>1.</td>
                    <td>ACTIVE / FAST MOVING </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $q = $this->db->query("SELECT
                    po_tbl.item_code,
                    po_tbl.item,
                    st_tbl.mou,
                    (SELECT DATEDIFF(
                        CURDATE(),
                        STR_TO_DATE(gr_date, '%d %M %Y')) FROM tbl_op_po_report WHERE tbl_op_po_report.po_no=po_tbl.no_po) as aging,

                IF (
                    st_hdr.type = 'In'
                    OR st_hdr.type = 'Adj In',
                    st_tbl.qty,
                    po_tbl.qty - st_tbl.qty
                ) AS qty_balance
                FROM
                tbl_op_po_tabel po_tbl
                JOIN tbl_op_st_tabel st_tbl ON po_tbl.item_code = st_tbl.item_code
                JOIN tbl_op_st_header st_hdr ON st_hdr. NO = st_tbl.stock_no
                WHERE
                no_po IN (
                    SELECT
                    po_no
                    FROM
                    tbl_op_po_report
                    WHERE
                    DATEDIFF(
                        CURDATE(),
                        STR_TO_DATE(gr_date, '%d %M %Y')))")->result();
                        ?>
                        <?php
                        foreach ($q as $d) {
                            $item = $this->mddata->getDataFromTblWhere('tbl_dm_item','id',$d->item_code)->row();
                            $pl = $this->db->query("SELECT AVG(DDP_IDR) as average_cost FROM tbl_op_price_list WHERE item_id=".$d->item_code)->row();
                            ?>
                            <tr class="accordion-body collapse packageDetails1" id="accordion1">
                                <td></td>
                                <td><?php echo $d->item?></td>
                                <td></td>
                                <td><?php echo $d->mou?></td>
                                <td><?php echo $d->qty_balance?></td>
                                <td></td>
                                <td><?php echo $d->aging?></td>
                                <td><?php echo $pl->average_cost?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr id="package2" class="accordion-toggle" data-toggle="collapse" data-parent="#OrderPackages" data-target=".packageDetails2">
                            <td>2.</td>
                            <td>SLOW MOVING</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="package3" class="accordion-toggle" data-toggle="collapse" data-parent="#OrderPackages" data-target=".packageDetails3">
                            <td>3.</td>
                            <td>DEAD STOCK</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


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
<script type="text/javascript" src="<?php echo base_url();?>style/vendors/datatables/dataTables.bootstrap.js"></script>     <script type="text/javascript" src="<?php echo base_url();?>style/js/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>style/js/pages/table-advanced.js"></script>
<!-- end of page level js -->       <script>        
$(document).ready(function(){          
 $('.delete').on('click',function(){        
  var btn = $(this);             
  bootbox.confirm('Are you sure to delete this record?', function(result){        
   if(result ==true){                   
      window.location = "<?php echo site_url('op/incoming/delete');?>/"+btn.data('id'); 
  }             
});        
}); 
 $('#accordion1').on('shown.bs.collapse', function () {
    $("#package1 i.indicator").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
});
 $('#accordion1').on('hidden.bs.collapse', function () {
    $("#package1 i.indicator").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
});

 $('#accordion2').on('shown.bs.collapse', function () {
    $("#package2 i.indicator").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
});
 $('#accordion2').on('hidden.bs.collapse', function () {
    $("#package2 i.indicator").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
});  
}); 
</script>
</body>
</html>