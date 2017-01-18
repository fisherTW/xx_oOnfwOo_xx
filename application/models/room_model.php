<?php
/*
* File:			room_model.php
* Version:		-
* Last changed:	2016/03/08
* Purpose:		-
* Author:		Shirley
* Copyright:	(C) 2016
* Product:		NFW
*/

class Room_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getRoom($output=0) {
		$ary_ret = array();

		$this->db->select('a.id, a.name_init, a.tw, a.person, a.price, a.currency_id, a.hotel_id, c.tw as tw_c, c.name_init as name_init_c, d.tw as tw_d, d.name_init as name_init_d');
		$this->db->join('conf_currency c','c.id=a.currency_id','left');
		$this->db->join('conf_hotel d','d.id=a.hotel_id','left');
		$query = $this->db->get('conf_room a');
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

	public function getroomById($id) {
		$this->db->select('id, name_init, tw, person, price, currency_id, hotel_id');
		$this->db->where('id', $id);
		$query = $this->db->get('conf_room');
		
		return $query->row_array();		
	}

	public function room_doEdit() {
		$ary_data = array(
			'name_init'     => $this->input->post('txt_name_init'), 
			'tw'		    => $this->input->post('txt_tw'),
			'person'        => $this->input->post('sel_person'),
			'price'         => $this->input->post('txt_price'),
			'currency_id'	=> $this->input->post('sel_currency'),	
			'hotel_id'		=> $this->input->post('sel_hotel'),	
		);

		$this->db->set($ary_data);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->insert('conf_room');
		} else {
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('conf_room');
		}
		
		return 1;
	}

	public function room_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('conf_room');
		
		return 1;
	}

	public function getRoomByhotelId($hotel_id=-1) {
		$ary_ret = array();

		$this->db->select('*');
		if($hotel_id != -1) {
			$this->db->where('hotel_id', $hotel_id);
			$this->db->order_by("id","asc");
		}
		$query = $this->db->get('conf_room');
		$ary_cou = $query->result_array();

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_ret[$val['id']] = $val['tw'];
			}
		}
		return $ary_ret;
	}
}