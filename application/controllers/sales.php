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
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo', 'no', $this->uri->segment(4))->row();
			$this->load->view('top', $data);
			$this->load->view('sales/memo_edit', $data);
			break;
			case 'edit_subfield':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_sale_internal_memo_subfield', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/memo_edit_subfield', $data);
			break;
			case 'save':
			$nomor = $this->db->query("SELECT * FROM tbl_sale_internal_memo ORDER BY no DESC");
			$tahun = date('Y');
			$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
			$fn = 0;
			if($tahun == $sy)
			{
				if($nomor->num_rows() == 0)
				{
					$fn = 1;
				} else {
					$n = $nomor->row()->internal_memo_no;
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
			$dir = "image/s_memo/";
			$file = $dir . $_FILES['file']['name'];
			$p=$this->input->post();
			$data = array(
				'internal_memo_no' => $fn,
				'date' => $p['memo_date'],
				'addressed_to' => $p['memo_addressed'],
				'subject' => $p['memo_subject']
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
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
			$dir = "image/s_memo/";
			$file = $dir . $_FILES['file']['name'];
			$p=$this->input->post();
			$data = array(
				'date' => $p['memo_date'],
				'addressed_to' => $p['memo_addressed'],
				'subject' => $p['memo_subject']
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
			$this->mddata->updateDataTbl('tbl_sale_internal_memo',$data,'no',$p['no']);
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
			$this->mddata->deleteGeneral('tbl_sale_internal_memo','no', $this->uri->segment(4));
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
		$data['incoming'] = $this->mddata->getAllDataTbl('tbl_sale_incoming_letter_registration');
		$this->load->view('top', $data);
		$this->load->view('sales/incoming_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('sales/incoming_add', $data);
		break;
		case 'save':
		$dir = "image/s_incoming/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data = array(
			'received_date' => $p['incoming_date'],
			'from' => $p['incoming_from'],
			'letter_no' => $p['incoming_letter_no'],
			'letter_date' => $p['incoming_letter_date'],
			'subject' => $p['incoming_subject'],
			'addressed_to' => $p['incoming_addressed_to'],
			'description' => $p['incoming_description'],
			'archive_code' => $p['incoming_archive_code']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_sale_incoming_letter_registration', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['in'] = $this->mddata->getDataFromTblWhere('tbl_sale_incoming_letter_registration', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('sales/incoming_edit', $data);
		break;
		case 'update':
		$dir = "image/s_incoming/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data = array(
			'received_date' => $p['incoming_date'],
			'from' => $p['incoming_from'],
			'letter_no' => $p['incoming_letter_no'],
			'letter_date' => $p['incoming_letter_date'],
			'subject' => $p['incoming_subject'],
			'addressed_to' => $p['incoming_addressed_to'],
			'description' => $p['incoming_description'],
			'archive_code' => $p['incoming_archive_code']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_sale_incoming_letter_registration',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_incoming_letter_registration','no', $this->uri->segment(4));
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
		$data['out'] = $this->mddata->getAllDataTbl('tbl_sale_outgoing_letter_registration');
		$this->load->view('top', $data);
		$this->load->view('sales/outgoing_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/outgoing_add', $data);								
		break;
		case 'save':
				//select nomor terakhir
		$nomor = $this->db->query("SELECT * FROM tbl_sale_outgoing_letter_registration ORDER BY no DESC");
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
		$p = $this->input->post();
		$data = array(
			'ol_no' => $fn,
			'ol_date' => $p['outgoing_date'],
			'subject' => $p['outgoing_subject'],
			'addressed_to' => $p['outgoing_addressed_to'],
			'description' => $p['desc'],
			'signer_by' => $p['outgoing_signer_by'],
			'archive_code' => $p['outgoing_archive_code']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_sale_outgoing_letter_registration', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['out'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing_letter_registration', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('sales/outgoing_edit', $data);
		break;
		case 'update':
		$dir = "image/s_outgoing/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'ol_date' => $p['outgoing_date'],
			'subject' => $p['outgoing_subject'],
			'addressed_to' => $p['outgoing_addressed_to'],
			'description' => $p['desc'],
			'signer_by' => $p['outgoing_signer_by'],
			'archive_code' => $p['outgoing_archive_code']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_sale_outgoing_letter_registration',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_outgoing_letter_registration','no', $this->uri->segment(4));
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
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_catatan_direksi');
		$this->load->view('top', $data);
		$this->load->view('sales/direksi_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/direksi_add', $data);								
		break;
		case 'save':
				//select nomor terakhir
		$nomor = $this->db->query("SELECT * FROM tbl_sale_catatan_direksi ORDER BY no DESC");
		$tahun = date('Y');
		$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
		$fn = 0;
		if($tahun == $sy)
		{
			if($nomor->num_rows() == 0)
			{
				$fn = 1;
			} else {
				$n = $nomor->row()->csd_no;
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
		$dir = "image/s_direksi/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'csd_no' => $fn,
			'date' => $p['csd_date'] ,
			'addressed_to' => $p['csdaddressed'],
			'subject' => $p['csd_subject']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_sale_catatan_direksi', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['ln'] = $this->mddata->getDataFromTblWhere('tbl_sale_catatan_direksi', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('sales/direksi_edit', $data);
		break;
		case 'update':
		$dir = "image/s_direksi/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'date' => $p['csd_date'] ,
			'addressed_to' => $p['csdaddressed'],
			'subject' => $p['csd_subject']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_sale_catatan_direksi',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_catatan_direksi','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
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
		case 'save':
			//select nomor terakhir
		$nomor = $this->db->query("SELECT * FROM tbl_sale_letter_of_support ORDER BY no DESC");
		$tahun = date('Y');
		$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
		$fn = 0;
		if($tahun == $sy)
		{
			if($nomor->num_rows() == 0)
			{
				$fn = 1;
			} else {
				$n = $nomor->row()->los_no;
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
		$p = $this->input->post();
		$data = array(
			'version_of_support' => $p['los_version'],
			'los_no' => $fn,
			'date' => $p['los_date'],
			'addressed_to' => $p['los_address_to'],
			'customer_of_support' => $p['los_customer_support'],
			'project_name' => $p['los_project_name'],
			'product_name' => $p['los_product_name']
			);
		
		$this->mddata->insertIntoTbl('tbl_sale_letter_of_support', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['in'] = $this->mddata->getDataFromTblWhere('tbl_sale_letter_of_support', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('sales/los_edit', $data);
		break;
		case 'update':
		$p = $this->input->post();
		$data = array(
			'version_of_support' => $p['los_version'],
			'date' => $p['los_date'],
			'addressed_to' => $p['los_address_to'],
			'customer_of_support' => $p['los_customer_support'],
			'project_name' => $p['los_project_name'],
			'product_name' => $p['los_product_name']
			);
		$this->mddata->updateDataTbl('tbl_sale_letter_of_support',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_letter_of_support','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function visit()
{
	$data['ac'] = "s_visit";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_customer_visit');
		$this->load->view('top', $data);
		$this->load->view('sales/visit_view', $data);
		break;	
		case 'detail':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_customer_visit');
		$this->load->view('top', $data);
		$this->load->view('sales/visit_detail', $data);
		break;					
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/visit_add', $data);								
		break;
		case 'edit':								
		$this->load->view('top', $data);				
		$this->load->view('sales/visit_edit', $data);								
		break;
		case 'save':
		break;
	}
}
function policies()
{
	$data['ac'] = "s_policies";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_policies');
		$this->load->view('top', $data);
		$this->load->view('sales/policies_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/policies_add', $data);								
		break;
		case 'edit':								
		$this->load->view('top', $data);				
		$this->load->view('sales/policies_edit', $data);								
		break;
		case 'save':
		break;
	}
}
function sop()
{
	$data['ac'] = "s_sop";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/sop_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/sop_add', $data);								
		break;
		case 'edit':								
		$this->load->view('top', $data);				
		$this->load->view('sales/sop_edit', $data);								
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
		$data['target'] = $this->mddata->getDataFromTblWhere('tbl_sale_target', 'no', $this->uri->segment(4))->row();
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
		case 'update':
		$p = $this->input->post();
		$data = array(
			'a_m' => $p['am'],
			'periode' => $p['periode'],
			'operator' => $p['operator'],
			'customer' => $p['customer_name'],
			'amount' => $p['amount']
			);
		$this->mddata->updateDataTbl('tbl_sale_target',$data,'no',$p['no']);
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_target','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
// BEGIN REPORT
function forecast()
{
	$data['ac'] = "s_forecast";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/forecast_view', $data);
		break;			
	}
}
function period()
{
	$data['ac'] = "s_period";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/period_view', $data);
		break;			
	}
}
function product()
{
	$data['ac'] = "s_product";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/product_view', $data);
		break;			
	}
}
function account()
{
	$data['ac'] = "s_account";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/account_view', $data);
		break;			
	}
}
function customer()
{
	$data['ac'] = "s_customer";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/customer_view', $data);
		break;	
		case 'detail':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/customer_detail', $data);
		break;			
	}
}
function loss()
{
	$data['ac'] = "s_loss";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/loss_view', $data);
		break;			
	}
}
function ar()
{
	$data['ac'] = "s_ar";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/ar_view', $data);
		break;			
	}
}
function stock()
{
	$data['ac'] = "s_stock";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/stock_view', $data);
		break;			
	}
}
function division()
{
	$data['ac'] = "s_division";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/division_view', $data);
		break;			
	}
}
function achievement()
{
	$data['ac'] = "s_achievement";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/achievement_view', $data);
		break;	
		case 'detail':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/achievement_detail', $data);
		break;			
	}
}
function profit()
{
	$data['ac'] = "s_profit";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/profit_view', $data);
		break;			
	}
}
function external()
{
	$data['ac'] = "s_external";
	switch($this->uri->segment(3))		
	{
		case 'view':
		//$data['in'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/external_view', $data);
		break;			
	}
}
// END REPORT
}
