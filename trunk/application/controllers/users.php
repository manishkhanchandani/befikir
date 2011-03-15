<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	function index()
	{
		
	}

	protected function fblogin_code($page)
	{
		$url = "https://graph.facebook.com/oauth/access_token?client_id=".FB_APP_ID."&redirect_uri=".$page."&client_secret=".FB_APP_SECRET."&code=".$_GET['code'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$token = curl_exec($ch);
		curl_close($ch);
		//fetch user details
		$ret = array();
		if (empty($token)) {
			throw new Exception('Token Invalid');
		}

		$url = "https://graph.facebook.com/me?".$token; // URL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		$ret = json_decode($result, true); // Print page contents.
		if (empty($ret['id'])) {
			throw new Exception('Invalid User');
		}

		$ret['code'] = $_GET['code'];
		$ret['token'] = $token;
		$return = $this->Users_model->create_fb_user($ret);
		if (empty($return)) {
			throw new Exception('Could not login');
		}

		$this->session->set_userdata($return);
	}

	public function fblogin()
	{
		$data = array();
		$page = BASE_URL."users/fblogin";
		if ($this->session->userdata('uid')) {
			redirect(BASE_URL.'welcome/profile');
		}

		if (isset($_GET['code'])){
			try {
				$this->fblogin_code($page);
				redirect(BASE_URL.'welcome/profile');
			} catch (Exception $e) {
				$data['error'] = $e->getMessage();
			}
		}

		$this->layout->view('users/fblogin', $data);
	}

	public function login()
	{
		if ($this->session->userdata('uid')) {
			redirect(BASE_URL.'welcome/profile');
		}

		$data = array('pageTitle' => 'Login');
		if ($this->input->post('MM_Insert') === 'formLogin') {
			try {
				print_r($_POST);
				foreach ($_POST as $k => $v) {
					$ret[$k] = $this->input->post($k);
				}

				$return = $this->Users_model->login_user($ret);
				print_r($return);
				exit;
				$this->session->set_userdata($return);
				redirect(BASE_URL.'welcome/profile');
			} catch (Exception $e) {
				$data['error'] = $e->getMessage();
			}
		} else if (isset($_GET['code'])){
			try {
				$url = "https://graph.facebook.com/oauth/access_token?client_id=".FB_APP_ID."&redirect_uri=".BASE_URL."users/login&client_secret=".FB_APP_SECRET."&code=".$_GET['code'];
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$token = curl_exec($ch);
				curl_close($ch);
				//fetch user details
				$ret = array();
				if (empty($token)) {
					throw new Exception('Token Invalid');
				}

				$url = "https://graph.facebook.com/me?".$token; // URL
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);
				$ret = json_decode($result, true); // Print page contents.
				if (empty($ret['id'])) {
					throw new Exception('Invalid User');
				}

				$ret['code'] = $_GET['code'];
				$ret['token'] = $token;
				$return = $this->Users_model->create_fb_user($ret);
				if (empty($return)) {
					throw new Exception('Could not login');
				}

				$this->session->set_userdata($return);
				redirect(BASE_URL.'welcome/profile');
			} catch (Exception $e) {
				$data['error'] = $e->getMessage();
			}
		}

		$this->layout->view('users/login', $data);
	}


	public function register()
	{
		$data = array('pageTitle' => 'Register New User');
		if ($this->input->post('MM_Insert') === 'formRegister') {
			try {
				foreach ($_POST as $k => $v) {
					$ret[$k] = $this->input->post($k);
				}
	
				$return = $this->Users_model->create_user($ret);
				if (empty($return)) {
					throw new Exception('Could not register');
				}
				$this->session->set_userdata($return);
				redirect(BASE_URL.'welcome/profile');
			} catch (Exception $e) {
				$data['error'] = $e->getMessage();
			}
		}

		$this->layout->view('users/register', $data);
	}

	public function logout()
	{
		$array_items = array('uid' => '', 'username' => '', 'name' => '', 'email' => '', 'id' => '', 'gender' => '', 'timezone' => '', 'location' => '', 'lastlogin' => '', 'pic' => '');
		$this->session->unset_userdata($array_items);
		redirect(BASE_URL.'users/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */