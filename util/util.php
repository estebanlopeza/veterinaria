<?php

class Util{
    
    static function dbToDate($db){
        return implode('/',array_reverse(explode('-',$db)));
    }

    static function dateToDb($date){
        return implode('-',array_reverse(explode('/',$date)));
    }

    static function validar(){
    	    //^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$
    }

    static function setMsj($msj, $tipo = 'info'){
    	$_SESSION['mensaje']['texto'] = $msj;
    	$_SESSION['mensaje']['tipo'] = $tipo;
    }

    static function getMsj(){
    	if($_SESSION['mensaje']){
	    	$return = '<div class="alert alert-'.$_SESSION['mensaje']['tipo'].' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	  '.$_SESSION['mensaje']['texto'].'</div>';
	  		unset($_SESSION['mensaje']);
	  		return $return;
    	}
    }
}

?>