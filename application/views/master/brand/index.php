<div class="content-body">
	<section id="headers">
        <div class="row">
            <div class="col-12">
                <?php echo $message;?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-list-alt mr-2"></i>MASTER BRAND</h4>
                        <a href="<?php echo base_url('master/brand/Mst_Brand/tambahData'); ?>" style="float: right;">
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
                                            <th class="text-center">Brand ID</th>
                                            <th class="text-center">Brand Name</th>
                                            <th class="text-center">Factory</th>
                                            <th class="text-center">InActive</th>
                                            <th class="text-center">CreatedBy</th>
                                            <th class="text-center">UpdateBy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($_getData as $get){?>
                                        <tr>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('master/brand/Mst_Brand/editData/'.$get->BrandID); ?>" class="btn btn-icon btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-icon btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td><?php echo $get->BrandID;?></td>
                                            <td><?php echo $get->BrandName;?></td>
                                            <td class="text-center"><?php echo $get->FactoryID;?></td>
                                            <td class="text-center">
                                                <?php if($get->InActive == 1){
                                                    echo "<label class='chip chip-success'>Active</label>";
                                                }else{
                                                    echo "<label class='chip chip-danger'>Not Active</label>";
                                                }?>
                                            </td>
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