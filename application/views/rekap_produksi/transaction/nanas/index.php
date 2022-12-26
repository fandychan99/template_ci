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
                        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>REKAP PRODUKSI NANAS</h4>
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
                                            <th rowspan="3" width="50px">Action</th>                                            
                                            <th rowspan="3" width="50px">Tanggal</th>
                                            <th rowspan="3" width="30px">Hari</th>
                                            <th rowspan="3" width="50px">Produksi / Off</th>
                                            <th rowspan="3">Rencana Buka Nanas (Buah)</th>
                                            <th rowspan="3">Total Pakai Nanas (Buah)</th>
                                            <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center;">Nanas Reject</th>
                                            <th colspan="12"><center>Pakai Nanas Bagus</center></th>                                          
                                        </tr>
                                        <tr>
                                            <th colspan="2"><center>Nanas N-1</center></th>
                                            <th colspan="2"><center>Nanas N-2</center></th>
                                            <th colspan="2"><center>Nanas N-3</center></th>
                                            <th colspan="2"><center>Nanas N-4</center></th>
                                            <th colspan="2"><center>Nanas N-5</center></th>
                                            <th colspan="2"><center>Total</center></th>
                                        </tr>
                                        <tr>
                                            <th>(Buah)</th>
                                            <th>%</th>
                                            <th>(Buah)</th>
                                            <th>%</th>
                                            <th>(Buah)</th>
                                            <th>%</th>
                                            <th>(Buah)</th>
                                            <th>%</th>
                                            <th>(Buah)</th>
                                            <th>%</th>
                                            <th>(Buah)</th>
                                            <th>%</th>
                                            <th>(Buah)</th>
                                            <th>%</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($trn_rekap_produksi_nanas as $trpn) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo $link_edit.encrypt_url($trpn->Produksi_Nanas_Id); ?>">
                                                        <button type="button" class="btn btn-icon btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil"></i></button>
                                                    </a>
                                                    <button type="button" class="btn btn-icon btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target="#danger_modal_<?php echo $trpn->Produksi_Nanas_Id; ?>"><i class="fa fa-trash"></i></button>
                                                </td>
                                                <td><?php echo $trpn->Tanggal; ?></td>
                                                <td><?php echo hari($trpn->Tanggal); ?></td>                                               
                                                <td>
                                                    <?php 
                                                        if ($trpn->Produksi == 1){
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
                                                <td><center><?php echo $trpn->Rencana_Buka_Nanas_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Total_Pakai_Nanas_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_Reject_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_Reject_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N1_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N1_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N2_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N2_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N3_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N3_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N4_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N4_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N5_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Nanas_N5_Prcnt.' %'; ?></center></td>
                                                <td><center><?php echo $trpn->Total_Bh; ?></center></td>
                                                <td><center><?php echo $trpn->Total_Prcnt.' %'; ?></td>                                  
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="danger_modal_<?php echo $trpn->Produksi_Nanas_Id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger white">
                                                            <h5 class="modal-title" id="myModalLabel120"><i class="fa fa-trash mr-1"></i>Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="pesan_delete">
                                                            <p>Are you sure want to delete data <strong><?php echo longdate_indo($trpn->Tanggal); ?></strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleted(<?php echo $trpn->Produksi_Nanas_Id; ?>)">Yes</button>
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
    function deleted($produksi_nanas_id){
        var produksi_nanas_id = $produksi_nanas_id;

        $.ajax({
            type: "POST",
            url : "<?php echo  base_url('rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas/delete/')?>"+produksi_nanas_id,
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