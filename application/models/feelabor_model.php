<?php
/*
* File:			feelabor_model.php
* Version:		-
* Last changed:	2016/05/12
* Purpose:		-
* Author:		Irene
* Copyright:	(C) 2016
* Product:		NFW
*/

class Feelabor_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getFeeLabor($output=0,$status) {
		$ary_ret = array();

		$this->db->select('fl.*,l.id as labor_id,l.a_name_tw as l_a_name_tw,l.a_name_en as l_name_en,l.c_outbound_date as l_c_outbound_date');
		$this->db->join('labor l','fl.labor_id=l.id','left');
		$this->db->where('fl.labor_status',$status);		
		$query = $this->db->get('fee_labor fl');

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

	public function getFeeLaborById($id) {
		$this->db->select('fl.*,u.account as user_create_name ,l.a_school_id as l_a_school_id ,l.a_name_tw as l_a_name_tw,l.a_birthday as l_a_birthday,l.c_outbound_date as l_c_outbound_date,l.c_outbound_date as c_outbound_date,l.c_outbound_descr as c_outbound_descr, max(li.date) as li_date,c.name_tw as c_name_tw, e.name_tw as e_name_tw,q.id as quote_id,q.descr as quote_descr, cs.tw_short as tw_short,l.c_run_sendback as c_run_sendback, l.c_run_date as c_run_date');
		$this->db->join('labor l','fl.labor_id=l.id','left');
		$this->db->join('fee_outbound f','f.labor_id=fl.labor_id','left');
		$this->db->join('hire h','f.hire_id=h.id','left');
		$this->db->join('client c','c.id=h.client_id','left');
		$this->db->join('employer e','e.id=h.employer_id','left');
		$this->db->join('user u','u.id=fl.user_create','left');
		$this->db->join('conf_school cs','cs.id=l.a_school_id','left');
		$this->db->join('quote q','q.hire_id=h.id','left');
		$this->db->join('mapping_labor_inbound li','li.labor_id=l.id','left');
		$this->db->where('fl.id', $id);
		$query = $this->db->get('fee_labor fl');

		return $query->row_array();
	}

	public function feeLabor_doEdit($status) {
		$this->load->model('audit_model');		
		$ary_data = array(
			'labor_id' 			=> $this->input->post('sel_labor_id'), 
			'labor_status'		=> $status,
			'user_create'		=> $this->session->userdata('user_id'),
			'date_create'		=> date("Y-m-d"),
			'user_modify'		=> $this->session->userdata('user_id'),
			'date_modify'		=> date("Y-m-d")
		);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('fee_labor');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('fee_labor');
			$id = $this->input->post('hid_id');
		}

		//info
		if ($status == 'a') {
			$this->feeLaborFee2_doEdit($id);
			$this->audit_model->audit_doInsert('414',1,$id,0);
		} elseif ($status == 'b') {
			$this->feeLaborFee2_doEdit($id);
			$this->audit_model->audit_doInsert('415',1,$id,0);
		} elseif ($status == 'c') {
			$this->feeLaborFee_doEdit($id);
			$this->audit_model->audit_doInsert('244',1,$id,0);
		}

		return 1;
	}

	public function feeLabor_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('fee_labor');
		//info
		$this->feeLaborFee_doDel($id);

		return 1;
	}

	public function getFeeLaborFeeByFeeLaborId($feelabor_id) {
		$this->db->select('*,round(finance_exchange_rate*money) as money_tw');
		$this->db->where('feelabor_id', $feelabor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_fee_labor_fee');

		return $query->result_array();
	}

	public function feeLaborFee_doEdit($feelabor_id) {
		$ary_data = array();
		$this->db->delete('mapping_fee_labor_fee', array('feelabor_id' => $feelabor_id)); 

		$ary_row_feeLabor						= $this->input->post('row_feeLabor');
		$ary_type_feeLabor						= $this->input->post('type_feeLabor');
		$ary_date_feeLabor						= $this->input->post('date_feeLabor');
		$ary_fee_id_feeLabor					= $this->input->post('fee_id_feeLabor');
		$ary_stage_no_feeLabor					= $this->input->post('stage_no_feeLabor');
		$ary_stage_no_start_feeLabor			= $this->input->post('stage_no_start_feeLabor');
		$ary_stage_no_end_feeLabor				= $this->input->post('stage_no_end_feeLabor');
		$ary_currency_id_feeLabor				= $this->input->post('currency_id_feeLabor');
		$ary_finance_exchange_rate_feeLabor		= $this->input->post('finance_exchange_rate_feeLabor');
		$ary_money_feeLabor						= $this->input->post('money_feeLabor');
		$ary_country_id_feeLabor				= $this->input->post('country_id_feeLabor');
		$ary_man_receive_feeLabor				= $this->input->post('man_receive_feeLabor');
		$ary_method_receive_feeLabor			= $this->input->post('method_receive_feeLabor');
		$ary_descr_feeLabor						= $this->input->post('descr_feeLabor');

		for($i=0; $i < count($ary_row_feeLabor); $i++) {
			$ary_data[$i]['row']					= $ary_row_feeLabor[$i];
			$ary_data[$i]['feelabor_id']			= $feelabor_id;
			$ary_data[$i]['type']					= $ary_type_feeLabor[$i];
			$ary_data[$i]['date']					= $ary_date_feeLabor[$i];
			$ary_data[$i]['fee_id']					= $ary_fee_id_feeLabor[$i];
			$ary_data[$i]['stage_no']				= $ary_stage_no_feeLabor[$i];
			$ary_data[$i]['stage_no_start']			= $ary_stage_no_start_feeLabor[$i];
			$ary_data[$i]['stage_no_end']			= $ary_stage_no_end_feeLabor[$i];
			$ary_data[$i]['currency_id']			= $ary_currency_id_feeLabor[$i];
			$ary_data[$i]['finance_exchange_rate']	= $ary_finance_exchange_rate_feeLabor[$i];
			$ary_data[$i]['money']					= $ary_money_feeLabor[$i];
			$ary_data[$i]['country_id']				= $ary_country_id_feeLabor[$i];
			$ary_data[$i]['man_receive']			= $ary_man_receive_feeLabor[$i];
			$ary_data[$i]['method_receive']			= $ary_method_receive_feeLabor[$i];
			$ary_data[$i]['descr']					= $ary_descr_feeLabor[$i];
		}

		$this->db->insert_batch('mapping_fee_labor_fee',$ary_data);

		return 1;
	}

	public function feeLaborFee_doDel($feelabor_id) {
		$this->db->where('feelabor_id', $feelabor_id);
		$this->db->delete('mapping_fee_labor_fee');

		return 1;
	}

	public function feeLaborFee2_doEdit($feelabor_id) {
		$ary_data = array();
		$this->db->delete('mapping_fee_labor_fee', array('feelabor_id' => $feelabor_id)); 

		$ary_row					= $this->input->post('row_feeLaborFee');
		$ary_type					= $this->input->post('type_feeLaborFee');
		$ary_date					= $this->input->post('date_feeLaborFee');
		$ary_fee_id					= $this->input->post('fee_id_feeLaborFee');
		$ary_currency_id			= $this->input->post('currency_id_feeLaborFee');
		$ary_finance_exchange_rate	= $this->input->post('finance_exchange_rate_feeLaborFee');
		$ary_money					= $this->input->post('money_feeLaborFee');
		$ary_country_id				= $this->input->post('country_id_feeLaborFee');
		$ary_descr					= $this->input->post('descr_feeLaborFee');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']					= $ary_row[$i];
			$ary_data[$i]['feelabor_id']			= $feelabor_id;
			$ary_data[$i]['type']					= $ary_type[$i];
			$ary_data[$i]['date']					= $ary_date[$i];
			$ary_data[$i]['fee_id']					= $ary_fee_id[$i];
			$ary_data[$i]['currency_id']			= $ary_currency_id[$i];
			$ary_data[$i]['finance_exchange_rate']	= $ary_finance_exchange_rate[$i];
			$ary_data[$i]['money']					= $ary_money[$i];
			$ary_data[$i]['country_id']				= $ary_country_id[$i];
			$ary_data[$i]['descr']					= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_fee_labor_fee',$ary_data);

		return 1;
	}
}