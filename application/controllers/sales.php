<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('form');
		$this->load->model('model_data', 'mddata');
		$data = array();
	}
	
	function memo()
	{
		$data['ac'] = "s_memo";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['memo'] = $this->mddata->getAllDataTbl('tbl_sale_internal_memo');
			$this->load->view('top', $data);
			$this->load->view('sales/memo_view', $data);
			break;
			case 'view_subfield':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo_subfield', 'id_memo', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/memo_view_subfield', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('sales/memo_add', $data);
			break;
			case 'edit':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/memo_edit', $data);
			break;
			case 'edit_subfield':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo_subfield', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/memo_edit_subfield', $data);
			break;
			case 'save':
			$data = array(
				'memo_id' => $this->input->post('memo_id'),
				'ref' => $this->input->post('ref'), 
				'kepada' => $this->input->post('kepada'), 
				'devisi' => $this->input->post('devisi'), 
				'tembusan' => $this->input->post('tembusan'), 
				'tempo' => $this->input->post('tempo'), 
				'pembayaran' => $this->input->post('pembayaran'), 
				'diajukan' => $this->input->post('diajukan'),
				'diketahui' => $this->input->post('diketahui'), 
				'diverifikasi' => $this->input->post('diverifikasi'),
				);
			$this->mddata->insertIntoTbl('tbl_sale_internal_memo', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'save_subfield':
			$data = array(
				'id_memo' => $this->uri->segment(4),
				'cost_id' => $this->input->post('cost_id'), 
				'vendor' => $this->input->post('vendor'), 
				'rate' => $this->input->post('rate'), 
				'amount' => $this->input->post('amount'), 
				'uraian' => $this->input->post('uraian'), 
				'invoice' => $this->input->post('invoice'),
				);
			$this->mddata->insertIntoTbl('tbl_sale_internal_memo_subfield', $data);
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'update':
			$data = array(
				'memo_id' => $this->input->post('memo_id'),
				'ref' => $this->input->post('ref'), 
				'kepada' => $this->input->post('kepada'), 
				'devisi' => $this->input->post('devisi'), 
				'tembusan' => $this->input->post('tembusan'), 
				'tempo' => $this->input->post('tempo'), 
				'pembayaran' => $this->input->post('pembayaran'), 
				'diajukan' => $this->input->post('diajukan'),
				'diketahui' => $this->input->post('diketahui'), 
				'diverifikasi' => $this->input->post('diverifikasi'),
				);
			$this->mddata->updateDataTbl('tbl_sale_internal_memo', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'update_subfield':
			$data = array(
				'cost_id' => $this->input->post('cost_id'), 
				'vendor' => $this->input->post('vendor'), 
				'rate' => $this->input->post('rate'), 
				'amount' => $this->input->post('amount'), 
				'uraian' => $this->input->post('uraian'), 
				'invoice' => $this->input->post('invoice'),
				);
			$this->mddata->updateDataTbl('tbl_sale_internal_memo_subfield', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_sale_internal_memo', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete_subfield':
			$this->mddata->deleteTblData('tbl_sale_internal_memo_subfield', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'preview':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo', 'id', $this->uri->segment(4));
			$data['sub'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo_subfield', 'id_memo', $this->uri->segment(4));
			$this->load->view('sales/memo_preview', $data);
			break;
		}
	}
	
	// So add By Gia 13 Jan 2016
	
	function so()
	{
		$data['ac'] = "s_so";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['so'] = $this->mddata->getAllDataTbl('tbl_sale_so');
			$this->load->view('top', $data);
			$this->load->view('sales/so_view', $data);
			break;
			case 'detail_view':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_detail', 'id_so', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_view_detail', $data);
			break;
			case 'delivery_view':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_delivery', 'id_so', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_view_delivery', $data);
			break;
			case 'detail_delivery_view':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_delivery', 'id_so', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_view_detail_delivery', $data);
			break;
			case 'invoice_view':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_invoicing', 'id_so', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_view_invoice', $data);
			break;
			case 'payment_view':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_payment', 'id_so', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_view_payment', $data);
			break;
			case 'cost_view':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_cost', 'id_so', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_view_cost', $data);
			break;
			case 'all_view':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_view_all', $data);
			break;
			case 'edit':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_edit', $data);
			break;
			case 'edit_detail':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_detail', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_edit_detail', $data);
			break;
			case 'edit_delivery':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_delivery', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_edit_delivery', $data);
			break;
			case 'edit_detail_delivery':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_delivery', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_edit_detail_delivery', $data);
			break;
			case 'edit_invoice':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_invoicing', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_edit_invoice', $data);
			break;
			case 'edit_payment':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_payment', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_edit_payment', $data);
			break;
			case 'edit_cost':
			$data['so'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_cost', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/so_edit_cost', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('sales/so_add', $data);
			break;
			case 'add_detail':
			$this->load->view('top', $data);
			$this->load->view('sales/so_add_detail', $data);
			break;
			case 'add_delivery':
			$this->load->view('top', $data);
			$this->load->view('sales/so_add_delivery', $data);
			break;
			case 'add_detail_delivery':
			$this->load->view('top', $data);
			$this->load->view('sales/so_add_detail_delivery', $data);
			break;
			case 'add_invoice':
			$this->load->view('top', $data);
			$this->load->view('sales/so_add_invoice', $data);
			break;
			case 'add_payment':
			$this->load->view('top', $data);
			$this->load->view('sales/so_add_payment', $data);
			break;
			case 'add_cost':
			$this->load->view('top', $data);
			$this->load->view('sales/so_add_cost', $data);
			break;
			case 'save':
			$dir = "image/s_softcopy/";
			$file = $dir . $_FILES['softcopy']['name'];
			if(move_uploaded_file($_FILES['softcopy']['tmp_name'], $file))
			{
				$data = array(
					'so_no' => $this->input->post('so_no'),
					'so_date' => $this->input->post('so_date'), 
					'po_no' => $this->input->post('po_no'), 
					'po_date' => $this->input->post('po_date'), 
					'customer_id' => $this->input->post('customer_id'), 
					'customer_name' => $this->input->post('customer_name'), 
					'address' => $this->input->post('address'), 
					'phone' => $this->input->post('phone'), 
					'fax' => $this->input->post('fax'), 
					'am' => $this->input->post('am'), 
					'division' => $this->input->post('division'), 
					'operator' => $this->input->post('operator'), 
					'pn' => $this->input->post('pn'), 
					'description' => $this->input->post('description'), 
					'payment_term' => $this->input->post('payment_term'), 
					'delivery_term' => $this->input->post('delivery_term'), 
					'delivery_cost_term' => $this->input->post('delivery_cost_term'), 
					'other_term' => $this->input->post('other_term'), 
					'other_status' => $this->input->post('other_status'),
					'softcopy' => $file,
					);
$this->mddata->insertIntoTbl('tbl_sale_so', $data);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect('sales/so/view');
} else {
	$data = array(
		'so_no' => $this->input->post('so_no'),
		'so_date' => $this->input->post('so_date'), 
		'po_no' => $this->input->post('po_no'), 
		'po_date' => $this->input->post('po_date'), 
		'customer_id' => $this->input->post('customer_id'), 
		'customer_name' => $this->input->post('customer_name'), 
		'address' => $this->input->post('address'), 
		'phone' => $this->input->post('phone'), 
		'fax' => $this->input->post('fax'), 
		'am' => $this->input->post('am'), 
		'division' => $this->input->post('division'), 
		'operator' => $this->input->post('operator'), 
		'pn' => $this->input->post('pn'), 
		'description' => $this->input->post('description'), 
		'payment_term' => $this->input->post('payment_term'), 
		'delivery_term' => $this->input->post('delivery_term'), 
		'delivery_cost_term' => $this->input->post('delivery_cost_term'), 
		'other_term' => $this->input->post('other_term'), 
		'other_status' => $this->input->post('other_status'),
		);
	$this->mddata->insertIntoTbl('tbl_sale_so', $data);
	$this->session->set_flashdata('data','Data Has Been Saved');
	redirect('sales/so/view');
}
break;
case 'save_detail':
$data = array(
	'id_so' => $this->uri->segment(4), 
	'item' => $this->input->post('item'), 
	'item_name' => $this->input->post('item_name'), 
	'brand' => $this->input->post('brand'), 
	'mou' => $this->input->post('mou'), 
	'qty' => $this->input->post('qty'), 
	'price' => $this->input->post('price'), 
	'disc' => $this->input->post('disc'), 
	'nett' => $this->input->post('nett'), 
	'total' => $this->input->post('total'), 
	'subtotal' => $this->input->post('subtotal'), 
	'discount' => $this->input->post('discount'), 
	'delivery' => $this->input->post('delivery'), 
	'nett_tax' => $this->input->post('nett_tax'), 
	'vat' => $this->input->post('vat'), 
	'grand_total' => $this->input->post('grand_total'),
	);
$this->mddata->insertIntoTbl('tbl_sale_so_detail', $data);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'save_delivery':
if($_FILES['awb_file']['size'] > 0){
	$dir = "image/s_delivery/";
	$file = $dir . $_FILES['awb_file']['name'];
	move_uploaded_file($_FILES['awb_file']['tmp_name'], $file);
}else{
	$file = '';
}
$data = array(
	'id_so' => $this->uri->segment(4), 
	'do_no' => $this->input->post('do_no'), 
	'do_date' => $this->input->post('do_date'), 
	'delivery' => $this->input->post('delivery'), 
	'delivery_by' => $this->input->post('delivery_by'), 
	'name' => $this->input->post('name'), 
	'method' => $this->input->post('method'), 
	'awb_no' => $this->input->post('awb_no'), 
	'depart' => $this->input->post('depart'), 
	'received' => $this->input->post('received'), 
	'received_by' => $this->input->post('received_by'), 
	'nett' => $this->input->post('nett'),
	'awb_file' => $file,
	);
$this->mddata->insertIntoTbl('tbl_sale_so_delivery', $data);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'save_invoice':
if($_FILES['file']['size'] > 0){
	$dir = "image/s_invoice/";
	$file = $dir . $_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $file);
}else{
	$file = '';
}
$data = array(
	'id_so' => $this->uri->segment(4), 
	'no' => $this->input->post('no'), 
	'date' => $this->input->post('date'), 
	'amount' => $this->input->post('amount'), 
	'desc' => $this->input->post('desc'), 
	'due' => $this->input->post('due'), 
	'sent' => $this->input->post('sent'), 
	'sent_by' => $this->input->post('sent_by'), 
	'received_by' => $this->input->post('received_by'), 
	'received_date' => $this->input->post('received_date'), 
	'receipt_no' => $this->input->post('receipt_no'),
	'receipt_file' => $file,
	);
$this->mddata->insertIntoTbl('tbl_sale_so_invoicing', $data);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'save_payment':
print_r($_POST);
$data = array(
	'id_so' => $this->uri->segment(4), 
	'reference' => $this->input->post('reference'), 
	'due_date' => $this->input->post('due_date'), 
	'payment_date' => $this->input->post('payment_date'), 
	'through' => $this->input->post('through'), 
	'amount' => $this->input->post('amount'), 
	'account' => $this->input->post('account'), 
	'remark' => $this->input->post('remark'), 
	);
$this->mddata->insertIntoTbl('tbl_sale_so_payment', $data);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'save_cost':
$data = array(
	'id_so' => $this->uri->segment(4), 
	'sales_com' => $this->input->post('sales_com'), 
	'sales' => $this->input->post('sales'), 
	'bank_interest' => $this->input->post('bank_interest'),
	'bank' => $this->input->post('bank'), 
	'transport' => $this->input->post('transport'), 
	'adm' => $this->input->post('adm'), 
	'other' => $this->input->post('other'), 
	'extcom' => $this->input->post('extcom'), 
	'extcom_pro' => $this->input->post('extcom_pro'), 
	'income' => $this->input->post('income'), 
	'nett' => $this->input->post('nett'), 
	'receiver' => $this->input->post('receiver'), 
	'approved' => $this->input->post('approved'), 
	'payment_date' => $this->input->post('payment_date'), 
	'through' => $this->input->post('through'), 
	);
$this->mddata->insertIntoTbl('tbl_sale_so_cost', $data);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'update':
if($_FILES['softcopy']['size'] > 0)
{
	$dir = "image/s_softcopy/";
	$file = $dir . $_FILES['softcopy']['name'];
	if(move_uploaded_file($_FILES['softcopy']['tmp_name'], $file))
	{
		$data = array(
			'so_no' => $this->input->post('so_no'),
			'so_date' => $this->input->post('so_date'), 
			'po_no' => $this->input->post('po_no'), 
			'po_date' => $this->input->post('po_date'), 
			'customer_id' => $this->input->post('customer_id'), 
			'customer_name' => $this->input->post('customer_name'), 
			'address' => $this->input->post('address'), 
			'phone' => $this->input->post('phone'), 
			'fax' => $this->input->post('fax'), 
			'am' => $this->input->post('am'), 
			'division' => $this->input->post('division'), 
			'operator' => $this->input->post('operator'), 
			'pn' => $this->input->post('pn'), 
			'description' => $this->input->post('description'), 
			'payment_term' => $this->input->post('payment_term'), 
			'delivery_term' => $this->input->post('delivery_term'), 
			'delivery_cost_term' => $this->input->post('delivery_cost_term'), 
			'other_term' => $this->input->post('other_term'), 
			'other_status' => $this->input->post('other_status'),
			'softcopy' => $file,
			);
		$this->mddata->updateDataTbl('tbl_sale_so', $data, 'id', $this->uri->segment(4));
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
	}
} else {
	$data = array(
		'so_no' => $this->input->post('so_no'),
		'so_date' => $this->input->post('so_date'), 
		'po_no' => $this->input->post('po_no'), 
		'po_date' => $this->input->post('po_date'), 
		'customer_id' => $this->input->post('customer_id'), 
		'customer_name' => $this->input->post('customer_name'), 
		'address' => $this->input->post('address'), 
		'phone' => $this->input->post('phone'), 
		'fax' => $this->input->post('fax'), 
		'am' => $this->input->post('am'), 
		'division' => $this->input->post('division'), 
		'operator' => $this->input->post('operator'), 
		'pn' => $this->input->post('pn'), 
		'description' => $this->input->post('description'), 
		'payment_term' => $this->input->post('payment_term'), 
		'delivery_term' => $this->input->post('delivery_term'), 
		'delivery_cost_term' => $this->input->post('delivery_cost_term'), 
		'other_term' => $this->input->post('other_term'), 
		'other_status' => $this->input->post('other_status'),
		);
	$this->mddata->updateDataTbl('tbl_sale_so', $data, 'id', $this->uri->segment(4));
	$this->session->set_flashdata('data','Data Has Been Saved');
	redirect($_SERVER['HTTP_REFERER']);
}
break;
case 'update_detail':
$data = array(
	'item' => $this->input->post('item'), 
	'item_name' => $this->input->post('item_name'), 
	'brand' => $this->input->post('brand'), 
	'mou' => $this->input->post('mou'), 
	'qty' => $this->input->post('qty'), 
	'price' => $this->input->post('price'), 
	'disc' => $this->input->post('disc'), 
	'nett' => $this->input->post('nett'), 
	'total' => $this->input->post('total'), 
	'subtotal' => $this->input->post('subtotal'), 
	'discount' => $this->input->post('discount'), 
	'delivery' => $this->input->post('delivery'), 
	'nett_tax' => $this->input->post('nett_tax'), 
	'vat' => $this->input->post('vat'), 
	'grand_total' => $this->input->post('grand_total'),
	);
$this->mddata->updateDataTbl('tbl_sale_so_detail', $data, 'id', $this->uri->segment(4));
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'update_delivery':
if($_FILES['awb_file']['size'] > 0){
	$dir = "image/s_delivery/";
	$file = $dir . $_FILES['awb_file']['name'];
	move_uploaded_file($_FILES['awb_file']['tmp_name'], $file);
}else{
	$file = $this->input->post('oldAWB');
}
$data = array(

	'do_no' => $this->input->post('do_no'), 
	'do_date' => $this->input->post('do_date'), 
	'delivery' => $this->input->post('delivery'), 
	'delivery_by' => $this->input->post('delivery_by'), 
	'name' => $this->input->post('name'), 
	'method' => $this->input->post('method'), 
	'awb_no' => $this->input->post('awb_no'), 
	'depart' => $this->input->post('depart'), 
	'received' => $this->input->post('received'), 
	'received_by' => $this->input->post('received_by'), 
	'nett' => $this->input->post('nett'),
	'awb_file' => $file,
	);
$this->mddata->updateDataTbl('tbl_sale_so_delivery', $data, 'id', $this->uri->segment(4));
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'update_invoice':
if($_FILES['file']['size'] > 0){
	$dir = "image/s_invoice/";
	$file = $dir . $_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $file);
}else{
	$file = $this->input->post('old_file');
}
$data = array(
	'no' => $this->input->post('no'), 
	'date' => $this->input->post('date'), 
	'amount' => $this->input->post('amount'), 
	'desc' => $this->input->post('desc'), 
	'due' => $this->input->post('due'), 
	'sent' => $this->input->post('sent'), 
	'sent_by' => $this->input->post('sent_by'), 
	'received_by' => $this->input->post('received_by'), 
	'received_date' => $this->input->post('received_date'), 
	'receipt_no' => $this->input->post('receipt_no'),
	'receipt_file' => $file,
	);
$this->mddata->updateDataTbl('tbl_sale_so_invoicing', $data, 'id', $this->uri->segment(4));
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'update_payment':
$data = array(
	'reference' => $this->input->post('reference'), 
	'due_date' => $this->input->post('due_date'), 
	'payment_date' => $this->input->post('payment_date'), 
	'through' => $this->input->post('through'), 
	'amount' => $this->input->post('amount'), 
	'account' => $this->input->post('account'), 
	'remark' => $this->input->post('remark'), 
	);
$this->mddata->updateDataTbl('tbl_sale_so_payment', $data, 'id', $this->uri->segment(4));
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'update_cost':
$data = array(
	'sales_com' => $this->input->post('sales_com'), 
	'sales' => $this->input->post('sales'), 
	'bank_interest' => $this->input->post('bank_interest'),
	'bank' => $this->input->post('bank'), 
	'transport' => $this->input->post('transport'), 
	'adm' => $this->input->post('adm'), 
	'other' => $this->input->post('other'), 
	'extcom' => $this->input->post('extcom'), 
	'extcom_pro' => $this->input->post('extcom_pro'), 
	'income' => $this->input->post('income'), 
	'nett' => $this->input->post('nett'), 
	'receiver' => $this->input->post('receiver'), 
	'approved' => $this->input->post('approved'), 
	'payment_date' => $this->input->post('payment_date'), 
	'through' => $this->input->post('through'), 
	);
$this->mddata->updateDataTbl('tbl_sale_so_cost', $data, 'id', $this->uri->segment(4));
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete':
$this->mddata->deleteTblData('tbl_sale_so', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete_detail':
$this->mddata->deleteTblData('tbl_sale_so_detail', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete_delivery':
$this->mddata->deleteTblData('tbl_sale_so_delivery', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete_invoice':
$this->mddata->deleteTblData('tbl_sale_so_invoicing', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete_payment':
$this->mddata->deleteTblData('tbl_sale_so_payment', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete_cost':
$this->mddata->deleteTblData('tbl_sale_so_cost', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
}
}

	//end so

function incoming()
{
	$data['ac'] = "s_incoming";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_incoming');
		$this->load->view('top', $data);
		$this->load->view('sales/incoming_view', $data);
		break;				case 'add':								$this->load->view('top', $data);				$this->load->view('sales/incoming_add', $data);								break;
		case 'save':
				//select nomor terakhir
				// $nomor = $this->db->query("SELECT * FROM tbl_sale_incoming ORDER BY `id` DESC");
				// $tahun = date('Y');
				// $sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
				// $fn = 0;
				// if($tahun == $sy)
				// {
					// if($nomor->num_rows() == 0)
					// {
						// $fn = 1;
					// } else {
						// $n = $nomor->row()->nomer;
						// $fn = $n + 1;
					// }
				// } else {
					//update tahun 
					// $data = array(
						// 'tahun' => $tahun,
					// );
					// $this->mddata->updateDataTbl('tbl_setting_tahun', $data, 'id', '1');
					// $fn = 1;
				// }
		$dir = "image/s_incoming/";
		$file = $dir . $_FILES['file']['name'];
		$data = array(
			'nomer' => $this->input->post('nomer'),
			'tanggal' => $this->input->post('tanggal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'perihal' => $this->input->post('perihal'), 
			'terima' => $this->input->post('terima'), 
			'pembuat' => $this->input->post('pembuat'), 
			'letak' => $this->input->post('letak'),
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_sale_incoming', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['in'] = $this->mddata->getDataFromTblWhere('tbl_sale_incoming', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('sales/incoming_edit', $data);
		break;
		case 'update':
		$dir = "image/s_incoming/";
		$file = $dir . $_FILES['file']['name'];
		$data = array(
			'tanggal' => $this->input->post('tanggal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'perihal' => $this->input->post('perihal'), 
			'terima' => $this->input->post('terima'), 
			'pembuat' => $this->input->post('pembuat'), 
			'letak' => $this->input->post('letak'),
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_sale_incoming', $data, 'id', $this->uri->segment(4));
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteTblData('tbl_sale_incoming', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}

function outgoing()
{
	$data['ac'] = "s_outgoing";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_outgoing');
		$this->load->view('top', $data);
		$this->load->view('sales/outgoing_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/outgoing_add', $data);								
		break;
		case 'save':
				//select nomor terakhir
		$nomor = $this->db->query("SELECT * FROM tbl_sale_outgoing ORDER BY `id` DESC");
		$tahun = date('Y');
		$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
		$fn = 0;
		if($tahun == $sy)
		{
			if($nomor->num_rows() == 0)
			{
				$fn = 1;
			} else {
				$n = $nomor->row()->nomer;
				$fn = $n + 1;
			}
		} else {
					//update tahun 
			$data = array(
				'tahun' => $tahun,
				);
			$this->mddata->updateDataTbl('tbl_setting_tahun', $data, 'id', '1');
			$fn = 1;
		}
		$dir = "image/s_outgoing/";
		$file = $dir . $_FILES['file']['name'];
		$data = array(
			'nomer' => $fn,
			'tanggal' => $this->input->post('tanggal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'perihal' => $this->input->post('perihal'), 
			'terima' => $this->input->post('terima'), 
			'pembuat' => $this->input->post('pembuat'), 
			'jawab' => $this->input->post('jawab'), 
			'letak' => $this->input->post('letak'),
			'archive_code' => $this->input->post('archieve'),
			'desc' => $this->input->post('desc'),
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_sale_outgoing', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['in'] = $this->mddata->getDataFromTblWhere('tbl_sale_outgoing', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('sales/outgoing_edit', $data);
		break;
		case 'update':
		$dir = "image/s_outgoing/";
		$file = $dir . $_FILES['file']['name'];
		$data = array(
			'tanggal' => $this->input->post('tanggal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'perihal' => $this->input->post('perihal'), 
			'terima' => $this->input->post('terima'), 
			'pembuat' => $this->input->post('pembuat'), 
			'jawab' => $this->input->post('jawab'), 
			'letak' => $this->input->post('letak'),
			'archive_code' => $this->input->post('archieve'),
			'desc' => $this->input->post('desc'),
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_sale_outgoing', $data, 'id', $this->uri->segment(4));
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteTblData('tbl_sale_outgoing', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}

function direksi()
{
	$data['ac'] = "s_direksi";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_direksi');
		$this->load->view('top', $data);
		$this->load->view('sales/direksi_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/direksi_add', $data);								
		break;
		case 'edit':								
		$this->load->view('top', $data);				
		$this->load->view('sales/direksi_edit', $data);								
		break;
		case 'save':
		break;
	}
}
// Add by Arif 2016

function LoS()
{
	$data['ac'] = "s_los";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_letter_of_support');
		$this->load->view('top', $data);
		$this->load->view('sales/los_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/los_add', $data);								
		break;
		case 'edit':								
		$this->load->view('top', $data);				
		$this->load->view('sales/los_edit', $data);								
		break;
		case 'save':
		break;
	}
}

function budget()
{
	$data['ac'] = "s_budget";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['budget'] = $this->mddata->getAllDataTbl('tbl_sale_budget');
		$this->load->view('top', $data);
		$this->load->view('sales/budget_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('sales/budget_add', $data);
		break;
		case 'edit':
		$data['budget'] = $this->mddata->getDataFromTblWhere('tbl_sale_budget', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('sales/budget_edit', $data);
		break;
		case 'getDataBudget':
		$id = $_POST['id'];
		$data = $this->mddata->getDataFromTblWhere('tbl_dm_budget', 'id', $id)->row();
		$json = json_encode($data);
		echo $json;
		break;
		case 'save':
		$p = $this->input->post();
		$data = array(
			'budget_code' => $p['budget_cd'],
			'main_budget' => $p['main_budget'],
			'sub_budget_level1' => $p['sub_budget_lv1'],
			'sub_budget_level2' => $p['sub_budget_lv2'],
			'periode' => $p['periode'],
			'amount' => $p['amount']
			);
		$this->mddata->insertIntoTbl('tbl_sale_budget',$data);
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$p = $this->input->post();
		$data = array(
			'budget_code' => $p['budget_cd'],
			'main_budget' => $p['main_budget'],
			'sub_budget_level1' => $p['sub_budget_lv1'],
			'sub_budget_level2' => $p['sub_budget_lv2'],
			'periode' => $p['periode'],
			'amount' => $p['amount']
			);

		$this->mddata->updateDataTbl('tbl_sale_budget',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_budget','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function realisasi()
{
	$data['ac'] = "s_realisasi";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['realisasi'] = $this->mddata->getAllDataTbl('tbl_sale_realisasi');
		$this->load->view('top', $data);
		$this->load->view('sales/realisasi_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('sales/realisasi_add', $data);
		break;
		case 'edit':
		$data['realisasi'] = $this->mddata->getDataFromTblWhere('tbl_sale_realisasi', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('sales/realisasi_edit', $data);
		break;
		case 'save':
		$p = $this->input->post();
		$data = array(
			'budget_code' => $p['budget_cd'],
			'main_budget' => $p['main_budget'],
			'sub_budget_level1' => $p['sub_budget_lv1'],
			'sub_budget_level2' => $p['sub_budget_lv2'],
			'date' => $p['date'],
			'transaction_description' => $p['transaction'],
			'amount' => $p['amount']
			);
		$this->mddata->insertIntoTbl('tbl_sale_realisasi',$data);
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$p = $this->input->post();
		$data = array(
			'budget_code' => $p['budget_cd'],
			'main_budget' => $p['main_budget'],
			'sub_budget_level1' => $p['sub_budget_lv1'],
			'sub_budget_level2' => $p['sub_budget_lv2'],
			'date' => $p['date'],
			'transaction_description' => $p['transaction'],
			'amount' => $p['amount']
			);
		$this->mddata->updateDataTbl('tbl_sale_realisasi',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_realisasi','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function target()
{
	$data['ac'] = "s_target";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['target'] = $this->mddata->getAllDataTbl('tbl_sale_target');
		$this->load->view('top', $data);
		$this->load->view('sales/target_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('sales/target_add', $data);
		break;
		case 'edit':
		// $data['memo'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('sales/target_edit', $data);
		break;
		case 'save':
		$p = $this->input->post();
		$data = array(
			'a_m' => $p['am'],
			'periode' => $p['periode'],
			'operator' => $p['operator'],
			'customer' => $p['customer_name'],
			'amount' => $p['amount']
			);
		$this->mddata->insertIntoTbl('tbl_sale_target',$data);
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_target','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}

}
