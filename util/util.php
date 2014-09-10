<?php

class Util{
    
    static function dbToDate($db){
        return implode('/',array_reverse(explode('-',$db)));
    }

    static function dateToDb($date){
        return implode('-',array_reverse(explode('/',$date)));
    }
}

?>