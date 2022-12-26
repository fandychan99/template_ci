<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mst_Product extends CI_Controller{
	function __construct(){
        parent::__construct();

        if($this->session->userdata('Status') != "login"){
            redirect(base_url("Login"));
        }
        
        $this->load->library('form_validation'); 
        $this->load->model('master/product/M_Mst_Product');
    }    
	
	function index() {

		$data['_getMstProduct'] = $this->M_Mst_Product->get_MstProduct();
        $data['message']        = $this->session->flashdata('message');
		$this->template->display('master/product/index',$data);
    }

    function tambahData(){

    	$data['_getMstFactory'] =  $this->M_Mst_Product->get_MstFactory();
        $data['_CategoryID'] =  $this->M_Mst_Product->get_MstCategoryProd();
        $data['_BrandID'] =  $this->M_Mst_Product->get_MstBrand();
        $data['_UomQty'] =  $this->M_Mst_Product->get_MstUomQty();
        $data['_UomVol'] =  $this->M_Mst_Product->get_MstUomVol();
        $data['_Mesin'] = $this->M_Mst_Product->get_MstMesin();
        $data['_Variant'] = $this->M_Mst_Product->get_MstVariant();
        $data['_Grade'] = $this->M_Mst_Product->get_MstGrade();
        $data['message']        = $this->session->flashdata('message');
    	$this->template->display('master/product/formInput',$data);
    }

    function simpanData(){
    	$ProductID	        = $this->input->post('ProductID');
    	$ProductName        = $this->input->post('ProductName');
    	$FactoryID	        = $this->input->post('FactoryID');
    	$Product_CategoryID = $this->input->post('Product_CategoryID');
        $BrandID            = $this->input->post('BrandID');
        $UomVol_ID          = $this->input->post('UomVol_ID');
        $Uom_Volume         = $this->input->post('Uom_Volume');
        $UomQty_ID          = $this->input->post('UomQty_ID');
        $Per_Packing_imm    = $this->input->post('Per_Packing_imm');
        $Per_Packing        = $this->input->post('Per_Packing');
        $Container_20ft     = $this->input->post('Container_20ft');
        $Container_40ft     = $this->input->post('Container_40ft');
        $Mesin              = $this->input->post('Mesin');
        $Grade              = $this->input->post('Grade');
        $Variant            = $this->input->post('Variant');
        $FC                 = $this->input->post('FC');
        $import             = $this->input->post('import');
        $InActive           = $this->input->post('InActive');
        $cek                = $this->M_Mst_Product->cek_data($ProductID);

        if($cek->jml == 0){
            $data = array(
                'ProductID' => $ProductID,
                'ProductName' => $ProductName,
                'FactoryID' => $FactoryID,
                'Product_CategoryID' => $Product_CategoryID,
                'BrandID' => $BrandID,
                'UomVol_ID' => $UomVol_ID,
                'Uom_Volume' => $Uom_Volume,
                'UomQty_ID' => $UomQty_ID,
                'Per_Packing_imm' => $Per_Packing_imm,
                'Per_Packing' => $Per_Packing,
                'Container_20ft' => $Container_20ft,
                'Container_40ft' => $Container_40ft,
                'FC' => ($FC == 0 ? null : $FC),
                'Mesin' => ($Mesin == '' ? null : $Mesin),
                'Grade' => ($Grade == '' ? null : $Grade),
                'Variant' => ($Variant == '' ? null : $Variant),
                'ImportEksport' => ($import == '' ? null : $import),
                'InActive' => $InActive,
                'CreatedBy' => 'SYSTEM',
                'CreatedDate' => date('Y-m-d H:i:s')
            );
            $this->M_Mst_Product->simpan($data);
            $this->session->set_flashdata('message', pesan('Data master Product '.$ProductID.' berhasil disimpan.', 'success'));
            redirect(base_url('master/product/Mst_Product'));  
        }else{
            $this->session->set_flashdata('message', pesan('Data master Product'.$ProductID.' sudah dibuat.', 'error'));
            redirect(base_url('master/product/Mst_Product/tambahData'));
        }
    }

    function editData(){
    	$productid = $this->uri->segment(5);
        $data['_getMstFactory'] =  $this->M_Mst_Product->get_MstFactory();
        $data['_CategoryID'] =  $this->M_Mst_Product->get_MstCategoryProd();
        $data['_BrandID'] =  $this->M_Mst_Product->get_MstBrand();
        $data['_UomQty'] =  $this->M_Mst_Product->get_MstUomQty();
        $data['_UomVol'] =  $this->M_Mst_Product->get_MstUomVol();
        $data['_Mesin'] = $this->M_Mst_Product->get_MstMesin();
        $data['_Variant'] = $this->M_Mst_Product->get_MstVariant();
        $data['_Grade'] = $this->M_Mst_Product->get_MstGrade();
    	$data['_getDatarEditProduct'] = $this->M_Mst_Product->get_DataProduct($productid);
        $data['message'] = $this->session->flashdata('message');
    	$this->template->display('master/product/formEdit',$data);
    }

    function updateData(){
    	$ProductID         = $this->input->post('ProductID');
        $ProductName        = $this->input->post('ProductName');
        $FactoryID          = $this->input->post('FactoryID');
        $Product_CategoryID = $this->input->post('Product_CategoryID');
        $BrandID            = $this->input->post('BrandID');
        $UomVol_ID          = $this->input->post('UomVol_ID');
        $Uom_Volume         = $this->input->post('Uom_Volume');
        $UomQty_ID          = $this->input->post('UomQty_ID');
        $Per_Packing_imm    = $this->input->post('Per_Packing_imm');
        $Per_Packing        = $this->input->post('Per_Packing');
        $Container_20ft     = $this->input->post('Container_20ft');
        $Container_40ft     = $this->input->post('Container_40ft');
        $Mesin              = $this->input->post('Mesin');
        $Grade              = $this->input->post('Grade');
        $Variant            = $this->input->post('Variant');
        $FC                 = $this->input->post('FC');
        $import             = $this->input->post('import');
        $InActive           = $this->input->post('InActive');
        $cek                = $this->M_Mst_Product->cek_data($ProductID);

        if($cek->jml == 1){
            $data = array(
                'ProductName' => $ProductName,
                'FactoryID' => $FactoryID,
                'Product_CategoryID' => $Product_CategoryID,
                'BrandID' => $BrandID,
                'UomVol_ID' => $UomVol_ID,
                'Uom_Volume' => $Uom_Volume,
                'UomQty_ID' => $UomQty_ID,
                'Per_Packing_imm' => $Per_Packing_imm,
                'Per_Packing' => $Per_Packing,
                'Container_20ft' => $Container_20ft,
                'Container_40ft' => $Container_40ft,
                'FC' => ($FC == 0 ? null : $FC),
                'Mesin' => ($Mesin == '' ? null : $Mesin),
                'Grade' => ($Grade == '' ? null : $Grade),
                'Variant' => ($Variant == '' ? null : $Variant),
                'ImportEksport' => ($import == '' ? null : $import),
                'InActive' => $InActive,
                'UpdateBy' => 'SYSTEM',
                'UpdateDate' => date('Y-m-d H:i:s')
            );
            $this->M_Mst_Product->update($ProductID,$data);
            $this->session->set_flashdata('message', pesan('Data master Product '.$ProductID.' berhasil diupdate.', 'success'));
            redirect(base_url('master/product/Mst_Product'));  
        }else{
             $this->session->set_flashdata('message', pesan('Data master Product'.$ProductID.' sudah dibuat.', 'error'));
            redirect(base_url('master/product/Mst_Product/editData/'.$ProductID));
        }
    }
}?>