<?php

namespace SON\Controller;

abstract class Action {
	//Atributos
	protected $view;
	private $action;

	//Metodos

	//Construtor
	public function __construct(){
		//Olha que interessante essa classe, ela permite que passamos atributos sem precisar declarar, por exemplo $this->view->QLQNOME = "legal neh?";
		$this->view = new \stdClass();
	}

	public function render($action, $layout = true){
		$this->action = $action;
		if($layout == true && file_exists("../App/Views/layout.phtml")){
			include_once "../App/Views/layout.phtml"; //Lá no layout ele chama o $this->content();
		} else {
			$this->content();
		}
	}

	public function content(){
		
		$current = get_class($this);
		//A variavel abaixo é o nome da classe antes do Controller, por exemplo index.
		//também é o nome da pasta na view
		$singleClassName = strtolower((str_replace("Controller", '', str_replace("App\\Controllers\\", "", $current))));
		include_once "../App/Views/".$singleClassName."/".$this->action.".phtml";

	}

}

?>