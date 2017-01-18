<?php
/*
* File:			airline_model.php
* Version:		-
* Last changed:	2016/02/25
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Airline_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getAirline($output=0) {
		$ary_ret = array();

		$this->db->select('a.id, a.tw, a.name_init, country_id, c.tw as tw_c, c.name_init as name_init_c');
		$this->db->join('conf_country c','c.id=a.country_id','left');
		$query = $this->db->get('conf_airline a');
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

	public function getAirlineById($id) {
		$this->db->select('id, tw, name_init, country_id');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_airline');
		
		return $query->row_array();		
	}

	public function airline_doEdit() {
		$ary_data = array(
			'name_init' 	=> $this->input->post('txt_name_init'), 
			'tw'			=> $this->input->post('txt_tw'),
			'country_id'	=> $this->input->post('sel_country')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_airline');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_airline');
		}
		
		return 1;
	}

	public function airline_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_airline');
		
		return 1;
	}
}