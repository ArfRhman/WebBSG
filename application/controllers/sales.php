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
	function dashboard()
	{
		$data['ac'] = "s_dashboard";
		switch($this->uri->segment(3))
		{
			case 'forecast':
			$data['ac'] = "s_ds_forecast";
			$forecast = $this->mddata->getForecast();
			$maxF=2016;
			foreach($forecast as $f){
				if(intval($f['period'])>$maxF){
					$maxF=$f['period'];
				}
			}

			$so = $this->mddata->getQtySo();

			foreach($so as $s){
				if(intval($s['period'])>$maxF){
					$maxF=$s['period'];
				}	
			}

			$dataFo = array();
			$dataSo = array();
			$dataOperator = array();
			
			for($i=2016;$i<=$maxF;$i++){
				$dataFo[$i]=array(
					'name' => $i,
					'y' => 0,
					'drilldown' => ''.$i.''
					);
				
				$opFo[$i] = array(
					'name' => ''.$i.'',
					'type' => 'pie',
					'id' => ''.$i.'',
					'data'=> array()
					);
			}
			$dataSo = $dataFo;

			foreach($forecast as $f){
				$dataFo[$f['period']]['y']+=intval($f['y']);
			}

			foreach($so as $s){
				$dataSo[$s['period']]['y']+=intval($s['qty']);
			}
			
			
			$forecastOp = $this->mddata->getForecastOp();
			$soOp = $this->mddata->getSoOp();

			foreach ($forecastOp as $f) {
				$opFo[$f['period']]['data'][$f['operator'].'f']['name']='Forecast - '.$f['name'];
				$opFo[$f['period']]['data'][$f['operator'].'f']['y']=intval($f['y']);
				$opFo[$f['period']]['data'][$f['operator'].'f']['drilldown']=$f['name'];
				$opFo[$f['period']]['data'][$f['operator'].'f']['color']='#7CB5EC';
			}
			
			foreach($soOp as $s){
				$opFo[$s['period']]['data'][$s['operator'].'s']['name']='SO - '.$s['name'];
				$opFo[$s['period']]['data'][$s['operator'].'s']['y']=intval($s['y']);
				$opFo[$s['period']]['data'][$s['operator'].'s']['color']='#434348';	
			}

			$res = array();
			
			foreach($opFo as $key => $r){
				$res[$key]['name']=$r['name'];
				$res[$key]['type']=$r['type'];
				$res[$key]['id']=$r['id'];
				$res[$key]['data']=array_values($r['data']);
			}
			
			$data['Fo']=array_values($dataFo);
			$data['So']=array_values($dataSo);
			$data['drill_op']=array_values($res);
			$this->load->view('top', $data);
			$this->load->view('sales/ds_forecast_view', $data);
			break;
			case 'period':
			$data['ac'] = "s_ds_period";
			$data['ds'] = $this->mddata->getAllDataTbl('tbl_sale_internal_memo');
			$this->load->view('top', $data);
			$this->load->view('sales/ds_period_view', $data);
			break;
			case 'product':
			$data['ac'] = "s_ds_product";
			$pro = $this->mddata->getDsProduct();
			$dataPro=array();
			foreach($pro as $p){
				$dataPro[$p['kategori']]['name']=$p['kategori'];
				$dataPro[$p['kategori']]['y']=intval($p['y']);
			}
			$slice = array_slice($dataPro, 0, 4);
			$other = array_slice($dataPro, 5, count($dataPro));
			$new = array(
				'name' => 'Others',
				'y'=>0
				);
			foreach($other as $ot){
				$new['y']+=$ot['y'];
			}
			$slice[]=$new;
			$data['data']=json_encode(array_values($slice));
			$this->load->view('top', $data);
			$this->load->view('sales/ds_product_view', $data);
			break;
			case 'product_profit':
			$res = $this->mddata->getProVsProfit($this->uri->segment(4));
			$data = array();
			$total=0;
			$qty=0;
			foreach($res as $r){
				$total+=$r['diff'];
				$qty+=$r['jum'];
			}
			foreach($res as $r){
				$data[$r['item_id']]['name']=$r['item_name'];
				$data[$r['item_id']]['data']=array();
				$data[$r['item_id']]['data']['y']=intval($r['diff']);
				$data[$r['item_id']]['data']['myData']=array(intval($r['jum']),intval($r['diff']),($r['jum']/$qty)*100,($r['diff']/$total)*100);
			}
			$slice = array_slice($data,0,8);
			$other = array_slice($data,9,count($data));
			$new = array(
				'name'=> 'Others',
				'data'=> array(
					'y'=>0,
					'myData'=>array(0,0,0,0)
					)
				);
			foreach($other as $o){
				$new['data']['y']+=$o['diff'];
				$new['data']['myData'][0]+=intval($o['jum']);
				$new['data']['myData'][1]+=intval($o['diff']);
			}
			$new['data']['myData'][2]=($new['data']['myData'][0]/$qty)*100;
			$new['data']['myData'][3]=($new['data']['myData'][1]/$total)*100;
			$slice[]=$new;
			foreach($slice as $k=>$s){
				$slice[$k]['data']=array($s['data']);
			}
			print(json_encode(array_values($slice)));
			break;
			case 'am':
			$data['ac'] = "s_ds_am";
			$this->load->view('top', $data);
			$this->load->view('sales/ds_am_view', $data);
			break;
			case 'getAmOp':
			$amOp=$this->mddata->getAmOperator($this->uri->segment(4));
			$dataOp = array();
			foreach($amOp as $o){
				$dataOp[$o['operator']]['name']=$o['name'];
				$dataOp[$o['operator']]['y']=intval($o['y']);
			}
			$slice = array_slice($dataOp, 0, 4);
			$other = array_slice($dataOp, 5, count($dataOp));
			$new = array(
				'name' => 'Others',
				'y'=>0
				);
			foreach($other as $ot){
				$new['y']+=$ot['y'];
			}
			$slice[]=$new;
			print(json_encode(array_values($slice)));
			break;
			case 'getAmCust':
			$customer=$this->mddata->getAmCust($this->uri->segment(4));
			$dataCust = array();
			foreach($customer as $c){
				$dataCust[$c['customer_id']]['name']=$c['name'];
				$dataCust[$c['customer_id']]['y']=intval($c['y']);
			}
			$slice = array_slice($dataCust, 0, 8);
			$other = array_slice($dataCust, 9, count($dataCust));
			$new = array(
				'name' => 'Others',
				'y'=>0
				);
			foreach($other as $ot){
				$new['y']+=$ot['y'];
			}
			$slice[]=$new;
			print(json_encode(array_values($slice)));
			break;
			case 'customer':
			$data['ac'] = "s_customer_am";
			$op = $this->mddata->getCustomerOperator($this->uri->segment(4));
			$dataOp = array();
			foreach($op as $o){
				$dataOp[$o['operator']]['name']=$o['name'];
				$dataOp[$o['operator']]['y']=intval($o['y']);
			}
			$data['op']=json_encode(array_values($dataOp));
			$this->load->view('top', $data);
			$this->load->view('sales/ds_customer_view', $data);
			break;
			case 'getCustomerOp':
			$dataOp = array();
			$op = $this->mddata->getCustomerOperator($this->uri->segment(4));
			foreach($op as $o){
				$dataOp[$o['operator']]['name']=$o['name'];
				$dataOp[$o['operator']]['y']=intval($o['y']);
			}
			//$data['op']=json_encode(array_values($dataOp));
			print(json_encode(array_values($dataOp)));
			break;
			case 'getCustomerCust':
			$customer = $this->mddata->getCustomerCust();
			$dataCust = array();
			foreach($customer as $c){
				$dataCust[$c['customer_id']]['name']=$c['name'];
				$dataCust[$c['customer_id']]['y']=intval($c['y']);
			}
			$slice = array_slice($dataCust, 0, 8);
			$other = array_slice($dataCust, 9, count($dataCust));
			$new = array(
				'name' => 'Others',
				'y'=>0
				);
			foreach($other as $ot){
				$new['y']+=$ot['y'];
			}
			$slice[]=$new;
			print(json_encode(array_values($slice)));
			break;
			case 'profit':
			$data['ac'] = "s_profit_am";
			$ds = $this->mddata->getDsProfitByYear();
			$end = array();
			$end['total']=array(
				'name' => 'Target',
				'data' => array()
				);
			$end['total_so']=array(
				'name' => 'SO',
				'data' => array()
				);
			$end['total_invoice']=array(
				'name' => 'Invoice',
				'data' => array()
				);
			$end['cogs']=array(
				'name' => 'COGS',
				'data' => array()
				);

			foreach ($ds as $d) {
				$end['total']['data'][$d['periode']]['y']=intval($d['total']);
				$end['total_so']['data'][$d['periode']]['y']=intval($d['total_so']);
				$end['total_invoice']['data'][$d['periode']]['y']=intval($d['total_invoice']);
				$end['cogs']['data'][$d['periode']]['y']=intval($d['cogs']);
				$end['total_so']['data'][$d['periode']]['myData']=array(intval($d['cogs']-$d['total_so']),intval($d['direct_cost']),intval(4),intval(($d['cogs']-$d['total_so'])-$d['direct_cost']+5));
				$end['total_invoice']['data'][$d['periode']]['myData']=array(intval($d['cogs']-$d['total_so']),intval($d['direct_cost']),intval(4),intval(($d['cogs']-$d['total_so'])-$d['direct_cost']+5));
				$end['cogs']['data'][$d['periode']]['myData']=array(intval($d['cogs']-$d['total_so']),intval($d['direct_cost']),intval(4),intval(($d['cogs']-$d['total_so'])-$d['direct_cost']+5));
				$end['total']['data'][$d['periode']]['myData']=array(intval($d['cogs']-$d['total_so']),intval($d['direct_cost']),intval(4),intval(($d['cogs']-$d['total_so'])-$d['direct_cost']+5));
			}
			print_r($end);
			//print_r(json_encode(array_values($end)));
			//die();
			$this->load->view('top', $data);
			$this->load->view('sales/ds_profit_view', $data);
			break;
			case 'ar':
			$data['ac'] = "s_ar_am";
			$res = $this->mddata->getArPerformance();
			$ha=array();
			$periode=array();
			$invoice=array();
			$paid=array();
			$out=array();
			foreach($res as $r){
				$periode[$r['period']]=$r['period'];
				if(!array_key_exists($r['period'], $invoice)){
					$invoice[$r['period']]=intval($r['invoiced']);
					$paid[$r['period']]=intval($r['paid']);
					$out[$r['period']]=intval($invoice[$r['period']]-$paid[$r['period']]);
				}else{
					$invoice[$r['period']]+=intval($r['invoiced']);
					$paid[$r['period']]+=intval($r['paid']);
					$out[$r['period']]=intval($invoice[$r['period']]-$paid[$r['period']]);
				}
			}
			// print_r($res);
			// print_r($invoice);
			// print_r($paid);
			// print_r($out);
			//die();
			$data['period']=json_encode(array_values($periode));
			$data['invoice']=json_encode(array_values($invoice));
			$data['paid']=json_encode(array_values($paid));
			$data['out']=json_encode(array_values($out));
			$this->load->view('top', $data);
			$this->load->view('sales/ds_ar_view', $data);
			break;
			case 'stock':
			$data['ac'] = "s_stock_am";
			$data['ds'] = $this->mddata->getAllDataTbl('tbl_sale_internal_memo');
			$this->load->view('top', $data);
			$this->load->view('sales/ds_stock_view', $data);
			break;
		}
	}
	function brief()
	{
		$data['ac'] = "s_brief";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['ds'] = $this->mddata->getAllDataTbl('tbl_sale_short_brief')->row();
			$this->load->view('top', $data);
			$this->load->view('sales/brief_view', $data);
			break;
			case 'update':
			$p = $this->input->post();
			$this->mddata->updateDataBrief($p['brief']);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
		}
	}
	function structure(){
		$data['ac'] = "s_structure";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['st'] = $this->mddata->getDataStructureSales();
			$this->load->view('top', $data);
			$this->load->view('sales/structure_view', $data);
			break;
		}
	}
	function jobdesc()
	{
		$data['ac'] = "s_jobdesc";
		switch($this->uri->segment(3))
		{
			case 'view':
			$data['jd'] = $this->mddata->getAllDataTbl('tbl_sale_jobdesc');
			$this->load->view('top', $data);
			$this->load->view('sales/jobdesc_view', $data);
			break;
			case 'add':
			$this->load->view('top', $data);
			$this->load->view('sales/jobdesc_add', $data);
			break;
			case 'save':
			$dir = "image/s_jobdesc/";
			$file1 = $dir . $_FILES['file1']['name'];
			$file2 = $dir . $_FILES['file2']['name'];
			$data = array(
				'am' => $this->input->post('jd_am'),
				'fungsi' => $this->input->post('jd_fungsi'),
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
			$this->mddata->insertIntoTbl('tbl_sale_jobdesc', $data);
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'edit':
			$data['jd'] = $this->mddata->getDataFromTblWhere('tbl_sale_jobdesc', 'no', $this->uri->segment(4));
			$this->load->view('top', $data);
			$this->load->view('sales/jobdesc_edit', $data);
			break;
			case 'update':
			$dir = "image/s_jobdesc/";
			$file1 = $dir . $_FILES['file1']['name'];
			$file2 = $dir . $_FILES['file2']['name'];
			$data = array(
				'am' => $this->input->post('jd_am'),
				'fungsi' => $this->input->post('jd_fungsi'),
				);
			if(move_uploaded_file($_FILES['file1']['tmp_name'], $file1))
			{
				$data['jobdesc'] = $file1;
			}
			if(move_uploaded_file($_FILES['file2']['tmp_name'], $file2))
			{
				$data['kpi'] = $file2;
			}
			$this->mddata->updateDataTbl('tbl_sale_jobdesc',$data,'no',$this->input->post('no'));
			$this->session->set_flashdata('data', 'Data Has Been Saved');
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'delete':
			$this->mddata->deleteGeneral('tbl_sale_jobdesc','no', $this->uri->segment(4));
			redirect($_SERVER['HTTP_REFERER']);
			break;
			case 'addPosition':
			$am = $_POST['id'];
			$pos = $_POST['pos'];
			$par = $_POST['par'];
			$data = array(
				'am' => $am,
				'fungsi' => $pos,
				'parent' => $par,
				);
			$this->mddata->insertIntoTbl('tbl_sale_jobdesc', $data);
			echo "1";
			break;
			case 'deletePosition':
			
			$this->mddata->deleteGeneral('tbl_sale_jobdesc','no', $_POST['id']);
			echo "1";
			break;
		}
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
	'nett' => $this->input->post('price') - $this->input->post('disc'), 
	'total' => $this->input->post('price') * $this->input->post('qty'), 
	'delivery' => $this->input->post('delivery'),
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
	'debit_note_amount'=>$this->input->post('debit_note')
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
	'nett' => $this->input->post('price') - $this->input->post('disc'), 
	'total' => $this->input->post('price') * $this->input->post('qty'), 
	'delivery' => $this->input->post('delivery'), 
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
	'debit_note_amount'=>$this->input->post('debit_note')
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
case 'profit_analisis':
$data['data'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			inv.amount,
			NO,
			date,
			due,
			received_date,
			inv.date AS inv_date,
			inv. NO AS inv_no,
			payment_date,
			sales,
			extcom_pro,
			bank,
			transport,
			adm,
			other,
			(
				SELECT
				SUM(grand_total)
				FROM
				tbl_sale_so_detail d
				WHERE
				d.id_so = so.id
				) AS total_so,
		(
			SELECT
			SUM(DDP_IDR)
			FROM
			tbl_op_price_list pl
			WHERE
			pl.item_id IN (
				SELECT
				item
				FROM
				tbl_sale_so_detail dt
				WHERE
				dt.id_so = so.id
				)
		) AS total_purchase, adjustment
		FROM
		tbl_sale_so so
		LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
		LEFT JOIN tbl_sale_so_cost c ON c.id_so = so.id
		WHERE so.id = ".$this->uri->segment(4)."")->row();
$this->load->view('top', $data);
$this->load->view('sales/so_profit_analisis', $data);
break;
case 'update_adjusment':
$id = $this->input->post('id');
	$data = array('adjustment' => $this->input->post('adjustment'));
$this->mddata->updateDataTbl('tbl_sale_so', $data, 'id', $id);
$this->session->set_flashdata('data','Data Has Been Saved');
redirect($_SERVER['HTTP_REFERER']);
	break;
	case 'getItemPrice':
$id = $_POST['id'];
$id_so = $_POST['id_so'];
$data = $this->db->query("SELECT * FROM tbl_sale_so_detail WHERE id_so = $id_so AND item = $id")->row();
$json = json_encode($data);
echo $json;
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
		$dat=array();	

		if($_POST){
			$p=$this->input->post();
			$from = str_replace("/", "-", $p['from']);
			$d_from = date('Y-m-d',strtotime($from));
			$to = str_replace("/", "-", $p['to']);
			$d_to = date('Y-m-d',strtotime($to));

			$query = $this->mddata->getVisit($p['visit_am'],$d_from,$d_to);
			foreach ($query as $k) {
				if(!array_key_exists($k['company_to_visit'], $dat)){
					$dat[$k['company_to_visit']]=$k;
					$dat[$k['company_to_visit']]['total']=1;
					$dat[$k['company_to_visit']]['from']=$p['from'];
					$dat[$k['company_to_visit']]['to']=$p['to'];
				}else{
					$dat[$k['company_to_visit']]['total']+=1;
				}
			}
		}
		$g = $this->mddata->getVisitBar();
		$am = array();
		$val= array();
		foreach ($g as $m) {
			$data_am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel', 'id', $m['am'])->row();
			if(!array_key_exists($m['am'], $am)){
				$am[$m['am']]=$data_am->name;
			}
		}
		foreach ($g as $m) {
			if(!array_key_exists($m['am'], $val)){
				$val[$m['am']]=1;
			}else{
				$val[$m['am']]+=1;
			}
		}
		$data['res']=$dat;
		$data['am']=$am;
		$data['val']=$val;
		
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
		case 'save':
		$p=$this->input->post();
		$data=array(
			'visit_date' => $p['visit_date'],
			'am' => $p['visit_am'],
			'accompanied_by' => $p['visit_accompanied_by'],
			'company_to_visit' => $p['visit_company'],
			'person_to_visit' => $p['visit_person'],
			'people_of_PTV' => $p['visit_people'],
			'purpose_of_visit' => $p['visit_purpose'],
			'result_of_visit' => $p['visit_result']
			);
		$this->mddata->insertIntoTbl('tbl_sale_customer_visit', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'edit':								
		$this->load->view('top', $data);				
		$this->load->view('sales/visit_edit', $data);								
		break;
	}
}
function policies()
{
	$data['ac'] = "s_policies";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['sale'] = $this->mddata->getAllDataTbl('tbl_sale_policies');
		$this->load->view('top', $data);
		$this->load->view('sales/policies_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/policies_add', $data);								
		break;
		case 'edit':
		$data['poli'] = $this->mddata->getDataFromTblWhere('tbl_sale_policies', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);				
		$this->load->view('sales/policies_edit', $data);								
		break;
		case 'save':
		$dir = "image/s_policies/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data = array(
			'policy_no' => $p['policies_no'],
			'policy_date' => $p['policies_date'],
			'policy_type' => $p['policies_type'],
			'description' => $p['policies_desc'],
			'date_of_issued' => $p['policies_date_issued'],
			'date_of_expired' => $p['policies_date_expired'],
			'remark' => $p['policies_remark']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_sale_policies', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$dir = "image/s_policies/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data = array(
			'policy_no' => $p['policies_no'],
			'policy_date' => $p['policies_date'],
			'policy_type' => $p['policies_type'],
			'description' => $p['policies_desc'],
			'date_of_issued' => $p['policies_date_issued'],
			'date_of_expired' => $p['policies_date_expired'],
			'remark' => $p['policies_remark']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_sale_policies', $data, 'no', $p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_policies','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
function sop()
{
	$data['ac'] = "s_sop";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['sop'] = $this->mddata->getAllDataTbl('tbl_sale_sales_sop');
		$this->load->view('top', $data);
		$this->load->view('sales/sop_view', $data);
		break;			
		case 'add':								
		$this->load->view('top', $data);				
		$this->load->view('sales/sop_add', $data);								
		break;
		case 'edit':								
		$data['sop'] = $this->mddata->getDataFromTblWhere('tbl_sale_sales_sop', 'no', $this->uri->segment(4))->row();
		$this->load->view('top', $data);				
		$this->load->view('sales/sop_edit', $data);								
		break;
		case 'save':
		$dir = "image/s_sop/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data = array(
			'sop_no' => $p['sop_no'],
			'sop_date' => $p['sop_date'],
			'description' => $p['desc'],
			'date_of_issued' => $p['date_issued'],
			'date_of_expired' => $p['date_expired'],
			'remark' => $p['remark']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->insertIntoTbl('tbl_sale_sales_sop', $data);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'update':
		$dir = "image/s_sop/";
		$file = $dir . $_FILES['file']['name'];
		$p=$this->input->post();
		$data = array(
			'sop_no' => $p['sop_no'],
			'sop_date' => $p['sop_date'],
			'description' => $p['desc'],
			'date_of_issued' => $p['date_issued'],
			'date_of_expired' => $p['date_expired'],
			'remark' => $p['remark']
			);
		if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
		{
			$data['file'] = $file;
		}
		$this->mddata->updateDataTbl('tbl_sale_sales_sop', $data, 'no', $p['no']);
		$this->session->set_flashdata('data', 'Data Has Been Saved');
		redirect($_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_sales_sop','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
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
		case 'detail':
		$this->load->view('top', $data);
		$this->load->view('sales/target_detail', $data);
		break;
		case 'delete':
		$this->mddata->deleteGeneral('tbl_sale_target','no', $this->uri->segment(4));
		redirect($_SERVER['HTTP_REFERER']);
		break;
	}
}
// BEGIN REPORT
//UBAH - UBAH
function forecast()
{
	$data['ac'] = "s_forecast";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$this->load->view('top', $data);
		$this->load->view('sales/forecast_view', $data);
		break;	
		case 'getCustomer':
		$id = $_POST['id'];
		$data = $this->mddata->getDataFromTblWhere('tbl_sale_target', 'operator', $id)->result();
		foreach ($data as $d) {
			$cust = $this->mddata->getDataFromTblWhere('tbl_dm_customer', 'id', $d->customer)->row();
			echo "<option value=".$cust->id.">".$cust->name."</option>";
		}
		break;
		case 'getOtherData':
		$id = $_POST['id'];
		$target = $this->db->query('SELECT
			SUM(amount) as total
			FROM
			tbl_sale_target
			WHERE
			operator = '.$id
			)->row();
		$so = $this->db->query('SELECT
			SUM(qty) as total
			FROM
			tbl_sale_so_detail
			WHERE
			id_so IN (
				SELECT
				id
				FROM
				tbl_sale_so
				WHERE
				operator ='.$id.'
				)')->row();
		$data = array('forecast'=>$target->total,'order'=>$so->total,'percentage'=>number_format(100*$so->total/$target->total,2,'.','').'%');
		echo json_encode($data);
		break;	
		case'getDataForecast':
		$in = $this->mddata->getDataFromTblWhere('tbl_sale_target','operator',$_POST['id']);
		$no = 1;
		if(count($in)>0){
			foreach($in->result() as $c)
			{
				$am = $this->mddata->getDataFromTblWhere('tbl_dm_personnel','id',$c->a_m)->row();
				$cust = $this->mddata->getDataFromTblWhere('tbl_dm_customer','id',$c->customer)->row();
				$opr = $this->mddata->getDataFromTblWhere('tbl_dm_operator','id',$c->operator)->row();
				$so = $this->mddata->getDataMultiWhere('tbl_sale_so',array('customer_id'=>$c->customer,'operator'=>$c->operator))->row();
				$inv = $this->mddata->getDataFromTblWhere('tbl_sale_so_invoicing','id_so',isset($so->id)?$so->id:'')->row();

				?>
				<tr>
					<td><?php echo $no; $no++;?></td>
					<td><?php echo $opr->name?></td>
					<td><?php echo $cust->name?></td>
					<td><?php echo $am->name?></td>
					<td><?php echo isset($so->so_no)?$so->so_no:''?></td>
					<td><?php echo isset($so->so_date)?$so->so_date:''?></td>
					<td><?php echo isset($inv->no)?$inv->no:''?></td>
					<td><?php echo isset($inv->amount)?$inv->amount:''?></td>

				</tr>
				<?php
			}
		}else
		{
			echo"<tr><td colspan=8>Tidak Ada Data</td></tr>";
		}

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
		case 'detail':
		$data['detail'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			other_status,
			inv.amount,
			no,
			date,
			due,
			received_date,
			payment_date as payment,
			due_date,
			DATEDIFF(STR_TO_DATE(payment_date, '%d %M %Y'),STR_TO_DATE(due_date, '%d %M %Y')) as overdue
			FROM
			tbl_sale_so so
			LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
			LEFT JOIN tbl_sale_so_payment p ON p.id_so = so.id
			WHERE
			am = '".$this->uri->segment(4)."'");
		$this->load->view('top', $data);
		$this->load->view('sales/account_detail', $data);
		break;			
	}
}
function customer()
{
	$data['ac'] = "s_customer";
	switch($this->uri->segment(3))		
	{
		case 'view':
		$data['data'] = $this->mddata->getAllDataTbl('tbl_dm_customer');
		$this->load->view('top', $data);
		$this->load->view('sales/customer_view', $data);
		break;	
		case 'detail':
		$data['detail'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			other_status,
			inv.amount,
			no,
			date,
			due,
			received_date,
			payment_date as payment,
			due_date,
			DATEDIFF(STR_TO_DATE(payment_date, '%d %M %Y'),STR_TO_DATE(due_date, '%d %M %Y')) as overdue
			FROM
			tbl_sale_so so
			LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
			LEFT JOIN tbl_sale_so_payment p ON p.id_so = so.id
			WHERE
			customer_id = '".$this->uri->segment(4)."'");
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
		case 'detail':
		$data['data'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			inv.amount,
			NO,
			date,
			due,
			received_date,
			inv.date AS inv_date,
			inv. NO AS inv_no,
			payment_date,
			sales,
			extcom_pro,
			bank,
			transport,
			adm,
			other,
			(
				SELECT
				SUM(grand_total)
				FROM
				tbl_sale_so_detail d
				WHERE
				d.id_so = so.id
				) AS total_so,
		(
			SELECT
			SUM(DDP_IDR)
			FROM
			tbl_op_price_list pl
			WHERE
			pl.item_id IN (
				SELECT
				item
				FROM
				tbl_sale_so_detail dt
				WHERE
				dt.id_so = so.id
				)
<<<<<<< 7e99e78e14d952afc8195cd8a85a2f9f749d5175
		) AS total_purchase
=======
		) AS total_purchase, so.adjustment
>>>>>>> 3ad40c454d4089378082ed8fa9401272cd5e727a
		FROM
		tbl_sale_so so
		LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
		LEFT JOIN tbl_sale_so_cost c ON c.id_so = so.id
		WHERE
		SUBSTR(so_date,4,3) = '".date('M',strtotime($this->uri->segment(4)."/1/".date('Y')))."' AND SUBSTR(so_date,8,4)=".date('Y'));
		$this->load->view('top', $data);
		$this->load->view('sales/loss_detail', $data);
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
		case 'detail':
		$data['detail'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			other_status,
			inv.amount,
			no,
			date,
			due,
			received_date,
			payment_date as payment,
			due_date,
			DATEDIFF(STR_TO_DATE(payment_date, '%d %M %Y'),STR_TO_DATE(due_date, '%d %M %Y')) as overdue
			FROM
			tbl_sale_so so
			LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
			LEFT JOIN tbl_sale_so_payment p ON p.id_so = so.id
			WHERE
			SUBSTR(so_date,4,3) = '".date('M',strtotime($this->uri->segment(4)."/1/".date('Y')))."' AND SUBSTR(so_date,8,4)=".date('Y')." ORDER BY overdue DESC");
		$this->load->view('top', $data);
		$this->load->view('sales/ar_detail', $data);
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
		$data['detail'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			other_status,
			inv.amount,
			no,
			date,
			due,
			received_date,
			payment_date as payment,
			due_date,
			DATEDIFF(STR_TO_DATE(payment_date, '%d %M %Y'),STR_TO_DATE(due_date, '%d %M %Y')) as overdue
			FROM
			tbl_sale_so so
			LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
			LEFT JOIN tbl_sale_so_payment p ON p.id_so = so.id
			WHERE
			SUBSTR(so_date,4,3) = '".date('M',strtotime($this->uri->segment(4)."/1/".date('Y')))."' AND SUBSTR(so_date,8,4)=".date('Y'));
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
		$data['data'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			inv.amount,
			NO,
			date,
			due,
			received_date,
			inv.date AS inv_date,
			inv. NO AS inv_no,
			payment_date,
			sales,
			extcom_pro,
			bank,
			transport,
			adm,
			other,
			(
				SELECT
				SUM(grand_total)
				FROM
				tbl_sale_so_detail d
				WHERE
				d.id_so = so.id
				) AS total_so,
		(
			SELECT
			SUM(DDP_IDR)
			FROM
			tbl_op_price_list pl
			WHERE
			pl.item_id IN (
				SELECT
				item
				FROM
				tbl_sale_so_detail dt
				WHERE
				dt.id_so = so.id
				)
		) AS total_purchase, adjustment
		FROM
		tbl_sale_so so
		LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
		LEFT JOIN tbl_sale_so_cost c ON c.id_so = so.id");
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
		$data['data'] = $this->db->query("SELECT
			so_no,
			am,
			division,
			so_date,
			customer_id,
			po_no,
			po_date,
			other_status,
			inv.amount,
			no,
			date,
			due,
			received_date,
			inv.date as inv_date,
			inv.no as inv_no,
			payment_date,
			nett,
			approved,
			through,
			extcom,
			extcom_pro,
			(SELECT SUM(grand_total) FROM tbl_sale_so_detail d WHERE d.id_so =so.id) as total_so
			FROM
			tbl_sale_so so
			LEFT JOIN tbl_sale_so_invoicing inv ON so.id = inv.id_so
			LEFT JOIN tbl_sale_so_cost c ON c.id_so=so.id");
		$this->load->view('top', $data);
		$this->load->view('sales/external_view', $data);
		break;			
	}
}
// END REPORT
}
