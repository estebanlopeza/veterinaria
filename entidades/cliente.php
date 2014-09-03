<?php

class Cliente{

	private $tipoDoc;

	public function getTipoDoc(){
		return this->tipoDoc;
	}

	public function setTipoDoc($tipoDoc){
		this->tipoDoc = $tipoDoc;
	}

	
	private $nroDoc;

	public function getNroDoc(){
		return this->nroDoc;
	}

	public function setNroDoc($nroDoc){
		this->nroDoc = $nroDoc;
	}

	
	private $apellido;

	public function getApellido(){
		return this->apeliido;
	}

	public function setApellido($apellido){
		this->apeliido = $apellido;
	}


	private $nombre;

	public function getNombre(){
		return this->nombre;
	}

	public function setNombre($nombre){
		this->nombre = $nombre;
	}


	private $direccion;

	public function getDireccion(){
		return this->direccion;
	}

	public function setDireccion($direccion){
		this->direccion = $direccion;
	}


	private $telefono;

	public function getTelefono(){
		return this->telefono;
	}

	public function setTelefono($telefono){
		this->telefono = $telefono;
	}


	private $email;

	public function getEmail(){
		return this->email;
	}

	public function setEmail($email){
		this->email = $email;
	}

}

?>
