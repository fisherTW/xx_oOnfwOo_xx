<?php
/*
* File:			doc_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Doc_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getDoc($output=0, $type=DOC_TYPE_LETTER) {
		$ary_ret = array();

		$this->db->select('id, tw, descr, type');
		$this->db->where('type', $type);
		$query = $this->db->get('conf_doc');

		$ary_cou = $query->result_array();

		if($output == 1) {
			if(count($ary_cou) > 0) {
				foreach ($ary_cou as $key => $val) {
					$ary_ret[$val['id']] = $val['tw'];
				}
			}

			return $ary_ret;
		}

		return json_encode($ary_cou);
	}

	// $output:1: only id->name
	public function getDocById($output, $id) {
		$ary_ret = array();

		$this->db->select('id, tw, descr');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_doc');
		$ary_cou = $query->result_array();

		if($output == 1) {
			if(count($ary_cou) > 0) {
				foreach ($ary_cou as $key => $val) {
					$ary_ret[$val['id']] = $val['tw'];
				}
			}

			return $ary_ret;
		}		

		return $ary_cou[0];		
	}

	public function doc_doEdit() {
		$ary_data = array(
			'type'		=> $this->input->post('hid_type'),
			'tw'		=> $this->input->post('txt_tw'),
			'descr'		=> $this->input->post('txt_descr'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_doc');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_doc');
		}
		
		return 1;
	}

	public function doc_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_doc');
		
		return 1;
	}
}