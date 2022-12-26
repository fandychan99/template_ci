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
<div class="card">
    <div class="card-header">
        <!-- <h4 class="card-title">
        <i class="feather icon-server"></i> BASED ON 24% FAT CONTENT
        </h4> -->
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('sales_forecast/transaction/Input_Sales_Forecast_Real_Shipment/simpanData') ?>">
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
                                        <!-- UHT Coconut Cream / Milk -->
                                        <tr>
                                            <th colspan="<?=(count($_getLabel) * 2) + 2; ?>"><b><u>UHT Coconut Cream Milk</u></b></th>
                                        </tr>
                                        <tr>
                                            <th><i>Retail Pack FC 24%</i></th>
                                            <td colspan="<?=(count($_getLabel) * 2) + 1; ?>"></td>
                                        </tr>
                                        <?php 
                                            $rfc24 = array('65 ml', '200 ml', '200 ml CB', '400 ml', '500 ml CB', '1000 ml');
                                            $b = 1;
                                            foreach($rfc24 as $r){
                                                $k = 1;
                                                echo "<tr>
                                                        <th>$r</th>
                                                        <td>
                                                            <input type='hidden' name='baris[]' id='baris-$b' value='$b'>
                                                            <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                            <input type='text' name='price[]' id='price-".$b."0' class='form-control'  value='0'>
                                                        </td>";
                                                        foreach($_getLabel as $get){
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k' value='0'>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k' value='0' readonly>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                        }

                                                echo "</tr>";
                                                $b++;
                                            }
                                        ?>
                                        <tr>
                                            <th><i>Retail Pack FC 17%</i></th>
                                            <td colspan="<?=(count($_getLabel) * 2) + 1; ?>"></td>
                                        </tr>
                                        <?php 
                                            $rfc17 = array('200 ml', '400 ml', '500 ml', '1000 ml');
                                            foreach($rfc17 as $r){
                                                $k = 1;
                                                echo "<tr>
                                                        <th>$r</th>
                                                        <td>
                                                            <input type='hidden' name='baris[]' id='baris-$b' value='$b'>
                                                            <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                            <input type='text' name='price[]' id='price-".$b."0' class='form-control'  value='0'>
                                                        </td>";
                                                        foreach($_getLabel as $get){
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0'>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0' readonly>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                        }

                                                echo "</tr>";
                                                $b++;
                                            }
                                        ?>
                                        <tr>
                                            <th><i>Retail Pack FC 12%</i></th>
                                            <td colspan="<?=(count($_getLabel) * 2) + 1; ?>"></td>
                                        </tr>
                                        <?php 
                                            $rfc17 = array('200 ml');
                                            foreach($rfc17 as $r){
                                                $k = 1;
                                                echo "<tr>
                                                        <th>$r</th>
                                                        <td>
                                                            <input type='hidden' name='baris[]' id='baris-$b' value='$b'>
                                                            <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                            <input type='text' name='price[]' id='price-".$b."0' class='form-control'  value='0'>
                                                        </td>";
                                                        foreach($_getLabel as $get){
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0'>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0' readonly>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                        }

                                                echo "</tr>";
                                                $b++;
                                            }
                                        ?>
                                        <tr>
                                            <th><i>Bull Pack FC 24%</i></th>
                                            <td colspan="<?=(count($_getLabel) * 2) + 1; ?>"></td>
                                        </tr>
                                        <?php 
                                            $rfc17 = array('20 Kg', '200 Kg Conical', '200 Kg', '1000 Kg');
                                            foreach($rfc17 as $r){
                                                $k = 1;
                                                echo "<tr>
                                                        <th>$r</th>
                                                        <td>
                                                            <input type='hidden' name='baris[]' id='baris-$b' value='$b'>
                                                            <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                            <input type='text' name='price[]' id='price-".$b."0' class='form-control'  value='0'>
                                                        </td>";
                                                        foreach($_getLabel as $get){
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0'>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0' readonly>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                        }

                                                echo "</tr>";
                                                $b++;
                                            }
                                        ?>
                                        <tr>
                                            <th><i>Bull Pack FC 17%</i></th>
                                            <td colspan="<?=(count($_getLabel) * 2) + 1; ?>"></td>
                                        </tr>
                                        <?php 
                                            $rfc17 = array('20 Kg', '200 Kg Conical', '200 Kg');
                                            foreach($rfc17 as $r){
                                                $k = 1;
                                                echo "<tr>
                                                        <th>$r</th>
                                                        <td>
                                                            <input type='hidden' name='baris[]' id='baris-$b' value='$b'>
                                                            <input type='hidden' name='kolom[]' id='kolom-0' value='0'>
                                                            <input type='text' name='price[]' id='price-".$b."0' class='form-control'  value='0'>
                                                        </td>";
                                                        foreach($_getLabel as $get){
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0'>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                            echo "<td><input type='text' class='form-control' name='price[]' id='price-$b$k'  value='0' readonly>";
                                                            echo "<input type='hidden' class='form-control' name='baris[]' id='baris-$b' value='$b'>";
                                                            echo "<input type='hidden' class='form-control' name='kolom[]' id='kolom-$k' value='$k'></td>";
                                                            $k++;
                                                        }

                                                echo "</tr>";
                                                $b++;
                                            }
                                        ?>
                                    </tbody>   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    var $th = $('.tableFixHead').find('thead th')
    $('.tableFixHead').on('scroll', function() {
    $th.css('transform', 'translateY('+ this.scrollTop +'px)');
    });
</script>