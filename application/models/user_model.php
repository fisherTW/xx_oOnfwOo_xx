<?php
/*
* File:			user_model.php
* Version:		-
* Last changed:	2016/02/25
* Purpose:		-
* Author:		Fisher
* Copyright:	(C) 2016
* Product:		NFW
*/

class User_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getRole($user_id) {
		$user_role = ROLE_SALES;
		$this->db->select('role');
		$ary_where = array('company_id' => 1, 'account' => $this->input->post('txt_loginAccount'));
		$this->db->where($ary_where); 		
		$query = $this->db->get('user');		
		if($query->num_rows() > 0) {
			$row = $query->row(); 
			$user_role = $row->role;
		}

		return $user_role;
	}

	public function getTw($user_id) {
		$tw = '';
		$this->db->select('tw');
		$ary_where = array('company_id' => 1, 'account' => $this->input->post('txt_loginAccount'));
		$this->db->where($ary_where); 		
		$query = $this->db->get('user');		
		if($query->num_rows() > 0) {
			$row = $query->row(); 
			$tw = $row->tw;
		}
		
		return $tw;
	}	
}