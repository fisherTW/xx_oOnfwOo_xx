<?php
/*
* File:			upload.php
* Version:		-
* Last changed:	2016/04/13
* Purpose:		-
* Author:		Fisher Liao / fisher.liao@gmail.com
* Copyright:	(C) 2016
* Product:		NFW
*/
class Upload extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	function index() {
	}

	function do_upload() {
		$ret = new stdClass();
		$ret->error = 'error!';

		$targetPath = dirname($_SERVER["SCRIPT_FILENAME"]).'/uploads/';
		if (!empty($_FILES)) {
			foreach ($_FILES as $key => $val) {
				$ary_file = $val;
			}
			list($o_name, $o_ext) = explode('.', $ary_file['name']);
			$micro_date = microtime();
			$date_array = explode(" ",$micro_date);
			$date = date("Ymd_His_",$date_array[1]);
			$str_time = $date.intval($date_array[0] * 100);

			$tempFile = $ary_file['tmp_name'];
			$targetFile =  $targetPath. $str_time.'.'.$o_ext;
			move_uploaded_file($tempFile,$targetFile);
			$ret->new_name = $str_time.'.'.$o_ext;
			$ret->key_o = $key;
			$ret->key 	= str_replace('input_', '', $key);
			unset($ret->error);
		}

		echo json_encode($ret);
	}
}
?>