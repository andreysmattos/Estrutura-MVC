<?php

namespace App\Controllers;


use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action {

	//Metodos

	public function index(){

		
		$client = Container::getModel('client');
		
		/*
		No array primeiro passa o campo e depos o valor.
		$a = array('name'=>'AndreySAVE', 'email'=>'andreysmattosSAVE@hotmail.com');
		*/
		$a = array('name'=>'TESTANDO2');
		$this->view->client = $client->update(2, $a);
		


		//Esse index passado no render(), é o nome do arquivo na pasta Views/index
		$this->render('index');

	}

	public function contact(){

		$this->view->carros = ['Uno', 'Gol', 'Corolla'];
		$this->render('contact');
	}

	

}