<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trn_Rekap_Produksi_Nanas extends CI_Controller
{
	function __construct()
    {
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }

        $this->load->model(array('rekap_produksi/transaction/nanas/M_Trn_Rekap_Produksi_Nanas'));
    }    
	
	function index()
    {
		
        $trn_rekap_produksi_nanas = $this->M_Trn_Rekap_Produksi_Nanas->get_all();

		$data = array(
			'link_create_new' => base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas/create'),
            'link_edit' => base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas/edit/'),
            'trn_rekap_produksi_nanas' => $trn_rekap_produksi_nanas  
		);
        $data['message'] = $this->session->flashdata('message');
		$this->template->display('rekap_produksi/transaction/nanas/index', $data);
    }

	function create() 
    {                                                
        $data = array(
            'title'                    => 'CREATE NEW SCHEDULE PRODUKSI NANAS',
            'action'                   => base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas/save'),            
            'button'                   => 'Save',
            'cancel'                   => base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas'),
            'class_tgl'                => 'pickadate',
            'tanggal'				   => tanggal_template(date('Y-m-d')),
            'checked1'				   => 'checked',
            'checked2'				   => '',
            'rencana_buka_nanas_bh'	   => '',
            'total_pakai_nanas_bh'     => '',
            'nanas_reject_bh'          => '',
            'nanas_reject_prcnt'       => '',
            'nanas_n1_bh'	           => '',
            'nanas_n1_prcnt'	       => '',
            'nanas_n2_bh'              => '',
            'nanas_n2_prcnt'           => '',
            'nanas_n3_bh'              => '',
            'nanas_n3_prcnt'           => '',
            'nanas_n4_bh'              => '',
            'nanas_n4_prcnt'           => '',
            'nanas_n5_bh'              => '',
            'nanas_n5_prcnt'           => '',
            'total_bh'	               => '',
            'total_prcnt'	           => ''
		);
        $data['message'] = $this->session->flashdata('message');        
        $this->template->display('rekap_produksi/transaction/nanas/form', $data);
    }
	
	function save() 
    {   
        $tanggal_template = $this->input->post('tanggal');
        $tanggal = tanggal_datebase($this->input->post('tanggal'));
        $row = $this->M_Trn_Rekap_Produksi_Nanas->get_by_tanggal($tanggal);

        if ($row->Count == 0){
            $data = array(                
                'Tanggal'                   => $tanggal,
                'Produksi'                  => $this->input->post('produksi',TRUE),
                'Rencana_Buka_Nanas_Bh'     => $this->input->post('rencana_buka_nanas_bh',TRUE),
                'Total_Pakai_Nanas_Bh'      => $this->input->post('total_pakai_nanas_bh',TRUE),
                'Nanas_Reject_Bh'           => $this->input->post('nanas_reject_bh',TRUE),
                'Nanas_Reject_Prcnt'        => substr(($this->input->post('nanas_reject_prcnt',TRUE)), 0, -2),
                'Nanas_N1_Bh'               => $this->input->post('nanas_n1_bh',TRUE),
                'Nanas_N1_Prcnt'            => substr(($this->input->post('nanas_n1_prcnt',TRUE)), 0, -2),
                'Nanas_N2_Bh'               => $this->input->post('nanas_n2_bh',TRUE),
                'Nanas_N2_Prcnt'            => substr(($this->input->post('nanas_n2_prcnt',TRUE)), 0, -2),
                'Nanas_N3_Bh'               => $this->input->post('nanas_n3_bh',TRUE),
                'Nanas_N3_Prcnt'            => substr(($this->input->post('nanas_n3_prcnt',TRUE)), 0, -2),
                'Nanas_N4_Bh'               => $this->input->post('nanas_n4_bh',TRUE),
                'Nanas_N4_Prcnt'            => substr(($this->input->post('nanas_n4_prcnt',TRUE)), 0, -2),
                'Nanas_N5_Bh'               => $this->input->post('nanas_n5_bh',TRUE),
                'Nanas_N5_Prcnt'            => substr(($this->input->post('nanas_n5_prcnt',TRUE)), 0, -2),
                'Total_Bh'                  => $this->input->post('total_bh',TRUE),
                'Total_Prcnt'               => substr(($this->input->post('total_prcnt',TRUE)), 0, -2)
            ); 
            $this->M_Trn_Rekap_Produksi_Nanas->insert($data);
            $this->session->set_flashdata('message', pesan('Data pada tanggal '.$tanggal_template.' berhasil disimpan.', 'success'));
            redirect(base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas'));
        } else{
            $this->session->set_flashdata('message', pesan('Data pada tanggal '.$tanggal_template.' sudah dibuat.', 'error'));
            redirect(base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas/create'));
        }
    }   
	
	function edit($id) 
    {
    	$did = decrypt_url($id);
        $row = $this->M_Trn_Rekap_Produksi_Nanas->get_by_id($did); 

        if ($row->Produksi == 1){
            $checked1 = "checked";
            $checked2 = "";
        } else {
            $checked1 = "";
            $checked2 = "checked";
        } 

        if ($row) {
            $data = array(
                'title'                    => 'EDIT SCHEDULE PRODUKSI NANAS : <strong>'.strtoupper(longdate_indo($row->Tanggal)).'</strong>',
                'action'                   => base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas/update/'.$did),
                'button'                   => 'Update',
                'cancel'                   => base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas'),
                'class_tgl'                => '',
                'tanggal'                  => tanggal_template($row->Tanggal),
                'checked1'                 => $checked1,
                'checked2'                 => $checked2,
                'rencana_buka_nanas_bh'    => $row->Rencana_Buka_Nanas_Bh,
                'total_pakai_nanas_bh'     => $row->Total_Pakai_Nanas_Bh,
                'nanas_reject_bh'          => $row->Nanas_Reject_Bh,
                'nanas_reject_prcnt'       => $row->Nanas_Reject_Prcnt,
                'nanas_n1_bh'              => $row->Nanas_N1_Bh,
                'nanas_n1_prcnt'           => $row->Nanas_N1_Prcnt,
                'nanas_n2_bh'              => $row->Nanas_N2_Bh,
                'nanas_n2_prcnt'           => $row->Nanas_N2_Prcnt.' %',
                'nanas_n3_bh'              => $row->Nanas_N3_Bh,
                'nanas_n3_prcnt'           => $row->Nanas_N3_Prcnt.' %',
                'nanas_n4_bh'              => $row->Nanas_N4_Bh,
                'nanas_n4_prcnt'           => $row->Nanas_N4_Prcnt.' %',
                'nanas_n5_bh'              => $row->Nanas_N5_Bh,
                'nanas_n5_prcnt'           => $row->Nanas_N5_Prcnt.' %',
                'total_bh'                 => $row->Total_Bh,
                'total_prcnt'              => $row->Total_Prcnt.' %'
			);
            $data['message'] = $this->session->flashdata('message');
            $this->template->display('rekap_produksi/transaction/nanas/form', $data);
        } else {
            redirect(base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas'));
        }
    }
	
	function update($did) 
    {
        $tanggal_template = $this->input->post('tanggal');
        $tanggal = tanggal_datebase($this->input->post('tanggal'));
        $row = $this->M_Trn_Rekap_Produksi_Nanas->get_by_tanggal($tanggal);

        if ($row->Count <= 1){
        	$data = array(                
                'Tanggal'                   => $tanggal,
                'Produksi'                  => $this->input->post('produksi',TRUE),
                'Rencana_Buka_Nanas_Bh'     => $this->input->post('rencana_buka_nanas_bh',TRUE),
                'Total_Pakai_Nanas_Bh'      => $this->input->post('total_pakai_nanas_bh',TRUE),
                'Nanas_Reject_Bh'           => $this->input->post('nanas_reject_bh',TRUE),
                'Nanas_Reject_Prcnt'        => substr(($this->input->post('nanas_reject_prcnt',TRUE)), 0, -2),
                'Nanas_N1_Bh'               => $this->input->post('nanas_n1_bh',TRUE),
                'Nanas_N1_Prcnt'            => substr(($this->input->post('nanas_n1_prcnt',TRUE)), 0, -2),
                'Nanas_N2_Bh'               => $this->input->post('nanas_n2_bh',TRUE),
                'Nanas_N2_Prcnt'            => substr(($this->input->post('nanas_n2_prcnt',TRUE)), 0, -2),
                'Nanas_N3_Bh'               => $this->input->post('nanas_n3_bh',TRUE),
                'Nanas_N3_Prcnt'            => substr(($this->input->post('nanas_n3_prcnt',TRUE)), 0, -2),
                'Nanas_N4_Bh'               => $this->input->post('nanas_n4_bh',TRUE),
                'Nanas_N4_Prcnt'            => substr(($this->input->post('nanas_n4_prcnt',TRUE)), 0, -2),
                'Nanas_N5_Bh'               => $this->input->post('nanas_n5_bh',TRUE),
                'Nanas_N5_Prcnt'            => substr(($this->input->post('nanas_n5_prcnt',TRUE)), 0, -2),
                'Total_Bh'                  => $this->input->post('total_bh',TRUE),
                'Total_Prcnt'               => substr(($this->input->post('total_prcnt',TRUE)), 0, -2)
            ); 
            $this->M_Trn_Rekap_Produksi_Nanas->update($did, $data);        
    		$this->session->set_flashdata('message', pesan('Data pada tanggal '.$tanggal_template.' berhasil diupdate.', 'success'));
    		redirect(base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas'));
        }
    }
	
	function delete($id) 
    {
        $row = $this->M_Trn_Rekap_Produksi_Nanas->get_by_id($id); 

        if ($row) {
        	$data = array(
            	'Deleted_Status'	=> 1
	    	);
            $this->M_Trn_Rekap_Produksi_Nanas->delete($id, $data);
        } 
    }
}