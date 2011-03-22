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
		$this->fblogin();
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
		if (!empty($_GET['redirectURL'])) {
			$this->session->set_userdata('redirectURL', $_GET['redirectURL']);
		}

		$data = array();
		$data['pageTitle'] = 'Login';
		$page = BASE_URL."users/fblogin";
		if ($this->session->userdata('uid') && $this->session->userdata('iptest') != 1) {
			//$this->layout->view('users/success_login', $data);
			//return;
		}

		if (isset($_GET['code'])){
			try {
				$this->fblogin_code($page);
				if ($this->session->userdata('redirectURL')) {
					redirect($this->session->userdata('redirectURL'));
				}

				$this->layout->view('users/success_login', $data);
				return;
			} catch (Exception $e) {
				$data['error'] = $e->getMessage();
			}
		}

		$this->layout->view('users/fblogin', $data);
	}

	public function login()
	{
		$data['pageTitle'] = 'Login';
		if ($this->input->post('MM_Insert') === 'formLogin') {
			try {
				print_r($_POST);
				foreach ($_POST as $k => $v) {
					$ret[$k] = $this->input->post($k);
				}

				$return = $this->Users_model->login_user($ret);
				$this->session->set_userdata($return);
				$this->layout->view('users/success_login');
				return;
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
				$this->layout->view('users/success_login');
				return;
			} catch (Exception $e) {
				$data['error'] = $e->getMessage();
			}
		}

		$this->layout->view('users/login', $data);
	}


	public function register()
	{
		$data['pageTitle'] = 'Register New User';
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
				$this->layout->view('users/success_register');
				return;
			} catch (Exception $e) {
				$data['error'] = $e->getMessage();
			}
		}

		$this->layout->view('users/register', $data);
	}

	public function logout()
	{
		$data['pageTitle'] = 'Logout';
		$array_items = array('uid' => '', 'username' => '', 'name' => '', 'email' => '', 'id' => '', 'gender' => '', 'timezone' => '', 'location' => '', 'lastlogin' => '', 'pic' => '', 'ipuser' => 0);
		$this->session->unset_userdata($array_items);
		$this->layout->view('users/success_logout', $data);
	}

	public function twitter()
	{
		$this->load->library('tweet');
		$this->tweet->enable_debug(TRUE);
		// If you already have a token saved for your user
		// (In a db for example) - See line #37
		//
		// You can set these tokens before calling logged_in to try using the existing tokens.
		// $tokens = array('oauth_token' => 'foo', 'oauth_token_secret' => 'bar');
		// $this->tweet->set_tokens($tokens);
		if (!$this->tweet->logged_in()) {
			// This is where the url will go to after auth.
			$this->tweet->set_callback(BASE_URL.'users/twitter_auth');
			$this->tweet->login();
		} else {
			// You can get the tokens for the active logged in user:
			$tokens = $this->tweet->get_tokens();
			pr($tokens);
			//
			// These can be saved in a db alongside a user record
			// if you already have your own auth system.
		}

	}

	public function twitter_auth()
	{
		$this->load->library('tweet');
		pr($_GET);
		$tokens = $this->tweet->get_tokens();
		pr($tokens);
		// $user = $this->tweet->call('get', 'account/verify_credentiaaaaaaaaals');
		// 
		// Will throw an error with a stacktrace.
		$user = $this->tweet->call('get', 'account/verify_credentials');
		pr($user);
		$friendship = $this->tweet->call('get', 'friendships/show', array('source_screen_name' => $user->screen_name, 'target_screen_name' => 'likelist'));
		pr($friendship);
		if ( $friendship->relationship->target->following === FALSE ) {
			echo 'inside';
			$this->tweet->call('post', 'friendships/create', array('screen_name' => $friendship->relationship->target->screen_name, 'follow' => TRUE));
		}
exit;
		$this->tweet->call('post', 'statuses/update', array('status' => 'Testing #CodeIgniter Twitter library'));

		$options = array(
					'count' => 10,
					'page' => 2,
					'include_entities' => 1
		);
		$timeline = $this->tweet->call('get', 'statuses/home_timeline');
		pr($timeline);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */