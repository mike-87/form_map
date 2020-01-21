<?php
require_once ('../private/initialize.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	// Create record using post parameters
	$args = $_POST['user'];
	$user = new User($args);
	$result = $user->create();
	
	/* if($result === true) {
		$user->find_all();
	} */
	
}

?>