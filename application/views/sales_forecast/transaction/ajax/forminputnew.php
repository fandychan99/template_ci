<table>

<?php
    $bulan = ["", "januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    for($i = 0; $i <= 12; $i++){
        if($i == 0) { // Ini untuk Header Baris ke 0
            echo "<tr><th>Bulan</th>";
            foreach($getBuyer as $r){
                echo "<th>$r->Abbr_buyer</th>";
            }
            echo "</tr>";
        }
        else{ // Ini untuk detail
            echo "<tr><td>$bulan[$i]</td>";
            foreach($getBuyer as $r){
                echo "<td>
                    <input type='text' name='txtQty[]' value='0' />
                    <input type='hidden' name='txtBuyer[]' value='$r->Abbr_buyer' />
                </td>";
            }
            echo "</tr>";
        }
    }
?>

</table>