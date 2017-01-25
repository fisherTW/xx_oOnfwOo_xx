<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('log_model');
	}

	public function doLogout() {
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
	
	public function index() {   //login
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('account/login');
	}

	public function doLogin() {
		$is_expired = true;

		// CAPTCHA
		if(!$this->google_siteverify()) {
			echo 'g';
			return;
		}

		$ary = array(
			'account' => $this->input->post('txt_loginAccount'),
			'password' => $this->input->post('txt_loginPassword')
		);
		$query = $this->db->get_where('user',$ary);
		$count = $query->num_rows();
		$query_row = $query->row(); 
		$user_id = $query_row->id;

		// check if is_expired
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$date_db = $row->date;
			}
			$dt_now = new DateTime("now");
			$dt_db = new DateTime($date_db.' 23:59:59');
			if($dt_now <= $dt_db) {
				$is_expired = false;
			}
		}

		if($count == 0 || $is_expired) {	// disallow login
			if($count == 0)	{
				echo '0';
			} else {
				echo '2';
			}
		} else {	// allow
			$this->load->model('user_model');
			$newdata = array(
				'user_id'		=> $user_id,
				'account'		=> $this->input->post('txt_loginAccount'),
				'role'			=> $this->user_model->getRole($user_id),
				'tw'			=> $this->user_model->getTw($user_id)
			);
			$this->session->set_userdata($newdata);
			$this->session->set_userdata('site_lang', 'tw');

			//$this->log_model->writeLog('l');	
			echo '1'; 		
		}

	}

	// input:  NULL
	// output: bool
	private function google_siteverify() {
		$post = array(
			"secret"	=> KEY_GOOGLE_CAPTCHA,
			"response"	=> $this->input->post('g-recaptcha-response'),
			"remoteip"	=> $_SERVER['REMOTE_ADDR']
		);
		$ch = curl_init();
		$options = array(
			CURLOPT_URL				=> URL_GOOGLE_CAPTCHA,
			//CURLOPT_HEADER			=> 0,
			CURLOPT_VERBOSE			=> 0,
			CURLOPT_RETURNTRANSFER	=> true,
			CURLOPT_USERAGENT		=> "Mozilla/4.0 (compatible;)",
			CURLOPT_POST			=> true,
			CURLOPT_SSL_VERIFYPEER	=> false,
			CURLOPT_POSTFIELDS		=> http_build_query($post)
		);
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch); 
		curl_close($ch);
		$res = json_decode($result);
		
		return $res->success;
	}

	public function changePassword() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		$data['lang'] = $this->lang;		
		$data['title'] = 'Change Password';
		$data['account'] = $this->session->userdata('account');

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/changePassword');
		$this->load->view('template/footer');
	}

	public function doChangePassword() {

		$data = array(
			'password' => $this->input->post('txt_confirmNewPassword')
		);
		$ary_where = array('company_id' => 1, 'account' => $this->session->userdata('account'));
		$this->db->where($ary_where);
		$this->db->update('user', $data);

		$this->log_model->writeLog('u');		
		echo '1';
	}

	public function listUser() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '使用者管理';
		$data['account'] = $this->session->userdata('account');

		//user table
		$this->db->select('user.id, company_id, account, email, date, role, company.tw as tw');
		$this->db->join('company', 'user.company_id=company.id');
		$query = $this->db->get('user');
		$ary = array();
		foreach ($query->result() as $row) {
			$ary[$row->id]['company_id'] = $row->company_id;
			$ary[$row->id]['company']	 = $row->tw;
			$ary[$row->id]['account']	 = $row->account;
			$ary[$row->id]['email']		 = $row->email;
			$ary[$row->id]['date']		 = $row->date;
			$ary[$row->id]['role']		 = $this->roleId2Tw($row->role);
		}
		$data['userdata'] = $ary;

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/listUser');
		$this->load->view('template/footer');
	}

	public function deleteUser($user_id) {
		$this->db->delete('user', array('id' => $user_id));
		$this->load->helper('url');
		redirect('account/listUser', 'refresh');

		$this->log_model->writeLog('d');
	}

	private function roleId2Tw($roleid) {
		switch ($roleid) {
			case ROLE_USER :
				$roletw = 'User';
				break;
			case ROLE_SERVICE :
				$roletw = 'Service';
				break;
			case ROLE_ADMIN :
				$roletw = 'Admin';
				break;
		}
		return $roletw;
	}

	public function detailUser() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '使用者設定';
		$data['account'] = $this->session->userdata('account');

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/detailUser', $data);
		$this->load->view('template/footer');
	}

	public function doDetailUser() {
		$this->db->select('account');
		$this->db->where('account', $this->input->post('txt_userAccount'));		
		$this->db->from('user');
		$count = $this->db->count_all_results();
		if ($count == 0) {
			$ary_create = array(
			 	'company_id' => $this->input->post('txt_userCompany'),
			 	'account' => $this->input->post('txt_userAccount'),
			 	'password' => $this->input->post('txt_userPassword'),
				'email' => $this->input->post('txt_userEmail'),
			 	'date' => $this->input->post('txt_userdate'),
			 	'role' => $this->input->post('txt_role')
			);
			$this->db->set($ary_create);
			$this->db->insert('user');
			$this->log_model->writeLog('c');
		} else {
			//帳號重覆
			echo '0';
		}
	}

	public function createMail() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '最新消息mail發送設定';
		$data['maildata'] =  $this->getMail();
		$data['account'] = $this->session->userdata('account');

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/createMail', $data);
		$this->load->view('template/footer');
	}

	public function doCreateMail() {
		$this->load->model('setting_model');
		$this->setting_model->setMail();

		$this->log_model->writeLog('c');
		echo '1';
	}

	private function getMail() {
		$this->load->model('setting_model');
		return $this->setting_model->getMail();
	}

	public function listCompany() {
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '公司管理';
		$data['account'] = $this->session->userdata('account');

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/listCompany');
		$this->load->view('template/footer');
	}

	public function detailCompany($company_id = 0) {	//沒有傳資料時用　=0 表示
		$this->load->helper('url');
		if($this->session->userdata('account') === FALSE) {
			show_error('',401);
		}
		if($this->session->userdata('role') != ROLE_ADMIN) return;

		$data['title'] = '公司名稱設定';
		$data['account'] = $this->session->userdata('account');
		$data['companyCode'] = $this->getcode();

		$ary_companyData = array();

		if($company_id == 0) {
			//create
		} else {
			//edit
		}
		$data['companyData'] = $ary_companyData;
		$data['companyid'] = $company_id;
		
		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('account/detailCompany', $data);
		$this->load->view('template/footer');
	}

	public function getcode() {
		$ary_code = array(
			'G' => '政府',
			'E' => '企業'
		);
		return $ary_code;
	}	

	public function doDetailCompany() {
		if($this->input->post('company_id') == '0') {
			$this->db->set('tw', $this->input->post('txt_company')); 
			$this->db->set('code', $this->input->post('txt_code')); 
			$this->db->set('mail', $this->input->post('txt_companymail')); 
			$this->db->insert('company');
			// get new id
			$new_id = $this->db->insert_id();


			$this->log_model->writeLog('c');
		} else {
			$this->db->set('tw', $this->input->post('txt_company')); 
			$this->db->set('code', $this->input->post('txt_code')); 
			$this->db->set('mail', $this->input->post('txt_companymail')); 
			$this->db->where('id', $this->input->post('company_id'));
			$this->db->update('company'); 

			$this->log_model->writeLog('u');
		}
		echo '1';
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */