<?php

/*
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
*/

    class Venta{

        private $numero;
        private $fecha;
        private $objCliente;
        private $a_ObjMoto=[];
        private $precioFinal;

        //METODO CONSTRUCTOR
        public function __construct($numIng, $fechaIng, $oCliente, $arrayMotos, $precio){
            $this->numero = $numIng;
            $this->fecha = $fechaIng;
            $this->objCliente = $oCliente;
            $this->colObjMoto = $arrayMotos;
            $this->precioFinal = $precio;
        }

        //METODOS DE ACCESO
        //GETTERS
        public function getNumero(){
            return $this->numero;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getO_Cliente(){
            return $this->objCliente;
        }
        public function getA_Moto(){
            return $this->a_ObjMoto;
        }
        public function getPrecio(){
            return $this->precioFinal;
        }

        //SETTERS
        public function setNumero($numIng){
            $this->numero= $numIng;
        }
        public function setFecha($fechaIng){
            $this->fecha = $fechaIng;
        }
        public function setO_Cliente($oCliente){
            $this->objCliente = $oCliente;
        }
        public function setA_Moto($arrayMotos){
            $this->a_ObjMoto = $arrayMotos;
        }
        public function setPrecio($precio){
            $this->precioFinal = $precio;
        }


        /**
         * Agrega un obj moto por parametro si esta disponible a la venta y 
         * devuelve un valor dependiendo si se pudo o no
         */
        public function incorporarMoto($objMoto){
            $nuevoArray=[];
            $estado=false;
            if($objMoto->darPrecioVenta() >= 0 ){
                $nuevoArray= $this->getA_Moto();//Le da la lista de motos al nuevoArray

                $nuevoArray[count($nuevoArray)] = $objMoto;//Agrega la nueva moto al final de la lista

                $this->setA_Moto($nuevoArray);
            

                $this->setPrecio( $this->getPrecio() + $objMoto->darPrecioVenta() );
                $estado= true;
                

            }
            return $estado;

        }



        //STRING
        public function __toString(){
            $stringMoto= "";
            foreach ($this->getA_Moto() as $moto) {
                $stringMoto = $stringMoto.$moto."\n";
            }

            return "Numero: ".$this->getNumero().", Fecha: ".$this->getFecha().", Cliente:\n".$this->getO_Cliente()." \nMotos: ".$stringMoto."Precio Total: ".$this->getPrecio();
        }


    }



?>