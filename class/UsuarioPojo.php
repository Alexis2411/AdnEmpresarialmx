<?php
class Usuario {

    private $nombre;
    private $apellido;
    private $cargo;
    private $genero;
    private $lada;
    private $telefono;
    private $grado_estudios;
    private $email;
    private $password;

    public function setNombre($nombre){
        $this->nombre = ucwords(strtolower($nombre));
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getApellidos(){
        return $apellidos;
    }

    public function setCargo($cargo){
        $this->cargo = $cargo;
    }

    public function getCargo(){
        return $cargo;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setLada($lada){
        $this->lada = $lada;
    }

    public function getLada(){
        return $this->lada;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setGrado_estudios($grado_estudios){
        $this->grado_estudios = $grado_estudios;
    }

    public function getGrado_estudios(){
        return $grado_estudios;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword($password){
        $this->password = $password;
        //solo lo agrege para futuro aun no usaremos esto hasta tener bien la validacion de inicio de sesion 
        //$this->password = password_hash($password, PASSWORD_DEFAULT)."\n";
    }

    public function getPassword(){
        return $this->password;
    }




}



?>