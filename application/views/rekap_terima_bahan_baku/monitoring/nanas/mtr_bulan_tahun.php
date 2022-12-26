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
            <hr>
            <div class="table-responsive">
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Tanggal</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Hari</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Tafsiran Nanas (Buah)</th>
                            <th style="vertical-align: middle; text-align: center;" colspan="8">Aktual Terima</th>
                            <th style="vertical-align: middle; text-align: center;" colspan="2">Total Aktual Terima</th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-1 (Buah) </th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-2 (Buah) </th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-3 (Buah) </th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-4 (Buah) </th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-5 (Buah) </th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Total (Buah)</th>
                            <th style="vertical-align: middle; text-align: center;" colspan="2">Nanas Reject</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Buah</th>
                            <th style="vertical-align: middle; text-align: center;" rowspan="2">%</th>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;">Buah</th>
                            <th style="vertical-align: middle; text-align: center;">%</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($_getData as $get){
                         $total = $get->AktualTerima_Nanas_N_1+$get->AktualTerima_Nanas_N_2+$get->AktualTerima_Nanas_N_3+$get->AktualTerima_Nanas_N_4+$get->AktualTerima_Nanas_N_5;
                         // $precent1 = 
                         $totalAktual = $total+$get->NanasRiject;
                         $precent1 = $total/$totalAktual;
                         if($get->TafsiranNanas != 0){
                            $precent2 = $totalAktual/$get->TafsiranNanas;
                         }else{
                            $precent2 = 0;
                         }
                        ?>
                        <tr>
                            <td><?php echo date('d-m-Y',strtotime($get->Tanggal));?></td>
                            <td><?php echo hari($get->Tanggal);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->TafsiranNanas);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_1);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_2);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_3);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_4);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->AktualTerima_Nanas_N_5);?></td>
                            <td style="text-align: right;"><?php echo number_format($total);?></td>
                            <td style="text-align: right;"><?php echo number_format($get->NanasRiject);?></td>
                            <td style="text-align: center;"><?php echo number_format($precent1,2);?></td>
                            <td style="text-align: right;"><?php echo number_format($totalAktual);?></td>
                            <td style="text-align: center;"><?php echo number_format($precent2,2);?></td>
                        </tr>
                        <?php }?>
                    </tbody>                                    
                </table>
            </div>
        </div>
    </div>
</div>