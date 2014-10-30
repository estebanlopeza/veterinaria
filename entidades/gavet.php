<?php

class Gavet{

	private $id;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

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

    public function __construct($array = null){
        $this->setId($array['id']);     	       
        $this->setFechaDesde($array['fechaDesde']);
        $this->setPrecioGavet($array['precioGAVET']);	
    }
}

?>