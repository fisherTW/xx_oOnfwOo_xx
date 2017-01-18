<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('language');

		$this->load->model('country_model');
	}

	public function index() {
		$this->load->view('config_message');
	}

	// function group: country START==============
	public function country() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/country_list');
		$this->load->view('template/footer');
	}

	public function country_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;		
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-1');
		$data['info'] = $this->country_model->getCountryById($id);
		$data['ary_country'] = $this->country_model->getCountryInit();

		$this->load->view('template/header', $data);
		$this->load->view('config/country_edit');
		$this->load->view('template/footer');
	}

	public function country_doEdit() {
		echo $this->country_model->country_doEdit();
	}

	public function country_doDel($id) {
		echo $this->country_model->country_doDel($id);
	}

	public function apiGetCountry() {
		echo $this->country_model->getCountry();
	}
	// function group: country END==============

	// function group: school START==============
	public function school() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-2');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/school_list');
		$this->load->view('template/footer');
	}

	public function school_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('school_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-2');
		$data['info'] = $this->school_model->getschoolById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/school_edit');
		$this->load->view('template/footer');
	}

	public function school_doEdit() {
		$this->load->model('school_model');
		
		echo $this->school_model->school_doEdit();
	}

	public function school_doDel($id) {
		$this->load->model('school_model');
		
		echo $this->school_model->school_doDel($id);
	}

	public function apiGetSchool() {
		$this->load->model('school_model');
		
		echo $this->school_model->getschool();
	}	
	// function group: school END==============

	// function group: account START==============
	public function account() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-3');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/account_list');
		$this->load->view('template/footer');
	}

	public function account_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('account_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-3');
		$data['info'] = $this->account_model->getaccountById($id);
		$data['ary_country'] = $this->country_model->getCountry(1);

		$this->load->view('template/header', $data);
		$this->load->view('config/account_edit');
		$this->load->view('template/footer');
	}

	public function account_doEdit() {
		$this->load->model('account_model');
		
		echo $this->account_model->account_doEdit();
	}

	public function account_doDel($id) {
		$this->load->model('account_model');
		
		echo $this->account_model->account_doDel($id);
	}

	public function apiGetAccount() {
		$this->load->model('account_model');
		
		echo $this->account_model->getaccount();
	}	
	// function group: account END==============

	// function group: airline START==============
	public function airline() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-4');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/airline_list');
		$this->load->view('template/footer');
	}

	public function airline_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('airline_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-4');
		$data['info'] = $this->airline_model->getAirlineById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/airline_edit');
		$this->load->view('template/footer');
	}

	public function airline_doEdit() {
		$this->load->model('airline_model');
		
		echo $this->airline_model->airline_doEdit();
	}

	public function airline_doDel($id) {
		$this->load->model('airline_model');
		
		echo $this->airline_model->airline_doDel($id);
	}

	public function apiGetAirline() {
		$this->load->model('airline_model');
		
		echo $this->airline_model->getAirline();
	}
	// function group: airline END==============

	// function group: flight START==============
	public function flight() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-5');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/flight_list');
		$this->load->view('template/footer');
	}

	public function flight_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('flight_model');
		$this->load->model('airline_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['ary_airline'] = $this->airline_model->getAirline(1);
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-5');
		$data['info'] = $this->flight_model->getflightById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/flight_edit');
		$this->load->view('template/footer');
	}

	public function flight_doEdit() {
		$this->load->model('flight_model');
		
		echo $this->flight_model->flight_doEdit();
	}

	public function flight_doDel($id) {
		$this->load->model('flight_model');
		
		echo $this->flight_model->flight_doDel($id);
	}

	public function apiGetFlight() {
		$this->load->model('flight_model');
		
		echo $this->flight_model->getflight();
	}	
	// function group: flight END==============	

	// function group: hotel START==============
	public function hotel() {
		$this->load->helper('url');;
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-6');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/hotel_list');
		$this->load->view('template/footer');
	}

	public function hotel_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('hotel_model');
		$this->load->model('school_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$ary_level=array();
		for($i = 0; $i < 5 ; $i++) { 
			$temp = $i+1;
			$ary_level[strval($temp)] = $temp;
		}
		$data['lang'] = $this->lang;
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_school'] = $this->school_model->getSchool(1);
		$data['ary_level'] = $ary_level;	
		$data['ary_network'] = json_decode(JSON_NETWORK_TYPE,true);
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-6');
		$data['info'] = $this->hotel_model->getHotelById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/hotel_edit');
		$this->load->view('template/footer');
	}

	public function hotel_doEdit() {
		$this->load->model('hotel_model');

		echo $this->hotel_model->hotel_doEdit();
	}

	public function hotel_doDel($id) {
		$this->load->model('hotel_model');

		echo $this->hotel_model->hotel_doDel($id);
	}

	public function apiGetHotel() {
		$this->load->model('hotel_model');

		echo $this->hotel_model->getHotel();
	}
	// function group: hotel END==============

	// function group: room START==============
	public function room() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-7');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/room_list');
		$this->load->view('template/footer');
	}

	public function room_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('room_model');
		$this->load->model('currency_model');		
		$this->load->model('hotel_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$ary_person=array();
		for($i = 0; $i < 6 ; $i++) { 
			$temp = $i+1;
			$ary_person[strval($temp)] = $temp;
		}

		$data['lang'] = $this->lang;
		$data['ary_hotel'] = $this->hotel_model->getHotel(1);
		$data['ary_currency'] = $this->currency_model->getCurrency(1);
		$data['account'] = $this->session->userdata('account');
		$data['ary_person'] = $ary_person;
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-7');
		$data['info'] = $this->room_model->getRoomById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/room_edit');
		$this->load->view('template/footer');
	}

	public function room_doEdit() {
		$this->load->model('room_model');

		echo $this->room_model->room_doEdit();
	}

	public function room_doDel($id) {
		$this->load->model('room_model');

		echo $this->room_model->room_doDel($id);
	}

	public function apiGetRoom() {
		$this->load->model('room_model');

		echo $this->room_model->getRoom();
	}
	// function group: room END==============

	// function group: currency START==============
	public function currency() {
		$this->load->helper('url');;
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-8');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/currency_list');
		$this->load->view('template/footer');
	}

	public function currency_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('currency_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-8');
		$data['info'] = $this->currency_model->getCurrencyById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/currency_edit');
		$this->load->view('template/footer');
	}

	public function currency_doEdit() {
		$this->load->model('currency_model');

		echo $this->currency_model->currency_doEdit();
	}

	public function currency_doDel($id) {
		$this->load->model('currency_model');

		echo $this->currency_model->currency_doDel($id);
	}

	public function apiGetCurrency() {
		$this->load->model('currency_model');

		echo $this->currency_model->getCurrency();
	}
	// function group: hotel END==============

	// function group: area START==============
	public function area() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-9');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/area_list');
		$this->load->view('template/footer');
	}

	public function area_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('area_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-9');
		$data['info'] = $this->area_model->getareaById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/area_edit');
		$this->load->view('template/footer');
	}

	public function area_doEdit() {
		$this->load->model('area_model');
		
		echo $this->area_model->area_doEdit();
	}

	public function area_doDel($id) {
		$this->load->model('area_model');
		
		echo $this->area_model->area_doDel($id);
	}

	public function apiGetArea() {
		$this->load->model('area_model');
		
		echo $this->area_model->getarea();
	}	
	// function group: area END==============	

	// function group: industry START==============
	public function industry() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-10');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/industry_list');
		$this->load->view('template/footer');
	}

	public function industry_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('industry_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-10');
		$data['info'] = $this->industry_model->getindustryById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/industry_edit');
		$this->load->view('template/footer');
	}

	public function industry_doEdit() {
		$this->load->model('industry_model');
		
		echo $this->industry_model->industry_doEdit();
	}

	public function industry_doDel($id) {
		$this->load->model('industry_model');
		
		echo $this->industry_model->industry_doDel($id);
	}

	public function apiGetIndustry() {
		$this->load->model('industry_model');
		
		echo $this->industry_model->getindustry();
	}	
	// function group: industry END==============	

	// function group: auth START==============
	public function auth() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-1-11');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/auth_list');
		$this->load->view('template/footer');
	}

	public function auth_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('auth_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-1-11');
		$data['info'] = $this->auth_model->getauthById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/auth_edit');
		$this->load->view('template/footer');
	}

	public function auth_doEdit() {
		$this->load->model('auth_model');
		
		echo $this->auth_model->auth_doEdit();
	}

	public function auth_doDel($id) {
		$this->load->model('auth_model');
		
		echo $this->auth_model->auth_doDel($id);
	}

	public function apiGetAuth() {
		$this->load->model('auth_model');
		
		echo $this->auth_model->getauth();
	}	
	// function group: auth END==============	
	// function group: emp_position START==============
	public function emp_position() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-2-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/emp_position_list');
		$this->load->view('template/footer');
	}

	public function emp_position_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('emp_position_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_emp_position_category_id'] = $this->emp_position_model->getPositionCategory();
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-2-1');
		$data['info'] = $this->emp_position_model->getEmp_positionById($id);
		$this->load->view('template/header', $data);
		$this->load->view('config/emp_position_edit');
		$this->load->view('template/footer');
	}

	public function emp_position_doEdit() {
		$this->load->model('emp_position_model');
		
		echo $this->emp_position_model->emp_position_doEdit();
	}

	public function emp_position_doDel($id) {
		$this->load->model('emp_position_model');
		
		echo $this->emp_position_model->emp_position_doDel($id);
	}

	public function apiGetEmpPosition() {
		$this->load->model('emp_position_model');
		
		echo $this->emp_position_model->getEmp_position();
	}	
	// function group: emp_position END==============	
	// function group: emp_dep START==============
	public function emp_dep() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-2-2');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/emp_dep_list');
		$this->load->view('template/footer');
	}

	public function emp_dep_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('emp_dep_model');
		$this->load->model('emp_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_emp_id'] = $this->emp_model->getEmp(1);

		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-2-2');
		$data['info'] = $this->emp_dep_model->getEmp_depById($id);
		$this->load->view('template/header', $data);
		$this->load->view('config/emp_dep_edit');
		$this->load->view('template/footer');
	}

	public function emp_dep_doEdit() {
		$this->load->model('emp_dep_model');
		
		echo $this->emp_dep_model->emp_dep_doEdit();
	}

	public function emp_dep_doDel($id) {
		$this->load->model('emp_dep_model');
		
		echo $this->emp_dep_model->emp_dep_doDel($id);
	}

	public function apiGetEmpDep() {
		$this->load->model('emp_dep_model');
		
		echo $this->emp_dep_model->getEmp_dep();
	}	
	// function group: emp_dep END==============	
	// function group: emp START==============
	public function emp() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-2-3');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/emp_list');
		$this->load->view('template/footer');
	}

	public function emp_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('emp_model');
		$this->load->model('emp_dep_model');
		$this->load->model('emp_position_model');
		$this->load->model('school_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_dep'] = $this->emp_dep_model->getEmp_dep(1);
		$data['ary_position'] = $this->emp_position_model->getEmp_position(1);
		$data['ary_school'] = $this->school_model->getSchool(1);
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-2-3');
		$data['info'] = $this->emp_model->getEmpById($id);
		$this->load->view('template/header', $data);
		$this->load->view('config/emp_edit');
		$this->load->view('template/footer');
	}

	public function emp_doEdit() {
		$this->load->model('emp_model');
		
		echo $this->emp_model->emp_doEdit();
	}

	public function emp_doDel($id) {
		$this->load->model('emp_model');
		
		echo $this->emp_model->emp_doDel($id);
	}

	public function apiGetEmp() {
		$this->load->model('emp_model');
		
		echo $this->emp_model->getEmp();
	}	
	// function group: emp END==============
	// function group: fee START==============
	public function fee() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-3-1');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/fee_list');
		$this->load->view('template/footer');
	}

	public function fee_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('fee_model');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-3-1');
		$data['info'] = $this->fee_model->getfeeById($id);

		$this->load->view('template/header', $data);
		$this->load->view('config/fee_edit');
		$this->load->view('template/footer');
	}

	public function fee_doEdit() {
		$this->load->model('fee_model');
		
		echo $this->fee_model->fee_doEdit();
	}

	public function fee_doDel($id) {
		$this->load->model('fee_model');
		
		echo $this->fee_model->fee_doDel($id);
	}

	public function apiGetFee() {
		$this->load->model('fee_model');
		
		echo $this->fee_model->getfee();
	}	
	// function group: fee END==============	
	// function group: countryfee START==============
	public function country_fee() {
		$this->load->helper('url');
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['title'] = $this->lang->line('1-3-2');
		$data['account'] = $this->session->userdata('account');

		$this->load->view('template/header', $data);
		$this->load->view('config/country_fee_list');
		$this->load->view('template/footer');
	}

	public function country_fee_edit($id = 0) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('country_fee_model');
		$this->load->model('fee_model');
		$this->load->model('currency_model');		
		if($this->session->userdata('role') === FALSE) {
			show_error('',401);
		}

		$data['lang'] = $this->lang;
		$data['account'] = $this->session->userdata('account');
		$data['id'] = $id;
		$data['title'] = (strval($id) == '0' ? $this->lang->line('create') : $this->lang->line('edit')).$this->lang->line('1-3-2');
		$data['info'] = $this->country_fee_model->getCountry_feeById($id);
		$data['ary_country'] = $this->country_model->getCountry(1);
		$data['ary_fee'] = $this->fee_model->getfee(1);
		$data['ary_currency'] = $this->currency_model->getCurrency(1);
		$data['ary_man_receive'] = json_decode(JSON_MAN_RECEIVE, true);
		$data['ary_method_receive'] = json_decode(JSON_METHOD_RECEIVE, true);
		$data['ary_worker_type'] = json_decode(JSON_WORKER_TYPE, true);
		$data['ary_worker_kind'] = json_decode(JSON_WORKER_KIND, true);

		$this->load->view('template/header', $data);
		$this->load->view('config/country_fee_edit');
		$this->load->view('template/footer');
	}

	public function country_fee_doEdit() {
		$this->load->model('country_fee_model');
		
		echo $this->country_fee_model->country_fee_doEdit();
	}

	public function country_fee_doDel($id) {
		$this->load->model('country_fee_model');
		
		echo $this->country_fee_model->country_fee_doDel($id);
	}

	public function apiGetCountryFee() {
		$this->load->model('country_fee_model');
		
		echo $this->country_fee_model->getCountry_fee();
	}

	// replaced by apiGetCountryFeeByHireId
	public function apiGetCountryFeeByVer() {
		$this->load->model('country_fee_model');
		
		echo $this->country_fee_model->getCountry_feeByVer();
	}

	public function apiGetCountryFeeByHireId() {
		$this->load->model('country_fee_model');
		
		echo $this->country_fee_model->getCountry_feeByHireId();
	}
	
	// function group: countryfee END==============	
}


/* End of file config.php */
/* Location: ./application/controllers/config.php */