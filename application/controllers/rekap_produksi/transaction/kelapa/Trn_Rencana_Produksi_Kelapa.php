<?php 
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trn_Rencana_Produksi_Kelapa extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }

        $this->load->model(array('rekap_produksi/transaction/kelapa/M_Trn_Rekap_Produksi_Kelapa'));
    }

    function index(){
        $data['message'] = $this->session->flashdata('message');
		$this->template->display('rekap_produksi/transaction/kelapa/rencana_kelapa', $data);   
    }

    function getForm(){
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $jlhkp = $this->input->get('jlhklp');
        $kalender = CAL_GREGORIAN;

        $data['_bulan'] = $bulan;
        $data['_tahun'] = $tahun;
        $data['_jlhklp'] = $jlhkp;
        $data['_rencana'] = $this->M_Trn_Rekap_Produksi_Kelapa->get_data($bulan, $tahun);
        $data['_jumlah'] = cal_days_in_month($kalender, $bulan, $tahun);

        $this->load->view('rekap_produksi/transaction/kelapa/rencana_kelapa_ajax', $data);
    }


    function Save(){
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $aksi = $this->input->post('aksi');

        $this->M_Trn_Rekap_Produksi_Kelapa->simpan_rekap($aksi, $tanggal, $jumlah);
        redirect(base_url('rekap_produksi/transaction/kelapa/Trn_Rencana_Produksi_Kelapa'));
    }
}

?>