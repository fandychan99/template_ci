<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mst_Category extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->library('form_validation');

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
         
        $this->load->model('master/category/M_Mst_Category');
    }    
	
	function index() {
		$data['_getData'] = $this->M_Mst_Category->get_Mst_Category();
        $data['message'] = $this->session->flashdata('message');
		$this->template->display('master/category/index',$data);
    }

    function tambahData(){

        $data['_getMstFactory'] = $this->M_Mst_Category->get_MstFactory();
        $data['message'] = $this->session->flashdata('message');
        $this->template->display('master/category/form',$data);
    }

    function simpanData(){
        $categoryid      = $this->input->post('txtcategoryid');
        $categoryname    = $this->input->post('txtcategoryname');
        $factory         = $this->input->post('selFactory');
        $inActive        = $this->input->post('rdInactive');
        $cek             = $this->M_Mst_Category->cek_data($categoryid);

        if($cek->jml == 0){
            $data = array(
                'CategoryID'    => $categoryid,
                'CategoryName'  => $categoryname,
                'FactoryID'     => $factory,
                'InActive'      => $inActive,
            );
            $this->M_Mst_Category->simpan($data);
            $this->session->set_flashdata('message', pesan('Data master Category '.$categoryid.' berhasil disimpan.', 'success'));
            redirect(base_url('master/category/Mst_Category'));
        }else{
            $this->session->set_flashdata('message', pesan('Data master Category'.$categoryid.' sudah dibuat.', 'error'));
            redirect(base_url('master/category/Mst_Category/tambahData'));
        }
    }

    function editData(){
        $categoryid = $this->uri->segment(5);

        $data['_getDataEdit'] = $this->M_Mst_Category->get_dataEdit($categoryid);
        $data['_getMstFactory'] = $this->M_Mst_Category->get_MstFactory();
        $data['message'] = $this->session->flashdata('message');
        $this->template->display('master/category/formEdit',$data);
    }

    function updateData(){
        $categoryid      = $this->input->post('txtcategoryid');
        $categoryname    = $this->input->post('txtcategoryname');
        $factory         = $this->input->post('selFactory');
        $inActive        = $this->input->post('rdInactive');
        $cek             = $this->M_Mst_Category->cek_data($categoryid);

        if($cek->jml == 1){
            $data = array(
                'CategoryName'  => $categoryname,
                'FactoryID'     => $factory,
                'InActive'      => $inActive,
            );
            $this->M_Mst_Category->update($categoryid,$data);
            $this->session->set_flashdata('message', pesan('Data master Category '.$categoryid.' berhasil diupdate.', 'success'));
            redirect(base_url('master/category/Mst_Category'));
        }else{
            $this->session->set_flashdata('message', pesan('Data master Category'.$categoryid.' sudah dibuat.', 'error'));
            redirect(base_url('master/category/Mst_Category/editData/'.$categoryid));
        }
    }

    // function hapusdata(){
    //     $categoryid = $this->uri->segment(5);
    //     $this->M_Mst_Category->hapus($categoryid);
    // }
}