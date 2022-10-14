<?php
    require_once "lib/nusoap.php";
    //Enlace con el servidor
    $cliente = new nusoap_client("http://localhost:5050/practica4JEPM/server.php");
    //En caso de error
    $error=$cliente->getError();
    if($error){
        echo "<h2>Constuctor error</h2><pre>".$error."</pre>";
    }
    //Para recibir los datos del servidor
    $result=$cliente->call("getMarcasAutos", array("datos"=>"marcasAutos"));
    //Para detectar si hay algun error o falla
    if($cliente->fault){
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else{//si la llamada al metodo salio bien
        $error=$cliente->getError();
        //se vuelve a filtrar en caso de error
        if($error){
            echo "<h2>Error</h2><pre>".$error."</pre>";
        }
        else{//y finalmente si no hubo error, se imprimen los datos en pantalla
            print( "<h2>Top 7 Marcas de Auto:</h2><pre>".print_r( $result, true)."</pre>");
        }
        
    }
?>