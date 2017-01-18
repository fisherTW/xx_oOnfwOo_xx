
<?php
/*
* File:			Doc_sign_model.php
* Version:		-
* Last changed:	2016/05/11getWorker_type
* Purpose:		-
* Author:		Irene
* Copyright:	(C) 2016
* Product:		NFW
*/

class Doc_sign_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// $output:1: only id->name
	public function getDocSign($output=0) {
		$ary_ret = array();

		$this->db->select('p.*, cy.tw as tw_c,d.tw as doc_tw,c.name_tw as c_name_tw, e.name_tw as e_name_tw');
		$this->db->join('client c','c.id=p.client_id','left');
		$this->db->join('employer e','e.id=p.employer_id','left');
		$this->db->join('conf_doc d','p.doc_id5_2=d.id','left');
		$this->db->join('conf_country cy','cy.id=p.country_id','left');

		$query = $this->db->get('doc_sign p');
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

	public function getDocSignById($id) {
		$this->db->select('p.*, cy.tw as tw_c,d.tw as doc_tw,u.account as user_create_name,c.name_tw as c_name_tw, e.name_tw as e_name_tw');
		$this->db->join('client c','c.id=p.client_id','left');
		$this->db->join('employer e','e.id=p.employer_id','left');
		$this->db->join('conf_doc d','p.doc_id5_2=d.id','left');
		$this->db->join('conf_country cy','cy.id=p.country_id','left');
		$this->db->join('user u','u.id=p.user_create','left');
		$this->db->where('p.id', $id);
		$query = $this->db->get('doc_sign p');
		
		return $query->row_array();
	}

	public function docSign_doEdit() {
		$ary_data = array(
			'no' 			=> $this->input->post('txt_no'),
			'country_id' 	=> $this->input->post('sel_country'),
			'doc_id5_2' 	=> $this->input->post('sel_doc_type'),
			'name' 			=> $this->input->post('txt_name'),
			'qty' 			=> $this->input->post('txt_qty'),
			'qtycopy' 		=> $this->input->post('txt_qtycopy'),
			'descr' 			=> $this->input->post('txt_descr'),
			'file_path'		=> $this->input->post('hid_filepath'),
			'client_id'		=> $this->input->post('sel_client_id'),
			'employer_id'	=> $this->input->post('sel_employer_id'),
			'service_id'	=> $this->input->post('sel_service_id'),
			'user_create'	=> $this->session->userdata('user_id'),
			'date_create'	=> date("Y-m-d"),
			'user_modify'	=> $this->session->userdata('user_id'),
			'date_modify'	=> date("Y-m-d")
		);

		if(strval($this->input->post('hid_id')) == '0') {
			$this->db->set($ary_data);
			$this->db->insert('doc_sign');
			$id = $this->db->insert_id();
		} else {
			unset($ary_data['user_create']);
			unset($ary_data['date_create']);
			$this->db->set($ary_data);
			$this->db->where('id', $this->input->post('hid_id'));
			$this->db->update('doc_sign');
			$id = $this->input->post('hid_id');
		}

		return 1;
	}

	public function docSign_doDel($id) {
		$this->db->where('id', $id);
		$this->db->delete('doc_sign');

		return 1;
	}

}