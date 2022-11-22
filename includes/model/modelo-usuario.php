<?php
$accion = $_POST['action'];
$usuario = $_POST['username'];
$password = $_POST['password'];
define('MESAGE',"Error Interno");

if ($accion === 'login' && $usuario != '' && $password != '') {
    include '../function/conexion.php';
    try {
        //Realizar query
        $stmt = $con->prepare("SELECT id_usuario,nombre,correo,contrasena,tipo FROM usuario WHERE correo=?");
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        //logear el usuario
        $stmt->bind_result($id_user, $name, $user, $passUSer, $tipo);
        $stmt->fetch();
        if ($user) {
            if (password_verify($password, $passUSer)) {
                if ($tipo === 1) {
                    session_start();
                    if (isset($_SESSION['invited'])) {
                        $_SESSION['invited'] = null;
                    }
                    $_SESSION['usuario'] = $id_user;
                    $_SESSION['nombre'] = $name;
                    $respuesta = array(
                        'type' => 'success',
                        'title' => 'INICIANDO SESIÓN',
                        'href'=>'MenuEncuestas.php'
                    );
                }else if($tipo === 2){
                    session_start();
                    $_SESSION['admin'] = $id_user;
                    $_SESSION['nombre'] = $name;
                    $respuesta = array(
                        'type' => 'success',
                        'title' => 'INICIANDO SESIÓN',
                        'href'=>'AdminInicio.php'
                    );
                }
            } else {
                $respuesta = array(
                    'type' => 'error',
                    'title' => 'INCORRECTO',
                    'text' => 'USUARIO O CONTRASEÑA INCORRECTA'
                );
            }
        } else {
            $respuesta = array(
                'type' => 'error',
                'title' => 'INCORRECTO',
                'text' => 'USUARIO O CONTRASEÑA INCORRECTA'
            );
        }

        $stmt->close();
        $con->close();
    } catch (Exception $e) {
        $respuesta = array(
            'pass' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}elseif ($accion === 'invitado') {
    session_start();
    $_SESSION['invited'] = 'restringido';
    $_SESSION['nombre'] = "invitado";
    $respuesta = array(
        'type' => 'success',
        'title' => 'INICIANDO COMO INVITADO',
        'href'=>'MenuEncuestas.php'
    );
    die(json_encode($respuesta));
}

if ($accion == 'crear') {
    if (isset($_POST['correo']) && $_POST['correo'] != "" && isset($_POST['nombre_empresa']) && $_POST['nombre_empresa'] != "" && isset($_POST['term_con']) && $_POST['term_con'] != "" && isset($_POST['contrasena']) && $_POST['contrasena'] != "" && isset($_POST['verificacion']) && $_POST['verificacion'] != "") {
        if (!empty($_POST['fecha_fundacion']) && $_POST['fecha_fundacion'] != "" && !empty($_POST['tamano_empresa']) && $_POST['tamano_empresa'] != "" && !empty($_POST['tipo_empresa']) && $_POST['tipo_empresa'] != "" && !empty($_POST['pais']) && $_POST['pais'] != "" && !empty($_POST['estado']) && $_POST['estado'] != "" && !empty($_POST['ciudad']) && $_POST['ciudad'] != "" && !empty($_POST['grado_estudios']) && $_POST['grado_estudios'] != "") {

            //opcional
            (isset($_POST["nombre"]) && $_POST["nombre"] != '') ? $nombre = $_POST["nombre"] : $nombre = "";
            (isset($_POST["apellidos"]) && $_POST["apellidos"] != '') ? $apellidos = $_POST["apellidos"] : $apellidos = "";
            (isset($_POST["cargo"]) && $_POST["cargo"] != '') ? $cargo = $_POST["cargo"] : $cargo = "";
            (isset($_POST["lada"]) && is_numeric($_POST["lada"])) ? $lada = $_POST["lada"] : $lada = "";
            (isset($_POST["lada_empresa"]) && is_numeric($_POST["lada_empresa"])) ? $lada_e = $_POST["lada_empresa"] : $lada_e = "";
            (isset($_POST["telefono_empresa"]) && is_numeric($_POST["telefono_empresa"])) ? $tel_e = $_POST["telefono_empresa"] : $tel_e = "";
            (isset($_POST["telefono"]) && is_numeric($_POST["telefono"])) ? $telefono = $_POST["telefono"] : $telefono = "";
            (isset($_POST["correo_empresa"]) && $_POST["correo_empresa"] != '') ? $correo_e = $_POST["correo_empresa"] : $correo_e = "";
            (isset($_POST["direccion"]) && $_POST["direccion"] != '') ? $direccion = $_POST["direccion"] : $direccion = "";
            (isset($_POST["codigo_postal"]) && is_numeric($_POST["codigo_postal"])) ? $cod_pos = $_POST["codigo_postal"] : $cod_pos = "";
            (isset($_POST["genero"]) && $_POST["genero"] != '') ? $genero = $_POST["genero"] : $genero = "";

            //obligatorio
            $nombre_e = $_POST["nombre_empresa"];
            $fecha = $_POST["fecha_fundacion"];
            $tamano_e = $_POST["tamano_empresa"];
            $estudio = $_POST["grado_estudios"];
            $tipo_e = $_POST["tipo_empresa"];
            $pais = $_POST["pais"];
            $estado = $_POST["estado"];
            $ciudad = $_POST["ciudad"];
            $correo = $_POST["correo"];
            $contrasena = $_POST["contrasena"];
            $verificacion = $_POST["verificacion"];
            $term_con = $_POST["term_con"];

            try {
                include "../function/conexion.php";
                $stmt = $con->prepare("SELECT correo FROM usuario WHERE correo = ? ");
                $stmt->bind_param("s", $correo);
                $stmt->execute();
                $stmt->bind_result($correoVerify);
                $stmt->fetch();
                if ($correoVerify == "") {
                    if (strlen($contrasena) > 7) {
                        if ($contrasena === $verificacion) {
                            $opciones = array(
                                'cost' => 12
                            );
                            $hash_pass = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);

                            $stmt->prepare("INSERT INTO usuario (nombre, apellidos, correo, contrasena, term_con) VALUES (?,?,?,?,?)");
                            $stmt->bind_param('ssssi', $nombre, $apellidos, $correo, $hash_pass, $term_con);
                            $stmt->execute();
                            $id_user = $stmt->insert_id;

                            if ($stmt->affected_rows > 0) {
                                $stmt->prepare("INSERT INTO directivo(id_usuario, grado_estudios, cargo, lada, telefono,genero) VALUES (?,?,?,?,?,?)");
                                $stmt->bind_param('isssss', $id_user, $estudio, $cargo, $lada, $telefono, $genero);
                                $stmt->execute();
                                if ($stmt->affected_rows > 0) {
                                    $stmt->prepare("INSERT INTO empresa(nombre_empresa, tipo_empresa, antiguedad, num_colaboradores, lada_empresa, telefono_empresa, pais, estado, ciudad, direccion, codigo_postal, correo_empresa,id_usuario) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                    $stmt->bind_param('ssssssssssisi', $nombre_e, $tipo_e, $fecha, $tamano_e,  $lada_e, $tel_e, $pais, $estado, $ciudad, $direccion, $cod_pos, $correo_e, $id_user);
                                    $stmt->execute();
                                    if ($stmt->affected_rows > 0) {
                                        session_start();
                                        $_SESSION["usuario"] = $id_user;
                                        $_SESSION["nombre"] = $nombre;
                                        $res = array(
                                            "type" => "success",
                                            "title" => "REGISTRADO CORRECTAMENTE",
                                            "text" =>"SE HA REGISTRADO CORRECTAMENTE"
                                        );
                                    } else {
                                        $res = array(
                                            "type" => "error",
                                            "title" => "Internal Error 406",
                                            "text"=> MESAGE
                                        );
                                    }
                                } else {
                                    $res = array(
                                        "type" => "error",
                                        "title" => "Internal Error 405",
                                        "text"=> MESAGE
                                    );
                                }
                            } else {
                                $res = array(
                                    "type" => "error",
                                    "title" => "Internal Error 404",
                                    "text"=> MESAGE
                                );
                            }
                        } else {
                            $res = array(
                                "type" => "error",
                                "title" => "lAS CONTRASEÑAS NO COINCIDEN",
                                "text"=> MESAGE
                            );
                        }
                    } else {
                        $res = array(
                            "type" => "error",
                            "title" => "LA CONTRASEÑA ES MUY CORTA",
                            "text"=> MESAGE
                        );
                    }
                } else {
                    $res = array(
                        "type" => "error",
                        "title" => "EL CORREO YA EXISTE",
                        "text"=> MESAGE
                    );
                }
            } catch (Exception $e) {
                echo "¡ERROR!" . $e->getMessage() . "<br>";
                return false;
            }
        } else {
            $res = array(
                "type" => "error",
                "title" => "Internal Error 403",
                "text"=> MESAGE
            );
        }
    } else {
        $res = array(
            "type" => "error",
            "title" => "Internal Error 402",
            "text"=> MESAGE
        );
    }

    die(json_encode($res));
}
