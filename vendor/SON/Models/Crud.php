<?php

namespace SON\Models;

abstract class Crud {
	//Atributos
	protected $db;

	//Metodos

	//Construtor
	public function __construct(\PDO $db){
		$this->db = $db;
	}


	public function list(){
		$sql = "SELECT * FROM $this->table";
		return $this->db->query($sql);
	}

	public function find(int $id){
		$id = filter_var($id, FILTER_VALIDATE_INT);
		if($id <= 0){
			return false;
		}
		$sql = "SELECT * FROM $this->table where id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public function delete(int $id){
		$id = filter_var($id, FILTER_VALIDATE_INT);
		if($id <= 0){
			return false;
		}
		$sql = "DELETE FROM $this->table where id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id", $id);
		$result = $stmt->execute();
		if(!$result){
			echo "<pre>";
				print_r($stmt->errorInfo());
			echo "</pre>";
		} else {
			//return $stmt->rowCount();
		}
	}

	/*
		No array primeiro passa o campo e depos o valor.
		$a = array('name'=>'AndreySAVE', 'email'=>'andreysmattosSAVE@hotmail.com');
	*/
	public function save(array $array){
		// $SQL = "INSERT INTO (name, email) values (?,?)"
		$campos = '';
		$values = '';
		$i = 0;
		foreach($array as $campo=>$value){
			$campos .= (end($array) != $value) ? $campo.", " : $campo;
			$values .= (end($array) != $value) ? "?, " : "?";
			
			$bind [] = "$value";
		}

		$sql = "INSERT INTO `$this->table` ($campos) values($values)";

		$stmt = $this->db->prepare($sql);
		foreach($bind as $b){
			$i++;
			$stmt->bindValue($i, $b);
		}
		$r = $stmt->execute();
		if(!$r){
			echo "<pre>";
				print_r($stmt->errorInfo());
			echo "</pre>";
		} else {
			//return $this->db->lastInsertID();
		}
		
		
	}

	/*
		No array primeiro passa o campo e depos o valor.
		$a = array('name'=>'AndreySAVE', 'email'=>'andreysmattosSAVE@hotmail.com');
	*/
	public function update(int $id, array $array){
		//$sql = "UPDATE TO clients set name = andrey, email = andrey@andrey where id = ?";
		$id = filter_var($id, FILTER_VALIDATE_INT);
		if($id <= 0){
			return false;
		}
		$muda = '';
		foreach($array as $key=>$value){
			$muda .= (end($array) != $value) ? "`".$key."`" . " = ?" .", " : "`".$key."`" . " = ?" ;
			$bind [] = $value;
		}



		$sql = "UPDATE `$this->table` SET $muda WHERE id = ?";


		$stmt = $this->db->prepare($sql);
		$i = 0;
		foreach($bind as $value){
			$i++;
			$stmt->bindValue($i, $value);
		}
		$stmt->bindValue($i+1, $id);

		$r = $stmt->execute();

		if(!$r){
			echo "<pre>";
				print_r($stmt->errorInfo());
			echo "</pre>";
		} else {
			//return $this->db->lastInsertID();
		}
	}
}