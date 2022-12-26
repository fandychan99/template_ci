<?php 
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trn_Rencana_Terima_Kelapa extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }

        $this->load->model(array('rekap_produksi/transaction/kelapa/M_Trn_Rekap_Produksi_Kelapa', 'rekap_terima_bahan_baku/transaction/M_Rekap_Terima_Bahan_Baku_Kelapa'));
    }

    function index(){
        $data['message'] = $this->session->flashdata('message');
		$this->template->display('rekap_terima_bahan_baku/transaction/kelapa/rencana_kelapa', $data);   
    }

    function getForm(){
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $kalender = CAL_GREGORIAN;

        $data['_bulan'] = $bulan;
        $data['_tahun'] = $tahun;
        $data['_rencana'] = $this->M_Rekap_Terima_Bahan_Baku_Kelapa->get_data($bulan, $tahun);
        $data['_jumlah'] = cal_days_in_month($kalender, $bulan, $tahun);

        $this->load->view('rekap_terima_bahan_baku/transaction/kelapa/rencana_kelapa_ajax', $data);
    }


    function Save(){
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $aksi = $this->input->post('aksi');

        $this->M_Rekap_Terima_Bahan_Baku_Kelapa->simpan_rekap($aksi, $tanggal, $jumlah);
        redirect(base_url('rekap_terima_bahan_baku/transaction/Trn_Rencana_Terima_Kelapa'));
    }
}

?>