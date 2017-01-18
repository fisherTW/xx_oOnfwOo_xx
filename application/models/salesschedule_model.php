<?php
/*
* File:			salesschedule_model.php
* Version:		-
* Last changed:	2016/05/24
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Salesschedule_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getSalesschedule($output=0) {
		$ary_ret = array();

		$this->db->select('s.*, e.name_tw as tw_emp, t.tw as tw_method');
		$this->db->join('conf_emp e','e.id=s.emp_id','left');
		$this->db->join('conf_talkmethod t','t.id=s.method','left');
		$query = $this->db->get('salesschedule s');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function salesschedule_doEdit() {
		$ary_data = array(
			'date' 			=> date("Y-m-d"),
			'user_create'	=> $this->session->userdata('user_id'),
			'date_create'	=> date("Y-m-d"),		
			'user_modify'	=> $this->session->userdata('user_id'),
			'date_modify'	=> date("Y-m-d"),	
			'method'		=> $this->input->post('sel_method'),
			'client_id'		=> $this->input->post('sel_client_id'),
			'employer_id'	=> $this->input->post('sel_employer_id'),
			'sales_id'		=> $this->input->post('sel_sales_id'),			
			'offical'		=> $this->input->post('txt_offical'),
			'contact'		=> $this->input->post('txt_contact'),
			'emp_id'		=> $this->input->post('sel_emp_id'),
			'descr'			=> $this->input->post('txt_descr'),
			'ocar_no'		=> $this->input->post('txt_ocar_no'),
			'pcar_no'		=> $this->input->post('txt_pcar_no'),
			'park_money'	=> $this->input->post('txt_park_money'),
			'ocar_money'	=> $this->input->post('txt_ocar_money'),
			'pcar_kmstart'	=> $this->input->post('txt_pcar_kmstart'),
			'pcar_kmend'	=> $this->input->post('txt_pcar_kmend'),
			'pcar_etc'		=> $this->input->post('txt_pcar_etc'),
			'pcar_money'	=> $this->input->post('txt_pcar_money')
		);
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('salesschedule');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('salesschedule');
			$id = $this->input->post('hid_id');
		}

		//info
		$this->salesscheduleFee_doEdit($id);

		return 1;
	}

	public function salesscheduleFee_doEdit($salesschedule_id) {
		$ary_data = array();
		$this->db->delete('mapping_salesschedule_fee', array('salesschedule_id' => $salesschedule_id)); 

		$ary_row_salesschedule	= $this->input->post('row_salesscheduleFee');
		$ary_item				= $this->input->post('item_salesscheduleFee');
		$ary_money				= $this->input->post('money_salesscheduleFee');
		$ary_descr				= $this->input->post('descr_salesscheduleFee');

		for($i=0; $i < count($ary_row_salesschedule); $i++) {
			$ary_data[$i]['row']				= $ary_row_salesschedule[$i];
			$ary_data[$i]['salesschedule_id']	= $salesschedule_id;
			$ary_data[$i]['item']				= $ary_item[$i];
			$ary_data[$i]['money']				= $ary_money[$i];
			$ary_data[$i]['descr']				= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_salesschedule_fee',$ary_data);

		return 1;
	}

	public function salesschedule_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('salesschedule');
		//info
		$this->salesscheduleFee_doDel($id);

		return 1;
	}

	public function salesscheduleFee_doDel($id) {
		$this->db->where('salesschedule_id', $id);
		$this->db->delete('mapping_salesschedule_fee');

		return 1;
	}

	public function getSalesscheduleById($id) {
		$this->db->select('s.*, c.name_tw as c_name_tw, e.name_tw as e_name_tw, u.account as user_create_name');
		$this->db->join('client c','c.id=s.client_id','left');
		$this->db->join('employer e','e.id=s.employer_id','left');	
		$this->db->join('user u','u.id=s.user_create','left');				
		$this->db->where('s.id', $id);
		$query = $this->db->get('salesschedule s');
		
		return $query->row_array();
	}

	public function getsalesscheduleFeeBysalesscheduleId($salesschedule_id) {
		$this->db->select('*');
		$this->db->where('salesschedule_id', $salesschedule_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_salesschedule_fee');
		
		return $query->result_array();
	}
}