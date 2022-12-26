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
                                                    <span>Rencana Buka KB-A (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="rencana_buka_kba_btr" class="form-control" name="rencana_buka_kba_btr" placeholder="Input Rencana Buka KB-A (Butir)" value="<?php echo $rencana_buka_kba_btr; ?>" onchange="set_aktual_buka_kba_dan_jenis_kelapa_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Total Pakai Kelapa (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="total_pakai_kelapa_btr" class="form-control" name="total_pakai_kelapa_btr" placeholder="Input Total Pakai Kelapa (Butir)" value="<?php echo $total_pakai_kelapa_btr; ?>" onchange="set_reject_non_process_prcnt()">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Reject Non Process (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="reject_non_process_btr" class="form-control" name="reject_non_process_btr" placeholder="Input Reject Non Process (Butir)" value="<?php echo $reject_non_process_btr; ?>" onchange="set_reject_non_process_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Reject Non Process (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="reject_non_process_prcnt" class="form-control" name="reject_non_process_prcnt" placeholder="Reject Non Process (%)" readonly="readonly" value="<?php echo $reject_non_process_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Kelapa Kampung (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="kelapa_kampung_btr" class="form-control" name="kelapa_kampung_btr" placeholder="Input Kelapa Kampung (Butir)" value="<?php echo $kelapa_kampung_btr; ?>" onchange="set_aktual_buka_kba_dan_jenis_kelapa_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Kelapa Kampung (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="kelapa_kampung_prcnt" class="form-control" name="kelapa_kampung_prcnt" placeholder="Kelapa Kampung (%)" readonly="readonly" value="<?php echo $kelapa_kampung_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Kelapa GHS (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="kelapa_ghs_btr" class="form-control" name="kelapa_ghs_btr" placeholder="Input Kelapa GHS (Butir)" value="<?php echo $kelapa_ghs_btr; ?>" onchange="set_aktual_buka_kba_dan_jenis_kelapa_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Kelapa GHS (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="kelapa_ghs_prcnt" class="form-control" name="kelapa_ghs_prcnt" placeholder="Kelapa GHS (%)" readonly="readonly" value="<?php echo $kelapa_ghs_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Kelapa Kanal (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="kelapa_kanal_btr" class="form-control" name="kelapa_kanal_btr" placeholder="Input Kelapa Kanal (Butir)" value="<?php echo $kelapa_kanal_btr; ?>" onchange="set_aktual_buka_kba_dan_jenis_kelapa_prcnt()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Kelapa Kanal (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="kelapa_kanal_prcnt" class="form-control" name="kelapa_kanal_prcnt" placeholder="Kelapa Kanal (%)" readonly="readonly" value="<?php echo $kelapa_kanal_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Aktual Buka KB-A (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="aktual_buka_kba_btr" class="form-control" name="aktual_buka_kba_btr" placeholder="Aktual Buka KB-A (Butir)" readonly="readonly" value="<?php echo $aktual_buka_kba_btr; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Aktual Buka KB-A (%)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="aktual_buka_kba_prcnt" class="form-control" name="aktual_buka_kba_prcnt" placeholder="Aktual Buka KB-A (%)" readonly="readonly" value="<?php echo $aktual_buka_kba_prcnt; ?>">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <span>Kelapa Organik (Butir)</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" id="kelapa_organik_btr" class="form-control" name="kelapa_organik_btr" placeholder="Input Kelapa Organik (Butir)" value="<?php echo $kelapa_organik_btr; ?>">
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
    function set_reject_non_process_prcnt(){
        var total_pakai_kelapa_btr = parseInt($('#total_pakai_kelapa_btr').val() == "" ? 0 : $('#total_pakai_kelapa_btr').val());
        var reject_non_process_btr = parseInt($('#reject_non_process_btr').val() == "" ? 0 : $('#reject_non_process_btr').val());

        var hasil = total_pakai_kelapa_btr == 0 ? 0 : (reject_non_process_btr/total_pakai_kelapa_btr)*100;
        $('#reject_non_process_prcnt').val(hasil.toFixed(2)+' %');
    }

    function set_aktual_buka_kba_dan_jenis_kelapa_prcnt(){
        var rencana_buka_kba_btr   = parseInt($('#rencana_buka_kba_btr').val() == "" ? 0 : $('#rencana_buka_kba_btr').val());
        var kelapa_kampung_btr     = parseInt($('#kelapa_kampung_btr').val() == "" ? 0 : $('#kelapa_kampung_btr').val());
        var kelapa_ghs_btr         = parseInt($('#kelapa_ghs_btr').val() == "" ? 0 : $('#kelapa_ghs_btr').val());
        var kelapa_kanal_btr       = parseInt($('#kelapa_kanal_btr').val() == "" ? 0 : $('#kelapa_kanal_btr').val());

        var hasil1 = (kelapa_kampung_btr+kelapa_ghs_btr+kelapa_kanal_btr);
        $('#aktual_buka_kba_btr').val(hasil1);

        var aktual_buka_kba_btr = parseInt($('#aktual_buka_kba_btr').val() == "" ? 0 : $('#aktual_buka_kba_btr').val());      
        var hasil2 = aktual_buka_kba_btr == 0 ? 0 : (kelapa_kampung_btr/aktual_buka_kba_btr)*100;
        var hasil3 = aktual_buka_kba_btr == 0 ? 0 : (kelapa_ghs_btr/aktual_buka_kba_btr)*100;
        var hasil4 = aktual_buka_kba_btr == 0 ? 0 : (kelapa_kanal_btr/aktual_buka_kba_btr)*100;
        var hasil5 = rencana_buka_kba_btr == 0 ? 0 : (aktual_buka_kba_btr/rencana_buka_kba_btr)*100;

        $('#kelapa_kampung_prcnt').val(hasil2.toFixed(2)+' %');
        $('#kelapa_ghs_prcnt').val(hasil3.toFixed(2)+' %');
        $('#kelapa_kanal_prcnt').val(hasil4.toFixed(2)+' %');
        $('#aktual_buka_kba_prcnt').val(hasil5.toFixed(2)+' %');
    }
</script>