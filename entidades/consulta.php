<?php

class Consulta{

	private $fecha;



	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	private $id;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;

	}

	private $id_mascota;

	public function getIdMascota(){
		return $this->id_mascota;
	}

	public function setIdMascota($id_mascota){
		$this->id_mascota = $id_mascota;
	}
	
	private $pesoMascota;

	public function getPesoMascota(){
		return $this->pesoMascota;
	}

	public function setPesoMascota($pesoMascota){
		$this->pesoMascota = $pesoMascota;
	}

	private $id_vetetinario;

	public function getIdVeterinario(){
		return $this->id_veterinario;
	}

	public function setIdVeterinario($id_veterinario){
		$this->id_veterinario = $id_veterinario;

	}

	public function __construct($array = null){
		if($array){
			if($array['id']){
				$this->setId($array['id']);
			}
			$this->setFecha($array['fecha']);
			$this->setPesoMascota($array['pesoMascota']);
			$this->setIdMascota($array['id_mascota']);
			$this->setIdVeterinario($_SESSION['id_veterinario']);
		}
	}

}

?>