<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config2 extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('language');

		$this->load->model('country_model');
	}

	public function index() {
		$this->load->view('config_message');
	}

	// function group: talk START==============
	public function talk() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-4-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/talk_list');
		$this->load->view('template/footer');
	}

	public function talk_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('talk_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-4-1');
		$data['info'] = $this->talk_model->getTalkById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config2/talk_edit');
		$this->load->view('template/footer');
	}

	public function talk_doEdit() {
		$this->load->model('talk_model');
		echo $this->talk_model->talk_doEdit();
	}

	public function talk_doDel($id) {
		$this->load->model('talk_model');
		echo $this->talk_model->talk_doDel($id);
	}

	public function apiGetTalk() {
		$this->load->model('talk_model');
		echo $this->talk_model->getTalk();
	}
	// function group: talk END==============
	// function group: talkmethod START==============
	public function talkmethod() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-4-2');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/talkmethod_list');
		$this->load->view('template/footer');
	}

	public function talkmethod_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('talkmethod_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-4-2');
		$data['info'] = $this->talkmethod_model->getTalkmethodById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config2/talkmethod_edit');
		$this->load->view('template/footer');
	}

	public function talkmethod_doEdit() {
		$this->load->model('talkmethod_model');
		echo $this->talkmethod_model->talkmethod_doEdit();
	}

	public function talkmethod_doDel($id) {
		$this->load->model('talkmethod_model');
		echo $this->talkmethod_model->talkmethod_doDel($id);
	}

	public function apiGetTalkmethod() {
		$this->load->model('talkmethod_model');
		echo $this->talkmethod_model->getTalkmethod();
	}
	// function group: talkmethod END==============
	// function group: trans START==============
	public function trans() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-4-3');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/trans_list');
		$this->load->view('template/footer');
	}

	public function trans_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('trans_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-4-3');
		$data['info'] = $this->trans_model->getTransById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config2/trans_edit');
		$this->load->view('template/footer');
	}

	public function trans_doEdit() {
		$this->load->model('trans_model');
		echo $this->trans_model->trans_doEdit();
	}

	public function trans_doDel($id) {
		$this->load->model('trans_model');
		echo $this->trans_model->trans_doDel($id);
	}

	public function apiGetTrans() {
		$this->load->model('trans_model');
		echo $this->trans_model->getTrans();
	}
	// function group: trans END==============
	// function group: reasonschool START==============
	public function reasonschool() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-4-4');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/reasonschool_list');
		$this->load->view('template/footer');
	}

	public function reasonschool_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('reasonschool_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-4-4');
		$data['info'] = $this->reasonschool_model->getReasonschoolById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config2/reasonschool_edit');
		$this->load->view('template/footer');
	}

	public function reasonschool_doEdit() {
		$this->load->model('reasonschool_model');
		echo $this->reasonschool_model->reasonschool_doEdit();
	}

	public function reasonschool_doDel($id) {
		$this->load->model('reasonschool_model');
		echo $this->reasonschool_model->reasonschool_doDel($id);
	}

	public function apiGetReasonschool() {
		$this->load->model('reasonschool_model');
		echo $this->reasonschool_model->getReasonschool();
	}
	// function group: reasonschool END==============
	// function group: reasongiveup START==============
	public function reasongiveup() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-4-5');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/reasongiveup_list');
		$this->load->view('template/footer');
	}

	public function reasongiveup_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('reasongiveup_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-4-5');
		$data['info'] = $this->reasongiveup_model->getReasongiveupById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config2/reasongiveup_edit');
		$this->load->view('template/footer');
	}

	public function reasongiveup_doEdit() {
		$this->load->model('reasongiveup_model');
		echo $this->reasongiveup_model->reasongiveup_doEdit();
	}

	public function reasongiveup_doDel($id) {
		$this->load->model('reasongiveup_model');
		echo $this->reasongiveup_model->reasongiveup_doDel($id);
	}

	public function apiGetReasongiveup() {
		$this->load->model('reasongiveup_model');
		echo $this->reasongiveup_model->getReasongiveup();
	}
	// function group: reasongiveup END==============
	// function group: doc START==============
	public function doc($cattype=DOC_TYPE_LETTER) {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		list($cat, $type) = explode('.', $cattype);
		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-'.$cat.'-'.$type);
		$data['account'] = $this->session->userdata('account');
		$data['type'] = $cattype;

		$this->load->view('template/header', $data);
		$this->load->view('config2/doc_list', $data);
		$this->load->view('template/footer');
	}

	public function doc_edit($id = 0,$cattype=DOC_TYPE_LETTER) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('doc_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		list($cat, $type) = explode('.', $cattype);
		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-'.$cat.'-'.$type);
		$data['info'] = $this->doc_model->getDocById(0, $id);
		$data['type'] = $cattype;
		$data['ztype'] = $type;
		$data['zcat'] = $cat;

		$this->load->view('template/header', $data);
		$this->load->view('config2/doc_edit', $data);
		$this->load->view('template/footer');
	}

	public function doc_doEdit() {
		$this->load->model('doc_model');
		echo $this->doc_model->doc_doEdit();
	}

	public function doc_doDel($id) {
		$this->load->model('doc_model');
		echo $this->doc_model->doc_doDel($id);
	}

	public function apiGetDoc($output, $type) {
		$this->load->model('doc_model');
		echo $this->doc_model->getDoc($output, $type);
	}
	// function group: doc END==============
	// function group: schooltime START==============
	public function schooltime() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-6-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/schooltime_list');
		$this->load->view('template/footer');
	}

	public function schooltime_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('school_model');
		$this->load->model('schooltime_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-6-1');
		$data['info'] = $this->schooltime_model->getSchooltimeById($id);
		$data['ary_school'] = $this->school_model->getSchool(1);

		$this->load->view('template/header', $data);
		$this->load->view('config2/schooltime_edit');
		$this->load->view('template/footer');
	}

	public function schooltime_doEdit() {
		$this->load->model('schooltime_model');
		echo $this->schooltime_model->schooltime_doEdit();
	}

	public function schooltime_doDel($id) {
		$this->load->model('schooltime_model');
		echo $this->schooltime_model->schooltime_doDel($id);
	}

	public function apiGetSchooltime() {
		$this->load->model('schooltime_model');
		echo $this->schooltime_model->getSchooltime();
	}
	// function group: schooltime END==============
	// function group: schoolclass START==============
	public function schoolclass() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-6-2');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/schoolclass_list');
		$this->load->view('template/footer');
	}

	public function schoolclass_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('school_model');
		$this->load->model('schoolclass_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-6-2');
		$data['info'] = $this->schoolclass_model->getSchoolclassById($id);
		$data['ary_school'] = $this->school_model->getSchool(1);

		$this->load->view('template/header', $data);
		$this->load->view('config2/schoolclass_edit');
		$this->load->view('template/footer');
	}

	public function schoolclass_doEdit() {
		$this->load->model('schoolclass_model');
		echo $this->schoolclass_model->schoolclass_doEdit();
	}

	public function schoolclass_doDel($id) {
		$this->load->model('schoolclass_model');
		echo $this->schoolclass_model->schoolclass_doDel($id);
	}

	public function apiGetSchoolclass() {
		$this->load->model('schoolclass_model');
		echo $this->schoolclass_model->getSchoolclass();
	}
	// function group: schoolclass END==============	
	// function group: worker_type START==============
	public function worker_type() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-6-6');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config2/worker_type_list');
		$this->load->view('template/footer');
	}

	public function worker_type_edit($id = '0_0') {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('worker_type_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0_0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-6-6');
		$data['info'] = $this->worker_type_model->getWorker_typeById($id);
		$data['ary_worktypemajor'] = json_decode(JSON_WORKER_TYPE, true);

		$this->load->view('template/header', $data);
		$this->load->view('config2/worker_type_edit');
		$this->load->view('template/footer');
	}

	public function worker_type_doEdit() {
		$this->load->model('worker_type_model');
		echo $this->worker_type_model->worker_type_doEdit();
	}

	public function worker_type_doDel($id) {
		$this->load->model('worker_type_model');
		echo $this->worker_type_model->worker_type_doDel($id);
	}

	public function apiGetWorker_type() {
		$this->load->model('worker_type_model');
		echo $this->worker_type_model->getWorker_type();
	}
	// function group: worker_type END==============
}
