<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Mtr_Rekap_Produksi_Kelapa extends CI_Model
{
	private $table = 'tbl_trn_rekap_produksi_kelapa';  
    private $id = 'Produksi_Kelapa_Id';

    function __construct()
    {
        parent::__construct();
    }

    function get_by_bulan_tahun($bulan, $tahun)
    {       
        $sql = $this->db->query("SELECT
                                        *
                                    FROM
                                        tbl_trn_rekap_produksi_kelapa
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
                                        SUM(Rencana_Buka_KBA_Btr) AS Sum_Rencana_Buka_KBA_Btr,
                                        SUM(Total_Pakai_Kelapa_Btr) AS Sum_Total_Pakai_Kelapa_Btr,
                                        SUM(Reject_Non_Process_Btr) AS Sum_Reject_Non_Process_Btr,
                                        SUM(Kelapa_Kampung_Btr) AS Sum_Kelapa_Kampung_Btr,
                                        SUM(Kelapa_GHS_Btr) AS Sum_Kelapa_GHS_Btr,
                                        SUM(Kelapa_Kanal_Btr) AS Sum_Kelapa_Kanal_Btr,
                                        SUM(Aktual_Buka_KBA_Btr) AS Sum_Aktual_Buka_KBA_Btr,
                                        SUM(Kelapa_Organik_Btr) AS Sum_Kelapa_Organik_Btr   
                                    FROM
                                        tbl_trn_rekap_produksi_kelapa
                                    WHERE
                                        YEAR(Tanggal) = '$tahun' AND Deleted_Status = 0
                                    GROUP BY
                                        MONTH(Tanggal), YEAR(Tanggal)
                                    ORDER BY
                                        MONTH(Tanggal) ASC;");
        return $sql->result();
    }  
}