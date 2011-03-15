<?php
class Rateme_model extends CI_Model
{
	public  function __construct()
	{
		parent::__construct();
	}

	public function create_test($data=array())
	{
		$sql = "select * from rateme_test where uid = ?";
		$result = $this->db->query($sql, array($data['uid']));
		$result_array = $result->row();
		if (!empty($result_array)) {
			return false;
		}

		$activation = md5($data['uid'].$this->config->config['encryption_key']);
		$activation_result = md5($data['uid'].$this->config->config['encryption_key'].'results');
		$sql = "insert into rateme_test set uid = ?, site_id = ?, activation = ?, activation_result = ?, test_created_date = ?, test_updated_date = ?, status = 0";
		$result = $this->db->query($sql, array($data['uid'], SITE_ID, $activation, $activation_result, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')));
		return $activation;
	}

	public function update_test($data=array())
	{
		
	}

	public function create_rating($data, $uid, $val='', $type='loving')
	{
		if (empty($data)) {
			return false;
		}

		if (!is_numeric($val)) {
			return false;
		}

		$sql = "insert into rateme_results (rateme_test_id, rateby_uid, site_id, ".$type.", created_date, updated_date) VALUES ('".$data->rateme_test_id."', '".$uid."', '".SITE_ID."', '".$val."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."') ON DUPLICATE KEY UPDATE ".$type." = '".$val."', updated_date = '".date('Y-m-d H:i:s')."'";
		$result = $this->db->query($sql);
		return true;
	}

	public function get_code_details($code)
	{
		if (empty($code)) {
			return false;
		}

		$sql = "select * from rateme_test as r LEFT JOIN users as u ON r.uid = u.uid WHERE r.activation = ?";
		$result = $this->db->query($sql, array($code));
		$result_array = $result->row();
		return $result_array;
	}

	public function validate_test($uid)
	{
		$sql = "select * from rateme_test where uid = ? and site_id = ?";
		$result = $this->db->query($sql, array($uid, SITE_ID));
		$result_array = $result->row();
		if (empty($result_array)) {
			return false;
		}

		return $result_array->activation;
	}

	public function get_rating_details($code, $uid)
	{
		if (empty($code)) {
			return false;
		}

		if (empty($uid)) {
			return false;
		}

		$sql = "select * from rateme_test as t LEFT JOIN rateme_results as r ON t.rateme_test_id  = r.rateme_test_id WHERE t.activation = ? AND r.rateby_uid = ?";
		$result = $this->db->query($sql, array($code, $uid));
		$result_array = $result->row();
		pr($result_array);
		return $result_array;
	}

	public function postfb()
	{
		$url = "https://graph.facebook.com/me/feed"; // URL
	$params['access_token'] = $token;
	$params['message'] = 'Sample message is posted on '.date('r');
	$params['link'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$params['picture'] = 'http://women.cs.cmu.edu/Who/Alumnae/photos/aparna.jpg';
	$params['name'] = 'Naveen Name';
	$params['caption'] = 'My Caption';
	$params['description'] = 'Description is here. how are you.';
	$params['actions'] = json_encode(array('name'=>'View on Live', 'link'=>$page));
	//$params['privacy'] = $_POST['privacy'];
	$POSTFIELDS = http_build_query($params);
	$ch = curl_init();// Initialize a CURL session.     
	curl_setopt($ch, CURLOPT_URL, $url);  // The URL to fetch. You can also set this when initializing a session with curl_init(). 
	curl_setopt($ch, CURLOPT_POST, 1); //TRUE to do a regular HTTP POST. This POST is the normal application/x-www-form-urlencoded kind, most commonly used by HTML forms. 
	curl_setopt($ch, CURLOPT_POSTFIELDS,$POSTFIELDS); //The full data to post in a HTTP "POST" operation. 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly. 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // TRUE to follow any "Location: " header that the server sends as part of the HTTP header (note this is recursive, PHP will follow as many "Location: " headers that it is sent, unless CURLOPT_MAXREDIRS is set). 
	
	$result = curl_exec($ch);  // grab URL and pass it to the variable.
	curl_close($ch);  // close curl resource, and free up system resources.
	
	$ret = json_decode($result); // Print page contents.
	if ($ret->id) {
		echo 'Sample Message Posted on your wall';
	} else {
		echo $ret->error->message;
	}
	}

}
?>