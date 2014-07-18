<?php

class Connection extends PDO
{
	
	public static $conn;
	public static $arConfig = array(
			'database' => 'mysql',
			'host' => 'localhost',
			'dbname' => 'test',
			'user' => 'root',
			'pass' => ''
		);

	public static function getConfig(){
		return self::$arConfig;
	}

    public static function getConnection() {

        if(!isset(self::$conn)){
			try {
				$db = (object) self::$arConfig;

				self::$conn = new \PDO($db->database.":host=".$db->host.";dbname=".$db->dbname."", 
									   $db->user, 
									   $db->pass);

			} catch(\PDOException $e){
				die("Code Error: ".$e->getCode(). "<br /><br />".$e->getMessage());
			}
        }

        return self::$conn;
    }	
}

// var_dump(Connection::getConnection());