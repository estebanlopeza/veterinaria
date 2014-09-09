<?php

class Mascota{

	private $nombre;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}


	private $fechaNac;

	public function getFechaNac(){
		return $this->fechaNac;
	}

	public function setFechaNac($fechaNac){
		$this->fechaNac = $fechaNac;
	}


	private $sexo;

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}


	private $pelaje;

	public function getPelaje(){
		return $this->pelaje;
	}

	public function setPelaje($pelaje){
		$this->pelaje = $pelaje;
	}

}

?>