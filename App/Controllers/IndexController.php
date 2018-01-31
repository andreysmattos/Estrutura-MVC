<?php

namespace App\Controllers;

use App\Conn;
use App\Models\Client;
use SON\Controller\Action;

class IndexController extends Action {

	//Metodos

	public function index(){

		
		$client = new Client(Conn::getDb());
		
		


		$this->view->client = $client->list();


		//Esse index passado no render(), é o nome do arquivo na pasta Views/index
		$this->render('index');

	}

	public function contact(){

		$this->view->carros = ['Uno', 'Gol', 'Corolla'];
		$this->render('contact');
	}

	

}