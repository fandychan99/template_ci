
<form action="<?=site_url('rekap_terima_bahan_baku/transaction/Trn_Rencana_Terima_Nanas/Save'); ?>" method="post">
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th style="width: 25%;">Tanggal</th>
            <th>Jumlah</th>
        </tr>
        <?php
            if(!empty($_rencana)){
                echo "<input type='hidden' name='aksi' value='edit' />";
                foreach($_rencana as $r){
                    echo "<tr>";
                    echo "<td><input type='text' name='tanggal[]' value='".date('d-m-Y',strtotime($r->Tanggal))."' class='form-control' readonly /></td>";
                    echo "<td><input type='text' name='jumlah[]' value='$r->Jumlah' class='form-control' /> </td>";
                    echo "</tr>";
                }
            }else{
                echo "<input type='hidden' name='aksi' value='add' />";
                for($i = 1; $i <= $_jumlah; $i++){
                    $tanggal = str_pad($i,2,"0",STR_PAD_LEFT)."-".str_pad($_bulan,2,"0",STR_PAD_LEFT)."-".$_tahun;
                    echo "<tr>";
                    echo "<td><input type='text' name='tanggal[]' value='$tanggal' class='form-control' readonly /></td>";
                    echo "<td><input type='text' name='jumlah[]' value='0' class='form-control' /> </td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
<button type="submit"><i class="fa fa-save btn btn-gradient-bg"></i> Simpan Data</button>
</form>
