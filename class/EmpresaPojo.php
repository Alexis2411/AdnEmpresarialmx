<?php
    class Empresa {

        private $nombre_empresa;
        private $fecha_fundacion;
        private $tamano_empresa;
        private $tipo_empresa;
        private $correo_empresa;
        private $direccion;
        private $codigo_postal;
        private $estado;
        private $ciudad;
        private $lada;
        private $telefono_empresa;

        public function setNombre_empresa($nombre_empresa){
            $this->nombre_empresa = $nombre_empresa;
        }

        public function getNombreEmpresa(){
            return $nombre_empresa;
        }

        public function setFecha_fundacion($fecha_fundacion){
            $this->fecha_fundacion = $fecha_fundacion;
        }
        
        public function getFecha_fundacion(){
            return $fecha_fundacion;
        }

        public function setTamano_empresa($tamano_empresa){
            $this->tamano_empresa = $tamano_empresa;
        }
        
        public function getTamano_empresa(){
            return $tamano_empresa;
        }

        public function setTipo_empresa($tipo_empresa){
            $this->tipo_empresa = $tipo_empresa;
        }
        
        public function getTipo_empresa(){
            return $tipo_empresa;
        }

        public function setCorreo_empresa($correo_empresa){
            $this->correo_empresa = $correo_empresa;
        }
        public function getCorreo_empresa(){
            return $correo_empresa;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        
        public function getDireccion(){
            return $this->direccion;
        }

        public function setCodigo_postal($codigo_postal){
            $this->codigo_postal = $codigo_postal;
        }
        
        public function getCodigo_postal(){
            return $codigo_postal;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
        
        public function getEstado(){
            return $this->estado;
        }

        public function setCiudad($ciudad){
            $this->ciudad = $ciudad;
        }
        
        public function getCiudad(){
            return $this->ciudad;
        }

        public function setLada($lada){
            $this->lada = $lada;
        }

        public function getLada(){
            return $lada;
        }

        public function setTelefono_empresa($telefono_empresa){
            $this->telefono_empresa = $telefono_empresa;
        }
        
        public function getTelefono_empresa(){
            return $telefono_empresa;
        }


    }
?>