<?php
/*
* File:			labor_model.php
* Version:		-
* Last changed:	2016/06/13
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Labor_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getLaborBySearch() {
		$ary_ret = array();

		$this->db->select('id, a_name_en');
		$this->db->like('a_passport', $this->input->post('keyword'), 'after');
		$query = $this->db->get('labor');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['a_name_en'];
			}
		}

		return $ary_ret;		
	}

	public function getLabor($output=0,$where) {
		$ary_ret = array();

		$this->db->select('l.* ,c.tw as country_tw');	
		$this->db->join('conf_country c','c.id=l.a_country_id','left');

		//學員 a_entry_date(入學日期) 有日期
		//勞工 c_date(轉為勞工) 有日期 用455轉
		if ($where == '411') {
			$this->db->where('a_entry_date','0000-00-00');
		} elseif ($where == '412'){
			$this->db->where('a_entry_date !=', '0000-00-00');
			$this->db->where('c_date', '0000-00-00');
		} elseif ($where == '241'){
			$this->db->where('c_date !=', '0000-00-00');
		}
		$query = $this->db->get('labor l');
		
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

	public function getLaborById($id) {
		$this->db->select('l.*,u.tw as user_create_name');
		$this->db->join('user u','u.id=l.user_create','left');
		$this->db->where('l.id', $id);
		$query = $this->db->get('labor l');

		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			return $query->row_array();
		}
	}

	public function labor_doEdit() {
		$ary_data = array(
			'c_date'					=> $this->input->post('txt_c_date'),
			'a_worker_kind'				=> $this->input->post('sel_worker_kind'),
			'a_worker_type_major' 		=> $this->input->post('sel_worker_type_major'),
			'a_worker_type_minor_id' 	=> $this->input->post('sel_worker_type_minor'),
			'a_name_local' 				=> $this->input->post('txt_a_name_local'),
			'a_name_tw' 				=> $this->input->post('txt_a_name_tw'),
			'a_name_en' 				=> $this->input->post('txt_a_name_en'),
			'a_tel' 					=> $this->input->post('txt_a_tel'),
			'a_site_get' 				=> $this->input->post('txt_a_site_get'),
			'a_passport' 				=> $this->input->post('txt_a_passport'),
			'a_birthplace' 				=> $this->input->post('txt_a_birthplace'),
			'a_country_id' 				=> $this->input->post('sel_country'),
			'a_school_id' 				=> $this->input->post('sel_school'),
			'a_file_path' 				=> $this->input->post('hid_afilepath'),
			'a_idno' 					=> $this->input->post('txt_a_idno'),
			'a_date_get' 				=> $this->input->post('txt_a_date_get'),
			'a_emp_id' 					=> $this->input->post('sel_emp_id'),
			'a_referrals_id' 			=> $this->input->post('txt_a_referrals_id'),
			'a_url' 					=> $this->input->post('txt_a_url'),
			'a_file_path2' 				=> $this->input->post('hid_afilepath2'),
			'a_file_path3' 				=> $this->input->post('hid_afilepath3'),
			'a_file_path4' 				=> $this->input->post('hid_afilepath4'),
			'a_file_path5' 				=> $this->input->post('hid_afilepath5'),
			'a_file_path6' 				=> $this->input->post('hid_afilepath6'),
			'a_file_path7' 				=> $this->input->post('hid_afilepath7'),
			'a_file_path8' 				=> $this->input->post('hid_afilepath8'),
			'a_file_path9' 				=> $this->input->post('hid_afilepath9'),
			'a_registration_date' 		=> $this->input->post('txt_a_registration_date'),
			'a_reasonschool_date' 		=> $this->input->post('txt_a_reasonschool_date'),
			'a_interview_emp_id' 		=> $this->input->post('sel_emp_id'),

			'a_entry_date' 				=> $this->input->post('txt_a_entry_date'),
			'a_reasonschool_id' 		=> $this->input->post('sel_reasonschool_id'),
			'a_gender' 					=> $this->input->post('rdo_a_gender'),
			'a_residence_address' 		=> $this->input->post('txt_a_residence_address'),
			'a_residential_address' 	=> $this->input->post('txt_a_residential_address'),
			'a_height' 					=> $this->input->post('txt_a_height'),
			'a_weight' 					=> $this->input->post('txt_a_weight'),
			'a_hand' 					=> $this->input->post('rdo_a_hand'),
			'a_hand_descr' 				=> $this->input->post('txt_a_hand_descr'),
			'a_doc_id6_3' 				=> $this->input->post('sel_doc_id6_3'),
			'a_doc_id6_7' 				=> $this->input->post('sel_doc_id6_7'),
			'a_diet' 					=> $this->input->post('sel_diet'),	
			'a_language' 				=> $this->input->post('hid_language'),
			'a_birthday' 				=> $this->input->post('txt_a_birthday'),
			'a_residence_tel' 			=> $this->input->post('txt_a_residence_tel'),
			'a_residential_tel' 		=> $this->input->post('txt_a_residential_tel'),
			'a_eye_l' 					=> $this->input->post('txt_a_eye_l'),
			'a_eye_r' 					=> $this->input->post('txt_a_eye_r'),
			'a_eye_color' 				=> $this->input->post('sel_eye_color'),

			'a_marriage' 				=> $this->input->post('sel_marriage'),
			'a_marriage_date' 			=> $this->input->post('txt_a_marriage_date'),
			'a_divorce_date' 			=> $this->input->post('txt_a_divorce_date'),
			'a_life' 					=> $this->input->post('hid_life'),
			'a_life_qty' 				=> $this->input->post('hid_life_qty'),
			'a_life_child' 				=> $this->input->post('hid_life_child'),

			'a_education' 				=> $this->input->post('sel_education'),
			'a_study_start' 			=> $this->input->post('txt_a_study_start'),
			'a_study_end' 				=> $this->input->post('txt_a_study_end'),
			'a_graduated_school' 		=> $this->input->post('txt_a_graduated_school'),
			'a_graduated_department'	=> $this->input->post('txt_a_graduated_department'),
//			'a_work_expertise' 			=> $this->input->post('txt_a_work_expertise'),
			'a_license' 				=> $this->input->post('hid_a_license'),

			'a_work_wish_kg'			=> $this->input->post('txt_a_work_wish_kg'),
			'a_work_wish_descr'			=> $this->input->post('txt_a_work_wish_descr'),
			'b_is_election'				=> $this->input->post('rdo_b_is_election'),
		
			'b_letter_type'				=> $this->input->post('sel_letter_type'),
			'b_letter_id'				=> $this->input->post('sel_letter_id'),
			'b_letter_inbound_id'		=> $this->input->post('sel_letter_inbound_id'),
			'b_schedule_emp_id'			=> $this->input->post('sel_schedule_emp_id'),
			'b_arrspot'					=> $this->input->post('sel_arrspot'),
			'b_license_client_tw'		=> $this->input->post('txt_b_license_client_tw'),
			'b_license_client_en'		=> $this->input->post('txt_b_license_client_en'),
			'b_license_foreign_tw'		=> $this->input->post('txt_b_license_foreign_tw'),
			'b_license_foreign_en'		=> $this->input->post('txt_b_license_foreign_en'),

			'c_is_black' 				=> $this->input->post('chk_c_is_black'), 
			'c_black_descr'				=> $this->input->post('txt_c_black_descr'),
			'c_tel_tw'					=> $this->input->post('txt_c_tel_tw'),
			'c_tel_tw2'					=> $this->input->post('txt_c_tel_tw2'),
			'c_tel_tw3'					=> $this->input->post('txt_c_tel_tw3'),
			'c_outbound_date'			=> $this->input->post('txt_c_outbound_date'),
			'c_outbound_descr'			=> $this->input->post('txt_c_outbound_descr'),
			'c_outbound_file_path'		=> $this->input->post('hid_filepath'),
			'c_run_date'				=> $this->input->post('txt_c_run_date'),
			'c_run_descr'				=> $this->input->post('txt_c_run_descr'),
			'c_run_letterno'			=> $this->input->post('txt_c_run_letterno'),
			'c_run_getdate'				=> $this->input->post('txt_c_run_getdate'),
			'c_run_sendback'			=> $this->input->post('txt_c_run_sendback'),
			'c_run_file_path'			=> $this->input->post('hid_filepath2'),

			'user_create'				=> $this->session->userdata('user_id'),
			'date_create'				=> date("Y-m-d"),
			'user_modify'				=> $this->session->userdata('user_id'),
			'date_modify'				=> date("Y-m-d")
		);

		$ary_a_maid_f_experience	= $this->input->post('chk_a_maid_f_experience');
		$sum =0;
		for($i=0; $i < count($ary_a_maid_f_experience); $i++) {
			$sum		= $sum + $ary_a_maid_f_experience[$i];
		}

		$ary_a_maid_f_wish		= $this->input->post('chk_a_maid_f_wish');
		$sum1 =0;
		for($i=0; $i < count($ary_a_maid_f_wish); $i++) {
			$sum1		= $sum1 + $ary_a_maid_f_wish[$i];
		}

		$ary_a_maid_m_experience	= $this->input->post('chk_a_maid_m_experience');
		$sum2 =0;
		for($i=0; $i < count($ary_a_maid_m_experience); $i++) {
			$sum2		= $sum2 + $ary_a_maid_m_experience[$i];
		}

		$ary_a_maid_m_wish	= $this->input->post('chk_a_maid_m_wish');
		$sum3 =0;
		for($i=0; $i < count($ary_a_maid_m_wish); $i++) {
			$sum3		= $sum3 + $ary_a_maid_m_wish[$i];
		}

		$ary_a_work_wish	= $this->input->post('chk_a_work_wish');
		$sum4 =0;
		for($i=0; $i < count($ary_a_work_wish); $i++) {
			$sum4		= $sum4 + $ary_a_work_wish[$i];
		}

		$ary_a_cooking	= $this->input->post('chk_a_cooking');
		$sum5 =0;
		for($i=0; $i < count($ary_a_cooking); $i++) {
			$sum5		= $sum5 + $ary_a_cooking[$i];
		}

		$ary_data['a_maid_f_experience'] = $sum;
		$ary_data['a_maid_f_wish'] = $sum1;
		$ary_data['a_maid_m_experience'] = $sum2;
		$ary_data['a_maid_m_wish'] = $sum3;
		$ary_data['a_work_wish'] = $sum4;
		$ary_data['a_cooking'] = $sum5;

		if(strval($this->input->post('hid_id')) == '0') {
			unset($ary_data['b_license_client_tw']);
			unset($ary_data['b_license_client_en']);
			unset($ary_data['b_license_foreign_tw']);
			unset($ary_data['b_license_foreign_en']);
			$this->db->set($ary_data);
			$this->db->insert('labor');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			unset($ary_data['c_date']);	//由4-5-5入境產生值,create寫入'0000-00-00'
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('labor');
			$id = $this->input->post('hid_id');
		}

		//info
		$this->laborOutput_doEdit($id);
		$this->laborRun_doEdit($id);
		$this->laborAuth_doEdit($id);  //mapping_labor_auth
		$this->laborLicense_doEdit($id);
		$this->laborFactory_doEdit($id);
		$this->laborMaid_doEdit($id);
		$this->laborContact1_doEdit($id,1);
		$this->laborContact2_doEdit($id,2);
		$this->laborContact3_doEdit($id,3);
		$this->laborStaySchool1_doEdit($id,1);
		$this->laborStaySchool2_doEdit($id,2);
		$this->laborLearn_doEdit($id);
		$this->laborCase_doEdit($id);
		$this->laborInbound_doEdit($id);

		return 1;
	}

	public function labor_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('labor');
		//info
		$this->laborOutput_doDel($id);
		$this->laborRun_doDel($id);
		$this->laborAuth_doDel($id);
		$this->laborLicense_doDel($id);		
		$this->laborFactory_doDel($id);	
		$this->laborMaid_doDel($id);
		$this->laborContact_doDel($id);
		$this->laborStaySchool_doDel($id);
		$this->laborLearn_doDel($id);
		$this->laborCase_doDel($id);
		$this->laborInbound_doDel($id);

		return 1;
	}	

	public function laborOutput_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_output', array('labor_id' => $labor_id)); 

		$ary_row_laborOutput		= $this->input->post('row_laborOutput');
		$ary_date_laborOutput		= $this->input->post('date_laborOutput');
		$ary_client_laborOutput		= $this->input->post('client_laborOutput');
		$ary_tel_c_laborOutput		= $this->input->post('tel_c_laborOutput');
		$ary_employer_laborOutput	= $this->input->post('employer_laborOutput');
		$ary_tel_e_laborOutput		= $this->input->post('tel_e_laborOutput');
		$ary_descr_laborOutput		= $this->input->post('descr_laborOutput');

		for($i=0; $i < count($ary_row_laborOutput); $i++) {
			$ary_data[$i]['row']			= $ary_row_laborOutput[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['date']			= $ary_date_laborOutput[$i];
			$ary_data[$i]['client']			= $ary_client_laborOutput[$i];
			$ary_data[$i]['tel_c']			= $ary_tel_c_laborOutput[$i];
			$ary_data[$i]['employer']		= $ary_employer_laborOutput[$i];
			$ary_data[$i]['tel_e']			= $ary_tel_e_laborOutput[$i];
			$ary_data[$i]['descr']			= $ary_descr_laborOutput[$i];
		}

		$this->db->insert_batch('mapping_labor_output',$ary_data);

		return 1;
	}

	public function laborOutput_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_output');

		return 1;
	}

	public function laborRun_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_run', array('labor_id' => $labor_id)); 

		$ary_row_laborRun			= $this->input->post('row_laborRun');
		$ary_date_laborRun			= $this->input->post('date_laborRun');
		$ary_time_laborRun			= $this->input->post('time_laborRun');
		$ary_contact_laborRun		= $this->input->post('contact_laborRun');
		$ary_contact_descr_laborRun	= $this->input->post('contact_descr_laborRun');
		$ary_descr_laborRun			= $this->input->post('descr_laborRun');
		$ary_descr_laborOutput		= $this->input->post('descr_laborOutput');

		for($i=0; $i < count($ary_row_laborRun); $i++) {
			$ary_data[$i]['row']			= $ary_row_laborRun[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['date']			= $ary_date_laborRun[$i];
			$ary_data[$i]['time']			= $ary_time_laborRun[$i];
			$ary_data[$i]['contact']		= $ary_contact_laborRun[$i];
			$ary_data[$i]['contact_descr']	= $ary_contact_descr_laborRun[$i];
			$ary_data[$i]['descr']			= $ary_descr_laborRun[$i];
		}

		$this->db->insert_batch('mapping_labor_run',$ary_data);

		return 1;
	}

	public function laborRun_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_run');

		return 1;
	}

	public function laborAuth_doEdit($labor_id) {
		$ary_data = array();
		$prefix = 'llaa';
		$this->db->delete('mapping_labor_auth', array('labor_id' => $labor_id)); 

		$ary_all_post = $this->input->post();
		if(count($ary_all_post) > 0) {
			foreach ($ary_all_post as $key => $val) {
				$ary_tmp = explode('_', $key);
				if(count($ary_tmp) != 3) continue;

				$x			= $ary_tmp[0];
				$col_name	= $ary_tmp[1];
				$type 		= $ary_tmp[2];

				if($x == $prefix) {
					$ary_data[$type]['labor_id'] = $labor_id;
					$ary_data[$type]['type'] = $type;
					$ary_data[$type][$col_name] = $val;
				}		
			}
			foreach ($ary_data as $key => $value) {
				if(count($value) != 6) {
					if(!isset($value['dateget'])) $ary_data[$key]['dateget'] = '';
					if(!isset($value['siteget'])) $ary_data[$key]['siteget'] = '';
					if(!isset($value['dateexpire'])) $ary_data[$key]['dateexpire'] = '';
					if(!isset($value['filepath'])) $ary_data[$key]['filepath'] = '';
				}
			}			
		}

		$this->db->insert_batch('mapping_labor_auth',$ary_data);

		return 1;
	}

	public function laborAuth_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_auth');

		return 1;
	}

	public function laborLicense_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_license', array('labor_id' => $labor_id)); 
		$ary_row		= $this->input->post('row_laborLicense');
		$ary_date		= $this->input->post('date_laborLicense');
		$ary_emp_id		= $this->input->post('emp_id_laborLicense');
//		$ary_file_path	= $this->input->post('file_path_laborLicense');
		$ary_descr		= $this->input->post('descr_laborLicense');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['labor_id']	= $labor_id;
			$ary_data[$i]['date']		= $ary_date[$i];
			$ary_data[$i]['emp_id']		= $ary_emp_id[$i];
//			$ary_data[$i]['file_path']	= $ary_file_path[$i];
			$ary_data[$i]['descr']		= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_labor_license',$ary_data);

		return 1;
	}

	public function laborLicense_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_license');

		return 1;
	}

	public function laborFactory_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_factory', array('labor_id' => $labor_id));

		$ary_row			= $this->input->post('row_laborFactory');
		$ary_country_id		= $this->input->post('sel_country_laborFactory');
		$ary_company_name	= $this->input->post('company_name_laborFactory');
		$ary_period			= $this->input->post('period_laborFactory');
		$ary_year			= $this->input->post('year_laborFactory');
		$ary_detail			= $this->input->post('detail_laborFactory');
		$ary_product		= $this->input->post('product_laborFactory');
		$ary_salary			= $this->input->post('salary_laborFactory');
		$ary_jobtitle		= $this->input->post('jobtitle_laborFactory');
		$ary_descr			= $this->input->post('descr_laborFactory');
		
		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['country_id']		= $ary_country_id[$i];		
			$ary_data[$i]['company_name']	= $ary_company_name[$i];
			$ary_data[$i]['period']			= $ary_period[$i];
			$ary_data[$i]['year']			= $ary_year[$i];
			$ary_data[$i]['detail']			= $ary_detail[$i];
			$ary_data[$i]['product']		= $ary_product[$i];
			$ary_data[$i]['salary']			= $ary_salary[$i];
			$ary_data[$i]['jobtitle']		= $ary_jobtitle[$i];
			$ary_data[$i]['descr']			= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_labor_factory',$ary_data);

		return 1;
	}

	public function laborFactory_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_factory');

		return 1;
	}

	public function laborMaid_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_maid', array('labor_id' => $labor_id));

		$ary_row		= $this->input->post('row_laborMaid');
		$ary_country_id	= $this->input->post('sel_country_laborMaid');
		$ary_type		= $this->input->post('type_laborMaid');
		$ary_period		= $this->input->post('period_laborMaid');
		$ary_year		= $this->input->post('year_laborMaid');
		$ary_gender		= $this->input->post('gender_laborMaid');
		$ary_age		= $this->input->post('age_laborMaid');
		$ary_detail		= $this->input->post('detail_laborMaid');
		$ary_descr		= $this->input->post('descr_laborMaid');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;			
			$ary_data[$i]['country_id']		= $ary_country_id[$i];
			$ary_data[$i]['type']			= $ary_type[$i];
			$ary_data[$i]['period']			= $ary_period[$i];			
			$ary_data[$i]['year']			= $ary_year[$i];
			$ary_data[$i]['gender']			= $ary_gender[$i];
			$ary_data[$i]['age']			= $ary_age[$i];
			$ary_data[$i]['detail']			= $ary_detail[$i];
			$ary_data[$i]['descr']			= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_labor_maid',$ary_data);

		return 1;
	}

	public function laborMaid_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_maid');

		return 1;
	}

	public function laborContact1_doEdit($labor_id,$type) {
		$ary_data = array();
		$this->db->delete('mapping_labor_contact', array('labor_id' => $labor_id ,'type' => $type));
		$ary_row			= $this->input->post('row_laborContact1');
		$ary_referrals_id	= $this->input->post('sel_referrals_id_laborContact1');
		$ary_name			= $this->input->post('name_laborContact1');
		$ary_tel			= $this->input->post('tel_laborContact1');
		$ary_address		= $this->input->post('address_laborContact1');
		$ary_descr			= $this->input->post('descr_laborContact1');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['type']			= $type;
			$ary_data[$i]['referrals_id']	= $ary_referrals_id[$i];
			$ary_data[$i]['name']			= $ary_name[$i];
			$ary_data[$i]['tel']			= $ary_tel[$i];
			$ary_data[$i]['address']		= $ary_address[$i];
			$ary_data[$i]['descr']			= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_labor_contact',$ary_data);

		return 1;
	}

	public function laborContact2_doEdit($labor_id,$type) {
		$ary_data = array();
		$this->db->delete('mapping_labor_contact', array('labor_id' => $labor_id ,'type' => $type));

		$ary_row			= $this->input->post('row_laborContact2');
		$ary_friend			= $this->input->post('sel_friend_laborContact2');
		$ary_name			= $this->input->post('name_laborContact2');
		$ary_tel			= $this->input->post('tel_laborContact2');
		$ary_address		= $this->input->post('address_laborContact2');
		$ary_factory_name	= $this->input->post('factory_name_laborContact2');
		$ary_descr			= $this->input->post('descr_laborContact2');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['type']			= $type;
			$ary_data[$i]['friend']			= $ary_friend[$i];
			$ary_data[$i]['name']			= $ary_name[$i];
			$ary_data[$i]['tel']			= $ary_tel[$i];
			$ary_data[$i]['address']		= $ary_address[$i];
			$ary_data[$i]['factory_name']	= $ary_factory_name[$i];
			$ary_data[$i]['descr']			= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_labor_contact',$ary_data);

		return 1;
	}

	public function laborContact3_doEdit($labor_id,$type) {
		$ary_data = array();
		$this->db->delete('mapping_labor_contact', array('labor_id' => $labor_id ,'type' => $type));

		$ary_row			= $this->input->post('row_laborContact3');
		$ary_relationship	= $this->input->post('relationship_laborContact3');
		$ary_name			= $this->input->post('name_laborContact3');
		$ary_tel			= $this->input->post('tel_laborContact3');
		$ary_address		= $this->input->post('address_laborContact3');
		$ary_descr			= $this->input->post('descr_laborContact3');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['type']			= $type;
			$ary_data[$i]['relationship']	= $ary_relationship[$i];
			$ary_data[$i]['name']			= $ary_name[$i];
			$ary_data[$i]['tel']			= $ary_tel[$i];
			$ary_data[$i]['address']		= $ary_address[$i];
			$ary_data[$i]['descr']			= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_labor_contact',$ary_data);

		return 1;
	}

	public function laborContact_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_contact');

		return 1;
	}

	public function laborStaySchool1_doEdit($labor_id,$type) {
		$ary_data = array();
		$this->db->delete('mapping_labor_stay_school', array('labor_id' => $labor_id ,'type' => $type));

		$ary_row			= $this->input->post('row_laborStaySchool1');
		$ary_date_start		= $this->input->post('date_start_laborStaySchool1');
		$ary_date_end		= $this->input->post('date_end_laborStaySchool1');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['type']			= $type;
			$ary_data[$i]['date_start']		= $ary_date_start[$i];
			$ary_data[$i]['date_end']		= $ary_date_end[$i];
		}

		$this->db->insert_batch('mapping_labor_stay_school',$ary_data);

		return 1;
	}

	public function laborStaySchool2_doEdit($labor_id,$type) {
		$ary_data = array();
		$this->db->delete('mapping_labor_stay_school', array('labor_id' => $labor_id ,'type' => $type));

		$ary_row			= $this->input->post('row_laborStaySchool2');
		$ary_schoolclass_id	= $this->input->post('sel_schoolclass_id_laborStaySchool2');
		$ary_date_start		= $this->input->post('date_start_laborStaySchool2');
		$ary_date_end		= $this->input->post('date_end_laborStaySchool2');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['type']			= $type;
			$ary_data[$i]['schoolclass_id']	= $ary_schoolclass_id[$i];
			$ary_data[$i]['date_start']		= $ary_date_start[$i];
			$ary_data[$i]['date_end']		= $ary_date_end[$i];
		}

		$this->db->insert_batch('mapping_labor_stay_school',$ary_data);

		return 1;
	}

	public function laborStaySchool_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_stay_school');

		return 1;
	}	

	public function laborLearn_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_learn', array('labor_id' => $labor_id));

		$ary_row		= $this->input->post('row_laborLearn');
		$ary_type		= $this->input->post('sel_typeData_laborLearn');
		$ary_date		= $this->input->post('date_laborLearn');
		$ary_emp_id		= $this->input->post('sel_emp_id_laborLearn');
		$ary_descr		= $this->input->post('descr_laborLearn');
		$ary_file_path	= $this->input->post('file_path_laborLearn');		

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['labor_id']	= $labor_id;
			$ary_data[$i]['type']		= $ary_type[$i];
			$ary_data[$i]['date']		= $ary_date[$i];
			$ary_data[$i]['emp_id']		= $ary_emp_id[$i];
			$ary_data[$i]['descr']		= $ary_descr[$i];
			$ary_data[$i]['file_path']	= $ary_file_path[$i];
		}

		$this->db->insert_batch('mapping_labor_learn',$ary_data);

		return 1;
	}

	public function laborLearn_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_learn');

		return 1;
	}

	public function laborCase_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_case', array('labor_id' => $labor_id));

		$ary_row		= $this->input->post('row_laborCase');
		$ary_date		= $this->input->post('date_laborCase');
		$ary_descr		= $this->input->post('descr_laborCase');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['labor_id']	= $labor_id;
			$ary_data[$i]['date']		= $ary_date[$i];
			$ary_data[$i]['descr']		= $ary_descr[$i];
		}

		$this->db->insert_batch('mapping_labor_case',$ary_data);

		return 1;
	}

	public function laborCase_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_case');

		return 1;
	}

	public function laborInbound_doEdit($labor_id) {
		$ary_data = array();
		$this->db->delete('mapping_labor_inbound', array('labor_id' => $labor_id));

		$ary_row			= $this->input->post('row_laborInbound');
		$ary_date			= $this->input->post('date_laborInbound');
		$ary_date_ticket	= $this->input->post('date_laborInbound');
		$ary_flight_id		= $this->input->post('sel_flight_id_laborInbound');
		$ary_flight_id2		= $this->input->post('sel_flight_id2_laborInbound');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['labor_id']		= $labor_id;
			$ary_data[$i]['date']			= $ary_date[$i];
			$ary_data[$i]['date_ticket']	= $ary_date_ticket[$i];
			$ary_data[$i]['flight_id']		= $ary_flight_id[$i];
			$ary_data[$i]['flight_id2']		= $ary_flight_id2[$i];
		}

		$this->db->insert_batch('mapping_labor_inbound',$ary_data);

		return 1;
	}

	public function laborInbound_doDel($id) {
		$this->db->where('labor_id', $id);
		$this->db->delete('mapping_labor_inbound');

		return 1;
	}	

	public function getlaborOutputByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_output');
		
		return $query->result_array();
	}
	
	public function getlaborRunByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_run');
		
		return $query->result_array();
	}

	public function getLaborLicenseByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_license');
		
		return $query->result_array();
	}

	public function getLaborFactoryByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_factory');
		
		return $query->result_array();
	}

	public function getLaborMaidByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_maid');
		
		return $query->result_array();
	}

	public function getLaborContactByLaborId($labor_id,$type) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->where('type', $type);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_contact');
		
		return $query->result_array();
	}		

	public function getLaborAuthByLaborId($labor_id) {
		$ary_ret = array();

		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('type','asc');
		$query = $this->db->get('mapping_labor_auth');

		$ary_cou = $query->result_array();
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['type']]['dateget'] = $val['dateget'];
				$ary_ret[$val['type']]['siteget'] = $val['siteget'];
				$ary_ret[$val['type']]['dateexpire'] = $val['dateexpire'];
				$ary_ret[$val['type']]['filepath'] = $val['filepath'];
			}
		}
		return $ary_ret;
	}

	public function getLaborStaySchoolByLaborId($labor_id,$type) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->where('type', $type);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_stay_school');
		
		return $query->result_array();
	}

	public function getLaborLearnByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_learn');
		
		return $query->result_array();
	}	

	public function getLaborCaseByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_case');
		
		return $query->result_array();
	}

	public function getLaborInboundByLaborId($labor_id) {
		$this->db->select('*');
		$this->db->where('labor_id', $labor_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_labor_inbound');	
		
		return $query->result_array();
	}	

	public function getLaborIdBySearch($labor = 0) {
		$ary_ret = array();
		$this->db->select('id, a_name_tw, a_name_en, a_passport');
		$this->db->like('a_name_tw', $this->input->post('keyword'), 'after');
		$this->db->or_like('a_name_en', $this->input->post('keyword'), 'after');
		$this->db->or_like('a_passport', $this->input->post('keyword'), 'after');
		if ($labor == '1') { //人力
			$this->db->where('a_entry_date','0000-00-00');
		} elseif ($labor == '2') { //學員
			$this->db->where('a_entry_date !=', '0000-00-00');
			$this->db->where('c_date', '0000-00-00');
		}
		$query = $this->db->get('labor');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['id'];
			}
		}
		return $ary_ret;
	}

	public function getLaborId($labor_id) {
		$ary_ret = array();

		$this->db->select('l.*, cs.tw_short as tw_short, max(li.date) as li_date, c.name_tw as c_name_tw, e.name_tw as e_name_tw,q.id as quote_id,q.descr as quote_descr');
		$this->db->join('conf_school cs','cs.id=l.a_school_id','left');
		$this->db->join('mapping_labor_inbound li','li.labor_id=l.id','left');
		$this->db->join('fee_outbound f','f.labor_id=l.id','left');
		$this->db->join('hire h','f.hire_id=h.id','left');
		$this->db->join('client c','h.client_id=c.id','left');
		$this->db->join('employer e','h.employer_id=e.id','left');
		$this->db->join('quote q','q.hire_id=h.id','left');
		$this->db->where('l.id',$labor_id);
		$query = $this->db->get('labor l');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[0] = $val['id'];
				$ary_ret[1] = $val['tw_short'];
				$ary_ret[2] = $val['b_license_foreign_tw'];
				$ary_ret[3] = $val['c_outbound_date'];
				$ary_ret[4] = $val['c_outbound_descr'];
				$ary_ret[5] = $val['li_date'];
				$ary_ret[6] = $val['c_run_sendback'];
				$ary_ret[7] = $val['c_run_date'];
				$ary_ret[8] = $val['a_name_tw'];
				$ary_ret[9] = $val['a_birthday'];
				$ary_ret[10] = $val['c_name_tw'];
				$ary_ret[11] = $val['e_name_tw'];
				$ary_ret[12] = $val['quote_id'];
				$ary_ret[13] = $val['quote_descr'];
				
			}
		}
		return $ary_ret;

	}
}