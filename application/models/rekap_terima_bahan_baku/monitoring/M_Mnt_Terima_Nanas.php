<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mnt_Terima_Nanas extends CI_Model{
	function get_Mnt_Bulan_Tahun($bulan,$tahun){
		$query = $this->db->query("SELECT * FROM tblTrnTerimaNanas where MONTH(Tanggal) = '$bulan' and YEAR(Tanggal) = '$tahun' and InActive IS NULL ORDER BY Tanggal ASC");
		return $query->result();
	}

	function get_Mnt_Tahun($tahun){
		$query = $this->db->query("SELECT MONTH(Tanggal) as Bulan,YEAR(Tanggal) as Tahun,SUM(TafsiranNanas) as TafsiranNanas,SUM(AktualTerima_Nanas_N_1) as AktualTerima_Nanas_N_1,SUM(AktualTerima_Nanas_N_2) as AktualTerima_Nanas_N_2,SUM(AktualTerima_Nanas_N_3) as AktualTerima_Nanas_N_3,SUM(AktualTerima_Nanas_N_4) as AktualTerima_Nanas_N_4,SUM(AktualTerima_Nanas_N_5) as AktualTerima_Nanas_N_5,SUM(NanasRiject) as NanasRiject,Count(TerimaNanasID) as HariKerja FROM tblTrnTerimaNanas where YEAR(Tanggal) = '$tahun' and InActive IS NULL ");
		return $query->result();
	}
}