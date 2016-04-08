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

	function getForecast(){
		$query = $this->db->query("SELECT * from tbl_sale_target where periode > 2015")->result_array();
		return $query;
	}

	function getQtySo(){
		$query = $this->db->query("SELECT *,YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as periode from tbl_sale_so,tbl_sale_so_detail where YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) > 2015 AND tbl_sale_so.id = tbl_sale_so_detail.id_so")->result_array();
		return $query;
	}

	function getForecastOp(){
		$query = $this->db->query("SELECT *,count(operator) as total FROM tbl_sale_target,tbl_dm_operator where tbl_dm_operator.id = tbl_sale_target.operator group by periode, operator order by total DESC limit 0,5")->result_array();
		return $query;
	}

	function getSoOp(){
		$query = $this->db->query("SELECT *,count(operator) as total_op,YEAR(str_to_date(tbl_sale_so.so_date,'%d %b %Y')) as periode FROM tbl_sale_so,tbl_sale_so_detail where tbl_sale_so_detail.id_so = tbl_sale_so.id group by periode, operator order by total_op DESC limit 0,5")->result_array();
		return $query;
	}

	function getSupplyDetailPerformance(){
		$query = $this->db->query("SELECT * from tbl_sale_so_delivery,tbl_sale_so_detail,tbl_dm_item where tbl_sale_so_detail.item = tbl_dm_item.id AND tbl_sale_so_detail.id_so = tbl_sale_so_delivery.id_so")->result_array();
		return $query;
	}

	function getImportLeadTimePerformance(){
		$query = $this->db->query("SELECT * from tbl_op_po_tabel,tbl_op_po_header,tbl_dm_item,tbl_op_po_lead_time where tbl_op_po_lead_time.no_po = tbl_op_po_header.no AND tbl_dm_item.id = tbl_op_po_tabel.item_code AND tbl_op_po_tabel.no_po = tbl_op_po_header.no")->result_array();
		return $query;
	}
}