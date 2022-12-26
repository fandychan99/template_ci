<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mst_Packaging extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('master/packaging/M_Mst_Packaging');
    }    
	
	function index() {

		$data['_getData'] = $this->M_Mst_Packaging->get_MstPackaging();
        $data['message'] = $this->session->flashdata('message');
		$this->template->display('master/packaging/index',$data);
    }

    function tambahData(){

    	$data['_getMstFactory'] = $this->M_Mst_Packaging->get_MstFactory();
    	$this->template->display('master/packaging/formInput',$data);
    }

    function simpanData(){
    	$packagingid 	= $this->input->post('txtpackagingid');
    	$packagingname 	= $this->input->post('txtpackagingname');
    	$factoryid 		= $this->input->post('selFactory');
    	$inactive 		= $this->input->post('rdInactive');
        $cek            = $this->M_Mst_Packaging->cek_data($packagingid);

        if($cek->jml == 0){
            $data = array(
                'PackagingID'   => $packagingid,
                'PackagingName' => $packagingname,
                'FactoryID'     => $factoryid,
                'InActive'      => $inactive,
            );
            $this->M_Mst_Packaging->simpan($data);
            $this->session->set_flashdata('message', pesan('Data Master Packaging '.$packagingid.' berhasil disimpan.', 'success'));
            redirect(base_url('master/packaging/Mst_Packaging'));
        }else{
            $this->session->set_flashdata('message', pesan('Data Master Packaging '.$packagingid.' berhasil disimpan.', 'success'));
            redirect(base_url('master/packaging/Mst_Packaging/tambahData'));
        }
    }

    function editData(){
    	$packagingid = $this->uri->segment(5);

    	$data['_getMstFactory'] = $this->M_Mst_Packaging->get_MstFactory();
    	$data['_getData'] 		= $this->M_Mst_Packaging->get_dataMstPackaging($packagingid);
    	$this->template->display("master/packaging/formEdit",$data);
    }

    function updateData(){
    	$packagingid 	= $this->input->post('txtpackagingid');
    	$packagingname 	= $this->input->post('txtpackagingname');
    	$factoryid 		= $this->input->post('selFactory');
    	$inactive 		= $this->input->post('rdInactive');
        $cek            = $this->M_Mst_Packaging->cek_data($packagingid);

    	if($cek->jml == 1){
            $data = array(
                'PackagingName' => $packagingname,
                'FactoryID'     => $factoryid,
                'InActive'      => $inactive,
            );
            $this->M_Mst_Packaging->update($packagingid,$data);
            $this->session->set_flashdata('message', pesan('Data Master Packaging '.$packagingid.' berhasil diupdate.', 'success'));
            redirect(base_url('master/packaging/Mst_Packaging'));
        }else{
            $this->session->set_flashdata('message', pesan('Data Master Packaging '.$packagingid.' berhasil disimpan.', 'success'));
            redirect(base_url('master/packaging/Mst_Packaging/editData/'.$packagingid));
        }
    }
}