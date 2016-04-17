<html>
<head>
  <title>Payment Memo</title>
  <style type="text/css">
    table {
      border-collapse: collapse;
    }

    #tbl{
      border: none;
    }
  </style>
</head>
<body>
  <center><h3>Memo Payment Permohonan Pembayaran</h3></center>
  <table width="100%" border="1">
    <tr>
      <td width="15%">Memo No</td>
      <td width="35%">
        <?php 
        $nomor = "";
        $res = $head->memo_no;
        if($res >= 1)
        {
          $nomor = "00".$res;
        }
        if($res >= 10)
        {
          $nomor = "0".$res;
        }
        if($res >= 100)
        {
          $nomor = $res;
        }
        $kode = "/PM-OPS/BSG/";
        $arrDate = explode(' ',$head->memo_date);
        $tahun = $arrDate[0];
        $bulan = $arrDate[1];
        $fb = $this->mddata->decrom_MMM($bulan);
        echo $nomor.$kode.$fb."/".$arrDate[2];
        ?>
      </td>
      <td width="15%">Memo Date</td>
      <td width="35%"><?=$head->memo_date?></td>
    </tr>
    <tr>
      <td width="15%">Addressed To</td>
      <td width="35%"><?=$head->addressed_to?></td>
      <td width="15%">CC To</td>
      <td width="35%"><?=$head->cc_to?></td>
    </tr>
    <tr>
      <td width="15%">Due Date</td>
      <td width="35%"><?=$head->due_date?></td>
      <td width="15%">Payment Type</td>
      <td width="35%"><?=$head->payment_type?></td>
    </tr>
    <tr>
      <td width="15%">Bank Name</td>
      <td width="35%"><?=$head->bank_name?></td>
      <td width="15%">Bank Account</td>
      <td width="35%"><?=$head->bank_account?></td>
    </tr>
    <tr>
      <td width="15%">Beneficiary</td>
      <td width="35%"><?=$head->beneficiary?></td>
      <td width="15%">Other Info</td>
      <td width="35%"><?=$head->other_info?></td>
    </tr>
    <tr>
      <td width="15%">Payment Date</td>
      <td width="35%"><?=$head->payment_date?></td>
      <td width="15%">Payment Amount</td>
      <td width="35%"><?=$head->payment_amount?></td>
    </tr>
  </table>
  <br />
  <p>Dengan hormat, </p>
  <p>Dengan ini mengajukan permohonan pembayaran untuk tagihan yang harus dibayar sebagai berikut :</p>
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
    <?php
    $total = 0;
    foreach($tabel as $c)
    {
      ?>
      <tr>
        <td><?php echo $c->budget_code; ?> -</td>
        <td><?php echo $c->main_budget; ?> -</td>
        <td><?php echo $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'forwarder_id', $c->vendor)->row()->name; ?></td>
        <td><?php echo $c->currency_type; ?></td>
        <td align="right"><?php echo number_format($c->amount,"2",".",","); $total += $c->amount; ?></td>
        <td><?php echo $c->description; ?></td>
        <td><?php echo $c->invoice_no; ?></td>
        <td><?php echo $c->remark; ?></td>
      </tr> 
      <?php
    }
    ?>
    <tr>
      <td colspan="4"><b>Subtotal</b></td>
      <td align="right"><b><?php echo number_format($total,2,".",","); ?></b></td>
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
            <b><u><?php //echo $memo->row()->diajukan; ?> HENDI </u></b>
            <br/>Operational Div.
          </p>
        </td>

        <td>
          <p>
            <b><u><?php //echo $memo->row()->diajukan; ?> SUSI KC </u></b>
            <br/>GM Operational
          </p>
        </td>

        <td>
          <p>
            <b><u><?php //echo $memo->row()->diajukan; ?> TAUFIK N. </u></b>
            <br/>Accounting
          </p>
        </td>

        <td>
          <p>
            <b><u><?php //echo $memo->row()->diajukan; ?> CUCU SP </u></b>
            <br/>FA Manager
          </p>
        </td>
      </tr>

    </table>

  </body>
  </html>