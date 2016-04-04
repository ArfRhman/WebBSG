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

	function updateDataBrief($p){
		$query=$this->db->query("UPDATE tbl_sale_short_brief set short_brief ='$p'");
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
}