<?php
/*
* File:			letter_model.php
* Version:		-
* Last changed:	2016/02/25getWorker_type
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class Letter_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getLetter($output=0) {
		$ary_ret = array();

		$this->db->select('l.* ,d.tw as doc_tw ,c.alias as client_tw ,e.alias as employer_tw ');
		$this->db->join('conf_doc d','l.type=d.id','left');
		$this->db->join('client c','c.id=l.client_id','left');
		$this->db->join('employer e','e.id=l.employer_id','left');
		$this->db->order_by('l.is_enable desc, l.date_send desc');
		$query = $this->db->get('letter l');
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

	// $type:
	//		-1: all types (default)
	// $employer_id:
	//		-1: all employer_id (default)
	public function getLetterByType($type=-1, $employer_id=-1) {
		$ary_ret = array();
		$ary_ret2 = array();
		$ary_ret3 = array();

		$this->db->select('l.*,d.tw as doc_tw ,i.inbound_no');
		$this->db->join('conf_doc d','l.type=d.id','left');
		$this->db->join('mapping_letter_inbound i','i.letter_id=l.id','left');
		if($type != -1) {
			$this->db->where('l.type', $type);
			$this->db->where('l.is_enable', true);
		}
		if($employer_id != -1) {
			$this->db->where('l.employer_id', $employer_id);
		}
		$this->db->order_by("l.no","asc");
		$query = $this->db->get('letter l');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['no']] = $val['no'];
				$ary_ret2[$val['no']] = $val['inbound_no'];
				$ary_ret3[$val['id']] = $val['no'];
			}
		}

		return array($ary_ret,$ary_ret2,$ary_ret3);
	}

	public function getLetter_inboundByNo($letter_id) {
		$ary_ret = array();
		$ary_tmp = array();

		$this->db->select('id,inbound_no');
		$this->db->where('letter_id', $letter_id);
		$query = $this->db->get('mapping_letter_inbound');

		$ary_ret = $query->result_array();
		if(count($ary_ret) > 0) {
			foreach ($ary_ret as $key => $val) {
				$ary_tmp[$val['id']] = $val['inbound_no'];
			}
		}

		return $ary_tmp;
	}

	public function getLetterById($id) {
		$this->db->select('l.*, c.name_tw as c_name_tw, e.name_tw as e_name_tw');
		$this->db->join('client c','c.id=l.client_id','left');
		$this->db->join('employer e','e.id=l.employer_id','left');
		$this->db->where('l.id', $id);
		$query = $this->db->get('letter l');
		
		return $query->row_array();
	}

	public function getLetterByno($employer_id) {
		$ary_ret = array();
		$ary_tmp = array();

		$this->db->select('id,no');
		$this->db->where('employer_id', $employer_id);
		$this->db->order_by("no","asc");
		$query = $this->db->get('letter');

		$ary_ret = $query->result_array();
		if(count($ary_ret) > 0) {
			foreach ($ary_ret as $key => $val) {
				$ary_tmp[$val['id']] = $val['no'];
			}
		}	
		return $ary_tmp;		
	}

	public function getLetterAuthByLetterId($letter_id) {
		$this->db->select('*, (quota_m + quota_f) AS sum');
		$this->db->where('letter_id', $letter_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_letter_auth');
		
		return $query->result_array();		
	}

	public function letter_doEdit() {
		$ary_data = array(
			'client_id' 	=> $this->input->post('sel_client_id'), 
			'country_id'	=> $this->input->post('sel_country'),
			'employer_id'	=> $this->input->post('sel_employer_id'),
			'duration'		=> $this->input->post('txt_duration'),
			'sales_id'		=> $this->input->post('sel_sales_id'),
			'service_id'	=> $this->input->post('sel_service_id'),
			'type'			=> $this->input->post('sel_type'),
			'type_sub'		=> $this->input->post('rdo_type_sub'),
			'date_receive'	=> $this->input->post('txt_date_receive'),
			'site_receive'	=> $this->input->post('sel_site_receive'),
			'date_send'		=> $this->input->post('txt_date_send'),
			'descr'			=> $this->input->post('txt_descr'),
			'is_enable'		=> $this->input->post('sel_is_enable'),
			'no'			=> $this->input->post('txt_no'),
			'quota'			=> $this->input->post('txt_quota'),
			'file_path'		=> $this->input->post('hid_filepath1')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('letter');
			$id = $this->db->insert_id();
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('letter');
			$id = $this->input->post('hid_id');
		}

		// auth info
		$this->letter_auth_doEdit($id);

		return 1;
	}

	public function letter_auth_doEdit($letter_id) {
		$ary_data = array();
		$this->db->delete('mapping_letter_auth', array('letter_id' => $letter_id)); 

		$ary_row		= $this->input->post('row_exp');
		$ary_auth_id	= $this->input->post('auth_id');
		$ary_date_auth	= $this->input->post('date_auth');
		$ary_quota_f 	= $this->input->post('quota_f');
		$ary_quota_m 	= $this->input->post('quota_m');
		$ary_quota_sum 	= $this->input->post('quota_sum');		
		$ary_salary 	= $this->input->post('salary');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['letter_id']	= $letter_id;
			$ary_data[$i]['auth_id']	= $ary_auth_id[$i];
			$ary_data[$i]['date_auth']	= $ary_date_auth[$i];
			$ary_data[$i]['quota_f']	= $ary_quota_f[$i];
			$ary_data[$i]['quota_m']	= $ary_quota_m[$i];
			$ary_data[$i]['quota_sum']	= $ary_quota_sum[$i];
			$ary_data[$i]['salary']		= $ary_salary[$i];
		}

		$this->db->insert_batch('mapping_letter_auth',$ary_data);

		return 1;
	}

	public function letter_auth_doDel($id) {
		$this->db->where('letter_id', $id);
		$this->db->delete('mapping_letter_auth');

		return 1;
	}

	public function letter_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('letter');
		// auth info
		$this->letter_auth_doDel($id);

		return 1;
	}

	// $output:1: only id->name
	public function getPackageTitle($output=0) {
		$ary_ret = array();

		$this->db->select('l.*, c.tw as tw_c');
		$this->db->join('conf_country c','c.id=l.country_id','left');
		$query = $this->db->get('package_title l');
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

	public function getPackageTitleId() {
		$ary_ret = array();
		$ary_ret2 = array();
		$ary_ret3 = array();
		$ary_ret4 = array();
		$ary_ret5 = array();
		$ary_ret6 = array();

		$this->db->select('l.*, c.tw as tw_c');
		$this->db->join('conf_country c','c.id=l.country_id','left');
		$this->db->order_by('date_send','desc');
		$query = $this->db->get('package_title l');
		$ary_cou = $query->result_array();
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['id'];
				$ary_ret2[$val['id']] = $val['tw_c'];
				$ary_ret3[$val['id']] = $val['date_send'];
				$ary_ret4[$val['id']] = $val['send_type'];
				$ary_ret5[$val['id']] = $val['site_send'];
				$ary_ret6[$val['id']] = $val['site_receive'];				
			}
		}

		return array($ary_ret,$ary_ret2,$ary_ret3,$ary_ret4,$ary_ret5,$ary_ret6);

	}

	public function getPackageTitleById($id) {
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('package_title ');
		
		return $query->row_array();		
	}

	public function getPackageTitleByminsid() {
		$this->db->select('id');
		$this->db->order_by("id","asc");
		$query = $this->db->get('package_title');
		
		return $query->row_array();		
	}

	public function packageTitle_doEdit() {
		$ary_data = array(
			'file_path' => $this->input->post('hid_filepath'),
			'file_path2' => $this->input->post('hid_filepath2'),
			'country_id'		=> $this->input->post('sel_country'),
			'send_type'		=> $this->input->post('sel_send_type'),
			'site_paper'		=> $this->input->post('sel_site_paper'),
			'site_receive'		=> $this->input->post('sel_site_receive'),
			'site_send'		=> $this->input->post('sel_site_send'),
			'address_receive'		=> $this->input->post('txt_address_receive'),
			'date_receive'		=> $this->input->post('txt_date_receive'),
			'date_send'		=> $this->input->post('txt_date_send'),
			'descr'		=> $this->input->post('txt_descr'),
			'express'		=> $this->input->post('txt_express'),
			'user_bring'		=> $this->input->post('txt_user_bring'),
			'user_receive'		=> $this->input->post('txt_user_receive'),
			'user_send'		=> $this->input->post('txt_user_send'),
			'user_check'		=> $this->input->post('txt_user_check'),
			'water_no'		=> $this->input->post('txt_water_no')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('package_title');
			$id = $this->db->insert_id();
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('package_title');
			$id = $this->input->post('hid_id');
		}

		return 1;
	}

	public function packageTitle_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('package_title');

		return 1;
	}

	// $output:1: only id->name
	public function getPackageDetail($output=0) {
		$ary_ret = array();

		$this->db->select('p.*,t.country_id,t.send_type,t.site_send,t.site_receive,t.date_send,c.name_tw as c_name_tw, e.name_tw as e_name_tw, l.no as letter_no, ml.inbound_no as inbound_no');
		$this->db->join('client c','c.id=p.client_id','left');
		$this->db->join('employer e','e.id=p.employer_id','left');
		$this->db->join('package_title t','p.package_title_id=t.id','left');
		$this->db->join('letter l','l.id=p.letter_id','left');
		$this->db->join('mapping_letter_inbound ml','ml.id=p.letter_inbound_id','left');
		$query = $this->db->get('package_detail p');
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

	public function getPackageDetailBypkgtitleid($package_title_id) {
		$ary_cou = array();			

		$this->db->select('p.*, l.no as letter_no, c.name_tw as c_name_tw, e.name_tw as e_name_tw, ml.inbound_no as letter_inbound_no');
		$this->db->join('client c','c.id=p.client_id','left');
		$this->db->join('employer e','e.id=p.employer_id','left');
		$this->db->join('letter l','p.letter_id=l.id','left');
		$this->db->join('mapping_letter_inbound ml','ml.id=p.letter_inbound_id','left');		
		$this->db->where('package_title_id', $package_title_id);
		$this->db->order_by("p.client_id", "asc");
		$query = $this->db->get('package_detail p');

		$ary_cou = $query->result_array();

		return json_encode($ary_cou);
	}

	public function getPackageDetailById($id) {
		$ary_ret = array();
		$ary_tmp = array();

		$this->db->select('p.*,t.country_id,t.send_type,t.site_send,t.site_receive,t.date_send,c.name_tw as c_name_tw, e.name_tw as e_name_tw, l.inbound_no as letter_inbound_no');
		$this->db->join('client c','c.id=p.client_id','left');
		$this->db->join('employer e','e.id=p.employer_id','left');
		$this->db->join('package_title t','p.package_title_id=t.id','left');
		$this->db->join('mapping_letter_inbound l','l.id=p.letter_inbound_id','left');		
		$this->db->where('p.id', $id);
		$query = $this->db->get('package_detail p');

		return $query->row_array();		
	}

	public function packageDetail_doEdit() {
		$ary_data = array(
			'package_title_id'			=> $this->input->post('sel_sent_id'),
			'client_id'					=> $this->input->post('sel_client_id'),
			'employer_id'				=> $this->input->post('sel_employer_id'),
			'letter_id'					=> $this->input->post('sel_letter_id'),
			'letter_qty'				=> $this->input->post('txt_letter_qty'),
			'letter_qtycopy'			=> $this->input->post('txt_letter_qtycopy'),
			'letter_inbound_id'			=> $this->input->post('sel_inbound_id'),
			'letter_inbound_qty'		=> $this->input->post('txt_letter_inbound_qty'),
			'letter_inbound_qtycopy'	=> $this->input->post('txt_letter_inbound_qtycopy'),
			'descr'						=> $this->input->post('txt_descr')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('package_detail');
			$id = $this->db->insert_id();
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('package_detail');
			$id = $this->input->post('hid_id');
		}
		// auth info
		$this->packageDetail_auth_doEdit($id);
		return 1;
	}

	public function packageDetail_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('package_detail');
		// auth info
		$this->packageDetail_auth_doDel($id);

		return 1;
	}
	
	public function getpackageDetailAuthById($package_detail_id) {
		$this->db->select('*');
		$this->db->where('package_detail_id', $package_detail_id);
		$this->db->order_by('row','asc');
		$query = $this->db->get('mapping_package_detail_auth');
		
		return $query->result_array();		
	}

	public function packageDetail_auth_doEdit($package_detail_id) {
		$ary_data = array();
		$this->db->delete('mapping_package_detail_auth', array('package_detail_id' => $package_detail_id)); 

		$ary_row		= $this->input->post('row_exp');
		$ary_package_detail_id	= $package_detail_id;
		$ary_type				= $this->input->post('type');
		$ary_package			= $this->input->post('package');
		$ary_package_descr		= $this->input->post('package_descr');
		$ary_package_qty 		= $this->input->post('package_qty');
		$ary_package_qtycopy	= $this->input->post('package_qtycopy');
		$ary_name_tw 			= $this->input->post('name_tw');
		$ary_name_en 			= $this->input->post('name_en');

		for($i=0; $i < count($ary_row); $i++) {
			$ary_data[$i]['row']		= $ary_row[$i];
			$ary_data[$i]['package_detail_id']	= $ary_package_detail_id;
			$ary_data[$i]['type']	= $ary_type[$i];
			$ary_data[$i]['package']	= $ary_package[$i];
			$ary_data[$i]['package_descr']	= $ary_package_descr[$i];
			$ary_data[$i]['package_qty']	= $ary_package_qty[$i];
			$ary_data[$i]['package_qtycopy']	= $ary_package_qtycopy[$i];
			$ary_data[$i]['name_tw']	= $ary_name_tw[$i];
			$ary_data[$i]['name_en']	= $ary_name_en[$i];
		}
		$this->db->insert_batch('mapping_package_detail_auth',$ary_data);

		return 1;
	}

	public function packageDetail_auth_doDel($id) {
		$this->db->where('package_detail_id', $id);
		$this->db->delete('mapping_package_detail_auth');

		return 1;
	}

	public function getLetter_inbound($output=0) {
		$ary_ret = array();

		$this->db->select('m.* ,d.tw as doc_tw ,l.no as letter_no ,c.alias as client_tw ,e.alias as employer_tw');
		$this->db->join('conf_doc d','m.type=d.id','left');
		$this->db->join('letter l','m.letter_id=l.id','left');
		$this->db->join('client c','c.id=m.client_id','left');		
		$this->db->join('employer e','e.id=m.employer_id','left');
		$this->db->order_by('m.inbound_is_enable desc, m.inbound_date_send desc');		
		$query = $this->db->get('mapping_letter_inbound m');
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

	public function letter_inbound_doEdit() {
		$ary_data = array(
			'letter_id'				=> $this->input->post('sel_letter_id'),
			'type'					=> $this->input->post('sel_type'),
			'inbound_date_receive'	=> $this->input->post('txt_inbound_date_receive'),
			'inbound_date_send'		=> $this->input->post('txt_inbound_date_send'),
			'inbound_descr'			=> $this->input->post('txt_inbound_descr'),
			'inbound_is_enable'		=> $this->input->post('sel_inbound_is_enable'),
			'inbound_no'			=> $this->input->post('txt_inbound_no'),
			'inbound_file_path'		=> $this->input->post('hid_filepath2'),
			'inbound_quota'			=> $this->input->post('txt_inbound_quota'),
			'inbound_country_id'	=> $this->input->post('sel_inbound_country'),
			'inbound_site_receive'	=> $this->input->post('sel_inbound_site_receive'),
			'client_id'				=> $this->input->post('sel_client_id'),
			'employer_id'			=> $this->input->post('sel_employer_id')
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('mapping_letter_inbound');
			$id = $this->db->insert_id();
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('mapping_letter_inbound');
			$id = $this->input->post('hid_id');
		}

		return 1;
	}

	public function getLetter_inboundById($id) {
		$this->db->select('l.*, c.name_tw as c_name_tw, e.name_tw as e_name_tw');
		$this->db->join('client c','c.id=l.client_id','left');
		$this->db->join('employer e','e.id=l.employer_id','left');
		$this->db->where('l.id', $id);
		$query = $this->db->get('mapping_letter_inbound l');

		return $query->row_array();
	}

	public function letter_inbound_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('mapping_letter_inbound');

		return 1;
	}	
}