<?php
include("includes/conexion.php");

class DAOUser{
    private $conec;

    public function Insertar($sql){
        $this->conec = new conexion();
        $result = false;
        if ($this->conec->Execute($sql)) {
            $result = true;
        }
        return $result;
    }

}


?>