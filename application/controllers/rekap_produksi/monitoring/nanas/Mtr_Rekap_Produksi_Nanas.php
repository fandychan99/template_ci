<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mtr_Rekap_Produksi_Nanas extends CI_Controller
{
	function __construct()
    {
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }

        $this->load->model(array('rekap_produksi/monitoring/nanas/M_Mtr_Rekap_Produksi_Nanas'));
    }    
	
	function index()
    {
		$data = array(
            'title'                    => 'PINEAPPLE PRODUCTION MONITORING SCHEDULE'
		);
		$this->template->display('rekap_produksi/monitoring/nanas/index', $data);
    }

    function mtr_bulan_tahun()
    {
        $bulan  = $this->input->post('bulan');
        $tahun  = $this->input->post('tahun');

        $mtr_rekap_produksi_nanas = $this->M_Mtr_Rekap_Produksi_Nanas->get_by_bulan_tahun($bulan, $tahun);

        if ($mtr_rekap_produksi_nanas){
            $data = array(
                'mtr_rekap_produksi_nanas' => $mtr_rekap_produksi_nanas
            );
            $this->load->view('rekap_produksi/monitoring/nanas/mtr_bulan_tahun', $data);
        }        
    }

    function mtr_tahun()
    {
        $tahun  = $this->input->post('tahun');

        $mtr_rekap_produksi_nanas = $this->M_Mtr_Rekap_Produksi_Nanas->get_by_tahun($tahun);

        if ($mtr_rekap_produksi_nanas){
            $data = array(
                'mtr_rekap_produksi_nanas' => $mtr_rekap_produksi_nanas
            );
            $this->load->view('rekap_produksi/monitoring/nanas/mtr_tahun', $data);
        }        
    }	
}