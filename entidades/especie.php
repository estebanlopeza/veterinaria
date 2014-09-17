<?php

class Especie{

	private $id;

	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}

	private $nombre;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function __construct($array){
		$this->setId($array['id']);
	    $this->setNombre($array['nombre']);
    }

}

?>