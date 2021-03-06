<html>
<head>
  <title>Analisa Profit</title>
  <style type="text/css">
    table {
      border-collapse: collapse;
    }

    #tbl{
      border: none;
    }

    .header th {
      text-align: left;
    }
    .header td {
      text-align: left;
    }
  </style>
</head>
<body>
  <center><h3>Analisa Import</h3></center>
  <table width="75%" border="0" class="table header">
    <tr>
      <th width="3%">Supplier</th>
      <td width="*" colspan="3"> : <?php echo $this->mddata->getDataFromTblWhere('tbl_dm_supplier', 'id', $in->supplier)->row()->supplier; ?></td>
    </tr>
    <tr>
     <th width="3%">PO No</th>
     <td width="39%">: <?=$in->po_no;?></td>
   </tr>
   <tr>
     <th width="3%">PO Date</th>
     <td width="39%">: <?=$in->po_date;?></td>
   </tr>
   <tr>
     <th width="3%">PIB Date</th>
     <td width="39%">: <?php echo $this->mddata->getDataFromTblWhere('tbl_op_po_documentation', 'no_po', $in->no)->row()->pib_date; ?></td>
   </tr>
   <tr>
     <th width="3%">Forwarder</th>
     <td width="39%">: <?php echo $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'id', $in->forwarder)->row()->name; ?></td>
   </tr>
   <tr>
     <th width="3%">Moda</th>
     <td width="39%" colspan="3">: <?=$in->moda;?></td>
   </tr>
 </table>
 <br>

 <table width="100%" border="1">
  <tr>
    <th>No</th>
    <th>Item Name</th>
    <th>Qty</th>
    <th>Total Purchase</th>
    <th>All Import Cost</th>
    <th>%</th>
  </tr>
  <?php
  $tQty=0;
  $tTp=0;
  $tAllImportCost=0;
  $costWithoutVat=0;
  $tax=0;
  $clearance=0;
  $no = 1;
  $total=0;
  $tabel=$this->mddata->getDataFromTblWhere('tbl_op_po_tabel', 'no_po', $in->no);
  $opt=array();
  foreach($tabel->result() as $c){
    $costing = $this->mddata->getDataFromTblWhere('tbl_op_po_costing', 'no_po', $c->no_po)->row();
    $tQty+=$c->qty;
    $tTp+=$c->qty*$c->unit_price;
    $tAllImportCost+=$costing->total_cost;
    $costWithoutVat+=$costing->total_cost_without_vat;
    $tax+=$costing->total_tax;
    $clearance+=$costing->total_clearance;
    $total_purchase=$c->qty*$c->unit_price;
    ?>
    <tr>
     <td><?=$no;$no++;?></td>
     <td><?=$c->item;?></td>
     <td><?=$c->qty;?></td>
     <td><?=$total_purchase?></td>
     <td><?=$costing->total_cost?></td>
     <?php 
     if($total_purchase==0){
      $total_purchase=1;
    }
    ?>
    <td>(<?=($costing->total_cost/($total_purchase))*100?>%)</td>
  </tr>
  <?php
}
?>
<?php 
  if($tTp==0){
    $tTp=1;
  }
?>
<tr>
 <th colspan="2">Subtotal</th>
 <th><?=$tQty?></th>
 <th><?=$tTp?></th>
 <th><?=$tAllImportCost?></th>
 <th><?=($tAllImportCost/$tTp)*100?> %</th>
</tr>
<tr style="
height: 30px;
border: 1px solid #fff;
border-top: 1px solid #000;
">
<td colspan="6" style="border-right:1px solid #fff;"></td>
</tr>
<tr style="border:1px solid #fff;">
 <td colspan="4" style="border:1px solid #fff;">Remark :</td>
 <td style="border:1px solid #fff;">Import Cost Without VAT (% and amount)</td>
 <td align="right" style="border:1px solid #fff;"><?=$costWithoutVat?> (<?=($costWithoutVat/$tTp)*100?>%)</td>
 
</tr>
<tr style="border:1px solid #fff;">
  <td>1. </td>
  <td colspan="3" style="border:1px solid #fff;">All price in IDR</td>
  <td style="border:1px solid #fff;">Taxes & Duties (% and amount)</td>
  <td align="right" style="border:1px solid #fff;"><?=$tax?> (<?=($tax/$tTp)*100?>%)</td>
 
</tr>
<tr style="border:1px solid #fff;">
  <td>2. </td>
  <td colspan="3" style="border:1px solid #fff;">All price refer to currency conversion as started in Price list, it is 1 USD = IDR</td>
  <td style="border:1px solid #fff;">Custom Clearance (% and amount)</td>
  <td align="right" style="border:1px solid #fff;"><?=$clearance?> (<?=($clearance/$tTp)*100?>%)</td>
 
</tr>
</table>
<br>
<table  width="100%">
 <tr>
  <td>
    <p>
      <b>Issued By,</b>

    </p>
  </td>

  <td>
    <p>
      <b>Approved By,</b>

    </p>
  </td>
</tr>
<tr style="height: 40px;">
  <td></td>
</tr>
<tr>
  <td>
    <p>
      <b>_______</b>

    </p>
  </td>

  <td>
    <p>
      <b>________</b>

    </p>
  </td>
</tr>
</table>
<br>
</body>
</html>