
<?php
/*
* File:			Hire_model.php
* Version:		-
* Last changed:	2016/05/12
* Purpose:		-
* Author:		Irene
* Copyright:	(C) 2016
* Product:		NFW
*/

class Hire_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getHire_factory($output=0,$is_factory=0,$is_where=0, $status=0) {
		$ary_ret = array();

		$this->db->select('h.*, c.tw as tw_c, cl.name_tw as client_name_tw, e.name_tw as employer_name_tw');
		$this->db->join('conf_country c','c.id=h.country_id','left');
		$this->db->join('client cl','h.client_id=cl.id','left');
		$this->db->join('employer e','h.employer_id=e.id','left');
		if($is_where == 0){
			$this->db->where('h.is_factory', $is_factory);
		}
		if($status == 1){
			$this->db->where('h.status', $status);
		}		
		$this->db->order_by("h.id","asc");
		$query = $this->db->get('hire h');
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

	public function getHire_factoryById($id) {
		$this->db->select('h.*, cy.tw as tw_c,u.account as user_create_name, c.name_tw as c_name_tw, e.name_tw as e_name_tw,c.add_tw as site_factory,e.web as employer_web,e.history as employer_history,e.product as employer_product,i.tw as industry_tw');
		$this->db->join('conf_country cy','cy.id=h.country_id','left');
		$this->db->join('user u','u.id=h.user_create','left');
		$this->db->join('client c','h.client_id=c.id','left');
		$this->db->join('employer e','h.employer_id=e.id','left');
		$this->db->join('conf_industry i','e.industry_id=i.id','left');
		$this->db->where('h.id', $id);
		$query = $this->db->get('hire h');
		
		return $query->row_array();
	}

	public function getHireId($hire_id) {
		$ary_ret = array();

		$this->db->select('h.*, cy.tw as tw_c,c.name_tw as c_name_tw, c.web as web, e.name_tw as e_name_tw, d.tw as f_doc_id6_8');
		$this->db->join('conf_country cy','cy.id=h.country_id','left');
		$this->db->join('client c','c.id=h.client_id','left');
		$this->db->join('employer e','e.id=h.employer_id','left');
		$this->db->join('conf_doc d','h.f_doc_id6_8=d.id','left');		
		$this->db->where('h.id',$hire_id);
		$query = $this->db->get('hire h');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[0] = $val['id'];
				$ary_ret[1] = $val['tw_c'];
				$ary_ret[2] = $val['c_name_tw'];
				$ary_ret[3] = $val['e_name_tw'];
				$ary_ret[4] = $val['worker_kind'];
				$ary_ret[5] = $val['worker_type_major'];
				$ary_ret[6] = $val['worker_type_minor_id'];
				$ary_ret[7] = $val['gender'];
				$ary_ret[8] = $val['qty_require'];
				$ary_ret[9] = $val['work_limit'];
				$ary_ret[10] = $val['food_type'];
				$ary_ret[11] = $val['qty_immigrate'];
				$ary_ret[12] = $val['insur_labor'];
				$ary_ret[13] = $val['save'];
				$ary_ret[14] = $val['save2'];
				$ary_ret[15] = $val['insur_health'];
				$ary_ret['client_addtw'] 		= $val['client_addtw'];
				$ary_ret['descr2'] 				= $val['descr2'];
				$ary_ret['f_doc_id6_8'] 		= $val['f_doc_id6_8'];
				$ary_ret['f_w_item'] 			= $val['f_w_item'];
				$ary_ret['f_w_time_descr'] 		= $val['f_w_time_descr'];
				$ary_ret['f_w_avg_salary'] 		= $val['f_w_avg_salary'];
				$ary_ret['f_descr'] 			= $val['f_descr'];
				$ary_ret['web'] 				= $val['web'];
				$ary_ret['worker_kind']			= $val['worker_kind'];
				$ary_ret['gender']				= $val['gender'];
				$ary_ret['worker_type_major']	= $val['worker_type_major'];
				$ary_ret['worker_type_minor_id']= $val['worker_type_minor_id'];
				$ary_ret['height']				= $val['height'];
				$ary_ret['weight']				= $val['weight'];
				$ary_ret['age_start']			= $val['age_start'];
				$ary_ret['age_end']				= $val['age_end'];
				$ary_ret['marriage']			= $val['marriage'];
			}
		}
		return $ary_ret;
	}

	public function getHireByminsid() {
		$this->db->select('id');
//處理狀況		$this->db->where('status', 1);
		$this->db->order_by("id","asc");
		$query = $this->db->get('hire');
		
		return $query->row_array();		
	}

	public function hire_factory_doEdit() {
		$ary_data = array(
			'is_factory'			=> 0,
			'country_id' 			=> $this->input->post('sel_country'),
			'country_id_input' 		=> $this->input->post('sel_country_id_input'),
			'date_order' 			=> $this->input->post('txt_date_order'),
			'client_id' 			=> $this->input->post('sel_client_id'),
			'worker_kind'			=> $this->input->post('sel_worker_kind'),
			'employer_id'			=> $this->input->post('sel_employer_id'),
			'worker_type_major'		=> $this->input->post('sel_worker_type_major'),
			'work_limit'			=> $this->input->post('txt_work_limit'),
			'worker_type_minor_id'	=> $this->input->post('sel_worker_type_minor'),
			'gender'				=> $this->input->post('rdo_sex'),
			'status'				=> $this->input->post('sel_status'),
			'marriage'				=> $this->input->post('sel_marriage'),
			'qty_require'			=> $this->input->post('txt_qty_require'),
			'height'				=> $this->input->post('txt_height'),
			'qty_main'				=> $this->input->post('txt_qty_main'),
			'weight'				=> $this->input->post('txt_weight'),
			'qty_bench'				=> $this->input->post('txt_qty_bench'),
			'age_start'				=> $this->input->post('txt_age_start'),
			'age_end'				=> $this->input->post('txt_age_end'),
			'qty_immigrate'			=> $this->input->post('txt_qty_immigrate'),
			'comeback'				=> $this->input->post('sel_comeback'),
			'client_addtw'			=> $this->input->post('txt_client_addtw'),
			'arrspot'				=> $this->input->post('sel_arrspot'),
			'descr'					=> $this->input->post('txt_descr'),
			'sales_id'				=> $this->input->post('sel_sales_id'),
			'file_path'				=> $this->input->post('hid_filepath'),
			'service_id'			=> $this->input->post('sel_service_id'),
			'food_type'				=> $this->input->post('rdo_food_type'),
			'food_descr'			=> $this->input->post('txt_food_descr'),
			'ticket'				=> $this->input->post('sel_ticket'),
			'insur_labor'			=> $this->input->post('txt_insur_labor'),
			'insur_health'			=> $this->input->post('txt_insur_health'),
			'insur_type'			=> $this->input->post('rdo_insur_type'),
			'insur_descr'			=> $this->input->post('txt_insur_descr'),
			'save'					=> $this->input->post('txt_save'),
			'save2'					=> $this->input->post('txt_save2'),
			'descr2'				=> $this->input->post('txt_descr2'),
			'letter_id'				=> $this->input->post('sel_letter_id'),
			'date_letter'			=> $this->input->post('txt_date_letter'),
			'letter_id2'			=> $this->input->post('sel_letter_id2'),
			'date_letter2'			=> $this->input->post('txt_date_letter2'),
			'date_descr3'			=> $this->input->post('txt_date_descr3'),
			'descr3'				=> $this->input->post('txt_descr3'),
			'f_test_item'			=> $this->input->post('txt_f_test_item'),
			'f_file_path2'			=> $this->input->post('hid_filepath2'),
			'f_descr'				=> $this->input->post('txt_f_descr'),
			'f_date_doc'			=> $this->input->post('txt_f_date_doc'),
			'f_doc_id6_8'			=> $this->input->post('sel_f_doc_id6_8'),
			'f_w_doc_id6_4'			=> $this->input->post('sel_f_w_doc_id6_4'),
			'f_date_immigrate'		=> $this->input->post('txt_f_date_immigrate'),
			'f_w_overtime'			=> $this->input->post('txt_f_w_overtime'),
			'f_w_avg_salary'		=> $this->input->post('txt_f_w_avg_salary'),
			'f_w_file_path'			=> $this->input->post('hid_filepath3'),
			'f_w_environment'		=> $this->input->post('txt_f_w_environment'),
			'f_w_date_salary'		=> $this->input->post('txt_f_w_date_salary'),
			'f_w_item'				=> $this->input->post('txt_f_w_item'),
			'f_w_time_descr'		=> $this->input->post('txt_f_w_time_descr'),
			'month_salary'			=> $this->input->post('txt_month_salary'),
			'f_real_salary'			=> $this->input->post('txt_f_real_salary'),
			'f_overtime2'			=> $this->input->post('sel_f_overtime2'),
			'f_overtime3'			=> $this->input->post('sel_f_overtime3'),
			'holiday_salary'		=> $this->input->post('txt_holiday_salary'),
			'tax'					=> $this->input->post('txt_tax'),
			'tax2'					=> $this->input->post('txt_tax2'),
			'tax3'					=> $this->input->post('txt_tax3'),
			'descr_salary'			=> $this->input->post('txt_descr_salary'),
			'user_create'			=> $this->session->userdata('user_id'),
			'date_create'			=> date("Y-m-d"),
			'user_modify'			=> $this->session->userdata('user_id'),
			'date_modify'			=> date("Y-m-d")
		);
		if(strval($this->input->post('rdo_food_type')) == '1') {
			$ary_data['food_descr']='';
		}

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('hire');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('hire');
			$id = $this->input->post('hid_id');
		}

		// auth info
		$this->hire_factory_auth_doEdit($id);
		$this->hire_special_auth_doEdit($id);
		$this->hire_salary_auth_doEdit($id);

		return 1;
	}

	public function hire_factory_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('hire');
		// auth info
		$this->hire_factory_auth_doDel($id);
		$this->hire_special_auth_doDel($id);
		$this->hire_salary_auth_doDel($id);

		return 1;
	}

	public function getHire_factoryAuthByHire_factoryId($hire_id) {
		$this->db->select('*');
		$this->db->where('hire_id', $hire_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_hire_language');
		
		return $query->result_array();		
	}

	public function hire_factory_auth_doEdit($hire_id) {
		$ary_data = array();
		$this->db->delete('mapping_hire_language', array('hire_id' => $hire_id)); 

		$ary_row		= $this->input->post('row_exp');
		$ary_language	= $this->input->post('sel_language');
		$ary_level		= $this->input->post('sel_level');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['hire_id']	= $hire_id;
			$ary_data[$i]['language']	= $ary_language[$i];
			$ary_data[$i]['level']		= $ary_level[$i];
		}

		$this->db->insert_batch('mapping_hire_language',$ary_data);

		return 1;
	}

	public function hire_factory_auth_doDel($id) {
		$this->db->where('hire_id', $id);
		$this->db->delete('mapping_hire_language');

		return 1;
	}

	public function getHire_specialAuthByHire_specialId($hire_id) {
		$this->db->select('*');
		$this->db->where('hire_id', $hire_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_hire_special');
		
		return $query->result_array();		
	}

	public function hire_special_auth_doEdit($hire_id) {
		$ary_data = array();
		$this->db->delete('mapping_hire_special', array('hire_id' => $hire_id)); 

		$ary_row					= $this->input->post('row_hire_special');
		$ary_no_hire_special		= $this->input->post('no_hire_special');
		$ary_name_tw_hire_special	= $this->input->post('name_tw_hire_special');
		$ary_name_en_hire_special	= $this->input->post('name_en_hire_special');
		$ary_tel_hire_special		= $this->input->post('tel_hire_special');
		$ary_tel2_hire_special		= $this->input->post('tel2_hire_special');
		$ary_address_hire_special	= $this->input->post('address_hire_special');
		$ary_descr_hire_special		= $this->input->post('descr_hire_special');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['hire_id']	= $hire_id;
			$ary_data[$i]['no']			= $ary_no_hire_special[$i];
			$ary_data[$i]['name_tw']	= $ary_name_tw_hire_special[$i];
			$ary_data[$i]['name_en']	= $ary_name_en_hire_special[$i];
			$ary_data[$i]['tel']		= $ary_tel_hire_special[$i];
			$ary_data[$i]['tel2']		= $ary_tel2_hire_special[$i];
			$ary_data[$i]['address']	= $ary_address_hire_special[$i];
			$ary_data[$i]['descr']		= $ary_descr_hire_special[$i];
		}

		$this->db->insert_batch('mapping_hire_special',$ary_data);

		return 1;
	}

	public function hire_special_auth_doDel($id) {
		$this->db->where('hire_id', $id);
		$this->db->delete('mapping_hire_special');

		return 1;
	}
	
	public function getHire_salaryAuthByHire_factoryId($hire_id) {
		$this->db->select('*');
		$this->db->where('hire_id', $hire_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_hire_salary');
		
		return $query->result_array();		
	}

	public function hire_salary_auth_doEdit($hire_id) {
		$ary_data = array();
		$this->db->delete('mapping_hire_salary', array('hire_id' => $hire_id)); 

		$ary_row				= $this->input->post('row_hire_salary');
		$ary_type_hire_salary	= $this->input->post('sel_type_hire_salary');
		$ary_item_hire_salary	= $this->input->post('sel_item_hire_salary');
		$ary_money_hire_salary	= $this->input->post('txt_money_hire_salary');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['hire_id']	= $hire_id;
			$ary_data[$i]['type']		= $ary_type_hire_salary[$i];
			$ary_data[$i]['item']		= $ary_item_hire_salary[$i];
			$ary_data[$i]['money']		= $ary_money_hire_salary[$i];
		}

		$this->db->insert_batch('mapping_hire_salary',$ary_data);

		return 1;
	}

	public function hire_salary_auth_doDel($id) {
		$this->db->where('hire_id', $id);
		$this->db->delete('mapping_hire_salary');

		return 1;
	}
	// $output:1: only id->name
	public function getHire_non_factory($output=0) {
		$ary_ret = array();

		$this->db->select('p.*, c.tw as tw_c');
		$this->db->join('conf_country c','c.id=p.country_id','left');

		$query = $this->db->get('hire p');
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

	public function getHire_non_factoryById($id) {
		$this->db->select('p.*, cy.tw as tw_c,u.account as user_create_name,c.name_tw as c_name_tw, e.name_tw as e_name_tw,c.add_tw as site_factory, (m_w_pet2 + m_w_pet3 + m_w_pet4) AS sum, (month_salary + m_allowance_salary) AS sum_total');
		$this->db->join('client c','c.id=p.client_id','left');
		$this->db->join('employer e','e.id=p.employer_id','left');
		$this->db->join('conf_country cy','cy.id=p.country_id','left');
		$this->db->join('user u','u.id=p.user_create','left');
		$this->db->where('p.id', $id);
		$query = $this->db->get('hire p');
		
		return $query->row_array();
	}

	public function hire_non_factory_doEdit() {
		$ary_data = array(
			'is_factory'				=> 1,
			'country_id' 				=> $this->input->post('sel_country'),
			'country_id_input' 			=> $this->input->post('sel_country_id_input'),
			'date_order' 				=> $this->input->post('txt_date_order'),
			'client_id' 				=> $this->input->post('sel_client_id'),
			'worker_kind'				=> $this->input->post('sel_worker_kind'),
			'employer_id'				=> $this->input->post('sel_employer_id'),
			'worker_type_major'			=> $this->input->post('sel_worker_type_major'),
			'work_limit'				=> $this->input->post('txt_work_limit'),
			'worker_type_minor_id'		=> $this->input->post('sel_worker_type_minor'),
			'gender'					=> $this->input->post('rdo_sex'),
			'status'					=> $this->input->post('sel_status'),
			'marriage'					=> $this->input->post('sel_marriage'),
			'qty_require'				=> $this->input->post('txt_qty_require'),
			'height'					=> $this->input->post('txt_height'),
			'qty_main'					=> $this->input->post('txt_qty_main'),
			'weight'					=> $this->input->post('txt_weight'),
			'qty_bench'					=> $this->input->post('txt_qty_bench'),
			'age_start'					=> $this->input->post('txt_age_start'),
			'age_end'					=> $this->input->post('txt_age_end'),
			'qty_immigrate'				=> $this->input->post('txt_qty_immigrate'),
			'comeback'					=> $this->input->post('sel_comeback'),
			'client_addtw'				=> $this->input->post('txt_client_addtw'),
			'arrspot'					=> $this->input->post('sel_arrspot'),
			'descr'						=> $this->input->post('txt_descr'),
			'sales_id'					=> $this->input->post('sel_sales_id'),
			'file_path'					=> $this->input->post('hid_filepath'),
			'service_id'				=> $this->input->post('sel_service_id'),
			'food_type'					=> $this->input->post('rdo_food_type'),
			'food_descr'				=> $this->input->post('txt_food_descr'),
			'ticket'					=> $this->input->post('sel_ticket'),
			'insur_labor'				=> $this->input->post('txt_insur_labor'),
			'insur_health'				=> $this->input->post('txt_insur_health'),
			'insur_type'				=> $this->input->post('rdo_insur_type'),
			'insur_descr'				=> $this->input->post('txt_insur_descr'),
			'save'						=> $this->input->post('txt_save'),
			'save2'						=> $this->input->post('txt_save2'),
			'descr2'					=> $this->input->post('txt_descr2'),
			'letter_id'					=> $this->input->post('sel_letter_id'),
			'date_letter'				=> $this->input->post('txt_date_letter'),
			'letter_id2'				=> $this->input->post('sel_letter_id2'),
			'date_letter2'				=> $this->input->post('txt_date_letter2'),
			'date_descr3'				=> $this->input->post('txt_date_descr3'),
			'descr3'					=> $this->input->post('txt_descr3'),
			'm_w_detail_descr'			=> $this->input->post('txt_m_w_detail_descr'),
			'm_w_home'					=> $this->input->post('txt_m_w_home'),
			'm_w_home2'					=> $this->input->post('txt_m_w_home2'),
			'm_w_home3'					=> $this->input->post('txt_m_w_home3'),
			'm_w_home4'					=> $this->input->post('txt_m_w_home4'),
			'm_w_home5'					=> $this->input->post('txt_m_w_home5'),
			'm_w_pet'					=> $this->input->post('txt_m_w_pet'),
			'm_w_pet2'					=> $this->input->post('txt_m_w_pet2'),
			'm_w_pet3'					=> $this->input->post('txt_m_w_pet3'),
			'm_w_pet4'					=> $this->input->post('txt_m_w_pet4'),
			'm_w_pet5'					=> $this->input->post('txt_m_w_pet5'),
			'm_w_child'					=> $this->input->post('txt_m_w_child'),
			'm_w_child2'				=> $this->input->post('txt_m_w_child2'),
			'm_w_child3'				=> $this->input->post('txt_m_w_child3'),
			'm_w_child4'				=> $this->input->post('txt_m_w_child4'),
			'm_w_child_detail_descr'	=> $this->input->post('txt_m_w_child_detail_descr'),
			'month_salary'				=> $this->input->post('txt_month_salary'),
			'm_allowance_salary'		=> $this->input->post('txt_m_allowance_salary'),
			'holiday_salary'			=> $this->input->post('txt_holiday_salary'),
			'tax'						=> $this->input->post('txt_tax'),
			'tax2'						=> $this->input->post('txt_tax2'),
			'tax3'						=> $this->input->post('txt_tax3'),
			'descr_salary'				=> $this->input->post('txt_descr_salary'),
			'm_patient'					=> $this->input->post('txt_m_patient'),
			'm_patient_gender'			=> $this->input->post('rdo_m_patient_gender'),
			'm_patient_height'			=> $this->input->post('txt_m_patient_height'),
			'm_patient_weight'			=> $this->input->post('txt_m_patient_weight'),
			'm_patient_age'				=> $this->input->post('txt_m_patient_age'),
			'm_patient_descr'			=> $this->input->post('txt_m_patient_descr'),
			'm_patient_item_descr'		=> $this->input->post('txt_m_patient_item_descr'),
			'm_patient_item2'			=> $this->input->post('rdo_m_patient_item2'),
			'm_patient_item3'			=> $this->input->post('rdo_m_patient_item3'),
			'm_patient_item4'			=> $this->input->post('rdo_m_patient_item4'),
			'm_patient_item5'			=> $this->input->post('rdo_m_patient_item5'),
			'm_education'				=> $this->input->post('sel_m_education'),
			'm_personality'				=> $this->input->post('sel_m_personality'),
			'm_doc_id6_3'				=> $this->input->post('sel_m_doc_id6_3'),
			'm_doc_id6_7'				=> $this->input->post('sel_m_doc_id6_7'),
			'm_food'					=> $this->input->post('sel_m_food'),
			'm_descr'					=> $this->input->post('txt_m_descr'),
			'm_profssion'				=> $this->input->post('rdo_m_profssion'),
			'm_profssion_descr'			=> $this->input->post('txt_m_profssion_descr'),
			'm_family_b'				=> $this->input->post('txt_m_family_b'),
			'm_family_b2'				=> $this->input->post('txt_m_family_b2'),
			'm_family_b3'				=> $this->input->post('txt_m_family_b3'),
			'm_family_b4'				=> $this->input->post('txt_m_family_b4'),
			'm_family_b5'				=> $this->input->post('txt_m_family_b5'),
			'm_family_g'				=> $this->input->post('txt_m_family_g'),
			'm_family_g2'				=> $this->input->post('txt_m_family_g2'),
			'm_family_g3'				=> $this->input->post('txt_m_family_g3'),
			'm_family_g4'				=> $this->input->post('txt_m_family_g4'),
			'm_family_g5'				=> $this->input->post('txt_m_family_g5'),
			'm_house_room'				=> $this->input->post('txt_m_house_room'),
			'm_house_room2'				=> $this->input->post('txt_m_house_room2'),
			'm_house_room3'				=> $this->input->post('txt_m_house_room3'),
			'm_house_space'				=> $this->input->post('txt_m_house_space'),
			'm_house_space2'			=> $this->input->post('txt_m_house_space2'),
			'm_house_space3'			=> $this->input->post('txt_m_house_space3'),
			'm_descr2'					=> $this->input->post('txt_m_descr2'),
			'user_create'				=> $this->session->userdata('user_id'),
			'date_create'				=> date("Y-m-d"),
			'user_modify'				=> $this->session->userdata('user_id'),
			'date_modify'				=> date("Y-m-d")
		);
		$ary_m_w_main				= $this->input->post('chk_m_w_main');
		$ary_m_w_detail				= $this->input->post('chk_m_w_detail');
		$ary_m_w_wash				= $this->input->post('chk_m_w_wash');
		$ary_m_w_home				= $this->input->post('chk_m_w_home');
		$ary_m_w_cook				= $this->input->post('chk_m_w_cook');
		$ary_m_w_cook_detail		= $this->input->post('chk_m_w_cook_detail');
		$ary_m_w_child_detail		= $this->input->post('chk_m_w_child_detail');
		$ary_m_patient_item			= $this->input->post('chk_m_patient_item');
		$ary_m_work_time			= $this->input->post('chk_m_work_time');
		$ary_m_family				= $this->input->post('chk_m_family');
		$ary_m_house				= $this->input->post('chk_m_house');
		$ary_sum =0;
		for($i=0; $i < count($ary_m_w_main); $i++) {
			$ary_sum		= $ary_sum + $ary_m_w_main[$i];
		}
		$ary_sum1 =0;
		for($i=0; $i < count($ary_m_w_detail); $i++) {
			$ary_sum1		= $ary_sum1 + $ary_m_w_detail[$i];
		}
		$ary_sum2 =0;
		for($i=0; $i < count($ary_m_w_wash); $i++) {
			$ary_sum2		= $ary_sum2 + $ary_m_w_wash[$i];
		}
		$ary_sum3 =0;
		for($i=0; $i < count($ary_m_w_home); $i++) {
			$ary_sum3		= $ary_sum3 + $ary_m_w_home[$i];
		}
		$ary_sum4 =0;
		for($i=0; $i < count($ary_m_w_cook); $i++) {
			$ary_sum4		= $ary_sum4 + $ary_m_w_cook[$i];
		}
		$ary_sum5 =0;
		for($i=0; $i < count($ary_m_w_cook_detail); $i++) {
			$ary_sum5		= $ary_sum5 + $ary_m_w_cook_detail[$i];
		}
		$ary_sum6 =0;
		for($i=0; $i < count($ary_m_w_child_detail); $i++) {
			$ary_sum6		= $ary_sum6 + $ary_m_w_child_detail[$i];
		}
		$ary_sum7 =0;
		for($i=0; $i < count($ary_m_patient_item); $i++) {
			$ary_sum7		= $ary_sum7 + $ary_m_patient_item[$i];
		}
		$ary_sum8 =0;
		for($i=0; $i < count($ary_m_work_time); $i++) {
			$ary_sum8		= $ary_sum8 + $ary_m_work_time[$i];
		}
		$ary_sum9 =0;
		for($i=0; $i < count($ary_m_family); $i++) {
			$ary_sum9		= $ary_sum9 + $ary_m_family[$i];
		}
		$ary_sum10 =0;
		for($i=0; $i < count($ary_m_house); $i++) {
			$ary_sum10		= $ary_sum10 + $ary_m_house[$i];
		}
		$ary_data['m_w_main'] = $ary_sum;
		$ary_data['m_w_detail'] = $ary_sum1;
		$ary_data['m_w_wash'] = $ary_sum2;
		$ary_data['m_w_home'] = $ary_sum3;
		$ary_data['m_w_cook'] = $ary_sum4;
		$ary_data['m_w_cook_detail'] = $ary_sum5;
		$ary_data['m_w_child_detail'] = $ary_sum6;
		$ary_data['m_patient_item'] = $ary_sum7;
		$ary_data['m_work_time'] = $ary_sum8;
		$ary_data['m_family'] = $ary_sum9;
		$ary_data['m_house'] = $ary_sum10;

		if(strval($this->input->post('rdo_food_type')) == '1') {
			$ary_data['food_descr']='';
		}
		if(strval($this->input->post('rdo_m_profssion')) != '5') {
			$ary_data['m_profssion_descr']='';
		}
		if(($ary_data['m_family'] & 1) != 1){
			$ary_data['m_family_b']='';
			$ary_data['m_family_g']='';
		}
		if(($ary_data['m_family'] & 2) != 2){
			$ary_data['m_family_b2']='';
			$ary_data['m_family_g2']='';
		}
		if(($ary_data['m_family'] & 4) != 4){
			$ary_data['m_family_b3']='';
			$ary_data['m_family_g3']='';
		}
		if(($ary_data['m_family'] & 8) != 8){
			$ary_data['m_family_b4']='';
			$ary_data['m_family_g4']='';
		}
		if(($ary_data['m_family'] & 16) != 16){
			$ary_data['m_family_b5']='';
			$ary_data['m_family_g5']='';
		}
		if(($ary_data['m_house'] & 1) != 1){
			$ary_data['m_house_room']='';
			$ary_data['m_house_space']='';
		}
		if(($ary_data['m_house'] & 2) != 2){
			$ary_data['m_house_room2']='';
			$ary_data['m_house_space2']='';
		}
		if(($ary_data['m_house'] & 4) != 4){
			$ary_data['m_house_room3']='';
			$ary_data['m_house_space3']='';
		}
		(($ary_data['m_w_detail'] & 65536) == 65536) ? '' : $ary_data['m_w_detail_descr']='';
		(($ary_data['m_w_home'] & 1024) == 1024) ? '' : $ary_data['m_w_pet']='';
		(($ary_data['m_w_home'] & 4096) == 4096) ? '' : $ary_data['m_w_pet5']='';
		(($ary_data['m_w_child_detail'] & 256) == 256) ? '' : $ary_data['m_w_child_detail_descr']='';
		(($ary_data['m_patient_item'] & 1024) == 1024) ? '' : $ary_data['m_patient_item_descr']='';
		
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('hire');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('hire');
			$id = $this->input->post('hid_id');
		}

		// auth info
		$this->hire_factory_auth_doEdit($id);
		$this->hire_special_auth_doEdit($id);

		return 1;
	}

	public function hire_non_factory_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('hire');
		// auth info
		$this->hire_factory_auth_doDel($id);
		$this->hire_special_auth_doDel($id);

		return 1;
	}

	public function getHireSpecialId($hire_id) {
		$ary_cou = array();
		$this->db->select('*');
		$this->db->where('hire_id', $hire_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_hire_special');

		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	
}