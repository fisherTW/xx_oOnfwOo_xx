<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crm extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('language');

		$this->ary_is_client = array(
			0 => '-',
			1 => 'Y'
		);
		$this->ary_payment = array(
			1 => '當天',
			2 => '3天',
			3 => '7天',
			4 => '半月',
			5 => '月結',
			6 => '其他'
		);
		$this->ary_man_receiver = array(
			1 => '向仲介請款',
			2 => '仲介請款',
			3 => '吸收',
			4 => '向學員&勞工請款'
		);		
	}
	// function group: client START==============
	public function client() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('3-1-1');
		$data['account'] = $this->session->userdata('account');
		$data['json_is_client'] = json_encode($this->ary_is_client);	

		$this->load->view('template/header', $data);
		$this->load->view('crm/client_list');
		$this->load->view('template/footer');
	}

	public function client_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('area_model');
		$this->load->model('emp_model');
		$this->load->model('currency_model');
		$this->load->model('country_model');
		$this->load->model('client_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('3-1-1');
		$data['info'] = $this->client_model->getClientById($id);
		$data['ary_clientContact'] = $this->client_model->getClientContactByClientId($id);
		$data['ary_clientDescr'] = $this->client_model->getClientDescrByClientId($id);
		$data['ary_clientCash'] = $this->client_model->getClientCashByClientId($id);
		$data['ary_clientLicense'] = $this->client_model->getclientLicenseByClientId($id);
		$data['ary_clientRelation'] = $this->client_model->getclientRelationByClientId($id);

		$data['ary_area'] = $this->area_model->getArea(1);
		$data['ary_sales'] = $this->emp_model->getEmp(1);
		$data['ary_service'] = $this->emp_model->getEmp(1);
		$data['ary_payment'] = $this->ary_payment;
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_currency'] = $this->currency_model->getCurrency(1);
		$data['ary_worker_type_major'] =  json_decode(JSON_WORKER_TYPE, true);

		$this->load->view('template/header', $data);
		$this->load->view('crm/client_edit');
		$this->load->view('template/footer');
	}

	public function client_doEdit() {
		$this->load->model('client_model');
		echo $this->client_model->client_doEdit();
	}

	public function client_doDel($id) {
		$this->load->model('client_model');
		echo $this->client_model->client_doDel($id);
	}

	public function apiGetClient() {
		$this->load->model('client_model');
		echo $this->client_model->getClient();
	}	
	// function group: client END==============

	// function group: employer START==============
	public function employer() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('3-1-2');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('crm/employer_list');
		$this->load->view('template/footer');
	}

	public function employer_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('employer_model');
		$this->load->model('area_model');
		$this->load->model('industry_model');		

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('3-1-2');
		$data['info'] = $this->employer_model->getEmployerById($id);
		$data['ary_employerContact'] = $this->employer_model->getEmployerContactByEmployerId($id);

		$data['ary_area'] = $this->area_model->getArea(1);
		$data['ary_industry'] = $this->industry_model->getIndustry(1);

		$this->load->view('template/header', $data);
		$this->load->view('crm/employer_edit');
		$this->load->view('template/footer');
	}

	public function employer_doEdit() {
		$this->load->model('employer_model');
		echo $this->employer_model->employer_doEdit();
	}

	public function employer_doDel($id) {
		$this->load->model('employer_model');
		echo $this->employer_model->employer_doDel($id);
	}

	public function apiGetEmployer() {
		$this->load->model('employer_model');
		echo $this->employer_model->getEmployer();
	}	
	// function group: client END==============	

	// function group: salesschedule START==============
	public function salesschedule() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('3-2-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('crm/salesschedule_list');
		$this->load->view('template/footer');
	}

	public function salesschedule_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('salesschedule_model');
		$this->load->model('emp_model');
		$this->load->model('talkmethod_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;	
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('3-2-1');
		$data['info'] = $this->salesschedule_model->getSalesscheduleById($id);
		$data['ary_salesscheduleFee'] = $this->salesschedule_model->getsalesscheduleFeeBysalesscheduleId($id);
		$data['ary_method'] = $this->talkmethod_model->getTalkmethod(1);
		$data['ary_emp'] = $this->emp_model->getEmp(1);		

		$this->load->view('template/header', $data);
		$this->load->view('crm/salesschedule_edit');
		$this->load->view('template/footer');
	}

	public function salesschedule_doEdit() {
		$this->load->model('salesschedule_model');
		echo $this->salesschedule_model->salesschedule_doEdit();
	}

	public function salesschedule_doDel($id) {
		$this->load->model('salesschedule_model');
		echo $this->salesschedule_model->salesschedule_doDel($id);
	}

	public function apiGetSalesschedule() {
		$this->load->model('salesschedule_model');
		echo $this->salesschedule_model->getSalesschedule();
	}	

	// function group: salesschedule END==============
	// function group: translate START==============
	public function translate() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('3-3-2');
		$data['account'] = $this->session->userdata('account');		

		$this->load->view('template/header', $data);
		$this->load->view('crm/translate_list');
		$this->load->view('template/footer');
	}

	public function translate_audit($id) {
		$this->translate_edit($id,true);
	}

	public function translate_edit($id = 0, $is_audit = false) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('translate_model');
		$this->load->model('emp_model');
		$this->load->model('country_model');
		$this->load->model('trans_model');		
		$this->load->model('audit_model');

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('3-3-2');
		$data['info'] = $this->translate_model->getTranslateById($id);
		$data['ary_emp'] = $this->emp_model->getEmp(1);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_trans'] = $this->trans_model->getTrans(1);

		$data['audit'] = $this->audit_model->getAuditInfo('332', $id);
		$data['is_audit'] = $is_audit;

		$this->load->view('template/header', $data);
		$this->load->view('crm/translate_edit');
		$this->load->view('audit/audit');
		$this->load->view('template/footer_btn');
	}

	public function translate_doAudit() {
		$this->load->model('audit_model');
		echo $this->audit_model->audit_doInsert('332',$this->input->post('result'),$this->input->post('id'),1);
	}

	public function translate_doEdit() {
		$this->load->model('translate_model');
		echo $this->translate_model->translate_doEdit();
	}

	public function apiGetTranslate() {
		$this->load->model('translate_model');
		$json = $this->translate_model->getTranslate();

		$ary_cou = json_decode($json, true);
		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_tmp = $this->audit_model->getAuditInfo('332',$ary_cou[$key]['id']);
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

	// function group: translate END==============
	// function group: feeclient START==============
	public function fee_client() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('3-1-3');
		$data['account'] = $this->session->userdata('account');		

		$this->load->view('template/header', $data);
		$this->load->view('crm/fee_client_list');
		$this->load->view('template/footer');
	}

	public function fee_client_audit($id) {
		$this->fee_client_edit($id,true);
	}

	public function fee_client_edit($id = 0,$is_audit = false) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('fee_client_model');
		$this->load->model('client_model');
		$this->load->model('employer_model');
		$this->load->model('fee_model');		
		$this->load->model('emp_model');
		$this->load->model('currency_model');		
		$this->load->model('audit_model');		

		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('3-1-3');
		$data['info'] = $this->fee_client_model->getFeeClientById($id);
		$data['ary_fee'] = $this->fee_model->getFee(1);
		$data['ary_sales'] = $this->emp_model->getEmp(1);
		$data['ary_service'] = $this->emp_model->getEmp(1);
		$data['ary_feeClientFee'] = $this->fee_client_model->getFeeclientfeeByFeeClientId($id);
		$data['ary_currency_id'] = $this->currency_model->getCurrency(1);
		$data['ary_man_receive'] = $this->ary_man_receiver;
		$data['audit'] = $this->audit_model->getAuditInfo('313', $id);
		$data['is_audit'] = $is_audit;

		$this->load->view('template/header', $data);
		$this->load->view('crm/fee_client_edit');
		$this->load->view('audit/audit');
		$this->load->view('template/footer_btn');
	}

	public function fee_client_doAudit() {
		$this->load->model('audit_model');
		echo $this->audit_model->audit_doInsert('313',$this->input->post('result'),$this->input->post('id'),1);
	}

	public function fee_client_doEdit() {
		$this->load->model('fee_client_model');
		echo $this->fee_client_model->fee_client_doEdit();
	}

	public function apiGetFeeClient() {
		$this->load->model('fee_client_model');
		$this->load->model('audit_model');
		$json = $this->fee_client_model->getFeeClient();

		$ary_cou = json_decode($json, true);

		if(count($ary_cou) > 0) {
			foreach ($ary_cou as $key => $val) {
				$ary_tmp = $this->audit_model->getAuditInfo('313',$ary_cou[$key]['id']);
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

	// function group: feeclient END==============	
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
			case 'labor':
				$this->load->model('Labor_model');
				$ary = $this->Labor_model->getLaborBySearch();				
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