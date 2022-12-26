<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cogs_Actual_Sales_Price extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('cogs_actual_sales_price/transaction/M_Cogs_Actual_Sales_Price');
    }    
	
	function index() {

        $data['message']        = $this->session->flashdata('message');
		$this->template->display('cogs_actual_sales_price/transaction/index',$data);
    }

    function getForm(){
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $cek = $this->M_Cogs_Actual_Sales_Price->cekhdr($bulan, $tahun);

        if($cek){
            $data['_getLabel'] = $this->M_Cogs_Actual_Sales_Price->get_MstLabel();
            $data['_getlv1'] = $this->M_Cogs_Actual_Sales_Price->get_Lv1();
            $data['_getlv2'] = $this->M_Cogs_Actual_Sales_Price->get_Lv2();
            $data['_getlv3'] = $this->M_Cogs_Actual_Sales_Price->get_Lv3();
            $data['_getedit'] = $this->M_Cogs_Actual_Sales_Price->get_dataedit($bulan, $tahun);
            $this->load->view('cogs_actual_sales_price/transaction/ajax/data_edit',$data);
        }else{
            $data['_getLabel'] = $this->M_Cogs_Actual_Sales_Price->get_MstLabel();
            $data['_getlv1'] = $this->M_Cogs_Actual_Sales_Price->get_Lv1();
            $data['_getlv2'] = $this->M_Cogs_Actual_Sales_Price->get_Lv2();
            $data['_getlv3'] = $this->M_Cogs_Actual_Sales_Price->get_Lv3();
            $this->load->view('cogs_actual_sales_price/transaction/ajax/data',$data);
        }
    }

    function simpanData(){
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $aksi = $this->input->post('aksi');

        $baris = $this->input->post('baris');
        $kolom = $this->input->post('kolom');
        $price = $this->input->post('price');

        $res = $this->M_Cogs_Actual_Sales_Price->SimpanData($bulan, $tahun, $aksi, $baris, $kolom, $price);

    }
}