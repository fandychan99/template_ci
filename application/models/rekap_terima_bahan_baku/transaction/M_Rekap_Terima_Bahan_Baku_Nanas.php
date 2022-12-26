<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Rekap_Terima_Bahan_Baku_Nanas extends CI_Model{

	function get_MstFactory(){
		$query = $this->db->query("SELECT * FROM tblMstFactory");
		return $query->result();
	}
	function simpan($data){
		$this->db->insert('tblTrnTerimaNanas',$data);
	}

	function cek_Data($tgl){
		$query = $this->db->query("SELECT count(Tanggal) as jml FROM tblTrnTerimaNanas where Tanggal = '$tgl'");
		return $query->row();
	}

	function get_TrnTerimaNanas(){
		$query = $this->db->query("SELECT * FROM tblTrnTerimaNanas where InActive IS NULL");
		return $query->result();
	}

	function get_TrnTerimaNanas_by_id($tgl){
		$query = $this->db->query("SELECT * FROM tblTrnTerimaNanas where Tanggal = '$tgl'");
		return $query->result();
	}

	function update($id,$data){
		$this->db->where('TerimaNanasID',$id);
		$this->db->update('tblTrnTerimaNanas',$data);
	}

	function delete($id,$data){
		$this->db->where('TerimaNanasID',$id);
		$this->db->update('tblTrnTerimaNanas',$data);
	}

	 // Rencana Buka Kelapa
	function get_data($bulan, $tahun){
        $awal = $tahun."-".str_pad($bulan,2,"0",STR_PAD_LEFT)."-01";
        $akhir = date("Y-m-t", strtotime($awal));
        $this->db->where("Tanggal BETWEEN '$awal' AND '$akhir' ");
        return $this->db->get('tbl_trn_rencana_terima_nanas')->result();
    }

    function simpan_rekap($aksi, $tanggal, $jumlah){
        $data_simpan = array();
        if($aksi == "add"){
            for($i = 0; $i < count($tanggal); $i++){
                $arr = array(
                    'Tanggal' => date('Y-m-d', strtotime($tanggal[$i])),
                    'Jumlah' => $jumlah[$i],
                    'CreatedBy' => $this->session->userdata('Username'),
                    'CreatedDate' => date('Y-m-d H:i:s')
                );

                array_push($data_simpan, $arr);
            }

            $this->db->insert_batch('tbl_trn_rencana_terima_nanas', $data_simpan);
        }else{
            for($i = 0; $i < count($tanggal); $i++){
                $arr = array(
                    'Tanggal' => date('Y-m-d', strtotime($tanggal[$i])),
                    'Jumlah' => $jumlah[$i],
                    'UpdatedBy' => $this->session->userdata('Username'),
                    'UpdatedDate' => date('Y-m-d H:i:s')
                );

                array_push($data_simpan, $arr);
            }

            $this->db->update_batch('tbl_trn_rencana_terima_nanas', $data_simpan, 'Tanggal');
        }
    }

}