<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_data extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('encrypt');
	}

	function generatePassword($str)
	{
		return sha1($str);
	}
	
	function doLogin($email, $password)
	{
		$data = array();
		$query = "select * from `tbl_user` WHERE `username` = '{$email}' AND `password` = '{$password}'";
		$sql = $this->db->query($query);
		if($sql->num_rows() > 0)
		{
			$data['active'] = 1;
			$data['username'] = $sql->row()->username;
			$data['group'] = $sql->row()->id_group;
			$this->session->set_userdata($data);
		} else {
			$data['active'] = 0;
		}
		return $data;
	}
	
	function access($id_group, $code)
	{
		$sql = $this->db->query("select {$code} from tbl_group where id = {$id_group}")->row();
		return $sql;
	}
	
	function getAllDataTbl($tbl)
	{
		return $this->db->get($tbl);
	}
	
	function insertIntoTbl($tbl, $data)
	{
		$this->db->insert($tbl, $data);
	}

	function insertIntoTblWithReturn($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}	
	
	function deleteTblData($tbl, $id)
	{
		$this->db->where('id', $id);
		$this->db->delete($tbl);
	}

	function deleteGeneral($tbl, $field, $id){
		$this->db->where($field, $id);
		$this->db->delete($tbl);	
	}
	
	function getDataFromTblWhere($tbl, $field, $data)
	{
		$this->db->where($field, $data);
		return $this->db->get($tbl);
	}
	
	function updateDataTbl($tbl, $data, $field, $fielddata)
	{
		$this->db->where($field, $fielddata);
		$this->db->update($tbl, $data);
	}

	function getVisit($am,$from,$to){
		$query = $this->db->query("SELECT * from tbl_sale_customer_visit where am = '$am' AND str_to_date(visit_date,'%d %b %Y') BETWEEN '$from' AND '$to'")->result_array();
		return $query;
	}

	function getVisitBar(){
		$m=date('m');
		$query = $this->db->query("SELECT * from tbl_sale_customer_visit where MONTH(str_to_date(visit_date,'%d' '%b' '%Y')) = '$m'")->result_array();
		return $query;
	}

	function getSumAveragePO($id){
		$query = $this->db->query("SELECT * from tbl_op_po_tabel,tbl_op_po_costing where item_code = '$id' AND tbl_op_po_tabel.no_po = tbl_op_po_costing.no_po")->result_array();
		return $query;
	}

	function updateDataBrief($p){
		$query=$this->db->query("UPDATE tbl_sale_short_brief set short_brief ='$p'");
		return $query;
	}

	function updateDataBriefOp($p){
		$query=$this->db->query("UPDATE tbl_op_short_brief set content ='$p'");
		return $query;
	}
	
	function decrom($dec)
	{
		switch($dec)
		{
			case 1:
			$fb = "I";
			break;
			case 2:
			$fb = "II";
			break;
			case 3:
			$fb = "III";
			break;
			case 4:
			$fb = "IV";
			break;
			case 5:
			$fb = "V";
			break;
			case 6:
			$fb = "VI";
			break;
			case 7:
			$fb = "VII";
			break;
			case 8:
			$fb = "VIII";
			break;
			case 9:
			$fb = "IX";
			break;
			case 10:
			$fb = "X";
			break;
			case 11:
			$fb = "XI";
			break;
			case 12:
			$fb = "XII";
			break;
		}
		return $fb;
	}		function decrom_MMM($dec)	{		switch($dec)		{			case 'Jan':				$fb = "I";				break;			case 'Feb':				$fb = "II";				break;			case 'Mar':				$fb = "III";				break;			case 'Apr':				$fb = "IV";				break;			case 'May':				$fb = "V";				break;			case 'Jun':				$fb = "VI";				break;			case 'Jul':				$fb = "VII";				break;			case 'Aug':				$fb = "VIII";				break;			case 'Sep':				$fb = "IX";				break;			case 'Okt':				$fb = "X";				break;			case 'Nov':				$fb = "XI";				break;			case 'Des':				$fb = "XII";				break;		}		return $fb;	}
	function getDataStructure(){
		$sql = $this->db->query("SELECT jd.no AS id,op.name,jd.fungsi_posisi AS position,jd.parent FROM tbl_op_jobdesc_kpi AS jd,tbl_dm_personnel AS op WHERE jd.am = op.id")->result();
		return $sql;
	}
	function getDataStructureSales(){
		$sql = $this->db->query("SELECT jd.no AS id,op.name,jd.fungsi AS position,jd.parent FROM tbl_sale_jobdesc AS jd,tbl_dm_personnel AS op WHERE jd.am = op.id")->result();
		return $sql;
	}
	function getDataMultiWhere($tbl, $where)
	{
		$this->db->where($where);
		return $this->db->get($tbl);
	}

	//[Sales] untu DS Forecast
	function getForecast(){
		$query = $this->db->query("SELECT *,sum(amount) as y, YEAR(str_to_date(periode,'%M %Y')) as period FROM tbl_sale_target where YEAR(str_to_date(periode,'%M %Y')) > 2015 group by period order by y DESC")->result_array();
		return $query;
	}

	function getQtySo(){
		$query = $this->db->query("SELECT *,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost, YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as period from tbl_sale_so,tbl_sale_so_detail where YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) > 2015 AND tbl_sale_so.id = tbl_sale_so_detail.id_so")->result_array();
		return $query;
	}

	function getForecastOp(){
		$query = $this->db->query("SELECT *,sum(amount) as y,YEAR(str_to_date(periode,'%M %Y')) as period FROM tbl_sale_target,tbl_dm_operator where tbl_dm_operator.id = tbl_sale_target.operator group by period, operator order by y DESC")->result_array();
		return $query;
	}

	function getSoOp(){
		$query = $this->db->query("SELECT *,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost,YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as period FROM tbl_sale_so,tbl_sale_so_detail,tbl_dm_operator where tbl_dm_operator.id = tbl_sale_so.operator AND tbl_sale_so_detail.id_so = tbl_sale_so.id group by period, operator")->result_array();
		return $query;
	}

	function getCustoOp($id){
		$query = $this->db->query("SELECT *,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost FROM tbl_sale_so,tbl_sale_so_detail,tbl_dm_operator where tbl_dm_operator.id = tbl_sale_so.operator AND tbl_sale_so_detail.id_so = tbl_sale_so.id AND tbl_sale_so.operator = $id group by customer_id")->result_array();
		return $query;
	}
	//===========================

	function getSupplyDetailPerformance(){
		$query = $this->db->query("SELECT * from tbl_sale_so,tbl_sale_so_delivery where tbl_sale_so.id = tbl_sale_so_delivery.id_so")->result_array();
		return $query;
	}

	//[OP] untuk graph import Cost 
	function getImportCost($year){ //buat ngambil 10 besar
		$query = $this->db->query("SELECT *,count(tbl_dm_item.kategori) as jumlah_kat, tbl_dm_item.kategori as kat
			from tbl_op_po_tabel,
			tbl_op_po_header,
			tbl_dm_item,
			tbl_op_po_lead_time,
			tbl_dm_supplier 
			where tbl_op_po_header.supplier = tbl_dm_supplier.id 
			AND tbl_dm_supplier.kategori = 'overseas' 
			AND tbl_op_po_lead_time.no_po = tbl_op_po_header.no 
			AND tbl_dm_item.id = tbl_op_po_tabel.item_code 
			AND tbl_op_po_tabel.no_po = tbl_op_po_header.no 
			AND YEAR(str_to_date(tbl_op_po_header.po_date,'%d %b %Y')) = '$year' 
			group by tbl_dm_item.kategori order by jumlah_kat DESC limit 0,10")->result_array();
		return $query;
	}

	function getImportCostVal($year,$id){
		$query = $this->db->query("SELECT *	from 
			tbl_op_po_tabel,
			tbl_op_po_header,
			tbl_dm_item,
			tbl_op_po_lead_time,
			tbl_op_po_costing
			where 
			tbl_op_po_costing.no_po = tbl_op_po_header.no 
			AND tbl_op_po_lead_time.no_po = tbl_op_po_header.no 
			AND tbl_dm_item.id = tbl_op_po_tabel.item_code 
			AND tbl_op_po_tabel.no_po = tbl_op_po_header.no 
			AND YEAR(str_to_date(tbl_op_po_header.po_date,'%d %b %Y')) = '$year' 
			AND tbl_dm_item.kategori in ($id)")->result_array();
		return $query;	
	}

	//[OP] untuk dashboard import Performance

	function getImportLeadTimePerformance(){
		$query = $this->db->query("SELECT *,count(tbl_dm_item.kategori) as jumlah_kat, tbl_dm_item.kategori as kat
			from tbl_op_po_tabel,
			tbl_op_po_header,
			tbl_dm_item,
			tbl_op_po_lead_time,
			tbl_dm_supplier 
			where tbl_op_po_header.supplier = tbl_dm_supplier.id 
			AND tbl_dm_supplier.kategori = 'overseas' 
			AND tbl_op_po_lead_time.no_po = tbl_op_po_header.no 
			AND tbl_dm_item.id = tbl_op_po_tabel.item_code 
			AND tbl_op_po_tabel.no_po = tbl_op_po_header.no 
			group by tbl_dm_item.kategori order by jumlah_kat DESC limit 0,10")->result_array();
		return $query;
	}

	function getImportLeadTimePerformanceSea($id){
		$query = $this->db->query("SELECT * from tbl_op_po_tabel,tbl_op_po_header,tbl_dm_item,tbl_op_po_lead_time where tbl_op_po_lead_time.no_po = tbl_op_po_header.no AND tbl_dm_item.id = tbl_op_po_tabel.item_code AND tbl_op_po_tabel.no_po = tbl_op_po_header.no AND kategori in ($id) AND moda = 'Sea'")->result_array();
		return $query;	
	}

	function getImportLeadTimePerformanceAir($id){
		$query = $this->db->query("SELECT * from tbl_op_po_tabel,tbl_op_po_header,tbl_dm_item,tbl_op_po_lead_time where tbl_op_po_lead_time.no_po = tbl_op_po_header.no AND tbl_dm_item.id = tbl_op_po_tabel.item_code AND tbl_op_po_tabel.no_po = tbl_op_po_header.no AND kategori in ($id) AND moda = 'Air'")->result_array();
		return $query;	
	}

	//untuk dashboard target

	function getTargetPeriode(){
		$query = $this->db->query("SELECT YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as tahun from tbl_sale_so,tbl_sale_target where YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = YEAR(str_to_date(tbl_sale_target.periode,'%M %Y')) GROUP BY tahun")->result_array();
		return $query;
	}

	function getTargetYear(){
		$query = $this->db->query("SELECT *, YEAR(str_to_date(periode,'%M %Y')) as periode, sum(amount) as total from tbl_sale_target group by YEAR(str_to_date(periode,'%M %Y'))")->result_array();
		return $query;
	}

	function getTargetQuarterly($p){
		$query = $this->db->query("SELECT *, QUARTER(str_to_date(periode,'%M %Y')) as periode, sum(amount) as total from tbl_sale_target where YEAR(str_to_date(periode,'%M %Y')) = $p group by QUARTER(str_to_date(periode,'%M %Y'))")->result_array();
		return $query;
	}

	function getTargetMonthly($p){
		$query = $this->db->query("SELECT *, MONTH(str_to_date(periode,'%M %Y')) as periode, sum(amount) as total from tbl_sale_target where YEAR(str_to_date(periode,'%M %Y')) = $p group by MONTH(str_to_date(periode,'%M %Y'))")->result_array();
		return $query;
	}

	function getTotalAdjustment(){
		$query = $this->db->query("SELECT sum(adjustment) as adj, YEAR(str_to_date(so_date,'%d %M %Y')) as periode from tbl_sale_so group by periode")->result_array();
		return $query;
	}

	function getTotalAdjustmentQuarterly($p){
		$query = $this->db->query("SELECT sum(adjustment) as adj, QUARTER(str_to_date(so_date,'%d %M %Y')) as periode from tbl_sale_so where YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p group by periode")->result_array();
		return $query;
	}

	function getTotalAdjustmentMonthly($p){
		$query = $this->db->query("SELECT sum(adjustment) as adj, MONTH(str_to_date(so_date,'%d %M %Y')) as periode from tbl_sale_so where YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p group by periode")->result_array();
		return $query;
	}

	function getTotalSoYear(){
		$query = $this->db->query("SELECT *,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost, YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_detail where tbl_sale_so.id=tbl_sale_so_detail.id_so")->result_array();
		return $query;
	}

	function getTotalSoQuarterly($p){
		$query = $this->db->query("SELECT *,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost, QUARTER(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_detail where tbl_sale_so.id=tbl_sale_so_detail.id_so AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}

	function getTotalSoMonthly($p){
		$query = $this->db->query("SELECT *,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost, MONTH(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_detail where tbl_sale_so.id=tbl_sale_so_detail.id_so AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}

	function getTotalInvoiceYear(){
		$query = $this->db->query("SELECT *,YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_invoicing where tbl_sale_so.id=tbl_sale_so_invoicing.id_so")->result_array();
		return $query;
	}

	function getTotalInvoiceQuarterly($p){
		$query = $this->db->query("SELECT *,QUARTER(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_invoicing where tbl_sale_so.id=tbl_sale_so_invoicing.id_so AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}

	function getTotalInvoiceMonthly($p){
		$query = $this->db->query("SELECT *,MONTH(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_invoicing where tbl_sale_so.id=tbl_sale_so_invoicing.id_so AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}

	function getCogsYear(){
		$query = $this->db->query("SELECT *,YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_detail,tbl_op_pl_tabel,tbl_op_pl_header where tbl_sale_so.id=tbl_sale_so_detail.id_so AND tbl_sale_so_detail.item = tbl_op_pl_tabel.item_id AND ((str_to_date(tbl_sale_so.po_date,'%d %M %Y')) between (str_to_date(tbl_op_pl_header.effective_from,'%d %M %Y')) AND (str_to_date(tbl_op_pl_header.effective_fill,'%d %M %Y'))) AND tbl_op_pl_header.no = tbl_op_pl_tabel.pl_no")->result_array();
		return $query;
	}

	function getCogsQuarterly($p){
		$query = $this->db->query("SELECT *,QUARTER(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_detail,tbl_op_pl_tabel,tbl_op_pl_header where tbl_sale_so.id=tbl_sale_so_detail.id_so AND tbl_sale_so_detail.item = tbl_op_pl_tabel.item_id AND ((str_to_date(tbl_sale_so.po_date,'%d %M %Y')) between (str_to_date(tbl_op_pl_header.effective_from,'%d %M %Y')) AND (str_to_date(tbl_op_pl_header.effective_fill,'%d %M %Y'))) AND tbl_op_pl_header.no = tbl_op_pl_tabel.pl_no AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}

	function getCogsMonthly($p){
		$query = $this->db->query("SELECT *,MONTH(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_detail,tbl_op_pl_tabel,tbl_op_pl_header where tbl_sale_so.id=tbl_sale_so_detail.id_so AND tbl_sale_so_detail.item = tbl_op_pl_tabel.item_id AND ((str_to_date(tbl_sale_so.po_date,'%d %M %Y')) between (str_to_date(tbl_op_pl_header.effective_from,'%d %M %Y')) AND (str_to_date(tbl_op_pl_header.effective_fill,'%d %M %Y'))) AND tbl_op_pl_header.no = tbl_op_pl_tabel.pl_no AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}

	function getDirectCostYear(){
		$query = $this->db->query("SELECT *,YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_cost where tbl_sale_so.id=tbl_sale_so_cost.id_so")->result_array();
		return $query;
	}

	function getDirectCostQuarterly($p){
		$query = $this->db->query("SELECT *,QUARTER(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_cost where tbl_sale_so.id=tbl_sale_so_cost.id_so")->result_array();
		return $query;
	}

	function getDirectCostMonthly($p){
		$query = $this->db->query("SELECT *,MONTH(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_cost where tbl_sale_so.id=tbl_sale_so_cost.id_so")->result_array();
		return $query;
	}

	function getPaidYear(){
		$query = $this->db->query("SELECT *,YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_payment where tbl_sale_so.id=tbl_sale_so_payment.id_so")->result_array();
		return $query;
	}

	function getPaidQuarterly($p){
		$query = $this->db->query("SELECT *,QUARTER(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_payment where tbl_sale_so.id=tbl_sale_so_payment.id_so AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}

	function getPaidMonthly($p){
		$query = $this->db->query("SELECT *,MONTH(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) as periode from tbl_sale_so,tbl_sale_so_payment where tbl_sale_so.id=tbl_sale_so_payment.id_so AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %M %Y')) = $p")->result_array();
		return $query;
	}


	//untuk dashboard customer
	function getCustomerOperator($id,$tahun){
		$query = $this->db->query("SELECT operator,name,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost from tbl_sale_so,tbl_dm_operator,tbl_sale_so_detail where tbl_sale_so_detail.id_so=tbl_sale_so.id AND tbl_sale_so.operator = tbl_dm_operator.id AND tbl_sale_so.customer_id = '$id' AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) = '$tahun' group by operator")->result_array();
		return $query;
	}

	function getCustomerCust($tahun){
		$query = $this->db->query("SELECT tbl_sale_so.customer_id,name,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost from tbl_sale_so,tbl_dm_customer,tbl_sale_so_detail where tbl_sale_so_detail.id_so=tbl_sale_so.id AND tbl_sale_so.customer_id = tbl_dm_customer.customer_id AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) = '$tahun' group by customer_id")->result_array();
		return $query;	
	}

	//untuk dashboard sales by AM
	function getAmOperator($id,$tahun){
		$query = $this->db->query("SELECT operator, name, sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost  
			FROM tbl_sale_so, tbl_dm_operator, tbl_sale_so_detail
			WHERE tbl_sale_so_detail.id_so = tbl_sale_so.id
			AND tbl_sale_so.operator = tbl_dm_operator.id
			AND am ='$id' 
			AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) = $tahun 
			GROUP BY operator")->result_array();
		return $query;
	}

	function getAmCust($id,$tahun){
		$query = $this->db->query("SELECT tbl_sale_so.customer_id,name,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost from tbl_sale_so,tbl_dm_customer,tbl_sale_so_detail where tbl_sale_so_detail.id_so=tbl_sale_so.id AND tbl_sale_so.customer_id = tbl_dm_customer.customer_id  AND am = '$id' AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) = $tahun group by customer_id")->result_array();
		return $query;
	}

	//[Sales] untuk dashboard product
	function getDsProduct($tahun){
		$query = $this->db->query("SELECT kategori,sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost from tbl_sale_so_detail,tbl_dm_item,tbl_sale_so where tbl_sale_so_detail.id_so = tbl_sale_so.id AND tbl_sale_so_detail.item = tbl_dm_item.id AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) = $tahun GROUP BY kategori")->result_array();
		return $query;
	}

	// function getProVsProfit($tahun){
	// 	$query = $this->db->query("SELECT *, sum(qty*price) as subtotal, sum(discount) as total_discount, sum(delivery) as delivery_cost,
	// 		SUM(tbl_sale_so_detail.price)-tbl_op_pl_tabel.ddp_idr AS diff
	// 		from tbl_sale_so,tbl_sale_so_detail,tbl_op_pl_tabel,tbl_op_pl_header where 
	// 		AND ((str_to_date(tbl_sale_so.po_date,'%d %M %Y')) between (str_to_date(tbl_op_pl_header.effective_from,'%d %M %Y')) AND (str_to_date(tbl_op_pl_header.effective_fill,'%d %M %Y'))) 
	// 		AND tbl_sale_so_detail.item=tbl_op_pl_tabel.item_id AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) = $tahun 
	// 		AND tbl_sale_so.id = tbl_sale_so_detail.id_so GROUP BY tbl_sale_so_detail.item
	// 		")->result_array();
	// 	return $query;
	// }

	function getProVsProfit($tahun){
		$query = $this->db->query("SELECT * from tbl_sale_so,tbl_op_pl_tabel,tbl_op_pl_header,tbl_sale_so_detail where 
			((str_to_date(tbl_sale_so.po_date,'%d %M %Y')) between (str_to_date(tbl_op_pl_header.effective_from,'%d %M %Y')) AND (str_to_date(tbl_op_pl_header.effective_fill,'%d %M %Y'))) 
			AND tbl_sale_so_detail.item=tbl_op_pl_tabel.item_id AND YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) = '$tahun' AND tbl_sale_so.id = tbl_sale_so_detail.id_so group by tbl_sale_so_detail.id
			")->result_array();
		return $query;
	}

	//[OP] untuk Supply Report

	function getSupplyReport(){
		$query = $this->db->query("SELECT * from tbl_sale_so,tbl_sale_so_delivery where  tbl_sale_so.id=tbl_sale_so_delivery.id_so");
		return $query;
	}

	//[OP] untuk import cost report
	function getImportCostReport(){
		$query = $this->db->query("SELECT * from tbl_op_po_header,tbl_op_po_tabel,tbl_op_po_documentation,tbl_op_po_lead_time,tbl_op_po_costing,tbl_dm_item where 
			tbl_op_po_header.no=tbl_op_po_tabel.no_po AND 
			tbl_op_po_header.no=tbl_op_po_documentation.no_po AND 
			tbl_op_po_header.no=tbl_op_po_lead_time.no_po AND 
			tbl_op_po_header.no=tbl_op_po_costing.no_po AND 
			tbl_dm_item.id=tbl_op_po_tabel.item_code
			");
		return $query;
	}

	//[Sales] untuk AR performance
	function getArPerformance(){
		$query = $this->db->query("SELECT YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as period, (SELECT sum(amount) from tbl_sale_so_invoicing where tbl_sale_so.id=tbl_sale_so_invoicing.id_so ) as invoiced, (SELECT sum(amount) from tbl_sale_so_payment where tbl_sale_so_payment.id_so = tbl_sale_so.id) as paid from tbl_sale_so 
group by period
			")->result_array();
		return $query;
	}

	//[OP] untuk dashboard grafik transport cost
	function getGraphTransport(){
		$query = $this->db->query("SELECT *,tbl_sale_so_delivery.nett as devcos, YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as tahun from tbl_sale_so,tbl_sale_so_detail,tbl_sale_so_delivery,tbl_sale_so_cost where 
			tbl_sale_so.id=tbl_sale_so_delivery.id_so AND 
			tbl_sale_so.id=tbl_sale_so_detail.id_so AND
			tbl_sale_so.id=tbl_sale_so_cost.id_so 
			GROUP BY tbl_sale_so_cost.id_so, tbl_sale_so_cost.transport 	
			")->result_array();
		return $query;
	}

	function getGraphDelivery($id){
		$query = $this->db->query("SELECT *,YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as tahun from tbl_sale_so,tbl_sale_so_delivery where 
			tbl_sale_so.id=tbl_sale_so_delivery.id_so AND 
			tbl_sale_so_delivery.id_so IN ($id)
			")->result_array();
		return $query;	
	}

	function getGraphDebitNote($id){
		$query = $this->db->query("SELECT *,YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as tahun from tbl_sale_so,tbl_sale_so_delivery where 
			tbl_sale_so.id=tbl_sale_so_delivery.id_so AND 
			tbl_sale_so_delivery.id_so IN ($id)
			")->result_array();
		return $query;	
	}

	function getKpiTransport(){
		$query = $this->db->query("SELECT * from tbl_dm_kpi where item = 'Transport Cost'")->row_array();
		return $query;

	}

	//[Sales] Stock Performance
	function getStockPerformance(){
		$query = $this->db->query("SELECT *, DATEDIFF( CURDATE( ) ,  STR_TO_DATE( tbl_op_st_header.document_date,  '%d %b %Y' ) ) AS geer FROM tbl_op_st_header, tbl_op_st_tabel 
			WHERE tbl_op_st_header.no=tbl_op_st_tabel.st_no")->result_array();
		return $query;
	}

	//Struktur Organisasi
	function updateStruktur($tbl,$data){
		$query = $this->db->query("UPDATE $tbl set value = '$data[bagan]'");
		return $query;
	}

	//Position Personel
	function getPositionPersonel($id){
		$query = $this->db->query("SELECT *,tbl_position.position as pos from tbl_dm_personnel,tbl_position where tbl_dm_personnel.position = tbl_position.id AND tbl_dm_personnel.id='$id'");
		return $query;
	}
}
