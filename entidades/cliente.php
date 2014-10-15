<?php

class Cliente{

	private $id;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	private $tipoDoc;

	public function getTipoDoc(){
		return $this->tipoDoc;
	}

	public function setTipoDoc($tipoDoc){
		$this->tipoDoc = $tipoDoc;
	}

	
	private $nroDoc;

	public function getNroDoc(){
		return $this->nroDoc;
	}

	public function setNroDoc($nroDoc){
		$this->nroDoc = $nroDoc;
	}

	
	private $apellido;

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}


	private $nombre;

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}


	private $direccion;

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}


	private $telefono;

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}


	private $email;

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id']){
        		$this->setId($array['id']);
        	}
        
        $this->setTipoDoc($array['tipoDoc']);
        $this->setNroDoc($array['nroDoc']);
        $this->setApellido($array['apellido']);
        $this->setNombre($array['nombre']);
        $this->setDireccion($array['direccion']);
        $this->setTelefono($array['telefono']);
        $this->setEmail($array['email']);
    	}	
    }

}

?>
