<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>RECEIVE COCONUT MONTHLY REPORT</h4>
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
                            <th rowspan="2" style="vertical-align: middle; text-align: center;">Produksi / Off</th>
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
                        ?>
                            <tr>
                                <td><?php echo $mrpk->Tanggal; ?></td>
                                <td><?php echo hari($mrpk->Tanggal); ?></td>                                               
                                <td>
                                    <?php 
                                        if ($mrpk->Produksi == 1){
                                            echo "<div class='chip chip-success mr-1'>";
                                                echo "<div class='chip-body'>";                                
                                                    echo "<div class='avatar'>";
                                                        echo "<i class='feather icon-check'></i>";
                                                    echo "</div>";
                                                    echo "<span class='chip-text'>Production</span>";
                                                echo "</div>";
                                            echo "</div>";
                                        } else {
                                            echo "<div class='chip chip-danger mr-1'>";
                                                echo "<div class='chip-body'>";                                   
                                                    echo "<div class='avatar'>";
                                                        echo "<i class='feather icon-x'></i>";
                                                    echo "</div>";
                                                    echo "<span class='chip-text'>Off</span>";
                                                echo "</div>";
                                            echo "</div>";
                                        }
                                    ?>                                                        
                                </td>
                                <td><center><?php echo $mrpk->Rencana_Buka_KBA_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Total_Pakai_Kelapa_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Reject_Non_Process_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Reject_Non_Process_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Kelapa_Kampung_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Kelapa_Kampung_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Kelapa_GHS_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Kelapa_GHS_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Kelapa_Kanal_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Kelapa_Kanal_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpk->Aktual_Buka_KBA_Btr; ?></center></td>
                                <td><center><?php echo $mrpk->Aktual_Buka_KBA_Prcnt.' %'; ?></td>
                                <td><center><?php echo $mrpk->Kelapa_Organik_Btr; ?></td>                                            
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