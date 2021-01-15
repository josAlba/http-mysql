<?php

namespace httpMysql;

class tunel{

    private $mysql;

    public function __construct(){
        
        //Conexion con mysql.
		$this->mysql = new connect\mysqlT(
            secrets::$mysql['host'],
            secrets::$mysql['user'],
            secrets::$mysql['passwd'],
            secrets::$mysql['db'],
            secrets::$mysql['port']
        );
        
    }
    

    public function recv(){

        //Directorio + prefijo.
        $prefix = secrets::$server['dir'].'/v1/';
        //Cargamos los elementos del post.
        $post   = $_POST;
        //Cargamos la url.
        $url    = $_SERVER['REQUEST_URI']; 

        //Validamos el comando.
        $q = $this->validateQuery($post);
        if($q != ''){

            //Comprobacion de las urls.
            if( $url == $prefix.'query' ){

                return $this->mysql->_db_consulta($q);
            
            }else if( $url == $prefix.'insert' ){

                $this->mysql->_db_consulta($q);
                //Devolvemos el id.
                return $this->mysql->_ultimo_id();
                
            }
        }

        return array();

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