
<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>SUMMARY RECEIVE COCONUT KB-A ANNUAL REPORT</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard"> 
            <div class="table-responsive">
            	<hr>
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;"><span class="ml-1 mr-1">Bulan</span></th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Tafsirann KB-A (Butir/Hari)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Jumlah Hari (Hari)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Total Tafsiran KB-A (Butir)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Aktual Terima KB-A (Butir/Hari)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Hari Kerja (HK)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Total Terima KB-A (Butir)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_getData as $get){
                            $month = $get->Bulan;
                            $year  = $get->Tahun;
                            $jml   = date('t', mktime(0, 0, 0, $month, 1, $year));
                            $total_tafsiran = $get->Tafsiran * $jml;
                            $total_aktual = $get->AktualTerima * $get->HariKerja;
                            $percent = $total_aktual/$total_tafsiran;
                            ?>
                            <td style="text-align: center;"><?php echo angka_bulan($get->Bulan).' '.$get->Tahun; ?></td>
                            <td style="text-align: right;"><?php echo number_format($get->Tafsiran); ?></td>
                            <td style="text-align: center;"><?php echo number_format($jml); ?></td>
                            <td style="text-align: right;"><?php echo number_format($total_tafsiran); ?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima); ?></td>
                            <td style="text-align: center;"><?php echo $get->HariKerja; ?></td>
                            <td style="text-align: right;"><?php echo number_format($total_aktual); ?></td>
                            <td style="text-align: center;"><?php echo number_format($percent,2); ?></td>
                        <?php }?>
                    </tbody>                                    
                </table>
            </div>
        </div>
    </div>
</div>