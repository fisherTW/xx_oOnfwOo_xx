<?php
/*
* File:			examination_model.php
* Version:		-
* Last changed:	2016/08/04
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Examination_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getExamination($output=0) {
		$ary_ret = array();

		$this->db->select('e.*, cs.tw as school_id, csc.tw as schoolclass_id');
		$this->db->join('conf_school cs','cs.id=e.school_id','left');
		$this->db->join('conf_schoolclass csc','csc.id=e.schoolclass_id','left');
		$query = $this->db->get('examination e');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getExaminationById($id) {
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('examination');
		
		return $query->row_array();
	}

	public function examination_doEdit() {
		$ary_data = array(
			'school_id' 		=> $this->input->post('sel_school_id'), 
			'schoolclass_id'	=> $this->input->post('sel_schoolclass_id'),
			'course_id'			=> $this->input->post('sel_course_id'),
			'name_tw'			=> $this->input->post('txt_name_tw'),
			'name_local'		=> $this->input->post('txt_name_local'),
			'detail_tw'			=> $this->input->post('txt_detail_tw'),
			'detail_local'		=> $this->input->post('txt_detail_local'),
			'score'				=> $this->input->post('txt_score'),
			'file_path'			=> $this->input->post('hid_filepath'),
			'file_path2'		=> $this->input->post('hid_filepath2')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('examination');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('examination');
		}
		
		return 1;
	}

	public function examination_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('examination');
		
		return 1;
	}
}