<?php
/*
* File:			election_model.php
* Version:		-
* Last changed:	2016/08/08
* Purpose:		-
* Author:		Doris
* Copyright:	(C) 2016
* Product:		NFW
*/

class Election_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getElection() {
		$ary_ret = array();

		$this->db->select('c.*, cs.tw as school_id');
		$this->db->join('conf_school cs','cs.id=c.school_id','left');
		$query = $this->db->get('election c');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getElectionById($id) {
		$this->db->select('e.*, u.account as user_create_name, h.qty_require as qty_require, c.name_tw as client_id, em.name_tw as employer_id, h.client_addtw as client_addtw, h.work_limit as work_limit, h.descr2 as descr2, cd.tw as f_doc_id6_8, h.f_w_item as f_w_item, h.f_w_time_descr as f_w_time_descr, h.f_w_avg_salary as f_w_avg_salary, h.f_descr as f_descr, h.worker_kind as worker_kind, h.worker_type_major as worker_type_major, h.worker_type_minor_id as worker_type_minor_id, h.gender as gender, h.height as height, h.weight as weight, h.age_start as age_start, h.age_end as age_end, h.marriage as marriage, c.web as web');
		$this->db->join('user u','u.id=e.user_create','left');
		$this->db->join('hire h','h.id=e.hire_id','left');
		$this->db->join('client c','c.id=h.client_id','left');
		$this->db->join('employer em','em.id=h.employer_id','left');
		$this->db->join('conf_doc cd','cd.id=h.f_doc_id6_8','left');
		$this->db->where('e.id', $id);
		$query = $this->db->get('election e');

		return $query->row_array();		
	}

	public function election_doEdit() {
		if(strval($this->input->post('hid_id')) == '0') {
			$ary_data = array(
				'user_create'		=> $this->session->userdata('user_id'),
				'date_create'		=> date("Y-m-d"),
				'user_modify'		=> $this->session->userdata('user_id'),
				'date_modify'		=> date("Y-m-d"),
				'hire_id' 			=> $this->input->post('sel_hire_id'), 
				'education' 		=> $this->input->post('sel_education'),
				'maid_f_wish' 		=> $this->input->post('chk_maid_f_wish'),
				'maid_m_wish' 		=> $this->input->post('chk_maid_m_wish'),
				'labor_type' 		=> $this->input->post('sel_labor_type'),	//全部(1) 人力庫(2) 學員(3)
				'school_id' 		=> $this->input->post('sel_school_id'),
				'doc_id6_7' 		=> $this->input->post('sel_doc_id6_7'),
				'diet' 				=> $this->input->post('sel_diet'),
				'work_wish_kg'		=> $this->input->post('txt_work_wish_kg'),
				'eye_l'				=> $this->input->post('txt_eye_l'),
				'eye_r'				=> $this->input->post('txt_eye_r'),
				'hand'				=> $this->input->post('rdo_hand'),	
				'eye_color' 		=> $this->input->post('sel_eye_color'),
				'attendance'		=> $this->input->post('txt_attendance'),
				'election_qty'		=> $this->input->post('txt_election_qty'),
				'attendance_rate'	=> $this->input->post('txt_attendance_rate')						
			);

			$ary_maid_f_wish		= $this->input->post('chk_maid_f_wish');
			$sum1 =0;
			for($i=0; $i < count($ary_maid_f_wish); $i++) {
				$sum1		= $sum1 + $ary_maid_f_wish[$i];
			}

			$ary_maid_m_wish	= $this->input->post('chk_maid_m_wish');
			$sum2 =0;
			for($i=0; $i < count($ary_maid_m_wish); $i++) {
				$sum2		= $sum2 + $ary_maid_m_wish[$i];
			}

			$ary_auth	= $this->input->post('chk_auth');
			$sum3 =0;
			for($i=0; $i < count($ary_auth); $i++) {
				$sum3		= $sum3 + $ary_auth[$i];
			}		

			$ary_data['maid_f_wish'] = $sum1;
			$ary_data['maid_m_wish'] = $sum2;
			$ary_data['auth'] = $sum3;		

			$this->db->set($ary_data);
			$this->db->insert('election');
			$id = $this->db->insert_id();

			//save後產生參選人員
			$ary_laborId = array();

			$this->db->select('*');
			$this->db->where('id',$this->input->post('sel_hire_id'));
			$query = $this->db->get('hire');
			$ary_hire = $query->row_array();
			$age_start = $ary_hire['age_start'];
			$age_end = $ary_hire['age_end'];
			$this->db->select('id');
			$this->db->where('b_is_election', 1);			
			$this->db->where('a_worker_kind', $ary_hire['worker_kind']);
			$this->db->where('a_worker_type_major', $ary_hire['worker_type_major']);
			$this->db->where('a_worker_type_minor_id', $ary_hire['worker_type_minor_id']);
			$this->db->where('a_gender', $ary_hire['gender']);
			$this->db->where('a_height', $ary_hire['height']);
			$this->db->where('a_weight', $ary_hire['weight']);	
			$this->db->where("YEAR( FROM_DAYS(DATEDIFF(NOW() ,a_birthday))) BETWEEN $age_start AND $age_end");
			if ($ary_hire['marriage'] != '1') {
				$this->db->where('a_marriage', $ary_hire['marriage']);
			}
			if ($this->input->post('sel_education') != '1') {
				$this->db->where('a_education', $this->input->post('sel_education'));
			}
			$this->db->where('a_maid_f_wish', $sum1);
			$this->db->where('a_maid_m_wish', $sum2);
			//全部(1) 人力庫(2) 學員(3) c_date成為勞工的欄位,a_entry_date成為學員的欄位
			if ($this->input->post('sel_labor_type') == '1') {
				$this->db->where('c_date', '0000-00-00');
			} elseif ($this->input->post('sel_labor_type') == '2') {
				$this->db->where('a_entry_date', '0000-00-00');

			} elseif ($this->input->post('sel_labor_type') == '3') {
				$this->db->where('a_entry_date !=', '0000-00-00');
			}
			$this->db->where('a_school_id', $this->input->post('sel_school_id'));
			$this->db->where('a_doc_id6_7', $this->input->post('sel_doc_id6_7'));
			$this->db->where('a_diet', $this->input->post('sel_diet'));
			$this->db->where('a_work_wish_kg', $this->input->post('txt_work_wish_kg'));
			$this->db->where('a_eye_l', floatval($this->input->post('txt_eye_l')));
			$this->db->where('a_eye_r', floatval($this->input->post('txt_eye_r')));
			$this->db->where('a_hand', $this->input->post('rdo_hand'));
			$this->db->where('a_eye_color', $this->input->post('sel_eye_color'));
			$query = $this->db->get('labor');

			$ary_labor = $query->result_array();
			if(count($ary_labor) > 0) {
				foreach ($ary_labor as $key => $val) {			
					$ary_laborId[$key]['election_id'] = $id;
					$ary_laborId[$key]['labor_id'] = $ary_labor[$key]['id'];
				}
				$this->db->insert_batch('mapping_election_labor',$ary_laborId);
			}
		}

		return 1;
	}

	public function election_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('election');

		return 1;
	}

	public function getMappingElectionLaborByElectionID($election_id) {
		$ary_cou = array();			

		$this->db->select('e.*, l.a_name_tw as name_tw, l.a_name_en as name_en, l.a_name_local as name_local, l.a_birthday as birthday, l.a_entry_date as entry_date, l.a_work_expertise as work_expertise , m1.dateget as passport, m2.dateget as examination');
		$this->db->join('labor l','l.id=e.labor_id','left');
		$this->db->join('mapping_labor_auth m1','m1.labor_id=e.labor_id','left');
		$this->db->where('m1.type', '1');
		$this->db->join('mapping_labor_auth m2','m2.labor_id=e.labor_id','left');
		$this->db->where('m2.type', '2');
		$this->db->where('e.election_id', $election_id);
		$this->db->order_by("e.labor_id", "asc");
		$query = $this->db->get('mapping_election_labor e');
		$ary_cou = $query->result_array();
		return json_encode($ary_cou);
	}

//election_labor
	public function getElectionLabor() {
		$ary_ret = array();

		$this->db->select('el.*, e.hire_id as hire_id, h.client_id as client_id, h.employer_id as employer_id, l.a_name_tw as name_tw, l.a_name_en as name_en, l.a_worker_type_major as worker_type_major, l.a_worker_kind as worker_kind, l.a_worker_type_minor_id as worker_type_minor_id');
		$this->db->join('election e','e.id = el.election_id','left');
		$this->db->join('hire h','h.id = e.hire_id','left');
		$this->db->join('labor l','l.id = el.labor_id','left');
		$query = $this->db->get('mapping_election_labor el');
		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getElectionLaborByElection($election_id, $labor_id) {
		$this->db->select('el.*, h.id as hire_id, el.labor_id as labor_id, l.a_name_tw as name_tw, l.a_name_en as name_en');
		$this->db->join('election e','e.id = el.election_id','left');
		$this->db->join('hire h','h.id = e.hire_id','left');
		$this->db->join('labor l','l.id = el.labor_id','left');
		$this->db->where('election_id', $election_id);
		$this->db->where('labor_id', $labor_id);
		$query = $this->db->get('mapping_election_labor el');
		return $query->row_array();		
	}

	public function election_labor_doEdit() {
		$ary_data = array(
			'date'				=> $this->input->post('txt_date'),
			'type'				=> $this->input->post('sel_type'),
			'seq'				=> $this->input->post('txt_seq'),
			'not_hiring_date'	=> $this->input->post('txt_not_hiring_date'),
			'not_hiring_descr'	=> $this->input->post('txt_not_hiring_descr')
		);

		$ary_drive = $this->input->post('chk_drive');
		$sum1 =0;
		for($i=0; $i < count($ary_drive); $i++) {
			$sum1		= $sum1 + $ary_drive[$i];
		}
		$ary_data['drive'] = $sum1;
	
		$this->db->set($ary_data);
		$this->db->where('election_id', $this->input->post('hid_election_id'));
		$this->db->where('labor_id', $this->input->post('hid_labor_id'));
		$this->db->update('mapping_election_labor');

		return 1;
	}


	public function getLaborData($labor_id) {
		$ary_ret = array();

		$this->db->select('me.election_id, li.inbound_quota as li_quota, li.inbound_no as li_inbound_no, l.date_receive as l_date_receive, l.quota as l_quota, l.duration as l_duration, l.no as l_letter_no, h.arrspot as h_arrspot, h.letter_id2 as h_letter_id2, h.letter_id as h_letter_id, h.service_id as h_service_id, h.sales_id as h_sales_id, h.gender as h_gender, h.qty_require as h_qty_require, h.work_limit as h_work_limit, h.worker_kind as h_worker_kind, h.worker_kind as h_worker_kind, h.employer_id as h_employer_id, h.client_id as h_client_id, h.date_create as h_date_create, h.id as h_id, me.labor_id, me.date as date, e.date_create as date_create ,q.id as quote_id ,q.descr as quote_descr');
		$this->db->join('election e','e.id=me.election_id','left');
		$this->db->join('quote q','q.hire_id=e.hire_id','left');
		$this->db->join('hire h','h.id=e.hire_id','left');
		$this->db->join('letter l','l.id=h.letter_id','left');
		$this->db->join('mapping_letter_inbound li','li.id=h.letter_id2','left');
		$this->db->where('me.labor_id',$labor_id);
		$this->db->order_by("me.election_id", "desc");		
		$query = $this->db->get('mapping_election_labor me');

		if ($query->num_rows() > 0) {
			$row = $query->row(); 
			$ary_ret['quote_id'] 		= $row->quote_id;
			$ary_ret['quote_descr']		= $row->quote_descr;
			$ary_ret['date_create']		= $row->date_create;
			$ary_ret['me_date'] 		= $row->date;
			$ary_ret['h_id']			= $row->h_id;
			$ary_ret['h_date_create'] 	= $row->h_date_create;
			$ary_ret['h_client_id']		= $row->h_client_id;
			$ary_ret['h_employer_id']	= $row->h_employer_id;
			$ary_ret['h_worker_kind']	= $row->h_worker_kind;
			$ary_ret['h_work_limit']	= $row->h_work_limit;
			$ary_ret['h_qty_require']	= $row->h_qty_require;
			$ary_ret['h_gender']		= $row->h_gender;			
			$ary_ret['h_sales_id']		= $row->h_sales_id;
			$ary_ret['h_service_id']	= $row->h_service_id;
			$ary_ret['l_letter_no']		= $row->l_letter_no;
			$ary_ret['l_quota']			= $row->l_quota;
			$ary_ret['l_duration']		= $row->l_duration;
			$ary_ret['l_date_receive']	= $row->l_date_receive;
			$ary_ret['li_inbound_no']	= $row->li_inbound_no;
			$ary_ret['li_quota']		= $row->li_quota;
			$ary_ret['h_arrspot']		= $row->h_arrspot;
		}
		return $ary_ret;
	}
}