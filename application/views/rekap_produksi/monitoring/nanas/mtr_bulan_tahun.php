<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>PINEAPPLE PRODUCTION MONTHLY REPORT</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard"> 
            <div class="table-responsive">
            	<hr>
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <tr>                                           
                            <th rowspan="3" style="vertical-align: middle; text-align: center;"><span class="ml-1 mr-1">Tanggal</span></th>
                            <th rowspan="3" style="vertical-align: middle; text-align: center;"><span class="ml-1 mr-1">Hari</span></th>
                            <th rowspan="3" style="vertical-align: middle; text-align: center;">Produksi / Off</th>
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
                        ?>
                            <tr>
                                <td><?php echo $mrpn->Tanggal; ?></td>
                                <td><?php echo hari($mrpn->Tanggal); ?></td>                                               
                                <td>
                                    <?php 
                                        if ($mrpn->Produksi == 1){
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
                                <td><center><?php echo $mrpn->Rencana_Buka_Nanas_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Total_Pakai_Nanas_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_Reject_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_Reject_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N1_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N1_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N2_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N2_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N3_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N3_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N4_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N4_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N5_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Nanas_N5_Prcnt.' %'; ?></center></td>
                                <td><center><?php echo $mrpn->Total_Bh; ?></center></td>
                                <td><center><?php echo $mrpn->Total_Prcnt.' %'; ?></td>                                  
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