<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trn_Rekap_Produksi_Kelapa extends CI_Controller
{
	function __construct()
    {
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }

        $this->load->model(array('rekap_produksi/transaction/kelapa/M_Trn_Rekap_Produksi_Kelapa'));
    }    
	
	function index()
    {
		
        $trn_rekap_produksi_kelapa = $this->M_Trn_Rekap_Produksi_Kelapa->get_all();

		$data = array(
			'link_create_new' => base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa/create'),
            'link_edit' => base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa/edit/'),
            'trn_rekap_produksi_kelapa' => $trn_rekap_produksi_kelapa  
		);
        $data['message'] = $this->session->flashdata('message');
		$this->template->display('rekap_produksi/transaction/kelapa/index', $data);
    }

	function create() 
    {                                                
        $data = array(
            'title'                    => 'CREATE NEW SCHEDULE PRODUKSI KELAPA',
            'action'                   => base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa/save'),            
            'button'                   => 'Save',
            'cancel'                   => base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa'),
            'class_tgl'                => 'pickadate',
            'tanggal'				   => tanggal_template(date('Y-m-d')),
            'checked1'				   => 'checked',
            'checked2'				   => '',
            'rencana_buka_kba_btr'	   => '',
            'total_pakai_kelapa_btr'   => '',
            'reject_non_process_btr'   => '',
            'reject_non_process_prcnt' => '',
            'kelapa_kampung_btr'	   => '',
            'kelapa_kampung_prcnt'	   => '',
            'kelapa_ghs_btr'		   => '',
            'kelapa_ghs_prcnt'		   => '',
            'kelapa_kanal_btr'		   => '',
            'kelapa_kanal_prcnt'	   => '',
            'aktual_buka_kba_btr'	   => '',
            'aktual_buka_kba_prcnt'	   => '',
            'kelapa_organik_btr'	   => ''
		);
        $data['message'] = $this->session->flashdata('message');        
        $this->template->display('rekap_produksi/transaction/kelapa/form', $data);
    }
	
	function save() 
    {   
        $tanggal_template = $this->input->post('tanggal');
        $tanggal = tanggal_datebase($this->input->post('tanggal'));
        $row = $this->M_Trn_Rekap_Produksi_Kelapa->get_by_tanggal($tanggal);

        if ($row->Count == 0){
            $data = array(                
                'Tanggal'                   => $tanggal,
                'Produksi'                  => $this->input->post('produksi',TRUE),
                'Rencana_Buka_KBA_Btr'      => $this->input->post('rencana_buka_kba_btr',TRUE),
                'Total_Pakai_Kelapa_Btr'    => $this->input->post('total_pakai_kelapa_btr',TRUE),
                'Reject_Non_Process_Btr'    => $this->input->post('reject_non_process_btr',TRUE),
                'Reject_Non_Process_Prcnt'  => substr(($this->input->post('reject_non_process_prcnt',TRUE)), 0, -2),
                'Kelapa_Kampung_Btr'        => $this->input->post('kelapa_kampung_btr',TRUE),
                'Kelapa_Kampung_Prcnt'      => substr(($this->input->post('kelapa_kampung_prcnt',TRUE)), 0, -2),
                'Kelapa_GHS_Btr'            => $this->input->post('kelapa_ghs_btr',TRUE),
                'Kelapa_GHS_Prcnt'          => substr(($this->input->post('kelapa_ghs_prcnt',TRUE)), 0, -2),
                'Kelapa_Kanal_Btr'          => $this->input->post('kelapa_kanal_btr',TRUE),
                'Kelapa_Kanal_Prcnt'        => substr(($this->input->post('kelapa_kanal_prcnt',TRUE)), 0, -2),
                'Aktual_Buka_KBA_Btr'       => $this->input->post('aktual_buka_kba_btr',TRUE),
                'Aktual_Buka_KBA_Prcnt'     => substr(($this->input->post('aktual_buka_kba_prcnt',TRUE)), 0, -2),
                'Kelapa_Organik_Btr'        => $this->input->post('kelapa_organik_btr',TRUE)
            ); 
            $this->M_Trn_Rekap_Produksi_Kelapa->insert($data);
            $this->session->set_flashdata('message', pesan('Data pada tanggal '.$tanggal_template.' berhasil disimpan.', 'success'));
            redirect(base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa'));
        } else{
            $this->session->set_flashdata('message', pesan('Data pada tanggal '.$tanggal_template.' sudah dibuat.', 'error'));
            redirect(base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa/create'));
        }
    }   
	
	function edit($id) 
    {
    	$did = decrypt_url($id);
        $row = $this->M_Trn_Rekap_Produksi_Kelapa->get_by_id($did); 

        if ($row->Produksi == 1){
            $checked1 = "checked";
            $checked2 = "";
        } else {
            $checked1 = "";
            $checked2 = "checked";
        } 

        if ($row) {
            $data = array(
                'title'                    => 'EDIT SCHEDULE PRODUKSI KELAPA : <strong>'.strtoupper(longdate_indo($row->Tanggal)).'</strong>',
                'action'                   => base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa/update/'.$did),
                'button'                   => 'Update',
                'cancel'                   => base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa'),
                'class_tgl'                => '',
                'tanggal'                  => tanggal_template($row->Tanggal),
                'checked1'                 => $checked1,
                'checked2'                 => $checked2,
                'rencana_buka_kba_btr'     => $row->Rencana_Buka_KBA_Btr,
                'total_pakai_kelapa_btr'   => $row->Total_Pakai_Kelapa_Btr,
                'reject_non_process_btr'   => $row->Reject_Non_Process_Btr,
                'reject_non_process_prcnt' => $row->Reject_Non_Process_Prcnt.' %',
                'kelapa_kampung_btr'       => $row->Kelapa_Kampung_Btr,
                'kelapa_kampung_prcnt'     => $row->Kelapa_Kampung_Prcnt.' %',
                'kelapa_ghs_btr'           => $row->Kelapa_GHS_Btr,
                'kelapa_ghs_prcnt'         => $row->Kelapa_GHS_Prcnt.' %',
                'kelapa_kanal_btr'         => $row->Kelapa_Kanal_Btr,
                'kelapa_kanal_prcnt'       => $row->Kelapa_Kanal_Prcnt.' %',
                'aktual_buka_kba_btr'      => $row->Aktual_Buka_KBA_Btr,
                'aktual_buka_kba_prcnt'    => $row->Aktual_Buka_KBA_Prcnt.' %',
                'kelapa_organik_btr'       => $row->Kelapa_Organik_Btr   
			);
            $data['message'] = $this->session->flashdata('message');
            $this->template->display('rekap_produksi/transaction/kelapa/form', $data);
        } else {
            redirect(base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa'));
        }
    }
	
	function update($did) 
    {
        $tanggal_template = $this->input->post('tanggal');
        $tanggal = tanggal_datebase($this->input->post('tanggal'));
        $row = $this->M_Trn_Rekap_Produksi_Kelapa->get_by_tanggal($tanggal);

        if ($row->Count <= 1){
        	$data = array(                
                'Tanggal'                   => $tanggal,
                'Produksi'                  => $this->input->post('produksi',TRUE),
                'Rencana_Buka_KBA_Btr'      => $this->input->post('rencana_buka_kba_btr',TRUE),
                'Total_Pakai_Kelapa_Btr'    => $this->input->post('total_pakai_kelapa_btr',TRUE),
                'Reject_Non_Process_Btr'    => $this->input->post('reject_non_process_btr',TRUE),
                'Reject_Non_Process_Prcnt'  => substr(($this->input->post('reject_non_process_prcnt',TRUE)), 0, -2),
                'Kelapa_Kampung_Btr'        => $this->input->post('kelapa_kampung_btr',TRUE),
                'Kelapa_Kampung_Prcnt'      => substr(($this->input->post('kelapa_kampung_prcnt',TRUE)), 0, -2),
                'Kelapa_GHS_Btr'            => $this->input->post('kelapa_ghs_btr',TRUE),
                'Kelapa_GHS_Prcnt'          => substr(($this->input->post('kelapa_ghs_prcnt',TRUE)), 0, -2),
                'Kelapa_Kanal_Btr'          => $this->input->post('kelapa_kanal_btr',TRUE),
                'Kelapa_Kanal_Prcnt'        => substr(($this->input->post('kelapa_kanal_prcnt',TRUE)), 0, -2),
                'Aktual_Buka_KBA_Btr'       => $this->input->post('aktual_buka_kba_btr',TRUE),
                'Aktual_Buka_KBA_Prcnt'     => substr(($this->input->post('aktual_buka_kba_prcnt',TRUE)), 0, -2),
                'Kelapa_Organik_Btr'        => $this->input->post('kelapa_organik_btr',TRUE)
            ); 
            $this->M_Trn_Rekap_Produksi_Kelapa->update($did, $data);        
    		$this->session->set_flashdata('message', pesan('Data pada tanggal '.$tanggal_template.' berhasil diupdate.', 'success'));
    		redirect(base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa'));
        }
    }
	
	function delete($id) 
    {
        $row = $this->M_Trn_Rekap_Produksi_Kelapa->get_by_id($id); 

        if ($row) {
        	$data = array(
            	'Deleted_Status'	=> 1
	    	);
            $this->M_Trn_Rekap_Produksi_Kelapa->delete($id, $data);
        } 
    }
}