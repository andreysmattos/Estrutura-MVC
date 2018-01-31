<?php

namespace SON\init;

abstract class Bootstrap {
	//Atributos
	private $route;

	//Metodos
	public function __construct(){
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	abstract public function initRoutes();

	public function setRoutes(array $route){
		$this->route = $route;
	}


	public function run($url){
		array_walk($this->route, function ($route) use ($url){
			if($url == $route['route']){
				$class = "App\\Controllers\\".ucfirst($route["controller"]);			
				$controller = new $class;
				$action = $route['action'];
				$controller->$action();

			}



		});
	}


	public function getUrl(){
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}

?>