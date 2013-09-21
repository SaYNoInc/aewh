<?php
include 'classes/db-class.php';

class Model extends Dbase{

private $validate; // holds the object for the validate class
public $loginMsg; // message to be displayed on the login form
public $adminLoggedIn; // boolean variable which set to true if admin is logged in

	public function __construct(){

		parent::__construct(); // call the constructor of the parent class
		$pagesToValidate = array('home');

		if (in_array($_GET['page'], $pagesToValidate)) {
			
			include 'classes/validate-class.php';
			$this->validate = new Validate;

		}# end if

	}# end __construct	

public function checkUserSession(){

	// check if user logout
	if ($_GET['page'] == 'logout') {
		
		unset($_SESSION['userName']);
		unset($_SESSION['userAccess']);
		unset($_SESSION['userID']);
		$this->model->adminLoggedIn = false;
		$this->loginMsg = 'You have succesfully logout';

	}# end if

	// check if login form has been submitted
	if ($_POST['login']) {
		
		if ($_POST['userName'] && $_POST['userPassword']) {
			
			$this->adminLoggedIn = $this-> validateUser();
			// if admin login is succesful
			if (!$this->adminLoggedIn) {
				
				$this->loginMsg = 'Sorry login failed.';

			}# end if

		}else{

			$this->loginMsg = 'Please enter Username and Password';

		}# end if

	}else{

		if ($_SESSION['userAccess'] == 'admin') {
			
			$this->adminLoggedIn = true;	

		}# end if

	}# end if

}# end checkUserSession

// this function validate the input from login form against the user table
private function validateUser(){
	
	$user = $this-> getUser();
	
	if (is_array($user) && $user['userAccess'] == 'admin') {

		$_SESSION['userName'] = $user['userName'];
		$_SESSION['userAccess'] = $user['userAccess'];
		$_SESSION['userID'] = $user['userID'];

		return true;
	
	}else{

		return false;

	}# end if

}# end validateUser

public function validateInsp(){

	extract($_POST);
	$result['inspMsg'] = $this->validate->checkRequired($inspiration);
	$result['ok'] = $this->validate->checkErrorMessages($result);
	return $result;

}

public function processAddInsp(){

	$result = $this->validateInsp();
	if ($result['ok']) {

		$result['msg'] = $this->insertInsp();
		// header("Location: index.php");
	
	}

return $result;
}# end processAddInspiration



}# end model
?>