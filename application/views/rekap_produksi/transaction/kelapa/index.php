<style type="text/css">
    .font_size {
        font-size: 11px;
    };
</style>
<div class="content-body">
	<section id="headers">
        <div class="row">
            <div class="col-12">
                <?php echo $message;?>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>REKAP PRODUKSI KELAPA</h4>
                        <a href="<?php echo $link_create_new; ?>" class="pull-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus mr-1"></i>Create new</button>
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard"> 
                            <div class="table-responsive">
                            	<hr>
                                <table class="table table-striped table-bordered complex-headers font_size">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="50px">Action</th>
                                            <th rowspan="2" width="50px">Tanggal</th>
                                            <th rowspan="2" width="30px">Hari</th>                                            
                                            <th rowspan="2" width="50px">Produksi / Off</th>
                                            <th rowspan="2">Rencana Buka KB-A (Butir)</th>
                                            <th rowspan="2">Total Pakai Kelapa (Butir)</th>
                                            <th colspan="2" style="vertical-align: middle; text-align: center;">Reject Non Process</th>
                                            <th colspan="2" style="vertical-align: middle; text-align: center;">Kelapa Kampung</th>
                                            <th colspan="2" style="vertical-align: middle; text-align: center;">Kelapa GHS</th>
                                            <th colspan="2" style="vertical-align: middle; text-align: center;">Kelapa Kanal</th>
                                            <th colspan="2" style="vertical-align: middle; text-align: center;">Aktual Buka KB-A</th>
                                            <th rowspan="2">Kelapa Organik (Butir)</th>                                            
                                        </tr>
                                        <tr>
                                            <th>(Butir)</th>
                                            <th>%</th>
                                            <th>(Butir)</th>
                                            <th>%</th>
                                            <th>(Butir)</th>
                                            <th>%</th>
                                            <th>(Butir)</th>
                                            <th>%</th>
                                            <th>(Butir)</th>
                                            <th>%</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($trn_rekap_produksi_kelapa as $trpk) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo $link_edit.encrypt_url($trpk->Produksi_Kelapa_Id); ?>">
                                                        <button type="button" class="btn btn-icon btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" class="btn btn-icon btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target="#danger_modal_<?php echo $trpk->Produksi_Kelapa_Id; ?>"><i class="fa fa-trash"></i></button>
                                                </td>
                                                <td><?php echo $trpk->Tanggal; ?></td>
                                                <td><?php echo hari($trpk->Tanggal); ?></td>                                               
                                                <td>
                                                    <?php 
                                                        if ($trpk->Produksi == 1){
                                                            echo "<div class='chip chip-success mr-1'>";
                                                                echo "<div class='chip-body'>";                                                                
                                                                    echo "<div class='avatar'>";
                                                                        echo "<i class='feather icon-check'></i>";
                                                                    echo "</div>";
                                                                    echo "<span class='chip-text'>Production</span>";
                                                                echo "</div>";
                                                            echo "</div>";
                                                        } else {
                                                            echo "<div class='chip chip-danger mr-1'>";
                                                                echo "<div class='chip-body'>";                                                                
                                                                    echo "<div class='avatar'>";
                                                                        echo "<i class='feather icon-x'></i>";
                                                                    echo "</div>";
                                                                    echo "<span class='chip-text'>Off</span>";
                                                                echo "</div>";
                                                            echo "</div>";
                                                        }
                                                    ?>                                                        
                                                </td>
                                                <td><center><?php echo $trpk->Rencana_Buka_KBA_Btr; ?></center></td>
                                                <td><center><?php echo $trpk->Total_Pakai_Kelapa_Btr; ?></center></td>
                                                <td><center><?php echo $trpk->Reject_Non_Process_Btr; ?></center></td>
                                                <td><center><?php echo $trpk->Reject_Non_Process_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpk->Kelapa_Kampung_Btr; ?></center></td>
                                                <td><center><?php echo $trpk->Kelapa_Kampung_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpk->Kelapa_GHS_Btr; ?></center></td>
                                                <td><center><?php echo $trpk->Kelapa_GHS_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpk->Kelapa_Kanal_Btr; ?></center></td>
                                                <td><center><?php echo $trpk->Kelapa_Kanal_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpk->Aktual_Buka_KBA_Btr; ?></center></td>
                                                <td><center><?php echo $trpk->Aktual_Buka_KBA_Prcnt.' %'; ?></td>
                                                <td><center><?php echo $trpk->Kelapa_Organik_Btr; ?></td>                                            
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="danger_modal_<?php echo $trpk->Produksi_Kelapa_Id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger white">
                                                            <h5 class="modal-title" id="myModalLabel120"><i class="fa fa-trash mr-1"></i>Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="pesan_delete">
                                                            <p>Are you sure want to delete data <strong><?php echo longdate_indo($trpk->Tanggal); ?></strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleted(<?php echo $trpk->Produksi_Kelapa_Id; ?>)">Yes</button>
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                        <?php
                                            } 
                                        ?>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- =========================================================================================================================================== -->
<script type="text/javascript"> 
    function deleted($produksi_kelapa_id){
        var produksi_kelapa_id = $produksi_kelapa_id;

        $.ajax({
            type: "POST",
            url : "<?php echo  base_url('rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa/delete/')?>"+produksi_kelapa_id,
            data: {},

            success: function(msg){
                Swal.fire({
                    title:"Success !",
                    text:"Data berhasil dihapus.",
                    type:"success",
                    confirmButtonClass:"btn btn-primary",
                    buttonsStyling:!1
                });
                $('.swal2-confirm').click(function(){
                    window.location.reload();
                });
            }
        });        
    }
</script>