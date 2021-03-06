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
			$data['op'] = $this->mddata->getAllDataTbl('tbl_op_st_header');
			$this->load->view('top', $data);
			$this->load->view('op/stock_view', $data);
			break;
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/stock_add', $data);								
			break;
			case 'save':
			$p=$this->input->post();
			$data=array(
				'type'=>$p['type'],
				'document'=>$p['document'],
				'document_no'=>$p['no'],
				'document_date'=>$p['date']
				);
			$this->mddata->insertIntoTbl('tbl_op_st_header', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_st_header', 'no', $this->uri->segment(4))->row();
			$this->load->view('top', $data);				
			$this->load->view('op/stock_edit', $data);								
			break;
			case 'update':
			$p=$this->input->post();
			$data=array(
				'type'=>$p['type'],
				'document'=>$p['document'],
				'document_no'=>$p['doc_no'],
				'document_date'=>$p['date']
				);
			$this->mddata->updateDataTbl('tbl_op_st_header',$data,'no',$p['no']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_op_st_header','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'table_view':
			$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_st_tabel', 'st_no', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/stock_table_view', $data);
			break;
			case 'table_add':								
			$this->load->view('top', $data);				
			$this->load->view('op/stock_table_add', $data);								
			break;
			case 'table_save':
			$p=$this->input->post();
			$data=array(
				'item_code'=>$p['item_code'],
				'item'=>$p['item'],
				'mou'=>$p['mou'],
				'qty'=>$p['qty'],
				'st_no'=>$p['st_no']
				);
			$this->mddata->insertIntoTbl('tbl_op_st_tabel', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'table_edit':
			$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_st_tabel', 'no', $this->uri->segment(4))->row();						
			$this->load->view('top', $data);				
			$this->load->view('op/stock_table_edit', $data);								
			break;
			case 'table_update':
			$p=$this->input->post();
			$data=array(
				'item_code'=>$p['item_code'],
				'item'=>$p['item'],
				'mou'=>$p['mou'],
				'qty'=>$p['qty']
				);
			$this->mddata->updateDataTbl('tbl_op_st_tabel',$data,'no',$p['no']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'table_delete':
			$this->mddata->deleteGeneral('tbl_op_st_tabel','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
		}
	}
	function petty()
	{
		$data['ac'] = "op_petty";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['op'] = $this->mddata->getAllDataTbl('tbl_op_pc_header');
			$this->load->view('top', $data);
			$this->load->view('op/petty_view', $data);
			break;
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/petty_add', $data);								
			break;
			case 'save':
			$p=$this->input->post();
			$bayar="OPEN";
			if(!empty($p['tgl_byr_kembali'])){
				$bayar="CLOSE";
			}
			$data=array(
				'tanggal_kasbon'=>$p['tgl_kasbon'],
				'personal_id'=>$p['personal'],
				'divisi' => $p['divisi'],
				'tujuan' => $p['tujuan'],
				'jumlah_kasbon' => $p['jml_kasbon'],
				'jumlah_diapprove' => $p['jml_approve'],
				'tanggal_diapprove'=> $p['tgl_approve'],
				'terbilang'=>$p['terbilang'],
				'tanggal_bayar_kasbon'=>$p['tgl_byr_kasbon'],
				'tanggal_warning'=>$p['tgl_warning'],
				'tanggal_overdue_realisasi'=>$p['tgl_over_realisasi'],
				'tanggal_realisasi'=>$p['tgl_realisasi'],
				'tanggal_submit'=>$p['tgl_submit'],
				'jumlah_net_realisasi'=>$p['jml_net_realisasi'],
				'jumlah_selisih'=>$p['jml_selisih'],
				'tanggal_bayar'=>$p['tgl_byr_kembali'],
				'status'=>$bayar
				);
			$this->mddata->insertIntoTbl('tbl_op_pc_header', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_pc_header', 'kasbon_id', $this->uri->segment(4))->row();
			$this->load->view('top', $data);				
			$this->load->view('op/petty_edit', $data);								
			break;
			case 'update':
			$p=$this->input->post();
			$bayar="OPEN";
			if(!empty($p['tgl_byr_kembali'])){
				$bayar="CLOSE";
			}
			$data=array(
				'tanggal_kasbon'=>$p['tgl_kasbon'],
				'personal_id'=>$p['personal'],
				'divisi' => $p['divisi'],
				'tujuan' => $p['tujuan'],
				'jumlah_kasbon' => $p['jml_kasbon'],
				'jumlah_diapprove' => $p['jml_approve'],
				'tanggal_diapprove'=> $p['tgl_approve'],
				'terbilang'=>$p['terbilang'],
				'tanggal_bayar_kasbon'=>$p['tgl_byr_kasbon'],
				'tanggal_warning'=>$p['tgl_warning'],
				'tanggal_overdue_realisasi'=>$p['tgl_over_realisasi'],
				'tanggal_realisasi'=>$p['tgl_realisasi'],
				'tanggal_submit'=>$p['tgl_submit'],
				'jumlah_net_realisasi'=>$p['jml_net_realisasi'],
				'jumlah_selisih'=>$p['jml_selisih'],
				'tanggal_bayar'=>$p['tgl_byr_kembali'],
				'status'=>$bayar
				);
			$this->mddata->updateDataTbl('tbl_op_pc_header',$data,'kasbon_id',$p['kasbon_id']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_op_pc_header','kasbon_id', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'table_view':
			$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_pc_header', 'kasbon_id', $this->uri->segment(4))->row();
			// $data['opt'] = $this->mddata->getDataFromTblWhere('tbl_op_pc_tabel', 'pc_no', $this->uri->segment(4));

			$data['opt'] = $this->db->query('SELECT * FROM tbl_op_pc_tabel WHERE pc_no='. $this->uri->segment(4).' ORDER BY acc_id ASC');

			$this->load->view('top', $data);
			$this->load->view('op/petty_table_view', $data);
			break;
			case 'table_add':								
			$this->load->view('top', $data);				
			$this->load->view('op/petty_table_add', $data);								
			break;
			case 'table_save':
			$p=$this->input->post();
			$data=array(
				'acc_id'=>$p['acc_id'],
				'account'=>$p['account'],
				'tanggal'=>$p['tanggal'],
				'realisasi_no'=>$p['real_no'],
				'kwitansi_no'=>$p['kwitansi'],
				'uraian_realisasi'=>$p['uraian_real'],
				'realisasi'=>$p['realisasi'],
				'adjustment'=>$p['adjustment'],
				'pc_no'=>$p['pc_no']
				);
			$this->mddata->insertIntoTbl('tbl_op_pc_tabel', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'table_edit':								
			$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_pc_tabel', 'no', $this->uri->segment(4))->row();
			$this->load->view('top', $data);				
			$this->load->view('op/petty_table_edit', $data);								
			break;
			case 'table_update':
			$p=$this->input->post();
			$data=array(
				'acc_id'=>$p['acc_id'],
				'account'=>$p['account'],
				'tanggal'=>$p['tanggal'],
				'realisasi_no'=>$p['real_no'],
				'kwitansi_no'=>$p['kwitansi'],
				'uraian_realisasi'=>$p['uraian_real'],
				'realisasi'=>$p['realisasi'],
				'adjustment'=>$p['adjustment']
				);
			$this->mddata->updateDataTbl('tbl_op_pc_tabel',$data,'no',$p['no']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			case 'table_delete':
			$this->mddata->deleteGeneral('tbl_op_pc_tabel','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
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
			$this->load->view('top', $data);
			$all = $this->mddata->getImportCost(2016);
			
			$end=array();

			$kat = array();
			foreach($all as $k){
				$end[$k['kat']]['name']=$k['kat'];
				$end[$k['kat']]['data']=array();
				$end[$k['kat']]['data']['y']=0;
				$kat[$k['kat']]='\''.$k['kat'].'\'';
			}
			
			$in = implode(',', $kat);
			if(empty($kat)){
				$import = array();
			}else{
				$import = $this->mddata->getImportCostVal(2016,$in);
			}
			
			$res = array();

			foreach($import as $im){
				if(!array_key_exists($im['kategori'], $res)){
					$res[$im['kategori']]['all']=intval($im['total_cost']);;
					$res[$im['kategori']]['vat']=intval($im['total_cost_without_vat']);
					$res[$im['kategori']]['taxes']=intval($im['total_tax']);
					$res[$im['kategori']]['custom']=intval($im['total_clearance']);
				}else{
					$res[$im['kategori']]['all']+=intval($im['total_cost']);;
					$res[$im['kategori']]['vat']+=intval($im['total_cost_without_vat']);
					$res[$im['kategori']]['taxes']+=intval($im['total_tax']);
					$res[$im['kategori']]['custom']+=intval($im['total_clearance']);
				}
			}

			foreach($all as $k){
				$end[$k['kat']]['data']['y']=$res[$k['kat']]['all'];
				$end[$k['kat']]['data']['myData']=array_values($res[$k['kat']]);
				$end[$k['kat']]['data']=array($end[$k['kat']]['data']);
			}
			$data['result']=json_encode(array_values($end));
			$this->load->view('op/graph_import_view', $data);
			break;
			case 'getYear':
			$all = $this->mddata->getImportCost($this->uri->segment(4));
			$end=array();

			$kat = array();
			foreach($all as $k){
				$end[$k['kat']]['name']=$k['kat'];
				$end[$k['kat']]['data']=array();
				$end[$k['kat']]['data']['y']=0;
				$kat[$k['kat']]='\''.$k['kat'].'\'';
			}
			
			$in = implode(',', $kat);
			if(!empty($all)){
				$import = $this->mddata->getImportCostVal($this->uri->segment(4),$in);
			}else{
				$import=array();
			}
			$res = array();

			foreach($import as $im){
				if(!array_key_exists($im['kategori'], $res)){
					$res[$im['kategori']]['all']=intval($im['total_cost']);;
					$res[$im['kategori']]['vat']=intval($im['total_cost_without_vat']);
					$res[$im['kategori']]['taxes']=intval($im['total_tax']);
					$res[$im['kategori']]['custom']=intval($im['total_clearance']);
				}else{
					$res[$im['kategori']]['all']+=intval($im['total_cost']);;
					$res[$im['kategori']]['vat']+=intval($im['total_cost_without_vat']);
					$res[$im['kategori']]['taxes']+=intval($im['total_tax']);
					$res[$im['kategori']]['custom']+=intval($im['total_clearance']);
				}
			}

			foreach($all as $k){
				$end[$k['kat']]['data']['y']=$res[$k['kat']]['all'];
				$end[$k['kat']]['data']['myData']=array_values($res[$k['kat']]);
				$end[$k['kat']]['data']=array($end[$k['kat']]['data']);
			}
			print(json_encode(array_values($end)));
			break;
		}
	}
	function graph_transport()
	{
		$data['ac'] = "op_graph_transport";
		switch($this->uri->segment(3))
		{
			case 'view':
			$graph = $this->mddata->getGraphTransport();
			$kpi = $this->mddata->getKpiTransport();
			$periode=array();
			$res=array();
			$do=array();
			$totalTransport=array();
			foreach($graph as $g){
				if(!array_key_exists($g['tahun'], $res)){
					$periode[$g['tahun']]=$g['tahun'];
					$res[$g['tahun']]['debit_note']=0;
					$res[$g['tahun']]['transport_cost']=$g['devcos'];
					$totalTransport[$g['tahun']]['total']=1;
					$do[]=$g['id_so'];
				}else{
					//$res[$g['tahun']]['debit_note']+=$g['debit_note_amount'];
					$res[$g['tahun']]['transport_cost']+=$g['devcos'];
					$totalTransport[$g['tahun']]['total']+=1;
				}
			}
			foreach ($res as $key => $r) {
				$tAmount = $totalTransport[$key]['total'];
				if($tAmount==0){
					$tAmount=1;
				}
				$res[$key]['transport_cost']=$res[$key]['transport_cost']/$tAmount;
			}

			if(!empty($do)){
				$debitNote = $this->mddata->getGraphDebitNote(implode(',', $do));	
			}else{
				$debitNote = array();
			}
			
			$resDebitNote=array();
			foreach($debitNote as $dn){
				if(!array_key_exists($dn['tahun'], $resDebitNote)){
					$resDebitNote[$dn['tahun']]['dn']=$dn['debit_note_amount'];
				}else{
					$resDebitNote[$dn['tahun']]['dn']+=$dn['debit_note_amount'];
				}
			}

			if(!empty($do)){
				$doAmount = $this->mddata->getGraphDelivery(implode(',', $do));	
			}else{
				$doAmount = array();
			}
			
			$resAmount=array();
			$totalAmount=array();
			foreach($doAmount as $doa){
				if(!array_key_exists($doa['tahun'], $resAmount)){
					$resAmount[$doa['tahun']]['y']=$doa['debit_note_amount']+$doa['nett'];
					$totalAmount[$doa['tahun']]['total']=1;
				}else{
					$resAmount[$doa['tahun']]['y']+=$doa['debit_note_amount']+$doa['nett'];
					$totalAmount[$doa['tahun']]['total']+=1;
				}
			}
			
			foreach ($resAmount as $key => $r) {
				$tAmount = $totalAmount[$key]['total'];
				if($tAmount==0){
					$tAmount=1;
				}
				$resAmount[$key]['y']=$resAmount[$key]['y']/$tAmount;
			}

			$kpires="";
			foreach (array_values($periode) as $p) {
				$res[$p]['debit_note']=intval($resDebitNote[$p]['dn']);
				$res[$p]['saving']=intval($res[$p]['transport_cost'])-intval($kpi['kpi']);
				if(intval($res[$p]['transport_cost'])==intval($kpi['kpi'])){
					$kpires="GOOD";
				}else if(intval($res[$p]['transport_cost'])>intval($kpi['kpi'])){
					$kpires="LESS";
				}else if(intval($res[$p]['transport_cost'])<intval($kpi['kpi'])){
					$kpires="GREAT";
				}
				$res[$p]['kpi']=$kpires;
			}
			$resNett=array();
			$resKPI=array();
			foreach (array_values($periode) as $pe){
				$resAmount[$pe]['y']=intval($resAmount[$pe]['y']);
				$resAmount[$pe]['myData']=array_values($res[$pe]);
				$resNett[$pe]['y']=intval($res[$pe]['transport_cost']);
				$resNett[$pe]['myData']=array_values($res[$pe]);
				$resKPI[$pe]['y']=intval($kpi['kpi']);
				$resKPI[$pe]['myData']=array_values($res[$pe]);
			}
			
			$data['resKPI']=json_encode(array_values($resKPI));
			$data['resNett']=json_encode(array_values($resNett));
			$data['resAmount']=json_encode(array_values($resAmount));
			$data['periode']=json_encode(array_values($periode));
			
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
			$all = $this->mddata->getImportLeadTimePerformance();
			$kat = array();
			foreach($all as $k){
				$kat[$k['kat']]='\''.$k['kat'].'\'';
			}
			$in = implode(',', $kat);
			if(!empty($in)){
				$sea = $this->mddata->getImportLeadTimePerformanceSea($in);
				$air = $this->mddata->getImportLeadTimePerformanceAir($in);
			}else{
				$sea = array();
				$air = array();
			}
			
			$arSea=array();
			$arAir=array();
			$tempAir=array(
				'overall'=>0,
				'shipping'=>0,
				'clearance'=>0,
				'production'=>0,
				'jum'=>0
				);
			$tempSea=$tempAir;
			foreach($air as $a){
				$tempAir['overall']+=$a['actual_lead_time'];
				$tempAir['shipping']+=(strtotime($a['atf_vessel_arrival'])-strtotime($a['atf_vessel_depart']))/(60*60*24);
				$tempAir['clearance']+=(strtotime($a['atf_clearance'])-strtotime($a['atf_vessel_arrival']))/(60*60*24);
				$tempAir['production']+=(strtotime($a['atf_production'])-strtotime($a['po_date']))/(60*60*24);
				$tempAir['jum']+=1;
			}
			
			foreach($sea as $a){
				$tempSea['overall']+=$a['actual_lead_time'];
				$tempSea['shipping']+=(strtotime($a['atf_vessel_arrival'])-strtotime($a['atf_vessel_depart']))/(60*60*24);
				$tempSea['clearance']+=(strtotime($a['atf_clearance'])-strtotime($a['atf_vessel_arrival']))/(60*60*24);
				$tempSea['production']+=(strtotime($a['atf_production'])-strtotime($a['po_date']))/(60*60*24);
				$tempSea['jum']+=1;
			}
			if($tempAir['jum']==0){
				$tempAir['jum']=1;
			}
			if($tempSea['jum']==0){
				$tempSea['jum']=1;
			}
			
			$data['sea']=$tempSea;
			$data['air']=$tempAir;
			
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
			$all = $this->mddata->getSupplyDetailPerformance();

			$da=array(
				'total'=>0,
				'y'=>0
				);

			foreach($all as $a){
				$diff = (strtotime($a['received'])-strtotime($a['depart']))/(60*60*24);
				$da['total']+=1;
				$da['y']+=$diff;
			}
			if($da['total']==0){
				$da['total']=1;
			}

			$data['data']=$da;
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
			$data['in'] = $this->mddata->getAllDataTbl('tbl_op_po_header');
			$this->load->view('top', $data);
			$this->load->view('op/import_cost_view', $data);
			break;

			case 'sum':
			$name = str_replace("%20"," ",$this->uri->segment(4));
			$item = $this->mddata->getDataFromTblWhere('tbl_dm_item', 'kategori', $name)->result_array();
			$arItem = array();
			foreach ($item as $kat) {
				$harga = $this->mddata->getSumAveragePO($kat['id']);				
				if(!array_key_exists($kat['id'], $arItem)){
					$arItem[$kat['id']]=$kat;
					$arItem[$kat['id']]['counter']=0;
					$arItem[$kat['id']]['cost']=0;
				}
			}

			foreach ($harga as $ha) {
				$arItem[$ha['item_code']]['counter']+=1;
				$arItem[$ha['item_code']]['cost']+=$ha['adm_cost'];
			}

			$data['in']=$arItem;
			$this->load->view('top', $data);
			$this->load->view('op/import_cost_sum_average', $data);
			break;

			case 'summary':
			$data['in'] = $this->mddata->getAllDataTbl('tbl_op_po_header');
			$this->load->view('top', $data);
			$this->load->view('op/import_summary_cost_view', $data);
			break;
			case 'analysis':
			$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_po_header', 'po_no', $this->uri->segment(4))->row();
			//$this->load->view('top', $data);
			$this->load->view('op/import_analysis_view',$data);
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
			case 'do':
			$data['data'] = $this->mddata->getDataFromTblWhere('tbl_sale_so_delivery', 'id_so', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/transport_cost_do_view', $data);
			break;
		}
	}
	function import_lead()
	{
		$data['ac'] = "op_import_lead";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['in'] = $this->mddata->getAllDataTbl('tbl_op_po_header');
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
			$data['sup'] = $this->mddata->getSupplyReport();
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
				'etf_lc' => $p['etf_lc'],
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
				'no_po'=>$id,
				'pib_date'=>$p['pib']
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
case 'update':
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

$this->mddata->updateDataTbl('tbl_op_po_header',$header,'no',$this->input->post('no'));

$tabel=array(
	'item_code' => $p['item_code'],
	'item' => $p['item'],
	'mou' => $p['mou'],
	'qty' => $p['qty'],
	'currency' => $p['currency'],
	'unit_price' => $p['unit'],
	'total_price' => $p['total']
	);

$this->mddata->updateDataTbl('tbl_op_po_tabel',$tabel,'no_po',$this->input->post('no'));

$leadtime=array(
	'etf_lc' => $p['etf_lc'],
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
	'forecast_level' => $p['forecast']
	);

$this->mddata->updateDataTbl('tbl_op_po_lead_time',$leadtime,'no_po',$this->input->post('no'));

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
	'pib_date'=>$p['pib']
	);

$this->mddata->updateDataTbl('tbl_op_po_documentation',$doc,'no_po',$this->input->post('no'));

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
	'percentage_cost_without_vat' => $p['percen_without_vat']
	);

$this->mddata->updateDataTbl('tbl_op_po_costing',$costing,'no_po',$this->input->post('no'));
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete':
$this->mddata->deleteGeneral('tbl_op_po_header','no', $this->uri->segment(4));
$this->mddata->deleteGeneral('tbl_op_po_tabel','no_po', $this->uri->segment(4));
$this->mddata->deleteGeneral('tbl_op_po_lead_time','no_po', $this->uri->segment(4));
$this->mddata->deleteGeneral('tbl_op_po_documentation','no_po', $this->uri->segment(4));
$this->mddata->deleteGeneral('tbl_op_po_costing','no_po', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;

case"payment":
$data['in'] = $this->mddata->getAllDataTbl('tbl_op_po_payment_information');
$this->load->view('top', $data);
$this->load->view('op/po_payment_view', $data);
break;
case"payment_add":
//$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('op/po_payment_add', $data);
break;
case"payment_edit":
$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_po_payment_information', 'no', $this->uri->segment(4))->row();
$this->load->view('top', $data);
$this->load->view('op/po_payment_edit', $data);
break;
case"payment_save":
$p=$this->input->post();
$data=array(
	'payment_type' => $p['type'],
	'payment_date' => $p['date'],
	'payment_amount' => $p['amount'],
	'payment_proof' => $p['proof'],
	'po_no'=> $p['po_no']
	);
$this->mddata->insertIntoTbl('tbl_op_po_payment_information', $data);
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case"payment_update":
$p=$this->input->post();
$data=array(
	'payment_type' => $p['type'],
	'payment_date' => $p['date'],
	'payment_amount' => $p['amount'],
	'payment_proof' => $p['proof'],
	'po_no' => $p['po_no']
	);
$this->mddata->updateDataTbl('tbl_op_po_payment_information',$data,'no',$this->input->post('no'));
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'delete':
$this->mddata->deleteGeneral('tbl_op_po_payment_information','no', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
case"report":
$data['in'] = $this->mddata->getAllDataTbl('tbl_op_po_header');
$this->load->view('top', $data);
$this->load->view('op/po_report_view', $data);
break;
case"report_add":							
$this->load->view('top', $data);
$this->load->view('op/po_report_add', $data);
break;
case"report_save":
$p=$this->input->post();
$data=array(
	'po_no' => $p['po'],
	'po_date' => $p['date'],
	'pureq_no' => $p['pureq'],
	'invoice_no' => $p['invoice'],
	'supplier' => $p['suplier'],
	'forwarder' => $p['forwarder'],
	'moda' => $p['moda'],
	'currency' => $p['currency'],
	'amount' => $p['amount'],
	'gr_no' => $p['gr_no'],
	'gr_date' => $p['gr_date'],
	'payment_type' => $p['type'],
	'payment_date' => $p['payment_date']
	);
$this->mddata->insertIntoTbl('tbl_op_po_report', $data);
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case"report_edit":
$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_po_report', 'no', $this->uri->segment(4))->row();
$this->load->view('top', $data);
$this->load->view('op/po_report_edit', $data);
break;
case"report_update":
$p=$this->input->post();
$data=array(
	'po_no' => $p['po'],
	'po_date' => $p['date'],
	'pureq_no' => $p['pureq'],
	'invoice_no' => $p['invoice'],
	'supplier' => $p['suplier'],
	'forwarder' => $p['forwarder'],
	'moda' => $p['moda'],
	'currency' => $p['currency'],
	'amount' => $p['amount'],
	'gr_no' => $p['gr_no'],
	'gr_date' => $p['gr_date'],
	'payment_type' => $p['type'],
	'payment_date' => $p['payment_date']
	);
$this->mddata->updateDataTbl('tbl_op_po_report',$data,'no',$this->input->post('no'));
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case"report_delete":
$this->mddata->deleteGeneral('tbl_op_po_report','no', $this->uri->segment(4));
redirect($_SERVER['HTTP_REFERER']);
break;
}
}
function price()
{
	$data['ac'] = "op_price";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['price'] = $this->mddata->getAllDataTbl('tbl_op_pl_header');
		$this->load->view('top', $data);
		$this->load->view('op/price_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/price_add', $data);								
		break;
		case 'edit':
		$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_pl_header', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/price_edit', $data);
		break;
		case 'save':
		$p = $this->input->post();
		$data=array(
			'created_date'=>$p['created'],
			'presented_date'=>$p['presented'],
			'shared_date'=>$p['shared'],
			'effective_from'=>$p['effective'],
			'effective_fill'=>$p['til'],
			'usd'=>$p['usd'],
			'sgd'=>$p['sgd'],
			'eur'=>$p['eur'],
			'price_term'=>$p['price'],
			'delivery_term'=>$p['delivery'],
			'validity_term'=>$p['validity'],
			'other_term'=>$p['other']
			);
		$this->mddata->insertIntoTbl('tbl_op_pl_header',$data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$p = $this->input->post();
		$data=array(
			'created_date'=>$p['created'],
			'presented_date'=>$p['presented'],
			'shared_date'=>$p['shared'],
			'effective_from'=>$p['effective'],
			'effective_fill'=>$p['til'],
			'usd'=>$p['usd'],
			'sgd'=>$p['sgd'],
			'eur'=>$p['eur'],
			'price_term'=>$p['price'],
			'delivery_term'=>$p['delivery'],
			'validity_term'=>$p['validity'],
			'other_term'=>$p['other']
			);
		$this->mddata->updateDataTbl('tbl_op_pl_header',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_op_pl_header','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'table_view':
		$data['pl'] = $this->mddata->getDataFromTblWhere('tbl_op_pl_tabel', 'pl_no', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('op/price_table_view', $data);
		break;
		case 'table_delete':
		$this->mddata->deleteGeneral('tbl_op_pl_tabel','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'table_add':
		$data['competitor'] = $this->db->query('SELECT name FROM
			(
				SELECT name FROM tbl_dm_customer
				UNION
				SELECT supplier FROM tbl_dm_supplier
				UNION
				SELECT name FROM tbl_dm_forwarder
				UNION
				SELECT name FROM tbl_dm_agent
				) A');								
		$this->load->view('top', $data);				
		$this->load->view('op/price_table_add', $data);								
		break;
		case 'table_edit':
		$data['c'] = $this->mddata->getDataFromTblWhere('tbl_op_pl_tabel', 'no', $this->uri->segment(4))->row();
		$data['competitor'] = $this->db->query('SELECT name FROM
			(
				SELECT name FROM tbl_dm_customer
				UNION
				SELECT supplier FROM tbl_dm_supplier
				UNION
				SELECT name FROM tbl_dm_forwarder
				UNION
				SELECT name FROM tbl_dm_agent
				) A');			
		$this->load->view('top', $data);				
		$this->load->view('op/price_table_edit', $data);								
		break;
		case 'table_save':
		$p=$this->input->post();
		$head = $this->mddata->getDataFromTblWhere('tbl_op_pl_header', 'no', $p['no'])->row();
		$ftc = $p['purchase']*$p['percen_ftc'] / 100;
		$ddp_price = $p['purchase']+$ftc;
		$currency = strtolower($p['currency']);
		if($currency=='idr'){
			$ddp_idr = $ddp_price;
		}else if($currency=='eur'){
			$ddp_idr = $ddp_price*$head->eur;	
		}else if($currency=='sgd'){
			$ddp_idr = $ddp_price*$head->sgd;	
		}else if($currency=='usd'){
			$ddp_idr = $ddp_price*$head->usd;	
		}
		
		$data = array(
			'item_id'=>$p['item_id'],
			'division'=>$p['division'],
			'category'=>$p['category'],
			'item_name'=>$p['item_nm'],
			'mou'=>$p['mou'],
			'brand'=>$p['brand'],
			'source'=>$p['source'],
			'incoterm'=>$p['incoterm'],
			'currency'=>$p['currency'],
			'purchase_price'=>$p['purchase'],
			'percen_ftc'=>$p['percen_ftc'],
			'ftc'=> $ftc,
			'ddp_price'=>$ddp_price,
			'ddp_idr'=>$ddp_idr,
			'percen_crosscomp'=>$p['percen_cross'],
			'crosscomp_price'=>$ddp_idr/(100/100-$p['percen_cross']/100),
			'percen_price_list'=>$p['percen_price_list'],
			'price_list'=>$ddp_idr/(100/-$p['percen_price_list']/100),
			'percen_cash'=>$p['percen_cash'],
			'cash'=>$ddp_idr/(100/100-$p['percen_cash']/100),
			'percen_skbdn'=>$p['percen_skbdn'],
			'skbdn_price'=>$ddp_idr/(100/100-$p['percen_skbdn']/100),
			'percen_credit_1_month'=>$p['percen_credit_1m'],
			'credit_1_month'=>$ddp_idr/(100/100-$p['percen_credit_1m']/100),
			'percen_credit_2_month'=>$p['percen_credit_2m'],
			'credit_2_month'=>$ddp_idr/(100/100-$p['percen_credit_2m']/100),
			'percen_credit_3_month'=>$p['percen_credit_3m'],
			'credit_3_month'=>$ddp_idr/(100/100-$p['percen_credit_3m']/100),
			'percen_credit_4_month'=>$p['percen_credit_4m'],
			'credit_4_month'=>$ddp_idr/(100/100-$p['percen_credit_4m']/100),
			'special_condition'=>$p['special'],
			'khs_price'=>$p['khs_price'],
			'percen_pricelist_to_khs'=>($p['khs_price']-$ddp_idr/(100/100-$p['percen_price_list']/100))/$p['khs_price'],
			'percen_nett_cash_to_khs'=>($p['khs_price']-$ddp_idr/(100/100-$p['percen_cash']/100))/$p['khs_price'],
			'competitor_1'=>$p['comp_1'],
			'competitor_1_name'=>$p['comp_1_name'],
			'competitor_2'=>$p['comp_2'],
			'competitor_2_name'=>$p['comp_2_name'],
			'competitor_3'=>$p['comp_3'],
			'competitor_3_name'=>$p['comp_3_name'],
			'pl_no'=>$p['no']
			);
$this->mddata->insertIntoTbl('tbl_op_pl_tabel', $data);
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'table_update':
$p=$this->input->post();
$head = $this->mddata->getDataFromTblWhere('tbl_op_pl_header', 'no', $p['no_pl'])->row();
$ftc = $p['purchase']*$p['percen_ftc'];
$ddp_price = $p['purchase']+$ftc;
$currency = strtolower($p['currency']);
if($currency=='idr'){
	$ddp_idr = $ddp_price;
}else if($currency=='eur'){
	$ddp_idr = $ddp_price*$head->eur;	
}else if($currency=='sgd'){
	$ddp_idr = $ddp_price*$head->sgd;	
}else if($currency=='usd'){
	$ddp_idr = $ddp_price*$head->usd;	
}

$data = array(
	'item_id'=>$p['item_id'],
	'division'=>$p['division'],
	'category'=>$p['category'],
	'item_name'=>$p['item_nm'],
	'mou'=>$p['mou'],
	'brand'=>$p['brand'],
	'source'=>$p['source'],
	'incoterm'=>$p['incoterm'],
	'currency'=>$p['currency'],
	'purchase_price'=>$p['purchase'],
	'percen_ftc'=>$p['percen_ftc'],
	'ftc'=> $ftc,
	'ddp_price'=>$ddp_price,
	'ddp_idr'=>$ddp_idr,
	'percen_crosscomp'=>$p['percen_cross'],
	'crosscomp_price'=>$ddp_idr/(100/100-$p['percen_cross']/100),
	'percen_price_list'=>$p['percen_price_list'],
	'price_list'=>$ddp_idr/(100/-$p['percen_price_list']/100),
	'percen_cash'=>$p['percen_cash'],
	'cash'=>$ddp_idr/(100/100-$p['percen_cash']/100),
	'percen_skbdn'=>$p['percen_skbdn'],
	'skbdn_price'=>$ddp_idr/(100/100-$p['percen_skbdn']/100),
	'percen_credit_1_month'=>$p['percen_credit_1m'],
	'credit_1_month'=>$ddp_idr/(100/100-$p['percen_credit_1m']/100),
	'percen_credit_2_month'=>$p['percen_credit_2m'],
	'credit_2_month'=>$ddp_idr/(100/100-$p['percen_credit_2m']/100),
	'percen_credit_3_month'=>$p['percen_credit_3m'],
	'credit_3_month'=>$ddp_idr/(100/100-$p['percen_credit_3m']/100),
	'percen_credit_4_month'=>$p['percen_credit_4m'],
	'credit_4_month'=>$ddp_idr/(100/100-$p['percen_credit_4m']/100),
	'special_condition'=>$p['special'],
	'khs_price'=>$p['khs_price'],
	'percen_pricelist_to_khs'=>($p['khs_price']-$ddp_idr/(100/100-$p['percen_price_list']/100))/$p['khs_price'],
	'percen_nett_cash_to_khs'=>($p['khs_price']-$ddp_idr/(100/100-$p['percen_cash']/100))/$p['khs_price'],
	'competitor_1'=>$p['comp_1'],
	'competitor_1_name'=>$p['comp_1_name'],
	'competitor_2'=>$p['comp_2'],
	'competitor_2_name'=>$p['comp_2_name'],
	'competitor_3'=>$p['comp_3'],
	'competitor_3_name'=>$p['comp_3_name']
	);
$this->mddata->updateDataTbl('tbl_op_pl_tabel',$data,'no',$p['no']);
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'getItemPrice':
$id = $_POST['id'];
$data = $this->mddata->getDataFromTblWhere('tbl_op_pl_tabel', 'item_id', $id)->row();
$json = json_encode($data);
echo $json;
break;
case 'getConvert':
$date = $_POST['date'];
$cur = $_POST['cur'];
$data = $this->db->query("SELECT $cur FROM tbl_op_pl_header WHERE (str_to_date(effective_from,'%d %M %Y')) <= str_to_date('".$date."','%d %M %Y') && (str_to_date(effective_fill,'%d %M %Y')) >= str_to_date('".$date."','%d %M %Y')")->row();
if(!empty($data)){
	echo $data->$cur;
}else{
	echo "";
}
break;
case 'get_field_cur':
$date = $_POST['date'];
$cur = $_POST['cur'];
$id = $_POST['id'];
// echo $date."/".$id;
$data = $this->db->query("SELECT tb.currency AS cr FROM tbl_op_pl_header AS hd,tbl_op_pl_tabel AS tb WHERE 
	(str_to_date(hd.effective_from,'%d %M %Y')) <= str_to_date('".$date."','%d %M %Y') && 
	(str_to_date(hd.effective_fill,'%d %M %Y')) >= str_to_date('".$date."','%d %M %Y') && 
	tb.item_id = '".$id."' &&
	hd.no = tb.pl_no")->row();
if(!empty($data)){
	echo $data->cr;
}else{
	echo "-";
}
break;
}
}
function payment()
{
	$data['ac'] = "op_payment";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['op'] = $this->mddata->getAllDataTbl('tbl_op_pm_header');
		$this->load->view('top', $data);
		$this->load->view('op/payment_view', $data);
		break;
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('op/payment_add', $data);								
		break;
		case"edit":
		$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_pm_header', 'no', $this->uri->segment(4))->row_array();
		$this->load->view('top', $data);
		$this->load->view('op/payment_edit', $data);
		break;
		case 'save':
		$nomor = $this->db->query("SELECT * FROM tbl_op_pm_header ORDER BY no DESC");
		$tahun = date('Y');
		$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
		$fn = 0;
		if($tahun == $sy)
		{
			if($nomor->num_rows() == 0)
			{
				$fn = 1;
			} else {
				$n = $nomor->row()->memo_no;
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
		$dir = "image/op_payment/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data=array(
			'memo_no'=>$fn,
			'memo_date'=>$p['date'],
			'addressed_to'=>$p['addressed'],
			'cc_to'=>$p['cc_to'],
			'due_date'=>$p['due'],
			'payment_type'=>$p['payment'],
			'bank_name'=>$p['bank'],
			'bank_account'=>$p['account'],
			'beneficiary'=>$p['beneficiary'],
			'other_info'=>$p['other'],
			'payment_date'=>$p['payment_date'],
			'payment_amount'=>$p['amount']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['payment_proof'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_op_pm_header', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$dir = "image/op_payment/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data=array(
			'memo_date'=>$p['date'],
			'addressed_to'=>$p['addressed'],
			'cc_to'=>$p['cc_to'],
			'due_date'=>$p['due'],
			'payment_type'=>$p['payment'],
			'bank_name'=>$p['bank'],
			'bank_account'=>$p['account'],
			'beneficiary'=>$p['beneficiary'],
			'other_info'=>$p['other'],
			'payment_date'=>$p['payment_date'],
			'payment_amount'=>$p['amount']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['payment_proof'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_op_pm_header',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_op_pm_header','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;

		case "tabel_view":
		$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_pm_table', 'pm_no', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('op/payment_table_view', $data);
		break;	

		case "tabel_add":
		$this->load->view('top', $data);
		$this->load->view('op/payment_table_add', $data);
		break;	

		case 'tabel_save':
		$p=$this->input->post();
		$data=array(
			'budget_code' => $p['code'],
			'main_budget' => $p['main'],
			'vendor'=>$p['vendor'],
			'currency_type'=>$p['currency'],
			'amount'=>$p['amount'],
			'description'=>$p['desc'],
			'invoice_no'=>$p['invoice'],
			'remark'=>$p['remark'],
			'pm_no' => $p['pm_no']
			);
		$this->mddata->insertIntoTbl('tbl_op_pm_table', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;

		case "tabel_edit":
		$data['op'] = $this->mddata->getDataFromTblWhere('tbl_op_pm_table', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);
		$this->load->view('op/payment_table_edit', $data);
		break;	
		
		case "tabel_update":
		$p=$this->input->post();
		$data=array(
			'budget_code' => $p['code'],
			'main_budget' => $p['main'],
			'vendor'=>$p['vendor'],
			'currency_type'=>$p['currency'],
			'amount'=>$p['amount'],
			'description'=>$p['desc'],
			'invoice_no'=>$p['invoice'],
			'remark'=>$p['remark']
			);
		$this->mddata->updateDataTbl('tbl_op_pm_table',$data,'no',$p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case "tabel_delete":
		$this->mddata->deleteGeneral('tbl_op_pm_table','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case "detail":
		$data['head'] = $this->mddata->getDataFromTblWhere('tbl_op_pm_header', 'no', $this->uri->segment(4))->row();
		$data['tabel'] = $this->mddata->getDataFromTblWhere('tbl_op_pm_table', 'pm_no', $this->uri->segment(4))->result();
		$this->load->view('op/payment_detail', $data);
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
		$nomor = $this->db->query("SELECT * FROM tbl_op_letter_of_authorization ORDER BY no DESC");
		$tahun = date('Y');
		$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
		$fn = 0;
		if($tahun == $sy)
		{
			if($nomor->num_rows() == 0)
			{
				$fn = 1;
			} else {
				$n = $nomor->row()->loa_no;
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
		$data['ds'] = $this->mddata->getAllDataTbl('tbl_op_short_brief')->row();
		$this->load->view('top', $data);
		$this->load->view('op/brief_view', $data);
		break;
		case 'edit':
		$data['ds'] = $this->mddata->getAllDataTbl('tbl_op_short_brief')->row();
		$this->load->view('top', $data);
		$this->load->view('op/brief_edit', $data);
		break;
		case 'update':
		$p = $this->input->post();
		$this->mddata->updateDataBriefOp($p['brief']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function structure(){
	$data['ac'] = "op_structure";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['st'] = $this->mddata->getAllDataTbl('tbl_op_bagan')->row();
		$this->load->view('top', $data);
		$this->load->view('op/structure_view', $data);
		break;
		case 'save':
		$dir = "image/op_organization/";
		$file = $dir . $_FILES['file']['name'];
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['bagan'] = $file;
		}
		$this->mddata->updateStruktur('tbl_op_bagan', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
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
			'parent'=>'00',
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
		case 'addPosition':
		$am = $_POST['id'];
		$pos = $_POST['pos'];
		$par = $_POST['par'];
		$data = array(
			'am' => $am,
			'fungsi_posisi' => $pos,
			'parent' => $par,
			);
		$this->mddata->insertIntoTbl('tbl_op_jobdesc_kpi', $data);
		echo "1";
		break;
		case 'deletePosition':

		$this->mddata->deleteGeneral('tbl_op_jobdesc_kpi','no', $_POST['id']);
		echo "1";
		break;
	}
}	
//END PROFILE
}