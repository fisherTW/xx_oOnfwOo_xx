<?php
/*
* File:			area_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Shirley
* Copyright:	(C) 2016
* Product:		NFW
*/

class Area_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getArea($output=0) {
		$ary_ret = array();

		$this->db->select('id, name_init, tw, descr');
		$query = $this->db->get('conf_area');

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

	public function getAreaById($id) {
		$this->db->select('id, name_init, tw, descr');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_area');
		
		return $query->row_array();		
	}

	public function area_doEdit() {
		$ary_data = array(
			'name_init'	=> $this->input->post('txt_name_init'), 
			'tw'		=> $this->input->post('txt_tw'),
			'descr'		=> $this->input->post('txt_descr'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_area');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_area');
		}
		
		return 1;
	}

	public function area_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_area');
		
		return 1;
	}
}