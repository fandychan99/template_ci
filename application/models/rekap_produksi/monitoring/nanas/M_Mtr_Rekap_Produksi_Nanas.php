<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Mtr_Rekap_Produksi_Nanas extends CI_Model
{
	private $table = 'tbl_trn_rekap_produksi_nanas';  
    private $id = 'Produksi_Nanas_Id';

    function __construct()
    {
        parent::__construct();
    }

    function get_by_bulan_tahun($bulan, $tahun)
    {       
        $sql = $this->db->query("SELECT
                                        *
                                    FROM
                                        tbl_trn_rekap_produksi_nanas
                                    WHERE
                                        MONTH(Tanggal) = '$bulan' AND YEAR(Tanggal) = '$tahun' AND Deleted_Status = 0
                                    ORDER BY 
                                        Tanggal ASC;");
        return $sql->result();
    }

    function get_by_tahun($tahun)
    {       
        $sql = $this->db->query("SELECT
                                        MONTH(Tanggal) AS Bulan,
                                        YEAR(Tanggal) AS Tahun,
                                        SUM(Produksi) AS Hari_Produksi,
                                        SUM(Rencana_Buka_Nanas_Bh) AS Sum_Rencana_Buka_Nanas_Bh,
                                        SUM(Total_Pakai_Nanas_Bh) AS Sum_Total_Pakai_Nanas_Bh,
                                        SUM(Nanas_Reject_Bh) AS Sum_Nanas_Reject_Bh,
                                        SUM(Nanas_N1_Bh) AS Sum_Nanas_N1_Bh,
                                        SUM(Nanas_N2_Bh) AS Sum_Nanas_N2_Bh,
                                        SUM(Nanas_N3_Bh) AS Sum_Nanas_N3_Bh,
                                        SUM(Nanas_N4_Bh) AS Sum_Nanas_N4_Bh,
                                        SUM(Nanas_N5_Bh) AS Sum_Nanas_N5_Bh,
                                        SUM(Total_Bh) AS Sum_Total_Bh   
                                    FROM
                                        tbl_trn_rekap_produksi_nanas
                                    WHERE
                                        YEAR(Tanggal) = 2020 AND Deleted_Status = 0
                                    GROUP BY
                                        MONTH(Tanggal), YEAR(Tanggal)
                                    ORDER BY
                                        MONTH(Tanggal) ASC;");
        return $sql->result();
    }  
}