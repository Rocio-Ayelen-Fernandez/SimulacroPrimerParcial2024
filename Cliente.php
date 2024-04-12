<?php

    /**
     * En la clase Cliente:
     * 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja,
     *  el tipo y el número de documento. 
     * Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
     * 1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
     * 2. Los métodos de acceso de cada uno de los atributos de la clase.
     * 3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
     */


    class Cliente{

        private $nombre;
        private $apellido;
        private $estadoBaja; //BOOLEAN
        private $tipoDoc;
        private $numDoc;


        //METODO CONSTRUCTOR
        public function __construct($nombreIng, $apellidoIng, $estado, $tipo, $doc){    

            $this->nombre = $nombreIng;
            $this->apellido = $apellidoIng;
            $this->estadoBaja = $estado;
            $this->tipoDoc = $tipo;
            $this->numDoc = $doc;

        }

        //METODOS DE ACCESO
        //GETTERS
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getEstado(){
            return $this->estadoBaja;
        }
        public function getTipo(){
            return $this->tipoDoc;
        }
        public function getDocumento(){
            return $this->numDoc;
        }

        //SETTERS
        public function setNombre($nombreIng){
            $this->nombre = $nombreIng;
        }
        public function setApellido($apellidoIng){
            $this->apellid = $apellidoIng;
        }
        public function setEstado($estado){
            $this->estadoBaja = $estado;
        }
        public function setTipo($tipo){
            $this->tipoDoc = $tipo;
        }
        public function setDocumento($doc){
            $this->numDoc = $doc;
        }


        //STRING
        public function __toString(){
            $stringBaja= "No";
            if($this->getEstado()){
                $stringBaja= "Si";
            }
            return "Nombre: ".$this->getNombre().", Apellido: ".$this->getApellido().", Estado de baja: ".$stringBaja.", Tipo Documento: ".$this->getTipo().", Numero Documento: ".$this->getDocumento();
        }




    }



?>