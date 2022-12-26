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
                                                <select class="select2 form-control" id="jenis_mtr" name="jenis_mtr" onchange="get_dtl_mtr()">
                                                    <option value="">Choose Monitoring Type</option>
                                                    <option value="bulan_tahun">Monthly Report</option>
                                                    <option value="tahun">Annual Report</option>
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

<!-- =========================================================================================================================================== -->
<script type="text/javascript">
    function get_dtl_mtr(){
        var jenis_mtr = $('#jenis_mtr').val();
        $('#dtl').remove();

        if (jenis_mtr == 'bulan_tahun'){
            $('#dtl_mtr').append(
                '<div class="form-group row" id="dtl">'
                    +'<div class="col-md-2">'
                        +'<span>Month</span>'
                    +'</div>'
                    +'<div class="col-md-2">'
                        +'<select class="form-control" id="dtl_bln" name="dtl_bln">'
                            +'<option value="01">Januari</option>'
                            +'<option value="02">Februari</option>'
                            +'<option value="03">Maret</option>'
                            +'<option value="04">April</option>'
                            +'<option value="05">Mei</option>'
                            +'<option value="06">Juni</option>'
                            +'<option value="07">Juli</option>'
                            +'<option value="08">Agustus</option>'
                            +'<option value="09">September</option>'
                            +'<option value="10">Oktober</option>'
                            +'<option value="11">November</option>'
                            +'<option value="12">Desember</option>'
                        +'</select>'
                    +'</div>'
                    +'<div class="col-md-2">'
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
        } else if (jenis_mtr == 'tahun'){
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
        $('#result').remove();

        if (jenis_mtr == ''){
            Swal.fire({
                title:"Warning !",
                text:"Anda belum memilih jenis monitoring.",
                type:"warning",
                confirmButtonClass:"btn btn-warning",
                buttonsStyling:!1
            });
        } else if (jenis_mtr == 'bulan_tahun'){
            var bulan = $('#dtl_bln').val();
            var tahun = $('#dtl_thn').val();

            $.ajax({
                type: "POST",
                url : "<?php echo  base_url('rekap_terima_bahan_baku/monitoring/Mnt_Terima_Nanas/mtr_bulan_tahun/')?>",
                data: {
                    bulan : bulan,
                    tahun : tahun,
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
                url : "<?php echo  base_url('rekap_terima_bahan_baku/monitoring/Mnt_Terima_Nanas/mtr_tahun/')?>",
                data: {
                    tahun : tahun,
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