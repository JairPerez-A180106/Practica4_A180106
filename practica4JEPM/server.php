<?php
    require_once "lib/nusoap.php";
    function getMarcasAutos($datos){
        if($datos=="marcasAutos"){
            return join(",",array(
                "Tesla",
                "Volkswagen",
                "Toyota",
                "BMW",
                "Hyundai",
                "Audi",
                "Honda"
            ));
        }
        else{
            return "No hay marcas";
        }
    }

    $server = new soap_server();
    $server->register("getMarcasAutos");
    if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA=file_get_contents('php://input');
        $server->service($HTTP_RAW_POST_DATA);
?>