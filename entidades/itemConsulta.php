<?php

class ItemConsulta{

	private $id;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	private $id_consulta;

	public function getIdConsulta(){
		return $this->id_consulta;
	}

	public function setIdConsulta($id_consulta){
		$this->id_consulta = $id_consulta;
	}

	private $id_servicio;

	public function getIServicio(){
		return $this->id_servicio;
	}

	public function setIdServicio($id_servicio){
		$this->id_servicio = $id_servicio;
	}

	public function setIdServicio($id_servicio){
		$this->id_servicio = $id_servicio;
	}

	private $observacion;

	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}

    public function __construct($array = null){
        if($array){
        	if($array['id']){
        		$this->setId($array['id']);
        	}        	       
        $this->setIdConsulta($array['id_consulta']);
        $this->setIdServicio($array['id_servicio']);
        $this->setObservacion($array['observacion']);

    	}	
    }	

}

?>