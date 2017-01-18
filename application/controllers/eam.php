<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eam extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('language');

		$this->ary_eye_color = array(
			1 => '無',
			2 => '有',
			3 => '色弱(紅)',
			4 => '色弱(藍)',
			5 => '色弱(綠)',
			6 => '色弱(黃)'
		);
		$this->ary_diet = array(
			1 => '葷',
			2 => '素',
			3 => '葷，不食豬肉',
			4 => '願意配合雇主'
		);
		$this->ary_maidType = array(
			1 => '幫庸',
			2 => '看護'
		);
		$this->ary_friend = array(
			1 => '親戚',
			2 => '朋友'
		);
		$this->ary_typeData = array(
			1 => '學習相片',
			2 => '老師評語',
			3 => '視訊評語'
		);
		$this->ary_labor_type = array(
			1 => '全部',
			2 => '人力庫',
			3 => '學員'
		);
		$this->ary_gender = array(
			1 => '男',
			2 => '女'
		);
		$this->ary_type = array(
			1 => '正取',
			2 => '備取'
		);		
	}
	// function group: labor START==============
	public function labor() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-1-1');
		$data['account'] = $this->session->userdata('account');	
		$data['type'] = '411';
		$data['json_worker_kind'] = JSON_WORKER_KIND;

		$this->load->view('template/header', $data);
		$this->load->view('eam/labor_list');
		$this->load->view('template/footer');
	}

	public function labor2() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-1-2');
		$data['account'] = $this->session->userdata('account');
		$data['type'] = '412';
		$data['json_worker_kind'] = JSON_WORKER_KIND;		

		$this->load->view('template/header', $data);
		$this->load->view('eam/labor_list');
		$this->load->view('template/footer');
	}
	public function labor_edit($id = 0,$type) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('labor_model');
		$this->load->model('country_model');
		$this->load->model('school_model');
		$this->load->model('worker_type_model');
		$this->load->model('emp_model');
		$this->load->model('reasonschool_model');
		$this->load->model('doc_model');
		$this->load->model('schoolclass_model');
		$this->load->model('letter_model');
		$this->load->model('flight_model');
		$this->load->model('hire_model');
		$this->load->model('currency_model');
		$this->load->model('fee_model');
		$this->load->model('election_model');
		$this->load->model('client_model');
		$this->load->model('employer_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['ary_lang'] = array();
		$data['ary_lang_sample'] = array();
		$data['ary_life'] = array();
		$data['ary_life_qty'] = array();
		$data['ary_life_child'] = array();
		$data['ary_life_child_sample'] = array();
		$data['ary_labor_auth'] = array();

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		if ($type == '411') {
			$data['func'] = '411';
			$tt = $this->lang->line('4-1-1');	
		} elseif ($type == '412') {
			$data['func'] = '412';	
			$tt = $this->lang->line('4-1-2');	
		} else {
			$data['func'] = '241';	
			$tt = $this->lang->line('2-4-1');	
		}
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$tt;
		$data['info'] = $this->labor_model->getLaborById($id);
		$data['ary_labor_auth'] = $this->labor_model->getLaborAuthByLaborId($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_school'] = $this->school_model->getSchool(1);
		$data['ary_worker_kind'] = json_decode(JSON_WORKER_KIND, true);
		$data['ary_worker_type_major'] = json_decode(JSON_WORKER_TYPE, true);
		$data['ary_worker_type_minor'] = $this->worker_type_model->getWorker_type(1);
		
		if (strval($id) != '0') {
			$temp = $this->labor_model->getLaborById($id);

			$data['ary_lang'] = json_decode($temp["a_language"]);
			$data['ary_lang_sample'] = ($data['ary_lang'] == null ? array() : array(array_shift($data['ary_lang'])));

			$data['ary_life'] = json_decode($temp["a_life"]);
			$data['ary_life_qty'] = json_decode($temp["a_life_qty"]);

			$data['ary_life_child'] = json_decode($temp["a_life_child"]);
			$data['ary_life_child_sample'] = ($data['ary_life_child'] == null ? array() : array(array_shift($data['ary_life_child'])));
			
			$data['worker_type_major'] = $temp["a_worker_type_major"];
			$data['country_id'] = $temp["a_country_id"];

			$data['labor_quote'] = $this->election_model->getLaborData($id);	
		} else {
			$temp = array_keys($data['ary_worker_type_major']);
			$data['worker_type_major'] = $temp[0];
			$temp = array_keys($data['ary_country']);
			$data['country_id'] = $temp[0];
		}
		
		$data['ary_emp'] = $this->emp_model->getEmp(1);
		$data['ary_reasonschool'] = $this->reasonschool_model->getReasonschool(1);
		$data['ary_eye_color'] = $this->ary_eye_color;
		$data['ary_doc_id6_3'] = $this->doc_model->getDoc(1,"6.3");
		$data['ary_doc_id6_7'] = $this->doc_model->getDoc(1,"6.7");
		$data['ary_diet'] = $this->ary_diet;
		$data['ary_language'] = json_decode(JSON_LANGUAGE, true);
		$data['ary_level'] = json_decode(JSON_LEVEL, true);
		$data['ary_marriage'] = json_decode(JSON_MARRIAGE, true);
		unset($data['ary_marriage'][1]);
		$data['ary_education'] = json_decode(JSON_EDUCATION, true);
		unset($data['ary_education'][1]);
		$data['ary_laborLicense'] = $this->labor_model->getLaborLicenseByLaborId($id);
		$data['ary_laborFactory'] = $this->labor_model->getLaborFactoryByLaborId($id);
		$data['ary_laborMaid'] = $this->labor_model->getLaborMaidByLaborId($id);
		$data['ary_maidType'] = $this->ary_maidType;
		$data['ary_friend'] = $this->ary_friend;
		$data['ary_laborContact1'] = $this->labor_model->getLaborContactByLaborId($id,1);
		$data['ary_laborContact2'] = $this->labor_model->getLaborContactByLaborId($id,2);
		$data['ary_laborContact3'] = $this->labor_model->getLaborContactByLaborId($id,3);
		$data['ary_schoolclass'] = $this->schoolclass_model->getSchoolclass(1);
		$data['ary_typeData'] = $this->ary_typeData;
		$data['ary_laborStaySchool1'] = $this->labor_model->getLaborStaySchoolByLaborId($id,1);
		$data['ary_laborStaySchool2'] = $this->labor_model->getLaborStaySchoolByLaborId($id,2);
		$data['ary_laborLearn'] = $this->labor_model->getLaborLearnByLaborId($id);
/*
		$data['ary_letter_id'] = array();
		$data['ary_inbound_id'] = $this->letter_model->getLetter_inboundByNo($data['info']['b_letter_id']);
*/
		$data['ary_arrspot'] = json_decode(JSON_ARRSPOT, true);
		$data['ary_laborCase'] = $this->labor_model->getLaborCaseByLaborId($id);
		$data['ary_laborInbound'] = $this->labor_model->getLaborInboundByLaborId($id);
		$data['ary_flight_id'] = $this->flight_model->getFlightByNumber(1);
		$data['ary_flight_id2'] = $this->flight_model->getFlightByNumber(1);
		$data['ary_flight_id2'][0] = '請選擇';
		ksort($data['ary_flight_id2']);
		$data['ary_laborOutput'] = $this->labor_model->getlaborOutputByLaborId($id);
		$data['ary_laborRun'] = $this->labor_model->getlaborRunByLaborId($id);
		$data['ary_client'] = $this->client_model->getClient(1);
		$data['ary_employer'] = $this->employer_model->getEmployer(1);
		$data['ary_arrspot'] = json_decode(JSON_ARRSPOT, true);
		
		$this->load->view('template/header', $data);
		$this->load->view('eam/labor_edit');
		$this->load->view('template/footer');
	}

	public function labor_doEdit() {
		$this->load->model('labor_model');
		echo $this->labor_model->labor_doEdit();
	}

	public function labor_doDel($id) {
		$this->load->model('labor_model');
		echo $this->labor_model->labor_doDel($id);
	}

	public function apiGetLabor($type) {
		$this->load->model('labor_model');
		echo $this->labor_model->getLabor(0,$type);
	}

	public function apiGetFlightById() {
		$this->load->model('flight_model');
		echo json_encode($this->flight_model->getFlightById($this->input->post('id')));	
	}
	// function group: labor END==============
	// function group: fee_labor START==============
	public function fee_labor() {
		$this->load->helper('url');
		$this->load->model('audit_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-1-4');
		$data['account'] = $this->session->userdata('account');	
		$data['type'] = '414';

		$this->load->view('template/header', $data);
		$this->load->view('eam/fee_labor_list');
		$this->load->view('template/footer');
	}

	public function fee_labor2() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-1-5');
		$data['account'] = $this->session->userdata('account');
		$data['type'] = '415';

		$this->load->view('template/header', $data);
		$this->load->view('eam/fee_labor_list');
		$this->load->view('template/footer');
	}

	public function fee_labor_audit($id, $type) {
		$this->fee_labor_edit($id, $type, true);
	}

	public function fee_labor_edit($id = 0, $type, $is_audit = false) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('feelabor_model');
		$this->load->model('audit_model');
		$this->load->model('school_model');
		$this->load->model('fee_model');
		$this->load->model('currency_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		if ($type == '414') {
			$data['func'] = $type;
			$tt = $this->lang->line('4-1-4');	
			$data['audit'] = $this->audit_model->getAuditInfo($type, $id);		
		} elseif ($type == '415') {
			$data['func'] = $type;	
			$tt = $this->lang->line('4-1-5');	
			$data['audit'] = $this->audit_model->getAuditInfo($type, $id);
		}		
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$tt;
		$data['info'] = $this->feelabor_model->getFeeLaborById($id);
		$data['ary_school'] = $this->school_model->getSchool(1);
		$data['ary_labor_id_defult'] = $this->apiGetLaborById(1);
		$data['ary_feeLaborFee'] = $this->feelabor_model->getFeeLaborFeeByFeeLaborId($id);
		$data['ary_fee_type'] = json_decode(JSON_FEETYPE, true);
		$data['ary_fee_id'] = $this->fee_model->getfee(1);
		$data['ary_currency'] = $this->currency_model->getCurrency(1);
		$data['ary_country'] = $this->school_model->getSchool(1);
		$data['is_audit'] = $is_audit;

		$this->load->view('template/header', $data);
		$this->load->view('eam/fee_labor_edit');
		$this->load->view('audit/audit');
		$this->load->view('template/footer_btn');		
	}

	public function fee_labor_doEdit($type) {
		$this->load->model('feelabor_model');
		echo $this->feelabor_model->feeLabor_doEdit($type);
	}

	public function fee_labor_doDel($id) {
		$this->load->model('feelabor_model');
		echo $this->feelabor_model->fee_labor_doDel($id);
	}

	public function apiGetFeeLabor($type,$func) {
		$this->load->model('feelabor_model');
		$this->load->model('audit_model');
		$json = $this->feelabor_model->getFeeLabor(0,$type);

		$ary_cou = json_decode($json, true);

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_tmp = $this->audit_model->getAuditInfo($func,$ary_cou[$key]['id']);
				$ary_cou[$key]['a_result'] = $ary_tmp['log']['result'];
				$ary_cou[$key]['a_status'] = $this->lang->line($ary_tmp['log']['status']);
				$ary_cou[$key]['a_descr'] = $ary_tmp['log']['descr'];
				if(strval($ary_tmp['log']['max_group_log']) == '0') {
					$ary_cou[$key]['is_show_audit'] = false;
					$ary_cou[$key]['a_user'] = '-';
					$ary_cou[$key]['a_date'] = '-';
				} else {
					$ary_cou[$key]['is_show_audit'] = true;
					$ary_tmp = end($ary_tmp['log']['ary_lastRound']);
					$ary_cou[$key]['a_user'] = $ary_tmp['tw'];
					$ary_cou[$key]['a_date'] = $ary_tmp['date'];
				}
			}
		}
		echo json_encode($ary_cou);

	}

	public function fee_labor_doAudit() {
		$this->load->model('audit_model');
		echo $this->audit_model->audit_doInsert('414',$this->input->post('result'),$this->input->post('id'),1);
	}

	public function apiGetLaborById($output=0) {
		$this->load->model('labor_model');
		$this->load->model('school_model');
		$ary_labor_id_default = $this->labor_model->getLaborById($this->input->post('labor_id'));

		if($output == 1) {
			return $ary_labor_id_default;
		} else {
			echo json_encode($ary_labor_id_default);
		}
	}

	public function apiGetFerByCurrencyId() {
		$this->load->model('currency_model');
		$ary_Fer_id_default = $this->currency_model->getCurrencyById($this->input->post('id'));

		echo json_encode($ary_Fer_id_default);
	}	
	// function group: fee_labor END==============
	// function group: tutor START==============
	public function tutor() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-3-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('eam/tutor_list');
		$this->load->view('template/footer');
	}

	public function tutor_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('tutor_model');
		$this->load->model('emp_model');
		$this->load->model('school_model');
		$this->load->model('schoolclass_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('4-3-1');
		$data['info'] = $this->tutor_model->getTutorById($id);	
		$data['ary_school'] = $this->school_model->getSchool(1);	
		$data['ary_schoolclass'] = $this->schoolclass_model->getSchoolclass(1);					
		$data['ary_emp'] = $this->emp_model->getEmp(1);		

		$this->load->view('template/header', $data);
		$this->load->view('eam/tutor_edit');
		$this->load->view('template/footer');
	}

	public function tutor_doEdit() {
		$this->load->model('tutor_model');
		echo $this->tutor_model->tutor_doEdit();
	}

	public function tutor_doDel($id) {
		$this->load->model('tutor_model');
		echo $this->tutor_model->tutor_doDel($id);
	}

	public function apiGetTutor() {
		$this->load->model('tutor_model');
		echo $this->tutor_model->getTutor();
	}
	// function group: tutor END==============	
	// function group: course START==============
	public function course() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-4-2');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('eam/course_list');
		$this->load->view('template/footer');
	}

	public function course_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('course_model');
		$this->load->model('emp_model');
		$this->load->model('school_model');
		$this->load->model('schoolclass_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('4-4-2');
		$data['info'] = $this->course_model->getCourseById($id);	
		$data['ary_school'] = $this->school_model->getSchool(1);	
		$data['ary_schoolclass'] = $this->schoolclass_model->getSchoolclass(1);					
		$data['ary_emp'] = $this->emp_model->getEmp(1);		

		$this->load->view('template/header', $data);
		$this->load->view('eam/course_edit');
		$this->load->view('template/footer');
	}

	public function course_doEdit() {
		$this->load->model('course_model');
		echo $this->course_model->course_doEdit();
	}

	public function course_doDel($id) {
		$this->load->model('course_model');
		echo $this->course_model->course_doDel($id);
	}

	public function apiGetCourse() {
		$this->load->model('course_model');
		echo $this->course_model->getCourse();
	}
	// function group: course END==============	
	// function group: curriculum START==============
	public function curriculum() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-4-3');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('eam/curriculum_list');
		$this->load->view('template/footer');
	}

	public function curriculum_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('curriculum_model');
		$this->load->model('school_model');
		$this->load->model('schoolclass_model');

		$data['init_detail'] = '';

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('4-4-3');
		$data['info'] = $this->curriculum_model->getCurriculumById($id);	
		$data['ary_school'] = $this->school_model->getSchool(1);	
		$data['ary_schoolclass'] = $this->schoolclass_model->getSchoolclass(1);
		if (strval($id) != '0') {
			$data['ary_detail'] = $this->curriculum_model->getCurriculum_detailByCurriculumId($id);
			$data['init_detail'] = $this->apiGetCourseId($data['ary_detail']);
		}
		$this->load->view('template/header', $data);
		$this->load->view('eam/curriculum_edit');
		$this->load->view('template/footer');
	}

	public function curriculum_doEdit() {
		$this->load->model('curriculum_model');
		echo $this->curriculum_model->curriculum_doEdit();
	}

	public function curriculum_doDel($id) {
		$this->load->model('curriculum_model');
		echo $this->curriculum_model->curriculum_doDel($id);
	}

	public function apiGetCurriculum() {
		$this->load->model('curriculum_model');
		echo $this->curriculum_model->getCurriculum();
	}

	public function apiGetCourseId($ary_data = null) {
		$this->load->helper('url');		
		$this->load->helper('form');		
		$this->load->model('course_model');
		if (is_null($ary_data)) {
			$ary_course = $this->course_model->getCourseBySchool($this->input->post('school'),$this->input->post('school_class'));
		} else {
			$ary_course = $this->course_model->getCourse(1);
			$ary_data = $ary_data;
		}
		$str_ret = '';
		for ($i = 0; $i < 10; $i++) {
			$str_ret .= '<div class="panel panel-primary">';
			$str_ret .= '<div class="panel-heading">'.$this->lang->line('section'.($i + 1)).'</div>';
			$str_ret .= '<div class="panel-body">';
			for ($j = 0; $j < 6; $j++) {
				$str_ret .= '<div class="col-sm-2">';
				$str_ret .= form_dropdown('sel_course_id'.($i + 1).($j + 1), $ary_course, $ary_data[($i + 1)][($j + 1)], "class='form-control'");
				$str_ret .= '</div>';
			}
			$str_ret .= '</div>';
			$str_ret .= '</div>';
		}	

		if (is_null($ary_data)) {
			echo $str_ret;
		} else {
			return $str_ret;
		}
	}
	// function group: curriculum END==============		
	// function group: examination START==============
	public function examination() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-4-4');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('eam/examination_list');
		$this->load->view('template/footer');
	}

	public function examination_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('examination_model');
		$this->load->model('school_model');
		$this->load->model('schoolclass_model');
		$this->load->model('course_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('4-4-4');
		$data['info'] = $this->examination_model->getExaminationById($id);	
		$data['ary_school'] = $this->school_model->getSchool(1);	
		$data['ary_schoolclass'] = $this->schoolclass_model->getSchoolclass(1);
		$data['ary_course'] = $this->course_model->getCourse(1);

		$this->load->view('template/header', $data);
		$this->load->view('eam/examination_edit');
		$this->load->view('template/footer');
	}

	public function examination_doEdit() {
		$this->load->model('examination_model');
		echo $this->examination_model->examination_doEdit();
	}

	public function examination_doDel($id) {
		$this->load->model('examination_model');
		echo $this->examination_model->examination_doDel($id);
	}

	public function apiGetExamination() {
		$this->load->model('examination_model');
		echo $this->examination_model->getExamination();
	}
	// function group: examination END==============
	// function group: labor_school START==============
	public function labor_school() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-4-5');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('eam/labor_school_list');
		$this->load->view('template/footer');
	}

	public function labor_school_edit($id = '0_0') {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('labor_school_model');
		$this->load->model('school_model');
		$this->load->model('schoolclass_model');
		$this->load->model('labor_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0_0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('4-4-5');
		$data['info'] = $this->labor_school_model->getSchoolLaborById($id,0);	
		$data['ary_school'] = $this->school_model->getSchool(1);	
		$data['ary_schoolclass'] = $this->schoolclass_model->getSchoolclass(1);
		$data['ary_laborschool'] = $this->labor_school_model->getSchoolLaborById($id,1);

		$this->load->view('template/header', $data);
		$this->load->view('eam/labor_school_edit');
		$this->load->view('template/footer');
	}

	public function labor_school_doEdit() {
		$this->load->model('labor_school_model');
		echo $this->labor_school_model->labor_school_doEdit();
	}

	public function labor_school_doDel($id) {
		$this->load->model('labor_school_model');
		echo $this->labor_school_model->labor_school_doDel($id);
	}

	public function apiGetLaborSchool() {
		$this->load->model('labor_school_model');
		echo $this->labor_school_model->getLaborSchool();
	}
	// function group: labor_school END==============	
	// function group: score START==============
	public function score() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-5-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('eam/score_list');
		$this->load->view('template/footer');
	}

	public function score_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('score_model');
		$this->load->model('school_model');
		$this->load->model('schoolclass_model');
		$this->load->model('course_model');
		$this->load->model('examination_model');

		$data['init_detail'] = '';
		
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}
		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('4-5-1');
		$data['info'] = $this->score_model->getScoreById($id);	
		$data['ary_school'] = $this->school_model->getSchool(1);	
		$data['ary_schoolclass'] = $this->schoolclass_model->getSchoolclass(1);
		$data['ary_course'] = $this->course_model->getCourse(1);

		if (strval($id) != '0') {
			$data['ary_detail'] = $this->labor_course_model->getLaborCoursByScoreId($id);
			$data['init_detail'] = $this->apiGetScoreId($data['ary_detail']);
		}

		$this->load->view('template/header', $data);
		$this->load->view('eam/score_edit');
		$this->load->view('template/footer');
	}

	public function score_doEdit() {
		$this->load->model('score_model');
		echo $this->score_model->score_doEdit();
	}

	public function score_doDel($id) {
		$this->load->model('score_model');
		echo $this->score_model->score_doDel($id);
	}

	public function apiGetScore() {
		$this->load->model('score_model');
		echo $this->score_model->getScore();
	}

	public function apiGetScoreId($ary_data = null) {
		$this->load->helper('url');		
		$this->load->helper('form');
		$this->load->model('labor_school_model');

		if (is_null($ary_data)) {
			$ary_score = $this->labor_school_model->getSchoolLaborById(($this->input->post('school').'_'.$this->input->post('school_class')),1);
		} else {
			$ary_score = $ary_data;
		}

		$str_ret = '';

		for ($i = 0; $i < count($ary_score); $i++) {
			$str_ret .='<div class="form-group">';
			$str_ret .= '<div class="col-sm-1">';
			$str_ret .= '<div class="checkbox">'.$ary_score[$i]['labor_id'].'</div>';
			$str_ret .= '</div>';
			$str_ret .= '<div class="col-sm-2">';
			$str_ret .= '<label class="checkbox">'.$ary_score[$i]['name_tw'].'</label>';
			$str_ret .= '</div>';
			$str_ret .= '<div class="col-sm-2">';
			$str_ret .= '<label class="checkbox">'.$ary_score[$i]['name_en'].'</label>';
			$str_ret .= '</div>';
			$str_ret .= '<div class="col-sm-2">';
			$str_ret .= '<label class="checkbox">'.$ary_score[$i]['name_local'].'</label>';
			$str_ret .= '</div>';
			$str_ret .= '<div class="col-sm-1">';
			if (is_null($ary_data))	{
				$str_ret .= '<input type="text" class="form-control" name="txt_score'.$ary_score[$i]['labor_id'].'" value="" pattern="[0-9\-]+" required>';
			} else {
				$str_ret .= '<input type="text" class="form-control" name="txt_score'.$ary_score[$i]['labor_id'].'" value='.$ary_score['score'].' pattern="[0-9\-]+" required>';
			}
			$str_ret .= '</div>';
			$str_ret .= '<div class="col-sm-4">';
			if (is_null($ary_data))	{
				$str_ret .= '<input type="text" class="form-control" name="txt_descr'.$ary_score[$i]['labor_id'].'" value="" >';
			} else {
				$str_ret .= '<input type="text" class="form-control" name="txt_descr'.$ary_score[$i]['labor_id'].'" value='.$ary_score[$i]['descr'].' >';
			}
			$str_ret .= '</div>';
			$str_ret .= '</div>';
		}	

		if (is_null($ary_data)) {
			echo $str_ret;
		} else {
			return $str_ret;
		}
	}	
	// function group: score END==============
	// function group: election START==============
	public function election() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-2-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('eam/election_list');
		$this->load->view('template/footer');
	}

	public function election_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('election_model');
		$this->load->model('hire_model');
		$this->load->model('doc_model');
		$this->load->model('worker_type_model');
		$this->load->model('school_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('4-2-1');
		$data['info'] = $this->election_model->getElectionById($id);	
		$data['ary_hire'] = $this->hire_model->getHire_factory(1,0,1,1);
		$data['ary_sel_defult'] = $this->apiGeElectionHireIdSel(key($data['ary_hire']),1);
		$data['ary_education'] = json_decode(JSON_EDUCATION, true);
		$data['ary_worker_type_major'] = json_decode(JSON_WORKER_TYPE, true);
		$data['ary_worker_type_minor_id'] = $this->worker_type_model->getWorker_type(1);
		$data['ary_worker_kind'] = json_decode(JSON_WORKER_KIND, true);
		$data['json_worker_kind'] = JSON_WORKER_KIND;		
		$data['ary_gender'] =  $this->ary_gender;
		$data['ary_marriage'] = json_decode(JSON_MARRIAGE, true);
		$data['ary_labor_type'] = $this->ary_labor_type;
		$data['ary_school'] = $this->school_model->getSchool(1);
		$data['ary_doc_id6_7'] = $this->doc_model->getDoc(1,"6.7");
		$data['ary_eye_color'] = $this->ary_eye_color;
		$data['ary_diet'] = $this->ary_diet;

		$this->load->view('template/header', $data);
		$this->load->view('eam/election_edit');
		$this->load->view('template/footer');
	}

	public function election_doEdit() {
		$this->load->model('election_model');
		echo $this->election_model->election_doEdit();
	}

	public function election_doDel($id) {
		$this->load->model('election_model');
		echo $this->election_model->election_doDel($id);
	}

	public function apiGetElection() {
		$this->load->model('election_model');
		echo $this->election_model->getElection();
	}

	public function apiGeElectionHireIdSel($hire_id, $output=0) {
		$this->load->model('hire_model');
		$this->load->model('worker_type_model');

		$str_ret = array();
		$ary_hire_id_default = $this->hire_model->getHireId($hire_id);

		$str_ret[1] = $ary_hire_id_default[2].' / '.$ary_hire_id_default[3].' / '.$ary_hire_id_default[8];
		$str_ret[2] = $ary_hire_id_default['f_w_item'];
		$str_ret[3] = $ary_hire_id_default['client_addtw'];
		$str_ret[4] = $ary_hire_id_default['f_w_time_descr'];
		$str_ret[5] = $ary_hire_id_default[9];
		$str_ret[6] = $ary_hire_id_default['f_w_avg_salary'];
		$str_ret[7] = $ary_hire_id_default['descr2'];
		$str_ret[8] = $ary_hire_id_default['f_descr'];
		$str_ret[9] = $ary_hire_id_default['f_doc_id6_8'];
		$str_ret[10] = $ary_hire_id_default['web'];
		$str_ret[11] = $ary_hire_id_default['worker_kind'];
		$ary_worker_kind = json_decode(JSON_WORKER_KIND, true);
		$str_ret[11] = $ary_worker_kind[$ary_hire_id_default['worker_kind']];
		$str_ret[12] = ($ary_hire_id_default['gender'] == '1' ? '男' : '女');
		$worker_type_major = json_decode(JSON_WORKER_TYPE, true);
		$str_ret[13] = $worker_type_major[$ary_hire_id_default['worker_type_major']];
		$str_ret[14] = $ary_hire_id_default['height'];
		$worker_type_minor_id = $this->worker_type_model->getWorker_type(1);
		$str_ret[15] = $worker_type_minor_id[$ary_hire_id_default['worker_type_minor_id']];
		$str_ret[16] = $ary_hire_id_default['weight'];
		$marriage = json_decode(JSON_MARRIAGE, true);		
		$str_ret[17] = $marriage[$ary_hire_id_default['marriage']];
		$str_ret[18] = $ary_hire_id_default['age_start'];
		$str_ret[19] = $ary_hire_id_default['age_end'];

		if ($output == 1) {
			return $str_ret;
		} else {
			echo json_encode($str_ret);
		}
	}
	public function apiGetMappingElectionLaborByElectionID($id='') {
		$this->load->model('election_model');
		echo $this->election_model->getMappingElectionLaborByElectionID($id);
	}	
	// function group: election END==============
	// function group: election_labor START==============
	public function election_labor() {
		$this->load->helper('url');
		$this->load->model('worker_type_model');
		$this->load->model('client_model');
		$this->load->model('employer_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('4-2-3');
		$data['account'] = $this->session->userdata('account');
		$data['json_client'] = json_encode($this->client_model->getClient(1));
		$data['json_employer'] = json_encode($this->employer_model->getEmployer(1));
		$data['json_worker_type_major'] = JSON_WORKER_TYPE;
		$data['json_worker_type_minor'] = json_encode($this->worker_type_model->getWorker_type(1));
		$data['json_worker_kind'] = JSON_WORKER_KIND;

		$this->load->view('template/header', $data);
		$this->load->view('eam/election_labor_list');
		$this->load->view('template/footer');
	}

	public function election_labor_edit($election_id, $labor_id) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('election_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['election_id'] = $election_id;
		$data['labor_id'] = $labor_id;
		$data['title'] = $this->lang->line('edit').$this->lang->line('4-2-3');
		$data['info'] = $this->election_model->getElectionLaborByElection($election_id, $labor_id);	
		$data['ary_election'] = $this->ary_type;

		$this->load->view('template/header', $data);
		$this->load->view('eam/election_labor_edit');
		$this->load->view('template/footer');
	}

	public function election_labor_doEdit() {
		$this->load->model('election_model');
		echo $this->election_model->election_labor_doEdit();
	}

	public function apiGetElectionLabor() {
		$this->load->model('election_model');
		echo $this->election_model->getElectionLabor();
	}
	// function group: election_labor END==============
	public function apiSearch() {
		$this->load->helper('form');
		switch ($this->input->post('type')) {
			case 'labor':
				$this->load->model('labor_model');
				$ary = $this->labor_model->getLaborIdBySearch();
				break;
			case 'labor2':
				$this->load->model('labor_model');
				$ary = $this->labor_model->getLaborIdBySearch(2);
				break;				
			default:
				$ary = array();
				break;
		}

		echo form_dropdown('sel_search', $ary, 0, "id='sel_search' class='form-control' size='10'");
	}	
}


/* End of file docmanage.php */
/* Location: ./application/controllers/docmanage.php */