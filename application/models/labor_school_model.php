<?php
/*
* File:			labor_school_model.php
* Version:		-
* Last changed:	2016/08/25
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Labor_school_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getLaborSchool($output=0) {
		$ary_ret = array();

		$this->db->distinct();
		$this->db->select('c.school_id, c.schoolclass_id, cs.tw as cs_school_id, csc.tw as csc_schoolclass_id');
		$this->db->join('conf_school cs','cs.id=c.school_id','left');
		$this->db->join('conf_schoolclass csc','csc.id=c.schoolclass_id','left');
		$query = $this->db->get('conf_mapping_labor_school_class c');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getSchoolLaborById($id,$detail) {
		list($school_id, $schoolclass_id) = explode('_', $id);
		$this->db->select('c.school_id, c.schoolclass_id, c.labor_id, l.a_name_tw as name_tw, l.a_name_en as name_en, l.a_name_local as name_local');
		$this->db->join('labor l','l.id=c.labor_id','left');
		$this->db->where('school_id', $school_id);
		$this->db->where('schoolclass_id', $schoolclass_id);
		$this->db->order_by('c.labor_id', 'asc');		
		$query = $this->db->get('conf_mapping_labor_school_class c');
		
		if ($detail == 0) {
			return $query->row_array();
		} else {
			return $query->result_array();
		}
	}

	public function labor_school_doEdit() {
		if(strval($this->input->post('hid_id')) == '0_0') {
			// get new minor id
			$this->db->select_max('worker_type_minor_id');
			$this->db->where('worker_type_major_id', $this->input->post('sel_workertypemajor'));
			$query = $this->db->get('conf_worker_type');
			$row = $query->row(); 
			$minor = $row->worker_type_minor_id;

			$ary_data = array(
				'worker_type_major_id'	=> $this->input->post('sel_workertypemajor'),
				'worker_type_minor_id'	=> ($minor + 1),
				'tw'		=> $this->input->post('txt_tw'),
				'descr'		=> $this->input->post('txt_descr'),
			);
			$this->db->set($ary_data);
			$this->db->insert('conf_worker_type');
		} else {
			$ary_data = array(
				'worker_type_major_id'	=> $this->input->post('sel_workertypemajor'),
				'tw'		=> $this->input->post('txt_tw'),
				'descr'		=> $this->input->post('txt_descr'),
			);
			$this->db->set($ary_data);

			list($major, $minor) = explode('_', $this->input->post('hid_id'));
			$this->db->where('worker_type_major_id', $major);
			$this->db->where('worker_type_minor_id', $minor);
			$this->db->update('conf_worker_type');
		}
		
		return 1;
	}

	public function score_doDel($id) {
		list($school_id, $schoolclass_id) = explode('_', $id);
		$this->db->where('school_id', $school_id);
		$this->db->where('schoolclass_id', $schoolclass_id);
		$this->db->delete('conf_mapping_labor_school_class');
		
		return 1;
	}	
}