<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ratings extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Rateme_model');
	}

	function index()
	{
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
			$this->session->set_userdata('redirecturl', $_SERVER['REQUEST_URI']);
			redirect(BASE_URL.'users/fblogin');
		}

		$data = array();
		$return = $this->Rateme_model->get_code_details($code);
		$data['profile'] = $return;
		$data['pageTitle'] = $return->name."'s Test";
		$data['code'] = $code;
		$ratings = $this->Rateme_model->get_rating_details($code, $this->session->userdata('uid'));
		$data['ratings'] = $ratings;
		$this->layout->view('rateme/ratings', $data);
	}

	function validate($email='', $code='')
	{
		$data = array('pageTitle' => 'Validate New Test');
		$this->layout->view('rateme/createtest', $data);
	}


	function create()
	{
		if (!$this->session->userdata('uid')) {
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
		$data = array('pageTitle' => 'Result');
		$this->layout->view('rateme/results', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */