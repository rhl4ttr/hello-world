<?php

define("READ_MOCK_SERVER", "127.0.0.1");
define("READ_MOCK_USER", "root");
define("READ_MOCK_PASSWORD", "qkr123@#");
define("READ_MOCK_NAME", "railway");
define("READ_MOCK_PORT", "3306");


define("WRITE_MOCK_SERVER", "127.0.0.1");
define("WRITE_MOCK_USER", "root");
define("WRITE_MOCK_PASSWORD", "qkr123@#");
define("WRITE_MOCK_NAME", "railway");
define("WRITE_MOCK_PORT", "3306");








class DbConnection{
	
	private $connections;	
	
	private static $instance;
	
	
	const DB_MOCK = "mock";
	
	const READ_SERVER = 1;
	const WRITE_SERVER = 2;
	
	const READ_SERVER_PERSISTANT = 3;
	const WRITE_SERVER_PERSISTANT = 4;
	
	private function __clone(){}
	
	public static function getInstance(){
		
		if(is_null(self::$instance)){
			self::$instance = new DbConnection();
		}
		
		return self::$instance;
		
	}
	
	private function __construct(){
		$this->connections = array();
		
	}
	
	/**
	 * Get Non-Persistant Database connection
	 * 
	 * @param Integer $connectionType
	 * @return PDO
	 */
	public function getConnection($dbName, $connectionType = self::READ_SERVER){
		$key = "{$dbName}.{$connectionType}";
		
		if(array_key_exists($key, $this->connections)){
			return $this->connections[$key];
		}else{
			if($connectionType==self::READ_SERVER && $dbName==self::DB_MOCK){
				
				$pdo = new PDO('mysql:dbname='.$dbName.';host='.READ_MOCK_SERVER, 
					READ_MOCK_USER, 
					READ_MOCK_PASSWORD, 
					array(
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
						)
					);
				
				
			}elseif($connectionType==self::WRITE_SERVER && $dbName==self::DB_MOCK){
				
				$pdo = new PDO('mysql:dbname='.$dbName.';host='.WRITE_MOCK_SERVER, 
					WRITE_MOCK_USER, 
					WRITE_MOCK_PASSWORD, 
					array(
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
						)
					);
				
			}
			
			$this->connections[$key] = $pdo;
			return $pdo;
		}		
		
	}
	
	/**
	 * Get Persistant Database connection
	 *
	 * @param Integer $connectionType
	 * @return PDO
	 */
	public function getPConnection($dbName, $connectionType){
		$pdo = null;
		
		
		if($connectionType==self::READ_SERVER && $dbName==self::DB_MOCK){
		
			$pdo = new PDO('mysql:dbname='.$dbName.';host='.READ_MOCK_SERVER, 
					READ_MOCK_USER, 
					READ_MOCK_PASSWORD, 
					array(
							PDO::ATTR_PERSISTENT => true
						)
					);
		
		
		}elseif($connectionType==self::WRITE_SERVER && $dbName==self::DB_MOCK){
		
			$pdo = new PDO('mysql:dbname='.$dbName.';host='.WRITE_MOCK_SERVER, 
					WRITE_MOCK_USER, 
					WRITE_MOCK_PASSWORD, 
					array(
							PDO::ATTR_PERSISTENT => true
						)
					);
		
		}		
		
		return $pdo;
	
	}
	
	
}






?>