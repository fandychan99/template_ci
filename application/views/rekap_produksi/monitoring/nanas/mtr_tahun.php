<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>PINEAPPLE PRODUCTION ANNUAL REPORT/h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard"> 
            <div class="table-responsive">
            	<hr>
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <tr>                                           
                            <th rowspan="3" style="vertical-align: middle; text-align: center;"><span class="ml-1 mr-1">Bulan</span></th>
                            <th rowspan="3" style="vertical-align: middle; text-align: center;">Hari Produksi (HK)</th>
                            <th rowspan="3" style="vertical-align: middle; text-align: center;">Rencana Buka Nanas (Buah)</th>
                            <th rowspan="3" style="vertical-align: middle; text-align: center;">Total Pakai Nanas (Buah)</th>
                            <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center;">Nanas Reject</th>
                            <th colspan="12" style="vertical-align: middle; text-align: center;">Pakai Nanas Bagus</th>
                        </tr>
                        <tr>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Nanas N-1</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Nanas N-2</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Nanas N-3</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Nanas N-4</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Nanas N-5</th>
                            <th colspan="2" style="vertical-align: middle; text-align: center;">Total</th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;">(Buah)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Buah)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Buah)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Buah)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Buah)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Buah)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                            <th style="vertical-align: middle; text-align: center;">(Buah)</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>                                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($mtr_rekap_produksi_nanas as $mrpn) {

                                $nanas_reject_prcnt =  $mrpn->Sum_Total_Pakai_Nanas_Bh == 0 ? 0 : ($mrpn->Sum_Nanas_Reject_Bh/$mrpn->Sum_Total_Pakai_Nanas_Bh)*100;

                                $nanas_n1_prcnt = $mrpn->Sum_Total_Pakai_Nanas_Bh == 0 ? 0 : ($mrpn->Sum_Nanas_N1_Bh/$mrpn->Sum_Total_Pakai_Nanas_Bh)*100;

                                $nanas_n2_prcnt = $mrpn->Sum_Total_Pakai_Nanas_Bh == 0 ? 0 : ($mrpn->Sum_Nanas_N2_Bh/$mrpn->Sum_Total_Pakai_Nanas_Bh)*100;

                                $nanas_n3_prcnt = $mrpn->Sum_Total_Pakai_Nanas_Bh == 0 ? 0 : ($mrpn->Sum_Nanas_N3_Bh/$mrpn->Sum_Total_Pakai_Nanas_Bh)*100;

                                $nanas_n4_prcnt = $mrpn->Sum_Total_Pakai_Nanas_Bh == 0 ? 0 : ($mrpn->Sum_Nanas_N4_Bh/$mrpn->Sum_Total_Pakai_Nanas_Bh)*100;

                                $nanas_n5_prcnt = $mrpn->Sum_Total_Pakai_Nanas_Bh == 0 ? 0 : ($mrpn->Sum_Nanas_N5_Bh/$mrpn->Sum_Total_Pakai_Nanas_Bh)*100;

                                $total_prcnt = $mrpn->Sum_Total_Pakai_Nanas_Bh == 0 ? 0 : ($mrpn->Sum_Total_Bh/$mrpn->Sum_Total_Pakai_Nanas_Bh)*100;
                        ?>
                            <tr>
                                <td><?php echo angka_bulan($mrpn->Bulan).' '.$mrpn->Tahun; ?></td>
                                <td><center><?php echo $mrpn->Hari_Produksi; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Rencana_Buka_Nanas_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Total_Pakai_Nanas_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Nanas_Reject_Bh; ?></center></td>
                                <td><center><?php echo number_format($nanas_reject_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Nanas_N1_Bh; ?></center></td>
                                <td><center><?php echo number_format($nanas_n1_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Nanas_N2_Bh; ?></center></td>
                                <td><center><?php echo number_format($nanas_n2_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Nanas_N3_Bh; ?></center></td>
                                <td><center><?php echo number_format($nanas_n3_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Nanas_N4_Bh; ?></center></td>
                                <td><center><?php echo number_format($nanas_n4_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Nanas_N5_Bh; ?></center></td>
                                <td><center><?php echo number_format($nanas_n5_prcnt, 2).' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Sum_Total_Bh; ?></center></td>
                                <td><center><?php echo number_format($total_prcnt, 2).' %'; ?></td>
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