<?php

include(realpath(__DIR__ . '/..') . "/model/model.php");
date_default_timezone_set('Asia/Karachi');

class AuthController extends Model {

    public $messages = array();
	protected $model;

	function __construct()
	{
		$this->model = new Model();
	}

	public function protect($var)
	{
		$var = trim(strip_tags(addslashes($this->model->conn->real_escape_string($var))));
		return $var;
	}

    // Checks whether SESSION registered or not
	public function chkSession()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
	}

    // Checks whether and user Logged in or not
	public function logChk()
	{
		session_start();
		if (count($_SESSION) > 0) {
			header("location: index");
		}
	}

    public function loginC($un, $upwd)
	{

		$un = $this->protect($un);
		$upwd = $this->protect($upwd);
		$upwd = hash('sha256', $upwd);

		if (!empty($un) && !empty($upwd)) {
			$login = $this->model->login($un, $upwd);
			
			if ($login->num_rows > 0) {
				while ($row = $login->fetch_assoc()) {
					$id = $row['id'];
					$DbRole = $row['role'];
					$DbName = $row['name'];
					$DbStatus = $row['status'];
				}

				if ($DbStatus == 'active') {

					$this->chkSession();
					// Sending User ID alogn with Full Name for further use Like updating Password etc
					$_SESSION[$DbRole] = $id . "_" . $DbName . "_" . $DbRole;
					header("location: index");
				} else {
					$this->messages[] = "<div class='message alert alert-danger'>Your status is <strong>INACTIVE</strong>, contact the Administrator.</div>";
				}
			} else {
				$this->messages[] = "<div class='message alert alert-danger'>Your credentials don't match with Database.</div>";
			}
		} else {
			$this->messages[]  = "<div class='message alert alert-danger'>Fill all the Fields.</div>";
		}

		// Check if any Error exists
		if (count($this->messages) > 0) {
			foreach ($this->messages as $msg) {
				echo $msg;
			}
		}
	}
}