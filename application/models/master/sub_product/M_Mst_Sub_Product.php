<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mst_Sub_Product extends CI_Model{

	function get_MstProduct(){
		$query = $this->db->query("SELECT * FROM tblMstProduct");
		return $query->result();
	}

	function get_MstFactory(){
		$query = $this->db->query("SELECT * FROM tblMstFactory");
		return $query->result();
	}

	function simpan($data){
		$this->db->insert('tblMstSubProduct',$data);
	}

	function get_MstSubProduct(){
		$query = $this->db->query('SELECT * FROM tblMstSubProduct');
		return $query->result();
	}

	function get_dataMstSubProduct($subproductid){
		$query = $this->db->query("SELECT * FROM tblMstSubProduct where SubProductID = '$subproductid'");
		return $query->result();
	}

	function update($subproductid,$data){
		$this->db->where('SubProductID',$subproductid);
		$this->db->update('tblMstSubProduct',$data);
	}

	function cek_data($subproductid){
		$query = $this->db->query("SELECT count(SubProductID) as jml FROM tblMstSubProduct where SubProductID = '$subproductid'");
		return $query->row();
	}
}