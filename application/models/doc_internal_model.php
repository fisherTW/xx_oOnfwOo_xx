
<?php
/*
* File:			Doc_internal_model.php
* Version:		-
* Last changed:	2016/05/12getWorker_type
* Purpose:		-
* Author:		Irene
* Copyright:	(C) 2016
* Product:		NFW
*/

class Doc_internal_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getDoc_internal($output=0) {
		$ary_ret = array();

		$this->db->select('p.*, c.tw as tw_c,d.tw as doc_tw, e.tw as emp_dep_tw');
		$this->db->join('conf_doc d','p.doc_id5_3=d.id','left');
		$this->db->join('conf_country c','c.id=p.country_id','left');
		$this->db->join('conf_emp_dep e','e.id=p.emp_dep_id','left');
		$query = $this->db->get('doc_internal p');
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

	public function getDoc_internalById($id) {
		$this->db->select('p.*, c.tw as tw_c,d.tw as doc_tw,u.account as user_create_name');
		$this->db->join('conf_doc d','p.doc_id5_3=d.id','left');
		$this->db->join('conf_country c','c.id=p.country_id','left');
		$this->db->join('user u','u.id=p.user_create','left');
		$this->db->where('p.id', $id);
		$query = $this->db->get('doc_internal p');
		
		return $query->row_array();
	}

	public function doc_internal_doEdit() {
		$ary_data = array(
			'no' 			=> $this->input->post('txt_no'),
			'country_id' 	=> $this->input->post('sel_country'),
			'doc_id5_3' 	=> $this->input->post('sel_doc_type'),
			'name' 			=> $this->input->post('txt_name'),
			'descr' 			=> $this->input->post('txt_descr'),
			'file_path'		=> $this->input->post('hid_filepath'),
			'emp_dep_id'	=> $this->input->post('sel_emp_dep_id'),
			'user_create'	=> $this->session->userdata('user_id'),
			'date_create'	=> date("Y-m-d"),
			'user_modify'	=> $this->session->userdata('user_id'),
			'date_modify'	=> date("Y-m-d")
		);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('doc_internal');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('doc_internal');
			$id = $this->input->post('hid_id');
		}

		return 1;
	}

	public function doc_internal_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('doc_internal');

		return 1;
	}

}