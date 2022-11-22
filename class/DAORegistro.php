<?php
require_once ("../includes/conexion.php");
require_once ("EmpresaPjo.php");
require_once ("UsuarioPjo.php");
require_once ("IDAORegistro.php");

class DAORegistro implements IDAORegistro{

    public function selecUsuario(){
        $db = new conexion();
    }

    public function selectUserId($id){
        $db = new conexion();
    }

    public function existEmail($email){
        $db = new conexion();
        $sql = "SELECT correo FROM usuario WHERE correo =".$email;
        return $db->ExecuteSelect($sql);
    }


    public function InsertUser(Usuario $user, Empresa $emp){
        $result = false;
        $db = new conexion();
        $sql="INSERT INTO usuario(nombre,apellido,genero,grado_estudios,cargo,lada,telefono,correo,contrasena,activo) 
        VALUES('".$user->getNombre()."','".$user->getApellido()."','".$user->getGenero()."','".$user->getGrado()."','".$user->getCargo()."','".$user->getLada()."','".$user->getTelefono()."','".$user->getEmail()."','".$user->getPassword()."',1)";
        if($db->Execute($sql)){
            $id = $db->IdInsert();
            $sql = "INSERT INTO empresa(nombre,tipo_empresa,fecha_fundacion,num_empelados,lada,telefono,estado,ciudad,direccion,codigo_postal,id_usuario)
            VALUES('".$emp->getNombre_empresa()."','".$emp->getTipo_empresa()."','".$emp->getFecha_fundacion()."','".$emp->getTamano_empresa()."','".$emp->getLada()."','".$emp->getTelefono_empresa()."','".$emp->getEstado()."', '".$emp->getCiudad()."','".$emp->getDireccion()."','".$emp->getCodigo_postal."','".$id."')";
            $result = $db->Execute($sql);
        }
        $result ? $_SESSION["usuario"] = $id : $_SESSION["usuario"] = '';

        return $result;
    }

    public function UpdateUser(Usuario $user, Empresa $emp){
        $db = new conexion();
    }

    public function DeleteUser($id){
        $db = new conexion();
    }

}




?>