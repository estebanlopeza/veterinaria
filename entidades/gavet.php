<?php

class Gavet{

	private $fechaDesde;

	public function getFechaDesde(){
		return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde){
		$this->fechaDesde = $fechaDesde;
	}

	
	private $precioGavet;

	public function getPrecioGavet(){
		return $this->precioGavet;
	}

	public function setPrecioGavet($precioGavet){
		$this->precioGavet = $precioGavet;
	}

}

?>