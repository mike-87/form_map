<?php
	
class User extends Database {
	
	// default values of the classes table name and database columns
	static protected $table_name = 'users';
	static protected $db_columns = ['id', 'fname', 'lname', 'street_number', 'city', 'country'];
	
	public $id;
	public $fname;
	public $lname;
	public $street_number;
	public $city;
	public $country;
	
	// binds the parameters that came from the POST variable after the submission
	
	public function __construct($args = []){
		$this->fname = isset($args['fname']) ? $args['fname'] : '';
		$this->lname = isset($args['lname']) ? $args['lname'] : '';
		$this->street_number = isset($args['street_number']) ? $args['street_number'] : '';
		$this->city = isset($args['city']) ? $args['city'] : '';
		$this->country = isset($args['country']) ? $args['country'] : '';
	}	

	
}
	
?>