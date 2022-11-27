<?php
    //validar xml
    $dept = new DOMDocument();
    $dept -> load("empleados.xml");
    $respuesta = $dept -> schemaValidate("departamento.xsd");
    echo ($respuesta) ? "documento valido" : "Documento INVALIDO";

    //extrerinformacion del xml
    $datos = simplexml_load_file("empleados.xml");
    $edades = $datos->xpath("//edad");
    foreach($edades as $edad){
        echo "<br>Edad: ". $edad;
    }

    //cargar el xml
    $datos =simplexml_load_file("empleados.xml");
    if ($datos == false) {
        echo "<br> no se puede mostrar el fichero.";
        exit();
    }

    //var_dump($datos);
    echo "<br> Recorro el fichero: ";
    foreach($datos as $dato){
        print_r($dato);
    }

