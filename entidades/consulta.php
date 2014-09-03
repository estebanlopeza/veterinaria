<?php

class Consulta{

	private $fecha;

	public function getFecha(){
		return this->fecha;
	}

	public function setFecha($fecha){
		this->fecha = $fecha;
	}

	
	private $pesoMascota;

	public function getPesoMascota(){
		return this->pesoMascota;
	}

	public function setPesoMascota($pesoMascota){
		this->pesoMascota = $pesoMascota;
	}

}

?>