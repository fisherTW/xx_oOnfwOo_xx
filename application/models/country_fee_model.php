<?php
/*
* File:			country_fee_model.php
* Version:		-
* Last changed:	2016/05/06
* Purpose:		-
* Payor:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Country_fee_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getCountry_fee() {
		$ary_ret = array();

		$this->db->select('f.*, c.tw as country_id, a.tw as currency_id, b.tw as site_receive, d.tw as fee_id, client.name_tw as c_name_tw');
		$this->db->join('conf_country c','c.id=f.country_id','left');
		$this->db->join('conf_currency a','a.id=f.currency_id','left');
		$this->db->join('conf_country b','b.id=f.country_id_receive','left');
		$this->db->join('conf_fee d','d.id=f.fee_id','left');
		$this->db->join('client','client.id=f.client_id','left');
		$this->db->order_by("ver", "asc");
		$this->db->order_by("date_create", "desc");		
		$query = $this->db->get('conf_country_fee f');

		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getCountry_feeById($id) {
		$this->db->select('f.*, client.name_tw as c_name_tw');
		$this->db->where('f.id', $id);
		$this->db->join('client','client.id=f.client_id','left');
		$query = $this->db->get('conf_country_fee f');
		
		return $query->row_array();		
	}

	public function getCountry_feeVer() {
		$ary_ret = array();

		$this->db->distinct();
		$this->db->select('ver');
		$this->db->order_by("ver", "asc");
		$query = $this->db->get('conf_country_fee');

		$ary_cou = $query->result_array();
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['ver']] = $val['ver'];
			}
		}

		return $ary_ret;
	}

	public function getCountry_feeByVer() {
		$ary_ret = array();
		$ary_map1 = json_decode(JSON_MAN_RECEIVE, true);
		$ary_map2 = json_decode(JSON_METHOD_RECEIVE, true);

		$ver = $this->input->post('val');
		$this->db->select('cf.*, c.tw as c_tw, cu.tw as cu_tw, cu.quote_exchange_rate, fe.tw as fe_tw');
		$this->db->join('conf_country c', 'c.id=cf.country_id_receive', 'left');
		$this->db->join('conf_currency cu', 'cu.id=cf.currency_id', 'left');
		$this->db->join('conf_fee fe', 'fe.id=cf.fee_id', 'left');
		$this->db->where('ver', $ver);
		$query = $this->db->get('conf_country_fee cf');

		$ary_cou = $query->result_array();

		// mapping
		for($i=0; $i < count($ary_cou); $i++) { 
			$ary_cou[$i]['man_receive'] = $ary_map1[$ary_cou[$i]['man_receive']];
			$ary_cou[$i]['method_receive'] = $ary_map2[$ary_cou[$i]['method_receive']];
		}

		return json_encode($ary_cou);
	}

	public function getCountry_feeByHireId() {
		// is_stage = 0
		$ary_map1 = json_decode(JSON_MAN_RECEIVE, true);
		$ary_map2 = json_decode(JSON_METHOD_RECEIVE, true);

		$hire_id = $this->input->post('val');
		$this->db->select('cf.*, c.tw as c_tw, cu.tw as cu_tw, cu.quote_exchange_rate, fe.tw as fe_tw');
		$this->db->join('conf_country c', 'c.id=cf.country_id_receive', 'left');
		$this->db->join('conf_currency cu', 'cu.id=cf.currency_id', 'left');
		$this->db->join('conf_fee fe', 'fe.id=cf.fee_id', 'left');
		//$this->db->join('hire', 'hire.country_id=cf.country_id and hire.worker_type_major=cf.worker_type and hire.worker_kind=cf.worker_kind and hire.client_id=cf.client_id', 'left');
		$this->db->join('hire', 'hire.country_id=cf.country_id and hire.worker_type_major=cf.worker_type and hire.worker_kind=cf.worker_kind', 'left');
		$this->db->where('hire.id', $hire_id);
		$this->db->where('cf.is_stage', 0);
		$query = $this->db->get('conf_country_fee cf');
		$ary_no_stage = $query->result_array();

		// mapping
		for($i=0; $i < count($ary_no_stage); $i++) { 
			$ary_no_stage[$i]['man_receive'] = $ary_map1[$ary_no_stage[$i]['man_receive']];
			$ary_no_stage[$i]['method_receive'] = $ary_map2[$ary_no_stage[$i]['method_receive']];
		}

		/////////////////////////////////////////
		// is_stage = 1
		$ary_map1 = json_decode(JSON_MAN_RECEIVE, true);
		$ary_map2 = json_decode(JSON_METHOD_RECEIVE, true);

		$hire_id = $this->input->post('val');
		$this->db->select('cf.*, c.tw as c_tw, cu.tw as cu_tw, cu.quote_exchange_rate, fe.tw as fe_tw');
		$this->db->join('conf_country c', 'c.id=cf.country_id_receive', 'left');
		$this->db->join('conf_currency cu', 'cu.id=cf.currency_id', 'left');
		$this->db->join('conf_fee fe', 'fe.id=cf.fee_id', 'left');
		//$this->db->join('hire', 'hire.country_id=cf.country_id and hire.worker_type_major=cf.worker_type and hire.worker_kind=cf.worker_kind and hire.client_id=cf.client_id', 'left');
		$this->db->join('hire', 'hire.country_id=cf.country_id and hire.worker_type_major=cf.worker_type and hire.worker_kind=cf.worker_kind', 'left');
		$this->db->where('hire.id', $hire_id);
		$this->db->where('cf.is_stage', 1);
		$query = $this->db->get('conf_country_fee cf');
		$ary_is_stage = $query->result_array();

		// mapping
		for($i=0; $i < count($ary_is_stage); $i++) { 
			$ary_is_stage[$i]['man_receive'] = $ary_map1[$ary_is_stage[$i]['man_receive']];
			$ary_is_stage[$i]['method_receive'] = $ary_map2[$ary_is_stage[$i]['method_receive']];
		}

		return json_encode(array($ary_is_stage, $ary_no_stage));
	}
	

	public function country_fee_doEdit() {
		$ary_data = array(
			'country_id'			=> $this->input->post('sel_country_id'),
			'worker_type'			=> $this->input->post('sel_worker_type'),
			'worker_kind'			=> $this->input->post('sel_worker_kind'),
			'client_id'				=> $this->input->post('sel_client_id'),
			'ver'					=> $this->input->post('txt_ver'),
			'fee_id'				=> $this->input->post('sel_fee_id'),
			'currency_id'			=> $this->input->post('sel_currency_id'),
			'money'					=> $this->input->post('txt_money'),
			'country_id_receive'	=> $this->input->post('sel_country_id_receive'),
			'man_receive'			=> $this->input->post('sel_man_receive'),		
			'method_receive'		=> $this->input->post('rdo_method_receive'),			
			'is_stage'				=> $this->input->post('rdo_is_stage'),			
			'stage_no_start'		=> $this->input->post('txt_stage_no_start'),
			'stage_no_end'			=> $this->input->post('txt_stage_no_end'),
			'user_create'			=> $this->session->userdata('user_id'),
			'date_create'			=> date("Y-m-d")		
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_country_fee');
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_country_fee');			
		}
		
		return 1;
	}

	public function country_fee_doDel($id) {
		$this->db->where('id', $id);

		$this->db->delete('conf_country_fee');
		
		return 1;
	}
}