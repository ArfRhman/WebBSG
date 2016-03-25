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
}