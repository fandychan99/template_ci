<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>COCONUT PRODUCTION ANNUAL REPORT</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard"> 
            <div class="table-responsive">
            	<hr>
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;"><span class="ml-1 mr-1">Bulan</span></th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Hari Produksi (HK)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Rencana Buka KB-A (Butir)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Total Pakai Kelapa (Butir)</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Reject Non Process</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Kelapa Kampung</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Kelapa GHS</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Kelapa Kanal</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Aktual Buka KB-A</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Kelapa Organik (Butir)</th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;">(Butir)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Butir)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Butir)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Butir)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Butir)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>                                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($mtr_rekap_produksi_kelapa as $mrpk) {

                                $reject_non_process_prcnt =  $mrpk->Sum_Total_Pakai_Kelapa_Btr == 0 ? 0 : ($mrpk->Sum_Reject_Non_Process_Btr/$mrpk->Sum_Total_Pakai_Kelapa_Btr)*100;

                                $kelapa_kampung_prcnt = $mrpk->Sum_Aktual_Buka_KBA_Btr == 0 ? 0 : ($mrpk->Sum_Kelapa_Kampung_Btr/$mrpk->Sum_Aktual_Buka_KBA_Btr)*100;

                                $kelapa_ghs_prcnt = $mrpk->Sum_Aktual_Buka_KBA_Btr == 0 ? 0 : ($mrpk->Sum_Kelapa_GHS_Btr/$mrpk->Sum_Aktual_Buka_KBA_Btr)*100;

                                $kelapa_kanal_prcnt = $mrpk->Sum_Aktual_Buka_KBA_Btr == 0 ? 0 : ($mrpk->Sum_Kelapa_Kanal_Btr/$mrpk->Sum_Aktual_Buka_KBA_Btr)*100;

                                $aktual_buka_kba_prcnt = $mrpk->Sum_Rencana_Buka_KBA_Btr == 0 ? 0 : ($mrpk->Sum_Aktual_Buka_KBA_Btr/$mrpk->Sum_Rencana_Buka_KBA_Btr)*100;

                        ?>
                            <tr>
                                <td><?php echo angka_bulan($mrpk->Bulan).' '.$mrpk->Tahun; ?></td>
                                <td><center><?php echo $mrpk->Hari_Produksi; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Rencana_Buka_KBA_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Total_Pakai_Kelapa_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Reject_Non_Process_Btr; ?></center></td>
                                <td><center><?php echo number_format($reject_non_process_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Kelapa_Kampung_Btr; ?></center></td>
                                <td><center><?php echo number_format($kelapa_kampung_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Kelapa_GHS_Btr; ?></center></td>
                                <td><center><?php echo number_format($kelapa_ghs_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Kelapa_Kanal_Btr; ?></center></td>
                                <td><center><?php echo number_format($kelapa_kanal_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Aktual_Buka_KBA_Btr; ?></center></td>
                                <td><center><?php echo number_format($aktual_buka_kba_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Sum_Kelapa_Organik_Btr; ?></td>                                            
                            </tr>
                        <?php
                            } 
                        ?>
                    </tbody>                                    
                </table>
            </div>
        </div>
    </div>
</div>