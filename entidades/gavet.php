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
        if ($array['id']) {
        	$this->setId($array['id']);
        }
        if ($array['fechaDesde']){
        	$this->setFechaDesde($array['fechaDesde']);
        }
        else{
        	$this->setFechaDesde(date('Y-m-d')); 
        }
        if ($array['precioGAVET']) {
        	$this->setPrecioGavet($array['precioGAVET']);	
        }
        else{
        	$this->setPrecioGavet($array['precioGavet']);
        }	
    }
}

?>