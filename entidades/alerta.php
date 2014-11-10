<?php

class Alerta{

	private $id;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	private $idMascota;

	public function getIdMascota(){
		return $this->idMascota;
	}

	public function setIdMascota($idMascota){
		$this->idMascota = $idMascota;
	}

	private $fecha;
 
	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	
	private $asunto;

	public function getAsunto(){
		return $this->asunto;
	}

	public function setAsunto($asunto){
		$this->asunto = $asunto;
	}

	
	private $contenido;

	public function getContenido(){
		return $this->contenido;
	}

	public function setContenido($contenido){
		$this->contenido = $contenido;
	}

    public function __construct($array = null){
    	if($array['id']){
    		$this->setId($array['id']);
    	}
        $this->setIdMascota($array['id_mascota']);
        $this->setFecha($array['fecha']);
        $this->setAsunto($array['asunto']);
        $this->setContenido($array['contenido']);	
    }

}

?>