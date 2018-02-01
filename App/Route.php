<?php

namespace App;

use SON\init\Bootstrap;

class Route extends Bootstrap{

	//Metodos
	public function initRoutes(){
		$routes['home'] = array('route'=>'/MVC/public/', 'controller'=>'indexController','action'=>'index');
		$routes['contact'] = array('route'=>'/MVC/public/contact', 'controller'=>'indexController','action'=>'contact');
		$this->setRoutes($routes);
	}

	
}