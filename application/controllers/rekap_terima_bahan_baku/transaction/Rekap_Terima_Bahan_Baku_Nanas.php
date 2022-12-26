<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rekap_Terima_Bahan_Baku_Nanas extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('rekap_terima_bahan_baku/transaction/M_Rekap_Terima_Bahan_Baku_Nanas');
    }    
	
	function index() {

        $data['message']        = $this->session->flashdata('message');
        $data['_getData']       = $this->M_Rekap_Terima_Bahan_Baku_Nanas->get_TrnTerimaNanas();
		$this->template->display('rekap_terima_bahan_baku/transaction/nanas/index',$data);
    }

    function tambahData(){

        $data['message']        = $this->session->flashdata('message');
        $data['_getMstFactory'] = $this->M_Rekap_Terima_Bahan_Baku_Nanas->get_MstFactory();
        $this->template->display('rekap_terima_bahan_baku/transaction/nanas/formInput',$data);
    }

    function simpanData(){
        $tgl        = $this->input->post('txtTanggal');
        $tafsiran   = $this->input->post('txtTafsiran');
        $AT_nanas1  = $this->input->post('txtNanasN1');
        $AT_nanas2  = $this->input->post('txtNanasN2');
        $AT_nanas3  = $this->input->post('txtNanasN3');
        $AT_nanas4  = $this->input->post('txtNanasN4');
        $AT_nanas5  = $this->input->post('txtNanasN5');
        $nanas_riject   = $this->input->post('txtNanasRiject');
        $factory        = $this->input->post('selFactory');
        $cek    = $this->M_Rekap_Terima_Bahan_Baku_Nanas->cek_Data($tgl);

        if($cek->jml == 0){
            $data = array(
                'Tanggal'                => $tgl,
                'TafsiranNanas'          => $tafsiran,
                'AktualTerima_Nanas_N_1' => $AT_nanas1,
                'AktualTerima_Nanas_N_2' => $AT_nanas2,
                'AktualTerima_Nanas_N_3' => $AT_nanas3,
                'AktualTerima_Nanas_N_4' => $AT_nanas4,
                'AktualTerima_Nanas_N_5' => $AT_nanas5,
                'NanasRiject'            => $nanas_riject,
                'FactoryID'              => $factory,
            );

            $this->M_Rekap_Terima_Bahan_Baku_Nanas->simpan($data);
            $this->session->set_flashdata('message', pesan('Data Terima Nanas Pada Tanggal '.$tgl.' berhasil disimpan.', 'success'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas'));
        }else{
            $this->session->set_flashdata('message', pesan('Data Terima Nanas Pada Tanggal '.$tgl.' sudah dibuat.', 'error'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas/tambahData'));
        }
    }

    function editData(){
        $tgl = $this->uri->segment(5);

        $data['message']        = $this->session->flashdata('message');
        $data['_getData']       = $this->M_Rekap_Terima_Bahan_Baku_Nanas->get_TrnTerimaNanas_by_id($tgl);
        $data['_getMstFactory'] = $this->M_Rekap_Terima_Bahan_Baku_Nanas->get_MstFactory();
        $this->template->display('rekap_terima_bahan_baku/transaction/nanas/formEdit',$data);
    }

    function updateData(){
        $id         = $this->input->post('txtID');
        $tgl        = $this->input->post('txtTanggal');
        $tafsiran   = $this->input->post('txtTafsiran');
        $AT_nanas1  = $this->input->post('txtNanasN1');
        $AT_nanas2  = $this->input->post('txtNanasN2');
        $AT_nanas3  = $this->input->post('txtNanasN3');
        $AT_nanas4  = $this->input->post('txtNanasN4');
        $AT_nanas5  = $this->input->post('txtNanasN5');
        $nanas_riject   = $this->input->post('txtNanasRiject');
        $factory        = $this->input->post('selFactory');
        $cek    = $this->M_Rekap_Terima_Bahan_Baku_Nanas->cek_Data($tgl);

        if($cek->jml == 1){
            $data = array(
                'Tanggal'                => $tgl,
                'TafsiranNanas'          => $tafsiran,
                'AktualTerima_Nanas_N_1' => $AT_nanas1,
                'AktualTerima_Nanas_N_2' => $AT_nanas2,
                'AktualTerima_Nanas_N_3' => $AT_nanas3,
                'AktualTerima_Nanas_N_4' => $AT_nanas4,
                'AktualTerima_Nanas_N_5' => $AT_nanas5,
                'NanasRiject'            => $nanas_riject,
                'FactoryID'              => $factory,
            );

            $this->M_Rekap_Terima_Bahan_Baku_Nanas->update($id,$data);
            $this->session->set_flashdata('message', pesan('Data Terima Nanas Pada Tanggal '.$tgl.' berhasil diupdate.', 'success'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas'));
        }else{
            $this->session->set_flashdata('message', pesan('Data Terima Nanas Pada Tanggal '.$tgl.' sudah dibuat.', 'error'));
            redirect(base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas/editData'));
        }
    }

    function delete(){
        $id = $this->uri->segment(5);

        $data = array(
            'InActive' => 1,
        );

        $this->M_Rekap_Terima_Bahan_Baku_Nanas->delete($id,$data);
    }
}