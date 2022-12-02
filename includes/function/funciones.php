<?php

function btnPreguntas($id = null, $usuario = null)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT id_pregunta, numero_pregunta,
    (SELECT IF(ISNULL(valor),0,1) FROM `respuesta-preguntas` WHERE id_pregunta=preguntas.id_pregunta AND id_usuario = {$usuario} )AS completo,
    (SELECT COUNT(valor) FROM `respuesta-sub` WHERE id_pregunta=preguntas.id_pregunta AND id_usuario = {$usuario} AND valor > 0)AS resuelto, 
    (SELECT COUNT(id_subpregunta) FROM `subpreguntas` WHERE id_pregunta=preguntas.id_pregunta )AS minimo, 
    (SELECT valor FROM `respuesta-preguntas` WHERE id_pregunta=preguntas.id_pregunta AND id_usuario = {$usuario})AS valor,
    visible FROM preguntas WHERE id_seccion={$id}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}


function numPreguntas($id = null)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT id_pregunta, numero_pregunta,visible FROM preguntas WHERE id_seccion={$id}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function obtPreguntas($id = null, $usuario = null)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT numero_pregunta,pregunta,bloque,visible,(SELECT valor FROM `respuesta-preguntas` WHERE id_usuario= {$usuario} AND id_pregunta=preguntas.id_pregunta)AS valor FROM preguntas WHERE id_pregunta = {$id}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}


function subPreguntas($id = null, $usuario = null)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT id_subpregunta,numero_subpregunta,subpregunta, (SELECT posicion FROM `respuesta-sub` WHERE id_subpregunta = subpreguntas.id_subpregunta AND id_usuario = {$usuario})AS posicion FROM subpreguntas WHERE id_pregunta ={$id}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}


function valorPregunta($status)
{
    if ($status === "pre") {
        return 10;
    } else {
        return 0;
    }
}

function activarPregunta($opcion)
{
    if ($opcion == 10) {
        return $arreglotem = array(
            "option1" => array("active show", "true"),
            "option2" => array("", "false")
        );
    } elseif ($opcion == 0 && $opcion != "") {
        return $arreglotem = array(
            "option1" => array("", "false"),
            "option2" => array("active show", "true")
        );

    } else {
        return $arreglotem = array(
            "option1" => array("", "false", ""),
            "option2" => array("", "false", "")
        );
    }
}

function obtSeccion($IdMin, $IdMax)
{
    include 'conexion.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }try {
        return $con->query("SELECT id_seccion, nombre, imagen,(SELECT completo FROM `estado-seccion` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion=seccion.id_seccion)AS completo FROM seccion WHERE id_seccion >= {$IdMin} AND id_seccion <= {$IdMax}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function NuevaObtSeccion($Ids)
{
    include 'conexion.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }try {
        return $con->query("SELECT id_seccion, nombre, imagen,(SELECT completo FROM `estado-seccion` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion=seccion.id_seccion)AS completo FROM seccion WHERE id_seccion == {$Ids}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function obtSeccionExport($usuario)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT id_seccion, nombre, (SELECT completo FROM `estado-seccion` WHERE id_usuario = {$usuario} AND id_seccion=seccion.id_seccion)AS completo FROM seccion");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function scoreSeccion($id)
{
    include 'conexion.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    try {
        return $con->query("SELECT (IFNULL((SELECT SUM(valor) FROM `respuesta-preguntas` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion = seccion.id_seccion),0)+(SELECT SUM(valor) FROM `respuesta-sub` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion = seccion.id_seccion))AS total, valor  FROM `seccion` WHERE id_seccion = {$id}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function romano($numero)
{

    $romano = array(
        "1" => 'I',
        "2" => 'II',
        "3" => 'III',
        "4" => 'IV',
        "5" => 'V',
    );
    return $romano[$numero];
}


function mosSeccion($id)
{
    include 'conexion.php';
    $nombre = filter_var($id, FILTER_SANITIZE_STRING);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    try {
        return $con->query("SELECT id_seccion, nombre, (SELECT COUNT(id_pregunta) FROM preguntas WHERE id_seccion=seccion.id_seccion )AS total, (SELECT completo FROM `estado-seccion` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion=seccion.id_seccion)AS completo  FROM seccion WHERE nombre='$nombre'");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}


function valSeccion($name)
{
    include 'conexion.php';

    $stmt = $con->prepare("SELECT id_seccion FROM seccion WHERE nombre=?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $stmt->bind_result($id_seccion);
    $stmt->fetch();
    if ($id_seccion) {
        return $id_seccion;
    } else {
        return $id_seccion;
    }
    $stmt->close();
    $con->close();
}

//resultado usuarios 

function resultado()
{
    include 'conexion.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    try {
        return $con->query("SELECT (IFNULL((SELECT SUM(valor) FROM `respuesta-preguntas` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion = seccion.id_seccion),0)+(SELECT SUM(valor) FROM `respuesta-sub` WHERE id_usuario = {$_SESSION["usuario"]} AND id_seccion = seccion.id_seccion))AS total, valor  FROM `seccion` WHERE id_seccion = {$id}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

// fin- resultado usuarios 


//usuarios registrados
function usuariosDB($offset, $per_page)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT U.id_usuario,U.nombre, U.apellidos, D.genero, D.cargo,D.grado_estudios, D.lada, D.telefono, U.correo, E.correo_empresa, E.nombre_empresa, E.tipo_empresa, E.antiguedad, E.num_colaboradores, E.lada_empresa, E.telefono_empresa, E.pais, E.estado, E.ciudad, E.codigo_postal, E.direccion FROM usuario U INNER JOIN empresa E ON U.id_usuario = E.id_usuario INNER JOIN directivo D ON D.id_usuario = U.id_usuario WHERE U.tipo = 1 ORDER BY U.id_usuario DESC LIMIT {$offset},{$per_page}")->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function totalUser()
{
    include 'conexion.php';
    try {
        return $con->query('SELECT COUNT(id_usuario)AS total FROM usuario WHERE tipo = 1');
    } catch (\Throwable $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function deleteUser($id){
    include 'conexion.php';
    try{
        return $con->query("DELETE FROM usuario WHERE id_usuario = $id ");
    }catch (Exception $e){
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function scoreExport($id, $user)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT (IFNULL((SELECT SUM(valor) FROM `respuesta-preguntas` WHERE id_usuario = {$user} AND id_seccion = seccion.id_seccion),0)+(SELECT SUM(valor) FROM `respuesta-sub` WHERE id_usuario = {$user} AND id_seccion = seccion.id_seccion))AS total FROM `seccion` WHERE id_seccion = {$id}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function getPreguntas($seccion)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT id_pregunta FROM `preguntas` WHERE id_seccion = {$seccion}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function bloqueScore($usuario, $pregunta)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT SUM(valor)AS valor,
    (SELECT  IFNULL((valor),0) FROM `respuesta-preguntas` WHERE id_usuario = {$usuario} AND id_pregunta = {$pregunta}) AS pregunta
    FROM `respuesta-sub` WHERE  id_usuario = {$usuario} AND id_pregunta = {$pregunta}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function subScore($usuario, $pregunta)
{
    include 'conexion.php';
    try {
        return $con->query("SELECT SUM(valor)AS valor,
    (SELECT  IFNULL((valor),0) FROM `respuesta-subpreguntas` WHERE id_usuario = {$usuario} AND id_pregunta = {$pregunta}) AS pregunta
    FROM `respuesta-sub` WHERE  id_usuario = {$usuario} AND id_pregunta = {$pregunta}");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function onlySection()
{
    include 'conexion.php';
    try {
        return $con->query("SELECT * FROM seccion ORDER BY id_seccion ASC");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

function exportCSV($tables, $campos, $search)
{
    include 'conexion.php';
    $sWhere = "U.tipo = 1";

    if ($search["giro"] != "") {
        $sWhere .= " AND E.tipo_empresa  ='" . $search["giro"] . "'";
    }

    if ($search['antiguedad'] != "") {
        $sWhere .= " AND E.antiguedad = '" . $search['antiguedad'] . "'";
    }

    if ($search['colaboradores'] != "") {
        $sWhere .= " AND E.num_colaboradores = '" . $search['colaboradores'] . "'";
    }

    if ($search['pais'] != "") {
        $sWhere .= " AND E.pais = '" . $search['pais'] . "'";
    }

    if ($search['estado'] != "") {
        $sWhere .= " AND E.estado = '" . $search['estado'] . "'";
    }

    if ($search['ciudad'] != "") {
        $sWhere .= " AND E.ciudad = '" . $search['ciudad'] . "'";
    }

    $sWhere .= " ORDER BY U.id_usuario DESC";
    $sql = "SELECT $campos FROM  $tables WHERE $sWhere";
    return $con->query($sql);
}
