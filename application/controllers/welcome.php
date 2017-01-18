<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* File:			welcome.php
* Version:		-
* Last changed:	2016/05/11
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/
class Welcome extends CI_Controller {
	public function index() {
		$this->load->helper('language');
		$this->load->helper('url');

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('welcome_message');
		$this->load->view('template/footer');
	}
}

/* End of file*/