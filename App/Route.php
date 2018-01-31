<?php

namespace App;

use SON\init\Bootstrap;

class Route extends Bootstrap{

	//Metodos
	public function initRoutes(){
		$routes['home'] = array('route'=>'/', 'controller'=>'indexController','action'=>'index');
		$routes['contact'] = array('route'=>'/contact', 'controller'=>'indexController','action'=>'contact');
		$this->setRoutes($routes);
	}

	
}