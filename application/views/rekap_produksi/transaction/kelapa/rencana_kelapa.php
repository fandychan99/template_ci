<div class="content-body">
	<section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="feather icon-tag"></i> Rencana Produksi Kelapa</h4>
                    </div>
                    
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-1">
                                                    <span>Month</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="selBulan" id="selBulan">
                                                         <?php
                                                          $b = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                          $a = 1;
                                                          echo "<option value='0'>please select</option>";
                                                          for($i=0; $i<12; $i++){
                                                            //   if((date('n')-1) == $i){
                                                            //       echo "<option value=".$a." selected>".$b[$i]."</option>";
                                                            //   }else{
                                                                  echo "<option value=".$a.">".$b[$i]."</option>";
                                                            //   }
                                                              $a++;
                                                          } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <span>Year</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="selYear" id="selYear">
                                                         <?php
                                                          $a = 2019;
                                                          for($i=0; $i<22; $i++){
                                                              if((date('Y')) == $a){
                                                                  echo "<option value=".$a." selected>".$a."</option>";
                                                              }else{
                                                                  echo "<option value=".$a.">".$a."</option>";
                                                              }
                                                              $a++;
                                                          } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <span>Buka Kelapa</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="jlhklp" id="jlhklp" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <a type="submit" class="btn btn-primary mr-1 mb-1" onclick="callAjax();">Refresh</a>
                                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
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
    // $(function () {
    //     $(".select2").select2();
    // });

    function callAjax(){
        var bulan = $('#selBulan').val();
        var tahun = $('#selYear').val();
        var jlhkp = $('#jlhklp').val();
        $url = "<?php echo base_url('rekap_produksi/transaction/kelapa/Trn_Rencana_Produksi_Kelapa/getForm')?>"+"?bulan=" + bulan + "&tahun=" + tahun + "&jlhklp=" + jlhkp;
        console.log($url);

        $.ajax({
            type: "POST",
            dataType: "html",
            url: $url,
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