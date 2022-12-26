<div class="content-body">
	<section id="headers">
        <div class="row">
            <div class="col-12">
                <?php echo $message;?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>SCHEDULE TERIMA KELAPA KB-A</h4>
                        <a href="<?php echo base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa/tambahData'); ?>" style="float: right;">
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
                                            <th class="text-center">Actions</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Hari</th>
                                            <th class="text-center">Tafsiran KB-A (Butir)</th>
                                            <th class="text-center">Aktual Terima KB-A (Butir)</th>
                                            <th class="text-center">%</th>
                                            <th class="text-center">Factory</th>
                                            <th class="text-center">CreatedBy</th>
                                            <th class="text-center">UpdateBy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                            foreach ($_getData as $key) {?>
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa/editData/'.$key->Tanggal.'/'.$key->FactoryID); ?>" class="btn btn-icon btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil"></i></a>
                                                        <button type="button" class="btn btn-icon btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target="#danger_modal_<?php echo $key->TerimaKelapaID; ?>"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                    <td class="text-center"><?php echo date('d-m-Y',strtotime($key->Tanggal));?></td>
                                                    <th class="text-center"><?php echo hari($key->Tanggal);?></th>
                                                    <td class="text-center"><?php echo $key->Tafsiran;?></td>
                                                    <td class="text-center"><?php echo $key->AktualTerima;?></td>
                                                    <td class="text-center"><?php echo $key->AktualTerima/$key->Tafsiran;?></td>
                                                    <td class="text-center"><?php echo $key->FactoryID;?></td>
                                                    <td>
                                                        <?php echo $key->CreatedBy;?>
                                                        <br>
                                                        <p><?php if($key->CreatedDate != NULL){ echo date('d-M-Y H:i:s',strtotime($key->CreatedDate)); }else{echo '';}?></p>
                                                    </td>
                                                    <td>
                                                        <?php echo $key->UpdateBy;?>
                                                        <br>
                                                        <p><?php if($key->UpdateDate != NULL){echo date('d-M-Y H:i:s',strtotime($key->UpdateDate)); }else{echo '';}?></p>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade text-left" id="danger_modal_<?php echo $key->TerimaKelapaID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger white">
                                                                <h5 class="modal-title" id="myModalLabel120"><i class="fa fa-trash mr-1"></i>Delete</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" id="pesan_delete">
                                                                <p>Are you sure want to delete data <strong><?php echo longdate_indo($key->Tanggal); ?></strong> ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleted(<?php echo $key->TerimaKelapaID; ?>)">Yes</button>
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal" onclick="">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            <?php } ?>           
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
    function deleted($terimakelapaid){
        var id = $terimakelapaid;

        $.ajax({
            type: "POST",
            url : "<?php echo  base_url('rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa/delete/')?>"+id,
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