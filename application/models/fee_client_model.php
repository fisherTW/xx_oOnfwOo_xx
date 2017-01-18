<?php
/*
* File:			fee_client_model.php
* Version:		-
* Last changed:	2016/06/13
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Fee_client_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getFeeClient() {		
		$ary_cou = array();

		$this->db->select('fc.id ,c.alias as client_alias ,e.alias as employer_alias ,cf.tw as fee_name');
		$this->db->join('client c','c.id=fc.client_id','left');
		$this->db->join('employer e','e.id=fc.employer_id','left');
		$this->db->join('conf_fee cf','cf.id=fc.fee_id','left');		
		$query = $this->db->get('fee_client fc');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getFeeClientById($id) {
		$this->db->select('fc.* ,c.alias as c_name_tw ,e.alias as e_name_tw ,u.account as user_create_name');
		$this->db->join('client c','c.id=fc.client_id','left');
		$this->db->join('employer e','e.id=fc.employer_id','left');
		$this->db->join('user u','u.id=c.user_create','left');		
		$this->db->where('fc.id', $id);
		$query = $this->db->get('fee_client fc');
		
		return $query->row_array();
	}

	public function getFeeclientfeeByFeeClientId($fee_client_id) {
		$this->db->select('mf.* ,l.a_name_en as name_en');
		$this->db->join('labor l','l.id=mf.labor_id','left');
		$this->db->where('mf.fee_client_id', $fee_client_id);
		$this->db->order_by('mf.row','asc');

		$query = $this->db->get('mapping_fee_client_fee mf');		

		return $query->result_array();
	}

	public function fee_client_doEdit() {
		$this->load->model('audit_model');

		$ary_data = array(
			'client_id' 	=> $this->input->post('sel_client_id'),
			'employer_id' 	=> $this->input->post('sel_employer_id'),
			'fee_id'		=> $this->input->post('sel_fee_id'),
			'file_path'		=> $this->input->post('hid_filepath1'),
			'sales_id'		=> $this->input->post('sel_sales_id'),
			'service_id'	=> $this->input->post('sel_service_id'),
			'descr'			=> $this->input->post('txt_descr'),
			'user_create'	=> $this->session->userdata('user_id'),
			'date_create'	=> date("Y-m-d"),
			'user_modify'	=> $this->session->userdata('user_id'),
			'date_modify'	=> date("Y-m-d")
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('fee_client');
			$id = $this->db->insert_id();
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('fee_client');
			$id = $this->input->post('hid_id');			
		}

		//info
		$this->feeClientFee_doEdit($id);
		$this->audit_model->audit_doInsert('313',1,$id,0);

		return 1;
	}

	public function feeClientFee_doEdit($fee_client_id) {
		$ary_data = array();
		$this->db->delete('mapping_fee_client_fee', array('fee_client_id' => $fee_client_id)); 

		$row_feeClientFee		= $this->input->post('row_feeClientFee');
		$ary_currency_id		= $this->input->post('currency_id');
		$ary_money_feeClientFee	= $this->input->post('money_feeClientFee');
		$ary_man_receive		= $this->input->post('man_receive');
		$ary_sel_labor_id		= $this->input->post('sel_labor_id');
		$ary_unit_feeClientFee	= $this->input->post('unit_feeClientFee');
		$ary_unit2_feeClientFee	= $this->input->post('unit2_feeClientFee');
		$ary_unit3_feeClientFee	= $this->input->post('unit3_feeClientFee');
		$ary_unit4_feeClientFee	= $this->input->post('unit4_feeClientFee');
		$ary_unit5_feeClientFee = $this->input->post('unit5_feeClientFee');
		$ary_unit6_feeClientFee = $this->input->post('unit6_feeClientFee');
		$ary_unit7_feeClientFee	= $this->input->post('unit7_feeClientFee');

		for($i=0; $i < count($row_feeClientFee); $i++) {
			$ary_data[$i]['row']			= $row_feeClientFee[$i];
			$ary_data[$i]['fee_client_id']	= $fee_client_id;
			$ary_data[$i]['currency_id']	= $ary_currency_id[$i];
			$ary_data[$i]['money']			= $ary_money_feeClientFee[$i];
			$ary_data[$i]['man_receive']	= $ary_man_receive[$i];
			$ary_data[$i]['labor_id']		= $ary_sel_labor_id[$i];
			$ary_data[$i]['unit']			= $ary_unit_feeClientFee[$i];
			$ary_data[$i]['unit2']			= $ary_unit2_feeClientFee[$i];
			$ary_data[$i]['unit3']			= $ary_unit3_feeClientFee[$i];
			$ary_data[$i]['unit4']			= $ary_unit4_feeClientFee[$i];
			$ary_data[$i]['unit5']			= $ary_unit5_feeClientFee[$i];
			$ary_data[$i]['unit6']			= $ary_unit6_feeClientFee[$i];
			$ary_data[$i]['unit7']			= $ary_unit7_feeClientFee[$i];
		}

		$this->db->insert_batch('mapping_fee_client_fee',$ary_data);

		return 1;
	}	

}