<?php
	
class Database {
	
	private static $db_instance = null;
	static protected $conn;
	static protected $table_name = "";
	static protected $db_columns = [];
	public $errors = [];
	
	private $db_server = 'localhost';
	private $db_user = 'formuser';
	private $db_pass = 'formpassword';
	private $db_name = 'formdb';
	
	public function __construct(){
		// Establishment of the database connection
		try {
		self::$conn = new PDO("mysql:host={$this->db_server};dbname={$this->db_name}", $this->db_user, $this->db_pass);
		// set the PDO error mode to exception
		self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully"; 
		}
	catch(PDOException $e)
		{
		echo "Database connection failed: " . $e->getMessage();
		}
	}
	
	// sets the database connection
	
	 static public function set_database($conn) {
		self::$conn = $conn;
	}
	
	// gets an instance	
	public static function get_instance(){
		if(!self::$db_instance) {
			self::$db_instance = new Database();
		}
		
		return self::$db_instance;
	}
	
	// gets the database connection	
	public function get_connection(){
		return $this->conn;
	}

	
	// database insert statement function
	
	public function create(){
		$attributes = $this->attributes();
		$sql = "INSERT INTO " . static::$table_name . " (";
		$sql .= join(', ', array_keys($attributes));
		$sql .= ") VALUES (";
		$sql .= "?,?,?,?,?";
		$sql .= ")";
		$stmt = self::$conn->prepare($sql)->execute(join("', '", array_values($attributes)));
		return $stmt;
	}
	
	// prepares the attributes and values for the SQL insert statement
	
	public function attributes(){
		$attributes = [];
		foreach(static::$db_columns as $column){
			if($column == 'id') { continue; }
			$attributes[$column] = $this->$column;
		}
		return $attributes;
	}
	
}
	
?>
