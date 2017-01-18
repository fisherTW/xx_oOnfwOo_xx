<?php
/*
* File:			reasonschool_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Reasonschool_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getReasonschool($output=0) {
		$ary_ret = array();

		$this->db->select('id, tw, descr');
		$query = $this->db->get('conf_reasonschool');

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

	public function getReasonschoolById($id) {
		$this->db->select('id, tw, descr');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_reasonschool');
		
		return $query->row_array();		
	}

	public function reasonschool_doEdit() {
		$ary_data = array(
			'tw'		=> $this->input->post('txt_tw'),
			'descr'		=> $this->input->post('txt_descr'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_reasonschool');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_reasonschool');
		}
		
		return 1;
	}

	public function reasonschool_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_reasonschool');
		
		return 1;
	}
}