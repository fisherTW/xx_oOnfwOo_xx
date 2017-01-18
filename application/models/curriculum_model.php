<?php
/*
* File:			curriculum_model.php
* Version:		-
* Last changed:	2016/07/29
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Curriculum_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getCurriculum() {
		$ary_ret = array();

		$this->db->select('c.*, cs.tw as school_id, csc.tw as schoolclass_id');
		$this->db->join('conf_school cs','cs.id=c.school_id','left');
		$this->db->join('conf_schoolclass csc','csc.id=c.schoolclass_id','left');
		$query = $this->db->get('curriculum c');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getCurriculumById($id) {
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('curriculum');
		
		return $query->row_array();
	}

	public function getCurriculum_detailByCurriculumId($id) {
		$ary_ret = array();

		$this->db->select('section,week,course_id');
		$this->db->where('curriculum_id', $id);
		$this->db->order_by("section,week", "asc");
		$query = $this->db->get('mapping_curriculum_detail');
		
		$ary_cou = $query->result_array();
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['section']][$val['week']] = $val['course_id'];
			}
		}
		return $ary_ret;
	}

	public function curriculum_doEdit() {
		$ary_data = array(
			'school_id' 		=> $this->input->post('sel_school_id'), 
			'schoolclass_id'	=> $this->input->post('sel_schoolclass_id')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('curriculum');
			$id = $this->db->insert_id();
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('curriculum');
			$id = $this->input->post('hid_id');
		}

		//info
		$this->curriculumDetail_doEdit($id);

		return 1;
	}

	public function curriculumDetail_doEdit($id) {
		$ary_data = array();
		$this->db->delete('mapping_curriculum_detail', array('curriculum_id' => $id)); 

		$m = 0;
		for ($i = 0; $i < 10; $i++) {
			for ($j = 0; $j < 6; $j++) {
				$ary_course_id[$m] = $this->input->post('sel_course_id'.($i + 1).($j + 1));
				$m ++;
			}
		}
		$k = 0;
		for ($a = 0; $a < 10; $a++) {
			for ($b = 0; $b < 6; $b++) {		
				$ary_data[$k]['curriculum_id']	= $id;
				$ary_data[$k]['section']		= $a + 1;
				$ary_data[$k]['week']			= $b + 1;
				$ary_data[$k]['course_id']		= $ary_course_id[$k];
				$k ++;
			}
		}
		$this->db->insert_batch('mapping_curriculum_detail',$ary_data);

		return 1;
	}

	public function curriculum_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('curriculum');
		//info
		$this->curriculumDetail_doDel($id);

		return 1;
	}

	public function curriculumDetail_doDel($id) {
		$this->db->where('curriculum_id', $id);
		$this->db->delete('mapping_curriculum_detail');

		return 1;
	}	
}