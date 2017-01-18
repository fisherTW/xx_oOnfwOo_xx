<?php
/*
* File:			school_model.php
* Version:		-
* Last changed:	2016/02/25
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class School_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getSchool($output=0) {
		$ary_ret = array();

		$this->db->select('a.id, a.name_init, a.tw, a.tw_short, a.tw_address, a.en_address, a.phone, a.city, a.country_id, c.tw as tw_c, c.name_init as name_init_c');
		$this->db->join('conf_country c','c.id=a.country_id','left');
		$query = $this->db->get('conf_school a');

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

	public function getSchoolById($id) {
		$this->db->select('id, name_init, tw, tw_short, tw_address, en_address, phone, city, country_id');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_school');
		
		return $query->row_array();		
	}

	public function school_doEdit() {
		$ary_data = array(
			'name_init'    => $this->input->post('txt_name_init'), 
			'tw'		   => $this->input->post('txt_tw'),
			'tw_short'	   => $this->input->post('txt_tw_short'),
			'tw_address'   => $this->input->post('txt_tw_address'),
			'en_address'   => $this->input->post('txt_en_address'),
			'phone'        => $this->input->post('txt_phone'),	
			'city'         => $this->input->post('txt_city'),	
			'country_id'   => $this->input->post('sel_country'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_school');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_school');
		}
		
		return 1;
	}

	public function school_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_school');
		
		return 1;
	}
}