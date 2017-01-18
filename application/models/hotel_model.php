<?php
/*
* File:			hotel_model.php
* Version:		-
* Last changed:	2016/03/04
* Purpose:		-
* Author:		Shirley
* Copyright:	(C) 2016
* Product:		NFW
*/

class Hotel_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getHotel($output=0) {
		$ary_ret = array();

		$this->db->select('a.id, a.name_init, a.tw, a.en, a.vat_number, a.address, a.phone, a.fax, a.site, a.level, a.network, a.networkremark, a.is_woman_ok, c.tw as tw_c, c.name_init as name_init_c, d.tw as tw_short_d, d.name_init as name_init_d');
		$this->db->join('conf_country c','c.id=a.country_id','left');
		$this->db->join('conf_school d','d.id=a.school_id','left');
		$query = $this->db->get('conf_hotel a');
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

	public function gethotelById($id) {
		$this->db->select('id, name_init, tw, en, country_id, school_id, vat_number, address, phone, fax, site, level, network, networkremark, is_woman_ok');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_hotel');
		
		return $query->row_array();		
	}

	public function hotel_doEdit() {
		$ary_data = array(
			'name_init'     => $this->input->post('txt_name_init'), 
			'tw'		    => $this->input->post('txt_tw'),
			'en'            => $this->input->post('txt_en'),
			'country_id'    => $this->input->post('sel_country'),
			'school_id'     => $this->input->post('sel_school'),			
			'vat_number'    => $this->input->post('txt_vat_number'),
			'address'       => $this->input->post('txt_address'),
			'phone'         => $this->input->post('txt_phone'),
			'fax'           => $this->input->post('txt_fax'),
			'site'          => $this->input->post('txt_site'),
			'level'         => $this->input->post('sel_level'),
			'network'       => $this->input->post('sel_network'),
			'networkremark' => $this->input->post('txt_networkremark'), 
			'is_woman_ok'	=> $this->input->post('rdo_is_woman_ok'),	
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_hotel');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_hotel');
		}
		
		return 1;
	}

	public function hotel_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_hotel');
		
		return 1;
	}

	// $id:
	//		-1: all id (default)
	public function getHotelByidSel($id=-1) {
		$ary_ret = array();

		$this->db->select('*');
		if($id != -1) {
			$this->db->where('id', $id);
			$this->db->order_by("tw","asc");
		}
		$query = $this->db->get('conf_hotel');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[0] = $val['id'];
				$ary_ret[1] = $val['tw'];
				$ary_ret[2] = $val['en'];
				$ary_ret[3] = $val['site'];
				$ary_ret[4] = $val['phone'];
				$ary_ret[5] = $val['address'];
			}
		}
		return $ary_ret;
	}

	public function getHotelByminid() {
		$this->db->select('id');
		$this->db->order_by("id","asc");
		$query = $this->db->get('conf_hotel');
		
		return $query->row_array();		
	}
}