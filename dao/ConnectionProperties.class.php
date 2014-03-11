<?php
/**
 * Connection properties - a class named ConnectionProperties
 * with private static fields and public static getters.


 */

class ConnectionProperties{
	private static $host = 'rderecursivacom.ipagemysql.com';
	private static $user = 'jqdemoadmin';
	private static $password = 'veran0!!';
	private static $database = 'db_jqdemo';

	public static function getHost(){
		return ConnectionProperties::$host;
	}

	public static function getUser(){
		return ConnectionProperties::$user;
	}

	public static function getPassword(){
		return ConnectionProperties::$password;
	}

	public static function getDatabase(){
		return ConnectionProperties::$database;
	}
}
?>