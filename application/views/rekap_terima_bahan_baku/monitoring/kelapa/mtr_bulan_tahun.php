<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>SCHEDULE RECEIVE COCONUT KB-A MONTHLY REPORT</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard"> 
            <div class="table-responsive">
            	<hr>
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;"><span class="ml-1 mr-1">Tanggal</span></th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;"><span class="ml-1 mr-1">Hari</span></th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Tafsiran KB - A (Butir)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Aktual Terima KB - A (Butir)</th>
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">%</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach($_getData as $get){
                            $hari = hari($get->Tanggal);
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo date('d-m-Y',strtotime($get->Tanggal));?></td>
                            <td style="text-align: center;"><?php echo hari($get->Tanggal);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->Tafsiran);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima/$get->Tafsiran,2);?></td>
                        </tr>     
                       <?php }?>
                    </tbody>                                    
                </table>
            </div>
        </div>
    </div>
</div>