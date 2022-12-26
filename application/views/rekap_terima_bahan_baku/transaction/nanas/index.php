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
                        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>SCHEDULE TERIMA NANAS</h4>
                        <a href="<?php echo base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas/tambahData'); ?>" style="float: right;">
                            <button type="button" class="btn btn-md btn-primary waves-effect waves-light"><i class="fa fa-plus mr-1"></i>Create new</button>
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">                            
                            <div class="table-responsive">
                            	<hr>
                                <table class="table table-striped table-bordered complex-headers">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="3" >Actions</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Tanggal</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Hari</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Tafsiran Nanas (Buah)</th>
                                            <th style="vertical-align: middle; text-align: center;" colspan="8">Aktual Terima</th>
                                            <th style="vertical-align: middle; text-align: center;" colspan="2">Total Aktual Terima</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="3">Factory</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="3">CreatedBy</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="3">UpdateBy</th>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-1 (Buah) </th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-2 (Buah) </th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-3 (Buah) </th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-4 (Buah) </th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Nanas N-5 (Buah) </th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Total (Buah)</th>
                                            <th style="vertical-align: middle; text-align: center;" colspan="2">Nanas Reject</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">Buah</th>
                                            <th style="vertical-align: middle; text-align: center;" rowspan="2">%</th>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center;">Buah</th>
                                            <th style="vertical-align: middle; text-align: center;">%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($_getData as $get){
                                             $total = $get->AktualTerima_Nanas_N_1+$get->AktualTerima_Nanas_N_2+$get->AktualTerima_Nanas_N_3+$get->AktualTerima_Nanas_N_4+$get->AktualTerima_Nanas_N_5;
                                             // $precent1 = 
                                             $totalAktual = $total+$get->NanasRiject;
                                             $precent1 = $total/$totalAktual;
                                             if($get->TafsiranNanas != 0){
                                                $precent2 = $totalAktual/$get->TafsiranNanas;
                                             }else{
                                                $precent2 = 0;
                                             }
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas/editData/'.$get->Tanggal); ?>" class="btn btn-icon btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil"></i></a>
                                                     <button type="button" class="btn btn-icon btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target="#danger_modal_<?php echo $get->TerimaNanasID; ?>"><i class="fa fa-trash"></i></button>
                                                </td>
                                                <td><?php echo date('d-m-Y',strtotime($get->Tanggal));?></td>
                                                <td><?php echo hari($get->Tanggal);?></td>
                                                <td><?php echo $get->TafsiranNanas;?></td>
                                                <td><?php echo $get->AktualTerima_Nanas_N_1;?></td>
                                                <td><?php echo $get->AktualTerima_Nanas_N_2;?></td>
                                                <td><?php echo $get->AktualTerima_Nanas_N_3;?></td>
                                                <td><?php echo $get->AktualTerima_Nanas_N_4;?></td>
                                                <td><?php echo $get->AktualTerima_Nanas_N_5;?></td>
                                                <td><?php echo $total;?></td>
                                                <td><?php echo $get->NanasRiject;?></td>
                                                <td><?php echo $precent1;?></td>
                                                <td><?php echo $totalAktual;?></td>
                                                <td><?php echo $precent2;?></td>
                                                <td class="text-center"><?php echo $get->FactoryID;?></td>
                                                <td>
                                                    <?php echo $get->CreatedBy;?>
                                                    <br>
                                                    <p><?php if($get->CreatedDate != NULL){ echo date('d-M-Y H:i:s',strtotime($get->CreatedDate)); }else{echo '';}?></p>
                                                </td>
                                                <td>
                                                    <?php echo $get->UpdateBy;?>
                                                    <br>
                                                    <p><?php if($get->UpdateDate != NULL){echo date('d-M-Y H:i:s',strtotime($get->UpdateDate)); }else{echo '';}?></p>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="danger_modal_<?php echo $get->TerimaNanasID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger white">
                                                            <h5 class="modal-title" id="myModalLabel120"><i class="fa fa-trash mr-1"></i>Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="pesan_delete">
                                                            <p>Are you sure want to delete data <strong><?php echo longdate_indo($get->Tanggal); ?></strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleted(<?php echo $get->TerimaNanasID; ?>)">Yes</button>
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        <?php }?>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Complex headers table -->
</div>

<script type="text/javascript"> 
    function deleted($terimananasid){
        var id = $terimananasid;

        $.ajax({
            type: "POST",
            url : "<?php echo  base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas/delete/')?>"+id,
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