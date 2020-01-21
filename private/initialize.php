<?php
	// this file includes everything;
	// then you need to include only this file in all the others
	
	// prepares all the classes for loading that are placed in the specified folder
	function my_autoload($class){
	  if(preg_match('/\A\w+\Z/', $class)){
		  include('classes/' . $class . '.class.php');
	  }
  }
  
  // loads all my classes to php
  
  spl_autoload_register('my_autoload');
	
	// instantiation of the database and setting of the connection
	$conn = new Database();
	Database::set_database($conn);
?>