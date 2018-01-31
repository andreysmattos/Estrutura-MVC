<?php

namespace App\Models;

class Client {
	//Atributos
	protected $db;

	//Metodos

	//Construtor
	public function __construct(\PDO $db){
		$this->db = $db;
	}


	public function list(){
		$sql = "SELECT * FROM clients";
		return $this->db->query($sql);
	}
}