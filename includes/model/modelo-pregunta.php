<?php
session_start();
if (isset($_POST["status"]) && $_SESSION["usuario"] == $_POST["us"] && $_POST["status"] === "pre" || $_POST["status"] === "empty") {
    include "../function/conexion.php";
    include "../function/funciones.php";
    $usuario = $_POST["us"];
    $pregunta = $_POST["val"];
    $value = valorPregunta($_POST["status"]);
    $accion = $_POST["status"];
    
    try {
        $stmt = $con->prepare("SELECT valor FROM `respuesta-preguntas` WHERE id_usuario = ? AND id_pregunta = ?");
        $stmt->bind_param("ii",$usuario,$pregunta);
        $stmt->execute();
        $stmt->bind_result($valor);
        $stmt->fetch();
        if ($valor === null) {
            $stmt->prepare("INSERT INTO `respuesta-preguntas`(id_usuario,id_pregunta,id_seccion,valor) VALUES(?,?,?,?)");
            $stmt->bind_param("iiii",$usuario,$pregunta,$_SESSION['seccion'],$value);
            $stmt->execute();
            if ($value === 10) {
                $res = array(
                    "act" => "show",
                    "estado" => "success",
                    "value" => $pregunta
                );
            }else{
                $res = array(
                    "act" => "hidden",
                    "estado" => "success",
                    "value" => $pregunta
                );
            }
        }else {
            
            $stmt->prepare("UPDATE `respuesta-preguntas` SET valor = ? WHERE  id_usuario = ? AND id_pregunta = ?");
            $stmt->bind_param("iii",$value,$usuario,$pregunta);
            $stmt->execute();
            $estado =$stmt->affected_rows;
            if($estado && $accion === "empty"){
                $reset = 0;
                $stmt->prepare("UPDATE `respuesta-sub` SET valor = ?, posicion=? WHERE  id_usuario = ? AND id_pregunta = ?");
                $stmt->bind_param("iiii",$reset,$reset,$usuario,$pregunta);
                if ($stmt->execute()) {    
                    if($stmt->affected_rows){
                        $res = array(
                            "act" => "hidden",
                            "estado" => "success",
                            "value" => $pregunta
                        );
                    }else if(!$stmt->affected_rows){
                        $res = array(
                            "act" => "hidden",
                            "estado" => "success",
                            "value" => $pregunta
                        );
                    }
                }else {
                    $res = array(
                        "act" => "error",
                        "estado" => "error"
                    );
                }

            }elseif ($estado && $accion === "pre") {
                $res = array(
                    "act" => "show",
                    "estado" => "success",
                    "value" => $pregunta
                );
            }
        }

        $stmt->close();
        $con->close();



    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    
    
    
    die(json_encode($res));
}


if (isset($_POST["question"]) && is_numeric($_POST["question"]) && $_SESSION["usuario"] == $_POST["question"]) {
     include "../function/conexion.php";
     $usuario = $_POST["question"];
     $sub = $_POST["sub"];
     $posicion = $_POST["pos"];
     $pregunta = $_POST["pre"];
     $value = ($_POST["pos"] * 2);

    try {
        $stmt = $con->prepare("SELECT valor FROM `respuesta-sub` WHERE id_usuario = ? AND id_subpregunta = ?");        
        $stmt->bind_param("ii",$usuario,$sub);
        $stmt->execute();
        $stmt->bind_result($valor);
        $stmt->fetch();
        if ($valor === null) {
            $stmt->prepare("INSERT INTO `respuesta-sub`(id_usuario,id_pregunta,id_subpregunta,id_seccion,valor,posicion) VALUES(?,?,?,?,?,?)");
            $stmt->bind_param("iiiiii",$usuario,$pregunta,$sub,$_SESSION["seccion"],$value,$posicion);
            if($stmt->execute()){
                $res = array(
                    "act" => "show",
                    "estado" => "success",
                    "value" => $pregunta
                );
            }else {
                $res = array(
                    "estado" => "Error",
                    "act" => $value
                );
            }
        }else {
            $stmt->prepare("UPDATE `respuesta-sub` SET valor = ?, posicion = ? WHERE  id_usuario = ? AND id_subpregunta = ?");
            $stmt->bind_param("iiii",$value,$posicion,$usuario,$sub);
            $stmt->execute();
            if($stmt->affected_rows){
                $res = array(
                    "act" => "show",
                    "estado" => "success",
                    "value" => $pregunta
                );

            }else {
                $res = array(
                    "estado" => "error",
                    "act" => "error"
                );
            }

        }
        $stmt->close();
        $con->close();
    } catch (Exception $e) {
        $res = array(
            'respuesta' => $e->getMessage()

        );
    }

    die(json_encode($res));
}

if (isset($_POST["end"]) && $_POST["end"] === "end") {
    include "../function/conexion.php";
    include "../function/funciones.php";
    try {
        $stmt = $con->prepare("SELECT (SELECT COUNT(id_pregunta) FROM preguntas WHERE id_seccion=seccion.id_seccion )AS total FROM seccion WHERE id_seccion=?");        
        $stmt->bind_param("i",$_SESSION["seccion"]);
        $stmt->execute();
        $stmt->bind_result($total);
        $stmt->fetch();
        if ($total) {
            $preguntas = btnPreguntas($_SESSION["seccion"],$_SESSION["usuario"]);    
            if ($preguntas) {
                $i = 0;
                foreach ($preguntas as $rows) {
                  if ($rows["visible"]) {
                    if ($rows["valor"] == 10) {
                      ($rows["resuelto"] == $rows["minimo"]) ? $i++ : "";
                    }else{
                      ($rows["completo"]) ? $i++ : "";
                    }
                  }else {
                    ($rows["resuelto"] == $rows["minimo"]) ? $i++ : "";
                  }
                }

                if ($i == $total) {
                    $stmt->prepare("SELECT completo FROM `estado-seccion` WHERE id_usuario=? AND id_seccion=?");        
                    $stmt->bind_param("ii",$_SESSION["usuario"],$_SESSION["seccion"]);
                    $stmt->execute();
                    $stmt->bind_result($completo);
                    $stmt->fetch();
                    if ($completo == "") {
                        $concluido = 1;
                        $stmt->prepare("INSERT INTO `estado-seccion`(id_usuario,id_seccion,completo) VALUES(?,?,?)");
                        $stmt->bind_param("iii",$_SESSION["usuario"],$_SESSION["seccion"],$concluido);
                        $stmt->execute();
                        if($stmt->affected_rows){
                            $res = array(
                                "type" => "success",
                                "title"=>"FINALIZADO CORRECTAMENTE",
                                "text" =>"HA CONCLUIDO LA ENCUESTA CORRECTAMENTE",
                                "href"=>"Encuesta1.php"
                            );
                        }else {
                            $res = array(
                                "type" => "error",
                                "title"=>"Internal Error",
                                "text" =>"Internal Error 405"
                            );
                        }
                    }else {
                        $res = array(
                            "type" => "success",
                            "title"=>"FINALIZADO CORRECTAMENTE",
                            "text" =>"LA ENCUESTA YA HA SIDO FINALIZADA",
                            "href"=>"Encuesta1.php"
                        );
                    }
                    
                    
                }else {
                    $res = array(
                        "type" => "error",
                        "title"=>"ENCUESTA INCOMPLETA",
                        "text" =>"AUN QUEDAN PREGUNTAS POR RESPONDER"
                    );
                }
              } else {
                $res = array(
                    "type" => "error"
                );
              }
        }else {
            $res = array(
                "type" => "error"
            );
        }
        $stmt->close();
        $con->close();

    } catch (Exception $e) {
        $res = array(
            'respuesta' => $e->getMessage()

        );
    }

    die(json_encode($res));
}







