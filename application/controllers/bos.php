<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bos extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('language');

		$this->ary_status = array(
			1 => '處理中',
			2 => '已取消',
			3 => '已結案'
		);
		$this->ary_comeback = array(
			1 => '不拘',
			2 => '是',
			3 => '否'
		);
		$this->ary_ticket = array(
			1 => '提供',
			2 => '不提供',
			3 => '到時看勞工表現再決定'
		);
		$this->ary_f_overtime2 = array(
			1 => '1.00',
			2 => '1.33',
			3 => '1.67',
			4 => '2.00',
			5 => '3.00',
		);
		$this->ary_hire_salary_type = array(
			1 => '薪資',
			2 => '加班',
			3 => '津貼',
			4 => '奬金',
			5 => '扣項'
		);
		$this->ary_hire_salary_type_1 = array(
			1 => '底薪 (元/月)',
			2 => '平均實領薪 (元/月)'
		);
		$this->ary_hire_salary_type_2 = array(
			1 => '平日加班2小時以下時薪倍數 1.33',
			2 => '平日加班第3小時以上時薪倍數 1.66',
			3 => '假日加班時薪'
		);				
		$this->ary_hire_salary_type_3 = array(
			1 => '輪班津貼',
			2 => '夜班津貼',
			3 => '伙食津貼',
			4 => '其他津貼'
		);
		$this->ary_hire_salary_type_4 = array(
			1 => '全勤獎金',
			2 => '工作獎金',
			3 => '生日禮金',
			4 => '三節獎金',
			5 => '其他獎金'
		);
		$this->ary_hire_salary_type_5 = array(
			1 => '福利金',
			2 => '違約金',
			3 => '其他扣項'	
		);
		$this->ary_m_personality = array(
			1 => '不拘',
			2 => '活潑/外向',
			3 => '文靜/內向'	
		);
		$this->ary_gender = array(
			1 => '男',
			2 => '女'
		);
		$this->ary_fee_id_inbound = array(
			1 => '前金',
			2 => '佣金',
			3 => '入境請款'
		);
		$this->ary_fee_id_outbound = array(
			1 => '防逃保證金',
			2 => '獎勵金',
			3 => '回程機票'
		);
		$this->ary_man_receive = array(
			1 => '勞工本人帳戶',
			2 => '客戶端',
			3 => 'XX',
			4 => '國營公司'	
		);
		$this->ary_type_pickarr = array(
			1 => '啟程',
			2 => '回程'
		);
		$this->ary_site_pickfee = array(
			1 => '海外',
			2 => '客戶'
		);
		$this->ary_contact_id_from = array(
			0 => '客戶',
			1 => '雇主'
		);
		$this->ary_method_receive = array(
			1 => 'XX退',
			2 => 'XX代客戶退',
			3 => '客戶已退',
			4 => '賠客戶'	
		);
		$this->ary_man_receive_feelabor = array(
			1 => '台灣',
			2 => '印尼雅加達',
			3 => '印尼瑪瑯',
			4 => '越南河內',
			5 => '越南藝安',
			6 => '越南胡志明',
			7 => '菲律賓馬尼拉',
			8 => '勞工',
			9 => '雇主',
			10 => '客戶',
			11 => '介紹中心'	
		);
		$this->ary_method_receive_feelabor = array(
			1 => '勞工自行付款',
			2 => '向仲介請款',
			3 => '仲介請款',
			4 => '吸收'	
		);
	
	}

	public function index() {
		$this->load->view('hire_message');
	}

	// function group: hire_factory START==============
	public function hire_factory() {
		$this->load->helper('url');
		$this->load->model('worker_type_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-1-1');
		$data['account'] = $this->session->userdata('account');
		$data['json_worker_type_major'] = JSON_WORKER_TYPE;
		$data['json_worker_type_minor'] = json_encode($this->worker_type_model->getWorker_type(1));
		$data['json_worker_kind'] = JSON_WORKER_KIND;

		$this->load->view('template/header', $data);
		$this->load->view('bos/hire_factory_list');
		$this->load->view('template/footer');
	}

	public function hire_factory_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('hire_model');
		$this->load->model('country_model');
		$this->load->model('emp_model');
		$this->load->model('worker_type_model');
		$this->load->model('letter_model');
		$this->load->model('doc_model');
		$this->load->model('client_model');
		$this->load->model('employer_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('2-1-1');
		$data['info'] = $this->hire_model->getHire_factoryById($id,0);
		$data['ary_hire_factory_auth'] = $this->hire_model->getHire_factoryAuthByHire_factoryId($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_emp'] = $this->emp_model->getEmp(1);
		$data['ary_worker_kind'] = json_decode(JSON_WORKER_KIND, true);
		$data['ary_worker_type_major'] = json_decode(JSON_WORKER_TYPE, true);
		$data['ary_worker_type_minor'] = $this->worker_type_model->getWorker_type(1);
		$data['ary_status'] = $this->ary_status;
		$data['ary_marriage'] = json_decode(JSON_MARRIAGE, true);
		$data['ary_comeback'] = $this->ary_comeback;
		$data['ary_arrspot'] = json_decode(JSON_ARRSPOT, true);
		$data['ary_language'] = json_decode(JSON_LANGUAGE, true);
		$data['ary_level'] = json_decode(JSON_LEVEL, true);
		$data['ary_ticket'] = $this->ary_ticket;
		$ary_tmp = $this->letter_model->getLetterByType(LETTER_TYPE_RECRUIT);
		$data['ary_letter_id'] = $ary_tmp[2];
		$ary_tmp = $this->letter_model->getLetterByType(LETTER_TYPE_VISA);
		$data['ary_letter_id2'] = $ary_tmp[2];
		$data['ary_hire_special_auth'] = $this->hire_model->getHire_specialAuthByHire_specialId($id);
		$data['ary_f_doc_id6_8'] = $this->doc_model->getDoc(1,6.8);
		$data['ary_f_w_doc_id6_4'] = $this->doc_model->getDoc(1,6.4);
		$min_id = $this->client_model->getClientByminid();
		$min_employerid = $this->employer_model->getEmployerByminid();
		$data['ary_f_overtime2'] = $this->ary_f_overtime2;
		$data['ary_hire_salary_auth'] = $this->hire_model->getHire_salaryAuthByHire_factoryId($id);
		for($i=0; $i < count($data['ary_hire_salary_auth']); $i++) {
			$tmp_id = $data['ary_hire_salary_auth'][$i]['type'];
			$tmp_item = $data['ary_hire_salary_auth'][$i]['item'];
			$data['ary_hire_salary_auth'][$i]['sel_2_html'] = $this->apiGetHireSalaryTypeSel($tmp_id,1, ($i+1),$tmp_item);
		}
		$data['ary_type_hire_salary'] = $this->ary_hire_salary_type;
		$data['ary_item_hire_salary'] = $this->ary_hire_salary_type_1;
		// fake
		$data['ary_actually_select'] = 0;

		$this->load->view('template/header', $data);
		$this->load->view('bos/hire_factory_edit');
		$this->load->view('template/footer');
	}

	public function hire_factory_doEdit() {
		$this->load->model('hire_model');
		echo $this->hire_model->hire_factory_doEdit();
	}

	public function hire_factory_doDel($id) {
		$this->load->model('hire_model');
		echo $this->hire_model->hire_factory_doDel($id);
	}

	public function apiGetHire_factory() {
		$this->load->model('hire_model');
		echo $this->hire_model->getHire_factory();
	}

	public function apiGetHireFactoryClientIdSel($client_id,$output_client_id=0) {
		$this->load->helper('form');
		$this->load->model('client_model');

		$str_ret = array();

		$ary_client_id_default = $this->client_model->getClientByClientIdsel();
		$str_ret[1] = $ary_client_id_default[1][$client_id];

		if($output_client_id == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}
	public function apiGetHireFactoryEmployerIdSel($employer_id,$output_employer_id=0) {
		$this->load->helper('form');
		$this->load->model('employer_model');

		$str_ret = array();

		$ary_employer_id_default = $this->employer_model->getEmployerByEmployerIdsel();
		$str_ret[1] = $ary_employer_id_default[1][$employer_id];
		$str_ret[2] = $ary_employer_id_default[2][$employer_id];
		$str_ret[3] = $ary_employer_id_default[3][$employer_id];
		$str_ret[4] = $ary_employer_id_default[4][$employer_id];

		if($output_employer_id == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}
	public function apiGetHireSalaryTypeSel($type,$output_type=0,$row=0,$item=0) {
		$this->load->helper('form');

		$str_ret = '';

		switch(strval($type)) {
			case '1':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_item = ($item == 0 ? '' : $item);
				$str_ret = form_dropdown('sel_item_hire_salary[]', $this->ary_hire_salary_type_1, $str_item, 'class="form-control" '.$str);
				break;
			case '2':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_item = ($item == 0 ? '' : $item);
				$str_ret = form_dropdown('sel_item_hire_salary[]', $this->ary_hire_salary_type_2, $str_item, 'class="form-control" '.$str);
				break;
			case '3':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_item = ($item == 0 ? '' : $item);
				$str_ret = form_dropdown('sel_item_hire_salary[]', $this->ary_hire_salary_type_3, $str_item, 'class="form-control" '.$str);
				break;
			case '4':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_item = ($item == 0 ? '' : $item);
				$str_ret = form_dropdown('sel_item_hire_salary[]', $this->ary_hire_salary_type_4, $str_item, 'class="form-control" '.$str);
				break;
			case '5':
				$str = ($row == 0 ? '' : 'row='.$row);
				$str_item = ($item == 0 ? '' : $item);
				$str_ret = form_dropdown('sel_item_hire_salary[]', $this->ary_hire_salary_type_5, $str_item, 'class="form-control" '.$str);
				break;
			default:
				$str_ret = '';
				break;
		}

		if($output_type == 1) {
			return $str_ret;
		} else {
			echo $str_ret;	
		}
	}

	public function apiSearch($contact_id_from = 0) {
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
			case 'contact_id':
				$this->load->model('pick_model');
				$ary = $this->pick_model->getContactIdBySearch($contact_id_from);
				break;
			case 'contact_id_r':
				$this->load->model('pick_model');
				$ary = $this->pick_model->getContactIdBySearch($contact_id_from);
				break;
			case 'contact_id_arr':
				$this->load->model('pick_model');
				$ary = $this->pick_model->getContactIdBySearch($contact_id_from);
				break;
			case 'contact_id_ar':
				$this->load->model('pick_model');
				$ary = $this->pick_model->getContactIdBySearch($contact_id_from);
				break;
			case 'contact_id_con':
				$this->load->model('pick_model');
				$ary = $this->pick_model->getContactIdBySearch($contact_id_from);
				break;				
			case 'labor_id':
				$this->load->model('labor_model');
				$ary = $this->labor_model->getLaborIdBySearch();
				break;
			default:
				$ary = array();
				break;
		}
		echo form_dropdown('sel_search', $ary, 0, "id='sel_search' class='form-control' size='10'");
	}
	// function group: hire_factory END==============

	// function group: hire_non_factory START==============
	public function hire_non_factory() {
		$this->load->helper('url');
		$this->load->model('worker_type_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-1-2');
		$data['account'] = $this->session->userdata('account');
		$data['json_worker_type_major'] = JSON_WORKER_TYPE;
		$data['json_worker_type_minor'] = json_encode($this->worker_type_model->getWorker_type(1));
		$data['json_worker_kind'] = JSON_WORKER_KIND;

		$this->load->view('template/header', $data);
		$this->load->view('bos/hire_non_factory_list');
		$this->load->view('template/footer');
	}

	public function hire_non_factory_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('hire_model');
		$this->load->model('country_model');
		$this->load->model('emp_model');
		$this->load->model('worker_type_model');
		$this->load->model('letter_model');
		$this->load->model('client_model');
		$this->load->model('employer_model');
		$this->load->model('doc_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('2-1-2');
		$data['info'] = $this->hire_model->getHire_non_factoryById($id,0);
		$data['ary_hire_factory_auth'] = $this->hire_model->getHire_factoryAuthByHire_factoryId($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_emp'] = $this->emp_model->getEmp(1);
		$data['ary_worker_kind'] = json_decode(JSON_WORKER_KIND, true);
		$data['ary_worker_type_major'] = json_decode(JSON_WORKER_TYPE, true);
		$data['ary_worker_type_minor'] = $this->worker_type_model->getWorker_type(1);
		$data['ary_status'] = $this->ary_status;
		$data['ary_marriage'] = json_decode(JSON_MARRIAGE, true);
		$data['ary_comeback'] = $this->ary_comeback;
		$data['ary_arrspot'] = json_decode(JSON_ARRSPOT, true);
		$data['ary_language'] = json_decode(JSON_LANGUAGE, true);
		$data['ary_level'] = json_decode(JSON_LEVEL, true);
		$data['ary_ticket'] = $this->ary_ticket;
		$ary_tmp = $this->letter_model->getLetterByType(LETTER_TYPE_RECRUIT);
		$data['ary_letter_id'] = $ary_tmp[2];
		$ary_tmp = $this->letter_model->getLetterByType(LETTER_TYPE_VISA);
		$data['ary_letter_id2'] = $ary_tmp[2];
		$data['ary_hire_special_auth'] = $this->hire_model->getHire_specialAuthByHire_specialId($id);
		$min_id = $this->client_model->getClientByminid();
		$data['ary_m_education'] = json_decode(JSON_EDUCATION, true);
		$data['ary_m_personality'] = $this->ary_m_personality;
		$data['ary_m_doc_id6_3'] = $this->doc_model->getDoc(1,6.3);
		$data['ary_m_doc_id6_7'] = $this->doc_model->getDoc(1,6.7);
		$data['ary_m_food'] = json_decode(JSON_FOOD, true);
		
		// fake
		$data['ary_actually_select'] = 0;

		$this->load->view('template/header', $data);
		$this->load->view('bos/hire_non_factory_edit');
		$this->load->view('template/footer');
	}

	public function hire_non_factory_doEdit() {
		$this->load->model('hire_model');
		echo $this->hire_model->hire_non_factory_doEdit();
	}

	public function hire_non_factory_doDel($id) {
		$this->load->model('hire_model');
		echo $this->hire_model->hire_non_factory_doDel($id);
	}

	public function apiGetHire_non_factory() {
		$this->load->model('hire_model');
		echo $this->hire_model->getHire_factory(0,1,0,0);
	}
	// function group: hire_non_factory END==============

	// function group: quote START==============
	public function quote() {
		$this->load->helper('url');
		$this->load->model('worker_type_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-2-1');
		$data['account'] = $this->session->userdata('account');
		$data['json_worker_type_major'] = JSON_WORKER_TYPE;
		$data['json_worker_type_minor'] = json_encode($this->worker_type_model->getWorker_type(1));
		$data['json_worker_kind'] = JSON_WORKER_KIND;
		$data['json_h_gender'] = json_encode($this->ary_gender);

		$this->load->view('template/header', $data);
		$this->load->view('bos/quote_list');
		$this->load->view('template/footer');
	}

	public function quote_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('country_model');
		$this->load->model('country_fee_model');
		$this->load->model('quote_model');
		$this->load->model('hire_model');
		$this->load->model('currency_model');
		$this->load->model('fee_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('2-2-1');
		$data['info'] = $this->quote_model->getQuoteById($id);
		$data['ary_quoteFeeInbound']	= $this->quote_model->getMappingQuoteFeeInboundByQuoteId($id);
		$data['ary_quoteFeeOutbound']	= $this->quote_model->getMappingQuoteFeeoutboundByQuoteId($id);
		$data['ary_quoteFee']			= $this->quote_model->getMappingQuoteFeeByQuoteId($id);
		$data['ary_quoteFeeStage']		= $this->quote_model->getMappingQuoteFeeStageByQuoteId($id);
		$data['ary_hire_id']			= $this->hire_model->getHire_factory(1,0,1,1);
		$min_id = $this->hire_model->getHireByminsid();
		$data['ary_sel_defult'] = $this->apiGetQuoteHireIdSel($min_id['id'],1,1);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_currency'] = $this->currency_model->getCurrency(1);
		$data['ary_worker_type_major'] = json_decode(JSON_WORKER_TYPE, true);
		$data['ary_worker_type_minor_id'] = $this->worker_type_model->getWorker_type(1);
		$data['ary_worker_kind'] = json_decode(JSON_WORKER_KIND, true);
		$data['ary_gender'] = $this->ary_gender;
		$data['ary_fee_id_inbound'] = $this->ary_fee_id_inbound;
		$data['ary_man_receive_outbound'] = $this->ary_man_receive;
		$data['ary_man_receive'] = json_decode(JSON_MAN_RECEIVE, true);
		$data['ary_method_receive'] = json_decode(JSON_METHOD_RECEIVE, true);
		$data['ary_fee_id_outbound'] = $this->ary_fee_id_outbound;
		$data['ary_fee_id_quoteFee'] = $this->fee_model->getfee(1);
		$data['ary_country_fee'] = $this->country_fee_model->getCountry_feeVer();

		$this->load->view('template/header', $data);
		$this->load->view('bos/quote_edit');
		$this->load->view('template/footer');
	}

	public function quote_doEdit() {
		$this->load->model('quote_model');
		echo $this->quote_model->quote_doEdit();
	}

	public function quote_doDel($id) {
		$this->load->model('quote_model');
		echo $this->quote_model->quote_doDel($id);
	}

	public function apiGetQuote() {
		$this->load->model('quote_model');
		echo $this->quote_model->getQuote();
	}

	public function apiGetQuoteHireIdSel($hire_id,$output_hire_id=0,$output=0) {
		$this->load->helper('form');
		$this->load->model('hire_model');
		$this->load->model('worker_type_model');

		$str_ret = array();

		$ary_hire_id_default = $this->hire_model->getHireId($hire_id);
		$str_ret[1] = $ary_hire_id_default[1];
		$str_ret[2] = $ary_hire_id_default[2];
		$str_ret[3] = $ary_hire_id_default[3];

		$ary_worker_kind = $ary_hire_id_default[4];
		$ary_worker_kind2 = json_decode(JSON_WORKER_KIND, true);
		$str_ret[4] = $ary_worker_kind2[$ary_worker_kind];

		$ary_worker_type_major = $ary_hire_id_default[5];
		$ary_worker_type_major2 = json_decode(JSON_WORKER_TYPE, true);
		$str_ret[5] = $ary_worker_type_major2[$ary_worker_type_major];

		$ary_worker_type_minor_id = $ary_hire_id_default[6];
		$ary_worker_type_minor_id2 = $this->worker_type_model->getWorker_type(1);
		$str_ret[6] = $ary_worker_type_minor_id2[$ary_worker_type_minor_id];

		$ary_gender = $ary_hire_id_default[7];
		$ary_gender2 = $this->ary_gender;
		$str_ret[7] = $ary_gender2[$ary_gender];

		$str_ret[8] = $ary_hire_id_default[8];
		$str_ret[9] = $ary_hire_id_default[9];
		if($output == 1) {
			$str_ret[10] = $ary_hire_id_default[10];
		}else{	
			$str_ret[10] = '<label class="radio-inline">';
			$str_ret[10] .= '<input type="radio" name="rdo_food_type" id="" value=1 onclick="return false"' .($ary_hire_id_default[10] == 1 ? "checked" : "").'>'. ($this->lang->line('free_food_type')); 
			$str_ret[10] .=	'</label>';
			$str_ret[10] .=	'<br>';
			$str_ret[10] .=	'<label class="radio-inline">';
			$str_ret[10] .=	'<input type="radio" name="rdo_food_type" id="" value=2 onclick="return false"' .($ary_hire_id_default[10] == 2 ? "checked" : "").'>'. ($this->lang->line('other'));
			$str_ret[10] .=	'</label>';
			$str_ret[10] .=	'<br>';
			$str_ret[10] .=	'<label class="radio-inline">';
			$str_ret[10] .=	'<input type="radio" name="rdo_food_type" id="" value=3 onclick="return false"' .($ary_hire_id_default[10] == 3 ? "checked" : "").'>'. ($this->lang->line('month_deduct'));
			$str_ret[10] .=	'</label>';
			$str_ret[10] .=	'<br>';
		}



		$str_ret[11] = $ary_hire_id_default[11];
		$str_ret[12] = $ary_hire_id_default[12];
		$str_ret[13] = $ary_hire_id_default[13];
		$str_ret[14] = $ary_hire_id_default[14];
		$str_ret[15] = $ary_hire_id_default[15];

		if($output_hire_id == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}

	public function apiGetQuoteCurrencySel($currency_id,$output_type=0) {
		$this->load->helper('form');
		$this->load->model('currency_model');

		$str_ret = array();
		$ary_tmp = $this->currency_model->getCurrencyByType($currency_id);
		
		$str_ret[1] = $ary_tmp[1][$currency_id];
		$str_ret[2] = $ary_tmp[2][$currency_id];

		if($output_type == 1) {
			return $str_ret;
		} else {
			echo json_encode($str_ret);
		}
	}
	
	public function apiGetMappingHireSpecialid($id='') {
		$this->load->model('hire_model');
		echo $this->hire_model->getHireSpecialId($id);
	}	
	// function group: quote END==============

	// function group: pick START==============
	public function pick() {
		$this->load->helper('url');
		$this->load->model('hire_model');
		$this->load->model('school_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-3-1');
		$data['account'] = $this->session->userdata('account');
		$data['json_school'] = json_encode($this->school_model->getSchool(1));

		$this->load->view('template/header', $data);
		$this->load->view('bos/pick_list');
		$this->load->view('template/footer');
	}

	public function pick_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('pick_model');
		$this->load->model('hire_model');
		$this->load->model('school_model');
		$this->load->model('flight_model');
		$this->load->model('hotel_model');
		$this->load->model('room_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('2-3-1');
		$data['info'] = $this->pick_model->getPickById($id);
		$data['ary_hire_id'] = $this->hire_model->getHire_factory(1,0,1,1);
		$data['ary_school'] = $this->school_model->getSchool(1);
		$min_id = $this->hire_model->getHireByminsid();
		$data['ary_sel_defult'] = $this->apiGetQuoteHireIdSel($min_id['id'],1,1);
		$data['ary_PickLocalman'] = $this->pick_model->getPickLocalmanByPickId($id);
		$data['ary_type_pickarr'] = $this->ary_type_pickarr;
		$data['ary_dep_id'] = $this->flight_model->getFlightByNumber(1);
		$min_id = $this->flight_model->getFlightByminid();
		$data['ary_numbersel_defult'] = $this->apiGetPickdepIdSel($min_id['id'],1);

		$data['ary_PickArr'] = $this->pick_model->getPickArrByPickId($id,0);
		for($i=0; $i < count($data['ary_PickArr']); $i++) {
			$tmp_id = $this->apiGetPickdepIdSel($data['ary_PickArr'][$i]['dep_id'],1);
			$data['ary_PickArr'][$i]['dep_time_PickArr'] = $tmp_id[2].' / '.$tmp_id[4];
			$data['ary_PickArr'][$i]['arr_time_PickArr'] = $tmp_id[3].' / '.$tmp_id[5];
		}

		$data['ary_hotel_id'] = $this->hotel_model->getHotel(1);
		$min_id = $this->hotel_model->getHotelByminid();
		$data['ary_room_id'] = $this->room_model->getRoomByhotelId($min_id['id']);
		$data['ary_hotelsel_defult'] = $this->apiGetPickhotelIdSel($min_id['id'],1);

		$data['ary_PickHotel'] = $this->pick_model->getPickHotelByPickId($id,0);
		for($i=0; $i < count($data['ary_PickHotel']); $i++) {
			$tmp_id = $this->apiGetPickhotelIdSel($data['ary_PickHotel'][$i]['hotel_id'],1);
			$data['ary_PickHotel'][$i]['en_PickHotel'] = $tmp_id[2];
			$data['ary_PickHotel'][$i]['site_PickHotel'] = $tmp_id[3];
			$data['ary_PickHotel'][$i]['phone_PickHotel'] = $tmp_id[4];
			$data['ary_PickHotel'][$i]['address_PickHotel'] = $tmp_id[5];
			$tmp_hotel_id = $data['ary_PickHotel'][$i]['hotel_id'];
			$tmp_room_id = $data['ary_PickHotel'][$i]['room_id'];
			$tmp_sel = $this->apiGetPickhotelIdSel($tmp_hotel_id,1, ($i+1),$tmp_room_id,$data['info']['date_dep']);
			$data['ary_PickHotel'][$i]['room_id_PickHotel'] = $tmp_sel[6];
		}

		$data['ary_PickStroke'] = $this->pick_model->getPickStrokeByPickId($id,0);
		$data['ary_site_pickfee'] = $this->ary_site_pickfee;
		$data['ary_PickFee'] = $this->pick_model->getPickFeeByPickId($id,0);

		$data['ary_PickArr_r'] = $this->pick_model->getPickArrByPickId($id,1);
		for($i=0; $i < count($data['ary_PickArr_r']); $i++) {
			$tmp_id = $this->apiGetPickdepIdSel($data['ary_PickArr_r'][$i]['dep_id'],1);
			$data['ary_PickArr_r'][$i]['dep_time_PickArr'] = $tmp_id[2].' / '.$tmp_id[4];
			$data['ary_PickArr_r'][$i]['arr_time_PickArr'] = $tmp_id[3].' / '.$tmp_id[5];
		}

		$data['ary_PickHotel_r'] = $this->pick_model->getPickHotelByPickId($id,1);
		for($i=0; $i < count($data['ary_PickHotel_r']); $i++) {
			$tmp_id = $this->apiGetPickhotelIdSel($data['ary_PickHotel_r'][$i]['hotel_id'],1);
			$data['ary_PickHotel_r'][$i]['en_PickHotel'] = $tmp_id[2];
			$data['ary_PickHotel_r'][$i]['site_PickHotel'] = $tmp_id[3];
			$data['ary_PickHotel_r'][$i]['phone_PickHotel'] = $tmp_id[4];
			$data['ary_PickHotel_r'][$i]['address_PickHotel'] = $tmp_id[5];
			$tmp_hotel_id = $data['ary_PickHotel_r'][$i]['hotel_id'];
			$tmp_room_id = $data['ary_PickHotel_r'][$i]['room_id'];
			$tmp_sel = $this->apiGetPickhotelIdSel($tmp_hotel_id,1, ($i+1),$tmp_room_id,$data['info']['date_dep']);
			$data['ary_PickHotel_r'][$i]['room_id_PickHotel'] = $tmp_sel[7];
		}
		$data['ary_PickStroke_r'] = $this->pick_model->getPickStrokeByPickId($id,1);
		$data['ary_PickFee_r'] = $this->pick_model->getPickFeeByPickId($id,1);
		$data['ary_contact_id_from'] = $this->ary_contact_id_from;

		$data['ary_pickContact'] = $this->pick_model->getPickContactByPickId($id,1);		

		$this->load->view('template/header', $data);
		$this->load->view('bos/pick_edit');
		$this->load->view('template/footer');
	}

	public function pick_doEdit() {
		$this->load->model('pick_model');
		echo $this->pick_model->pick_doEdit();
	}

	public function pick_doDel($id) {
		$this->load->model('pick_model');
		echo $this->pick_model->pick_doDel($id);
	}

	public function apiGetPick() {
		$this->load->model('pick_model');
		echo $this->pick_model->getPick();
	}

	public function apiGetPickdepIdSel($dep_id,$output=0) {
		$this->load->helper('form');
		$this->load->model('flight_model');

		$str_ret = array();
		$ary_tmp = $this->flight_model->getFlightByNumberSel($dep_id);
		$str_ret[1] = $ary_tmp[1];
		$str_ret[2] = $ary_tmp[2];
		$str_ret[3] = $ary_tmp[3];
		$str_ret[4] = $ary_tmp[4];
		$str_ret[5] = $ary_tmp[5];

		if($output == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}

	public function apiGetPickhotelIdSel($hotel_id,$output=0,$row=0,$room_id=0,$date_dep=-1) {
		$this->load->helper('form');
		$this->load->model('hotel_model');
		$this->load->model('room_model');

		$str_ret = array();
		$ary_tmp = $this->hotel_model->getHotelByidSel($hotel_id);
		$str_ret[1] = $ary_tmp[1];
		$str_ret[2] = $ary_tmp[2];
		$str_ret[3] = $ary_tmp[3];
		$str_ret[4] = $ary_tmp[4];
		$str_ret[5] = $ary_tmp[5];

		$ary_room_id = $this->room_model->getRoomByhotelId($hotel_id);
		$str = ($row == 0 ? '' : 'row='.$row);
		$str_room_id = ($room_id == 0 ? '' : $room_id);
		if($date_dep == -1){
			$str_ret[6] = form_dropdown('room_id_PickHotel[]', $ary_room_id, $str_room_id, 'class="form-control" '.$str);
			$str_ret[7] = form_dropdown('room_id_PickHotel_r[]', $ary_room_id, $str_room_id, 'class="form-control" '.$str);
		}else{
			if (date("Y-m-d") >= $date_dep){
				$str_ret[6] = form_dropdown('room_id_PickHotel[]', $ary_room_id, $str_room_id, 'class="form-control" disabled="disabled"'.$str);
				$str_ret[7] = form_dropdown('room_id_PickHotel_r[]', $ary_room_id, $str_room_id, 'class="form-control disabled="disabled"" '.$str);
			}else{
				$str_ret[6] = form_dropdown('room_id_PickHotel[]', $ary_room_id, $str_room_id, 'class="form-control" '.$str);
				$str_ret[7] = form_dropdown('room_id_PickHotel_r[]', $ary_room_id, $str_room_id, 'class="form-control" '.$str);
			}
		}
		

		if($output == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}

	public function apiGetPickbyContactId($id='',$is_true=0) {
		$this->load->model('pick_model');
		echo $this->pick_model->getPickbyContactId($id,$is_true);
	}
	
	public function apiGetPickbyClientEmpId($contact_id=0,$contact_id_from = 0) {
		$this->load->helper('form');
		$this->load->model('pick_model');
		$str_ret = array();

		$str_ret = $this->pick_model->getPickbyClientEmpId($contact_id,$contact_id_from);

		echo json_encode($str_ret);
	}
	// function group: pick END==============
	// function group: labor START==============
	public function labor() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-4-1');
		$data['account'] = $this->session->userdata('account');
		$data['type'] = '241';		
		$data['json_worker_kind'] = JSON_WORKER_KIND;
		
		$this->load->view('template/header', $data);
		$this->load->view('eam/labor_list', $data);
		$this->load->view('template/footer');
	}
	// function group: labor END==============
	// function group: feeoutbound START==============
	public function feeoutbound() {
		$this->load->helper('url');
		$this->load->model('feeoutbound_model');
		$this->load->model('worker_type_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-4-3');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('bos/feeoutbound_list');
		$this->load->view('template/footer');
	}

	public function feeoutbound_audit($id) {
		$this->feeoutbound_edit($id,true);
	}

	public function feeoutbound_edit($id = 0,$is_audit = false) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('feeoutbound_model');
		$this->load->model('hire_model');
		$this->load->model('currency_model');
		$this->load->model('audit_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('2-4-3');
		$data['info'] = $this->feeoutbound_model->getFeeoutboundById($id);
		$data['ary_hire_id'] = $this->hire_model->getHire_factory(1,0,1,0);	
		$data['ary_method_receive'] = $this->ary_method_receive;
		$data['ary_fee_id_outbound'] = $this->ary_fee_id_outbound;
		$data['ary_currency'] = $this->currency_model->getCurrency(1);
		$data['ary_man_receive'] = $this->ary_man_receive;
		$data['ary_feeOutboundFee'] = $this->feeoutbound_model->getfeeoutboundByFeeoutboundId($id);
		$min_id = $this->hire_model->getHireByminsid();
		$data['ary_sel_defult'] = $this->apiGetFeeoutboundHireIdSel($min_id['id'],1,1);
		$data['audit'] = $this->audit_model->getAuditInfo('243', $id);
		$data['is_audit'] = $is_audit;

		$this->load->view('template/header', $data);
		$this->load->view('bos/feeoutbound_edit');
		$this->load->view('audit/audit');
		$this->load->view('template/footer_btn');
	}

	public function feeoutbound_doAudit() {
		$this->load->model('audit_model');
		echo $this->audit_model->audit_doInsert('243',$this->input->post('result'),$this->input->post('id'),1);
	}

	public function feeoutbound_doEdit() {
		$this->load->model('feeoutbound_model');
		echo $this->feeoutbound_model->feeoutbound_doEdit();
	}

	public function feeoutbound_doDel($id) {
		$this->load->model('feeoutbound_model');
		echo $this->feeoutbound_model->feeoutbound_doDel($id);
	}

	public function apiGetFeeoutbound() {
		$this->load->model('feeoutbound_model');
		$json = $this->feeoutbound_model->getFeeoutbound();

		$ary_cou = json_decode($json, true);
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_tmp = $this->audit_model->getAuditInfo('243',$ary_cou[$key]['id']);
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

	public function apiGetFeeoutboundHireIdSel($hire_id,$output_hire_id=0,$output=0) {
		$this->load->helper('form');
		$this->load->model('quote_model');
		$this->load->model('hire_model');

		$str_ret = array();

		$ary_hire_id_default = $this->quote_model->getQuoteId($hire_id);
		if($ary_hire_id_default){
			$str_ret[0] = ($ary_hire_id_default[0]==''?'':$ary_hire_id_default[0]);
			$str_ret[1] = ($ary_hire_id_default[1]==''?'':$ary_hire_id_default[1]);	
			$ary_hire_id_default = $this->quote_model->getQuoteFeeOutboundId($str_ret[0],1);
			$str_ret[2] = ($ary_hire_id_default[1]==''?'':$ary_hire_id_default[1]);
			$str_ret[3] = ($ary_hire_id_default[2]==''?'':$ary_hire_id_default[2]);
			$str_ret[4] = ($ary_hire_id_default[3]==''?'':$ary_hire_id_default[3]);
			$str_ret[5] = ($ary_hire_id_default[4]==''?'':$ary_hire_id_default[4]);
			$str_ret[6] = ($ary_hire_id_default[5]==''?'':$ary_hire_id_default[5]);
			$str_ret[7] = ($ary_hire_id_default[6]==''?'':$ary_hire_id_default[6]);
		
			$ary_hire_id_default = $this->quote_model->getQuoteFeeOutboundId($str_ret[0],2);
			if($ary_hire_id_default){
				$str_ret[8] = ($ary_hire_id_default[1]==''?'':$ary_hire_id_default[1]);
				$str_ret[9] = ($ary_hire_id_default[2]==''?'':$ary_hire_id_default[2]);
				$str_ret[10] = ($ary_hire_id_default[3]==''?'':$ary_hire_id_default[3]);
				$str_ret[11] = ($ary_hire_id_default[4]==''?'':$ary_hire_id_default[4]);
				$str_ret[12] = ($ary_hire_id_default[5]==''?'':$ary_hire_id_default[5]);
				$str_ret[13] = ($ary_hire_id_default[6]==''?'':$ary_hire_id_default[6]);
			}else{
				$str_ret[8] = '';
				$str_ret[9] = '';
				$str_ret[10] = '';
				$str_ret[11] = '';
				$str_ret[12] = '';
				$str_ret[13] = '';
			}
			$ary_hire_id_default = $this->quote_model->getQuoteFeeOutboundId($str_ret[0],3);
			if($ary_hire_id_default){
				$str_ret[14] = ($ary_hire_id_default[1]==''?'':$ary_hire_id_default[1]);
				$str_ret[15] = ($ary_hire_id_default[2]==''?'':$ary_hire_id_default[2]);
				$str_ret[16] = ($ary_hire_id_default[3]==''?'':$ary_hire_id_default[3]);
				$str_ret[17] = ($ary_hire_id_default[4]==''?'':$ary_hire_id_default[4]);
				$str_ret[18] = ($ary_hire_id_default[5]==''?'':$ary_hire_id_default[5]);
				$str_ret[19] = ($ary_hire_id_default[6]==''?'':$ary_hire_id_default[6]);
			}else{
				$str_ret[14]= '';
				$str_ret[15]= '';
				$str_ret[16] = '';
				$str_ret[17] = '';
				$str_ret[18] = '';
				$str_ret[19] = '';
			}
		}else{
			$str_ret[0] = '';
			$str_ret[1] = '';
			$str_ret[2] = '';
			$str_ret[3] = '';
			$str_ret[4] = '';
			$str_ret[5] = '';
			$str_ret[6] = '';
			$str_ret[7] = '';
			$str_ret[8] = '';
			$str_ret[9] = '';
			$str_ret[10] = '';
			$str_ret[11] = '';
			$str_ret[12] = '';
			$str_ret[13] = '';
			$str_ret[14]= '';
			$str_ret[15]= '';
			$str_ret[16] = '';
			$str_ret[17] = '';
			$str_ret[18] = '';
			$str_ret[19] = '';
		}
		$ary_hire_id_default = $this->hire_model->getHireId($hire_id);
		if($ary_hire_id_default){
			$str_ret[20] = ($ary_hire_id_default[2]==''?'':$ary_hire_id_default[2]);
			$str_ret[21] = ($ary_hire_id_default[3]==''?'':$ary_hire_id_default[3]);
			$str_ret[22] = ($ary_hire_id_default[9]==''?'':$ary_hire_id_default[9]);
		}else{
			$str_ret[20] = '';
			$str_ret[21] = '';
			$str_ret[22] = '';
		}

		if($output_hire_id == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}

	public function apiGetFeeoutboundLaborSel($labor_id,$output_type=0) {
		$this->load->helper('form');
		$this->load->model('labor_model');

		$str_ret = array();
		$ary_tmp = $this->labor_model->getLaborId($labor_id);
		
		$str_ret[1] = $ary_tmp[1];
		$str_ret[2] = $ary_tmp[2];
		$str_ret[3] = $ary_tmp[3];
		$str_ret[4] = $ary_tmp[4];
		$str_ret[5] = $ary_tmp[5];
		$str_ret[6] = (strtotime($str_ret[3]) - strtotime($str_ret[5]))/ (60*60*24);
		$str_ret[7] = $ary_tmp[6];
		$str_ret[8] = $ary_tmp[7];
		$str_ret[9] = $ary_tmp[8];
		$str_ret[10] = $ary_tmp[9];
		$str_ret[11] = $ary_tmp[10];
		$str_ret[12] = $ary_tmp[11];
		$str_ret[13] = $ary_tmp[12];
		$str_ret[14] = $ary_tmp[13];

		if($output_type == 1) {
			return $str_ret;
		} else {
			echo json_encode($str_ret);
		}
	}
	// function group: feeoutbound END==============

	// function group: feeLabor START==============
	public function feeLabor() {
		$this->load->helper('url');
		$this->load->model('feelabor_model');
		$this->load->model('worker_type_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-4-5');
		$data['account'] = $this->session->userdata('account');
		$data['json_worker_type_major'] = JSON_WORKER_TYPE;
		$data['json_worker_type_minor'] = json_encode($this->worker_type_model->getWorker_type(1));
		$data['json_worker_kind'] = JSON_WORKER_KIND;
		$data['json_h_gender'] = json_encode($this->ary_gender);

		$this->load->view('template/header', $data);
		$this->load->view('bos/feeLabor_list');
		$this->load->view('template/footer');
	}

	public function feeLabor_audit($id) {
		$this->feeLabor_edit($id,true);
	}

	public function feeLabor_edit($id = 0, $is_audit = false) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('country_model');
		$this->load->model('feelabor_model');
		$this->load->model('hire_model');
		$this->load->model('currency_model');
		$this->load->model('fee_model');
		$this->load->model('audit_model');		

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('2-4-5');
		$data['info'] = $this->feelabor_model->getFeeLaborById($id);
		$data['ary_feeLabor'] = $this->feelabor_model->getFeeLaborFeeByFeeLaborId($id);
		$data['ary_fee_type'] = json_decode(JSON_FEETYPE, true);
		$data['ary_fee_id'] = $this->fee_model->getfee(1);
		$data['ary_currency'] = $this->currency_model->getCurrency(1);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_man_receive_feelabor'] = $this->ary_man_receive_feelabor;
		$data['ary_method_receive_feelabor'] = $this->ary_method_receive_feelabor;

		$data['audit'] = $this->audit_model->getAuditInfo('244', $id);
		$data['is_audit'] = $is_audit;

		$this->load->view('template/header', $data);
		$this->load->view('bos/feeLabor_edit');
		$this->load->view('audit/audit');		
		$this->load->view('template/footer_btn');
	}

	public function feeLabor_doAudit() {
		$this->load->model('audit_model');
		echo $this->audit_model->audit_doInsert('244',$this->input->post('result'),$this->input->post('id'),1);
	}

	public function feeLabor_doEdit() {
		$this->load->model('feelabor_model');
		echo $this->feelabor_model->feeLabor_doEdit();
	}

	public function feeLabor_doDel($id) {
		$this->load->model('feelabor_model');
		echo $this->feelabor_model->feeLabor_doDel($id);
	}

	public function apiGetFeeLabor() {
		$this->load->model('feelabor_model');
		$this->load->model('audit_model');		
		$json = $this->feelabor_model->getFeeLabor(0,'c');

		$ary_cou = json_decode($json, true);

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_tmp = $this->audit_model->getAuditInfo('244',$ary_cou[$key]['id']);
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

	public function apiGetFeeLaborHireIdSel($hire_id,$output_hire_id=0,$output=0) {
		$this->load->helper('form');
		$this->load->model('hire_model');
		$this->load->model('worker_type_model');

		$str_ret = array();

		$ary_hire_id_default = $this->hire_model->getHireId($hire_id);
		$str_ret[1] = $ary_hire_id_default[1];
		$str_ret[2] = $ary_hire_id_default[2];
		$str_ret[3] = $ary_hire_id_default[3];

		$ary_worker_kind = $ary_hire_id_default[4];
		$ary_worker_kind2 = json_decode(JSON_WORKER_KIND, true);
		$str_ret[4] = $ary_worker_kind2[$ary_worker_kind];

		$ary_worker_type_major = $ary_hire_id_default[5];
		$ary_worker_type_major2 = json_decode(JSON_WORKER_TYPE, true);
		$str_ret[5] = $ary_worker_type_major2[$ary_worker_type_major];

		$ary_worker_type_minor_id = $ary_hire_id_default[6];
		$ary_worker_type_minor_id2 = $this->worker_type_model->getWorker_type(1);
		$str_ret[6] = $ary_worker_type_minor_id2[$ary_worker_type_minor_id];

		$ary_gender = $ary_hire_id_default[7];
		$ary_gender2 = $this->ary_gender;
		$str_ret[7] = $ary_gender2[$ary_gender];

		$str_ret[8] = $ary_hire_id_default[8];
		$str_ret[9] = $ary_hire_id_default[9];
		if($output == 1) {
			$str_ret[10] = $ary_hire_id_default[10];
		}else{	
			$str_ret[10] = '<label class="radio-inline">';
			$str_ret[10] .= '<input type="radio" name="rdo_food_type" id="" value=1 onclick="return false"' .($ary_hire_id_default[10] == 1 ? "checked" : "").'>'. ($this->lang->line('free_food_type')); 
			$str_ret[10] .=	'</label>';
			$str_ret[10] .=	'<br>';
			$str_ret[10] .=	'<label class="radio-inline">';
			$str_ret[10] .=	'<input type="radio" name="rdo_food_type" id="" value=2 onclick="return false"' .($ary_hire_id_default[10] == 2 ? "checked" : "").'>'. ($this->lang->line('other'));
			$str_ret[10] .=	'</label>';
			$str_ret[10] .=	'<br>';
			$str_ret[10] .=	'<label class="radio-inline">';
			$str_ret[10] .=	'<input type="radio" name="rdo_food_type" id="" value=3 onclick="return false"' .($ary_hire_id_default[10] == 3 ? "checked" : "").'>'. ($this->lang->line('month_deduct'));
			$str_ret[10] .=	'</label>';
			$str_ret[10] .=	'<br>';
		}



		$str_ret[11] = $ary_hire_id_default[11];
		$str_ret[12] = $ary_hire_id_default[12];
		$str_ret[13] = $ary_hire_id_default[13];
		$str_ret[14] = $ary_hire_id_default[14];
		$str_ret[15] = $ary_hire_id_default[15];

		if($output_hire_id == 1) {
			return $str_ret;
		}else{
			echo json_encode($str_ret);
		}
	}

	public function apiGetFeeLaborCurrencySel($currency_id,$output_type=0) {
		$this->load->helper('form');
		$this->load->model('currency_model');

		$str_ret = array();
		$ary_tmp = $this->currency_model->getCurrencyByType($currency_id);
		
		$str_ret[1] = $ary_tmp[1][$currency_id];
		$str_ret[2] = $ary_tmp[2][$currency_id];

		if($output_type == 1) {
			return $str_ret;
		} else {
			echo json_encode($str_ret);
		}
	}

	// function group: feeLabor END==============

	public function report() {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('country_model');
		$this->load->model('emp_model');
		
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('2-1-3');
		$data['account'] = $this->session->userdata('account');
		$data['ary_country'] = $this->setCriteriaSelect($this->country_model->getCountry(1));
		$data['ary_emp'] = $this->setCriteriaSelect($this->emp_model->getEmp(1));
		$data['ary_worker_kind'] = $this->setCriteriaSelect(json_decode(JSON_WORKER_KIND, true));
		$data['ary_worker_type_major'] = $this->setCriteriaSelect(json_decode(JSON_WORKER_TYPE, true));
		$data['ary_status'] = $this->setCriteriaSelect($this->ary_status);

		$this->load->view('template/header', $data);
		$this->load->view('bos/report');
		$this->load->view('template/footer');
	}
}


/* End of file bos.php */
/* Location: ./application/controllers/bos.php */