<?php
class Users_model extends CI_Model
{
	public  function __construct()
	{
		parent::__construct();
	}

	public function create_user($data=array())
	{
		$sql = "insert into users set username = ?, email = ?, password = ?, created = ?, updated = ?, lastlogin = ?, name = ?, gender = ?, location = ?, site_id = ?";
		$this->db->query($sql, array($data['username'], $data['email'], $data['password'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $data['name'], $data['gender'], $data['location'], SITE_ID));
		$id = $this->db->insert_id();
		$return = array('uid' => $id, 'username' => $data['username'], 'name' => $data['name'], 'email' => $data['email'], 'id' => NULL, 'gender' => $data['gender'], 'timezone' => NULL, 'location' => $data['location'], 'lastlogin' => date('Y-m-d H:i:s'), 'pic' => NULL);
		return $return;
	}

	public function create_ip_user($data=array())
	{
		if (empty($data['id'])) {
			return false;
		}

		$sql = "select * from users_connect as uc WHERE uc.connect_type_id = '".IP_CONNECT_ID."' AND uc.connection_name = '".$data['id']."' AND site_id = '".SITE_ID."'";
		$result = $this->db->query($sql);
		$result_array = $result->row();
		if (empty($result_array)) {
			$sql = "insert into users set username = ?, created = ?, updated = ?, lastlogin = ?, name = ?, profile_pic = ?, dob = ?, gender = ?, timezone = ?, location = ?, site_id = ?, password = ?";
			$this->db->query($sql, array($data['id'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $data['id'], '', '', '', '', '', SITE_ID, 'password'));
			$id = $this->db->insert_id();
			$sql = "insert into users_connect set uid = ?, connect_type_id = ?, access_token = ?, extras = ?, connection_name = ?, site_id = ?";
			$remote_addr = $data['id'];
			$this->load->library('Ipsniffing');
			$retObj = $this->ipsniffing->sniffIP($remote_addr);
			$data['locationfinder'] = $retObj;
			$extras = serialize($data);
			$this->db->query($sql, array($id, IP_CONNECT_ID, '', $extras, $data['id'], SITE_ID));
		} else {
			$sql = "update users set updated = ?, lastlogin = ? WHERE uid = ?";
			$id = $result_array->uid;
			$this->db->query($sql, array(date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $id));
		}

		$return = array('uid' => $id, 'username' => $data['id'], 'name' => $data['id'], 'email' => '', 'id' => $data['id'], 'gender' => '', 'timezone' => '', 'location' => '', 'lastlogin' => date('Y-m-d H:i:s'), 'pic' => '', 'token' => '', 'ipuser' => 1);
		return $return;
	}

	public function create_fb_user($data=array())
	{
		if (empty($data['id'])) {
			return false;
		}

		$sql = "select * from users_connect as uc WHERE uc.connect_type_id = '".FACEBOOK_CONNECT_ID."' AND uc.connection_name = '".$data['id']."' AND site_id = '".SITE_ID."'";
		$result = $this->db->query($sql);
		$result_array = $result->row();
		$dob = date('Y-m-d', strtotime($data['birthday']));
		if (empty($result_array)) {
			$sql = "insert into users set email = ?, created = ?, updated = ?, lastlogin = ?, name = ?, profile_pic = ?, dob = ?, gender = ?, timezone = ?, location = ?, site_id = ?";
			$this->db->query($sql, array($data['email'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $data['name'], 'https://graph.facebook.com/'.$data['id'].'/picture?type=large', $dob, $data['gender'], $data['timezone'], $data['location']['name'], SITE_ID));
			$id = $this->db->insert_id();
			$this->load->library('Ipsniffing');
			$retObj = $this->ipsniffing->sniffIP($_SERVER['REMOTE_ADDR']);
			$data['locationfinder'] = $retObj;
			$extras = serialize($data);
			$sql = "insert into users_connect set uid = ?, connect_type_id = ?, access_token = ?, extras = ?, connection_name = ?, site_id = ?";
			$this->db->query($sql, array($id, FACEBOOK_CONNECT_ID, $data['token'], $extras, $data['id'], SITE_ID));
		} else {
			$sql = "update users set email = ?, updated = ?, lastlogin = ?, name = ?, dob = ?, gender = ?, timezone = ?, location = ? WHERE uid = ?";
			$id = $result_array->uid;
			$this->db->query($sql, array($data['email'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $data['name'], $dob, $data['gender'], $data['timezone'], $data['location']['name'], $id));
		}

		$return = array('uid' => $id, 'username' => $data['name'], 'name' => $data['name'], 'email' => $data['email'], 'id' => $data['id'], 'gender' => $data['gender'], 'timezone' => $data['timezone'], 'location' => $data['location']['name'], 'lastlogin' => date('Y-m-d H:i:s'), 'pic' => 'https://graph.facebook.com/'.$data['id'].'/picture?type=large', 'token' => str_replace('access_token=', '', $data['token']), 'ipuser' => 0);
		return $return;
	}//end create_fb_user()

	public function login_user($data=array())
	{
		$sql = "select * from users WHERE (username = ? OR email = ?) AND password = ? AND site_id = ?";
		$result = $this->db->query($sql, array($data['username'], $data['username'], $data['password'], SITE_ID));
		$result_array = $result->row();
		print_r($result_array);
	}

	public function get_user_details($uid)
	{
		if (empty($uid)) {
			return false;
		}

		$sql = "select * from users WHERE uid = ?";
		$result = $this->db->query($sql, array($uid));
		$result_array = $result->row();
		return $result_array;
	}

}
?>