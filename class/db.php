<?php 

class Db {

	private $serverName;
	private $username;
	private $password;
	private $dbName;
	private $charset;

	protected function connect() {
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbName = "core3";

		try {
			$dsn = "mysql:Server=".$this->servername.";dbname=".$this->dbName;
			$pdo = new PDO($dsn,$this->username,$this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (PDOException $e) {
			echo "Connection Failed: ".$e->getMessage();
		}
	}

}