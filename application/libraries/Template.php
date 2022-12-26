<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
	
    function display($template, $data = null){		        
		$data['_head']		= $this->_CI->load->view('template/head', $data,true);
		$data['_header']	= $this->_CI->load->view('template/header', $data,true);		
		$data['_main_menu']	= $this->_CI->load->view('template/main_menu', $data,true);

		$data['_content']	= $this->_CI->load->view($template, $data,true);
		
		$data['_footer']	= $this->_CI->load->view('template/footer', $data,true);
        $this->_CI->load->view('/template.php',$data);
    }
	
}

/* End of file template.php */
/* Location: ./system/application/libraries/template.php */