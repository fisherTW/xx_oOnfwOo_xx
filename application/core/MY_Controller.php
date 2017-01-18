<?php
/*
* File:			MY_Controller.php
* Version:		-
* Last changed:	2016/05/23
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2016
* Product:		NFW
*/
class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	// return ary for select list with [0] '未選取'
	public function setCriteriaSelect($ary) {
		$this->load->helper('language');
		$ary[0] = $this->lang->line('unselected');
		ksort($ary);

		return $ary;
	}
}