<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Mst_Product extends CI_Model{

	function get_MstFactory(){
        $sql_prov = $this->db->get('tblMstFactory');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['FactoryID']] = ucwords(strtoupper($row['FactoryID']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }

    function get_MstCategoryProd(){
        $sql_prov = $this->db->get('tblMstCategoryProduct');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['CategoryID']] = ucwords(strtoupper($row['CategoryName']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }

    function get_MstBrand(){
        $sql_prov = $this->db->get('tblMstBrand');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['BrandID']] = ucwords(strtoupper($row['BrandName']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }

    function get_MstUomQty(){
        $sql_prov = $this->db->get('tblMstUom_Quantity');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['UomQty_ID']] = ucwords(strtoupper($row['UomQty_Name']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }

    function get_MstUomVol(){
        $sql_prov = $this->db->get('tblMstUom_Volume');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['UomVol_ID']] = ucwords(strtoupper($row['UomVol_Name']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }

    function get_MstMesin(){
        $sql_prov = $this->db->get('tblmstmesin');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['id']] = ucwords(strtoupper($row['Mesin']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }

    function get_MstGrade(){
        $sql_prov = $this->db->get('tblmstgrade');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['id']] = ucwords(strtoupper($row['Grade']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }

    }

    function get_MstVariant(){
        $sql_prov = $this->db->get('tblmstvariant');
        if ($sql_prov->num_rows() > 0) {
            $result[''] = 'Select';
            foreach ($sql_prov->result_array() as $row) {
                $result[$row['id']] = ucwords(strtoupper($row['variant']));
            }
            return $result;
        } else {
            echo "Not data avaible";
        }
    }

	function simpan($data){
		$this->db->insert('tblMstProduct',$data);
	}

	function get_MstProduct(){
		$query = $this->db->query("SELECT * FROM tblMstProduct");
		return $query->result();
	}

	function get_DataProduct($productid){
		$query = $this->db->query("SELECT * FROM tblMstProduct where ProductID = '$productid'");
		return $query->row();
	}

	function update($productid,$data){
		$this->db->where('ProductID',$productid);
		$this->db->update('tblMstProduct',$data);
	}

	function cek_data($productid){
		$query = $this->db->query("SELECT count(ProductID) as jml FROM tblMstProduct where ProductID = '$productid'");
		return $query->row();
	}
}
