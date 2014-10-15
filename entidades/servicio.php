<?php

class Servicio{

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


	private $descripcion;

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}


	private $nroGavet;

	public function getNroGavet(){
		return $this->nroGavet;
	}

	public function setNroGavet($nroGavet){
		$this->nroGavet = $nroGavet;
	}


	public function __construct($array = null){
        if($array){
        	if($array['id']){
        		$this->setId($array['id']);
        	}
        $this->setNombre($array['nombre']);
        $this->setDescripcion($array['descripcion']);
        $this->setNroGavet($array['nroGAVET']);
        }
    }

}

?>