<html>
<head>
<title>Memo Internal</title>
<style type="text/css">
table {
	border-collapse: collapse;
}
table, th, td {
	border: 1px solid black;
}
</style>
</head>
<body>
<center><h3>Memo Internal Permohonan Pembayaran</h3></center>
<table width="100%">
<tr>
	<td width="15%">Kepada</td>
	<td width="40%"><?php echo $memo->row()->kepada?></td>
	<td width="15%">Ref No</td>
	<td width="40%"><?php echo $memo->row()->ref?></td>
</tr>
<tr>
	<td>Tembusan</td>
	<td><?php echo $memo->row()->tembusan?></td>
	<td>Tanggal</td>
	<td><?php echo date('Y-M-d')?></td>
</tr>
<tr>
	<td>Devisi</td>
	<td><?php echo $memo->row()->devisi?></td>
	<td>Memo ID</td>
	<td><?php echo $memo->row()->memo_id?></td>
</tr>
</table>
<br />
<p>Dengan hormat, </p>
<p>Dengan ini mengajukan permohonan pembayaran untuk tagihan yang harus dibayar sebagai berikut :</p>
<table width="100%">
<tr>
	<td>ID</td>
	<td>Vendor</td>
	<td>Rate</td>
	<td>Amount</td>
	<td>Uraian</td>
	<td>Invoice No</td>
</tr>
<?php
$total = 0;
foreach($sub->result() as $c)
{
?>
<tr>
	<td><?php echo $c->cost_id; ?></td>
	<td><?php echo $c->vendor; ?></td>
	<td><?php echo $c->rate; ?></td>
	<td align="right"><?php echo number_format($c->amount,"2",".",","); $total += $c->amount; ?></td>
	<td><?php echo $c->uraian; ?></td>
	<td><?php echo $c->invoice; ?></td>
</tr>	
<?php
}
?>
<tr>
	<td colspan="3"><b>Subtotal</b></td>
	<td align="right"><b><?php echo number_format($total,2,".",","); ?></b></td>
	<td colspan="2"></td>
</tr>
</table>
<p>Kerangan<br />
* Nilai tersebut diatas belum termasuk Bank Charge<br />
* Apabila pembayaran akan dilaksanakan dalam IDR atau menggunakan system tertentu (giro/tunai/cek), agar menghubungi accounting principal/forwarder tsb<br />
Mohon agar pembayaran tersebut dapat dilaksanakan pada tanggal <b><?php echo $memo->row()->tempo; ?></b> secara <b><?php echo $memo->row()->pembayaran; ?> ke <?php echo $memo->row()->diajukan; ?></b><br />
Demikian kami sampaikan. Atas perhatiannya, kami ucapkan terima kasih.</p>
<p>Hormat kami,</p>
<br />
<p>
<b><u><?php echo $memo->row()->diajukan; ?></u></b>
<br/>Operational Div.
</p>
</body>
</html>