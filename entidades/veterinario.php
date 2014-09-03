<?php

class Veterinario{

	private $matricula;

	public function getMatricula(){
		return this->matricula;
	}

	public function setMatricula($matricula){
		this->matricula = $matricula;
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


	private $usuario;

	public function getUsuario(){
		return this->usuario;
	}

	public function setUsuario($usuario){
		this->usuario = $usuario;
	}


	private $password;

	public function getPassword(){
		return this->password;
	}

	public function setPassword($password){
		this->password = $password;
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