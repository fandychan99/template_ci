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

<div class="card">
    <div class="card-header">
        <h4 class="card-title">
       <i class="feather icon-server"></i> BASED ON REAL FAT CONTENT
        </h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('sales_forecast/transaction/Input_Sales_Forecast_Real_Shipment/simpan_real_fat_content') ?>">
                <input type="hidden" name="txtproductreal" id="txtproductreal" value="<?php echo $product;?>">
                <input type="hidden" name="txttahunreal" id="txttahunreal" value="<?php echo $tahun;?>">
                <input type="hidden" name='jumlahbuyerreal' value="<?=count($getBuyer) ?>">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <hr>
                                <table class="table table-striped table-bordered complex-headers">
                                    <thead>
                                    <?php for($i = 0; $i <= 12; $i++){
                                        if($i == 0) {
                                            echo "<tr><th class='text-center'>Bulan</th>";
                                            foreach($getBuyer as $r){
                                                echo "<th class='text-center'>$r->Abbr_buyer</th>";
                                            }
                                            echo "</tr>";
                                        }
                                        
                                    } ?> 
                                    </thead>
                                    <tbody>
                                        <?php 
                                            for($i = 0; $i <= 12; $i++){
                                                if($i != 0) { 
                                                    echo "<tr><td>$bulan[$i]</td>";
                                                    foreach($getBuyer as $r){
                                                        echo "<td>
                                                            <input type='text' class='form-control' name='txtQuantityReal[]' value='0' />
                                                            <input type='hidden' name='txtBuyerReal[]' class='form-control' value='$r->BuyerID' />
                                                        </td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>                          
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <button type="submit" class="btn bg-gradient-info mr-1 mb-1 waves-effect waves-light">Save</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>