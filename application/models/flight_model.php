<?php
/*
* File:			flight_model.php
* Version:		-
* Last changed:	2016/03/07
* Purpose:		-
* Author:		Shirley
* Copyright:	(C) 2016
* Product:		NFW
*/

class Flight_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getFlight($output=0) {
		$ary_ret = array();

		$this->db->select('a.id, a.number, a.dep, a.arr, a.dep_time, a.arr_time, c.tw as tw_c, c.name_init as name_init_c');
		$this->db->join('conf_airline c','c.id=a.airline_id','left');
		$query = $this->db->get('conf_flight a');

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

	public function getFlightById($id) {
		$this->db->select('id, number, dep, arr, dep_time, arr_time, airline_id');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_flight');
		
		return $query->row_array();		
	}

	public function flight_doEdit() {
		$ary_data = array(
			'airline_id'   => $this->input->post('sel_airline'),	
			'number'	   => $this->input->post('txt_number'), 
			'dep'		   => $this->input->post('txt_dep'), 
			'arr'		   => $this->input->post('txt_arr'),
			'dep_time'	   => $this->input->post('txt_dep_time'),
			'arr_time'	   => $this->input->post('txt_arr_time'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_flight');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_flight');
		}
		
		return 1;
	}

	public function flight_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_flight');
		
		return 1;
	}

	// $output:
	//		-1: all numbers (default)
	public function getFlightByNumber($output=0) {
		$ary_ret = array();

		$this->db->select('*');
		$query = $this->db->get('conf_flight');

		$ary_cou = $query->result_array();

		if($output == 1) {
			if(count($ary_cou) > 0) {
				foreach ($ary_cou as $key => $val) {
					$ary_ret[$val['id']] = $val['number'];
				}
			}

			return $ary_ret;
		}

		return json_encode($ary_cou);
	}

	// $number:
	//		-1: all numbers (default)
	public function getFlightByNumberSel($number=-1) {
		$ary_ret = array();

		$this->db->select('*');
		if($number != -1) {
			$this->db->where('id', $number);
			$this->db->order_by("number","asc");
		}
		$query = $this->db->get('conf_flight');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[0] = $val['id'];
				$ary_ret[1] = $val['number'];
				$ary_ret[2] = $val['dep_time'];
				$ary_ret[3] = $val['arr_time'];
				$ary_ret[4] = $val['dep'];
				$ary_ret[5] = $val['arr'];
			}
		}
		return $ary_ret;
	}

	public function getFlightByminid() {
		$this->db->select('id');
		$this->db->order_by("id","asc");
		$query = $this->db->get('conf_flight');
		
		return $query->row_array();		
	}
}