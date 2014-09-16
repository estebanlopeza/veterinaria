<?php

class Mascota{

	private $id;

	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}


	private $id_cliente;

	public function getIdCliente(){
	return $this->id_cliente;
	}
	
	public function setIdCliente($id_cliente){
	$this->id_cliente = $id_cliente;
	}


	private $id_raza;

	public function getIdRaza(){
	return $this->id_raza;
	}
	
	public function setIdRaza($id_raza){
	$this->id_raza = $id_raza;
	}


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

    public function __construct($array){
    $this->setId($array['id']); 
    $this->setIdCliente($array['id_cliente']);
    $this->setIdRaza($array['id_raza']);
    $this->setNombre($array['nombre']);
    $this->setFechaNac($array['fechaNac']);
    $this->setSexo($array['sexo']);
    $this->setPelaje($array['pelaje']);
    }

}

?>