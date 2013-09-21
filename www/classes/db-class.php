<?php
## this class containt all the method, to connect to DB ##
## and to query to the table of DB ##

include '../config.php';

class Dbase{

	private $db;

	//	this function establishes a database connection
	public function __construct(){	
		
		try {

			$this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);	
			if (mysqli_connect_errno()) {
	
				throw new Exception("Unable to establish database connection");
	
			}
		
		}catch(Exception $e){

			die($e->getMessage());
		
		}# end try
	}# end __construct

# reads the page record corresponding to the page passed
public function getPageInfo($page){
	
$qry = "SELECT pageID, pageName, pageTitle, pageHeading, pageKeywords, pageDescription, pageContent FROM pages WHERE pageName ='$page' ";
$rs = $this-> db -> query($qry);
	if($rs){

		if ($rs-> num_rows > 0) {
	
			$pageInfo = $rs->fetch_assoc();
			return $pageInfo;
		
		}else{
	
			// echo "page does not exist.";
		
		}# end if
	
	}else{

		echo "Error executing query." . $qry;

	}# end if

}# end getPageInfo
	
public function getNewInsp(){
	
$qry = "SELECT inspText FROM inspirations ORDER BY timeStamp DESC LIMIT 0, 1";
$rs = $this-> db -> query($qry);
	if($rs){

		if ($rs-> num_rows > 0) {
			
			$insp = array();
			while ($row = $rs->fetch_assoc()) {
				$insp[] = $row;
			
			}# end if

			return $insp;

		}else{
	
			echo "There is Daily Inspirations.";
		
		}# end if
	
	}else{

		echo "Error executing query. " . $qry;

	}# end if

}# end getNewInsp

public function getInsp(){
	
$qry = "SELECT inspID, inspText, timeStamp FROM inspirations ORDER BY timeStamp DESC";
$rs = $this-> db -> query($qry);
	if($rs){

		if ($rs-> num_rows > 0) {
			
			$insp = array();
			while ($row = $rs->fetch_assoc()) {
				$insp[] = $row;
			
			}# end if

			return $insp;

		}else{
	
			echo "There is Daily Inspirations.";
		
		}# end if
	
	}else{

		echo "Error executing query. " . $qry;

	}# end if

}# end getNewInsp

public function insertInsp(){

	if (!get_magic_quotes_gpc()) {
	
		$this->sanitiseInput();
	
	}# end if

	extract($_POST);
	$qry = "INSERT INTO inspirations VALUES(NULL, '$inspiration', $userID, NULL) ";
	
	$rs = $this->db->query($qry);
	
	// test if a record has been created
	if ($rs && $this->db->affected_rows > 0) {
	
		$msg = 'New Inspiration created.';
	
	}else{

		echo "Error inserting Inspiration " . $qry;
	
	}# end if

return $msg;

}# end inserInsp

// delete Inspiration
public function deleteInsp(){

	$did = $_GET['did'];
	$qry = "DELETE FROM inspirations WHERE inspID = $did";
	$rs = $this->db->query($qry);
	if ($rs) {
		
		if ($this->db->affected_rows > 0) {

			// echo "Post and Related comment deleted.";

		}# end if
	
	}else{
	
		echo 'Error executing query '.$qry;
		return false;
	
	}# end if

}# end deletePost

public function getUser(){
		extract($_POST);
		$password = sha1($userPassword);	//	encrypt the password form the form
		$qry = "SELECT userID, userName, userAccess FROM users where userName = '$userName' and userPassword = '$password'";
		$rs = $this->db->query($qry);
		
		if ($rs) {
			
			if ($rs->num_rows > 0) {
			
				$user = $rs->fetch_assoc();		//	convert the user record to an associatve array
				return $user;
			
			}# end if
		
		}else{
			
			echo 'Error executing query '.$qry;
		
		}# end if
	
	}# end getUser

public function sanitiseInput(){

	foreach ($_POST as &$post) {
		
		$post = $this->db->real_escape_string($post);

	}# end foreach

}# end sanitiseInput

}# end Dbase
?>