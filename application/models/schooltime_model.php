<?php
/*
* File:			schooltime_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Schooltime_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getSchooltime($output=0) {
		$ary_ret = array();

		$this->db->select('st.id, st.school_id, st.section, st.time_start, st.time_end, s.tw as schoolname');
		$this->db->join('conf_school s','s.id=st.school_id','left');
		$this->db->order_by('st.school_id asc, st.time_start asc'); 		
		$query = $this->db->get('conf_schooltime st');

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

	public function getSchooltimeById($id) {
		$this->db->select('id, school_id, section, time_start, time_end');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_schooltime');
		
		return $query->row_array();		
	}

	public function schooltime_doEdit() {
		$ary_data = array(
			'school_id'		=> $this->input->post('sel_school'),
			'section'		=> $this->input->post('txt_section'),
			'time_start'		=> $this->input->post('txt_time_start'),
			'time_end'		=> $this->input->post('txt_time_end')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_schooltime');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_schooltime');
		}
		
		return 1;
	}

	public function schooltime_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_schooltime');
		
		return 1;
	}
}