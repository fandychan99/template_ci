<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mnt_Terima_Kelapa extends CI_Model{

	function get_Mnt_bulan_tahun($bulan,$tahun){
		$query = $this->db->query("SELECT * FROM tblTrnTerimaKelapaKB_A where MONTH(Tanggal) = '$bulan' and YEAR(Tanggal) = '$tahun' and InActive IS NULL ORDER BY Tanggal ASC");
		return $query->result();
	}

	function get_Mnt_tahun($tahun){
		$query = $this->db->query("SELECT MONTH(Tanggal) as Bulan,YEAR(Tanggal) as Tahun,SUM(Tafsiran) as Tafsiran,SUM(AktualTerima) as AktualTerima,count(TerimaKelapaID) as HariKerja FROM tblTrnTerimaKelapaKB_A where YEAR(Tanggal) = '$tahun' and InActive IS NULL");
		return $query->result();
	}
}