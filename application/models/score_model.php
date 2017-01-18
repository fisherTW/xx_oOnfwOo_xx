<?php
/*
* File:			score_model.php
* Version:		-
* Last changed:	2016/08/04
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Score_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getScore() {
		$ary_ret = array();

		$this->db->select('c.*, cs.tw as school_id, csc.tw as schoolclass_id');
		$this->db->join('conf_school cs','cs.id=c.school_id','left');
		$this->db->join('conf_schoolclass csc','csc.id=c.schoolclass_id','left');
		$query = $this->db->get('score c');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getScoreById($id) {
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('score');
		
		return $query->row_array();
	}

	public function score_doEdit() {
		$ary_data = array(
			'school_id' 		=> $this->input->post('sel_school_id'), 
			'schoolclass_id'	=> $this->input->post('sel_schoolclass_id'),
			'date'				=> $this->input->post('txt_date'),
			'name_tw'			=> $this->input->post('sel_name_tw')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('score');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('score');
		}

		// auth info
		$this->labor_course_doEdit($id);

		return 1;
	}

	public function labor_course_doEdit($score_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_course', array('score_id' => $score_id)); 
	
//		$ary_score_row = $this->labor_school_model->getSchoolLaborById(($this->input->post('school').'_'.$this->input->post('school_class')),1);
		
		$ary_score = $this->input->post('score');
		$ary_descr = $this->input->post('salary');
echo '['.count($ary_score).']';
		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['score_id']	= $score_id;
			$ary_date[$i]['date']		= $this->input->post('date');
			$ary_data[$i]['score']		= $this->input->post('score');
			$ary_data[$i]['descr']		= $this->input->post('descr');
		}
		$this->db->insert_batch('mapping_labor_course',$ary_data);

		return 1;
	}

	public function score_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('score');

		// auth info
		$this->labor_course_doDel($id);		
		return 1;
	}

	public function labor_course_doDel($id) {
		$this->db->where('score_id', $id);
		$this->db->delete('mapping_labor_course');

		return 1;
	}

}