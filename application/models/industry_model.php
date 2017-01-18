<?php
/*
* File:			industry_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Shirley
* Copyright:	(C) 2016
* Product:		NFW
*/

class Industry_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getIndustry($output=0) {
		$ary_ret = array();

		$this->db->select('id, name_init, tw');
		$query = $this->db->get('conf_industry');

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

	public function getIndustryById($id) {
		$this->db->select('id, name_init, tw');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_industry');
		
		return $query->row_array();		
	}

	public function industry_doEdit() {
		$ary_data = array(
			'name_init'	=> $this->input->post('txt_name_init'), 
			'tw'		=> $this->input->post('txt_tw'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_industry');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_industry');
		}
		
		return 1;
	}

	public function industry_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_industry');
		
		return 1;
	}
}