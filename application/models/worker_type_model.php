<?php
/*
* File:			worker_type_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Worker_type_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getWorker_type($output=0) {
		$ary_ret = array();

		$this->db->select('worker_type_major_id, worker_type_minor_id, tw, descr');
		$query = $this->db->get('conf_worker_type');

		$ary_cou = $query->result_array();

		if($output == 1) {
			if(count($ary_cou) > 0) {
				foreach ($ary_cou as $key => $val) {
					$ary_ret[$val['worker_type_minor_id']] = $val['tw'];
				}
			}

			return $ary_ret;
		}

		return json_encode($ary_cou);
	}

	public function getWorker_typeById($id) {
		list($worker_type_major_id, $worker_type_minor_id) = explode('_', $id);
		$this->db->select('worker_type_major_id, worker_type_minor_id, tw, descr');
		$this->db->where('worker_type_major_id', $worker_type_major_id);
		$this->db->where('worker_type_minor_id', $worker_type_minor_id);
		$query = $this->db->get('conf_worker_type');
		
		return $query->row_array();		
	}

	public function worker_type_doEdit() {


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

	public function worker_type_doDel($id) {
		list($major, $minor) = explode('_', $id);
		$this->db->where('worker_type_major_id', $major);
		$this->db->where('worker_type_minor_id', $minor);
		$this->db->delete('conf_worker_type');
		
		return 1;
	}
}