<?php
/*
* File:			emp_position_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Emp_position_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getEmp_position($output=0) {
		$ary_ret = array();

		$this->db->select('e.id, e.country_id, e.emp_position_category_id, e.tw, e.descr, c.tw as tw_c, epc.tw as tw_epc');
		$this->db->join('conf_country c','c.id=e.country_id','left');
		$this->db->join('conf_emp_position_category epc','epc.id=e.emp_position_category_id','left');
		$query = $this->db->get('conf_emp_position e');

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

	public function getEmp_positionById($id) {
		$this->db->select('id, country_id, emp_position_category_id, tw, descr');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_emp_position');
		
		return $query->row_array();		
	}

	public function getPositionCategory() {
		$ary_ret = array();
		
		$this->db->select('id, tw');
		$query = $this->db->get('conf_emp_position_category');
		$ary_cou = $query->result_array();
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['tw'];
			}
		}		

		return $ary_ret;
	}


	public function emp_position_doEdit() {
		$ary_data = array(
			'emp_position_category_id' => $this->input->post('sel_emp_position_category_id'),
			'country_id'=> $this->input->post('sel_country'),
			'tw'		=> $this->input->post('txt_tw'),
			'descr'		=> $this->input->post('txt_descr'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_emp_position');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_emp_position');
		}
		
		return 1;
	}

	public function emp_position_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_emp_position');
		
		return 1;
	}
}