<?php
/*
* File:			feeoutbound_model.php
* Version:		-
* Last changed:	2016/05/12
* Purpose:		-
* Author:		Irene
* Copyright:	(C) 2016
* Product:		NFW
*/

class Feeoutbound_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getFeeoutbound() {
		$this->load->model('audit_model');
		$ary_ret = array();
		$ary_tmp = array();

		$this->db->select('f.id,l.id as labor_id,l.a_name_tw as l_name_tw,l.a_name_en as l_name_en,l.c_outbound_date as l_c_outbound_date');
		$this->db->join('labor l','f.labor_id=l.id','left');
		$query = $this->db->get('fee_outbound f');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_tmp = $this->audit_model->getAuditInfo('243',$ary_cou[$key]['id']);
				$ary_cou[$key]['a_result'] = $ary_tmp['log']['result'];
				$ary_cou[$key]['a_descr'] = $ary_tmp['log']['descr'];
				$ary_cou[$key]['max_group_log'] = $ary_tmp['log']['max_group_log'];
				$ary_tmp = end($ary_tmp['log']['ary_lastRound']);
				$ary_cou[$key]['a_user'] = $ary_tmp['tw'];
				$ary_cou[$key]['a_date'] = $ary_tmp['date'];
			}
		}

		return json_encode($ary_cou);
	}

	public function getFeeoutboundById($id) {

		$this->db->select('f.*,u.account as user_create_name ,l.id as labor_id,l.a_name_tw as l_name_tw,l.a_name_en as l_name_en,round(f.quote_exchange_rate*f.money) as money_tw,round(f.quote_exchange_rate2*f.money2) as money_tw2,round(f.quote_exchange_rate3*f.money3) as money_tw3, cs.tw_short as tw_short,l.b_license_foreign_tw as b_license_foreign_tw,l.c_outbound_date as c_outbound_date,l.c_outbound_descr as c_outbound_descr, max(li.date) as li_date,c.name_tw as c_name_tw, e.name_tw as e_name_tw,h.work_limit as work_limit,q.id as quote_id,q.descr as quote_descr');
		$this->db->join('hire h','f.hire_id=h.id','left');
		$this->db->join('client c','c.id=h.client_id','left');
		$this->db->join('employer e','e.id=h.employer_id','left');
		$this->db->join('labor l','f.labor_id=l.id','left');
		$this->db->join('user u','u.id=f.user_create','left');
		$this->db->join('conf_school cs','cs.id=l.a_school_id','left');
		$this->db->join('quote q','q.hire_id=h.id','left');
		$this->db->join('mapping_labor_inbound li','li.labor_id=l.id','left');
		$this->db->where('f.id', $id);
		$query = $this->db->get('fee_outbound f');

		return $query->row_array();


	}

	public function feeoutbound_doEdit() {
		$this->load->model('audit_model');		
		$ary_data = array(
			'labor_id' 					=> $this->input->post('sel_labor_id'), 
			'hire_id'					=> $this->input->post('sel_hire_id'),
			'fee'						=> $this->input->post('txt_fee'),
			'fee2'						=> $this->input->post('txt_fee2'),
			'fee3'						=> $this->input->post('txt_fee3'),
			'fee4'						=> $this->input->post('txt_fee4'),
			'fee5'						=> $this->input->post('txt_fee5'),
			'fee7'						=> $this->input->post('txt_fee7'),
			'fee8'						=> $this->input->post('txt_fee8'),
			'fee_id'					=> $this->input->post('sel_fee_id'),
			'fee_id2'					=> $this->input->post('sel_fee_id2'),
			'fee_id3'					=> $this->input->post('sel_fee_id3'),
			'currency_id'				=> $this->input->post('sel_currency_id'),
			'currency_id2'				=> $this->input->post('sel_currency_id2'),
			'currency_id3'				=> $this->input->post('sel_currency_id3'),
			'quote_exchange_rate'		=> $this->input->post('txt_quote_exchange_rate'),
			'quote_exchange_rate2'		=> $this->input->post('txt_quote_exchange_rate2'),
			'quote_exchange_rate3'		=> $this->input->post('txt_quote_exchange_rate3'),
			'money'						=> $this->input->post('txt_money'),
			'money2'					=> $this->input->post('txt_money2'),
			'money3'					=> $this->input->post('txt_money3'),
			'man_receive'				=> $this->input->post('sel_man_receive'),
			'man_receive2'				=> $this->input->post('sel_man_receive2'),
			'man_receive3'				=> $this->input->post('sel_man_receive3'),
			'method_receive'			=> $this->input->post('sel_method_receive'),
			'method_receive2'			=> $this->input->post('sel_method_receive2'),
			'method_receive3'			=> $this->input->post('sel_method_receive3'),
			'user_create'				=> $this->session->userdata('user_id'),
			'date_create'				=> date("Y-m-d"),
			'user_modify'				=> $this->session->userdata('user_id'),
			'date_modify'				=> date("Y-m-d")
		);
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('fee_outbound');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('fee_outbound');
			$id = $this->input->post('hid_id');
		}

		//info
		$this->feeOutboundFee_doEdit($id);
		$this->audit_model->audit_doInsert('243',1,$id,0);

		return 1;
	}

	public function feeoutbound_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('fee_outbound');
		//info
		$this->feeOutboundFee_doDel($id);

		return 1;
	}

	public function getfeeoutboundByFeeoutboundId($fee_outbound_id) {
		$this->db->select('*');
		$this->db->where('fee_outbound_id', $fee_outbound_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_fee_outbound_fee');
		
		return $query->result_array();
	}

	public function feeOutboundFee_doEdit($fee_outbound_id) {
		$ary_data = array();
		$this->db->delete('mapping_fee_outbound_fee', array('fee_outbound_id' => $fee_outbound_id)); 

		$ary_row_feeOutboundFee		= $this->input->post('row_feeOutboundFee');
		$ary_fee_id					= $this->input->post('fee_id');
		$ary_fee6_feeOutboundFee	= $this->input->post('fee6_feeOutboundFee');
		

		for($i=0; $i < count($ary_row_feeOutboundFee); $i++) {
			$ary_data[$i]['row']					= $ary_row_feeOutboundFee[$i];
			$ary_data[$i]['fee_outbound_id']		= $fee_outbound_id;
			$ary_data[$i]['fee6']					= $ary_fee6_feeOutboundFee[$i];
		}

		$this->db->insert_batch('mapping_fee_outbound_fee',$ary_data);

		return 1;
	}

	public function feeOutboundFee_doDel($id) {
		$this->db->where('fee_outbound_id', $id);
		$this->db->delete('mapping_fee_outbound_fee');

		return 1;
	}
}