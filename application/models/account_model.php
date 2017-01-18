<?php
/*
* File:			account_model.php
* Version:		-
* Last changed:	2016/02/25
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Account_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getAccount() {

		$this->db->select('a.id, a.tw, number, bank_tw, bank_add, bank_phone, country_id, c.tw as tw_c, c.name_init');
		$this->db->join('conf_country c','c.id=a.country_id','left');
		$query = $this->db->get('conf_account a');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				//$ary_ret[$val['id']] = $val[$site_lang];
			}
		}

		return json_encode($ary_cou);
	}

	public function getAccountById($id) {
		$this->db->select('id, tw, number, bank_tw, bank_add, bank_phone, country_id');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_account');
		
		return $query->row_array();		
	}

	public function account_doEdit() {
		$ary_data = array(
			'bank_add'		=> $this->input->post('txt_bank_add'), 
			'bank_phone'	=> $this->input->post('txt_bank_phone'),
			'bank_tw'		=> $this->input->post('txt_bank_tw'),
			'number'		=> $this->input->post('txt_number'),
			'tw'			=> $this->input->post('txt_tw'),
			'country_id'	=> $this->input->post('sel_country')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_account');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_account');
		}
		
		return 1;
	}

	public function account_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_account');
		
		return 1;
	}
}