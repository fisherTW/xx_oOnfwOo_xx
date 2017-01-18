<?php
/*
* File:			employer_model.php
* Version:		-
* Last changed:	2016/05/12
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Employer_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getEmployer($output=0) {
		$ary_ret = array();

		$this->db->select('e.*, a.tw as tw_area , i.tw as tw_industry');
		$this->db->join('conf_area a','a.id=e.area_id','left');		
		$this->db->join('conf_industry i','i.id=e.industry_id','left');		
		$query = $this->db->get('employer e');
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

	public function employer_doEdit() {
		$ary_data = array(
			'name_tw'		=> $this->input->post('txt_name_tw'),
			'name_en'		=> $this->input->post('txt_name_en'),
			'alias'			=> $this->input->post('txt_alias'),
			'web'			=> $this->input->post('txt_web'),
			'owner_tw'		=> $this->input->post('txt_owner_tw'),
			'owner_en'		=> $this->input->post('txt_owner_en'),			
			'add_tw'		=> $this->input->post('txt_add_tw'),
			'add_en'		=> $this->input->post('txt_add_en'),
			'history'		=> $this->input->post('txt_history'),
			'file_path'		=> $this->input->post('hid_filepath1'),
			'product'		=> $this->input->post('txt_product'),
			'user_create'	=> $this->session->userdata('user_id'),
			'date_create'	=> date("Y-m-d"),		
			'user_modify'	=> $this->session->userdata('user_id'),
			'date_modify'	=> date("Y-m-d"),
			'taxid'			=> $this->input->post('txt_taxid'),
			'area_id'		=> $this->input->post('sel_area_id'),
			'tel'			=> $this->input->post('txt_tel'),
			'fax'			=> $this->input->post('txt_fax'),
			'industry_id'	=> $this->input->post('sel_industry_id'),
			'item'			=> $this->input->post('txt_item'),
			'email'			=> $this->input->post('txt_email'),
			'birthday'		=> $this->input->post('txt_birthday'),
			'descr'			=> $this->input->post('txt_descr')			
		);
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('employer');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('employer');
			$id = $this->input->post('hid_id');
		}

		//info
		$this->employerContact_doEdit($id);

		return 1;
	}

	public function employerContact_doEdit($employer_id) {
		$ary_data = array();
		$this->db->delete('mapping_employer_contact', array('employer_id' => $employer_id)); 

		$ary_row_employerContact	= $this->input->post('row_employerContact');
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

		for($i=0; $i < count($ary_row_employerContact); $i++) {
			$ary_data[$i]['row']		= $ary_row_employerContact[$i];
			$ary_data[$i]['employer_id']= $employer_id;
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
		}

		$this->db->insert_batch('mapping_employer_contact',$ary_data);

		return 1;
	}

	public function employer_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('employer');
		//info
		$this->employerContact_doDel($id);

		return 1;
	}

	public function employerContact_doDel($id) {
		$this->db->where('employer_id', $id);
		$this->db->delete('mapping_employer_contact');

		return 1;
	}

	public function getEmployerById($id) {
		$this->db->select('e.*, u.account as user_create_name');
		$this->db->join('user u','u.id=e.user_create','left');		
		$this->db->where('e.id', $id);
		$query = $this->db->get('employer e');
		
		return $query->row_array();
	}

	public function getEmployerContactByEmployerId($employer_id) {
		$this->db->select('*');
		$this->db->where('employer_id', $employer_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_employer_contact');
		
		return $query->result_array();
	}

	public function getEmployerBySearch() {
		$ary_ret = array();

		$this->db->select('id, name_tw');
		$this->db->like('name_tw', $this->input->post('keyword'), 'after');
		$query = $this->db->get('employer');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['name_tw'];
			}
		}

		return $ary_ret;
	}

	public function getEmployerByminid() {
		$this->db->select('id');
		$this->db->order_by("id","asc");
		$query = $this->db->get('employer');
		
		return $query->row_array();		
	}

	public function getEmployerByEmployerIdsel() {
		$ary_ret = array();
		$ary_ret2 = array();
		$ary_ret3 = array();
		$ary_ret4 = array();
		$ary_ret5 = array();					

		$this->db->select('e.*,i.tw as industry_tw');
		$this->db->join('conf_industry i','e.industry_id=i.id','left');
		$query = $this->db->get('employer e');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['id'];
				$ary_ret2[$val['id']] = $val['web'];
				$ary_ret3[$val['id']] = $val['history'];
				$ary_ret4[$val['id']] = $val['industry_tw'];
				$ary_ret5[$val['id']] = $val['product'];				
			}
		}

		return array($ary_ret,$ary_ret2,$ary_ret3,$ary_ret4,$ary_ret5);
	}
}