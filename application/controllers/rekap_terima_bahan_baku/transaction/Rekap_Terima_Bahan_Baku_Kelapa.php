<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rekap_Terima_Bahan_Baku_Kelapa extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('rekap_terima_bahan_baku/transaction/M_Rekap_Terima_Bahan_Baku_Kelapa');
    }    
	
	function index() {

        $data['message']        = $this->session->flashdata('message');
        $data['_getData']       = $this->M_Rekap_Terima_Bahan_Baku_Kelapa->get_trnTerimaKelapa();
		$this->template->display('rekap_terima_bahan_baku/transaction/kelapa/index',$data);
    }

    function tambahData(){

        $data['_getMstFactory'] = $this->M_Rekap_Terima_Bahan_Baku_Kelapa->get_MstFactory();
        $data['message']        = $this->session->flashdata('message');
        $this->template->display('rekap_terima_bahan_baku/transaction/kelapa/formInput',$data);
    }

    function simpanData(){
        $tanggal    = $this->input->post('txtTanggal');
        $tafsiran   = $this->input->post('txtTafsiran');
        $aktual     = $this->input->post('txtAktualTerima');
        $factory    = $this->input->post('selFactory');
        $cek        = $this->M_Rekap_Terima_Bahan_Baku_Kelapa->cek_Data($tanggal,$factory);

        if($cek->jml == 0){
            $data = array(
                'Tanggal'       => $tanggal,
                'Tafsiran'      => $tafsiran,
                'AktualTerima'  => $aktual,
                'FactoryID'     => $factory,
                'CreatedBy'     => 'Ifa Sonia Istifarani',
                'CreatedDate'   => date('Y-m-d H:i:s')
            );

            $this->M_Rekap_Terima_Bahan_Baku_Kelapa->simpan($data);
            $this->session->set_flashdata('message', pesan('Data Terima Kelapa KB A Pada Tanggal '.$tanggal.' berhasil disimpan.', 'success'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa'));  
        }else{
            $this->session->set_flashdata('message', pesan('Data Terima Kelapa KB A Pada Tanggal '.$tanggal.' sudah dibuat.', 'error'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa/tambahData'));
        }
    }

    function editData(){
        $tanggal = $this->uri->segment(5);
        $factory = $this->uri->segment(6);

        $data['_getMstFactory'] = $this->M_Rekap_Terima_Bahan_Baku_Kelapa->get_MstFactory();
         $data['_getData']      = $this->M_Rekap_Terima_Bahan_Baku_Kelapa->get_trnTerimaKelapa_by_id($tanggal,$factory);
        $data['message']        = $this->session->flashdata('message');
        $this->template->display('rekap_terima_bahan_baku/transaction/kelapa/formEdit',$data);
    }

    function updateData(){
        $id         = $this->input->post('txtID');
        $tanggal    = $this->input->post('txtTanggal');
        $tafsiran   = $this->input->post('txtTafsiran');
        $aktual     = $this->input->post('txtAktualTerima');
        $factory    = $this->input->post('selFactory');
        $cek        = $this->M_Rekap_Terima_Bahan_Baku_Kelapa->cek_Data($tanggal,$factory);

         if($cek->jml == 1){
            $data = array(
                'Tanggal'       => $tanggal,
                'Tafsiran'      => $tafsiran,
                'AktualTerima'  => $aktual,
                'FactoryID'     => $factory,
                'UpdateBy'      => 'Ifa',
                'UpdateDate'    => date('Y-m-d H:i:s')
            );

            $this->M_Rekap_Terima_Bahan_Baku_Kelapa->update($id,$data);
            $this->session->set_flashdata('message', pesan('Data Terima Kelapa KB A Pada Tanggal '.$tanggal.' berhasil diupdate.', 'success'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa'));  
        }else{
            $this->session->set_flashdata('message', pesan('Data Terima Kelapa KB A Pada Tanggal '.$tanggal.' sudah dibuat.', 'error'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa'));
        }
    }

    function delete(){
        $id = $this->uri->segment(5);
        
        $data = array(
            'InActive' => 1,
        );
        $this->M_Rekap_Terima_Bahan_Baku_Kelapa->delete($id,$data);
    }
}