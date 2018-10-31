<?php
namespace Components;

class Db
{
	public static function getConnect()
	{
		$host = 'localhost';
		$db   = 'test';
		$user = 'root';
		$password = '1283';
		$charset = 'utf8';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		
		$options = [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
		  ];

		$pdo = new \PDO($dsn, $user, $password, $options);

		return $pdo;
	}
}
