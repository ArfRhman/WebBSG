<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dm extends CI_Controller {

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
	
	function creditor()
	{
		$data['ac'] = "dm_creditor";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['creditor'] = $this->mddata->getAllDataTbl('tbl_dm_creditor');
			$this->load->view('top', $data);
			$this->load->view('dm/creditor_view', $data);
			break;
			case 'add':
			$this->load->view('top');
			$this->load->view('dm/creditor_add');
			break;
			case 'save':
			$data = array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'type' => $this->input->post('type'),
				'currency' => $this->input->post('currency'),
				'phone' => $this->input->post('phone'),
				'term' => $this->input->post('term'),
				'area' => $this->input->post('area'),
				'agent' => $this->input->post('agent'),
				'active' => $this->input->post('active'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_creditor', $data);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/creditor/add');
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_dm_creditor', $this->uri->segment(4));
			redirect('dm/creditor/view');
			break;
			case 'edit':
			$data['creditor'] = $this->mddata->getDataFromTblWhere('tbl_dm_creditor', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/creditor_edit', $data);
			break;
			case 'update':
			$data = array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'type' => $this->input->post('type'),
				'currency' => $this->input->post('currency'),
				'phone' => $this->input->post('phone'),
				'term' => $this->input->post('term'),
				'area' => $this->input->post('area'),
				'agent' => $this->input->post('agent'),
				'active' => $this->input->post('active'),
				);
			$this->mddata->updateDataTbl('tbl_dm_creditor', $data, 'id', $this->uri->segment(4));
			redirect('dm/creditor/view');
			break;
			default:
			redirect('site/');
			break;
		}
	}
	
	function customer()
	{
		$data['ac'] = 'dm_customer';
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['customer'] = $this->mddata->getAllDataTbl('tbl_dm_customer');
			$this->load->view('top', $data);
			$this->load->view('dm/customer_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('dm/customer_add', $data);
			break;
			case 'add_subfield':
			$this->load->view('top', $data);
			$this->load->view('dm/customer_add_subfield', $data);
			break;
			case 'save':
			$data = array(
				'customer_id' => $this->input->post('customer_id'),
				'manager' => $this->input->post('manager'),
				'grade' => $this->input->post('grade'),
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'postal' => $this->input->post('postal'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
				'email' => $this->input->post('email'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_customer', $data);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/customer/add');
			break;
			case 'save_subfield':
			$data = array(
				'id_customer' => $this->uri->segment(4),
				'pic' => $this->input->post('pic'),
				'title' => $this->input->post('title'),
				'email_pic' => $this->input->post('email_pic'),
				'mobile1' => $this->input->post('mobile1'),
				'mobile2' => $this->input->post('mobile2'),
				'residence' => $this->input->post('residence'),
				'birthday' => $this->input->post('birthday'),
				'whatsapp' => $this->input->post('whatsapp'),
				'skype' => $this->input->post('skype'),
				'bbm' => $this->input->post('bbm'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_customer_subfield', $data);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/customer/subfield/'.$this->uri->segment(4));
			break;
			case 'subfield':
			$data['customer'] = $this->mddata->getDataFromTblWhere('tbl_dm_customer_subfield','id_customer', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/customer_view_subfield', $data);
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_dm_customer', $this->uri->segment(4));
			redirect('dm/customer/view');
			break;
			case 'delete_subfield':
			$this->mddata->deleteTblData('tbl_dm_customer_subfield', $this->uri->segment(4));
			redirect('dm/customer/view');
			break;
			case 'edit':
			$data['customer'] = $this->mddata->getDataFromTblWhere('tbl_dm_customer', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/customer_edit', $data);
			break;
			case 'edit_subfield':
			$data['customer'] = $this->mddata->getDataFromTblWhere('tbl_dm_customer_subfield', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/customer_edit_subfield', $data);
			break;
			case 'update_subfield':
			$data = array(
				'pic' => $this->input->post('pic'),
				'title' => $this->input->post('title'),
				'email_pic' => $this->input->post('email_pic'),
				'mobile1' => $this->input->post('mobile1'),
				'mobile2' => $this->input->post('mobile2'),
				'residence' => $this->input->post('residence'),
				'birthday' => $this->input->post('birthday'),
				'whatsapp' => $this->input->post('whatsapp'),
				'skype' => $this->input->post('skype'),
				'bbm' => $this->input->post('bbm'),
				);
			$this->mddata->updateDataTbl('tbl_dm_customer_subfield', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/customer/view/');
			break;
			case 'update':
			$data = array(
				'customer_id' => $this->input->post('customer_id'),
				'manager' => $this->input->post('manager'),
				'grade' => $this->input->post('grade'),
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'postal' => $this->input->post('postal'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
				'email' => $this->input->post('email'),
				);
			$this->mddata->updateDataTbl('tbl_dm_customer', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/customer/view/');
			break;
			case 'getDataCustomer':
			$id = $_POST['id'];
			$data = $this->mddata->getDataFromTblWhere('tbl_dm_customer', 'customer_id', $id)->row();
			$json = json_encode($data);
			echo $json;
			break;
			default:
			redirect('site/');
			break;
		}
	}
	
	function stock()
	{
		$data['ac'] = "dm_stock";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['stock'] = $this->mddata->getAllDataTbl('tbl_dm_stock');
			$this->load->view('top', $data);
			$this->load->view('dm/stock_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('dm/stock_add', $data);
			break;
			case 'save':
			$data = array(
				'code' => $this->input->post('code'),
				'location' => $this->input->post('location'),
				'uom' => $this->input->post('uom'),
				'group' => $this->input->post('group'),
				'type' => $this->input->post('type'),
				'description' => $this->input->post('description'),
				'method' => $this->input->post('method'),
				'qty' => $this->input->post('qty'),
				'total' => $this->input->post('total'),
				'average' => $this->input->post('average'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_stock', $data);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/stock/add');
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_dm_stock', $this->uri->segment(4));
			redirect('dm/stock/view');
			break;
			case 'edit':
			$data['stock'] = $this->mddata->getDataFromTblWhere('tbl_dm_stock', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/stock_edit', $data);
			break;
			case 'update':
			$data = array(
				'code' => $this->input->post('code'),
				'location' => $this->input->post('location'),
				'uom' => $this->input->post('uom'),
				'group' => $this->input->post('group'),
				'type' => $this->input->post('type'),
				'description' => $this->input->post('description'),
				'method' => $this->input->post('method'),
				'qty' => $this->input->post('qty'),
				'total' => $this->input->post('total'),
				'average' => $this->input->post('average'),
				);
			$this->mddata->updateDataTbl('tbl_dm_stock', $data, 'id', $this->uri->segment(4));
			redirect('dm/stock/view');
			break;
			default:
			redirect('site/');
			break;
		}
	}
	
	function operator()
	{
		$data['ac'] = "dm_operator";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['operator'] = $this->mddata->getAllDataTbl('tbl_dm_operator');
			$this->load->view('top', $data);
			$this->load->view('dm/operator_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('dm/operator_add', $data);
			break;
			case 'save':
			$data = array(
				'name' => $this->input->post('name'),
				'product' => $this->input->post('product'),
				'brand' => $this->input->post('brand'),
				'address' => $this->input->post('address'),
				'postal' => $this->input->post('postal'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_operator', $data);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/operator/view');
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_dm_operator', $this->uri->segment(4));
			redirect('dm/operator/view');
			break;
			case 'edit':
			$data['operator'] = $this->mddata->getDataFromTblWhere('tbl_dm_operator', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/operator_edit', $data);
			break;
			case 'update':
			$data = array(
				'name' => $this->input->post('name'),
				'product' => $this->input->post('product'),
				'brand' => $this->input->post('brand'),
				'address' => $this->input->post('address'),
				'postal' => $this->input->post('postal'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),					
				);
			$this->mddata->updateDataTbl('tbl_dm_operator', $data, 'id', $this->uri->segment(4));
			redirect('dm/operator/view');
			break;
			default:
			redirect('site/');
			break;
		}
	}
	
	function supplier()
	{
		$data['ac'] = "dm_supplier";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['supplier'] = $this->mddata->getAllDataTbl('tbl_dm_supplier');
			$this->load->view('top', $data);
			$this->load->view('dm/supplier_view', $data);
			break;
			case 'subfield':
			$data['supplier'] = $this->mddata->getDataFromTblWhere('tbl_dm_supplier_subfield','id_supplier', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/supplier_view_subfield', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('dm/supplier_add', $data);
			break;
			case 'add_subfield':
			$this->load->view('top', $data);
			$this->load->view('dm/supplier_add_subfield', $data);
			break;
			case 'save':
			$data = array(
				'supplier_id' => $this->input->post('supplier_id'),
				'kategori' => $this->input->post('kategori'),
				'status' => $this->input->post('status'),
				'supplier' => $this->input->post('supplier'),
				'brand' => $this->input->post('brand'),
				'address' => $this->input->post('address'),
				'postal' => $this->input->post('postal'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
				'email' => $this->input->post('email'),
				'product' => $this->input->post('product'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_supplier', $data);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/supplier/view');
			break;
			case 'save_subfield':
			$data = array(
				'id_supplier' => $this->uri->segment(4),
				'pic' => $this->input->post('pic'),
				'title' => $this->input->post('title'),
				'email_pic' => $this->input->post('email_pic'),
				'mobile1' => $this->input->post('mobile1'),
				'mobile2' => $this->input->post('mobile2'),
				'residence' => $this->input->post('residence'),
				'birthday' => $this->input->post('birthday'),
				'whatsapp' => $this->input->post('whatsapp'),
				'skype' => $this->input->post('skype'),
				'bbm' => $this->input->post('bbm'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_supplier_subfield', $data);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/supplier/subfield/'.$this->uri->segment(4));
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_dm_supplier', $this->uri->segment(4));
			redirect('dm/supplier/view');
			break;
			case 'edit':
			$data['supplier'] = $this->mddata->getDataFromTblWhere('tbl_dm_supplier', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/supplier_edit', $data);
			break;
			case 'edit_subfield':
			$data['customer'] = $this->mddata->getDataFromTblWhere('tbl_dm_supplier_subfield', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/supplier_edit_subfield', $data);
			break;
			case 'update_subfield':
			$data = array(
				'pic' => $this->input->post('pic'),
				'title' => $this->input->post('title'),
				'email_pic' => $this->input->post('email_pic'),
				'mobile1' => $this->input->post('mobile1'),
				'mobile2' => $this->input->post('mobile2'),
				'residence' => $this->input->post('residence'),
				'birthday' => $this->input->post('birthday'),
				'whatsapp' => $this->input->post('whatsapp'),
				'skype' => $this->input->post('skype'),
				'bbm' => $this->input->post('bbm'),
				);
			$this->mddata->updateDataTbl('tbl_dm_supplier_subfield', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/supplier/view/');
			break;
			case 'update':
			$data = array(
				'supplier_id' => $this->input->post('supplier_id'),
				'kategori' => $this->input->post('kategori'),
				'status' => $this->input->post('status'),
				'supplier' => $this->input->post('supplier'),
				'brand' => $this->input->post('brand'),
				'address' => $this->input->post('address'),
				'postal' => $this->input->post('postal'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
				'email' => $this->input->post('email'),
				'product' => $this->input->post('product'),
				);
			$this->mddata->updateDataTbl('tbl_dm_supplier', $data, 'id', $this->uri->segment(4));
			redirect('dm/supplier/view');
			break;
			case 'delete_subfield':
			$this->mddata->deleteTblData('tbl_dm_supplier_subfield', $this->uri->segment(4));
			redirect('dm/supplier/view');
			break;
			default:
			redirect('site/');
			break;
		}
	}
	
	function brand()
	{
		$data['ac'] = "dm_brand";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['brand'] = $this->mddata->getAllDataTbl('tbl_dm_brand');
			$this->load->view('top', $data);
			$this->load->view('dm/brand_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('dm/brand_add', $data);
			break;
			case 'save':
			$dir = "image/brand/";
			$file = $dir . $_FILES['image']['name'];
			if(move_uploaded_file($_FILES['image']['tmp_name'], $file))
			{
				$data = array(
					'brand' => $this->input->post('brand'),
					'status' => $this->input->post('status'),
					'registration' => $this->input->post('registration'),
					'certificate' => $this->input->post('certificate'),
					'image' => $file,
					);
				$this->mddata->insertIntoTbl('tbl_dm_brand', $data);
				$this->session->set_flashdata('data','Data Has Been Saved');
				redirect('dm/brand/add');
			} else {
				$data = array(
					'brand' => $this->input->post('brand'),
					'status' => $this->input->post('status'),
					'registration' => $this->input->post('registration'),
					'certificate' => $this->input->post('certificate'),
					);
				$this->mddata->insertIntoTbl('tbl_dm_brand', $data);
				$this->session->set_flashdata('data','Data Has Been Saved');
				redirect('dm/brand/add');
			}
			break;
			case 'edit':
			$data['brand'] = $this->mddata->getDataFromTblWhere('tbl_dm_brand', 'id', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/brand_edit', $data);
			break;
			case 'update':
			print_r($_POST);
			$dir = "image/brand/";
			$file = $dir . $_FILES['image']['name'];
			if(move_uploaded_file($_FILES['image']['tmp_name'], $file))
			{
				$data = array(
					'brand' => $this->input->post('brand'),
					'status' => $this->input->post('status'),
					'registration' => $this->input->post('registration'),
					'certificate' => $this->input->post('certificate'),
					'image' => $file,
					);
				$this->mddata->updateDataTbl('tbl_dm_brand', $data, 'id', $this->uri->segment(4));
				$this->session->set_flashdata('data','Data Has Been Saved');
				redirect('dm/brand/view');
			} else {
				$data = array(
					'brand' => $this->input->post('brand'),
					'status' => $this->input->post('status'),
					'registration' => $this->input->post('registration'),
					'certificate' => $this->input->post('certificate'),
					);
				$this->mddata->updateDataTbl('tbl_dm_brand', $data, 'id', $this->uri->segment(4));
				$this->session->set_flashdata('data','Data Has Been Saved');
				redirect('dm/brand/view');
			}
			break;
			case 'delete':
			$this->mddata->deleteTblData('tbl_dm_brand', $this->uri->segment(4));
			redirect('dm/brand/view');
			break;
		}
	}
	
	function forwarder()
	{
		$data['ac'] = "dm_forwarder";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['forwarder'] = $this->mddata->getAllDataTbl('tbl_dm_forwarder');
			$this->load->view('top', $data);
			$this->load->view('dm/forwarder_view', $data);
			break;
			case 'subfield':
			$data['forwarder'] = $this->mddata->getDataFromTblWhere('tbl_dm_forwarder_subfield','id_supplier', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('dm/forwarder_view_subfield', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('dm/forwarder_add', $data);
			break;
			case 'add_subfield':
			$this->load->view('top', $data);
			$this->load->view('dm/forwarder_add_subfield', $data);
			break;
			case 'add_legal':
			$this->load->view('top', $data);
			$this->load->view('dm/forwarder_add_legal', $data);
			break;
			case 'save':
			$data = array(
				'forwarder_id' => $this->input->post('forwarder_id'),
				'name' => $this->input->post('name'),
				'category' => $this->input->post('category'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax'),
				'website' => $this->input->post('website'),
				'email' => $this->input->post('email'),
				);
			$this->mddata->insertIntoTbl('tbl_dm_forwarder', $data);
				//get list id
			$legal = $this->db->query("SELECT * FROM tbl_dm_forwarder WHERE `forwarder_id` = '{$this->input->post('forwarder_id')}' AND `name` = '{$this->input->post('name')}';")->row();
				//insert legal data
			$datalegal = array(
				'id_forwarder' => $legal->id,
				);
			$this->mddata->insertIntoTbl('tbl_dm_forwarder_legal', $datalegal);
			$this->session->set_flashdata('data', 'Data has been saved');
			redirect('dm/forwarder/view');
			break;
			case 'save_legal':
			$dir = "image/legal/";
			$pendirian = "";
			$menkeh = "";
			$perubahan = "";
			$menkeh_perubahan = "";
			$tdp = "";
			$siup = "";
			$siujt = "";
			$npwp = "";
			$pkp = "";
			$domisili = "";
			$lisensi1 = "";
			$lisensi2 = "";
			$pks = "";

			$data = array(
				'id_forwarder' => $this->uri->segment(4), 
				'pendirian_no' => $this->input->post('pendirian_no'), 
				'pendirian_date' => $this->input->post('pendirian_date'), 
				'pendirian_notary' => $this->input->post('pendirian_notary'), 
				'menkeh_no' => $this->input->post('menkeh_no'), 
				'menkeh_date' => $this->input->post('menkeh_date'), 
				'perubahan_no' => $this->input->post('perubahan_no'), 
				'perubahan_date' => $this->input->post('perubahan_date'), 
				'perubahan_notary' => $this->input->post('perubahan_notary'), 
				'menkeh_perubahan_no' => $this->input->post('menkeh_perubahan_no'), 
				'menkeh_perubahan_date' => $this->input->post('menkeh_perubahan_date'), 
				'tdp_no' => $this->input->post('tdp_no'), 
				'tdp_date' => $this->input->post('tdp_date'), 
				'tdp_expire' => $this->input->post('tdp_expire'), 
				'siup_no' => $this->input->post('siup_no'), 
				'siup_date' => $this->input->post('siup_date'), 
				'siup_expire' => $this->input->post('siup_expire'), 
				'siujt_no' => $this->input->post('siujt_no'), 
				'siujt_date' => $this->input->post('siujt_date'), 
				'siujt_expire' => $this->input->post('siujt_expire'), 
				'npwp_no' => $this->input->post('npwp_no'), 
				'npwp_date' => $this->input->post('npwp_date'), 
				'pkp_no' => $this->input->post('pkp_no'), 
				'pkp_date' => $this->input->post('pkp_date'), 
				'domisili_no' => $this->input->post('domisili_no'), 
				'domisili_date' => $this->input->post('domisili_date'), 
				'domisili_expire' => $this->input->post('domisili_expire'), 
				'lisensi1_no' => $this->input->post('lisensi1_no'), 
				'lisensi1_date' => $this->input->post('lisensi1_date'), 
				'lisensi1_expire' => $this->input->post('lisensi1_expire'), 
				'lisensi1_name' => $this->input->post('lisensi1_name'), 
				'lisensi2_no' => $this->input->post('lisensi2_no'), 
				'lisensi2_date' => $this->input->post('lisensi2_date'), 
				'lisensi2_expire' => $this->input->post('lisensi2_expire'), 
				'lisensi2_name' => $this->input->post('lisensi2_name'), 
				'pks_no' => $this->input->post('pks_no'), 
				'pks_date' => $this->input->post('pks_date'), 
				'pks_expire' => $this->input->post('pks_expire'),
				);

if($_FILES['pendirian']['size'] > 0)
{
	$pendirian = $dir . $_FILES['pendirian']['name'];
	move_uploaded_file($_FILES['pendirian']['tmp_name'], $pendirian);
	$data['pendirian'] = $pendirian;
}
if($_FILES['menkeh']['size'] > 0)
{
	$menkeh = $dir . $_FILES['menkeh']['name'];
	move_uploaded_file($_FILES['menkeh']['tmp_name'], $menkeh);
	$data['menkeh'] = $menkeh;
}
if($_FILES['perubahan']['size'] > 0)
{
	$perubahan = $dir . $_FILES['perubahan']['name'];
	move_uploaded_file($_FILES['perubahan']['tmp_name'], $perubahan);
	$data['perubahan'] = $perubahan;
}
if($_FILES['menkeh_perubahan']['size'] > 0)
{
	$menkeh_perubahan = $dir . $_FILES['menkeh_perubahan']['name'];
	move_uploaded_file($_FILES['menkeh_perubahan']['tmp_name'], $menkeh_perubahan);
	$data['menkeh_perubahan'] = $menkeh_perubahan;
}
if($_FILES['tdp']['size'] > 0)
{
	$tdp = $dir . $_FILES['tdp']['name'];
	move_uploaded_file($_FILES['tdp']['tmp_name'], $tdp);
	$data['tdp'] = $tdp;
}
if($_FILES['siup']['size'] > 0)
{
	$siup = $dir . $_FILES['siup']['name'];
	move_uploaded_file($_FILES['siup']['tmp_name'], $siup);
	$data['siup'] = $siup;
}
if($_FILES['siujt']['size'] > 0)
{
	$siujt = $dir . $_FILES['siujt']['name'];
	move_uploaded_file($_FILES['siujt']['tmp_name'], $siujt);
	$data['siujt'] = $siujt;
}
if($_FILES['npwp']['size'] > 0)
{
	$npwp = $dir . $_FILES['npwp']['name'];
	move_uploaded_file($_FILES['npwp']['tmp_name'], $npwp);
	$data['npwp'] = $npwp;
}
if($_FILES['pkp']['size'] > 0)
{
	$pkp = $dir . $_FILES['pkp']['name'];
	move_uploaded_file($_FILES['pkp']['tmp_name'], $pkp);
	$data['pkp'] = $pkp;
}
if($_FILES['domisili']['size'] > 0)
{
	$domisili = $dir . $_FILES['domisili']['name'];
	move_uploaded_file($_FILES['domisili']['tmp_name'], $domisili);
	$data['domisili'] = $domisili;
}
if($_FILES['lisensi1']['size'] > 0)
{
	$lisensi1 = $dir . $_FILES['lisensi1']['name'];
	move_uploaded_file($_FILES['lisensi1']['tmp_name'], $lisensi1);
	$data['lisensi1'] = $lisensi1;
}
if($_FILES['lisensi2']['size'] > 0)
{
	$lisensi2 = $dir . $_FILES['lisensi2']['name'];
	move_uploaded_file($_FILES['lisensi2']['tmp_name'], $lisensi2);
	$data['lisensi2'] = $lisensi2;
}
if($_FILES['pks']['size'] > 0)
{
	$pks = $dir . $_FILES['pks']['name'];
	move_uploaded_file($_FILES['pks']['tmp_name'], $pks);
	$data['pks'] = $pks;
}
$this->mddata->insertIntoTbl('tbl_dm_forwarder_legal', $data);
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect('dm/forwarder/legal_view/'.$this->uri->segment(4));
break;
case 'save_subfield':
$data = array(
	'id_supplier' => $this->uri->segment(4),
	'pic' => $this->input->post('pic'),
	'title' => $this->input->post('title'),
	'email_pic' => $this->input->post('email_pic'),
	'mobile1' => $this->input->post('mobile1'),
	'mobile2' => $this->input->post('mobile2'),
	'residence' => $this->input->post('residence'),
	'birthday' => $this->input->post('birthday'),
	'whatsapp' => $this->input->post('whatsapp'),
	'skype' => $this->input->post('skype'),
	'bbm' => $this->input->post('bbm'),
	);
$this->mddata->insertIntoTbl('tbl_dm_forwarder_subfield', $data);
$this->session->set_flashdata('data', 'Data has been saved');
redirect('dm/forwarder/subfield/'.$this->uri->segment(4));
break;
case 'delete':
$this->mddata->deleteTblData('tbl_dm_forwarder', $this->uri->segment(4));
redirect('dm/forwarder/view');
break;
case 'edit':
$data['forwarder'] = $this->mddata->getDataFromTblWhere('tbl_dm_forwarder', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('dm/forwarder_edit', $data);
break;
case 'edit_legal':
$data['legal'] = $this->mddata->getDataFromTblWhere('tbl_dm_forwarder_legal', 'id_forwarder', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('dm/forwarder_edit_legal', $data);
break;
case 'edit_subfield':
$data['customer'] = $this->mddata->getDataFromTblWhere('tbl_dm_forwarder_subfield', 'id', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('dm/forwarder_edit_subfield', $data);
break;
case 'update_legal':
$dir = "image/legal/";

$data = array(
	'pendirian_no' => $this->input->post('pendirian_no'), 
	'pendirian_date' => $this->input->post('pendirian_date'), 
	'pendirian_notary' => $this->input->post('pendirian_notary'), 
	'menkeh_no' => $this->input->post('menkeh_no'), 
	'menkeh_date' => $this->input->post('menkeh_date'), 
	'perubahan_no' => $this->input->post('perubahan_no'), 
	'perubahan_date' => $this->input->post('perubahan_date'), 
	'perubahan_notary' => $this->input->post('perubahan_notary'), 
	'menkeh_perubahan_no' => $this->input->post('menkeh_perubahan_no'), 
	'menkeh_perubahan_date' => $this->input->post('menkeh_perubahan_date'), 
	'tdp_no' => $this->input->post('tdp_no'), 
	'tdp_date' => $this->input->post('tdp_date'), 
	'tdp_expire' => $this->input->post('tdp_expire'), 
	'siup_no' => $this->input->post('siup_no'), 
	'siup_date' => $this->input->post('siup_date'), 
	'siup_expire' => $this->input->post('siup_expire'), 
	'siujt_no' => $this->input->post('siujt_no'), 
	'siujt_date' => $this->input->post('siujt_date'), 
	'siujt_expire' => $this->input->post('siujt_expire'), 
	'npwp_no' => $this->input->post('npwp_no'), 
	'npwp_date' => $this->input->post('npwp_date'), 
	'pkp_no' => $this->input->post('pkp_no'), 
	'pkp_date' => $this->input->post('pkp_date'), 
	'domisili_no' => $this->input->post('domisili_no'), 
	'domisili_date' => $this->input->post('domisili_date'), 
	'domisili_expire' => $this->input->post('domisili_expire'), 
	'lisensi1_no' => $this->input->post('lisensi1_no'), 
	'lisensi1_date' => $this->input->post('lisensi1_date'), 
	'lisensi1_expire' => $this->input->post('lisensi1_expire'), 
	'lisensi1_name' => $this->input->post('lisensi1_name'), 
	'lisensi2_no' => $this->input->post('lisensi2_no'), 
	'lisensi2_date' => $this->input->post('lisensi2_date'), 
	'lisensi2_expire' => $this->input->post('lisensi2_expire'), 
	'lisensi2_name' => $this->input->post('lisensi2_name'), 
	'pks_no' => $this->input->post('pks_no'), 
	'pks_date' => $this->input->post('pks_date'), 
	'pks_expire' => $this->input->post('pks_expire'),
	);

if($_FILES['pendirian']['size'] > 0)
{
	$pendirian = $dir . $_FILES['pendirian']['name'];
	move_uploaded_file($_FILES['pendirian']['tmp_name'], $pendirian);
	$data['pendirian'] = $pendirian;
}
if($_FILES['menkeh']['size'] > 0)
{
	$menkeh = $dir . $_FILES['menkeh']['name'];
	move_uploaded_file($_FILES['menkeh']['tmp_name'], $menkeh);
	$data['menkeh'] = $menkeh;
}
if($_FILES['perubahan']['size'] > 0)
{
	$perubahan = $dir . $_FILES['perubahan']['name'];
	move_uploaded_file($_FILES['perubahan']['tmp_name'], $perubahan);
	$data['perubahan'] = $perubahan;
}
if($_FILES['menkeh_perubahan']['size'] > 0)
{
	$menkeh_perubahan = $dir . $_FILES['menkeh_perubahan']['name'];
	move_uploaded_file($_FILES['menkeh_perubahan']['tmp_name'], $menkeh_perubahan);
	$data['menkeh_perubahan'] = $menkeh_perubahan;
}
if($_FILES['tdp']['size'] > 0)
{
	$tdp = $dir . $_FILES['tdp']['name'];
	move_uploaded_file($_FILES['tdp']['tmp_name'], $tdp);
	$data['tdp'] = $tdp;
}
if($_FILES['siup']['size'] > 0)
{
	$siup = $dir . $_FILES['siup']['name'];
	move_uploaded_file($_FILES['siup']['tmp_name'], $siup);
	$data['siup'] = $siup;
}
if($_FILES['siujt']['size'] > 0)
{
	$siujt = $dir . $_FILES['siujt']['name'];
	move_uploaded_file($_FILES['siujt']['tmp_name'], $siujt);
	$data['siujt'] = $siujt;
}
if($_FILES['npwp']['size'] > 0)
{
	$npwp = $dir . $_FILES['npwp']['name'];
	move_uploaded_file($_FILES['npwp']['tmp_name'], $npwp);
	$data['npwp'] = $npwp;
}
if($_FILES['pkp']['size'] > 0)
{
	$pkp = $dir . $_FILES['pkp']['name'];
	move_uploaded_file($_FILES['pkp']['tmp_name'], $pkp);
	$data['pkp'] = $pkp;
}
if($_FILES['domisili']['size'] > 0)
{
	$domisili = $dir . $_FILES['domisili']['name'];
	move_uploaded_file($_FILES['domisili']['tmp_name'], $domisili);
	$data['domisili'] = $domisili;
}
if($_FILES['lisensi1']['size'] > 0)
{
	$lisensi1 = $dir . $_FILES['lisensi1']['name'];
	move_uploaded_file($_FILES['lisensi1']['tmp_name'], $lisensi1);
	$data['lisensi1'] = $lisensi1;
}
if($_FILES['lisensi2']['size'] > 0)
{
	$lisensi2 = $dir . $_FILES['lisensi2']['name'];
	move_uploaded_file($_FILES['lisensi2']['tmp_name'], $lisensi2);
	$data['lisensi2'] = $lisensi2;
}
if($_FILES['pks']['size'] > 0)
{
	$pks = $dir . $_FILES['pks']['name'];
	move_uploaded_file($_FILES['pks']['tmp_name'], $pks);
	$data['pks'] = $pks;
}
$this->mddata->updateDataTbl('tbl_dm_forwarder_legal', $data, 'id_forwarder', $this->uri->segment(4));
$this->session->set_flashdata('data', 'Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
break;
case 'update_subfield':
$data = array(
	'pic' => $this->input->post('pic'),
	'title' => $this->input->post('title'),
	'email_pic' => $this->input->post('email_pic'),
	'mobile1' => $this->input->post('mobile1'),
	'mobile2' => $this->input->post('mobile2'),
	'residence' => $this->input->post('residence'),
	'birthday' => $this->input->post('birthday'),
	'whatsapp' => $this->input->post('whatsapp'),
	'skype' => $this->input->post('skype'),
	'bbm' => $this->input->post('bbm'),
	);
$this->mddata->updateDataTbl('tbl_dm_forwarder_subfield', $data, 'id', $this->uri->segment(4));
$this->session->set_flashdata('data', 'Data has been saved');
redirect('dm/forwarder/view/');
break;
case 'update':
$data = array(
	'forwarder_id' => $this->input->post('forwarder_id'),
	'name' => $this->input->post('name'),
	'category' => $this->input->post('category'),
	'address' => $this->input->post('address'),
	'phone' => $this->input->post('phone'),
	'fax' => $this->input->post('fax'),
	'website' => $this->input->post('website'),
	'email' => $this->input->post('email'),
	);
$this->mddata->updateDataTbl('tbl_dm_forwarder', $data, 'id', $this->uri->segment(4));
redirect('dm/forwarder/view');
break;
case 'delete_subfield':
$this->mddata->deleteTblData('tbl_dm_forwarder_subfield', $this->uri->segment(4));
redirect('dm/forwarder/view');
break;
case 'legal_view':
$data['legal'] = $this->mddata->getDataFromTblWhere('tbl_dm_forwarder_legal', 'id_forwarder', $this->uri->segment(4));
$this->load->view('top', $data);
$this->load->view('dm/forwarder_view_legal', $data);
break;
default:
redirect('site/');
break;
}
}

function agent()
{
	$data['ac'] = "dm_agent";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['agent'] = $this->mddata->getAllDataTbl('tbl_dm_agent');
		$this->load->view('top', $data);
		$this->load->view('dm/agent_view', $data);
		break;
		case 'subfield':
		$data['agent'] = $this->mddata->getDataFromTblWhere('tbl_dm_agent_subfield','id_agent', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('dm/agent_view_subfield', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('dm/agent_add', $data);
		break;
		case 'add_subfield':
		$this->load->view('top', $data);
		$this->load->view('dm/agent_add_subfield', $data);
		break;
		case 'save':
		$data = array(
			'agent_id' => $this->input->post('agent_id'),
			'name' => $this->input->post('name'),
			'service' => $this->input->post('service'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'fax' => $this->input->post('fax'),
			'website' => $this->input->post('website'),
			'email' => $this->input->post('email'),
			'note' => $this->input->post('note'),
			);
		$this->mddata->insertIntoTbl('tbl_dm_agent', $data);
		$this->session->set_flashdata('data', 'Data has been saved');
		redirect('dm/agent/view');
		break;
		case 'save_subfield':
		$data = array(
			'id_agent' => $this->uri->segment(4),
			'pic' => $this->input->post('pic'),
			'title' => $this->input->post('title'),
			'email_pic' => $this->input->post('email_pic'),
			'mobile1' => $this->input->post('mobile1'),
			'mobile2' => $this->input->post('mobile2'),
			'residence' => $this->input->post('residence'),
			'birthday' => $this->input->post('birthday'),
			'whatsapp' => $this->input->post('whatsapp'),
			'skype' => $this->input->post('skype'),
			'bbm' => $this->input->post('bbm'),
			);
		$this->mddata->insertIntoTbl('tbl_dm_agent_subfield', $data);
		$this->session->set_flashdata('data', 'Data has been saved');
		redirect('dm/agent/subfield/'.$this->uri->segment(4));
		break;
		case 'delete':
		$this->mddata->deleteTblData('tbl_dm_agent', $this->uri->segment(4));
		redirect('dm/agent/view');
		break;
		case 'edit':
		$data['agent'] = $this->mddata->getDataFromTblWhere('tbl_dm_agent', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('dm/agent_edit', $data);
		break;
		case 'edit_subfield':
		$data['customer'] = $this->mddata->getDataFromTblWhere('tbl_dm_agent_subfield', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('dm/agent_edit_subfield', $data);
		break;
		case 'update_subfield':
		$data = array(
			'pic' => $this->input->post('pic'),
			'title' => $this->input->post('title'),
			'email_pic' => $this->input->post('email_pic'),
			'mobile1' => $this->input->post('mobile1'),
			'mobile2' => $this->input->post('mobile2'),
			'residence' => $this->input->post('residence'),
			'birthday' => $this->input->post('birthday'),
			'whatsapp' => $this->input->post('whatsapp'),
			'skype' => $this->input->post('skype'),
			'bbm' => $this->input->post('bbm'),
			);
		$this->mddata->updateDataTbl('tbl_dm_agent_subfield', $data, 'id', $this->uri->segment(4));
		$this->session->set_flashdata('data', 'Data has been saved');
		redirect('dm/agent/view/');
		break;
		case 'update':
		$data = array(
			'agent_id' => $this->input->post('agent_id'),
			'name' => $this->input->post('name'),
			'service' => $this->input->post('service'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'fax' => $this->input->post('fax'),
			'website' => $this->input->post('website'),
			'email' => $this->input->post('email'),
			'note' => $this->input->post('note'),
			);
		$this->mddata->updateDataTbl('tbl_dm_agent', $data, 'id', $this->uri->segment(4));
		redirect('dm/agent/view');
		break;
		case 'delete_subfield':
		$this->mddata->deleteTblData('tbl_dm_agent_subfield', $this->uri->segment(4));
		redirect('dm/agent/view');
		break;
		default:
		redirect('site/');
		break;
	}
}

function personnel()
{
	$data['ac'] = "dm_personnel";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['personnel'] = $this->mddata->getAllDataTbl('tbl_dm_personnel');
		$this->load->view('top', $data);
		$this->load->view('dm/personnel_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('dm/personnel_add', $data);
		break;
		case 'save':
		print_r($_POST);
		$dir = "image/personnel/";
		$file = $dir . $_FILES['image']['name'];
		if(move_uploaded_file($_FILES['image']['tmp_name'], $file))
		{
			$data = array(
				'id_personnel' => $this->input->post('id_personnel'),
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'join_date' => $this->input->post('join_date'),
				'join_date_div' => $this->input->post('join_date_div'),
				'residence' => $this->input->post('residence'),
				'phone' => $this->input->post('phone'),
				'mobile1' => $this->input->post('mobile1'),
				'mobile2' => $this->input->post('mobile2'),
				'whatsapp' => $this->input->post('whatsapp'),
				'bbm' => $this->input->post('bbm'),
				'image' => $file,
				);
			$this->mddata->insertIntoTbl('tbl_dm_personnel', $data);
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect('dm/personnel/add');
		} else {
			$this->session->set_flashdata('data','Please Attach Photo');
			redirect('dm/personnel/add');
		}
		break;
		case 'edit':
		$data['personnel'] = $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('dm/personnel_edit', $data);
		break;
		case 'update':
		$dir = "image/personnel/";
		$file = $dir . $_FILES['image']['name'];
		if(move_uploaded_file($_FILES['image']['tmp_name'], $file))
		{
			$data = array(
				'id_personnel' => $this->input->post('id_personnel'),
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'join_date' => $this->input->post('join_date'),
				'join_date_div' => $this->input->post('join_date_div'),
				'residence' => $this->input->post('residence'),
				'phone' => $this->input->post('phone'),
				'mobile1' => $this->input->post('mobile1'),
				'mobile2' => $this->input->post('mobile2'),
				'whatsapp' => $this->input->post('whatsapp'),
				'bbm' => $this->input->post('bbm'),
				'image' => $file,
				);
			$this->mddata->updateDataTbl('tbl_dm_personnel', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect('dm/personnel/view');
		} else {
			$data = array(
				'id_personnel' => $this->input->post('id_personnel'),
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'join_date' => $this->input->post('join_date'),
				'join_date_div' => $this->input->post('join_date_div'),
				'residence' => $this->input->post('residence'),
				'phone' => $this->input->post('phone'),
				'mobile1' => $this->input->post('mobile1'),
				'mobile2' => $this->input->post('mobile2'),
				'whatsapp' => $this->input->post('whatsapp'),
				'bbm' => $this->input->post('bbm'),
				);
			$this->mddata->updateDataTbl('tbl_dm_personnel', $data, 'id', $this->uri->segment(4));
			$this->session->set_flashdata('data','Data Has Been Saved');
			redirect('dm/personnel/view');
		}
		break;
		case 'delete':
		$this->mddata->deleteTblData('tbl_dm_personnel', $this->uri->segment(4));
		redirect('dm/personnel/view');
		break;
		case 'getDataPersonel':
		$id = $_POST['id'];
		$data = $this->mddata->getDataFromTblWhere('tbl_position', 'id', $id)->row();
		$json = json_encode($data);
		echo $json;
		break;
		case 'getAllPersonel':
		$data = $this->mddata->getAllDataTbl('tbl_dm_personnel')->result();
		$json = json_encode($data);
		echo $json;
		break;
	}
}

function item()
{
	$data['ac'] = "dm_item";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['item'] = $this->mddata->getAllDataTbl('tbl_dm_item');
		$this->load->view('top', $data);
		$this->load->view('dm/item_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('dm/item_add', $data);
		break;
		case 'save':
		$dir = "image/item/";
		$filepic = "";
		$filebro = "";
		$filespe = "";
		if($_FILES['gam']['size'][0] > 0)
		{
			$filepic = $dir . $_FILES['gam']['name'][0];
			move_uploaded_file($_FILES['gam']['tmp_name'][0], $filepic);
		}
		if($_FILES['gam']['size'][1] > 0)
		{
			$filebro = $dir . $_FILES['gam']['name'][1];
			move_uploaded_file($_FILES['gam']['tmp_name'][1], $filebro);
		}
		if($_FILES['gam']['size'][2] > 0)
		{
			$filespe = $dir . $_FILES['gam']['name'][2];
			move_uploaded_file($_FILES['gam']['tmp_name'][2], $filespe);
		}
		$data = array(
			'code' => $this->input->post('code'), 
			'devisi' => $this->input->post('devisi'), 
			'kategori' => $this->input->post('kategori'), 
			'nama' => $this->input->post('nama'), 
			'sat' => $this->input->post('sat'),
			'merk' => $this->input->post('merk'),
			'dimension' => $this->input->post('dimension'),
			'weight' => $this->input->post('weight'),
			'weight_note' => $this->input->post('weight_note'),
			'id_hs' => $this->input->post('id_hs'),
			'tax' => $this->input->post('tax'),
			'catatan' => $this->input->post('catatan'),
			'picture' => $filepic,
			'brochure' => $filebro,
			'spek' => $filespe,
			);
		$this->mddata->insertIntoTbl('tbl_dm_item', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['item'] = $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('dm/item_edit', $data);
		break;
		case 'update':
		$dir = "image/item/";
		$filepic = "";
		$filebro = "";
		$filespe = "";
		if($_FILES['gam']['size'][0] > 0)
		{
			$filepic = $dir . $_FILES['gam']['name'][0];
			move_uploaded_file($_FILES['gam']['tmp_name'][0], $filepic);
		}
		if($_FILES['gam']['size'][1] > 0)
		{
			$filebro = $dir . $_FILES['gam']['name'][1];
			move_uploaded_file($_FILES['gam']['tmp_name'][1], $filebro);
		}
		if($_FILES['gam']['size'][2] > 0)
		{
			$filespe = $dir . $_FILES['gam']['name'][2];
			move_uploaded_file($_FILES['gam']['tmp_name'][2], $filespe);
		}
		$data = array(
			'code' => $this->input->post('code'), 
			'devisi' => $this->input->post('devisi'), 
			'kategori' => $this->input->post('kategori'), 
			'nama' => $this->input->post('nama'), 
			'sat' => $this->input->post('sat'),
			'merk' => $this->input->post('merk'),
			'dimension' => $this->input->post('dimension'),
			'weight' => $this->input->post('weight'),
			'weight_note' => $this->input->post('weight_note'),
			'id_hs' => $this->input->post('id_hs'),
			'tax' => $this->input->post('tax'),
			'catatan' => $this->input->post('catatan'),
			);
		if($filepic != "")
		{
			$data['picture'] = $filepic;
		}
		if($filebro != "")
		{
			$data['brochure'] = $filepic;
		}
		if($filespe != "")
		{
			$data['spek'] = $filespe;
		}
		$this->mddata->updateDataTbl('tbl_dm_item', $data, 'id', $this->uri->segment(4));
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteTblData('tbl_dm_item', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'subfield':
		$data['item'] = $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('dm/item_view_subfield', $data);
		break;
		case'get_field':
		$id = $_POST['id'];
		$data = $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $id)->row();
		$json = json_encode($data);
		echo $json;
		break;
		case 'get_item':
		$id = $_POST['id'];
		$data = $this->mddata->getDataFromTblWhere('tbl_dm_item', 'id', $id)->row();
		$json = json_encode($data);
		echo $json;
		break;
	}
}

function budget()
{
	$data['ac'] = "dm_budget";
	switch($this->uri->segment(3))
	{
		case 'view':
		$data['budget'] = $this->mddata->getAllDataTbl('tbl_dm_budget');
		$this->load->view('top', $data);
		$this->load->view('dm/budget_view', $data);
		break;
		case 'add':
		$this->load->view('top', $data);
		$this->load->view('dm/budget_add', $data);
		break;
		case 'save':
		$data = array(
			'code' => $this->input->post('code'), 
			'main' => $this->input->post('main'), 
			'level1' => $this->input->post('level1'), 
			'level2' => $this->input->post('level2'), 
			'description' => $this->input->post('description'),
			);
		$this->mddata->insertIntoTbl('tbl_dm_budget', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
		$data['budget'] = $this->mddata->getDataFromTblWhere('tbl_dm_budget', 'id', $this->uri->segment(4));
		$this->load->view('top', $data);
		$this->load->view('dm/budget_edit', $data);
		break;
		case 'update':
		$data = array(
			'code' => $this->input->post('code'), 
			'main' => $this->input->post('main'), 
			'level1' => $this->input->post('level1'), 
			'level2' => $this->input->post('level2'), 
			'description' => $this->input->post('description'),
			);
		$this->mddata->updateDataTbl('tbl_dm_budget', $data, 'id', $this->uri->segment(4));
		$this->session->set_flashdata('data','Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteTblData('tbl_dm_budget', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case'get_field':
		$id = $_POST['id'];
		$data = $this->mddata->getDataFromTblWhere('tbl_dm_budget', 'id', $id)->row();
		$json = json_encode($data);
		echo $json;
		break;
	}
}
}