<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mst_Sub_Product extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('master/sub_product/M_Mst_Sub_Product');
    }    
	
	function index() {

		$data['_getData'] = $this->M_Mst_Sub_Product->get_MstSubProduct();
        $data['message']  = $this->session->flashdata('message');
		$this->template->display('master/sub_product/index',$data);
    }

    function tambahData(){

    	$data['_getMstProduct'] = $this->M_Mst_Sub_Product->get_MstProduct();
    	$data['_getMstFactory'] = $this->M_Mst_Sub_Product->get_MstFactory();
        $data['message']        = $this->session->flashdata('message');
    	$this->template->display('master/sub_product/formInput',$data);
    }

    function simpanData(){
    	$productid 		= $this->input->post('selproductid');
    	$subproductid 	= $this->input->post('txtsubproductid');
    	$subproductname = $this->input->post('txtsubproductname');
    	$factory 		= $this->input->post('selFactory');
    	$inactive 		= $this->input->post('rdInactive');
        $cek            = $this->M_Mst_Sub_Product->cek_data($subproductid);

        if($cek->jml == 0){
            $data = array(
                'ProductID'         => $productid,
                'SubProductID'      => $subproductid,
                'SubProductName'    => $subproductname,
                'FactoryID'         => $factory,
                'InActive'          => $inactive,
            );
            $this->M_Mst_Sub_Product->simpan($data);
            $this->session->set_flashdata('message', pesan('Data Master Sub Product dengan ID '.$subproductid.' berhasil disimpan.', 'success'));
            redirect(base_url('master/sub_product/Mst_Sub_Product'));
        }else{
            $this->session->set_flashdata('message', pesan('Data Master Sub Product dengan ID'.$subproductid.' sudah dibuat.', 'error'));
            redirect(base_url('master/sub_product/Mst_Sub_Product/tambahData'));
        }
    }

    function editData(){
    	$subproductid = $this->uri->segment(5);

    	$data['_getData'] = $this->M_Mst_Sub_Product->get_dataMstSubProduct($subproductid);
    	$data['_getMstProduct'] = $this->M_Mst_Sub_Product->get_MstProduct();
    	$data['_getMstFactory'] = $this->M_Mst_Sub_Product->get_MstFactory();
        $data['message']        = $this->session->flashdata('message');
    	$this->template->display('master/sub_product/formEdit',$data);
    }

    function updateData(){
    	$productid 		= $this->input->post('selproductid');
    	$subproductid 	= $this->input->post('txtsubproductid');
    	$subproductname = $this->input->post('txtsubproductname');
    	$factory 		= $this->input->post('selFactory');
    	$inactive 		= $this->input->post('rdInactive');
        $cek            = $this->M_Mst_Sub_Product->cek_data($subproductid);

        if($cek->jml == 1){
            $data = array(
                'ProductID'         => $productid,
                'SubProductName'    => $subproductname,
                'FactoryID'         => $factory,
                'InActive'          => $inactive,
            );
            $this->M_Mst_Sub_Product->update($subproductid,$data);
            $this->session->set_flashdata('message', pesan('Data Master Sub Product dengan ID '.$subproductid.' berhasil disimpan.', 'success'));
            redirect(base_url('master/sub_product/Mst_Sub_Product'));
        }else{
            $this->session->set_flashdata('message', pesan('Data Master Sub Product dengan ID'.$subproductid.' sudah dibuat.', 'error'));
            redirect(base_url('master/sub_product/Mst_Sub_Product/tambahData'));   
        }
    }
}