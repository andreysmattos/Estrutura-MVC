<?php

namespace App\Controllers;


use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action {

	//Metodos

	public function index(){

		
		$client = Container::getModel('client');
		
		


		$this->view->client = $client->list();


		//Esse index passado no render(), é o nome do arquivo na pasta Views/index
		$this->render('index');

	}

	public function contact(){

		$this->view->carros = ['Uno', 'Gol', 'Corolla'];
		$this->render('contact');
	}

	

}