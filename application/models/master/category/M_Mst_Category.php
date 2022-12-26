<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mst_Category extends CI_Model {

	function simpan($data){
		$this->db->insert('tblMstCategoryProduct',$data);
	}

	function get_Mst_Category(){
		$query = $this->db->query("SELECT * FROM tblMstCategoryProduct");
		return $query->result();
	}

	function get_MstFactory(){
		$query = $this->db->query("SELECT * FROM tblMstFactory");
		return $query->result();
	}

	function get_dataEdit($categoryid){
		$query = $this->db->query("SELECT * FROM tblMstCategoryProduct where CategoryID = '$categoryid'");
		return $query->result();
	}

	function update($categoryid,$data){
		$this->db->where('CategoryID',$categoryid);
		$this->db->update('tblMstCategoryProduct',$data);
	}

	function cek_data($categoryid){
		$query = $this->db->query("SELECT count(CategoryID) as jml FROM tblMstCategoryProduct where CategoryID = '$categoryid'");
		return $query->row();
	}
}