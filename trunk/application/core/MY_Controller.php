<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class MY_Controller extends CI_Controller
{

	protected $coreData = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		define('BASE_URL', base_url());
		$this->set_site_details();
	}

	protected function set_site_details()
	{
		$siteIds = array(
		'http://core.10000projects.info/befikir/' => array('id' => 1, 'name' => 'Befikir', 'template' => 'befikir', 'url' => 'http://core.10000projects.info/befikir/', 'fbappid' => '466812640509', 'fbappsecret' => '974720da044742624842eda25d8def56', 'fbappkey' => '969ef79d60703de08b50cf09f4da4285', 'default_controller' => '', 'email' => 'noreply@core.10000projects.info'), 

		'http://homoeopathy.10000projects.info/' => array('id' => 2, 'name' => 'Homoeopathy', 'template' => 'homoeopathy', 'url' => 'http://homoeopathy.10000projects.info/', 'fbappid' => '466812640509', 'fbappsecret' => '974720da044742624842eda25d8def56', 'fbappkey' => '969ef79d60703de08b50cf09f4da4285', 'default_controller' => '', 'email' => 'noreply@core.10000projects.info'), 

		'http://detective.10000projects.info/' => array('id' => 3, 'name' => 'Detective', 'template' => 'detective', 'url' => 'http://detective.10000projects.info/', 'fbappid' => '466812640509', 'fbappsecret' => '974720da044742624842eda25d8def56', 'fbappkey' => '969ef79d60703de08b50cf09f4da4285', 'default_controller' => '', 'email' => 'noreply@core.10000projects.info'),

		'http://rateme.co.in/' => array('id' => 4, 'name' => 'Rate Me', 'template' => 'rateme', 'url' => 'http://www.rateme.co.in/', 'fbappid' => '199968910028088', 'fbappsecret' => 'eb4fd0cec5ecba69e472c8b47d67df68', 'fbappkey' => 'bb3c73a03887322d5347a021ec4986d6', 'default_controller' => 'ratings', 'email' => 'noreply@rateme.co.in'),
		);

		$currentUrl = str_replace('www.', '', BASE_URL);
		if (empty($siteIds[$currentUrl]['id'])) {
			die(SITE_NOT_READY);
		}

		//check if default controller
		if (!empty($siteIds[$currentUrl]['default_controller'])) {
			if ($this->uri->rsegments[1] === $this->router->routes['default_controller']) {
				redirect(BASE_URL.$siteIds[$currentUrl]['default_controller']);
			}
		}

		define('SITE_ID', $siteIds[$currentUrl]['id']);
		define('SITE_NAME', $siteIds[$currentUrl]['name']);
		define('SITE_TEMPLATE', $siteIds[$currentUrl]['template']);
		define('SITE_EMAIL', $siteIds[$currentUrl]['email']);
		define('FB_APP_ID', $siteIds[$currentUrl]['fbappid']);
		define('FB_APP_KEY', $siteIds[$currentUrl]['fbappkey']);
		define('FB_APP_SECRET', $siteIds[$currentUrl]['fbappsecret']);
		$this->layout->setLayout('layouts/'.SITE_TEMPLATE);
	}


	protected function sess_user()
	{
		$data = array();
		if ($this->session->userdata('uid')) {
			$data['uid'] = $this->session->userdata('uid');
			$data['username'] = $this->session->userdata('username');
			$data['name'] = $this->session->userdata('name');
			$data['email'] = $this->session->userdata('email');
			$data['id'] = $this->session->userdata('id');
			$data['gender'] = $this->session->userdata('gender');
			$data['timezone'] = $this->session->userdata('timezone');
			$data['location'] = $this->session->userdata('location');
			$data['lastlogin'] = $this->session->userdata('lastlogin');
			$data['pic'] = $this->session->userdata('pic');
		}

		return $data;
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */