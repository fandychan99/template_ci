<?php 
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trn_Rencana_Produksi_Nanas extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }

        $this->load->model(array('rekap_produksi/transaction/nanas/M_Trn_Rekap_Produksi_Nanas'));
    }

    function index(){
        $data['message'] = $this->session->flashdata('message');
		$this->template->display('rekap_produksi/transaction/nanas/rencana_nanas', $data);   
    }

    function getForm(){
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $kalender = CAL_GREGORIAN;

        $data['_bulan'] = $bulan;
        $data['_tahun'] = $tahun;
        $data['_rencana'] = $this->M_Trn_Rekap_Produksi_Nanas->get_data($bulan, $tahun);
        $data['_jumlah'] = cal_days_in_month($kalender, $bulan, $tahun);

        $this->load->view('rekap_produksi/transaction/nanas/rencana_nanas_ajax', $data);
    }


    function Save(){
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $aksi = $this->input->post('aksi');

        $this->M_Trn_Rekap_Produksi_Nanas->simpan_rekap($aksi, $tanggal, $jumlah);
        redirect(base_url('rekap_produksi/transaction/nanas/Trn_Rencana_Produksi_Nanas'));
    }
}

?>