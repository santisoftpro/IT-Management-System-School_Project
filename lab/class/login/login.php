<?php
require_once "../config/config.php";

/**
 * 
 */
class login
{
	public function admin_login($username, $password)
	{
		global $conn;

		$sql = $conn->prepare('SELECT * FROM user WHERE BINARY username = ? AND BINARY password = ? AND status = ?');
		$sql->execute(array($username, $password, 1));
		$fetch = $sql->fetch();
		$count = $sql->rowCount();
		if ($count > 0) {

			session_start();
			$_SESSION['admin_id'] = $fetch['id'];
			$_SESSION['admin_name'] = $fetch['name'];
			$_SESSION['admin_username'] = $fetch['username'];
			$_SESSION['admin_type'] = $fetch['type'];
			echo "1";

		} else {
			echo "0";
		}
	}

	public function branch_login($username, $password, $branches)
	{
		global $conn;

		$sql = $conn->prepare('SELECT * FROM user WHERE username = ? AND password = ? AND branches = ? AND status = ?');
		$sql->execute(array($username, $password, $branches, 1));
		$fetch = $sql->fetch();
		$count = $sql->rowCount();
		if ($count > 0) {

			session_start();
			$_SESSION['branch_id'] = $fetch['id'];
			$_SESSION['branch_name'] = $fetch['branches'];
			$_SESSION['branch_username'] = $fetch['username'];
			$_SESSION['branch_type'] = $fetch['type'];
			echo "1";

		} else {
			echo "0";
		}
	}

	public function member_login($id)
	{
		global $conn;

		$sql = $conn->prepare('SELECT * FROM member WHERE m_school_id = ? AND m_status = ?');
		$sql->execute(array($id, 1));
		$count = $sql->rowCount();
		$fetch = $sql->fetch();

		if ($count > 0) {

			session_start();
			$_SESSION['member_id'] = $fetch['id'];
			$_SESSION['member_name'] = $fetch['m_fname'] . " " . $fetch['m_lname'];
			$_SESSION['member_type'] = $fetch['m_type'];
			echo "1";
		} else {
			echo "0";
		}

	}

}

$login = new login();

$key = trim($_POST['key']);

switch ($key) {

	case 'admin_login';
		$username = trim($_POST['username']);
		$password = trim(md5($_POST['password']));
		$login->admin_login($username, $password);
		break;
	case 'branch_login';
		$username = trim($_POST['username']);
		$password = trim(($_POST['password']));
		$branches = trim($_POST['e_branch']);
		$login->branch_login($username, $password, $branches);
		break;
	case 'member_login';
		$id = trim($_POST['id_number']);
		$login->member_login($id);
		break;

}

?>