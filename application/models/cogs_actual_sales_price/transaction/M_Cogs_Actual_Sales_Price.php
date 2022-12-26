<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Cogs_Actual_Sales_Price extends CI_Model{

	function get_MstBrand(){
		$query = $this->db->query("SELECT * FROM tblMstBrand ORDER BY BrandID DESC");
		return $query->result();
	}

	function get_MstLabel(){
		$query = $this->db->query("SELECT * FROM tblmstlabel ORDER BY id");
		return $query->result();
	}

	function get_Product(){
		$query = $this->db->query("SELECT * FROM tblMstProduct");
		return $query->result();
	}

	function get_Lv1(){
		$this->db->order_by('urutan', 'ASC');
		return $this->db->get('tblmstcogslv1')->result();
	}

	function get_Lv2(){
		return $this->db->get('tblmstcogslv2')->result();
	}

	
	function get_Lv3(){
		return $this->db->get('tblmstcogslv3')->result();
	}


	function cekhdr($bulan, $tahun){
		$this->db->where('Bulan', $bulan);
		$this->db->where('Tahun', $tahun);
		$query = $this->db->get('tbltrncogshdr');

		if($query->num_rows() > 0)
			return true;
		return false;
	}

	function get_dataedit($bulan, $tahun){
		$this->db->where('Bulan', $bulan);
		$this->db->where('Tahun', $tahun);
		$query = $this->db->get('vwtrncogs');

		return $query->result();
	}

	function SimpanData($bulan, $tahun, $aksi, $baris, $kolom, $price){
		if($aksi == 'add'){
			$arr = array(
				'Bulan' => $bulan,
				'Tahun' => $tahun,
				'CreatedBy' => $this->session->userdata('Username'),
				'CreatedDate' => date('Y-m-d H:i:s')
			);

			$this->db->insert('tbltrncogshdr', $arr);
			$id = $this->db->insert_id();
			$batch = array();

			for($i = 0; $i < count($baris); $i++){
				$ar = array(
					'hdrid' => $id,
					'kolom' => $kolom[$i],
					'baris' => $baris[$i],
					'price' => $price[$i]
				);

				array_push($batch, $ar);
			}

			$this->db->insert_batch('tbltrncogsdtl', $batch);
		}
	}
}