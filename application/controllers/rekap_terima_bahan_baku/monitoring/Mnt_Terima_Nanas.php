<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mnt_Terima_Nanas extends CI_Controller{
	function __construct(){
        parent::__construct();
        
        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('rekap_terima_bahan_baku/monitoring/M_Mnt_Terima_Nanas');
    }    
	
	function index() {

        $data = array(
            'title' => 'Schedule Receive Pineapple'
        );
		$this->template->display('rekap_terima_bahan_baku/monitoring/nanas/index',$data);
    }

    function mtr_bulan_tahun(){
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $_getData = $this->M_Mnt_Terima_Nanas->get_Mnt_Bulan_Tahun($bulan,$tahun);
        // print_r($_getData);
        if($_getData){
            $data = array(
                '_getData' => $_getData
            );

            $this->load->view('rekap_terima_bahan_baku/monitoring/nanas/mtr_bulan_tahun',$data);
        }
    }

    function mtr_tahun(){
        $tahun = $this->input->post('tahun');

        $_getData = $this->M_Mnt_Terima_Nanas->get_Mnt_Tahun($tahun);
        if($_getData){
            $data = array(
                '_getData' => $_getData
            );

            $this->load->view('rekap_terima_bahan_baku/monitoring/nanas/mtr_tahun',$data);
        }
    }
}