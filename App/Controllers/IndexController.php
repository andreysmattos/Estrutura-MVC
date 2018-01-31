<?php

namespace App\Controllers;

use SON\Controller\Action;

class IndexController extends Action {

	//Metodos

	public function index(){

		$this->view->carros = ['Uno', 'Gol', 'Corolla'];
		//Esse index passado no render(), é o nome do arquivo na pasta Views/index
		$this->render('index');

	}

	public function contact(){

		$this->view->carros = ['Uno', 'Gol', 'Corolla'];
		$this->render('contact');
	}

	

}