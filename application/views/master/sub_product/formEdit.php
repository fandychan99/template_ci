<div class="content-body">
	<section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <?php echo $message;?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-wpforms"></i> MASTER SUB PRODUCT</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('master/sub_product/Mst_Sub_Product/updateData') ?>">
                                <?php foreach($_getData as $row){?>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Product ID</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="selproductid" id="selproductid">
                                                        <option value="">- Choose Product ID -</option>
                                                        <?php foreach($_getMstProduct as $key){
                                                            if($row->ProductID == $key->ProductID){?>
                                                            <option value="<?php echo $key->ProductID?>" selected><?php echo $key->ProductID?></option>
                                                        <?php }else{?>
                                                            <option value="<?php echo $key->ProductID?>"><?php echo $key->ProductID?></option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Sub Product ID</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtsubproductid" id="txtsubproductid" class="form-control" placeholder="Input Sub Product ID" value="<?php echo $row->SubProductID?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Sub Product Name</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="txtsubproductname" id="txtsubproductname" class="form-control" placeholder="Input Sub Product Name" value="<?php echo $row->SubProductName?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Factory</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="selFactory" id="selFactory">
                                                        <option value="">- Choose Factory -</option>
                                                        <?php foreach($_getMstFactory as $get){
                                                            if($row->FactoryID == $get->FactoryID){?>
                                                            <option value="<?php echo $get->FactoryID?>" selected><?php echo $get->FactoryID?></option>
                                                        <?php }else{?>
                                                            <option value="<?php echo $get->FactoryID?>"><?php echo $get->FactoryID?></option>
                                                        <?php }}?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>InActive</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php if($row->InActive == 1){?>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="rdInactive" id="rdActive" value="1" checked>
                                                                    <label class="custom-control-label" for="rdActive">Active</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="rdInactive" id="rdNotActive" value="0">
                                                                    <label class="custom-control-label" for="rdNotActive">Inactive</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                    <?php }else{?>
                                                     <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="rdInactive" id="rdActive" value="1">
                                                                    <label class="custom-control-label" for="rdActive">Active</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="rdInactive" id="rdNotActive" value="0" checked>
                                                                    <label class="custom-control-label" for="rdNotActive">Inactive</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>   
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 offset-md-2">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
