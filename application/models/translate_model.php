<?php
/*
* File:			translate_model.php
* Version:		-
* Last changed:	2016/06/01
* Purpose:		-
* Payor:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Translate_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getTranslate() {
		$this->load->model('audit_model');
		$ary_cou = array();

		$this->db->select('t.id, t.date, t.client_id, t.employer_id, t.country_id, t.emp_id, t.emp_id2, t.trans_id, t.descr2, c.name_tw as c_name_tw, e.name_tw as e_name_tw, ct.tw as trans_tw, ce.name_tw as emp_name_tw, ce2.name_tw as emp2_name_tw, cc.tw as country_tw');
		$this->db->join('client c','c.id=t.client_id','left');
		$this->db->join('employer e','e.id=t.employer_id','left');
		$this->db->join('conf_country cc','cc.id=t.country_id','left');
		$this->db->join('conf_emp ce','ce.id=t.emp_id','left');
		$this->db->join('conf_emp ce2','ce2.id=t.emp_id2','left');			
		$this->db->join('conf_trans ct','ct.id=t.trans_id','left');		
		$query = $this->db->get('translate t');

		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_tmp = $this->audit_model->getAuditInfo('332',$ary_cou[$key]['id']);
				$ary_cou[$key]['a_result'] = $ary_tmp['log']['result'];
				$ary_cou[$key]['a_status'] = $ary_tmp['log']['status'];
				$ary_cou[$key]['a_descr'] = $ary_tmp['log']['descr'];
				$ary_cou[$key]['max_group_log'] = $ary_tmp['log']['max_group_log'];
				$ary_tmp = end($ary_tmp['log']['ary_lastRound']);
				$ary_cou[$key]['a_user'] = $ary_tmp['tw'];
				$ary_cou[$key]['a_date'] = $ary_tmp['date'];
			}
		}

		return json_encode($ary_cou);
	}

	public function getTranslateById($id) {
		$this->db->select('t.*, c.name_tw as c_name_tw, e.name_tw as e_name_tw, u.account as user_create_name');
		$this->db->join('client c','c.id=t.client_id','left');
		$this->db->join('employer e','e.id=t.employer_id','left');
		$this->db->join('user u','u.id=t.user_create','left');
		$this->db->where('t.id', $id);
		$query = $this->db->get('translate t');
		
		return $query->row_array();		
	}

	public function translate_doEdit() {
		$this->load->model('audit_model');
		$ary_chk_day = $this->input->post('chk_day');
		$ary_chk_day_sum =0;
		for($i=0; $i < count($this->input->post('chk_day')); $i++) {
			$ary_chk_day_sum = $ary_chk_day_sum + $ary_chk_day[$i];
		}

		$ary_data = array(
			'user_create'		=> $this->session->userdata('user_id'),
			'date_create'		=> date("Y-m-d"),
			'user_modify'		=> $this->session->userdata('user_id'),
			'date_modify'		=> date("Y-m-d"),
			'date'				=> $this->input->post('txt_date'),
			'emp_id'			=> $this->input->post('sel_emp_id'),
			'country_id'		=> $this->input->post('sel_country_id'),
			'emp_id2'			=> $this->input->post('sel_emp_id2'),
			'client_id'			=> $this->input->post('sel_client_id'),
			'employer_id'		=> $this->input->post('sel_employer_id'),
			'man_together'		=> $this->input->post('txt_man_together'),
			'tel'				=> $this->input->post('txt_tel'),
			'time_dep'			=> $this->input->post('txt_time_dep'),
			'dep'				=> $this->input->post('txt_dep'),
			'trans_id'			=> $this->input->post('sel_trans_id'),
			'descr'				=> $this->input->post('txt_descr'),
			'day'				=> $ary_chk_day_sum,
			'make_money'		=> $this->input->post('txt_make_money'),
			'make_money_method'	=> $this->input->post('rdo_make_money_method'),

			'date_service'		=> $this->input->post('txt_date_service'),
			'time_start'		=> $this->input->post('txt_time_start'),
			'time_end'			=> $this->input->post('txt_time_end'),
			'fare_bus'			=> $this->input->post('txt_fare_bus'),
			'fare_train'		=> $this->input->post('txt_fare_train'),
			'fare_taxi'			=> $this->input->post('txt_fare_taxi'),
			'fare_stay'			=> $this->input->post('txt_fare_stay'),
			'fare_comm'			=> $this->input->post('txt_fare_comm'),
			'fare_other'		=> $this->input->post('txt_fare_other'),
			'fare_descr'		=> $this->input->post('txt_fare_descr'),
			'file_path'			=> $this->input->post('hid_filepath1'),						
			'descr2'			=> $this->input->post('txt_descr2'),
			'descr3'			=> $this->input->post('txt_descr3')						
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('translate');
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('translate');
		}
	
		$this->audit_model->audit_doInsert('332',1,$this->input->post('hid_id'),0);

		return 1;
	}

}