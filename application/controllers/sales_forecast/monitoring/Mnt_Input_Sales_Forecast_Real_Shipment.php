<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mnt_Input_Sales_Forecast_Real_Shipment extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('sales_forecast/monitoring/M_Mnt_Input_Sales_Forecast_Real_Shipment');
    }    
    
    function index() {

        $data = array(
            'title' => 'SALES FORECAST & REAL SHIPMENT ANNUAL REPORT'
        );
        $data['getProduct'] = $this->M_Mnt_Input_Sales_Forecast_Real_Shipment->get_MstProduct();
        $this->template->display('sales_forecast/monitoring/index',$data);
    }

    function mtr_tahun(){
        $tahun = $this->input->post('tahun');
        $product = $this->input->post('product');

        $data['_getData24'] = $this->M_Mnt_Input_Sales_Forecast_Real_Shipment->get_Mtr_tahun24($tahun,$product);
        $data['_getDatareal'] = $this->M_Mnt_Input_Sales_Forecast_Real_Shipment->get_Mtr_tahunreal($tahun,$product);
        $data['_getBuyer']     = $this->M_Mnt_Input_Sales_Forecast_Real_Shipment->get_MstBuyer();
        $this->load->view('sales_forecast/monitoring/mtr_tahun',$data);
    }
}