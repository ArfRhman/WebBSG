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
			$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/hs_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('op/hs_add', $data);
			break;
			case 'save':
			$data = array(
				'code' => $this->input->post('code'),
				'description' => $this->input->post('description'),
				'uraian' => $this->input->post('uraian'),
				'duty' => $this->input->post('duty'),
				'lartas' => $this->input->post('lartas'),
				'jenis' => $this->input->post('jenis'),
				'catatan' => $this->input->post('catatan'), 
				);
			$this->mddata->insertIntoTbl('tbl_op_hs', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['hs'] = $this->mddata->getDataFromTblWhere('tbl_op_hs', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/hs_edit', $data);
			break;
			case 'update':
			$data = array(
				'code' => $this->input->post('code'),
				'description' => $this->input->post('description'),
				'uraian' => $this->input->post('uraian'),
				'duty' => $this->input->post('duty'),
				'lartas' => $this->input->post('lartas'),
				'jenis' => $this->input->post('jenis'),
				'catatan' => $this->input->post('catatan'), 
				);
			$this->mddata->updateDataTbl('tbl_op_hs', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_op_hs', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function memo()
	{
		$data['ac'] = "op_memo";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['memo'] = $this->mddata->getAllDataTbl('tbl_op_internal_memo');
			$this->load->view('top', $data);
			$this->load->view('op/memo_view', $data);
			break;
			case 'view_subfield':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_op_internal_memo_subfield', 'id_memo', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/memo_view_subfield', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('op/memo_add', $data);
			break;
			case 'edit':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_op_internal_memo', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/memo_edit', $data);
			break;
			case 'edit_subfield':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_op_internal_memo_subfield', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/memo_edit_subfield', $data);
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
			$this->mddata->insertIntoTbl('tbl_op_internal_memo', $data);
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
			$this->mddata->insertIntoTbl('tbl_op_internal_memo_subfield', $data);
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
			$this->mddata->updateDataTbl('tbl_op_internal_memo', $data, 'id', $this->uri->segment(4));
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
			$this->mddata->updateDataTbl('tbl_op_internal_memo_subfield', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_op_internal_memo', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete_subfield':
			$this->mddata->deleteTblData('tbl_op_internal_memo_subfield', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'preview':
			$data['memo'] = $this->mddata->getDataFromTblWhere('tbl_op_internal_memo', 'id', $this->uri->segment(4));
			$data['sub'] = $this->mddata->getDataFromTblWhere('tbl_op_internal_memo_subfield', 'id_memo', $this->uri->segment(4));
			$this->load->view('op/memo_preview', $data);
			break;
		}
	}
	
	function incoming()
	{
		$data['ac'] = "op_incoming";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['in'] = $this->mddata->getAllDataTbl('tbl_op_incoming');
			$this->load->view('top', $data);
			$this->load->view('op/incoming_view', $data);
			break;						
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/incoming_add', $data);								
			break;
			case 'save':
				//select nomor terakhir
				//$nomor = $this->db->query("SELECT * FROM tbl_op_incoming ORDER BY `id` DESC");
				//$tahun = date('Y');
				//$sy = $this->mddata->getAllDataTbl('tbl_setting_tahun')->row()->tahun;
				//$fn = 0;
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
			$dir = "image/incoming/";
			$file = $dir . $_FILES['file']['name'];
			$data = array(
					//'nomer' => $fn,					
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
			$this->mddata->insertIntoTbl('tbl_op_incoming', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_incoming', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/incoming_edit', $data);
			break;
			case 'update':
			$dir = "image/incoming/";
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
			$this->mddata->updateDataTbl('tbl_op_incoming', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_op_incoming', $this->uri->segment(4));
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
			$data['in'] = $this->mddata->getAllDataTbl('tbl_op_outgoing');
			$this->load->view('top', $data);
			$this->load->view('op/outgoing_view', $data);
			break;						
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/outgoing_add', $data);								
			break;
			case 'save':
				//select nomor terakhir
			$nomor = $this->db->query("SELECT * FROM tbl_op_outgoing ORDER BY `id` DESC");
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
			$dir = "image/outgoing/";
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
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
			$this->mddata->insertIntoTbl('tbl_op_outgoing', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['in'] = $this->mddata->getDataFromTblWhere('tbl_op_outgoing', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('op/outgoing_edit', $data);
			break;
			case 'update':
			$dir = "image/outgoing/";
			$file = $dir . $_FILES['file']['name'];
			$data = array(
				'tanggal' => $this->input->post('tanggal'), 
				'tujuan' => $this->input->post('tujuan'), 
				'perihal' => $this->input->post('perihal'), 
				'terima' => $this->input->post('terima'), 
				'pembuat' => $this->input->post('pembuat'), 
				'jawab' => $this->input->post('jawab'), 
				'letak' => $this->input->post('letak'),
				);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				$data['file'] = $file;
			}
			$this->mddata->updateDataTbl('tbl_op_outgoing', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_op_outgoing', $this->uri->segment(4));
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
		$data['ac'] = "op_importcost";
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
		$data['ac'] = "op_supply";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/transport_cost_view', $data);
			break;
		}
	}
	function import_lead()
	{
		$data['ac'] = "op_supply";
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
		$data['ac'] = "op_supply";
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
		$data['ac'] = "op_supply";
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
		$data['ac'] = "op_supply";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/cases_view', $data);
			break;
		}
	}
	function po()
	{
		$data['ac'] = "op_po";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/po_view', $data);
			break;
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/po_add', $data);								
			break;
		}
	}
	function budget()
	{
		$data['ac'] = "op_budget";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/budget_view', $data);
			break;
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/budget_add', $data);								
			break;
		}
	}
	function realisasi()
	{
		$data['ac'] = "op_realisasi";
		switch($this->uri->segment(3))
		{
			case 'view':
				//$data['hs'] = $this->mddata->getAllDataTbl('tbl_op_hs');
			$this->load->view('top', $data);
			$this->load->view('op/realisasi_view', $data);
			break;
			case 'add':								
			$this->load->view('top', $data);				
			$this->load->view('op/realisasi_add', $data);								
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
}