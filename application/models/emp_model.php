<?php
/*
* File:			emp_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Emp_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getEmp($output=0) {
		$ary_ret = array();

		$this->db->select('e.id, e.name_tw, e.name_en, e.sex, c.tw as tw_c, is_enable');
		$this->db->join('conf_country c','c.id=e.country_id','left');
		$query = $this->db->get('conf_emp e');

		$ary_cou = $query->result_array();
		if($output == 1) {
			if(count($ary_cou) > 0) {
				foreach ($ary_cou as $key => $val) {
					$ary_ret[$val['id']] = $val['name_tw'].' ('.$val['name_en'].')';
				}
			}

			return $ary_ret;
		}

		return json_encode($ary_cou);
	}

	public function getEmpById($id) {
		$this->db->select('id, name_tw, name_en, mail, sex, is_enable, marrige, birthday, date_onboard, date_offboard, date_oninsure, date_offinsure, idnumber, phone_cell, phone_home, phone_comm, addr_comm, addr_home, emer_name, emer_phone, emer_relation, country_id, school_id, emp_position_id, emp_dep_id');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_emp');
		
		return $query->row_array();		
	}

	public function emp_doEdit() {
		$ary_data = array(
			'is_enable' => $this->input->post('rdo_is_enable'),
			'sex' => $this->input->post('rdo_sex'),
			'country_id'=> $this->input->post('sel_country'),
			'emp_dep_id'=> $this->input->post('sel_emp_dep_id'),
			'emp_position_id'=> $this->input->post('sel_emp_position_id'),
			'school_id'=> $this->input->post('sel_school_id'),
			'addr_comm'		=> $this->input->post('txt_addr_comm'),
			'date_onboard'		=> $this->input->post('txt_date_onboard'),
			'date_offboard'		=> $this->input->post('txt_date_offboard'),
			'mail'		=> $this->input->post('txt_mail'),
			'name_en'		=> $this->input->post('txt_name_en'),
			'name_tw'		=> $this->input->post('txt_name_tw'),
			'phone_comm'		=> $this->input->post('txt_phone_comm'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_emp');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_emp');
		}
		
		return 1;
	}

	public function emp_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_emp');
		
		return 1;
	}

}