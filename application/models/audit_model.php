<?php
/*
* File:			audit_model.php
* Version:		-
* Last changed:	2016/02/25
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Audit_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getAuditInfo($func_type, $func_id) {
		$ary_cou = array();
		$ary_tmp = array();
		$ary_tmp2 = array();

		$this->db->select('a.audit_role, a.group, r.tw');
		$this->db->join('role r', 'r.id=a.audit_role',' left');
		$this->db->where('a.func_type',$func_type);
		$this->db->order_by('a.audit_order','asc');
		$query = $this->db->get('audit_rule a');
		$ary_cou = $query->result_array();		
		for($i=0; $i < count($ary_cou); $i++) {
			$ary_tmp[$ary_cou[$i]['group']][] = $ary_cou[$i]['tw'];
		}
		$max_group_rule = max(array_keys($ary_tmp));

		// log
		$max_round_log = $this->getLogMaxRound($func_type, $func_id);
		$max_group_log = $this->getLogMaxGroup($func_type, $func_id, $max_round_log);
		$ary_tmp2['max_group_log'] = $max_group_log;

		$ary_result = $this->getLogMaxResult($func_type, $func_id, $max_round_log, $max_group_log);
		$result = $ary_result[0];
		$descr = $ary_result[1];

		$ary_tmp2['ary_lastRound'] = $this->getLogLastRound($func_type, $func_id, $max_round_log);
		
		$ary_tmp2['result'] = $result;

		if(strval($result) === '0') {
			// reject
			$ary_tmp2['status'] = 'audit_status_reject';
			$ary_tmp2['descr'] = $descr;
		} else {
			if(strval($max_group_rule) == strval($max_group_log)) {
				$ary_tmp2['status'] = 'audit_status_done';
				$ary_tmp2['descr'] = '-';
			} else {
				$ary_tmp2['status'] = 'audit_status_ing';
				$ary_tmp2['descr'] = '-';
			}
		}

		$ary_ret['role'] = $ary_tmp;
		$ary_ret['log'] = $ary_tmp2;

		return $ary_ret;
	}

	public function getLogMaxRound($func_type, $func_id) {
		$ret = 0;
		$ary_where = array(
			'func_type' => $func_type,
			'func_id' => $func_id
		);
		$this->db->select_max('a_round');
		$this->db->where($ary_where);
		$query = $this->db->get('audit_log');

		if($query->num_rows() > 0) {
			$row = $query->row(); 
			$ret = is_null($row->a_round) ? 0 : $row->a_round;
		}

		return $ret;
	}

	public function getLogMaxGroup($func_type, $func_id, $round) {
		$ret = 0;
		$ary_where = array(
			'func_type' => $func_type,
			'func_id' => $func_id,
			'a_round' => $round
		);
		$this->db->select_max('a_group');
		$this->db->where($ary_where);
		$query = $this->db->get('audit_log');

		if($query->num_rows() > 0) {
			$row = $query->row(); 
			$ret = is_null($row->a_group) ? 0 : $row->a_group;
		}

		return $ret;
	}

	// output: array(result, descr)
	public function getLogMaxResult($func_type, $func_id, $round, $group) {
		$ary_ret = array(NULL, NULL);
		$ary_where = array(
			'func_type' => $func_type,
			'func_id' => $func_id,
			'a_round' => $round,
			'a_group' => $group
		);
		$this->db->select('a_result, a_descr');
		$this->db->where($ary_where);
		$query = $this->db->get('audit_log');

		if($query->num_rows() > 0) {
			$row = $query->row(); 
			$ary_ret[0] = $row->a_result;
			$ary_ret[1] = $row->a_descr;
		}

		return $ary_ret;
	}

	public function getLogLastRound($func_type, $func_id, $round) {
		$ary_ret = array();
		$ary_where = array(
			'a.func_type' => $func_type,
			'a.func_id' => $func_id,
			'a.a_round' => $round
		);
		$this->db->select('a.a_group, a.a_user_id, a.a_date, a.a_result, u.tw');
		$this->db->where($ary_where);
		$this->db->join('user u','u.id=a.a_user_id','left');
		$this->db->order_by('a_date', 'asc');
		$query = $this->db->get('audit_log a');

		foreach ($query->result_array() as $row) {
			$ary_ret[$row['a_group']]['tw'] = $row['tw'];
			$ary_ret[$row['a_group']]['date'] = $row['a_date'];
			$ary_ret[$row['a_group']]['result'] = $row['a_result'];
		}
		return $ary_ret;
	}

	public function getGroupByRole($func_type, $role) {
		$ret = 0;
		$ary_where = array(
			'func_type' => $func_type,
			'audit_role' => $role
		);
		$this->db->select('group');
		$this->db->where($ary_where);
		$query = $this->db->get('audit_rule');

		if($query->num_rows() > 0) {
			$row = $query->row(); 
			$ret = is_null($row->group) ? 0 : $row->group;
		}

		return $ret;
	}

	//$a_group edit->insert 0
	public function audit_doInsert($func_type,$a_result,$func_id,$a_group) {
		$max_round_log = $this->getLogMaxRound($func_type, $func_id);
		$group = $this->getGroupByRole($func_type, $this->session->userdata('role'));
		$ary_tmp = $this->getLogLastRound($func_type, $func_id, $max_round_log);		

		if(count($ary_tmp) > 0) {
			$max_group = max(array_keys($ary_tmp));
			if((strval($ary_tmp[$max_group]['result']) == '0')) {
				$max_round_log++;
			}
		}

		if ($a_group == 0) {
			$group = $a_group;
		}

		$ary_data = array(
			'func_type' => $func_type,
			'a_result'	=> $a_result,
			'func_id' 	=> $func_id,
			'a_group'	=> $group,
			'a_user_id'	=> $this->session->userdata('user_id'),
			'a_date'	=> date("Y-m-d H:i:s"),
			'a_descr'	=> $this->input->post('descr'),
			'a_round'	=> ($max_round_log == 0 ? 1 : $max_round_log)
		);

		$this->db->set($ary_data);
		$this->db->insert('audit_log');
	}
}