<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Input_Sales_Forecast_Real_Shipment extends CI_Controller
{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('sales_forecast/transaction/M_Input_Sales_Forecast_Real_Shipment');
    }    
	
	function index() {
		
        $data['getProduct'] = $this->M_Input_Sales_Forecast_Real_Shipment->get_MstProduct();
		$this->template->display('sales_forecast/transaction/form',$data);
    }

    function getForm(){
    	$product   = $this->uri->segment(5);
    	$tahun     = $this->uri->segment(6);
        $base_on   = $this->uri->segment(7);

        if($base_on == '24_fat_content'){
         $data['product']  = $product;
         $data['tahun']    = $tahun;
         $data['getBuyer'] = $this->M_Input_Sales_Forecast_Real_Shipment->get_MstBuyer();
         $this->load->view('sales_forecast/transaction/ajax/formInput',$data);
        }else{
         $data['product']  = $product;
         $data['tahun']    = $tahun;
         $data['getBuyer'] = $this->M_Input_Sales_Forecast_Real_Shipment->get_MstBuyer();
         $this->load->view('sales_forecast/transaction/ajax/formInputReal',$data);
        }
	}

    function simpanData(){
    	$product  	= $this->input->post('txtproduct');
    	$tahun 		= $this->input->post('txttahun');
		$txtQty     = $this->input->post('txtQuantity');
		$txtBuyer   = $this->input->post('txtBuyer');
		$jlhBuyer   = $this->input->post('jumlahbuyer');
		
		$datasimpan = array();
		$bulan = 0;
		for($i = 0; $i < count($txtQty); $i++){
			if(fmod($i , $jlhBuyer) == 0){
				$bulan++;
			}
		
			$data = array(
                'ProductID' => $product, 
                'BuyerID'   => $txtBuyer[$i], 
                'Tahun'     => $tahun, 
                'Bulan'     => $bulan, 
                'Quantity'  => $txtQty[$i],
                // 'CreatedBy' => $this->session->userdata('user_name'),
                // 'CreatedDate' => date('Y-m-d H:i:s')
            );

			array_push($datasimpan, $data);
		}

        $this->M_Input_Sales_Forecast_Real_Shipment->simpan_24_fat_content($datasimpan);
        redirect('sales_forecast/transaction/Input_Sales_Forecast_Real_Shipment');

    }

    function simpan_real_fat_content(){
        $product        = $this->input->post('txtproductreal');
        $tahun          = $this->input->post('txttahunreal');
        $txtQtyReal     = $this->input->post('txtQuantityReal');
        $txtBuyerReal   = $this->input->post('txtBuyerReal');
        $jlhBuyerReal   = $this->input->post('jumlahbuyerreal');

        $datasimpan_real_fat = array();
        $bulan = 0;
        for ($i=0; $i < count($txtQtyReal); $i++) { 
            if (fmod($i, $jlhBuyerReal) == 0) {
                $bulan++;
            }

            $data =  array(
                'ProductID' => $product,
                'BuyerID'   => $txtBuyerReal[$i],
                'Tahun'     => $tahun,
                'Bulan'     => $bulan,
                'Quantity'  => $txtQtyReal[$i],
                //'CreatedBy' => $this->session->userdata('user_name'),
                // 'CreatedDate' => date('Y-m-d H:i:s')
            );

            array_push($datasimpan_real_fat, $data);
        }

        // print_r($datasimpan_real_fat);
        $this->M_Input_Sales_Forecast_Real_Shipment->simpan_real_fat_content($datasimpan_real_fat);
        redirect('sales_forecast/transaction/Input_Sales_Forecast_Real_Shipment');
    }
}