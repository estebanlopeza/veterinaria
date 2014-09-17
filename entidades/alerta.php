<?php

class Alerta{

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

}

?>