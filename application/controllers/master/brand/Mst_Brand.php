<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mst_Brand extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('master/brand/M_Mst_Brand');
    }    
	
	function index() {

        $data['_getData']       = $this->M_Mst_Brand->get_MstBrand();
        $data['message']        = $this->session->flashdata('message');
		$this->template->display('master/brand/index',$data);
    }

    function tambahData(){
        $data['_getMstFactory'] = $this->M_Mst_Brand->get_MstFactory();
        $data['message']        = $this->session->flashdata('message');
        $this->template->display('master/brand/formInput',$data);
    }

    function simpanData(){
        $brandid = $this->input->post('txtbrandid');
        $brandname = $this->input->post('txtbrandname');
        $factory   = $this->input->post('selFactory');
        $inactive = $this->input->post('rdInactive');
        $cek       = $this->M_Mst_Brand->cek_data($brandid);

        if ($cek->jml == 0) {
            $data = array(
                'BrandID'   => $brandid,
                'BrandName' => $brandname,
                'FactoryID' => $factory,
                'InActive'  => $inactive,
            );
            $this->M_Mst_Brand->simpan($data);
            $this->session->set_flashdata('message', pesan('Data Master Brand dengan ID '.$brandid.' berhasil disimpan.', 'success'));
            redirect(base_url('master/brand/Mst_Brand'));  
        }else{
            $this->session->set_flashdata('message', pesan('Data Master Brand dengan ID'.$brandid.' sudah dibuat.', 'error'));
            redirect(base_url('master/brand/Mst_Brand/tambahData'));
        }
    }

    function editData(){
        $brandid    = $this->uri->segment(5);

        $data['_getMstFactory'] = $this->M_Mst_Brand->get_MstFactory();
        $data['_getData']       = $this->M_Mst_Brand->get_MstBrand_by_id($brandid);
        $data['message']        = $this->session->flashdata('message');
        $this->template->display('master/brand/formEdit',$data);
    }

    function updateData(){
        $brandid   = $this->input->post('txtbrandid');
        $brandname  = $this->input->post('txtbrandname');
        $factory    = $this->input->post('selFactory');
        $inactive   = $this->input->post('rdInactive');
        $cek        = $this->M_Mst_Brand->cek_data($brandid);

        if ($cek->jml == 1) {
            $data = array(
                'BrandName' => $brandname,
                'FactoryID' => $factory,
                'InActive'  => $inactive,
            );
            $this->M_Mst_Brand->update($brandid,$data);
            $this->session->set_flashdata('message', pesan('Data Master Brand dengan ID '.$brandid.' berhasil diupdate.', 'success'));
            redirect(base_url('master/brand/Mst_Brand'));  
        }else{
            $this->session->set_flashdata('message', pesan('Data Master Brand dengan ID'.$brandid.' sudah dibuat.', 'error'));
            redirect(base_url('master/brand/Mst_Brand/editData/'.$brandid));
        }
    }
}