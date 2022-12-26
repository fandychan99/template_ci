<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mtr_Rekap_Produksi_Kelapa extends CI_Controller
{
	function __construct()
    {
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }

        $this->load->model(array('rekap_produksi/monitoring/kelapa/M_Mtr_Rekap_Produksi_Kelapa'));
    }    
	
	function index()
    {
		$data = array(
            'title'                    => 'COCONUT PRODUCTION MONITORING SCHEDULE'
		);
		$this->template->display('rekap_produksi/monitoring/kelapa/index', $data);
    }

    function mtr_bulan_tahun()
    {
        $bulan  = $this->input->post('bulan');
        $tahun  = $this->input->post('tahun');

        $mtr_rekap_produksi_kelapa = $this->M_Mtr_Rekap_Produksi_Kelapa->get_by_bulan_tahun($bulan, $tahun);

        if ($mtr_rekap_produksi_kelapa){
            $data = array(
                'mtr_rekap_produksi_kelapa' => $mtr_rekap_produksi_kelapa
            );
            $this->load->view('rekap_produksi/monitoring/kelapa/mtr_bulan_tahun', $data);
        }        
    }

    function mtr_tahun()
    {
        $tahun  = $this->input->post('tahun');

        $mtr_rekap_produksi_kelapa = $this->M_Mtr_Rekap_Produksi_Kelapa->get_by_tahun($tahun);

        if ($mtr_rekap_produksi_kelapa){
            $data = array(
                'mtr_rekap_produksi_kelapa' => $mtr_rekap_produksi_kelapa
            );
            $this->load->view('rekap_produksi/monitoring/kelapa/mtr_tahun', $data);
        }        
    }	
}