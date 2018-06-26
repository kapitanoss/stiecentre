<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();

    	$this->_db = $db;
    }

	private function get_user_hash($username,$tren){

		try {
			if ($tren==true) 
			     {$stmt = $this->_db->prepare('SELECT password, username, memberID FROM memberstren WHERE username = :username AND active="Yes" ');}
			else {$stmt = $this->_db->prepare('SELECT password, username, memberID FROM members     WHERE username = :username AND active="Yes" ');}
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($username,$password,$tren){

		$row = $this->get_user_hash($username,$tren);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username_s'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
