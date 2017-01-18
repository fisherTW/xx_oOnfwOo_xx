<?php
/*
* File:			currency_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Shirley
* Copyright:	(C) 2016
* Product:		NFW
*/

class Currency_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getCurrency($output=0) {
		$ary_ret = array();

		$this->db->select('id, name_init, tw, finance_exchange_rate, quote_exchange_rate');
		$query = $this->db->get('conf_currency');

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

	public function getCurrencyById($id) {
		$this->db->select('id, name_init, tw, finance_exchange_rate, quote_exchange_rate');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_currency');
		
		return $query->row_array();		
	}

	public function currency_doEdit() {
		$ary_data = array(
			'name_init'				   => $this->input->post('txt_name_init'), 
			'tw'					   => $this->input->post('txt_tw'),
			'finance_exchange_rate'	   => $this->input->post('txt_finance_exchange_rate'),
			'quote_exchange_rate'	   => $this->input->post('txt_quote_exchange_rate'),
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_currency');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_currency');
		}
		
		return 1;
	}

	public function currency_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_currency');
		
		return 1;
	}

	// $currency_id:
	//		-1: all currency_id (default)
	public function getCurrencyByType($currency_id=-1) {
		$ary_ret = array();
		$ary_ret2 = array();
		$ary_ret3 = array();

		$this->db->select('cy.*');
		if($currency_id != -1) {
			$this->db->where('cy.id', $currency_id);
			$this->db->order_by("cy.id","asc");
		}
		$query = $this->db->get('conf_currency cy');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['tw'];
				$ary_ret2[$val['id']] = $val['finance_exchange_rate'];
				$ary_ret3[$val['id']] = $val['quote_exchange_rate'];
			}
		}

		return array($ary_ret,$ary_ret2,$ary_ret3);
	}
}