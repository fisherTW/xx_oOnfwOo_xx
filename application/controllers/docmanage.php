<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docmanage extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('language');

		$this->ary_is_enable = json_decode(JSON_STATUS_CASE, true);
		$this->ary_sendway = array(
			1 => '快遞',
			2 => '託帶'
		);
		$this->ary_site_send = array(
			1 => '台灣',
			2 => '印尼雅加達',
			3 => '印尼瑪瑯',
			4 => '越南河內',
			5 => '越南藝安',
			6 => '越南胡志明',
			7 => '菲律賓馬尼拉',
			8 => '台灣客戶'
		);
		$this->ary_pkg_detail_type = array(
			1 => '互貿文件',
			2 => '其他',
			3 => '台灣',
			4 => '越南',
			5 => '印尼',
			6 => '菲律賓'
		);
		$this->ary_pkg_detail_pkg_2 = array(
			1 => '請看資料備註'
		);
		$this->ary_pkg_detail_pkg_3 = array(
			1 => '授權書(印越菲)',
			2 => '需求書(印越菲)',
			3 => '勞動契約(印越菲)',
			4 => '認證函(越)',
			5 => '工廠3照(印越菲)',
			6 => '雇主身分證影本(印越菲)',
			7 => '資料表(菲)',
			8 => '雇主英文資料(菲)',
			9 => '特別授權書-台中(菲)',
			10 => '特別授權書-外仲(菲)',
			11 => 'UNDERTAKING(菲)',
			12 => '撤銷授權書(菲)'			
		);
		$this->ary_pkg_detail_pkg_4 = array(
			1 => '授權書',
			2 => '需求書',
			3 => '勞動契約',
			4 => '認證函',
			5 => '護照影本',
			6 => '勞工大頭照',
			7 => '工資切結書',
			8 => '入境簽屬文件'
		);
		$this->ary_pkg_detail_pkg_5 = array(
			1 => '授權書',
			2 => '需求書',
			3 => '勞動契約',
			4 => '護照影本',
			5 => '勞工大頭照',
			6 => '工資切結書',
			7 => '入境簽屬文件'			
		);

		$this->ary_pkg_detail_pkg_6 = array(
			1 => '授權書',
			2 => '需求書',
			3 => '勞動契約',
			4 => '特別授權書-台中(菲)',
			5 => '特別授權書-外仲(菲)',
			6 => 'UNDERTAKING(菲)',
			7 => '撤銷授權書(菲)',
			8 => '護照影本',
			9 => '勞工大頭照',
			10 => '工資切結書',
			11 => '入境簽屬文件'
		);

	}

	public function index() {
		$this->load->view('docmanage_message');
	}

	// function group: letter START==============
	public function letter() {
		$this->load->helper('url');
		$this->load->model('letter_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('5-1-1');
		$data['account'] = $this->session->userdata('account');
		$data['json_is_enable'] = json_encode($this->ary_is_enable);

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/letter_list');
		$this->load->view('template/footer');
	}

	public function letter_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('letter_model');
		$this->load->model('country_model');
		$this->load->model('emp_model');
		$this->load->model('doc_model');
		$this->load->model('auth_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('5-1-1');
		$data['info'] = $this->letter_model->getLetterById($id);
		$data['ary_letter_auth'] = $this->letter_model->getLetterAuthByLetterId($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_emp'] = $this->emp_model->getEmp(1);		
		$data['ary_type'] = $this->doc_model->getDoc(1,DOC_TYPE_LETTER);
		$data['ary_auth_id'] = $this->auth_model->getAuth(1);
		$data['ary_is_enable'] = $this->ary_is_enable;
		$data['ary_site_receive'] = $this->ary_site_send;

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/letter_edit');
		$this->load->view('template/footer');
	}

	public function letter_doEdit() {
		$this->load->model('letter_model');
		echo $this->letter_model->letter_doEdit();
	}

	public function letter_doDel($id) {
		$this->load->model('letter_model');
		echo $this->letter_model->letter_doDel($id);
	}

	public function apiGetLetter() {
		$this->load->model('letter_model');
		echo $this->letter_model->getLetter();
	}

	public function apiGetLetterByType() {
		$this->load->helper('form');
		$this->load->model('letter_model');
		$ary_tmp = $this->letter_model->getLetterByType($this->input->post('type'), $this->input->post('employer_id'));
		echo form_dropdown('sel_letter_id', $ary_tmp[2], '', 'class="form-control"');
	}


	// function group: letter END==============
	// function group: letter_inbound START==============
	public function letter_inbound() {
		$this->load->helper('url');
		$this->load->model('letter_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('5-1-2');
		$data['account'] = $this->session->userdata('account');
		$data['json_is_enable'] = json_encode($this->ary_is_enable);

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/letter_inbound_list');
		$this->load->view('template/footer');
	}

	public function letter_inbound_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('letter_model');
		$this->load->model('country_model');
		$this->load->model('doc_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('5-1-2');
		$data['info'] = $this->letter_model->getLetter_inboundById($id);
		$data['ary_is_enable'] = $this->ary_is_enable;
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_type'] = $this->doc_model->getDocById(1, LETTER_TYPE_RECRUIT);			
		if(strval($id) == '0') {
			$ary_tmp = $this->letter_model->getLetterByType(LETTER_TYPE_RECRUIT);
		} else {
			$ary_tmp = $this->letter_model->getLetterByType(LETTER_TYPE_RECRUIT, $data['info']['employer_id']);
		}
		$data['ary_letter_id'] = $ary_tmp[2];
		$data['ary_site_receive'] =  $this->ary_site_send;

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/letter_inbound_edit');
		$this->load->view('template/footer');
	}

	public function letter_inbound_doEdit() {
		$this->load->model('letter_model');
		echo $this->letter_model->letter_inbound_doEdit();
	}

	public function letter_inbound_doDel($id) {
		$this->load->model('letter_model');
		echo $this->letter_model->letter_inbound_doDel($id);
	}

	public function apiGetLetter_inbound() {
		$this->load->model('letter_model');
		echo $this->letter_model->getLetter_inbound();
	}
	public function apiGetLetter_id() {
		$this->load->model('letter_model');
		echo $this->letter_model->getLetter_id();
	}

	// function group: letter_inbound END==============	
	// function group: packageTitle START==============
	public function packageTitle() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('5-1-3');
		$data['account'] = $this->session->userdata('account');
		$data['json_sendway'] = json_encode($this->ary_sendway);
		$data['json_site_send'] = json_encode($this->ary_site_send);
		$data['json_site_receive'] = json_encode($this->ary_site_send);
		
		$this->load->view('template/header', $data);
		$this->load->view('docmanage/packageTitle_list');
		$this->load->view('template/footer');
	}

	public function packageTitle_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('letter_model');
		$this->load->model('country_model');
		$this->load->model('emp_model');
		$this->load->model('doc_model');
		$this->load->model('auth_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('5-1-3');
		$data['info'] = $this->letter_model->getPackageTitleById($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_emp'] = $this->emp_model->getEmp(1);
		$data['ary_type'] = $this->doc_model->getDoc(1,DOC_TYPE_LETTER);
		$data['ary_auth_id'] = $this->auth_model->getAuth(1);
		$data['ary_sendway'] = $this->ary_sendway;
		$data['ary_site_send'] = $this->ary_site_send;
		$data['ary_site_receive'] = $this->ary_site_send;
		$data['ary_site_paper'] = $this->ary_site_send;

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/packageTitle_edit');
		$this->load->view('template/footer');
	}

	public function packageTitle_doEdit() {
		$this->load->model('letter_model');
		echo $this->letter_model->packageTitle_doEdit();
	}

	public function packageTitle_doDel($id) {
		$this->load->model('letter_model');
		echo $this->letter_model->packageTitle_doDel($id);
	}

	public function apiGetPackageTitle() {
		$this->load->model('letter_model');
		echo $this->letter_model->getPackageTitle();
	}
	// function group: packageTitle END==============
	// function group: packageDetail START==============
	public function packageDetail() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('5-1-4');
		$data['account'] = $this->session->userdata('account');
		$data['json_sendway'] = json_encode($this->ary_sendway);
		$data['json_site_send'] = json_encode($this->ary_site_send);
		$data['json_site_receive'] = json_encode($this->ary_site_send);
		
		$this->load->view('template/header', $data);
		$this->load->view('docmanage/packageDetail_list');
		$this->load->view('template/footer');
	}

	public function apiGetPackageDetailLetterNoSel() {
		$this->load->helper('form');
		$this->load->model('letter_model');
		$ary_ret = array();

		$ary_ret = $this->letter_model->getLetter_inboundByNo($this->input->post('letter_id'));
		echo form_dropdown('sel_inbound_id', $ary_ret, '', 'class="form-control"');
	}

	public function apiGetPackageDetailLetterNo() {
		$this->load->helper('form');
		$this->load->model('letter_model');
		$ary_tmp = array();
		$ary_tmp1 = array();
		$ary_ret = array();

		$ary_tmp = $this->letter_model->getLetterByno($this->input->post('employer_id'));
		$ary_tmp1 = $this->letter_model->getLetter_inboundByNo(key($ary_tmp));
		$ary_ret[0] = form_dropdown('sel_letter_id', $ary_tmp, '', 'class="form-control"');
		$ary_ret[1] = form_dropdown('sel_inbound_id', $ary_tmp1, '', 'class="form-control"');
		echo json_encode($ary_ret);
	}	

	public function apiGetPackageDetailSentIdSel($sent_id,$output_sent_id=0) {
		$this->load->helper('form');
		$this->load->model('letter_model');

		$str_ret = array();
		$ary_sent_id_default = array();

		$ary_sent_id_default = $this->letter_model->getPackageTitleId();
		$str_ret[1] = $ary_sent_id_default[1][$sent_id];
		$str_ret[1] = $ary_sent_id_default[1][$sent_id];
		$str_ret[2] = $ary_sent_id_default[2][$sent_id];
		$ary_sendway = $ary_sent_id_default[3][$sent_id];
		$ary_sendway2 = $this->ary_sendway;
		$str_ret[3] = $ary_sendway2[$ary_sendway];
		$ary_site_send = $ary_sent_id_default[4][$sent_id];
		$ary_site_send2 = $this->ary_site_send;
		$str_ret[4] = $ary_site_send2[$ary_site_send];
		$ary_site_receive = $ary_sent_id_default[5][$sent_id];
		$ary_site_receive2 = $this->ary_site_send;
		$str_ret[5] = $ary_site_receive2[$ary_site_receive];

		if($output_sent_id == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}

	public function apiGetPackageDetailTypeSel($type,$output_type=0,$row=0,$package=0) {
		$this->load->helper('form');
		$this->load->model('worker_type_model');

		$str_ret = '';

		switch(strval($type)) {
			case '1':
				$ary_package_default = json_decode(JSON_WORKER_TYPE, true);
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_package = ($package == 0 ? '' : $package);
				$str_ret = form_dropdown('package[]', $ary_package_default, $str_package, 'class="form-control" '.$str);
				break;
			case '2':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_package = ($package == 0 ? '' : $package);
				$str_ret = form_dropdown('package[]', $this->ary_pkg_detail_pkg_2, $str_package, 'class="form-control" '.$str);
				break;
			case '3':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_package = ($package == 0 ? '' : $package);
				$str_ret = form_dropdown('package[]', $this->ary_pkg_detail_pkg_3, $str_package, 'class="form-control" '.$str);
				break;
			case '4':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_package = ($package == 0 ? '' : $package);
				$str_ret = form_dropdown('package[]', $this->ary_pkg_detail_pkg_4, $str_package, 'class="form-control" '.$str);
				break;
			case '5':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_package = ($package == 0 ? '' : $package);
				$str_ret = form_dropdown('package[]', $this->ary_pkg_detail_pkg_5, $str_package, 'class="form-control" '.$str);
				break;												
			case '6':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_package = ($package == 0 ? '' : $package);
				$str_ret = form_dropdown('package[]', $this->ary_pkg_detail_pkg_6, $str_package, 'class="form-control" '.$str);
				break;
			default:
				# code...
				break;
		}

		if($output_type == 1) {
			return $str_ret;
		} else {
			echo $str_ret;	
		}
	}

	public function packageDetail_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('letter_model');
		$this->load->model('country_model');
		$this->load->model('emp_model');
		$this->load->model('doc_model');
		$this->load->model('auth_model');
		$this->load->model('worker_type_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('5-1-4');
		$data['info'] = $this->letter_model->getPackageDetailById($id);
		$data['ary_packageDetail_auth'] = $this->letter_model->getpackageDetailAuthById($id);
		for($i=0; $i < count($data['ary_packageDetail_auth']); $i++) {
			$tmp_id = $data['ary_packageDetail_auth'][$i]['type'];
			$tmp_package = $data['ary_packageDetail_auth'][$i]['package'];
			$data['ary_packageDetail_auth'][$i]['sel_2_html'] = $this->apiGetPackageDetailTypeSel($tmp_id,1, ($i+1),$tmp_package);
		}

		$ary_tmp = $this->letter_model->getLetterByType(LETTER_TYPE_RECRUIT);
		$data['ary_letter_id'] = $ary_tmp[2];
		$ary_tmp = $this->letter_model->getPackageTitleId(1);
		$data['ary_sent_id'] = $ary_tmp[0];
		$data['ary_pkg_detail_type'] = $this->ary_pkg_detail_type;
		$data['ary_package_default'] = json_decode(JSON_WORKER_TYPE, true);
		$min_id = $this->letter_model->getPackageTitleByminsid();
		$data['ary_sel_defult'] = $this->apiGetPackageDetailSentIdSel($min_id['id'],1);

		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_sendway'] = $this->ary_sendway;
		$data['ary_site_send'] = $this->ary_site_send;
		$data['ary_site_receive'] = $this->ary_site_send;

		if(strval($id) == '0') {	// create
			reset($data['ary_letter_id']);
			$key_first = key($data['ary_letter_id']);
			$data['ary_inbound_id'] = $this->letter_model->getLetter_inboundByNo($key_first);
		} else {	// edit
			$data['ary_inbound_id'] = $this->letter_model->getLetter_inboundByNo($data['info']['letter_id']);
		}

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/packageDetail_edit');
		$this->load->view('template/footer');
	}

	public function packageDetail_doEdit() {
		$this->load->model('letter_model');
		echo $this->letter_model->packageDetail_doEdit();
	}

	public function packageDetail_doDel($id) {
		$this->load->model('letter_model');
		echo $this->letter_model->packageDetail_doDel($id);
	}

	public function apiGetPackageDetail() {
		$this->load->model('letter_model');
		echo $this->letter_model->getPackageDetail();
	}

	public function apiGetPackageDetailBypkgtitleid($id='') {
		$this->load->model('letter_model');
		echo $this->letter_model->getPackageDetailBypkgtitleid($id);
	}
	// function group: packageDetail END==============
	// function group: docSign START==============
	public function docSign() {
		$this->load->helper('url');
		$this->load->model('doc_sign_model');
		
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('5-2-1');
		$data['account'] = $this->session->userdata('account');
		$data['json_info'] = json_encode($this->doc_sign_model->getDocSign());
		
		$this->load->view('template/header', $data);
		$this->load->view('docmanage/docSign_list');
		$this->load->view('template/footer');
	}

	public function docSign_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('doc_sign_model');
		$this->load->model('country_model');
		$this->load->model('emp_model');
		$this->load->model('doc_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('5-2-1');
		$data['info'] = $this->doc_sign_model->getDocSignById($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_doc_type'] = $this->doc_model->getDoc(1,5.2);
		$data['ary_emp'] = $this->emp_model->getEmp(1);

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/docSign_edit');
		$this->load->view('template/footer');
	}

	public function docSign_doEdit() {
		$this->load->model('doc_sign_model');
		echo $this->doc_sign_model->docSign_doEdit();
	}

	public function docSign_doDel($id) {
		$this->load->model('doc_sign_model');
		echo $this->doc_sign_model->docSign_doDel($id);
	}

	public function apiGetDocSign() {
		$this->load->model('doc_sign_model');
		echo $this->doc_sign_model->getDocSign();
	}
	// function group: docSign END==============
	// function group: doc_internal START==============
	public function doc_internal() {
		$this->load->helper('url');
		$this->load->model('doc_internal_model');
		
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('5-2-2');
		$data['account'] = $this->session->userdata('account');
		
		$this->load->view('template/header', $data);
		$this->load->view('docmanage/doc_internal_list');
		$this->load->view('template/footer');
	}

	public function doc_internal_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('doc_internal_model');
		$this->load->model('country_model');
		$this->load->model('emp_dep_model');
		$this->load->model('doc_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}
		
		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('5-2-2');
		$data['info'] = $this->doc_internal_model->getDoc_internalById($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_doc_type'] = $this->doc_model-g>getDoc(1,5.3);
		$data['ary_emp_dep'] = $this->emp_dep_model->getEmp_dep(1);

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/doc_internal_edit');
		$this->load->view('template/footer');
	}

	public function doc_internal_doEdit() {
		$this->load->model('doc_internal_model');
		echo $this->doc_internal_model->doc_internal_doEdit();
	}

	public function doc_internal_doDel($id) {
		$this->load->model('doc_internal_model');
		echo $this->doc_internal_model->doc_internal_doDel($id);
	}

	public function apiGetDoc_internal() {
		$this->load->model('doc_internal_model');
		echo $this->doc_internal_model->getDoc_internal();
	}
	// function group: doc_internal END==============

	public function apiSearch() {
		$this->load->helper('form');
		switch ($this->input->post('type')) {
			case 'client':
				$this->load->model('client_model');
				$ary = $this->client_model->getClientBySearch();
				break;
			case 'employer':
				$this->load->model('employer_model');
				$ary = $this->employer_model->getEmployerBySearch();
				break;
			default:
				$ary = array();
				break;
		}

		echo form_dropdown('sel_search', $ary, 0, "id='sel_search' class='form-control' size='10'");
	}

	public function report() {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('auth_model');
		
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('report_letter_emp');
		$data['title2'] = $this->lang->line('report_letter_manage');
		$data['account'] = $this->session->userdata('account');
		$ary_tmp = $this->auth_model->getAuth(1);
		$data['ary_auth_id'] = $this->setCriteriaSelect($ary_tmp);

		$this->load->view('template/header', $data);
		$this->load->view('docmanage/report');
		$this->load->view('template/footer');
	}
}


/* End of file docmanage.php */
/* Location: ./application/controllers/docmanage.php */