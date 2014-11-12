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

	private $externo;

	public function getExterno(){
		return $this->externo;
	}

	public function setExterno($externo){
		$this->externo = $externo;

	}

	private $itemsConsulta;

	public function getItemsConsulta(){
		return $this->itemsConsulta;
	}

	public function setItemsConsulta($itemsConsulta){
		$this->itemsConsulta = $itemsConsulta;

	}

	public function __construct($array = null){
		if($array){
			if($array['id']){
				$this->setId($array['id']);
			}
			$this->setFecha($array['fecha']);
			$aux = ($array['pesoMascota'])? $array['pesoMascota'] : 0;
			$this->setPesoMascota($aux);
			$this->setIdMascota($array['id_mascota']);
			$this->setIdVeterinario($_SESSION['veterinario']['id']);
			$this->setExterno( ($array['externo'] == ('on' || 1))? 1 : 0 );
			$aux = array();
			for ($i=0; $i<count($array['servicios']); $i++){ 
				$aux[$i]['id_servicio'] = $array['servicios'][$i];
				$aux[$i]['observacion'] = $array['observaciones'][$i];
				$aux[$i]['precioSugerido'] = $array['preciosSugeridos'][$i];
			}
			$this->setItemsConsulta($aux);
		}
	}

}

?>