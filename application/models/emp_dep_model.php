<?php
/*
* File:			emp_dep_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Emp_dep_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getEmp_dep($output=0) {
		$ary_ret = array();

		$this->db->select('d.id, d.tw, d.country_id, d.descr, c.tw as tw_c, es.name_tw as es_name_tw, ew.name_tw as ew_name_tw');
		$this->db->join('conf_country c','c.id=d.country_id','left');
		$this->db->join('conf_emp es','es.id=d.emp_id_super','left');
		$this->db->join('conf_emp ew','ew.id=d.emp_id_window','left');
		$query = $this->db->get('conf_emp_dep d');

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

	public function getEmp_depById($id) {
		$this->db->select('id, country_id, emp_id_super, tw, descr, emp_id_window');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_emp_dep');
		
		return $query->row_array();		
	}

	public function emp_dep_doEdit() {
		$ary_data = array(
			'emp_id_super' => $this->input->post('sel_emp_id_super'),
			'emp_id_window' => $this->input->post('sel_emp_id_window'),
			'country_id'=> $this->input->post('sel_country'),
			'tw'		=> $this->input->post('txt_tw'),
			'descr'		=> $this->input->post('txt_descr'),
		);
		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_emp_dep');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_emp_dep');
		}
		
		return 1;
	}

	public function emp_dep_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_emp_dep');
		
		return 1;
	}
}