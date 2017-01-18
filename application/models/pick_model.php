
<?php
/*
* File:			pick_model.php
* Version:		-
* Last changed:	2016/06/02
* Purpose:		-
* Author:		Irene
* Copyright:	(C) 2016
* Product:		NFW
*/

class Pick_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getPick($output=0,$is_factory=0) {
		$ary_ret = array();

		$this->db->select('p.*, cy.tw as tw_c, c.name_tw as client_name_tw, e.name_tw as employer_name_tw');
		
		$this->db->join('hire h','p.hire_id=h.id','left');
		$this->db->join('client c','h.client_id=c.id','left');
		$this->db->join('employer e','h.employer_id=e.id','left');
		$this->db->join('conf_country cy','cy.id=h.country_id','left');
		$this->db->order_by("p.id","asc");
		$query = $this->db->get('pick p');
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

	public function getPickById($id) {
		$this->db->select('p.*, cy.tw as tw_c,u.account as user_create_name, c.name_tw as c_name_tw, e.name_tw as e_name_tw');
		$this->db->join('user u','u.id=p.user_create','left');
		$this->db->join('hire h','p.hire_id=h.id','left');
		$this->db->join('client c','h.client_id=c.id','left');
		$this->db->join('employer e','h.employer_id=e.id','left');
		$this->db->join('conf_country cy','cy.id=h.country_id','left');
		$this->db->where('p.id', $id);
		$query = $this->db->get('pick p');
		
		return $query->row_array();
	}

	public function pick_doEdit() {
		$ary_data = array(
			'hire_id' 			=> $this->input->post('sel_hire_id'),
			'school_id' 		=> $this->input->post('sel_school_id'),
			'date_dep' 			=> $this->input->post('txt_date_dep'),
			'date_arr' 			=> $this->input->post('txt_date_arr'),
			'localmandescr'		=> $this->input->post('txt_localmandescr'),
			'descr'				=> $this->input->post('txt_descr'),
			'fee_descr'			=> $this->input->post('txt_fee_descr'),
			'fee_descr2'		=> $this->input->post('txt_fee_descr2'),
			'user_create'		=> $this->session->userdata('user_id'),
			'date_create'		=> date("Y-m-d"),
			'user_modify'		=> $this->session->userdata('user_id'),
			'date_modify'		=> date("Y-m-d")
		);
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('pick');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('pick');
			$id = $this->input->post('hid_id');
		}

		// auth info
		$this->pickLocalman_doEdit($id);
		$this->pickPickArr_doEdit($id);
		$this->pickPickHotel_doEdit($id);
		$this->pickContact_doEdit($id);		
		$this->pickPickStroke_doEdit($id);
		$this->pickPickFee_doEdit($id);

		return 1;
	}

	public function pick_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('pick');
		// auth info
		$this->pickLocalman_doDel($id);
		$this->pickPickArr_doDel($id);
		$this->pickPickHotel_doDel($id);
		$this->pickContact_doDel($id);		
		$this->pickPickStroke_doDel($id);
		$this->pickPickFee_doDel($id);

		return 1;
	}

	public function getPickLocalmanByPickId($pick_id) {
		$this->db->select('*');
		$this->db->where('pick_id', $pick_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_pick_localman');
		
		return $query->result_array();		
	}

	public function pickLocalman_doEdit($pick_id) {
		$ary_data = array();
		$this->db->delete('mapping_pick_localman', array('pick_id' => $pick_id)); 

		$ary_row						= $this->input->post('row_PickLocalman');
		$ary_localman_PickLocalman		= $this->input->post('localman_PickLocalman');
		$ary_localman_tel_PickLocalman	= $this->input->post('localman_tel_PickLocalman');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']			= $ary_row[$i];
			$ary_data[$i]['pick_id']		= $pick_id;
			$ary_data[$i]['localman']		= $ary_localman_PickLocalman[$i];
			$ary_data[$i]['localman_tel']	= $ary_localman_tel_PickLocalman[$i];
		}

		$this->db->insert_batch('mapping_pick_localman',$ary_data);

		return 1;
	}

	public function pickLocalman_doDel($id) {
		$this->db->where('pick_id', $id);
		$this->db->delete('mapping_pick_localman');

		return 1;
	}

	public function getPickArrByPickId($pick_id,$is_true=0) {
		$this->db->select('a.*,e.name_tw as name_tw,c.name_tw as c_name_tw');
		$this->db->join('mapping_client_contact c','c.id=a.contact_id','left');
		$this->db->join('mapping_employer_contact e','e.id=a.contact_id','left');
		$this->db->where('a.pick_id', $pick_id);
		$this->db->where('a.is_true', $is_true);
		$this->db->order_by('a.row','asc');
		$query = $this->db->get('mapping_pick_arr a');
		
		return $query->result_array();		
	}

	public function pickPickArr_doEdit($pick_id) {
		$ary_data = array();

		//新增時，預計實際皆各新增一筆
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->delete('mapping_pick_arr', array('pick_id' => $pick_id));

			$ary_row						= $this->input->post('row_PickArr');
			$ary_type_PickArr				= $this->input->post('type_PickArr');
			$ary_date_PickArr				= $this->input->post('date_PickArr');
			$ary_contact_id_PickArr			= $this->input->post('contact_id_PickArr');
			$ary_dep_id_PickArr				= $this->input->post('dep_id_PickArr');
			$ary_client_emp_id_PickArr		= $this->input->post('client_emp_id_PickArr');
			$ary_contact_id_from_PickArr	= $this->input->post('contact_id_from_PickArr');

			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']			= $ary_row[$i];
				$ary_data[$i]['pick_id']		= $pick_id;
				$ary_data[$i]['type']			= $ary_type_PickArr[$i];
				$ary_data[$i]['date']			= $ary_date_PickArr[$i];
				$ary_data[$i]['contact_id']		= $ary_contact_id_PickArr[$i];
				$ary_data[$i]['dep_id']			= $ary_dep_id_PickArr[$i];
				$ary_data[$i]['is_true']		= 0;
				$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickArr[$i];
				$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickArr[$i];
			}

			$this->db->insert_batch('mapping_pick_arr',$ary_data);
			//實際
			unset($ary_data);
			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']			= $ary_row[$i];
				$ary_data[$i]['pick_id']		= $pick_id;
				$ary_data[$i]['type']			= $ary_type_PickArr[$i];
				$ary_data[$i]['date']			= $ary_date_PickArr[$i];
				$ary_data[$i]['contact_id']		= $ary_contact_id_PickArr[$i];
				$ary_data[$i]['dep_id']			= $ary_dep_id_PickArr[$i];
				$ary_data[$i]['is_true']		= 1;
				$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickArr[$i];
				$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickArr[$i];
			}

			$this->db->insert_batch('mapping_pick_arr',$ary_data);
		}else{
			if($this->input->post('type_PickArr')===false){
				$this->db->delete('mapping_pick_arr', array('pick_id' => $pick_id,'is_true' => 1));
				//實際-依實際欄位
				$ary_row						= $this->input->post('row_PickArr_r');
				$ary_type_PickArr				= $this->input->post('type_PickArr_r');
				$ary_date_PickArr				= $this->input->post('date_PickArr_r');
				$ary_contact_id_PickArr			= $this->input->post('contact_id_PickArr_r');
				$ary_dep_id_PickArr				= $this->input->post('dep_id_PickArr_r');
				$ary_client_emp_id_PickArr		= $this->input->post('client_emp_id_PickArr_r');
				$ary_contact_id_from_PickArr	= $this->input->post('contact_id_from_PickArr_r');
				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['type']			= $ary_type_PickArr[$i];
					$ary_data[$i]['date']			= $ary_date_PickArr[$i];
					$ary_data[$i]['contact_id']		= $ary_contact_id_PickArr[$i];
					$ary_data[$i]['dep_id']			= $ary_dep_id_PickArr[$i];
					$ary_data[$i]['is_true']		= 1;
					$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickArr[$i];
					$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickArr[$i];
				}
				$this->db->insert_batch('mapping_pick_arr',$ary_data);
			}else{
				$this->db->delete('mapping_pick_arr', array('pick_id' => $pick_id));
				//預計
				$ary_row						= $this->input->post('row_PickArr');
				$ary_type_PickArr				= $this->input->post('type_PickArr');
				$ary_date_PickArr				= $this->input->post('date_PickArr');
				$ary_contact_id_PickArr			= $this->input->post('contact_id_PickArr');
				$ary_dep_id_PickArr				= $this->input->post('dep_id_PickArr');
				$ary_client_emp_id_PickArr		= $this->input->post('client_emp_id_PickArr');
				$ary_contact_id_from_PickArr	= $this->input->post('contact_id_from_PickArr');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['type']			= $ary_type_PickArr[$i];
					$ary_data[$i]['date']			= $ary_date_PickArr[$i];
					$ary_data[$i]['contact_id']		= $ary_contact_id_PickArr[$i];
					$ary_data[$i]['dep_id']			= $ary_dep_id_PickArr[$i];
					$ary_data[$i]['is_true']		= 0;
					$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickArr[$i];
					$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickArr[$i];
				}

				$this->db->insert_batch('mapping_pick_arr',$ary_data);
				//實際-依預計欄位
				unset($ary_data);
				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['type']			= $ary_type_PickArr[$i];
					$ary_data[$i]['date']			= $ary_date_PickArr[$i];
					$ary_data[$i]['contact_id']		= $ary_contact_id_PickArr[$i];
					$ary_data[$i]['dep_id']			= $ary_dep_id_PickArr[$i];
					$ary_data[$i]['is_true']		= 1;
					$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickArr[$i];
					$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickArr[$i];
				}
				$this->db->insert_batch('mapping_pick_arr',$ary_data);
				
			}
		 }

		return 1;
	}

	public function pickPickArr_doDel($id) {
		$this->db->where('pick_id', $id);
		$this->db->delete('mapping_pick_arr');

		return 1;
	}

	public function getPickHotelByPickId($pick_id,$is_true=0) {

		$this->db->select('h.*,e.name_tw as name_tw,c.name_tw as c_name_tw');
		$this->db->join('mapping_client_contact c','c.id=h.contact_id','left');
		$this->db->join('mapping_employer_contact e','e.id=h.contact_id','left');
		$this->db->where('h.pick_id', $pick_id);
		$this->db->where('h.is_true', $is_true);
		$this->db->order_by('h.row','asc');
		$query = $this->db->get('mapping_pick_hotel h');
		
		return $query->result_array();	

	}

	public function pickPickHotel_doEdit($pick_id) {
		$ary_data = array();

		//新增時，預計實際皆各新增一筆
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->delete('mapping_pick_hotel', array('pick_id' => $pick_id));

			$ary_row						= $this->input->post('row_PickHotel');
			$ary_date_PickHotel				= $this->input->post('date_PickHotel');
			$ary_contact_id_PickHotel		= $this->input->post('contact_id_PickHotel');
			$ary_need_PickHotel				= $this->input->post('need_PickHotel');
			$ary_hotel_id_PickHotel			= $this->input->post('hotel_id_PickHotel');
			$ary_room_id_PickHotel			= $this->input->post('room_id_PickHotel');
			$ary_client_emp_id_PickHotel	= $this->input->post('client_emp_id_PickHotel');
			$ary_contact_id_from_PickHotel	= $this->input->post('contact_id_from_PickHotel');

			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']			= $ary_row[$i];
				$ary_data[$i]['pick_id']		= $pick_id;
				$ary_data[$i]['date']			= $ary_date_PickHotel[$i];
				$ary_data[$i]['contact_id']		= $ary_contact_id_PickHotel[$i];
				$ary_data[$i]['need']			= $ary_need_PickHotel[$i];
				$ary_data[$i]['hotel_id']		= $ary_hotel_id_PickHotel[$i];
				$ary_data[$i]['room_id']		= $ary_room_id_PickHotel[$i];
				$ary_data[$i]['is_true']		= 0;
				$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickHotel[$i];
				$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickHotel[$i];
			}

			$this->db->insert_batch('mapping_pick_hotel',$ary_data);
			//實際
			unset($ary_data);
			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']			= $ary_row[$i];
				$ary_data[$i]['pick_id']		= $pick_id;
				$ary_data[$i]['date']			= $ary_date_PickHotel[$i];
				$ary_data[$i]['contact_id']		= $ary_contact_id_PickHotel[$i];
				$ary_data[$i]['need']			= $ary_need_PickHotel[$i];
				$ary_data[$i]['hotel_id']		= $ary_hotel_id_PickHotel[$i];
				$ary_data[$i]['room_id']		= $ary_room_id_PickHotel[$i];
				$ary_data[$i]['is_true']		= 1;
				$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickHotel[$i];
				$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickHotel[$i];
			}

			$this->db->insert_batch('mapping_pick_hotel',$ary_data);
		}else{
			if($this->input->post('contact_id_PickHotel')===false){
				$this->db->delete('mapping_pick_hotel', array('pick_id' => $pick_id,'is_true' => 1));

				//實際-依實際欄位
				$ary_row					= $this->input->post('row_PickHotel_r');
				$ary_date_PickHotel			= $this->input->post('date_PickHotel_r');
				$ary_contact_id_PickHotel	= $this->input->post('contact_id_PickHotel_r');
				$ary_need_PickHotel			= $this->input->post('need_PickHotel_r');
				$ary_hotel_id_PickHotel		= $this->input->post('hotel_id_PickHotel_r');
				$ary_room_id_PickHotel		= $this->input->post('room_id_PickHotel_r');
				$ary_client_emp_id_PickHotel	= $this->input->post('client_emp_id_PickHotel_r');
				$ary_contact_id_from_PickHotel	= $this->input->post('contact_id_from_PickHotel_r');
				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['date']			= $ary_date_PickHotel[$i];
					$ary_data[$i]['contact_id']		= $ary_contact_id_PickHotel[$i];
					$ary_data[$i]['need']			= $ary_need_PickHotel[$i];
					$ary_data[$i]['hotel_id']		= $ary_hotel_id_PickHotel[$i];
					$ary_data[$i]['room_id']		= $ary_room_id_PickHotel[$i];
					$ary_data[$i]['is_true']		= 1;
					$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickHotel[$i];
					$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickHotel[$i];
				}

				$this->db->insert_batch('mapping_pick_hotel',$ary_data);
			}else{
				$this->db->delete('mapping_pick_hotel', array('pick_id' => $pick_id));
				//預計
				$ary_row						= $this->input->post('row_PickHotel');
				$ary_date_PickHotel				= $this->input->post('date_PickHotel');
				$ary_contact_id_PickHotel		= $this->input->post('contact_id_PickHotel');
				$ary_need_PickHotel				= $this->input->post('need_PickHotel');
				$ary_hotel_id_PickHotel			= $this->input->post('hotel_id_PickHotel');
				$ary_room_id_PickHotel			= $this->input->post('room_id_PickHotel');
				$ary_client_emp_id_PickHotel	= $this->input->post('client_emp_id_PickHotel');
				$ary_contact_id_from_PickHotel	= $this->input->post('contact_id_from_PickHotel');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['date']			= $ary_date_PickHotel[$i];
					$ary_data[$i]['contact_id']		= $ary_contact_id_PickHotel[$i];
					$ary_data[$i]['need']			= $ary_need_PickHotel[$i];
					$ary_data[$i]['hotel_id']		= $ary_hotel_id_PickHotel[$i];
					$ary_data[$i]['room_id']		= $ary_room_id_PickHotel[$i];
					$ary_data[$i]['is_true']		= 0;
					$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickHotel[$i];
					$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickHotel[$i];
				}

				$this->db->insert_batch('mapping_pick_hotel',$ary_data);
				//實際-依預計欄位
				unset($ary_data);
				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['date']			= $ary_date_PickHotel[$i];
					$ary_data[$i]['contact_id']		= $ary_contact_id_PickHotel[$i];
					$ary_data[$i]['need']			= $ary_need_PickHotel[$i];
					$ary_data[$i]['hotel_id']		= $ary_hotel_id_PickHotel[$i];
					$ary_data[$i]['room_id']		= $ary_room_id_PickHotel[$i];
					$ary_data[$i]['is_true']		= 1;
					$ary_data[$i]['client_emp_id']	= $ary_client_emp_id_PickHotel[$i];
					$ary_data[$i]['contact_id_from']= $ary_contact_id_from_PickHotel[$i];
				}

				$this->db->insert_batch('mapping_pick_hotel',$ary_data);
			}
			
		 }

		return 1;
	}

	public function pickPickHotel_doDel($id) {
		$this->db->where('pick_id', $id);
		$this->db->delete('mapping_pick_hotel');

		return 1;
	}


	public function getPickContactByPickId($pick_id,$is_true=0) {

		$this->db->select('pc.*,e.name_tw as name_tw,c.name_tw as c_name_tw');
		$this->db->join('mapping_client_contact c','c.id=pc.contact_id','left');
		$this->db->join('mapping_employer_contact e','e.id=pc.contact_id','left');
		$this->db->where('pc.pick_id', $pick_id);
		$this->db->where('pc.is_true', $is_true);
		$this->db->order_by('pc.row','asc');
		$query = $this->db->get('mapping_pick_contact pc');
		
		return $query->result_array();	

	}

	public function pickContact_doEdit($pick_id) {
		$ary_data = array();

		//新增時，預計實際皆各新增一筆
		if (strval($this->input->post('hid_id')) == '0') {
			$this->db->delete('mapping_pick_contact', array('pick_id' => $pick_id));

			$ary_row				= $this->input->post('row_pickContact');
			$ary_is_contact_from	= $this->input->post('is_contact_from_pickContact');
			$ary_contact_id			= $this->input->post('contact_id_pickContact');
			$ary_email				= $this->input->post('email_pickContact');

			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']				= $ary_row[$i];
				$ary_data[$i]['pick_id']			= $pick_id;
				$ary_data[$i]['is_contact_from']	= $ary_is_contact_from[$i];
				$ary_data[$i]['contact_id']			= $ary_contact_id[$i];
				$ary_data[$i]['email']				= $ary_email[$i];
				$ary_data[$i]['is_true']			= 0;
			}

			$this->db->insert_batch('mapping_pick_contact',$ary_data);
			//實際
			unset($ary_data);
			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']				= $ary_row[$i];
				$ary_data[$i]['pick_id']			= $pick_id;
				$ary_data[$i]['is_contact_from']	= $ary_is_contact_from[$i];
				$ary_data[$i]['contact_id']			= $ary_contact_id[$i];
				$ary_data[$i]['email']				= $ary_email[$i];
				$ary_data[$i]['is_true']			= 1;
			}

			$this->db->insert_batch('mapping_pick_contact',$ary_data);
		} else {
			if(date("Y-m-d") >= $this->input->post('date_dep')) {
				$this->db->delete('mapping_pick_contact', array('pick_id' => $pick_id,'is_true' => 1));

				//實際-依實際欄位
				$ary_row				= $this->input->post('row_pickContact');
				$ary_is_contact_from	= $this->input->post('is_contact_from_pickContact');
				$ary_contact_id			= $this->input->post('contact_id_pickContact');
				$ary_email				= $this->input->post('email_pickContact');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']				= $ary_row[$i];
					$ary_data[$i]['pick_id']			= $pick_id;
					$ary_data[$i]['is_contact_from']	= $ary_is_contact_from[$i];
					$ary_data[$i]['contact_id']			= $ary_contact_id[$i];
					$ary_data[$i]['email']				= $ary_email[$i];
					$ary_data[$i]['is_true']			= 1;
				}

				$this->db->insert_batch('mapping_pick_contact',$ary_data);
			} else {
				$this->db->delete('mapping_pick_contact', array('pick_id' => $pick_id));
				//預計
				$ary_row				= $this->input->post('row_pickContact');
				$ary_is_contact_from	= $this->input->post('is_contact_from_pickContact');
				$ary_contact_id			= $this->input->post('contact_id_pickContact');
				$ary_email				= $this->input->post('email_pickContact');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']				= $ary_row[$i];
					$ary_data[$i]['pick_id']			= $pick_id;
					$ary_data[$i]['is_contact_from']	= $ary_is_contact_from[$i];
					$ary_data[$i]['contact_id']			= $ary_contact_id[$i];
					$ary_data[$i]['email']				= $ary_email[$i];
					$ary_data[$i]['is_true']			= 0;
				}

				$this->db->insert_batch('mapping_pick_contact',$ary_data);
				//實際
				unset($ary_data);
				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']				= $ary_row[$i];
					$ary_data[$i]['pick_id']			= $pick_id;
					$ary_data[$i]['is_contact_from']	= $ary_is_contact_from[$i];
					$ary_data[$i]['contact_id']			= $ary_contact_id[$i];
					$ary_data[$i]['email']				= $ary_email[$i];
					$ary_data[$i]['is_true']			= 1;
				}

				$this->db->insert_batch('mapping_pick_contact',$ary_data);
			}			
		 }

		return 1;
	}

	public function pickContact_doDel($id) {
		$this->db->where('pick_id', $id);
		$this->db->delete('mapping_pick_contact');

		return 1;
	}

	public function getPickStrokeByPickId($pick_id,$is_true=0) {
		$this->db->select('*');
		$this->db->where('pick_id', $pick_id);
		$this->db->where('is_true', $is_true);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_pick_stroke');
		
		return $query->result_array();		
	}

	public function pickPickStroke_doEdit($pick_id) {
		$ary_data = array();

		//新增時，預計實際皆各新增一筆
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->delete('mapping_pick_stroke', array('pick_id' => $pick_id)); 

			$ary_row					= $this->input->post('row_PickStroke');
			$ary_date_PickStroke		= $this->input->post('date_PickStroke');
			$ary_time_PickStroke		= $this->input->post('time_PickStroke');
			$ary_item_PickStroke		= $this->input->post('item_PickStroke');
			$ary_descr_PickStroke		= $this->input->post('descr_PickStroke');

			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']		= $ary_row[$i];
				$ary_data[$i]['pick_id']	= $pick_id;
				$ary_data[$i]['date']		= $ary_date_PickStroke[$i];
				$ary_data[$i]['time']		= $ary_time_PickStroke[$i];
				$ary_data[$i]['item']		= $ary_item_PickStroke[$i];
				$ary_data[$i]['descr']		= $ary_descr_PickStroke[$i];
				$ary_data[$i]['is_true']	= 0;
			}

			$this->db->insert_batch('mapping_pick_stroke',$ary_data);
			//實際
			unset($ary_data);
			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']		= $ary_row[$i];
				$ary_data[$i]['pick_id']	= $pick_id;
				$ary_data[$i]['date']		= $ary_date_PickStroke[$i];
				$ary_data[$i]['time']		= $ary_time_PickStroke[$i];
				$ary_data[$i]['item']		= $ary_item_PickStroke[$i];
				$ary_data[$i]['descr']		= $ary_descr_PickStroke[$i];
				$ary_data[$i]['is_true']	= 1;
			}

			$this->db->insert_batch('mapping_pick_stroke',$ary_data);
		}else{
			if($this->input->post('time_PickStroke')===false){
				$this->db->delete('mapping_pick_stroke', array('pick_id' => $pick_id,'is_true' => 1));

				//實際-依實際欄位
				$ary_row					= $this->input->post('row_PickStroke_r');
				$ary_date_PickStroke		= $this->input->post('date_PickStroke_r');
				$ary_time_PickStroke		= $this->input->post('time_PickStroke_r');
				$ary_item_PickStroke		= $this->input->post('item_PickStroke_r');
				$ary_descr_PickStroke		= $this->input->post('descr_PickStroke_r');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']		= $ary_row[$i];
					$ary_data[$i]['pick_id']	= $pick_id;
					$ary_data[$i]['date']		= $ary_date_PickStroke[$i];
					$ary_data[$i]['time']		= $ary_time_PickStroke[$i];
					$ary_data[$i]['item']		= $ary_item_PickStroke[$i];
					$ary_data[$i]['descr']		= $ary_descr_PickStroke[$i];
					$ary_data[$i]['is_true']	= 1;
				}

				$this->db->insert_batch('mapping_pick_stroke',$ary_data);
			}else{
				$this->db->delete('mapping_pick_stroke', array('pick_id' => $pick_id));
				//預計
				$ary_row					= $this->input->post('row_PickStroke');
				$ary_date_PickStroke		= $this->input->post('date_PickStroke');
				$ary_time_PickStroke		= $this->input->post('time_PickStroke');
				$ary_item_PickStroke		= $this->input->post('item_PickStroke');
				$ary_descr_PickStroke		= $this->input->post('descr_PickStroke');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']		= $ary_row[$i];
					$ary_data[$i]['pick_id']	= $pick_id;
					$ary_data[$i]['date']		= $ary_date_PickStroke[$i];
					$ary_data[$i]['time']		= $ary_time_PickStroke[$i];
					$ary_data[$i]['item']		= $ary_item_PickStroke[$i];
					$ary_data[$i]['descr']		= $ary_descr_PickStroke[$i];
					$ary_data[$i]['is_true']	= 0;
				}

				$this->db->insert_batch('mapping_pick_stroke',$ary_data);
				//實際-依預計欄位
				unset($ary_data);
				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']		= $ary_row[$i];
					$ary_data[$i]['pick_id']	= $pick_id;
					$ary_data[$i]['date']		= $ary_date_PickStroke[$i];
					$ary_data[$i]['time']		= $ary_time_PickStroke[$i];
					$ary_data[$i]['item']		= $ary_item_PickStroke[$i];
					$ary_data[$i]['descr']		= $ary_descr_PickStroke[$i];
					$ary_data[$i]['is_true']	= 1;
				}

				$this->db->insert_batch('mapping_pick_stroke',$ary_data);
				
			}
		 }
		return 1;
	}

	public function pickPickStroke_doDel($id) {
		$this->db->where('pick_id', $id);
		$this->db->delete('mapping_pick_stroke');

		return 1;
	}

	public function getPickFeeByPickId($pick_id,$is_true=0) {
		$this->db->select('*');
		$this->db->where('pick_id', $pick_id);
		$this->db->where('is_true', $is_true);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_pick_fee');
		
		return $query->result_array();		
	}

	public function pickPickFee_doEdit($pick_id) {
		$ary_data = array();

		//新增時，預計實際皆各新增一筆
		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->delete('mapping_pick_fee', array('pick_id' => $pick_id)); 

			$ary_row				= $this->input->post('row_PickFee');
			$ary_date_PickFee		= $this->input->post('date_PickFee');
			$ary_item_PickFee		= $this->input->post('item_PickFee');
			$ary_site_PickFee		= $this->input->post('site_PickFee');
			$ary_detail_PickFee		= $this->input->post('detail_PickFee');
			$ary_qty_PickFee		= $this->input->post('qty_PickFee');
			$ary_price_PickFee		= $this->input->post('price_PickFee');
			$ary_money_PickFee		= $this->input->post('money_PickFee');
			$ary_money_en_PickFee	= $this->input->post('money_en_PickFee');
			$ary_descr_PickFee		= $this->input->post('descr_PickFee');

			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']			= $ary_row[$i];
				$ary_data[$i]['pick_id']		= $pick_id;
				$ary_data[$i]['date']			= $ary_date_PickFee[$i];
				$ary_data[$i]['item']			= $ary_item_PickFee[$i];
				$ary_data[$i]['site']			= $ary_site_PickFee[$i];
				$ary_data[$i]['detail']			= $ary_detail_PickFee[$i];
				$ary_data[$i]['qty']			= $ary_qty_PickFee[$i];
				$ary_data[$i]['price']			= $ary_price_PickFee[$i];
				$ary_data[$i]['money']			= $ary_money_PickFee[$i];
				$ary_data[$i]['money_en']		= $ary_money_en_PickFee[$i];
				$ary_data[$i]['descr']			= $ary_descr_PickFee[$i];
				$ary_data[$i]['is_true']		= 0;
			}

			$this->db->insert_batch('mapping_pick_fee',$ary_data);
			//實際
			unset($ary_data);
			for($i=0; $i < count($ary_row); $i++) {
				$ary_data[$i]['row']			= $ary_row[$i];
				$ary_data[$i]['pick_id']		= $pick_id;
				$ary_data[$i]['date']			= $ary_date_PickFee[$i];
				$ary_data[$i]['item']			= $ary_item_PickFee[$i];
				$ary_data[$i]['site']			= $ary_site_PickFee[$i];
				$ary_data[$i]['detail']			= $ary_detail_PickFee[$i];
				$ary_data[$i]['qty']			= $ary_qty_PickFee[$i];
				$ary_data[$i]['price']			= $ary_price_PickFee[$i];
				$ary_data[$i]['money']			= $ary_money_PickFee[$i];
				$ary_data[$i]['money_en']		= $ary_money_en_PickFee[$i];
				$ary_data[$i]['descr']			= $ary_descr_PickFee[$i];
				$ary_data[$i]['is_true']		= 1;
			}

			$this->db->insert_batch('mapping_pick_fee',$ary_data);
		}else{
			if($this->input->post('site_PickFee')===false){
				$this->db->delete('mapping_pick_fee', array('pick_id' => $pick_id,'is_true' => 1));

				//實際-依實際欄位
				$ary_row				= $this->input->post('row_PickFee_r');
				$ary_date_PickFee		= $this->input->post('date_PickFee_r');
				$ary_item_PickFee		= $this->input->post('item_PickFee_r');
				$ary_site_PickFee		= $this->input->post('site_PickFee_r');
				$ary_detail_PickFee		= $this->input->post('detail_PickFee_r');
				$ary_qty_PickFee		= $this->input->post('qty_PickFee_r');
				$ary_price_PickFee		= $this->input->post('price_PickFee_r');
				$ary_money_PickFee		= $this->input->post('money_PickFee_r');
				$ary_money_en_PickFee	= $this->input->post('money_en_PickFee_r');
				$ary_descr_PickFee		= $this->input->post('descr_PickFee_r');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['date']			= $ary_date_PickFee[$i];
					$ary_data[$i]['item']			= $ary_item_PickFee[$i];
					$ary_data[$i]['site']			= $ary_site_PickFee[$i];
					$ary_data[$i]['detail']			= $ary_detail_PickFee[$i];
					$ary_data[$i]['qty']			= $ary_qty_PickFee[$i];
					$ary_data[$i]['price']			= $ary_price_PickFee[$i];
					$ary_data[$i]['money']			= $ary_money_PickFee[$i];
					$ary_data[$i]['money_en']		= $ary_money_en_PickFee[$i];
					$ary_data[$i]['descr']			= $ary_descr_PickFee[$i];
					$ary_data[$i]['is_true']		= 1;
				}

				$this->db->insert_batch('mapping_pick_fee',$ary_data);
			}else{
				$this->db->delete('mapping_pick_fee', array('pick_id' => $pick_id));
				//預計
				$ary_row				= $this->input->post('row_PickFee');
				$ary_date_PickFee		= $this->input->post('date_PickFee');
				$ary_item_PickFee		= $this->input->post('item_PickFee');
				$ary_site_PickFee		= $this->input->post('site_PickFee');
				$ary_detail_PickFee		= $this->input->post('detail_PickFee');
				$ary_qty_PickFee		= $this->input->post('qty_PickFee');
				$ary_price_PickFee		= $this->input->post('price_PickFee');
				$ary_money_PickFee		= $this->input->post('money_PickFee');
				$ary_money_en_PickFee	= $this->input->post('money_en_PickFee');
				$ary_descr_PickFee		= $this->input->post('descr_PickFee');

				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['date']			= $ary_date_PickFee[$i];
					$ary_data[$i]['item']			= $ary_item_PickFee[$i];
					$ary_data[$i]['site']			= $ary_site_PickFee[$i];
					$ary_data[$i]['detail']			= $ary_detail_PickFee[$i];
					$ary_data[$i]['qty']			= $ary_qty_PickFee[$i];
					$ary_data[$i]['price']			= $ary_price_PickFee[$i];
					$ary_data[$i]['money']			= $ary_money_PickFee[$i];
					$ary_data[$i]['money_en']		= $ary_money_en_PickFee[$i];
					$ary_data[$i]['descr']			= $ary_descr_PickFee[$i];
					$ary_data[$i]['is_true']		= 0;
				}

				$this->db->insert_batch('mapping_pick_fee',$ary_data);
				//實際-依預計欄位
				unset($ary_data);
				for($i=0; $i < count($ary_row); $i++) {
					$ary_data[$i]['row']			= $ary_row[$i];
					$ary_data[$i]['pick_id']		= $pick_id;
					$ary_data[$i]['date']			= $ary_date_PickFee[$i];
					$ary_data[$i]['item']			= $ary_item_PickFee[$i];
					$ary_data[$i]['site']			= $ary_site_PickFee[$i];
					$ary_data[$i]['detail']			= $ary_detail_PickFee[$i];
					$ary_data[$i]['qty']			= $ary_qty_PickFee[$i];
					$ary_data[$i]['price']			= $ary_price_PickFee[$i];
					$ary_data[$i]['money']			= $ary_money_PickFee[$i];
					$ary_data[$i]['money_en']		= $ary_money_en_PickFee[$i];
					$ary_data[$i]['descr']			= $ary_descr_PickFee[$i];
					$ary_data[$i]['is_true']		= 1;
				}

				$this->db->insert_batch('mapping_pick_fee',$ary_data);
			}
			
		 }
		return 1;
	}

	public function pickPickFee_doDel($id) {
		$this->db->where('pick_id', $id);
		$this->db->delete('mapping_pick_fee');

		return 1;
	}

	public function getPickbyContactId($pick_id=-1,$is_true=0) {

		if(($pick_id == -1) || ($pick_id == "")) {
			return ;
		}
		$ary_cou = array();
		$query4 = array();

		// Query #1
		$this->db->select('a.contact_id as contact_id');
		$this->db->distinct();
		$this->db->from('mapping_pick_arr a');
		$this->db->where('a.pick_id', $pick_id);
		$this->db->where('a.is_true', $is_true);
		$query1 = $this->db->get()->result_array();

		// Query #2
		$this->db->select('h.contact_id as contact_id');
		$this->db->distinct();
		$this->db->from('mapping_pick_hotel h');
		$this->db->where('h.pick_id', $pick_id);
		$this->db->where('h.is_true', $is_true);
		$query2 = $this->db->get()->result_array();

		// Merge both query results
		$query3 = array_merge($query1, $query2);

		for($i=0; $i < sizeof($query3); $i++) {
			array_push($query4 , $query3[$i]['contact_id']);
		}	

		// Query #3
		$this->db->select('name_tw,name_en,jobtitle,descr');
		$this->db->from('mapping_client_contact');
		$this->db->where_in('id',$query4);
		$query1 = $this->db->get()->result_array();

		// Query #4
		$this->db->select('name_tw,name_en,jobtitle,descr');
		$this->db->from('mapping_employer_contact');
		$this->db->where_in('id',$query4);
		$query2 = $this->db->get()->result_array();

		// Merge both query results
		$ary_cou = array_merge($query1, $query2);

		return json_encode($ary_cou);
	}

	public function getContactIdBySearch($contact_id_from = 0) {
		$ary_ret = array();

		if($contact_id_from == 0){
			// Query #1
			$this->db->select('ct.id, ct.client_id, ct.name_tw');
			$this->db->join('client c','ct.client_id=c.id','left');
			$this->db->like('c.name_tw', $this->input->post('keyword'), 'after');
			$query = $this->db->get('mapping_client_contact ct');
			$ary_cou = $query->result_array();

		}else{
			// Query #2
			$this->db->select('et.id, et.employer_id, et.name_tw');
			$this->db->join('employer e','et.employer_id=e.id','left');
			$this->db->like('e.name_tw', $this->input->post('keyword'), 'after');
			$query = $this->db->get('mapping_employer_contact et');
			$ary_cou = $query->result_array();

		}
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['name_tw'];
			}
		}

		return $ary_ret;
	}

	public function getPickbyClientEmpId($contact_id=0,$contact_id_from = 0) {
		$ary_ret = array();

		if($contact_id_from == 0){
			// Query #1
			$this->db->select('id, client_id as client_emp_id, name_tw, email');
			$this->db->where('id',$contact_id);
			$query = $this->db->get('mapping_client_contact');
			$ary_cou = $query->result_array();
		}else{
			// Query #2
			$this->db->select('id, employer_id as client_emp_id, name_tw, email');
			$this->db->where('id',$contact_id);
			$query = $this->db->get('mapping_employer_contact');
			$ary_cou = $query->result_array();
		}
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[0] = $val['client_emp_id'];
				$ary_ret[1] = $val['email'];
			}
		}
		return $ary_ret;

	}
	


}