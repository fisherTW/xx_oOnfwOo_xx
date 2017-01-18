<?php
/*
* File:			report_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Report_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getReport($output=0) {
		$ary_ret = array();

		$this->db->select('id, name_init, tw, descr');
		$query = $this->db->get('conf_report');

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

	public function getReportById($id) {
		$this->db->select('id, name_init, tw, descr');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_report');
		
		return $query->row_array();		
	}

	public function report_doEdit() {
		$ary_data = array(
			'name_init'	=> $this->input->post('txt_name_init'), 
			'tw'		=> $this->input->post('txt_tw'),
			'descr'		=> $this->input->post('txt_descr'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_report');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_report');
		}
		
		return 1;
	}

	public function report_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_report');
		
		return 1;
	}

	public function getDoc1() {
		$ary_where = array();
		$ary_worker_type = json_decode(JSON_WORKER_TYPE,true);
		$ary_worker_kind = json_decode(JSON_WORKER_KIND, true);

		//sel_auth_id 0
		$this->db->select('le.client_id,le.employer_id, le.no, le.date_send, 0, duration,mli.inbound_no, mli.inbound_date_send, mli.inbound_date_receive, 5566,l.a_worker_kind, l.a_worker_type_major, l.id as labor_id, l.a_name_tw, l.a_name_en, l.c_date', false);
		$this->db->join('mapping_letter_inbound mli','mli.inbound_no=l.b_letter_inbound_id','left');
		$this->db->join('letter le','mli.letter_id=le.id','left');

		//	招募許可函函號 
		if($this->input->post('txt_recruit_visa') != '') {
			$ary_where['le.no'] = $this->input->post('txt_recruit_visa');
		}
		//	入國引進許可函函號 
		if($this->input->post('txt_inbound_no') != '') {
			$ary_where['mli.inbound_no'] = $this->input->post('txt_inbound_no');
		}
		if($this->input->post('sel_client_id')) {
			$ary_where['le.client_id'] = $this->input->post('sel_client_id');
		}
		if($this->input->post('sel_employer')) {
			$ary_where['le.employer_id'] = $this->input->post('sel_employer');
		}

		$this->db->where($ary_where);
		$query = $this->db->get('labor l');
		$ary_cou = $query->result_array();

		for ($i=0; $i < count($ary_cou) ; $i++) { 
			array_unshift($ary_cou[$i], ($i + 1));
			$ary_cou[$i]['a_worker_kind'] = $ary_worker_kind[$ary_cou[$i]['a_worker_kind']];
			$ary_cou[$i]['a_worker_type_major'] = $ary_worker_type[$ary_cou[$i]['a_worker_type_major']];
		}

		return $ary_cou;
	}

	public function getDoc2() {
		$ary_where = array();
		$ary_status_case = json_decode(JSON_STATUS_CASE, true);

		$this->db->select('conf_country.tw,client.alias as cli_a,employer.alias, le.no, le.quota,0,le.is_enable, mli.inbound_no, mli.inbound_quota,99,mli.inbound_is_enable,ce1.name_tw,ce2.name_tw as ce2', false);
		$this->db->join('letter le','mli.letter_id=le.id','left');
		$this->db->join('conf_country','mli.inbound_country_id=conf_country.id','left');
		$this->db->join('client','mli.client_id=client.id','left');
		$this->db->join('employer','mli.employer_id=employer.id','left');
		$this->db->join('conf_emp ce1','le.service_id=ce1.id','left');
		$this->db->join('conf_emp ce2','le.sales_id=ce2.id','left');

		//	招募許可函函號 
		if($this->input->post('txt_recruit_visa2') != '') {
			$ary_where['le.no'] = $this->input->post('txt_recruit_visa2');
		}

		$this->db->where($ary_where);
		$query = $this->db->get('mapping_letter_inbound mli');
		$ary_cou = $query->result_array();

		for ($i=0; $i < count($ary_cou) ; $i++) {
			if(!is_null($ary_cou[$i]['is_enable'])) {
				$ary_cou[$i]['is_enable'] = $ary_status_case[$ary_cou[$i]['is_enable']];
			}
			if(!is_null($ary_cou[$i]['inbound_is_enable'])) {
				$ary_cou[$i]['inbound_is_enable'] = $ary_status_case[$ary_cou[$i]['inbound_is_enable']];
			}
			array_unshift($ary_cou[$i], ($i + 1));
		}


		return $ary_cou;
	}

	public function getDoc3() {
		$ary_where = array();
		$ary_worker_type = json_decode(JSON_WORKER_TYPE,true);
		$ary_worker_kind = json_decode(JSON_WORKER_KIND, true);

		$this->db->select('conf_country.tw,client.alias as cli_a,employer.alias, hire.date_order, hire.id, hire.gender,hire.worker_kind,hire.worker_type_major,hire.qty_require,hire.work_limit,ce1.name_tw,ce2.name_tw as ce2', false);
		$this->db->join('conf_country','hire.country_id=conf_country.id','left');
		$this->db->join('client','hire.client_id=client.id','left');
		$this->db->join('employer','hire.employer_id=employer.id','left');
		$this->db->join('conf_emp ce1','hire.service_id=ce1.id','left');
		$this->db->join('conf_emp ce2','hire.sales_id=ce2.id','left');

		if(strval($this->input->post('sel_country')) != '0') {
			$ary_where['hire.country_id'] = $this->input->post('sel_country');
		}
		if(strval($this->input->post('sel_worker_kind')) != '0') {
			$ary_where['hire.worker_kind'] = $this->input->post('sel_worker_kind');
		}
		if(strval($this->input->post('sel_worker_type_major')) != '0') {
			$ary_where['hire.worker_type_major'] = $this->input->post('sel_worker_type_major');
		}
		if(strval($this->input->post('sel_sales_id')) != '0') {
			$ary_where['hire.sales_id'] = $this->input->post('sel_sales_id');
		}
		if(strval($this->input->post('sel_service_id')) != '0') {
			$ary_where['hire.service_id'] = $this->input->post('sel_service_id');
		}
		if(strval($this->input->post('sel_client_id')) != '-1') {
			$ary_where['hire.client_id'] = $this->input->post('sel_client_id');
		}
		if(strval($this->input->post('sel_employer')) != '-1') {
			$ary_where['hire.employer_id'] = $this->input->post('sel_employer');
		}
		if(strval($this->input->post('sel_status')) != '0') {
			$ary_where['hire.status'] = $this->input->post('sel_status');
		}

		$this->db->where($ary_where);
		$query = $this->db->get('hire');
		$ary_cou = $query->result_array();

		for ($i=0; $i < count($ary_cou) ; $i++) {
			array_unshift($ary_cou[$i], ($i + 1));
			$ary_cou[$i]['worker_kind'] = $ary_worker_kind[$ary_cou[$i]['worker_kind']];
			$ary_cou[$i]['worker_type_major'] = $ary_worker_type[$ary_cou[$i]['worker_type_major']];
			$ary_cou[$i]['gender'] = (strval($ary_cou[$i]['gender']) == '0' ? '女' : '男');
		}
/*
sel_status	
*/

		return $ary_cou;
	}
}