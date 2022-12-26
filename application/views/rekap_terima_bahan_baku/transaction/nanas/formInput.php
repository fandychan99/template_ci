<!-- Menghitung Jumlah Hari/Tanggal -->
<?php 
$bulan = date('d');
$tahun = date('Y');

$jml = date('t', mktime(0, 0, 0, $bulan, 1, $tahun)); 
?>

<div class="content-body">
	<section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <?php echo $message;?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-tasks"></i> FORM TERIMA BAHAN BAKU KELAPA</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas/simpanData') ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Tanggal</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="date" name="txtTanggal" id="txtTanggal" class="form-control" value="<?php echo date('Y-m-d')?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Tafsiran Nanas</span><p class="text-success font-small-3">(Buah)</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtTafsiran" id="txtTafsiran" class="form-control" placeholder="Input Tafsiran Nanas" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Nanas N-1</span><p class="text-success font-small-3">(Buah)</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtNanasN1" id="txtNanasN1" class="form-control" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Nanas N-2</span><p class="text-success font-small-3">(Buah)</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtNanasN2" id="txtNanasN2" class="form-control" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Nanas N-3</span><p class="text-success font-small-3">(Buah)</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtNanasN3" id="txtNanasN3" class="form-control" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Nanas N-4</span><p class="text-success font-small-3">(Buah)</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtNanasN4" id="txtNanasN4" class="form-control" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Nanas N-5</span><p class="text-success font-small-3">(Buah)</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtNanasN5" id="txtNanasN5" class="form-control" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Nanas Riject</span><p class="text-success font-small-3">(Buah)</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtNanasRiject" id="txtNanasRiject" class="form-control" onkeypress="return isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Factory</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="selFactory" id="selFactory">
                                                        <option value="">- Choose Factory -</option>
                                                        <?php foreach($_getMstFactory as $get){?>
                                                            <option value="<?php echo $get->FactoryID?>"><?php echo $get->FactoryID?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-2">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
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

<script type="text/javascript">
    function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
</script>