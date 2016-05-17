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
  <table width="50%" class="table header">
    <tr>
      <th width="3%">Customer</th>
      <td width="*"> : 
       2
     </td>
     </tr>
     <tr>
     <th width="3%">SO NO</th>
     <td width="15%">: 3</td>
     <th width="3%">SO Date</th>
     <td width="15%">: 3</td>
   </tr>
 </table>
 <br />
 <table width="100%" border="1">
  <tr>
    <td>Budget Code</td>
    <td>Main Budget</td>
    <td>Vendor</td>
    <td>Currency Type</td>
    <td>Amount</td>
    <td>Description</td>
    <td>Invoice No</td>
    <td>Remark</td>
  </tr>
  <tr>
    <td>21</td>
    <td>21</td>
    <td>21</td>
    <td>21</td>
    <td>21</td>
    <td>21</td>
  </tr>
  <?php
    // $no = 0;
    // foreach($tabel as $c)
    // {
  ?>
     <!--  <tr>
        <td><?php echo $c->budget_code; ?> -</td>
        <td><?php echo $c->main_budget; ?> -</td>
        <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'forwarder_id', $c->vendor)->row()->name; ?></td>
        <td><?php echo $c->currency_type; ?></td>
        <td align="right"><?php echo number_format($c->amount,"2",".",","); $total += $c->amount; ?></td>
        <td><?php echo $c->description; ?></td>
        <td><?php echo $c->invoice_no; ?></td>
        <td><?php echo $c->remark; ?></td>
      </tr>  -->
      <?php
    // }
      ?>
      <tr>
        <td colspan="4"><b>Subtotal</b></td>
        <td align="right"><b>337</b></td>
        <td colspan="3"></td>
      </tr>
    </table>
    <p>Kerangan<br />
      * Nilai tersebut diatas belum termasuk Bank Charge<br />
      * Apabila pembayaran akan dilaksanakan dalam IDR atau menggunakan system tertentu (giro/tunai/cek), agar menghubungi accounting principal/forwarder tsb<br />
      Mohon agar pembayaran tersebut dapat dilaksanakan pada tanggal <b><?php //echo $memo->row()->tempo; ?> - </b> secara <b><?php //cho $memo->row()->pembayaran; ?> - </b><br />
      Demikian kami sampaikan. Atas perhatiannya, kami ucapkan terima kasih.</p>
      <p>Hormat kami,</p>
      <br /><br>
      <table id="tbl" width="100%">
        <tr>
          <td>
            <p>
              <b><?php //echo $memo->row()->diajukan; ?> _______</b>
              
            </p>
          </td>

          <td>
            <p>
              <b><u><?php //echo $memo->row()->diajukan; ?> ________ </u></b>
              <br/>GM Operational
            </p>
          </td>
        </tr>

      </table>

    </body>
    </html>