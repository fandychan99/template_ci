<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Trn_Rekap_Produksi_Nanas extends CI_Model
{
	private $table = 'tbl_trn_rekap_produksi_nanas';  
    private $id = 'Produksi_Nanas_Id';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_all()
    {
		$this->db->where('Deleted_Status', 0);
        $this->db->order_by('Tanggal', 'DESC');
		return $this->db->get($this->table)->result();		
    }

    function get_by_id($id)
    {       
        $table = $this->table;
        $this->db->where($this->id, $id);
        
        return $this->db->get($table)->row();
    }

    function get_by_tanggal($tanggal)
    {       
        $sql = $this->db->query("SELECT
                                        COUNT(Produksi_Nanas_Id) AS Count
                                    FROM
                                        tbl_trn_rekap_produksi_nanas
                                    WHERE
                                        Tanggal = '$tanggal' AND Deleted_Status = 0;");
        return $sql->row();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }   

      // Rencana Buka Kelapa
      function get_data($bulan, $tahun){
        $awal = $tahun."-".str_pad($bulan,2,"0",STR_PAD_LEFT)."-01";
        $akhir = date("Y-m-t", strtotime($awal));
        
        // echo $awal;
        // echo $akhir;
        $this->db->where("Tanggal BETWEEN '$awal' AND '$akhir' ");
        return $this->db->get('tbl_trn_rencana_produksi_nanas')->result();
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

            $this->db->insert_batch('tbl_trn_rencana_produksi_nanas', $data_simpan);
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

            $this->db->update_batch('tbl_trn_rencana_produksi_nanas', $data_simpan, 'Tanggal');
        }
    }
}