<?php

class Raza{

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

	private $idEspecie;

	public function getIdEspecie(){
		return $this->idEspecie;
	}

	public function setIdEspecie($idEspecie){
		$this->idEspecie = $idEspecie;
	}

	public function __construct($array = null){
		if($array){
			if($array['id']){
				$this->setId($array['id']);
			}
	    	$this->setNombre($array['nombre']);
	    	$this->setIdEspecie($array['id_especie']);
    	}
	}	
}

?>