<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Op extends CI_Controller {

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
	
	function home()
	{
		$this->load->view('op/index');
	}
	
	function hs()
	{
		$data['ac'] = "op_hs";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs_code_list');
			$this->load->view('top', $data);
			$this->load->view('op/hs_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('op/hs_add', $data);
			break;
			case 'save':
			$dir = "image/hs/";
			$file = $dir . $_FILES['file']['name'];
			$data = array(
				'hs_code' => $this->input->post('hs_code'),
				'percentage_hs_code' => $this->input->post('hs_percent_code'),
				'items' => $this->input->post('hs_items'),
				'description_eng' => $this->input->post('hs_desc_eng'),
				'descroption_ind' => $this->input->post('hs_desc_ind'),
				'tarif_preference' => $this->input->post('hs_trf_pref'),
				'lartas' => $this->input->post('hs_lartas'), 
				'other_information' => $this->input->post('hs_other'), 
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['hs_insw'] = $file;
			}
			$this->mddata->insertIntoTbl('tbl_op_hs_code_list', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['hs'] = $this->mddata->getDataFromTblWhere('tbl_op_hs_code_list', 'no', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/hs_edit', $data);
			break;
			case 'update':
			$dir = "image/hs/";
			$file = $dir . $_FILES['file']['name'];
			$data = array(
				'hs_code' => $this->input->post('hs_code'),
				'percentage_hs_code' => $this->input->post('hs_percent_code'),
				'items' => $this->input->post('hs_items'),
				'description_eng' => $this->input->post('hs_desc_eng'),
				'descroption_ind' => $this->input->post('hs_desc_ind'),
				'tarif_preference' => $this->input->post('hs_trf_pref'),
				'lartas' => $this->input->post('hs_lartas'), 
				'other_information' => $this->input->post('hs_other'), 
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['hs_insw'] = $file;
			}
			$this->mddata->updateDataTbl('tbl_op_hs_code_list', $data, 'no', $this->input->post('id'));
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_op_hs_code_list','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function stock()
	{
		$data['ac'] = "op_stock";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/stock_view', $data);
			break;
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/stock_add', $data);								
			break;
		}
	}
	
	function memo()
	{
		$data['ac'] = "op_memo";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['memo'] = $this->mddata->getAllDataTbl('tbl_op_internal_memoo');
			$this->load->view('top', $data);
			$this->load->view('op/memo_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('op/memo_add', $data);
			break;
			case 'edit':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_op_internal_memoo', 'no', $this->uri->segment(4))->row();
			$this->load->view('top', $data);
			$this->load->view('op/memo_edit', $data);
			break;
			case 'save':
			$nomor = $this->db->query("SELECT * FROM tbl_op_internal_memoo ORDER BY no DESC");
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
			$dir = "image/op_memo/";
			$file = $dir . $_FILES['file']['name'];
			$p=$this->input->post();
			$data = array(
				'internal_memo_no' => $fn,
				'date' => $p['memo_date'],
				'addressed_to' => $p['memo_address'],
				'subject' => $p['memo_subject']
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
			$this->mddata->insertIntoTbl('tbl_op_internal_memoo', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'update':
			$dir = "image/op_memo/";
			$file = $dir . $_FILES['file']['name'];
			$p=$this->input->post();
			$data = array(
				'date' => $p['memo_date'],
				'addressed_to' => $p['memo_address'],
				'subject' => $p['memo_subject']
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
			$this->mddata->updateDataTbl('tbl_op_internal_memoo', $data, 'no', $p['no']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_op_internal_memoo','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
		}
	}
	
	function incoming()
	{
		$data['ac'] = "op_incoming";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['in'] = $this->mddata->getAllDataTbl('tbl_op_incoming_letter_registration');
			$this->load->view('top', $data);
			$this->load->view('op/incoming_view', $data);
			break;						
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/incoming_add', $data);								
			break;
			case 'save':
			$dir = "image/incoming/";
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
			$this->mddata->insertIntoTbl('tbl_op_incoming_letter_registration', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_incoming_letter_registration', 'no', $this->uri->segment(4))->row();
			$this->load->view('top', $data);
			$this->load->view('op/incoming_edit', $data);
			break;
			case 'update':
			$dir = "image/incoming/";
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
			$this->mddata->updateDataTbl('tbl_op_incoming_letter_registration',$data,'no',$p['no']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_op_incoming_letter_registration','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
		}
	}
	
	function outgoing()
	{
		$data['ac'] = "op_outgoing";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['out'] = $this->mddata->getAllDataTbl('tbl_op_outgoing_letter_registration');
			$this->load->view('top', $data);
			$this->load->view('op/outgoing_view', $data);
			break;						
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/outgoing_add', $data);								
			break;
			case 'save':
				//select nomor terakhir
			$nomor = $this->db->query("SELECT * FROM tbl_op_outgoing_letter_registration ORDER BY `no` DESC");
			$tahun = date('Y');
			$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
			$fn = 0;
			if($tahun == $sy)
			{
				if($nomor->num_rows() == 0)
				{
					$fn = 1;
				} else {
					$n = $nomor->row()->ol_no;
					$fn = $n + 1;
				}
			} else {
					//update tahun 
				$data = array(
					'tahun' => $tahun,
					);
				$this->mddata->updateDataTbl('tbl_setting_tahun', $data, 'no', '1');
				$fn = 1;
			}
			$dir = "image/op_outgoing/";
			$file = $dir . $_FILES['file']['name'];
			$p=$this->input->post();
			$data = array(
				'ol_no'=>$fn,
				'ol_date'=>$p['outgoing_date'],
				'subject'=>$p['outgoing_subject'],
				'addressed_to'=>$p['outgoing_addressed_to'],
				'description'=>$p['desc'],
				'signer_by'=>$p['outgoing_signer_by'],
				'archive_code'=>$p['outgoing_archive_code']
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
			$this->mddata->insertIntoTbl('tbl_op_outgoing_letter_registration', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['out'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing_letter_registration', 'no', $this->uri->segment(4))->row();
			$this->load->view('top', $data);
			$this->load->view('op/outgoing_edit', $data);
			break;
			case 'update':
			$dir = "image/op_outgoing/";
			$file = $dir . $_FILES['file']['name'];
			$p=$this->input->post();
			$data = array(
				'ol_date'=>$p['outgoing_date'],
				'subject'=>$p['outgoing_subject'],
				'addressed_to'=>$p['outgoing_addressed_to'],
				'description'=>$p['desc'],
				'signer_by'=>$p['outgoing_signer_by'],
				'archive_code'=>$p['outgoing_archive_code']
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
			$this->mddata->updateDataTbl('tbl_op_outgoing_letter_registration', $data, 'no', $p['no']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_op_outgoing_letter_registration','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
		}
	}


	function graph_import()
	{
		$data['ac'] = "op_graph_import";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/graph_import_view', $data);
			break;
		}
	}
	function graph_transport()
	{
		$data['ac'] = "op_graph_transport";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/graph_transport_view', $data);
			break;
		}
	}
	function import_performance()
	{
		$data['ac'] = "op_import_performance";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/import_performance_view', $data);
			break;
		}
	}
	function supply()
	{
		$data['ac'] = "op_supply";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/supply_view', $data);
			break;
		}
	}

	function import_cost()
	{
		$data['ac'] = "op_import_cost";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/import_cost_view', $data);
			break;
		}
	}
	function transport_cost()
	{
		$data['ac'] = "op_transport_cost";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['data'] = $this->mddata->getAllDataTbl('tbl_sale_so');
			$this->load->view('top', $data);
			$this->load->view('op/transport_cost_view', $data);
			break;
		}
	}
	function import_lead()
	{
		$data['ac'] = "op_import_lead";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/import_lead_view', $data);
			break;
		}
	}
	function supply_report()
	{
		$data['ac'] = "op_supply_report";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/supply_report_view', $data);
			break;
		}
	}
	function budget_actual()
	{
		$data['ac'] = "op_budget_actual";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/budget_actual_view', $data);
			break;
		}
	}
	function cases()
	{
		$data['ac'] = "op_cases";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['cs'] = $this->mddata->getAllDataTbl('tbl_op_cases');
			$this->load->view('top', $data);
			$this->load->view('op/cases_view', $data);
			break;
			case 'add':	
			$this->load->view('top', $data);
			$this->load->view('op/cases_add', $data);
			break;
			case 'edit':	
			$data['cs'] = $this->mddata->getDataFromTblWhere('tbl_op_cases', 'no', $this->uri->segment(4))->row();							
			$this->load->view('top', $data);
			$this->load->view('op/cases_edit', $data);
			break;
			case 'save':
			$data = array(
				'date' => date('d-M-Y'),
				'date_of_case' => $this->input->post('date_case'), 
				'subject_of_case' => $this->input->post('subject'), 
				'detail_case' => $this->input->post('detail'), 
				'personels_involved' => $this->input->post('personels'), 
				'date_of_solving' => $this->input->post('date_solving'), 
				'solving' => $this->input->post('solving'), 
				'final_action' => $this->input->post('final'),
				'conclusion' => $this->input->post('conclusion'),
				);
			$this->mddata->insertIntoTbl('tbl_op_cases', $data);
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'update':
			$data = array(
				'date_of_case' => $this->input->post('date_cases'), 
				'subject_of_case' => $this->input->post('subject'), 
				'detail_case' => $this->input->post('detail'), 
				'personels_involved' => $this->input->post('personels'), 
				'date_of_solving' => $this->input->post('date_solving'), 
				'solving' => $this->input->post('solving'), 
				'final_action' => $this->input->post('final'),
				'conclusion' => $this->input->post('conclusion'),
				);
			$this->mddata->updateDataTbl('tbl_op_cases', $data, 'no', $this->input->post('no'));
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_op_cases','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
		}
	}
	function po()
	{
		$data['ac'] = "op_po";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['data'] = $this->mddata->getAllDataTbl('tbl_op_po_header');
			$this->load->view('top', $data);
			$this->load->view('op/po_view', $data);
			break;
			case 'add':								
			$this->load->view('top', $data);
			$this->load->view('op/po_add', $data);
			break;
			case 'save':
			$p=$this->input->post();
			$header=array(
				'po_no' => $p['po_no'],
				'po_date' => $p['po_date'],
				'pureq_no' => $p['pureq_no'],
				'pureq_date' => $p['pureq_date'],
				'supplier' => $p['suplier'],
				'forwarder' => $p['forwarder'],
				'moda' => $p['moda'],
				'currency' => $p['curr'],
				'convertion' => $p['convertion'],
				'description' => $p['desc'],
				'purpose_of' => $p['purpose'],
				'payment_type' => $p['type'],
				'delivery_date' => $p['delivery'],
				'other_terms' => $p['terms']
				);

			$id = $this->mddata->insertIntoTblWithReturn('tbl_op_po_header', $header);
			
			$tabel=array(
				'item_code' => $p['item_code'],
				'item' => $p['item'],
				'mou' => $p['mou'],
				'qty' => $p['qty'],
				'currency' => $p['currency'],
				'unit_price' => $p['unit'],
				'total_price' => $p['total'],
				'no_po'=>$id
				);

			$this->mddata->insertIntoTbl('tbl_op_po_tabel', $tabel);
			
			$leadtime=array(
				'etf_lc' => $p['lc'],
				'etf_production' => $p['etf_prod'],
				'etf_vessel_depart' => $p['etf_depart'],
				'etf_vessel_arrival' => $p['etf_arrival'],
				'etf_clearance' => $p['etf_clearance'],
				'etf_wh_arrival' => $p['etf_wh'],
				'estimated_lead_time' => $p['estimated'],
				'atf_lc' => $p['atf_lc'],
				'atf_production' => $p['atf_prod'],
				'atf_vessel_depart' => $p['atf_depart'],
				'atf_vessel_arrival' => $p['atf_arrival'],
				'atf_clearance' => $p['atf_clearance'],
				'atf_wh_arrival' => $p['atf_wh'],
				'actual_lead_time' => $p['actual'],
				'deviation' => $p['deviation'],
				'forecast_level' => $p['forecast'],
				'no_po'=>$id
				);

			$this->mddata->insertIntoTbl('tbl_op_po_lead_time', $leadtime);

			$doc=array(
				'purchase_order' => $p['po'],
				'purchase_request' => $p['request'],
				'csd' => $p['csd'],
				'awb_bl_no' => $p['awb_no'],
				'awb_bl_date' => $p['awb_date'],
				'awb_bl' => $p['awb'],
				'invoice_no' => $p['invoice_no'],
				'invoice_date' => $p['invoice_date'],
				'invoice' => $p['invoice'],
				'packing_list_no' => $p['packing_no'],
				'packing_list_date' => $p['packing_date'],
				'packing_list' => $p['packing'],
				'lc_no' => $p['lc_no'],
				'lc_date' => $p['lc_date'],
				'lc' => $p['lc'],
				'form_e_ak_etc_no' => $p['form_no'],
				'form_e_ak_etc_date' => $p['form_date'],
				'form_e_ak_etc' => $p['form'],
				'dnp_request' => $p['dnp'],
				'spjk_spjm' => $p['spjk'],
				'sppb' => $p['sppb'],
				'gr_no' => $p['gr_no'],
				'gr_date' => $p['gr_date'],
				'gr' => $p['gr'],
				'kuasa_inklaring' => $p['kuasa_inklaring'],
				'kuasa_do' => $p['kuasa_do'],
				'peminjaman_container' => $p['peminjaman'],
				'pengembalian_container' => $p['pengembalian'],
				'pernyataan_fungsi_guna_barang' => $p['fungsi_guna'],
				'pernyataan_keaslian_dokumen' => $p['keaslian_dokumen'],
				'no_po'=>$id
				);
$this->mddata->insertIntoTbl('tbl_op_po_documentation', $doc);


$costing=array(
	'currency' => $p['currency'],
	'po_amount' => $p['amount'],
	'freight_bc' => $p['freight'],
	'insurance_bc' => $p['insurance'],
	'cif_bc' => $p['cif'],
	'bc_rate' => $p['bc_rate'],
	'cif_bc_idr' => $p['cif_idr'],
	'import_tax' => $p['import_tax'],
	'vat_import' => $p['vat'],
	'wht_import' => $p['wht'],
	'total_tax' => $p['total_tax'],
	'adm_cost' => $p['adm'],
	'notul' => $p['notul'],
	'notul_desc' => $p['notul_desc'],
	'total_duty_taxes' => $p['duty_tax'],
	'percentage_duty_taxes' => $p['duty'],
	'freight_cost' => $p['freight_cost'],
	'yellow_handling' => $p['yellow_handling'],
	'red_handling' => $p['red_handing'],
	'do' => $p['do'],
	'storage' => $p['storage'],
	'demurrage' => $p['demurrage'],
	'lift_on_lift_off' => $p['lift'],
	'mechanic' => $p['mechanic'],
	'undertable' => $p['undertable'],
	'trucking' => $p['trucking'],
	'other_cost' => $p['other_cost'],
	'other_cost_desc' => $p['cost_desc'],
	'total_clearance' => $p['total_clearance'],
	'percentage_clearance' => $p['percen_clearance'],
	'total_cost'=> $p['total_cost'],
	'percentage_total_cost' => $p['percen_total'],
	'total_cost_without_vat' => $p['total_without_vat'],
	'percentage_cost_without_vat' => $p['percen_without_vat'],
	'no_po'=>$id
	);
$this->mddata->insertIntoTbl('tbl_op_po_costing', $costing);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case"edit":
$etf=$this->mddata->getDataFromTblWhere('tbl_op_po_lead_time', 'no_po', $this->uri->segment(4))->row_array();
$cost=$this->mddata->getDataFromTblWhere('tbl_op_po_costing', 'no_po', $this->uri->segment(4))->row_array();
$tabel=$this->mddata->getDataFromTblWhere('tbl_op_po_tabel', 'no_po', $this->uri->segment(4))->row_array();
$doc = $this->mddata->getDataFromTblWhere('tbl_op_po_documentation', 'no_po', $this->uri->segment(4))->row_array();
$head = $this->mddata->getDataFromTblWhere('tbl_op_po_header', 'no', $this->uri->segment(4))->row_array();
$d=array_merge($etf, $cost);
$d=array_merge($d,$tabel);
$d=array_merge($d,$doc);
$d=array_merge($d,$head);
$data['d'] = (object)$d;
$this->load->view('top', $data);
$this->load->view('op/po_edit', $data);
break;
case"payment":
							//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('op/po_payment_view', $data);
break;
case"payment_add":
							//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('op/po_payment_add', $data);
break;
case"payment_edit":
							//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('op/po_payment_edit', $data);
break;
case"report":
							//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('op/po_report_view', $data);
break;
case"report_add":
							//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('op/po_report_add', $data);
break;
case"report_edit":
							//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('op/po_report_edit', $data);
break;
}
}
function price()
{
	$data['ac'] = "op_price";
	switch($this->uri->segment(3))
	{
		case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
		$this->load->view('top', $data);
		$this->load->view('op/price_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/price_add', $data);								
		break;
	}
}
function payment()
{
	$data['ac'] = "op_payment";
	switch($this->uri->segment(3))
	{
		case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
		$this->load->view('top', $data);
		$this->load->view('op/payment_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/payment_add', $data);								
		break;
		case"edit":
				//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('op/payment_edit', $data);
		break;	
	}
}
function budget()
{
	$data['ac'] = "op_budget";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['budget'] = $this->mddata->getAllDataTbl('tbl_op_budget');
		$this->load->view('top', $data);
		$this->load->view('op/budget_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('op/budget_add', $data);
		break;
		case 'edit':
		$data['budget'] = $this->mddata->getDataFromTblWhere('tbl_op_budget', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/budget_edit', $data);
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
			'budget_code' => $p['code'],
			'main_budget' => $p['main'],
			'sub_budget_level1' => $p['budget_1'],
			'sub_budget_level2' => $p['budget_2'],
			'periode' => $p['periode'],
			'amount' => $p['amount']
			);
		$this->mddata->insertIntoTbl('tbl_op_budget',$data);
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$p = $this->input->post();
		$data = array(
			'budget_code' => $p['code'],
			'main_budget' => $p['main'],
			'sub_budget_level1' => $p['budget_1'],
			'sub_budget_level2' => $p['budget_2'],
			'periode' => $p['periode'],
			'amount' => $p['amount']
			);

		$this->mddata->updateDataTbl('tbl_op_budget',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_op_budget','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function realisasi()
{
	$data['ac'] = "op_realisasi";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['budget'] = $this->mddata->getAllDataTbl('tbl_op_realisasi');
		$this->load->view('top', $data);
		$this->load->view('op/realisasi_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('op/realisasi_add', $data);
		break;
		case 'edit':
		$data['re'] = $this->mddata->getDataFromTblWhere('tbl_op_realisasi', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/realisasi_edit', $data);
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
			'budget_code' => $p['code'],
			'main_budget' => $p['main'],
			'sub_budget_level1' => $p['budget_1'],
			'sub_budget_level2' => $p['budget_2'],
			'date' => $p['date'],
			'transaction_description' => $p['desc'],
			'amount' => $p['amount']
			);
		$this->mddata->insertIntoTbl('tbl_op_realisasi',$data);
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$p = $this->input->post();
		$data = array(
			'budget_code' => $p['code'],
			'main_budget' => $p['main'],
			'sub_budget_level1' => $p['budget_1'],
			'sub_budget_level2' => $p['budget_2'],
			'date' => $p['date'],
			'transaction_description' => $p['desc'],
			'amount' => $p['amount']
			);

		$this->mddata->updateDataTbl('tbl_op_realisasi',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_op_realisasi1','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function letter()
{
	$data['ac'] = "op_letter";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['letter'] = $this->mddata->getAllDataTbl('tbl_op_letter_of_authorization');
		$this->load->view('top', $data);
		$this->load->view('op/letter_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/letter_add', $data);								
		break;
		case 'save':
		$nomor = $this->db->query("SELECT * FROM tbl_op_letter_of_authorization ORDER BY 'no' DESC");
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
			$data = array(
				'tahun' => $tahun,
				);
			$this->mddata->updateDataTbl('tbl_setting_tahun', $data, 'id', '1');
			$fn = 1;
		}
		$dir = "image/op_letter/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'loa_no' => $fn,
			'loa_date' => $p['load_date'],
			'subject' => $p['subject'],
			'addressed_to' => $p['to'],
			'description' => $p['desc'],
			'authorizer_name' => $p['authorizer_name'],
			'authorizer_title' => $p['authorized_title'],
			'authorized_name' => $p['authorized_name'],
			'authorized_title' => $p['authorized_title'],
			'authorized_id' => $p['authorized_id'],
			'archive_code' => $p['archive']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_op_letter_of_authorization', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'edit':
		$data['letter'] = $this->mddata->getDataFromTblWhere('tbl_op_letter_of_authorization', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/letter_edit', $data);
		break;
		case'update':
		$nomor = $this->db->query("SELECT * FROM tbl_op_letter_of_authorization ORDER BY 'no' DESC");
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
			$data = array(
				'tahun' => $tahun,
				);
			$this->mddata->updateDataTbl('tbl_setting_tahun', $data, 'id', '1');
			$fn = 1;
		}
		$dir = "image/op_letter/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'loa_no' => $fn,
			'loa_date' => $p['load_date'],
			'subject' => $p['subject'],
			'addressed_to' => $p['to'],
			'description' => $p['desc'],
			'authorizer_name' => $p['authorizer_name'],
			'authorizer_title' => $p['authorized_title'],
			'authorized_name' => $p['authorized_name'],
			'authorized_title' => $p['authorized_title'],
			'authorized_id' => $p['authorized_id'],
			'archive_code' => $p['archive']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_op_letter_of_authorization', $data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'delete':
		$this->mddata->deleteGeneral('tbl_op_letter_of_authorization','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function licenses()
{
	$data['ac'] = "op_licenses";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['license'] = $this->mddata->getAllDataTbl('tbl_op_import_licenses');
		$this->load->view('top', $data);
		$this->load->view('op/licenses_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/licenses_add', $data);								
		break;
		case 'save':
		$dir = "image/op_licenses/";
		$file = $dir . $_FILES['file']['name'];
		$file2 = $dir . $_FILES['fileEx']['name'];
		$p = $this->input->post();
		$data = array(
			'license_name'=>$p['license_name'],
			'license_no'=>$p['license_no'],
			'date_of_issurance'=>$p['issurance'],
			'date_of_expiry'=>$p['expiry'],
			'issuing_institution'=>$p['issuing'],
			'description'=>$p['perihal']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['license'] = $file;
		}
		if(move_uploaded_file($_FILES['fileEx']['tmp_name'], $file2))
		{
			$data['explanation'] = $file2;
		}
		$this->mddata->insertIntoTbl('tbl_op_import_licenses', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'edit':
		$data['licenses'] = $this->mddata->getDataFromTblWhere('tbl_op_import_licenses', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/licenses_edit', $data);
		break;
		case'update':
		$dir = "image/op_licenses/";
		$file = $dir . $_FILES['file']['name'];
		$file2 = $dir . $_FILES['fileEx']['name'];
		$p = $this->input->post();
		$data = array(
			'license_name'=>$p['license_name'],
			'license_no'=>$p['license_no'],
			'date_of_issurance'=>$p['issurance'],
			'date_of_expiry'=>$p['expiry'],
			'issuing_institution'=>$p['issuing'],
			'description'=>$p['perihal']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['license'] = $file;
		}
		if(move_uploaded_file($_FILES['fileEx']['tmp_name'], $file2))
		{
			$data['explanation'] = $file2;
		}
		$this->mddata->updateDataTbl('tbl_op_import_licenses',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'delete':
		$this->mddata->deleteGeneral('tbl_op_import_licenses','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}

}
function operational()
{
	$data['ac'] = "op_operational";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['operational'] = $this->mddata->getAllDataTbl('tbl_op_operational_sop');
		$this->load->view('top', $data);
		$this->load->view('op/operational_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/operational_add', $data);								
		break;
		case 'save':
		$dir = "image/op_operational_sop/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'sop_no' => $p['no'],
			'sop_date' => $p['date'],
			'description' => $p['desc'],
			'date_of_issued' => $p['issued'],
			'date_if_expired' => $p['expired'],
			'remark' => $p['remark']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_op_operational_sop', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'edit':
		$data['operational'] = $this->mddata->getDataFromTblWhere('tbl_op_operational_sop', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/operational_edit', $data);
		break;
		case'update':
		$dir = "image/op_operational_sop/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'sop_no' => $p['no'],
			'sop_date' => $p['date'],
			'description' => $p['desc'],
			'date_of_issued' => $p['issued'],
			'date_if_expired' => $p['expired'],
			'remark' => $p['remark']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_op_operational_sop',$data,'no',$p['id']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'delete':
		$this->mddata->deleteGeneral('tbl_op_operational_sop','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function government()
{
	$data['ac'] = "op_government";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['government'] = $this->mddata->getAllDataTbl('tbl_op_government_regulation');
		$this->load->view('top', $data);
		$this->load->view('op/government_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/government_add', $data);								
		break;
		case 'save':
		$dir = "image/op_government/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'regulation_type' => $p['type'],
			'regulation_no' => $p['no'],
			'regulation_date' => $p['date'],
			'description' => $p['desc']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['regulation_doc'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_op_government_regulation', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'edit':
		$data['government'] = $this->mddata->getDataFromTblWhere('tbl_op_government_regulation', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/government_edit', $data);
		break;
		case 'update':
		$dir = "image/op_government/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'regulation_type' => $p['type'],
			'regulation_no' => $p['no'],
			'regulation_date' => $p['date'],
			'description' => $p['desc']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['regulation_doc'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_op_government_regulation',$data,'no',$p['id']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'delete':
		$this->mddata->deleteGeneral('tbl_op_government_regulation','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function bussiness()
{
	$data['ac'] = "op_bussiness";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['business'] = $this->mddata->getAllDataTbl('tbl_op_business_doc_template');
		$this->load->view('top', $data);
		$this->load->view('op/bussiness_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/bussiness_add', $data);								
		break;
		case 'save':
		$dir = "image/op_business/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'document_name' => $p['name'],
			'description' => $p['desc']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['document_template'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_op_business_doc_template', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'edit':
		$data['business'] = $this->mddata->getDataFromTblWhere('tbl_op_business_doc_template', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/bussiness_edit', $data);
		break;
		case 'update':
		$dir = "image/op_business/";
		$file = $dir . $_FILES['file']['name'];
		$p = $this->input->post();
		$data = array(
			'document_name' => $p['name'],
			'description' => $p['desc']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['document_template'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_op_business_doc_template',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'delete':
		$this->mddata->deleteGeneral('tbl_op_business_doc_template','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
//START PROFILE
function brief()
{
	$data['ac'] = "op_brief";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['ds'] = $this->mddata->getAllDataTbl('tbl_sale_internal_memo');
		$this->load->view('top', $data);
		$this->load->view('op/brief_view', $data);
		break;
	}
}
function structure(){
		$data['ac'] = "op_structure";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['st'] = $this->mddata->getDataStructure();
			$this->load->view('top', $data);
			$this->load->view('op/structure_view', $data);
			break;
		}
	}
function jobdesc()
{
	$data['ac'] = "op_jobdesc";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['jd'] = $this->mddata->getAllDataTbl('tbl_op_jobdesc_kpi');
		$this->load->view('top', $data);
		$this->load->view('op/jobdesc_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('op/jobdesc_add', $data);
		break;
		case 'save':
		$dir = "image/op_jobdesc/";
		$dir2 = "image/op_kpi/";
		$file1 = $dir . $_FILES['file1']['name'];
		$file2 = $dir2 . $_FILES['file2']['name'];
		$data = array(
			'am' => $this->input->post('jd_am'),
			'fungsi_posisi' => $this->input->post('jd_fungsi'),
			);
		if(move_uploaded_file($_FILES['file1']['tmp_name'], $file1))
		{
			$data['jobdesc'] = $file1;
		}
		if(move_uploaded_file($_FILES['file2']['tmp_name'], $file2))
		{
			$data['kpi'] = $file2;
		}
		$this->mddata->insertIntoTbl('tbl_op_jobdesc_kpi', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['jd'] = $this->mddata->getDataFromTblWhere('tbl_op_jobdesc_kpi', 'no', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('op/jobdesc_edit', $data);
		break;
		case 'update':
		$dir = "image/op_jobdesc/";
		$dir2 = "image/op_kpi/";
		$file1 = $dir . $_FILES['file1']['name'];
		$file2 = $dir2 . $_FILES['file2']['name'];
		$data = array(
			'am' => $this->input->post('jd_am'),
			'fungsi_posisi' => $this->input->post('jd_fungsi'),
			);
		if(move_uploaded_file($_FILES['file1']['tmp_name'], $file1))
		{
			$data['jobdesc'] = $file1;
		}
		if(move_uploaded_file($_FILES['file2']['tmp_name'], $file2))
		{
			$data['kpi'] = $file2;
		}
		$this->mddata->updateDataTbl('tbl_op_jobdesc_kpi',$data,'no',$this->input->post('no'));
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_op_jobdesc_kpi','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}	
//END PROFILE
}