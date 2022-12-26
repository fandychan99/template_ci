<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Input_Sales_Forecast_Real_Shipment extends CI_Model{

	function get_MstBuyer(){
		$query = $this->db->query("SELECT * FROM tblMstBuyer");
		return $query->result();
	}

	function get_MstProduct(){
		$query = $this->db->query("SELECT * FROM tblMstProduct");
		return $query->result();
	}

	function simpan_24_fat_content($datasimpan){
		$this->db->insert_batch('tblTrnSalesForecast_24_Fat_Content', $datasimpan);
	}

	function simpan_real_fat_content($datasimpan_real_fat){
		$this->db->insert_batch('tblTrnSalesForecast_Real_Fat_Content', $datasimpan_real_fat);
	}
}