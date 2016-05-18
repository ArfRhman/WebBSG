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
  <center><h3>Analisa Profit</h3></center>
  <table width="56%" border="0" class="table header">
    <tr>
      <th width="3%">CUSTOMER</th>
      <td width="*" colspan="3"> : <?php echo $data->customer_name ?></td>
    </tr>
    <tr>
     <th width="3%">SO NO</th>
     <td width="20%">: <?php echo $data->so_no?></td>
     <th width="3%">SO Date</th>
     <td width="20%">: <?php echo $data->so_date?></td>
   </tr>
   <tr>
     <th width="3%">PO NO</th>
     <td width="20%">: <?php echo $data->po_no?></td>
     <th width="3%">PO Date</th>
     <td width="20%">: <?php echo $data->po_date?></td>
   </tr>
   <tr>
     <th width="3%">INV NO</th>
     <td width="20%">: <?php echo $data->inv_no?></td>
     <th width="3%">INV Date</th>
     <td width="20%">: <?php echo $data->inv_date?></td>
   </tr>
   <tr>
     <th width="3%">AM</th>
     <td width="20%">: <?php echo $this->mddata->getDataFromTblWhere('tbl_dm_personnel','id',$data->am)->row()->name; ?></td>
     <th width="3%">DIVISION</th>
     <td width="20%">: <?php echo $data->division?></td>
   </tr>
   <tr>
     <th width="3%">PROJECT</th>
     <td width="20%" colspan="3">: <?php echo $data->pn?></td>
   </tr>
   <tr>
     <th width="3%">DESCRIPTION</th>
     <td width="20%" colspan="3">: <?php echo $data->description?></td>
   </tr>
 </table>
 <br>

 <table width="100%" border="1">
  <tr>
   <th>No</th>
   <th>Item Name</th>
   <th>Mou</th>
   <th>Qty</th>
   <th>Unit Price</th>
   <th>Disc</th>
   <th>Total Price</th>
   <th>Purchase <br> Price</th>
   <th>Total <br> Purchase</th>
   <th>Profit</th>
   <th>Total Profit</th>
   <th>%</th>
 </tr>
 <?php
 $no = 1;
 $jml_up = 0;
 $jml_tp = 0;
 $jml_tpro = 0;
 $jml_per = 0;
 foreach($item as $c)
 {
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $c->item_name; ?> -</td>
    <td><?php echo $c->mou; ?></td>
    <td><?php echo $c->qty; ?></td>
    <td align="right"><?php echo ($c->price!=0)?number_format($c->price,"0",",","."):'0'; $jml_up += $c->price?></td>
    <td align="right"><?php echo number_format($c->disc,"0",",","."); ?></td>
    <td align="right"><?php echo number_format($c->total,"0",",","."); $jml_tp += $c->total?></td>
    <?php $purchase_price = $this->mddata->getDataFromTblWhere('tbl_op_pl_tabel', 'item_id', $c->item)->row()->ddp_idr; ?>
    <td align="right"><?php echo number_format($purchase_price,"0",",","."); ?></td>
    <td align="right"><?php echo number_format($c->qty * $purchase_price,"0",",","."); ?></td>
    <td align="right"><?php echo number_format($c->price - $purchase_price,"0",",","."); ?></td>  
    <?php $total_profit = $c->total - ($c->qty * $purchase_price) ?>
    <td align="right"><?php echo number_format($total_profit,"0",",","."); $jml_tpro += $total_profit?></td>  
    <?php ($c->total!=0) ? $per = $total_profit / $c->total * 100 : $per = 0; ?>
    <td align="right"><?php echo $per; $jml_per += $per ?> %</td>  

  </tr> 
  <?php
  $no++;
}
?>
<tr>
 <th colspan="2">Subtotal</th>
 <th></th>
 <th></th>
 <th></th>
 <th></th>
 <th align="right"><?php echo number_format($jml_up,"0",",","."); ?></th>
 <th></th>
 <th align="right"><?php echo number_format($jml_up,"0",",","."); ?></th>
 <th></th>
 <th align="right"><?php echo number_format($jml_tpro,"0",",","."); ?></th>
 <th align="right"><?php echo $jml_per ?> % </th>
</tr>
<tr style="
height: 30px;
border: 1px solid #fff;
border-top: 1px solid #000;
">
<td colspan="12" ></td>
</tr>
<tr style="border:1px solid #fff;">
 <td colspan="7">Remark :</td>
 <td colspan="2"> Sales Com</td>
 <td align="right"><?php echo $data->sales_com ?> %</td>
 <td align="right"><?php echo ($data->sales!='')? number_format($data->sales,"2",",","."):'-' ?></td>
 <td> </td>
</tr>
<tr style="border:1px solid #fff;">
  <td>1. </td>
  <td colspan="6">All price in IDR</td>
  <td colspan="2"> ExtCom</td>
  <td align="right"><?php echo $data->extcom ?> %</td>
  <td align="right"><?php echo ($data->extcom_pro!='')?number_format($data->extcom_pro,"2",",","."):'-' ?></td>
  <td></td>
</tr>
<tr style="border:1px solid #fff;">
  <td>2. </td>
  <td colspan="6">All price refer to currency conversion as started in Price list, it is 1 USD = IDR</td>
  <td colspan="2"> Bank Interest</td>
  <td align="right"><?php echo $data->bank_interest ?> %</td>
  <td align="right"><?php echo number_format($data->bank,"2",",",".") ?></td>
</tr>
<tr style="border:1px solid #fff;">
  <td colspan="7"></td>
  <td colspan="2"> Transport Cost</td>
  <td></td>
  <td align="right"><?php echo ($data->transport!='')?number_format($data->transport,"2",",","."):'-' ?></td>
</tr>
<tr style="border:1px solid #fff;">
  <td colspan="7"></td>
  <td colspan="2"> Adm Cost</td>
  <td></td>
  <td align="right"><?php echo ($data->adm!='')?number_format($data->adm,"2",",","."):'-' ?></td>
</tr>
<tr style="border:1px solid #fff;">
  <td colspan="7"></td>
  <td colspan="2"> Other Cost</td>
  <td></td>
  <td align="right"><?php echo ($data->other!='')?number_format($data->other,"2",",","."):'-' ?></td>
</tr>
<tr style="border:1px solid #fff;">
  <td colspan="7"></td>
  <td colspan="2"> Total Cost</td>
  <td></td>
  <?php 
  $s = $data->sales;
  $total_cost = $s + $data->extcom_pro + $data->bank + $data->transport + $data->adm + $data->other; ?>
  <td align="right"><?php echo number_format($total_cost,"2",",",".");  ?></td>
  <td align="right"><?php echo number_format($total_cost / $jml_tp * 100,"2",",",".") ?> % </td>
</tr>
<tr style="border:1px solid #fff;">
  <td colspan="7"></td>
  <td colspan="2"> E.N.P</td>
  <td></td>
  <td align="right"><?php echo number_format($jml_tpro - $total_cost,"2",",",".") ?></td>
  <td align="right"><?php echo number_format(($jml_tpro - $total_cost) / $jml_tp * 100,"2",",",".") ?> % </td>

</tr>
<tr style="border:1px solid #fff;">
  <td colspan="7"></td>
  <td colspan="2">Cost / Profit Adjustment</td>
  <td></td>
  <td><?php echo $data->other ?></td>
</tr>
<tr style="border:1px solid #fff;">
  <td colspan="7"></td>
  <td colspan="2">E.N.P Final</td>
  <td></td>
  <td><?php echo $data->other ?></td>
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