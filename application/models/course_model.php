<?php
/*
* File:			course_model.php
* Version:		-
* Last changed:	2016/07/28
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Course_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getCourse($output=0) {
		$ary_ret = array();

		$this->db->select('c.*, cs.tw as school_id, csc.tw as schoolclass_id, ce.name_tw as emp_id');
		$this->db->join('conf_school cs','cs.id=c.school_id','left');
		$this->db->join('conf_schoolclass csc','csc.id=c.schoolclass_id','left');
		$this->db->join('conf_emp ce','ce.id=c.emp_id','left');
		$query = $this->db->get('course c');
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

	public function getCourseById($id) {
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('course');
		
		return $query->row_array();		
	}

	public function course_doEdit() {
		$ary_data = array(
			'name_init' 		=> $this->input->post('txt_name_init'), 
			'tw' 				=> $this->input->post('txt_tw'), 
			'local' 			=> $this->input->post('txt_local'), 
			'school_id' 		=> $this->input->post('sel_school_id'), 
			'schoolclass_id'	=> $this->input->post('sel_schoolclass_id'),
			'emp_id'			=> $this->input->post('sel_emp_id'),
			'file_path'			=> $this->input->post('hid_filepath'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('course');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('course');
		}
		
		return 1;
	}

	public function course_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('course');
		
		return 1;
	}

	public function getCourseBySchool($school,$schoolclass) {
		$ary_ret = array();

		$this->db->select('c.*, ce.name_tw as name_tw');
		$this->db->join('conf_emp ce','ce.id=c.emp_id','left');
		$this->db->where('c.school_id',$school);
		$this->db->where('c.schoolclass_id',$schoolclass);
		$this->db->order_by('c.id','asc');
		$query = $this->db->get('course c');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['tw'].'('.$val['name_tw'].')';
			}
		}

		return $ary_ret;
	}	
}