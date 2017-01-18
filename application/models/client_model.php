<?php
/*
* File:			client_model.php
* Version:		-
* Last changed:	2016/05/12
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Client_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getClient($output=0) {
		$ary_ret = array();

		$this->db->select('c.*, a.tw as tw_area , e.name_tw as tw_sales');
		$this->db->join('conf_area a','a.id=c.area_id','left');
		$this->db->join('conf_emp e','e.id=c.sales_id','left');
		$query = $this->db->get('client c');
		$ary_cou = $query->result_array();

		if($output == 1) {
			if(count($ary_cou) > 0) {
				foreach ($ary_cou as $key => $val) {
					$ary_ret[$val['id']] = $val['alias'];
				}
			}

			return $ary_ret;
		}

		return json_encode($ary_cou);
	}

	public function client_doEdit() {
		$ret = 1;

		if($this->checkClientDupli($this->input->post('txt_license'), $this->input->post('hid_id'))) {
			return 0;
		}

		$ary_data = array(
			'license' 		=> $this->input->post('txt_license'), 
			'name_tw'		=> $this->input->post('txt_name_tw'),
			'name_en'		=> $this->input->post('txt_name_en'),
			'alias'			=> $this->input->post('txt_alias'),
			'web'			=> $this->input->post('txt_web'),
			'owner_tw'		=> $this->input->post('txt_owner_tw'),
			'owner_en'		=> $this->input->post('txt_owner_en'),
			'add_tw'		=> $this->input->post('txt_add_tw'),
			'add_en'		=> $this->input->post('txt_add_en'),
			'email'			=> $this->input->post('txt_email'),
			'user_create'	=> $this->session->userdata('user_id'),
			'date_create'	=> date("Y-m-d"),		
			'user_modify'	=> $this->session->userdata('user_id'),
			'date_modify'	=> date("Y-m-d"),
			'is_client'		=> $this->input->post('is_client'),
			'file_path'		=> $this->input->post('hid_filepath1'),
			'area_id'		=> $this->input->post('sel_area_id'),
			'taxid'			=> $this->input->post('txt_taxid'),
			'tel'			=> $this->input->post('txt_tel'),
			'fax'			=> $this->input->post('txt_fax'),
			'qty_year'		=> $this->input->post('txt_qty_year'),
			'sales_id'		=> $this->input->post('sel_sales_id'),
			'service_id'	=> $this->input->post('sel_service_id'),
			'payment'			=> $this->input->post('sel_payment'),
			'acc_bank_tw'		=> $this->input->post('txt_acc_bank_tw'),
			'acc_name_tw'		=> $this->input->post('txt_acc_name_tw'),
			'acc_no_tw'			=> $this->input->post('txt_acc_no_tw'),
			'acc_fee_tw'		=> $this->input->post('rdo_acc_fee_tw'),
			'acc_file_path_tw'	=> $this->input->post('hid_filepathacctw'),
			'acc_bank_en'		=> $this->input->post('txt_acc_bank_en'),
			'acc_name_en'		=> $this->input->post('txt_acc_name_en'),
			'acc_no_en'			=> $this->input->post('txt_acc_no_en'),
			'acc_swift_en'		=> $this->input->post('txt_acc_swift_en'),
			'acc_fee_en'		=> $this->input->post('rdo_acc_fee_en'),
			'acc_file_path_en'	=> $this->input->post('hid_filepathaccen'),
			'acc_bank_ph'		=> $this->input->post('txt_acc_bank_ph'),
			'acc_name_ph'		=> $this->input->post('txt_acc_name_ph'),
			'acc_no_ph'			=> $this->input->post('txt_acc_no_ph'),
			'acc_swift_ph'		=> $this->input->post('txt_acc_swift_ph'),
			'acc_fee_ph'		=> $this->input->post('rdo_acc_fee_ph'),
			'acc_file_path_ph'	=> $this->input->post('hid_filepathaccph'),
			'acc_bankadd_ph'	=> $this->input->post('txt_acc_bankadd_ph'),
			'acc_add_ph'		=> $this->input->post('txt_acc_add_ph'),
			'acc_descr'			=> $this->input->post('txt_acc_descr')
		);

		if(strval($this->input->post('hid_id')) == '0') {
			if ((strval($this->input->post('date_client')) == '') && (strval($this->input->post('is_client')) == '1')){
				$ary_data['date_client'] = date("Y-m-d");
			}
			$this->db->set($ary_data);
			$this->db->insert('client');
			$id = $this->db->insert_id();
		} else {
			if ((strval($this->input->post('date_client')) == '') && (strval($this->input->post('is_client')) == '1')){
				$ary_data['date_client'] = date("Y-m-d");
			}
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('client');
			$id = $this->input->post('hid_id');
		}

		//info
		$this->clientContact_doEdit($id);
		$this->clientDescr_doEdit($id);
		$this->clientCash_doEdit($id);
		$this->clientLicense_doEdit($id);
		$this->clientRelation_doEdit($id);

		return $ret;
	}

	public function clientContact_doEdit($client_id) {
		$ary_data = array();
		$this->db->delete('mapping_client_contact', array('client_id' => $client_id)); 

		$ary_row_clientContact	= $this->input->post('row_clientContact');
		$ary_name_tw			= $this->input->post('name_tw');
		$ary_name_en			= $this->input->post('name_en');
		$ary_jobtitle			= $this->input->post('jobtitle');
		$ary_alias				= $this->input->post('alias');
		$ary_tel				= $this->input->post('tel');
		$ary_cellphone			= $this->input->post('cellphone');
		$ary_email				= $this->input->post('email');
		$ary_skype				= $this->input->post('skype');
		$ary_birthday 			= $this->input->post('birthday');
		$ary_favor 				= $this->input->post('favor');
		$ary_descr				= $this->input->post('descr');
		$ary_is_account			= $this->input->post('is_account');

		for($i=0; $i < count($ary_row_clientContact); $i++) {
	
			$ary_data[$i]['row']		= $ary_row_clientContact[$i];
			$ary_data[$i]['client_id']	= $client_id;
			$ary_data[$i]['name_tw']	= $ary_name_tw[$i];
			$ary_data[$i]['name_en']	= $ary_name_en[$i];
			$ary_data[$i]['jobtitle']	= $ary_jobtitle[$i];
			$ary_data[$i]['alias']		= $ary_alias[$i];
			$ary_data[$i]['tel']		= $ary_tel[$i];
			$ary_data[$i]['cellphone']	= $ary_cellphone[$i];
			$ary_data[$i]['email']		= $ary_email[$i];
			$ary_data[$i]['skype']		= $ary_skype[$i];
			$ary_data[$i]['birthday']	= $ary_birthday[$i];
			$ary_data[$i]['favor']		= $ary_favor[$i];
			$ary_data[$i]['descr']		= $ary_descr[$i];
			$ary_data[$i]['is_account']	= in_array($ary_row_clientContact[$i], $ary_is_account);
		}

		$this->db->insert_batch('mapping_client_contact',$ary_data);

		return 1;
	}

	public function clientDescr_doEdit($client_id) {
		$ary_data = array();
		$this->db->delete('mapping_client_descr', array('client_id' => $client_id)); 

		$ary_row_clientDescr 	= $this->input->post('row_clientDescr');
		$ary_date				= $this->input->post('date_clientDescr');
		$ary_detail				= $this->input->post('detail_clientDescr');
		$ary_descr				= $this->input->post('descr_clientDescr');

		for($i=0; $i < count($ary_row_clientDescr); $i++) {
			$ary_data[$i]['row']		= $ary_row_clientDescr[$i];
			$ary_data[$i]['client_id']	= $client_id;
			$ary_data[$i]['date']		= $ary_date[$i];
			$ary_data[$i]['detail']		= $ary_detail[$i];
			$ary_data[$i]['descr']		= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_client_descr',$ary_data);

		return 1;
	}

	public function clientCash_doEdit($client_id) {
		$ary_data = array();
		$this->db->delete('mapping_client_cash', array('client_id' => $client_id)); 

		$ary_row_clientCash	= $this->input->post('row_clientCash');
		$ary_country_id		= $this->input->post('sel_country_clientCash');
		$ary_currency_id	= $this->input->post('sel_currency_clientCash');
		$ary_descr			= $this->input->post('descr_clientCash');

		for($i=0; $i < count($ary_row_clientCash); $i++) {
			$ary_data[$i]['row']		= $ary_row_clientCash[$i];
			$ary_data[$i]['client_id']	= $client_id;
			$ary_data[$i]['country_id']	= $ary_country_id[$i];
			$ary_data[$i]['currency_id']= $ary_currency_id[$i];
			$ary_data[$i]['descr']		= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_client_cash',$ary_data);

		return 1;
	}

	public function clientLicense_doEdit($client_id) {
		$ary_data = array();
		$this->db->delete('mapping_client_license', array('client_id' => $client_id)); 

		$ary_row_clientLicense	= $this->input->post('row_clientLicense');
		$ary_country_id			= $this->input->post('sel_country_clientLicense');
		$ary_work_type_major	= $this->input->post('sel_work_type_major_clientLicense');
		$ary_number_tw			= $this->input->post('number_tw_clientLicense');
		$ary_name_tw			= $this->input->post('name_tw_clientLicense');
		$ary_name_en			= $this->input->post('name_en_clientLicense');
		$ary_foreign_tw			= $this->input->post('foreign_tw_clientLicense');
		$ary_foreign_en			= $this->input->post('foreign_en_clientLicense');
		$ary_date				= $this->input->post('date_clientLicense');
		$ary_expiry_date		= $this->input->post('expiry_date_clientLicense');

		for($i=0; $i < count($ary_row_clientLicense); $i++) {
			$ary_data[$i]['row']			= $ary_row_clientLicense[$i];
			$ary_data[$i]['client_id']		= $client_id;
			$ary_data[$i]['country_id']		= $ary_country_id[$i];
			$ary_data[$i]['work_type_major']= $ary_work_type_major[$i];
			$ary_data[$i]['number_tw']		= $ary_number_tw[$i];
			$ary_data[$i]['name_tw']		= $ary_name_tw[$i];
			$ary_data[$i]['name_en']		= $ary_name_en[$i];
			$ary_data[$i]['foreign_tw']		= $ary_foreign_tw[$i];
			$ary_data[$i]['foreign_en']		= $ary_foreign_en[$i];
			$ary_data[$i]['date']			= $ary_date[$i];
			$ary_data[$i]['expiry_date']	= $ary_expiry_date[$i];
		}

		$this->db->insert_batch('mapping_client_license',$ary_data);

		return 1;
	}

	public function clientRelation_doEdit($client_id) {
		$ary_data = array();
		$this->db->delete('mapping_client_relation', array('client_id' => $client_id)); 
		
		$ary_row_clientRelation	= $this->input->post('row_clientRelation');
		$ary_employer_id		= $this->input->post('sel_employer_id');

		for($i=0; $i < count($ary_row_clientRelation); $i++) {
			$ary_data[$i]['row']		= $ary_row_clientRelation[$i];
			$ary_data[$i]['client_id']	= $client_id;
			$ary_data[$i]['employer_id']= $ary_employer_id[$i];
		}
		$this->db->insert_batch('mapping_client_relation',$ary_data);

		return 1;
	}	

	public function client_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('client');
		//info
		$this->clientContact_doDel($id);
		$this->clientDescr_doDel($id);
		$this->clientCash_doDel($id);
		$this->clientLicense_doDel($id);
		$this->clientRelation_doDel($id);

		return 1;
	}

	public function clientContact_doDel($id) {
		$this->db->where('client_id', $id);
		$this->db->delete('mapping_client_contact');

		return 1;
	}

	public function clientDescr_doDel($id) {
		$this->db->where('client_id', $id);
		$this->db->delete('mapping_client_descr');

		return 1;
	}

	public function clientCash_doDel($id) {
		$this->db->where('client_id', $id);
		$this->db->delete('client_cash');

		return 1;
	}

	public function clientLicense_doDel($id) {
		$this->db->where('client_id', $id);
		$this->db->delete('mapping_client_license');

		return 1;
	}

	public function clientRelation_doDel($id) {
		$this->db->where('client_id', $id);
		$this->db->delete('mapping_client_relation');

		return 1;
	}	

	public function getClientById($id) {
		$this->db->select('c.*, u.account as user_create_name');
		$this->db->join('user u','u.id=c.user_create','left');	
		$this->db->where('c.id', $id);
		$query = $this->db->get('client c');
		
		return $query->row_array();
	}

	public function getClientBySearch() {
		$ary_ret = array();

		$this->db->select('id, name_tw');
		$this->db->like('name_tw', $this->input->post('keyword'), 'after');
		$query = $this->db->get('client');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['name_tw'];
			}
		}

		return $ary_ret;
	}

	public function getClientDescrByClientId($client_id) {
		$this->db->select('*');
		$this->db->where('client_id', $client_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_client_descr');
		
		return $query->result_array();
	}	

	public function getClientContactByClientId($client_id) {
		$this->db->select('*');
		$this->db->where('client_id', $client_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_client_contact');
		
		return $query->result_array();
	}

	public function getClientCashByClientId($client_id) {
		$this->db->select('*');
		$this->db->where('client_id', $client_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_client_cash');
		
		return $query->result_array();
	}

	public function getClientLicenseByClientId($client_id) {
		$this->db->select('*');
		$this->db->where('client_id', $client_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_client_license');
		
		return $query->result_array();
	}	

	public function getclientRelationByClientId($client_id) {
		$this->db->select('r.*');
		$this->db->select('r.* , e.name_tw as e_name_tw');
		$this->db->join('employer e','e.id=r.employer_id','left');
		$this->db->where('client_id', $client_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_client_relation r');

		return $query->result_array();
	}

	public function getClientByminid() {
		$this->db->select('id');
		$this->db->order_by("id","asc");
		$query = $this->db->get('client');
		
		return $query->row_array();		
	}

	public function getClientByClientIdsel() {
		$ary_ret = array();
		$ary_ret2 = array();					

		$this->db->select('c.*');
		$query = $this->db->get('client c');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['id'];
				$ary_ret2[$val['id']] = $val['add_tw'];			
			}
		}

		return array($ary_ret,$ary_ret2);

	}

	// output: bool
	//		true: dupli!
	//		false: no dupli
	public function checkClientDupli($license, $id) {
		$this->db->where('license', $license);
		$this->db->where('id != ', $id);
		$this->db->from('client');
		$count = $this->db->count_all_results();

		return ($count > 0 ? true : false);
	}

}