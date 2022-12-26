<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mst_Brand extends CI_Model{

	function get_MstFactory(){
		$query = $this->db->query("SELECT * FROM tblMstFactory");
		return $query->result();
	}
	function cek_data($barandid){
		$query = $this->db->query("SELECT count(BrandID) as jml FROM tblMstBrand where BrandID = '$barandid'");
		return $query->row();
	}

	function simpan($data){
		$this->db->insert('tblMstBrand',$data);
	}

	function get_MstBrand(){
		$query = $this->db->query("SELECT * FROM tblMstBrand");
		return $query->result();
	}

	function get_MstBrand_by_id($brandid){
		$query = $this->db->query("SELECT * FROM tblMstBrand where BrandID = '$brandid'");
		return $query->result();
	}

	function update($brandid,$data){
		$this->db->where('BrandID',$brandid);
		$this->db->update('tblMstBrand',$data);
	}
}