<?php
/*
* File:			schoolclass_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Schoolclass_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getSchoolclass($output=0) {
		$ary_ret = array();

		$this->db->select('c.id, c.school_id, c.tw, c.descr, s.tw as schoolname');
		$this->db->join('conf_school s','s.id=c.school_id','left');
		$query = $this->db->get('conf_schoolclass c');

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

	public function getSchoolclassById($id) {
		$this->db->select('id, school_id, tw, descr');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_schoolclass');
		
		return $query->row_array();		
	}

	public function schoolclass_doEdit() {
		$ary_data = array(
			'school_id'		=> $this->input->post('sel_school'),
			'tw'		=> $this->input->post('txt_tw'),
			'descr'		=> $this->input->post('txt_descr')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_schoolclass');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_schoolclass');
		}
		
		return 1;
	}

	public function schoolclass_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_schoolclass');
		
		return 1;
	}
}