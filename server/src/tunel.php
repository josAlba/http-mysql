<?php

namespace httpMysql\tunnel;

class tunel{

    private $mysql;

    public function __construct(){
        
        //Conexion con mysql.
		$this->mysql = new httpMysql\connection\mysqlT(
            secret::$mysql['host'],
            secret::$mysql['user'],
            secret::$mysql['passwd'],
            secret::$mysql['db'],
            secret::$mysql['port']
        );
        
    }
    

    public function recv(){

        //Directorio + prefijo.
        $prefix = secret::$server['dir'].'/v1/';
        //Cargamos los elementos del post.
        $post   = $_POST;
        //Cargamos la url.
        $url    = $_SERVER['REQUEST_URI'];    

        //Comprobacion de las urls.
        if( $url == $prefix.'query' ){

            $q = $this->validateQuery($post);
            if($q != ''){

                $r = $this->mysql->_db_consulta($q);
                return json_encode($r);
                
            }

        }

    }

    private function validateQuery($post){

        $query='';

        if(isset($post['query'])){

            $limar = urldecode($post['query']);

            $query = $limar;
        }

        return $query;

    }
    
}