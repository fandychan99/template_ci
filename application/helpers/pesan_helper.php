<?php  
if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');

function pesan($pesan, $tipe){
	switch ($tipe) {
		case 'success':
			$class	= 'alert alert-success mb-2';
			$icon 	= 'fa-check-circle';
			$color	= 'success';	
		break;

		case 'error':
			$class	= 'alert alert-danger mb-2';
			$icon 	= 'fa-times-circle';
			$color	= 'danger';
		break;

		default:
			$class	= '';
			$icon 	= 'e';
			$color	= '';
		break;
	}	

	$alert = "<div class='$class' role='alert'><h1 class='$color'><strong><i class='fa $icon mr-1'></i>".strtoupper($tipe)." !</strong></h1> <h6>$pesan</h6></div>";	 
	return $alert;	
}

function pesan_login(){
	$alert = "<div class='alert alert-danger mb-2' role='alert'><h6 class='danger mb-0'><strong><i class='fa fa-exclamation-circle mr-1'></i>Login Failed !</strong></h6> The username or password is incorrect</div>";
	return $alert;
}

?>