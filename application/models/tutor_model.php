<?php
/*
* File:			tutor_model.php
* Version:		-
* Last changed:	2016/07/28
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Tutor_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getTutor() {
		$ary_ret = array();

		$this->db->select('t.id, cs.tw as school_id, csc.tw as schoolclass_id, ce.name_tw as emp_id, t.date_start, t.date_end');
		$this->db->join('conf_school cs','cs.id=t.school_id','left');
		$this->db->join('conf_schoolclass csc','csc.id=t.schoolclass_id','left');
		$this->db->join('conf_emp ce','ce.id=t.emp_id','left');
		$query = $this->db->get('tutor t');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getTutorById($id) {
		$this->db->select('id,school_id, schoolclass_id, emp_id, date_start, date_end');
		$this->db->where('id', $id);
		$query = $this->db->get('tutor');
		
		return $query->row_array();		
	}

	public function tutor_doEdit() {
		$ary_data = array(
			'school_id' 		=> $this->input->post('sel_school_id'), 
			'schoolclass_id'	=> $this->input->post('sel_schoolclass_id'),
			'emp_id'			=> $this->input->post('sel_emp_id'),
			'date_start'		=> $this->input->post('txt_date_start'),
			'date_end'			=> $this->input->post('txt_date_end')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('tutor');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('tutor');
		}
		
		return 1;
	}

	public function tutor_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('tutor');
		
		return 1;
	}
}