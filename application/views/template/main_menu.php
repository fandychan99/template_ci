<ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="dropdown nav-item" data-menu="dropdown"><a class="nav-link" href="<?php echo base_url();?>"><i class="feather icon-home"></i><span>Home</span></a></li>
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fa fa-th-large"></i><span>Master</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>master/category/Mst_Category" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Category Product</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>master/product/Mst_Product" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Product</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>master/sub_product/Mst_Sub_Product" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Sub Product</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>master/brand/Mst_Brand" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Brand</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>master/packaging/Mst_Packaging?>" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Packaging</a>
            </li>                         
        </ul>
    </li>    
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fa fa-file-text"></i><span>Production Report</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="#" ><i class="feather icon-settings"></i> Transaction</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>rekap_produksi/transaction/kelapa/Trn_Rencana_Produksi_Kelapa" data-toggle="dropdown"><i class="feather icon-arrow-right-circle"></i>Coconut Planning</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>rekap_produksi/transaction/kelapa/Trn_Rekap_Produksi_Kelapa" data-toggle="dropdown"><i class="feather icon-arrow-right-circle"></i>Coconut Actual</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>rekap_produksi/transaction/nanas/Trn_Rencana_Produksi_Nanas" data-toggle="dropdown"><i class="feather icon-arrow-right-circle"></i>Pineapple Planning</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>rekap_produksi/transaction/nanas/Trn_Rekap_Produksi_Nanas" data-toggle="dropdown"><i class="feather icon-arrow-right-circle"></i>Pineapple Actual</a></li>
            <hr>
            <li data-menu=""><a class="dropdown-item" href="#"><i class="feather icon-monitor"></i> Monitoring</a></li>     
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>rekap_produksi/monitoring/kelapa/Mtr_Rekap_Produksi_Kelapa" data-toggle="dropdown"><i class="feather icon-circle"></i>Coconut</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>rekap_produksi/monitoring/nanas/Mtr_Rekap_Produksi_Nanas" data-toggle="dropdown"><i class="feather icon-circle"></i>Pineapple</a></li>                        
        </ul>
    </li>
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-clipboard"></i><span>Sales Forecast</span></a>
        <ul class="dropdown-menu">
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Sales Forcecast & Real Shipment</a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>sales_forecast/transaction/Input_Sales_Forecast_Real_Shipment" data-toggle="dropdown"><i class="feather icon-circle"></i>Transaction</a>
                    </li>
                    <li data-menu=""><a class="dropdown-item" href="<?php echo base_url(); ?>sales_forecast/monitoring/Mnt_Input_Sales_Forecast_Real_Shipment" data-toggle="dropdown"><i class="feather icon-circle"></i>Monitoring</a>
                    </li>
                </ul>
            </li>                       
        </ul>
    </li>
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-tag"></i><span>Cogs & Actual Sales Price</span></a>
        <ul class="dropdown-menu">
           <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>cogs_actual_sales_price/transaction/Cogs_Actual_Sales_Price" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Transaction</a>
            </li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>master/product/Mst_Product" data-toggle="dropdown"><i class="fa fa-caret-right"></i>Monitoring</a>
            </li>                  
        </ul>
    </li>
    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-tag"></i><span>Rekap Terima Bahan Baku</span></a>
        <ul class="dropdown-menu">
            <li data-menu=""><a class="dropdown-item" href="#" data-toggle="dropdown"><i class="feather icon-settings"></i> Transaction</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>rekap_terima_bahan_baku/transaction/Trn_Rencana_Terima_Kelapa" data-toggle="dropdown"><i class="feather icon-circle"></i>Coconut Planning</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Kelapa" data-toggle="dropdown"><i class="feather icon-circle"></i>Coconut Actual</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>rekap_terima_bahan_baku/transaction/Trn_Rencana_Terima_Nanas" data-toggle="dropdown"><i class="feather icon-circle"></i>Pineapple Planning</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>rekap_terima_bahan_baku/transaction/Rekap_Terima_Bahan_Baku_Nanas" data-toggle="dropdown"><i class="feather icon-circle"></i>Pineapple Actual</a></li>
            <hr>
            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i class="feather icon-monitor"></i> Monitoring</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>rekap_terima_bahan_baku/monitoring/Mnt_Terima_Kelapa" data-toggle="dropdown"><i class="feather icon-circle"></i>Coconut</a></li>
            <li data-menu=""><a class="dropdown-item" href="<?php echo base_url();?>rekap_terima_bahan_baku/monitoring/Mnt_Terima_Nanas" data-toggle="dropdown"><i class="feather icon-circle"></i>Pineapple</a></li>    
        </ul>
    </li>                             
</ul>