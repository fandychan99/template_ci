<style>
    .tableFixHead { overflow-y: auto; height: 700px; }
    
   
    tbody th {
        position: -webkit-sticky; /* for Safari */
        position: sticky;
        left: 0;
        background: #000;
        border-right: 1px solid #CCC;
    }

    input { 
        text-align: right; 
    }
</style>


<?php 
    $data_edit = json_decode(json_encode($_getedit), true);
    // var_dump($data_edit);
?>

<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('cogs_actual_sales_price/transaction/Cogs_Actual_Sales_Price/SimpanData') ?>">
    <input type="hidden" name="aksi" value="add">
    <input type="hidden" name="bulan" value="<?=$_GET['bulan']; ?>">
    <input type="hidden" name="tahun" value="<?=$_GET['tahun']; ?>">
    <div class="card">
        <div class="card-header">
            <!-- <h4 class="card-title">
            <i class="feather icon-server"></i> BASED ON 24% FAT CONTENT
            </h4> -->
        </div>
        <div class="card-content">
            <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="tableFixHead">
                                    <table id="customers" class="table table-bordered" style='width:4000px;'>
                                        <thead>
                                            <tr>
                                                <th rowspan="3" width='200px'><center>Product</center></th>
                                                <th rowspan="3"><center>Production Cost</center></th>
                                                <th colspan="<?=count($_getLabel) * 2; ?>"><center>Actual Price</center></th>
                                            </tr>
                                            <tr>
                                                <?php 
                                                foreach($_getLabel as $get){
                                                    echo "<th colspan='2'>$get->label</th>";
                                                }?>
                                            </tr>
                                            <tr>
                                                <?php 
                                                foreach($_getLabel as $get){
                                                    echo "<th>USD/MT</th>";
                                                    echo "<th>+/-</th>";
                                                }?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $plbl = count($_getLabel) * 2 + 1; 
                                                $plbl2 = count($_getLabel) * 2 + 2; 
                                                foreach($_getlv1 as $r1){
                                                    if($r1->havesub == 1){
                                                        echo "<tr><th><b><u>$r1->lvl1</u></b></th><td colspan='$plbl'></td></tr>";
                                                        $p = $r1->id;
                                                        $arr = json_decode(json_encode($_getlv2), true);
                                                        $result = array_filter($arr, function($item) use($p){
                                                            if($item['idlvl1'] == $p)
                                                                return true;
                                                            
                                                            return false;
                                                        });

                                                        foreach($result as $r2){
                                                            if($r2['havesub'] == 1){
                                                                echo "<tr><th><i>".$r2['lvl2']."</i></th><td colspan='$plbl'></td></tr>";
                                                                $p = $r2['id'];
                                                                $arr = json_decode(json_encode($_getlv3), true);
                                                                $results = array_filter($arr, function($item) use($p){
                                                                    if($item['idlvl2'] == $p)
                                                                        return true;
                                                                    return false;
                                                                });
                                                                foreach($results as $r3){
                                                                    $id3 = $r3['id'];
                                                                    $arr_fil = array('baris' => $id3, 'kolom' => 0);
                                                                    $hsl = array_filter($data_edit, function($item) use ($arr_fil){
                                                                        if($item['baris'] == $arr_fil['baris'])
                                                                            return true;
                                                                        return false;
                                                                    });
                                                                    // var_dump($hsl);

                                                                    $rs = array_column($hsl, 'price', 'kolom');
                                                                    echo "<tr><th>".$r3['lvl3']."</th>";
                                                                    echo "
                                                                        <td>
                                                                            <input type='hidden' name='baris[]' id='baris-$id3' value='$id3'>
                                                                            <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                                            <input type='text' name='price[]' id='price-".$id3."0' class='form-control'  value='$rs[0]'>
                                                                        </td>";
                                                                    foreach($_getLabel as $l){
                                                                        $a = "price-$id3$l->id"; $b = "price-$id3"."0"; $c = "price-$id3$l->id-A"; $fc = "hitung('".$a."', '".$b."', '".$c."')"; ?>
                                                                        <td><input type="text" class="form-control" name="price[]" id="price-<?=$id3;?><?=$l->id;?>" value="<?=$rs[$l->id]; ?>" onkeyup="<?=$fc; ?>">
                                                                        <?php echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$id3' value='$id3'>";
                                                                        echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$l->id' value='$l->id'></td>";
                                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$id3$l->id-A' value='".$rs[$l->id]."' readonly>";
                                                                        echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$id3' value='$id3'>";
                                                                        echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$l->id-A' value='$l->id-A'></td>";
                                                                    }    
                                                                    echo "</tr>";
                                                                }
                                                                echo "<tr><td colspan='$plbl2'></td></tr>";
                                                            }else{
                                                                $id2 = $r2['id'];
                                                                echo "
                                                                    <tr>
                                                                        <th>".$r2['lvl2']."</th>
                                                                        <td>
                                                                            <input type='hidden' name='baris[]' id='baris-$id2' value='$id2'>
                                                                            <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                                            <input type='text' name='price[]' id='price-".$id2."0' class='form-control'  value='0'>
                                                                        </td>";
                                                                foreach($_getLabel as $l){
                                                                    // echo "<td><input type='text' class='form-control' name='price[]' id='price-$id2$l->id' value='0' onkeyup='hitung()'>";
                                                                    $a = "price-$id2$l->id"; $b = "price-$id2"."0"; $c = "price-$id2$l->id-A"; $fc = "hitung('".$a."', '".$b."', '".$c."')"; ?>
                                                                    <td><input type="text" class="form-control" name="price[]" id="price-<?=$id2;?><?=$l->id;?>" value="0" onkeyup="<?=$fc; ?>">
                                                                    <?php
                                                                    echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$id2' value='$id2'>";
                                                                    echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$l->id' value='$l->id'></td>";
                                                                    
                                                                    echo "<td><input type='text' class='form-control' name='price[]' id='price-$id2$l->id-A' value='0' readonly>";
                                                                    echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$id2' value='$id2'>";
                                                                    echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$l->id-A' value='$l->id-A'></td>";
                                                                }
            
                                                                echo "
                                                                    </tr>                                                    
                                                                ";
                                                            }
                                                        }
                                                    }else{
                                                        echo "
                                                            <tr>
                                                                <th>$r1->lvl1</th>
                                                                <td>
                                                                    <input type='hidden' name='baris[]' id='baris-$r1->id' value='$r1->id'>
                                                                    <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                                    <input type='text' name='price[]' id='price-".$r1->id."0' class='form-control'  value='0'>
                                                                </td>";
                                                        $id1 = $r1->id;
                                                        foreach($_getLabel as $l){
                                                            // echo "<td><input type='text' class='form-control' name='price[]' id='price-$r1->id$l->id' value='0' onkeyup='hitung()'>";
                                                            $a = "price-$id1$l->id"; $b = "price-$id1"."0"; $c = "price-$id1$l->id-A"; $fc = "hitung('".$a."', '".$b."', '".$c."')"; ?>
                                                            <td><input type="text" class="form-control" name="price[]" id="price-<?=$id1;?><?=$l->id;?>" value="0" onkeyup="<?=$fc; ?>">
                                                            <?php
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$r1->id' value='$r1->id'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$l->id' value='$l->id'></td>";
                                                            
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$r1->id$l->id-A' value='0' readonly>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$r1->id' value='$r1->id'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$l->id-A' value='$l->id-A'></td>";
                                                        }

                                                        echo "
                                                            </tr>                                                    
                                                        ";
                                                    }
                                                    echo "<tr><td colspan='$plbl2'></td></tr>";
                                                }
                                            ?>
                                        </tbody>   
                                    </table>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <button type="submit" class="btn bg-gradient-info mr-1 mb-1 waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form>




<script>
    var $th = $('.tableFixHead').find('thead th')
        $('.tableFixHead').on('scroll', function() {
        $th.css('transform', 'translateY('+ this.scrollTop +'px)');
    });

    function hitung(input, pembagi, hasil){
        var inp = document.getElementById(input).value;
        var pbi = document.getElementById(pembagi).value;

        var hsl = (inp - pbi) / pbi * 100;

        console.log(inp);
        document.getElementById(hasil).value = hsl;
    }
</script>