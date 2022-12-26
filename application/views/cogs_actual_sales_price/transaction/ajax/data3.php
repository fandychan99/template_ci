<style>
    .tableFixHead          { overflow-y: auto; height: 300px; }
    /* .tableFixHead thead th { position: sticky; top: 10px; } */
    /* #table tr th
    {
        table-layout: fixed;
    } */
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
                            <div class="table-responsive tableFixHead">
                                <hr>
                                <div class='table-scrollable' style='overflow: auto; width:4000px; height:300px;'>
                                    <table class="table table-striped table-bordered " id="table">
                                        <thead>
                                            <tr>
                                                <th rowspan="3"><center>Product</center></th>
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
                                                <td colspan="<?=(count($_getLabel) * 2) + 2; ?>"><b>UHT Coconut Cream Milk</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="<?=(count($_getLabel) * 2) + 2; ?>"><i>Retail Pack FC 24%</i></td>
                                            </tr>
                                            <tr>
                                                <td>65 ml</td>
                                                <td><input type="hidden" name="baris[]" value="1"><input type="hidden" name="kolom[]" value="0"><input type="text" name="price[]" id="price-0" class="form-control" ></td>
                                                <?php 
                                                    $i= 1;
                                                    foreach($_getLabel as $get){
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                    }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>65 ml</td>
                                                <td><input type="hidden" name="baris[]" value="1"><input type="hidden" name="kolom[]" value="0"><input type="text" name="price[]" id="price-0" class="form-control" ></td>
                                                <?php 
                                                    $i= 1;
                                                    foreach($_getLabel as $get){
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                    }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>65 ml</td>
                                                <td><input type="hidden" name="baris[]" value="1"><input type="hidden" name="kolom[]" value="0"><input type="text" name="price[]" id="price-0" class="form-control" ></td>
                                                <?php 
                                                    $i= 1;
                                                    foreach($_getLabel as $get){
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                    }
                                                ?>
                                            </tr>

                                            <tr>
                                                <td>65 ml</td>
                                                <td><input type="hidden" name="baris[]" value="1"><input type="hidden" name="kolom[]" value="0"><input type="text" name="price[]" id="price-0" class="form-control" ></td>
                                                <?php 
                                                    $i= 1;
                                                    foreach($_getLabel as $get){
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                        echo "<td><input type='text' class='form-control' name='price[]' id='price-$i'>";
                                                        echo "<input type='hidden' class='form-control' name='baris[]' value='1'>";
                                                        echo "<input type='hidden' class='form-control' name='kolom[]' value='$i'></td>";
                                                        $i++;
                                                    }
                                                ?>
                                            </tr>

                                        </tbody>                          
                                    </table>
                                </div>
                                
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

<!-- <script src="<?php echo base_url(); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script> -->

<script>
    var $th = $('.tableFixHead').find('thead th');
    $('.tableFixHead').on('scroll', function() {
        $th.css('transform', 'translateY('+ this.scrollTop +'px)');
    });
</script>