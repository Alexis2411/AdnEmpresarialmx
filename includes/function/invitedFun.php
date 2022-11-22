<?php

function btnPreguntas($id = null){
    include 'conexion.php';
    try{
    return $con->query("SELECT id_pregunta, numero_pregunta, visible FROM preguntas WHERE id_seccion={$id}");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}


function numPreguntas($id = null){
    include 'conexion.php';
    try{
    return $con->query("SELECT id_pregunta, numero_pregunta,visible FROM preguntas WHERE id_seccion={$id}");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}

function obtPreguntas($id = null){
    include 'conexion.php';
    try{
    return $con->query("SELECT numero_pregunta,pregunta,bloque,visible FROM preguntas WHERE id_pregunta = {$id}");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}


function subPreguntas($id = null,$usuario = null){
    include 'conexion.php';
    try{
    return $con->query("SELECT id_subpregunta,numero_subpregunta,subpregunta FROM subpreguntas WHERE id_pregunta ={$id}");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}



function valorPregunta($status){
    if ($status === "pre") {
        return 10;
    }else {
        return 0;
    }
}

function activarPregunta($opcion){
    if ($opcion == 10) {
        return $arreglotem = array(
            "option1" => array("active show","true"),
            "option2" => array("","false")
          );
      }elseif ($opcion == 0 && $opcion != "") {
        return $arreglotem = array(
            "option1" => array("","false"),
            "option2" => array("active show","true")
          );
        
      }else {
        return $arreglotem = array(
            "option1" => array("","false",""),
            "option2" => array("","false","")
          );
      }
}

function obtSeccion(){
    include 'conexion.php';
    session_start();
    try{
    return $con->query("SELECT id_seccion, nombre, imagen,(SELECT completo FROM `estado-seccion` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion=seccion.id_seccion)AS completo FROM seccion");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}

function obtSeccionInvited(){
    include 'conexion.php';
    session_start();
    try{
    return $con->query("SELECT id_seccion, nombre, imagen FROM seccion");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}

function scoreSeccion($id){
    include 'conexion.php';
    session_start();
    try{
    return $con->query("SELECT ((SELECT SUM(valor) FROM `respuesta-preguntas` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion = seccion.id_seccion)+(SELECT SUM(valor) FROM `respuesta-sub` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion = seccion.id_seccion))AS total, valor  FROM `seccion` WHERE id_seccion = {$id}");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}

function romano($numero){
    
    $romano = array(
        "1" => 'I',
        "2" => 'II',
        "3" => 'III',
        "4" => 'IV',
    );
    return $romano[$numero]; 
}



function mosSeccion($id){
    include 'conexion.php';
    $nombre = filter_var($id, FILTER_SANITIZE_STRING);
    session_start();
    try{
    return $con->query("SELECT id_seccion, nombre, (SELECT COUNT(id_pregunta) FROM preguntas WHERE id_seccion=seccion.id_seccion )AS total  FROM seccion WHERE nombre='$nombre'");
    } catch(Exception $e) {
         echo "Error!!" . $e->getMessage() . "<br>";
         return false;
    }
}


function valSeccion($name){
    include 'conexion.php';
   
        $stmt = $con->prepare("SELECT id_seccion FROM seccion WHERE nombre=?");
        $stmt->bind_param('s',$name);
        $stmt->execute();
        $stmt->bind_result($id_seccion);
        $stmt->fetch();
        if ($id_seccion) {
            return $id_seccion;
        }else{
            return $id_seccion;
        }     
        $stmt->close();
        $con->close();
}