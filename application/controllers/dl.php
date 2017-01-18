<?php
/*
* File:			dl.php
* Version:		-
* Last changed:	2016/04/13
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2016
* Product:		NFW
*/
class Dl extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
	}

	function index() {
	}

	function dodl($filename) {
		$real = base_url().'uploads/'.$filename;
		$data = file_get_contents($real);
		force_download($filename, $data, NULL);
	}
}