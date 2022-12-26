<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mst_Packaging extends CI_Model{

	function get_MstFactory(){
		$query = $this->db->query("SELECT * FROM tblMstFactory");
		return $query->result();		
	}

	function simpan($data){
		$this->db->insert("tblMstPackaging",$data);
	}

	function get_MstPackaging(){
		$query = $this->db->query("SELECT * FROM tblMstPackaging");
		return $query->result();
	}

	function get_dataMstPackaging($packagingid){
		$query = $this->db->query("SELECT * FROM tblMstPackaging where PackagingID = '$packagingid'");
		return $query->result();
	}

	function update($packagingid,$data){
		$this->db->where('PackagingID',$packagingid);
		$this->db->update('tblMstPackaging',$data);
	}

	function cek_data($packagingid){
		$query = $this->db->query("SELECT count(PackagingID) as $jml FROM tblMstPackaging where PackagingID = '$packagingid'");
		return $query->row();
	}
}