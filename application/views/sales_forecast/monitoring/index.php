<div class="content-body">
	<section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <!-- <?php echo $message;?> -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2"><i class="feather icon-monitor mr-2"></i><?php echo $title; ?></h4>
                    </div>
                    <div class="card-content">
                            <hr>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>Monitoring Type</span>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="select2 form-control" id="jenis_mtr" name="jenis_mtr">
                                                    <option value="">Choose Monitoring Type</option>
                                                    <option value="tahun">Annual Report</option>
                                                    <option value="summary_tahun">Summary Report</option>
                                                </select>
                                            </div>                                                
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>Product</span>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="select2 form-control" name="selProduct" id="selProduct" onchange="get_dtl_mtr()">
                                                    <option value="">- Choose Product -</option>
                                                    <?php foreach($getProduct as $get){?>
                                                        <option value="<?php echo $get->ProductID?>"><?php echo $get->ProductName?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-12" id="dtl_mtr">
                                        
                                    </div>                                     
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2 offset-md-2">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1" onclick="search()"><i class="fa fa-search mr-1"></i>Search</button>                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="content-body">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12" id="result_monitoring">

            </div>
        </div>
    </section>
</div>


<script type="text/javascript">
    function get_dtl_mtr(){
        var jenis_mtr = $('#jenis_mtr').val();
        var product   = $('#selProduct').val();
        $('#dtl').remove();

        if (jenis_mtr == 'tahun' && product != null){
            $('#dtl_mtr').append(
                '<div class="form-group row" id="dtl">'
                    +'<div class="col-md-2">'
                        +'<span>Year</span>'
                    +'</div>'
                    +'<div class="col-md-4">'
                        +'<select class="form-control" id="dtl_thn" name="dtl_thn">'
                            +'<option value="2017">2017</option>'
                            +'<option value="2018">2018</option>'
                            +'<option value="2019">2019</option>'
                            +'<option value="2020" selected>2020</option>'
                            +'<option value="2021">2021</option>'
                            +'<option value="2022">2022</option>'
                            +'<option value="2023">2023</option>'
                            +'<option value="2024">2024</option>'
                            +'<option value="2025">2025</option>'
                            +'<option value="2026">2026</option>'
                            +'<option value="2027">2027</option>'
                            +'<option value="2028">2028</option>'
                        +'</select>'
                    +'</div>'
                +'</div>'
            );
        } else if (jenis_mtr == 'summary_tahun' && product != null){
            $('#dtl_mtr').append(
                '<div class="form-group row" id="dtl">'
                    +'<div class="col-md-2">'
                        +'<span>Year</span>'
                    +'</div>'
                    +'<div class="col-md-4">'
                        +'<select class="form-control" id="dtl_thn" name="dtl_thn">'
                            +'<option value="2017">2017</option>'
                            +'<option value="2018">2018</option>'
                            +'<option value="2019">2019</option>'
                            +'<option value="2020" selected>2020</option>'
                            +'<option value="2021">2021</option>'
                            +'<option value="2022">2022</option>'
                            +'<option value="2023">2023</option>'
                            +'<option value="2024">2024</option>'
                            +'<option value="2025">2025</option>'
                            +'<option value="2026">2026</option>'
                            +'<option value="2027">2027</option>'
                            +'<option value="2028">2028</option>'
                        +'</select>'
                    +'</div>'
                +'</div>'
            );
        }

        $('#dtl_bln').select2({
            dropdownAutoWidth: true,
            width: '100%'
        });
        $('#dtl_thn').select2({
            dropdownAutoWidth: true,
            width: '100%'
        });
    }

    function search(){
        var jenis_mtr = $('#jenis_mtr').val();
        var product   = $('#selProduct').val();
        $('#result').remove();

        if (jenis_mtr == ''){
            Swal.fire({
                title:"Warning !",
                text:"Anda belum memilih jenis monitoring.",
                type:"warning",
                confirmButtonClass:"btn btn-warning",
                buttonsStyling:!1
            });
        } else if (jenis_mtr == 'tahun'){
            var tahun = $('#dtl_thn').val();

            $.ajax({
                type: "POST",
                url : "<?php echo  base_url('sales_forecast/monitoring/Mnt_Input_Sales_Forecast_Real_Shipment/mtr_tahun/')?>",
                data: {
                    tahun : tahun,
                    product : product,
                },
                success: function(msg){
                    if (msg == 0){
                        Swal.fire({
                            title:"Warning !",
                            text:"Data tidak ditemukan.",
                            type:"warning",
                            confirmButtonClass:"btn btn-warning",
                            buttonsStyling:!1
                        });
                    }
                    $('#result_monitoring').html(msg);                   
                }
            });   
        } else {
            var tahun = $('#dtl_thn').val();

            $.ajax({
                type: "POST",
                url : "<?php echo  base_url('sales_forecast/monitoring/Mnt_Input_Sales_Forecast_Real_Shipment/mtr_summary_tahun/')?>",
                data: {
                    tahun : tahun,
                    product : product,
                },
                success: function(msg){
                    if (msg == 0){
                        Swal.fire({
                            title:"Warning !",
                            text:"Data tidak ditemukan.",
                            type:"warning",
                            confirmButtonClass:"btn btn-warning",
                            buttonsStyling:!1
                        });
                    }
                    $('#result_monitoring').html(msg);                   
                }
            });
        }        
    }
</script>
