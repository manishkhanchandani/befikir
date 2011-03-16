<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ratings extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Rateme_model');
		$this->load->model('Users_model');
	}

	function index()
	{
		$this->create();
	}


	public function updateRating()
	{
		if (!$this->session->userdata('uid')) {
			return false;
		}

		$return = $this->Rateme_model->get_code_details($_GET['code']);
		$this->Rateme_model->create_rating($return, $this->session->userdata('uid'), $_GET['val'], $_GET['id']);
		return;
	}

	function view($code='')
	{
		if (!$this->session->userdata('uid')) {
			$param['id'] = $_SERVER['REMOTE_ADDR'];
			$return = $this->Users_model->create_ip_user($param);
			if (empty($return)) {
				throw new Exception('Could not open page');
			}

			$this->session->set_userdata($return);
			//redirect(BASE_URL.'users/fblogin?redirectURL='.urlencode(BASE_URL.'ratings/view/'.$code));
		}

		$data = array();
		$return = $this->Rateme_model->get_code_details($code);
		if (empty($return)) {
			redirect(BASE_URL.'ratings/create');
		}

		$data['profile'] = $return;
		$data['pageTitle'] = $return->name."'s Test";
		$data['code'] = $code;
		$ratings = $this->Rateme_model->get_rating_details($code, $this->session->userdata('uid'));
		$data['ratings'] = $ratings;
		if ($this->input->get('post') == 1) {
			$params = array();
			$params['access_token'] = $this->session->userdata('token');
			$params['message'] = 'Rate me on my qualities. Here you can vote on my qualities. I will really appreciate your time.';
			$params['link'] = BASE_URL.'ratings/view/'.$code;
			$params['picture'] = 'http://rateme.co.in/images/rateme.co.in.png';
			$params['name'] = $data['pageTitle'];
			$params['caption'] = 'Create your test or rate on friends test!!';
			//$params['description'] = 'Here you can vote on my qualities. I will really appreciate your time.';
			$params['actions'] = json_encode(array('name'=>'View on Live', 'link'=>$params['link']));
			$ret = $this->Rateme_model->postfb($params);
			if (!empty($ret)) {
				$data['error'] = 'Could not submit on facebook. Please try it later.';
			} else {
				$data['error'] = 'Successfully submitted to facebook.';
			}
		}

		$this->layout->view('rateme/ratings', $data);
	}

	function validate($email='', $code='')
	{
		$data = array('pageTitle' => 'Validate New Test');
		$this->layout->view('rateme/createtest', $data);
	}


	function create()
	{
		if (!$this->session->userdata('uid') || $this->session->userdata('ipuser') == 1) {
			redirect(BASE_URL.'users/fblogin');
		}

		$data = array();
		$data = array('pageTitle' => 'Create New Test');
		try {
			if ($this->input->post('MM_Insert') === 'formTest') {
				if (!$this->input->post('agree')) {
					throw new Exception('You must agree terms and conditions.');
				}

				foreach ($_POST as $k => $v) {
					$ret[$k] = $this->input->post($k);
				}

				$ret['uid'] = $this->session->userdata('uid');
				$return = $this->Rateme_model->create_test($ret);
				if (!empty($return)) {
					redirect(BASE_URL.'ratings/view/'.$return);
				}
			}
	
			$return = $this->Rateme_model->validate_test($this->session->userdata('uid'));
			if (!empty($return)) {
				redirect(BASE_URL.'ratings/view/'.$return);
			}

		} catch (Exception $e) {
			$data['error'] = $e->getMessage();
		}

		$this->layout->view('rateme/createtest', $data);
	}

	function results($code='')
	{
		if (!$this->session->userdata('uid') || $this->session->userdata('ipuser') == 1) {
			redirect(BASE_URL.'users/fblogin');
		}

		$data = array();
		$return = $this->Rateme_model->get_user_code_details($this->session->userdata('uid'));
		if (empty($return)) {
			redirect(BASE_URL.'ratings/create');
		}

		$data['profile'] = $return;
		$return = $this->Rateme_model->get_rating($return->rateme_test_id);
		$data['ratings'] = $return;
		$data['pageTitle'] = "My Test Result";
		$this->layout->view('rateme/results', $data);
	}

	public function test()
	{
		$remote_addr = $_SERVER['REMOTE_ADDR'];
		$this->load->library('Ipsniffing');
		$retObj = $this->ipsniffing->sniffIP($remote_addr);
		pr($retObj);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */