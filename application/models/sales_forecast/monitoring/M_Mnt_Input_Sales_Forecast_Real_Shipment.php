<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mnt_Input_Sales_Forecast_Real_Shipment extends CI_Model{

	function get_Mtr_tahun24($tahun,$product){
		$query = $this->db->query("SELECT * FROM tblTrnSalesForecast_24_Fat_Content WHERE Tahun = '$tahun' and ProductID = '$product'");
		return $query->result();
	}

	function get_Mtr_tahunreal($tahun,$product){
		$query = $this->db->query("SELECT * FROM tblTrnSalesForecast_Real_Fat_Content WHERE Tahun = '$tahun' and ProductID = '$product'");
		return $query->result();
	}

	function get_MstProduct(){
		$query = $this->db->query("SELECT * FROM tblMstProduct");
		return $query->result();
	}

	function get_MstBuyer(){
		$query = $this->db->query("SELECT * FROM tblMstBuyer");
		return $query->result();
	}
}