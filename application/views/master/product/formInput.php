<div class="content-body">
	<section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <?php echo $message;?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-wpforms"></i> MASTER PRODUCT</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('master/product/Mst_Product/simpanData') ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Factory</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $style = "class='form-control' id='FactoryID' required";
                                                        echo form_dropdown('FactoryID', $_getMstFactory, '', $style);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Product ID</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="ProductID" id="ProductID" class="form-control" placeholder="Input Product ID">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Product Name</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="ProductName" id="ProductName" class="form-control" placeholder="Input Product Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Product Category</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $style = "class='form-control select2' id='Product_CategoryID' required";
                                                        echo form_dropdown('Product_CategoryID', $_CategoryID, '', $style);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Brand</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $style = "class='form-control select2' id='BrandID' required";
                                                        echo form_dropdown('BrandID', $_BrandID, '', $style);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>UOM Volume</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="Uom_Volume" id="Uom_Volume" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <?php 
                                                        $style = "class='form-control select2' id='UomVol_ID' required data-placeholder='UOM Volume'";
                                                        echo form_dropdown('UomVol_ID', $_UomVol, '', $style);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Packing</span>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="text" name="Per_Packing_imm" id="Per_Packing_imm" class="form-control">
                                                </div>
                                                <label style="width: 1px; padding-left: 0; padding-right: 0; text-align: center; color: white;">x</label>
                                                <div class="col-md-1" style="padding-left: 15px">
                                                    <input type="text" name="Per_Packing" id="Per_Packing" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <?php 
                                                        $style = "class='form-control select2' id='UomQty_ID' required data-placeholder='UOM Quantity'";
                                                        echo form_dropdown('UomQty_ID', $_UomQty, '', $style);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Estimated Quantity</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="Container_20ft" id="Container_20ft" class="form-control">
                                                </div>
                                                <label>in container 20'</label>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="Container_40ft" id="Container_40ft" class="form-control">
                                                </div>
                                                <label>in container 40'</label>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Fat Content</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="FC" id="fc" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Mesin</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $style = "class='form-control select2' id='Mesin' data-placeholder='Mesin'";
                                                        echo form_dropdown('Mesin', $_Mesin, '', $style);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Variant</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $style = "class='form-control select2' id='Variant' data-placeholder='Variant'";
                                                        echo form_dropdown('Variant', $_Variant, '', $style);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Grade</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php 
                                                        $style = "class='form-control select2' id='Grade' data-placeholder='Grade'";
                                                        echo form_dropdown('Grade', $_Grade, '', $style);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>Import / Eksport</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="import" id="import" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="import">Import</option>
                                                        <option value="eksport">Eksport</option>
                                                    </select>
                                                    <!-- <input type="text" name="mesin" id="mesin" class="form-control"> -->
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>InActive</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="InActive" id="rdActive" value="1" checked>
                                                                    <label class="custom-control-label" for="rdActive">Active</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="InActive" id="rdNotActive" value="0">
                                                                    <label class="custom-control-label" for="rdNotActive">Inactive</label>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
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
