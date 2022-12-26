<div class="content-body">
	<section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <?php echo $message;?>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2"><i class="feather icon-edit-1 mr-2"></i><?php echo $title; ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="<?php echo $action; ?>" method="post" role="form">
                            	<hr>
                            	<div class="mb-3"></div>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Tanggal</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="tanggal" class="form-control <?php echo $class_tgl; ?>" name="tanggal" placeholder="Input Tanggal" value="<?php echo $tanggal; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Produksi / Off</span>
                                                </div>                                                
                                                <div class="col-md-4">
                                                    <li class="d-inline-block mr-2">
	                                                    <div class="vs-radio-con vs-radio-success">
	                                                        <input type="radio" name="produksi" <?php echo $checked1; ?> value="1">
	                                                        <span class="vs-radio">
	                                                            <span class="vs-radio--border"></span>
	                                                            <span class="vs-radio--circle"></span>
	                                                        </span>
	                                                        <span class="">Produksi</span>
	                                                    </div>
		                                            </li>
		                                            <li class="d-inline-block mr-2">
	                                                    <div class="vs-radio-con vs-radio-danger">
	                                                        <input type="radio" name="produksi" <?php echo $checked2; ?> value="0">
	                                                        <span class="vs-radio">
	                                                            <span class="vs-radio--border"></span>
	                                                            <span class="vs-radio--circle"></span>
	                                                        </span>
	                                                        <span class="">Off</span>
	                                                    </div>
		                                            </li>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Rencana Buka Nanas (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="rencana_buka_nanas_bh" class="form-control" name="rencana_buka_nanas_bh" placeholder="Input Rencana Buka Nanas (Buah)" value="<?php echo $rencana_buka_nanas_bh; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Total Pakai Nanas (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="total_pakai_nanas_bh" class="form-control" name="total_pakai_nanas_bh" placeholder="Input Total Pakai Nanas (Buah)" value="<?php echo $total_pakai_nanas_bh; ?>" onchange="set_nanas_reject_prcnt()">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas Reject (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="nanas_reject_bh" class="form-control" name="nanas_reject_bh" placeholder="Input Nanas Reject (Buah)" value="<?php echo $nanas_reject_bh; ?>" onchange="set_nanas_reject_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas Reject (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="nanas_reject_prcnt" class="form-control" name="nanas_reject_prcnt" placeholder="Reject Nanas (%)" readonly="readonly" value="<?php echo $nanas_reject_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-1 (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="nanas_n1_bh" class="form-control" name="nanas_n1_bh" placeholder="Input Nanas N-1 (Buah)" value="<?php echo $nanas_n1_bh; ?>" onchange="set_total_dan_jenis_nanas_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-1 (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="nanas_n1_prcnt" class="form-control" name="nanas_n1_prcnt" placeholder="Nanas N-1 (%)" readonly="readonly" value="<?php echo $nanas_n1_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-2 (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="nanas_n2_bh" class="form-control" name="nanas_n2_bh" placeholder="Input Nanas N-2 (Buah)" value="<?php echo $nanas_n2_bh; ?>" onchange="set_total_dan_jenis_nanas_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-2 (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="nanas_n2_prcnt" class="form-control" name="nanas_n2_prcnt" placeholder="Nanas N-2 (%)" readonly="readonly" value="<?php echo $nanas_n2_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-3 (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="nanas_n3_bh" class="form-control" name="nanas_n3_bh" placeholder="Input Nanas N-3 (Buah)" value="<?php echo $nanas_n3_bh; ?>" onchange="set_total_dan_jenis_nanas_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-3 (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="nanas_n3_prcnt" class="form-control" name="nanas_n3_prcnt" placeholder="Nanas N-3 (%)" readonly="readonly" value="<?php echo $nanas_n3_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-4 (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="nanas_n4_bh" class="form-control" name="nanas_n4_bh" placeholder="Input Nanas N-4 (Buah)" value="<?php echo $nanas_n4_bh; ?>" onchange="set_total_dan_jenis_nanas_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-4 (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="nanas_n4_prcnt" class="form-control" name="nanas_n4_prcnt" placeholder="Nanas N-4 (%)" readonly="readonly" value="<?php echo $nanas_n4_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-5 (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="nanas_n5_bh" class="form-control" name="nanas_n5_bh" placeholder="Input Nanas N-5 (Buah)" value="<?php echo $nanas_n5_bh; ?>" onchange="set_total_dan_jenis_nanas_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Nanas N-5 (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="nanas_n5_prcnt" class="form-control" name="nanas_n5_prcnt" placeholder="Nanas N-5 (%)" readonly="readonly" value="<?php echo $nanas_n5_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Total (Buah)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="total_bh" class="form-control" name="total_bh" placeholder="Total (Buah)" readonly="readonly" value="<?php echo $total_bh; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Total (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="total_prcnt" class="form-control" name="total_prcnt" placeholder="Total (%)" readonly="readonly" value="<?php echo $total_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
	                                <div class="col-md-3 offset-md-3">
	                                    <button type="submit" class="btn btn-primary mr-1 mb-1"><i class="fa fa-save mr-1"></i><?php echo $button; ?></button>
	                                    <a href="<?php echo $cancel; ?>">
                                            <button type="button" class="btn btn-danger mr-1 mb-1"><i class="fa fa-close mr-1"></i>Cancel</button>
                                        </a>
	                                </div>
	                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- =========================================================================================================================================== -->
<script type="text/javascript">
    function set_nanas_reject_prcnt(){
        var total_pakai_nanas_bh = parseInt($('#total_pakai_nanas_bh').val() == "" ? 0 : $('#total_pakai_nanas_bh').val());
        var nanas_reject_bh      = parseInt($('#nanas_reject_bh').val() == "" ? 0 : $('#nanas_reject_bh').val());

        var hasil = total_pakai_nanas_bh == 0 ? 0 : (nanas_reject_bh/total_pakai_nanas_bh)*100;
        $('#nanas_reject_prcnt').val(hasil.toFixed(2)+' %');

        set_total_dan_jenis_nanas_prcnt();
    }

    function set_total_dan_jenis_nanas_prcnt(){
        //var rencana_buka_nanas_bh  = parseInt($('#rencana_buka_nanas_bh').val() == "" ? 0 : $('#rencana_buka_nanas_bh').val());
        var total_pakai_nanas_bh   = parseInt($('#total_pakai_nanas_bh').val() == "" ? 0 : $('#total_pakai_nanas_bh').val());
        var nanas_n1_bh            = parseInt($('#nanas_n1_bh').val() == "" ? 0 : $('#nanas_n1_bh').val());
        var nanas_n2_bh            = parseInt($('#nanas_n2_bh').val() == "" ? 0 : $('#nanas_n2_bh').val());
        var nanas_n3_bh            = parseInt($('#nanas_n3_bh').val() == "" ? 0 : $('#nanas_n3_bh').val());
        var nanas_n4_bh            = parseInt($('#nanas_n4_bh').val() == "" ? 0 : $('#nanas_n4_bh').val());
        var nanas_n5_bh            = parseInt($('#nanas_n5_bh').val() == "" ? 0 : $('#nanas_n5_bh').val());

        var hasil1 = (nanas_n1_bh+nanas_n2_bh+nanas_n3_bh+nanas_n4_bh+nanas_n5_bh);
        $('#total_bh').val(hasil1);

        var total_bh = parseInt($('#total_bh').val() == "" ? 0 : $('#total_bh').val());    
        var hasil2 = total_bh == 0 ? 0 : (nanas_n1_bh/total_bh)*100;
        var hasil3 = total_bh == 0 ? 0 : (nanas_n2_bh/total_bh)*100;
        var hasil4 = total_bh == 0 ? 0 : (nanas_n3_bh/total_bh)*100;
        var hasil5 = total_bh == 0 ? 0 : (nanas_n4_bh/total_bh)*100;
        var hasil6 = total_bh == 0 ? 0 : (nanas_n5_bh/total_bh)*100;
        var hasil7 = total_pakai_nanas_bh == 0 ? 0 : (total_bh/total_pakai_nanas_bh)*100;

        $('#nanas_n1_prcnt').val(hasil2.toFixed(2)+' %');
        $('#nanas_n2_prcnt').val(hasil3.toFixed(2)+' %');
        $('#nanas_n3_prcnt').val(hasil4.toFixed(2)+' %');
        $('#nanas_n4_prcnt').val(hasil5.toFixed(2)+' %');
        $('#nanas_n5_prcnt').val(hasil6.toFixed(2)+' %');
        $('#total_prcnt').val(hasil7.toFixed(2)+' %');
    }
</script>