<div class="content-body">
	<section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">SALES FORECAST VS REAL SHIPMENT</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-1">
                                                    <span>Product</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control" name="selProduct" id="selProduct">
                                                        <option value="">- Choose Product -</option>
                                                        <?php foreach($getProduct as $get){?>
                                                            <option value="<?php echo $get->ProductID?>"><?php echo $get->ProductName?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-1">
                                                    <span>Year</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="selTahun" id="selTahun">
                                                        <?php for($i=date('Y')-1;$i<=(date('Y')+1);$i++){
                                                            if($i==date('Y')){ ?>
                                                            <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                                            <?php }else{ ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-1">
                                                    <span>Based On</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="selBasedOn" id="selBasedOn">
                                                        <option value="">- Choose Product -</option>
                                                        <option value="24_fat_content">24% FAT CONTENT</option>
                                                        <option value="real_fat_content">REAL FAT CONTENT</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-1">
                                            <a type="submit" class="btn btn-primary mr-1 mb-1" onclick="callAjax();">Submit</a>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card" id="formid">
                    
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(function () {
        $(".select2").select2();
    });

    function callAjax(){
        var product = $('#selProduct').val();
        var tahun   = $('#selTahun').val();
        var based_on = $('#selBasedOn').val();

         $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?php echo base_url('sales_forecast/transaction/Input_Sales_Forecast_Real_Shipment/getForm')?>"+"/"+product+"/"+tahun+"/"+based_on,
            success: function(msg){
                if(msg == ''){
                    alert('Tidak Ada Data');
                }else{
                    $("#formid").html(msg);
                }
            }
        });
    }
</script>