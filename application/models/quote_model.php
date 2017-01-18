<?php
/*
* File:			quote_model.php
* Version:		-
* Last changed:	2016/05/12
* Purpose:		-
* Author:		Irene
* Copyright:	(C) 2016
* Product:		NFW
*/

class Quote_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getQuote($output=0) {
		$ary_ret = array();

		$this->db->select('q.*,c.name_tw as c_name_tw, e.name_tw as e_name_tw, h.worker_type_major as h_worker_type_major, h.worker_kind as h_worker_kind, h.worker_type_minor_id as h_worker_type_minor_id, h.qty_immigrate as h_qty_immigrate ,h.gender as h_gender');
		$this->db->join('hire h','q.hire_id=h.id','left');
		$this->db->join('client c','h.client_id=c.id','left');
		$this->db->join('employer e','h.employer_id=e.id','left');
		$query = $this->db->get('quote q');
		$ary_cou = $query->result_array();

		if($output == 1) {
			if(count($ary_cou) > 0) {
				foreach ($ary_cou as $key => $val) {
					$ary_ret[$val['id']] = $val['id'];
				}
			}

			return $ary_ret;
		}

		return json_encode($ary_cou);
	}

	public function quote_doEdit() {
		$ary_data = array(
			'hire_id' 			=> $this->input->post('sel_hire_id'), 
			'is_check'			=> $this->input->post('chk_is_check'),
			'descr'				=> $this->input->post('txt_descr'),
			'descr2'			=> $this->input->post('txt_descr2'),
			'user_create'		=> $this->session->userdata('user_id'),
			'date_create'		=> date("Y-m-d"),
			'user_modify'		=> $this->session->userdata('user_id'),
			'date_modify'		=> date("Y-m-d")
		);
		if (((strval($this->input->post('date_order')) == '')||(strval($this->input->post('date_order')) == '0000-00-00')) && (strval($this->input->post('chk_is_check')) == '1')){
			$ary_data['date_order'] = date("Y-m-d");
		}else{
			$ary_data['date_order'] ='';
		}
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('quote');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('quote');
			$id = $this->input->post('hid_id');
		}

		//info
		$this->quoteFeeInbound_doEdit($id);
		$this->quoteFeeOutbound_doEdit($id);
		// fisher 下面不想寫
		// 不分期(總收費用)
		//$this->quoteFee_doEdit($id);
		// 分期費用
		//$this->quoteFeeStage_doEdit($id);

		return 1;
	}

	public function quote_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('quote');
		//info
		$this->quoteFeeInbound_doDel($id);
		$this->quoteFeeOutbound_doDel($id);
		$this->quoteFee_doDel($id);
		$this->quoteFeeStage_doDel($id);

		return 1;
	}

	public function quoteFeeInbound_doEdit($quote_id) {
		$ary_data = array();
		$this->db->delete('mapping_quote_fee_inbound', array('quote_id' => $quote_id)); 

		$ary_row_quoteFeeInbound	= $this->input->post('row_quoteFeeInbound');
		$ary_fee_id					= $this->input->post('fee_id');
		$ary_currency_id			= $this->input->post('currency_id');
		$ary_quote_exchange_rate	= $this->input->post('quote_exchange_rate');
		$ary_finance_exchange_rate	= $this->input->post('finance_exchange_rate');
		$ary_money					= $this->input->post('money');
		$ary_money_tw				= $this->input->post('money_tw');

		for($i=0; $i < count($ary_row_quoteFeeInbound); $i++) {
			$ary_data[$i]['row']					= $ary_row_quoteFeeInbound[$i];
			$ary_data[$i]['quote_id']				= $quote_id;
			$ary_data[$i]['fee_id']					= $ary_fee_id[$i];
			$ary_data[$i]['currency_id']			= $ary_currency_id[$i];
			$ary_data[$i]['quote_exchange_rate']	= $ary_quote_exchange_rate[$i];
			$ary_data[$i]['finance_exchange_rate']	= $ary_finance_exchange_rate[$i];
			$ary_data[$i]['money']					= $ary_money[$i];
			$ary_data[$i]['money_tw']				= round($ary_quote_exchange_rate[$i] * $ary_money[$i],0);
		}

		$this->db->insert_batch('mapping_quote_fee_inbound',$ary_data);

		return 1;
	}

	public function quoteFeeInbound_doDel($id) {
		$this->db->where('quote_id', $id);
		$this->db->delete('mapping_quote_fee_inbound');

		return 1;
	}

	public function quoteFeeOutbound_doEdit($quote_id) {
		$ary_data = array();
		$this->db->delete('mapping_quote_fee_outbound', array('quote_id' => $quote_id)); 

		$ary_row_quoteFeeOutbound	= $this->input->post('row_quoteFeeOutbound');
		$ary_fee_id					= $this->input->post('fee_id_outbound');
		$ary_currency_id			= $this->input->post('currency_id_outbound');
		$ary_quote_exchange_rate	= $this->input->post('quote_exchange_rate_outbound');
		$ary_finance_exchange_rate	= $this->input->post('finance_exchange_rate_outbound');
		$ary_money					= $this->input->post('money_outbound');
		$ary_money_tw				= $this->input->post('money_tw_outbound');
		$ary_man_receive			= $this->input->post('man_receive_outbound');

		for($i=0; $i < count($ary_row_quoteFeeOutbound); $i++) {
			$ary_data[$i]['row']					= $ary_row_quoteFeeOutbound[$i];
			$ary_data[$i]['quote_id']				= $quote_id;
			$ary_data[$i]['fee_id']					= $ary_fee_id[$i];
			$ary_data[$i]['currency_id']			= $ary_currency_id[$i];
			$ary_data[$i]['quote_exchange_rate']	= $ary_quote_exchange_rate[$i];
			$ary_data[$i]['finance_exchange_rate']	= $ary_finance_exchange_rate[$i];
			$ary_data[$i]['money']					= $ary_money[$i];
			$ary_data[$i]['money_tw']				= round($ary_quote_exchange_rate[$i] * $ary_money[$i],0);
			$ary_data[$i]['man_receive']			= $ary_man_receive[$i];
		}

		$this->db->insert_batch('mapping_quote_fee_outbound',$ary_data);

		return 1;
	}

	public function quoteFeeOutbound_doDel($id) {
		$this->db->where('quote_id', $id);
		$this->db->delete('mapping_quote_fee_outbound');

		return 1;
	}

	public function quoteFee_doEdit($quote_id) {
		$ary_data = array();
		$this->db->delete('mapping_quote_fee', array('quote_id' => $quote_id)); 

		$ary_row_quoteFee			= $this->input->post('row_quoteFee');
		$ary_fee_id					= $this->input->post('fee_id_quoteFee');
		$ary_currency_id			= $this->input->post('currency_id_quoteFee');
		$ary_quote_exchange_rate	= $this->input->post('quote_exchange_rate_quoteFee');
		$ary_country_id				= $this->input->post('country_id_quoteFee');
		$ary_money					= $this->input->post('money_quoteFee');
		$ary_money_tw				= $this->input->post('money_tw_quoteFee');
		$ary_man_receive			= $this->input->post('man_receive_quoteFee');
		$ary_method_receive			= $this->input->post('method_receive_quoteFee');

		for($i=0; $i < count($ary_row_quoteFee); $i++) {
			$ary_data[$i]['row']					= $ary_row_quoteFee[$i];
			$ary_data[$i]['quote_id']				= $quote_id;
			$ary_data[$i]['fee_id']					= $ary_fee_id[$i];
			$ary_data[$i]['currency_id']			= $ary_currency_id[$i];
			$ary_data[$i]['quote_exchange_rate']	= $ary_quote_exchange_rate[$i];
			$ary_data[$i]['country_id']				= $ary_country_id[$i];
			$ary_data[$i]['money']					= $ary_money[$i];
			$ary_data[$i]['money_tw']				= round($ary_quote_exchange_rate[$i] * $ary_money[$i],0);
			$ary_data[$i]['man_receive']			= $ary_man_receive[$i];
			$ary_data[$i]['method_receive']			= $ary_method_receive[$i];
		}
		$this->db->insert_batch('mapping_quote_fee',$ary_data);

		return 1;
	}

	public function quoteFee_doDel($id) {
		$this->db->where('quote_id', $id);
		$this->db->delete('mapping_quote_fee');

		return 1;
	}

	public function quoteFeeStage_doEdit($quote_id) {
		$ary_data = array();
		$this->db->delete('mapping_quote_fee_stage', array('quote_id' => $quote_id)); 

		$ary_row_quoteFeeStage		= $this->input->post('row_quoteFeeStage');
		$ary_fee_id					= $this->input->post('fee_id_quoteFeeStage');
		$ary_currency_id			= $this->input->post('currency_id_quoteFeeStage');
		$ary_quote_exchange_rate	= $this->input->post('quote_exchange_rate_quoteFeeStage');
		$ary_country_id				= $this->input->post('country_id_quoteFeeStage');
		$ary_money					= $this->input->post('money_quoteFeeStage');
		$ary_money_tw				= $this->input->post('money_tw_quoteFeeStage');
		$ary_stage_no_start			= $this->input->post('stage_no_start_quoteFeeStage');
		$ary_stage_no_end			= $this->input->post('stage_no_end_quoteFeeStage');
		$ary_man_receive			= $this->input->post('man_receive_quoteFeeStage');
		$ary_method_receive			= $this->input->post('method_receive_quoteFeeStage');

		for($i=0; $i < count($ary_row_quoteFeeStage); $i++) {
			$ary_data[$i]['row']					= $ary_row_quoteFeeStage[$i];
			$ary_data[$i]['quote_id']				= $quote_id;
			$ary_data[$i]['fee_id']					= $ary_fee_id[$i];
			$ary_data[$i]['currency_id']			= $ary_currency_id[$i];
			$ary_data[$i]['quote_exchange_rate']	= $ary_quote_exchange_rate[$i];
			$ary_data[$i]['country_id']				= $ary_country_id[$i];
			$ary_data[$i]['money']					= $ary_money[$i];
			$ary_data[$i]['money_tw']				= round($ary_quote_exchange_rate[$i] * $ary_money[$i],0);
			$ary_data[$i]['stage_no_start']			= $ary_stage_no_start[$i];
			$ary_data[$i]['stage_no_end']			= $ary_stage_no_end[$i];
			$ary_data[$i]['man_receive']			= $ary_man_receive[$i];
			$ary_data[$i]['method_receive']			= $ary_method_receive[$i];
		}

		$this->db->insert_batch('mapping_quote_fee_stage',$ary_data);

		return 1;
	}

	public function quoteFeeStage_doDel($id) {
		$this->db->where('quote_id', $id);
		$this->db->delete('mapping_quote_fee_stage');

		return 1;
	}
	
	public function getQuoteById($id) {

		$this->db->select('q.*,c.name_tw as c_name_tw, e.name_tw as e_name_tw,u.account as user_create_name ,u2.account as user_modify_name, h.country_id as h_country_id, h.client_id as h_client_id, h.employer_id as h_employer_id, h.worker_type_major as h_worker_type_major, h.worker_kind as h_worker_kind, h.worker_type_minor_id as h_worker_type_minor_id, h.qty_immigrate as h_qty_immigrate ,h.gender as h_gender ,h.qty_require,h.work_limit, h.food_type,h.insur_labor,h.save,h.save2,h.insur_health');
		$this->db->join('hire h','q.hire_id=h.id','left');
		$this->db->join('client c','h.client_id=c.id','left');
		$this->db->join('employer e','h.employer_id=e.id','left');
		$this->db->join('user u','u.id=q.user_create','left');
		$this->db->join('user u2','u.id=q.user_modify','left');
		$this->db->where('q.id', $id);
		$query = $this->db->get('quote q');

		return $query->row_array();


	}

	public function getMappingQuoteFeeInboundByQuoteId($quote_id) {
		$this->db->select('*');
		$this->db->where('quote_id', $quote_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_quote_fee_inbound');
		
		return $query->result_array();
	}
	
	public function getMappingQuoteFeeOutboundByQuoteId($quote_id) {
		$this->db->select('*');
		$this->db->where('quote_id', $quote_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_quote_fee_outbound');
		
		return $query->result_array();
	}

	public function getMappingQuoteFeeByQuoteId($quote_id) {
		$this->db->select('*');
		$this->db->where('quote_id', $quote_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_quote_fee');
		
		return $query->result_array();
	}

	public function getMappingQuoteFeeStageByQuoteId($quote_id) {
		$this->db->select('*');
		$this->db->where('quote_id', $quote_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_quote_fee_stage');
		
		return $query->result_array();
	}

	public function getQuoteId($hire_id) {
		$ary_ret = array();

		$this->db->select('q.*'); 
		$this->db->where('q.hire_id',$hire_id);
		$query = $this->db->get('quote q');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[0] = $val['id'];
				$ary_ret[1] = $val['descr'];
			}
		}
		return $ary_ret;

	}

	public function getQuoteFeeOutboundId($quote_id,$fee_id) {
		$ary_ret = array();

		$this->db->select('*'); 
		$this->db->where('quote_id',$quote_id);
		$this->db->where('fee_id',$fee_id);
		$query = $this->db->get('mapping_quote_fee_outbound');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[0] = $val['id'];
				$ary_ret[1] = $val['fee_id'];
				$ary_ret[2] = $val['currency_id'];
				$ary_ret[3] = $val['quote_exchange_rate'];
				$ary_ret[4] = $val['money'];
				$ary_ret[5] = $val['money_tw'];
				$ary_ret[6] = $val['man_receive'];
			}
		}
		return $ary_ret;

	}
	


}