<?php

namespace App;

abstract class Conn {

	//Metodos
	public static function getDb(){
		return new \PDO("mysql: host=localhost; dbname=mvc;", 'root','');
		
	}

}
