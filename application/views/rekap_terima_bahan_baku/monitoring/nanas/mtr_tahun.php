<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>SCHEDULE RECEIVE PINEAPPLE MONTHLY REPORT</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard"> 
            <div class="table-responsive">
            	<hr>
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Bulan</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Tafsiran Nanas (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Jumlah Hari (Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Total Tafsiran Nanas (Buah)</th>
                            <th style="vertical-align: middle; text-align: center;" colspan="6">Aktual Terima Nanas Bagus</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Hari Kerja (HK)</th>
                            <th style="vertical-align: middle; text-align: center;" colspan="7">Total Aktual Terima Nanas Bagus</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Nanas Riject</th>
                            <th style="vertical-align: middle; text-align: center;" colspan="2">Total Nanas Riject</th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-1 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-2 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-3 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-4 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-5 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Total (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-1 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-2 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-3 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-4 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-5 (Buah/Hari)</th>
                            <th style="vertical-align: middle; text-align: center;" colspan="2">Total</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Buah</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">%</th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Buah</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_getData as $get){
                            $month = $get->Bulan;
                            $year  = $get->Tahun;
                            $jml   = date('t', mktime(0, 0, 0, $month, 1, $year));
                            $total_tafsiran = $get->TafsiranNanas*$jml;
                            $total = $get->AktualTerima_Nanas_N_1+$get->AktualTerima_Nanas_N_2+$get->AktualTerima_Nanas_N_3+$get->AktualTerima_Nanas_N_4+$get->AktualTerima_Nanas_N_5;

                            $nanas1 = $get->AktualTerima_Nanas_N_1*$get->HariKerja;
                            $nanas2 = $get->AktualTerima_Nanas_N_2*$get->HariKerja;
                            $nanas3 = $get->AktualTerima_Nanas_N_3*$get->HariKerja;
                            $nanas4 = $get->AktualTerima_Nanas_N_4*$get->HariKerja;
                            $nanas5 = $get->AktualTerima_Nanas_N_5*$get->HariKerja;
                            $total2 = $nanas1+$nanas2+$nanas3+$nanas4+$nanas5;
                            $percent = $total_tafsiran/$total2;

                            $total3 = $get->NanasRiject*$get->HariKerja;
                            $percent2 = $total3/$total2;

                            ?>
                            <tr>
                                <td><?php echo angka_bulan($get->Bulan).' '.$get->Tahun; ?></td>
                                <td style="text-align: right;"><?php echo number_format($get->TafsiranNanas)?></td>
                                <td style="text-align: center;"><?php echo $jml?></td>
                                <td style="text-align: right;"><?php echo number_format($total_tafsiran)?></td>
                                <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_1)?></td>
                                <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_2)?></td>
                                <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_3)?></td>
                                <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_4)?></td>
                                <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_5)?></td>
                                <td style="text-align: right;"><?php echo number_format($total)?></td>
                                <td style="text-align: center;"><?php echo $get->HariKerja?></td>
                                <td style="text-align: right;"><?php echo number_format($nanas1)?></td>
                                <td style="text-align: right;"><?php echo number_format($nanas2)?></td>
                                <td style="text-align: right;"><?php echo number_format($nanas3)?></td>
                                <td style="text-align: right;"><?php echo number_format($nanas4)?></td>
                                <td style="text-align: right;"><?php echo number_format($nanas5)?></td>
                                <td style="text-align: right;"><?php echo number_format($total2)?></td>
                                <td><?php echo number_format($percent,2)?></td>
                                <td style="text-align: right;"><?php echo number_format($get->NanasRiject)?></td>
                                <td style="text-align: right;"><?php echo number_format($total3)?></td>
                                <td><?php echo number_format($percent2,2)?></td>
                            </tr>
                        <?php }?>
                    </tbody>                                    
                </table>
            </div>
            <hr>
            <a href="" class="btn bg-gradient-success mr-1 mb-1 waves-effect waves-light"><i class="fa fa-file-excel-o"></i> Export Excel</a>
            <a href="" class="btn bg-gradient-warning mr-1 mb-1 waves-effect waves-light"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
        </div>
    </div>
</div>