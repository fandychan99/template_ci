<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>

<?php 
    $bulan = [
        "",
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];
?>
<div class="card" id="result">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>BASED ON 24% FAT CONTENT</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard"> 
            <div class="table-responsive">
            	<hr>
                <table class="table table-striped table-bordered complex-headers font_size">
                    <thead>
                        <?php 
                        $jml = count($_getBuyer);
                        for($i = 0; $i <= 12; $i++){
                            if($i == 0) {
                                echo "<tr>
                                <th style='vertical-align: middle; text-align: center;' rowspan='3'>Bulan</th>";
                                foreach($_getBuyer as $r){
                                    echo "<th style='vertical-align: middle; text-align: center;' colspan='4'>$r->Abbr_buyer</th>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                for ($i=0; $i < count($_getBuyer); $i++) { 
                                    echo "<th style='vertical-align: middle; text-align: center;' colspan ='2'>(MT)</th>";
                                    echo "<th style='vertical-align: middle; text-align: center;' rowspan= '2'>+/-</th>";
                                    echo "<th style='vertical-align: middle; text-align: center;' rowspan= '2'>(%)</th>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                for ($i=0; $i < count($_getBuyer); $i++) { 
                                    echo "<th style='vertical-align: middle; text-align: center;'>Plan</th>";
                                    echo "<th style='vertical-align: middle; text-align: center;'>Real</th>";
                                }
                                echo "</tr>";
                                echo "</thead><tbody>";
                            }else{
                                echo "<tr><td>$bulan[$i]</td>";
                                if(!empty($_getData24)){
                                    foreach ($_getData24 as $r) {
                                        if($r->Bulan == $i){
                                            echo "<td>$r->Quantity</td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        }else{
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        }
                                    }    
                                }
                                
                                echo "</tr>";
                            }
                            
                        } ?> 

                    </tbody>                                    
                </table>
            </div>
        </div>
    </div>
</div>