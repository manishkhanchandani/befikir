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
		//send email to owner
		/*$this->load->library('email');

		$this->email->from(SITE_EMAIL, 'Rate Me');
		$this->email->to($data->email); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 
		$this->email->subject('New Rating Received.');
		$this->email->message('Your fan has given you a rating of "'.$val.'" for your quality "'.$type.'". You can view your test result at '.BASE_URL.'ratings/results or you can view your test at '.BASE_URL.'ratings/view/'.$data->activation);

		$this->email->send();*/
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

	public function get_user_code_details($uid)
	{
		if (empty($uid)) {
			return false;
		}

		$sql = "select * from rateme_test as r LEFT JOIN users as u ON r.uid = u.uid WHERE u.uid = ?";
		$result = $this->db->query($sql, array($uid));
		$result_array = $result->row();
		return $result_array;
	}

	public function get_rating($id)
	{
		if (empty($id)) {
			return false;
		}

		$sql = "select sum(loving)/count(loving) as loving, sum(patience)/count(patience) as patience, sum(listens)/count(listens) as listens, sum(caring)/count(caring) as caring, sum(honesty)/count(honesty) as honesty, sum(peacefullness)/count(peacefullness) as peacefullness, sum(humor)/count(humor) as humor, sum(joyful)/count(joyful) as joyful, sum(faithfull)/count(faithfull) as faithfull, sum(humility)/count(humility) as humility, sum(looks)/count(looks) as looks, sum(weight)/count(weight) as weight, sum(height)/count(height) as height, sum(charcter)/count(charcter) as charcter, count(rateme_test_id) as total_votes from rateme_results as r WHERE r.rateme_test_id = ? GROUP BY r.rateme_test_id";
		$result = $this->db->query($sql, array($id));
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
		return $result_array;
	}

	public function postfb($params=array())
	{
		$url = "https://graph.facebook.com/me/feed"; // URL
		$POSTFIELDS = http_build_query($params);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$POSTFIELDS);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		$ret = json_decode($result);
		if ($ret->id) {
			return false;
		} else {
			return $ret->error->message;
		}
	}

}
?>