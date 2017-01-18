<?php
/*
* File:			country_model.php
* Version:		-
* Last changed:	2016/02/25
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Country_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getCountry($output=0) {
		$ary_ret = array();

		$this->db->select('id, tw, name_init');
		$query = $this->db->get('conf_country');
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

	// return array
	public function getCountryInit() {
		$this->load->helper('file');

		$ary_ret = array();

		$json = json_decode(read_file('./assets/json/country.json'));
		$ary_cou = $json->countries->country;

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val->countryCode] = $val->countryCode.' ('.$val->countryName.')';
			}
		}

		return $ary_ret;
	}

	public function getCountryById($id) {
		$this->db->select('id, tw, name_init');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_country');
		
		return $query->row_array();		
	}

	public function country_doEdit() {
		$ary_data = array(
			'name_init' => $this->input->post('txt_name_init'), 
			'tw'		=> $this->input->post('txt_tw')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_country');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_country');
		}
		
		return 1;
	}

	public function country_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_country');
		
		return 1;
	}
}