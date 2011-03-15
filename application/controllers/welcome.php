<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data = array('pageTitle' => 'Welcome To Befikir');
		$this->layout->view('welcome_message', $data);
	}

	function profile()
	{
		$data = array('pageTitle' => 'My Profile');
		$data['user'] = $this->sess_user();
		$this->layout->view('welcome_message', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */