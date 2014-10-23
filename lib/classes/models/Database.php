<?php

define("DB_HOST", isset($_ENV['OPENSHIFT_MYSQL_DB_HOST']) ? $_ENV['OPENSHIFT_MYSQL_DB_HOST'] : 'localhost');
define("DB_NAME", isset($_ENV['OPENSHIFT_APP_NAME']) ? $_ENV['OPENSHIFT_APP_NAME'] : 'rich');
define("DB_USER", isset($_ENV['OPENSHIFT_MYSQL_DB_USERNAME']) ? $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'] : 'root');
define("DB_PASSWORD", isset($_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']) ? $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'] : '');

class Database{
	public static function open(){
		$dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
				DB_USER, DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbh;
	}
}
