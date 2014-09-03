<?php

class Servicio{

	private $nombre;

	public function getNombre(){
		return this->nombre;
	}

	public function setNombre($nombre){
		this->nombre = $nombre;
	}


	private $descripcion;

	public function getDescripcion(){
		return this->descripcion;
	}

	public function setDescripcion($descripcion){
		this->descripcion = $descripcion;
	}


	private $nroGavet;

	public function getNroGavet(){
		return this->nroGavet;
	}

	public function setDescripcion($nroGavet){
		this->nroGavet = $nroGavet;
	}

}

?>