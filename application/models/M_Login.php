<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Login extends CI_Model
{
	private $table = 'tbl_mst_user';  
    private $id = 'Username';

    function __construct()
    {
        parent::__construct();
    }
    
    function cek_login($data){      
        return $this->db->get_where($this->table, $data);
    }   
}