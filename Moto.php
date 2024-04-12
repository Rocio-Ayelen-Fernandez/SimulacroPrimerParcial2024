<?php

    /**
     * 1. Se registra la siguiente información: código, costo, año fabricación, 
     * descripción, porcentaje incremento anual, activa (atributo que va a 
     * contener un valor true, si la moto está disponible para la
     * venta y false en caso contrario).
     * 
     * 2. Método constructor que recibe como parámetros los valores iniciales para 
     * los atributos definidos en la clase.
     * 
     * 3. Los métodos de acceso de cada uno de los atributos de la clase.
     * 
     * 4. Redefinir el método toString para que retorne la información de los atributos de la clase
     * 
     * 5.
     * Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
     * Si la moto no se encuentra disponible para la venta retorna un valor < 0. 
     * Si la moto está disponible para la venta, el método realiza el siguiente cálculo:
     * $_venta = $_compra + $_compra * (anio * por_inc_anual)
     * donde $_compra: es el costo de la moto.
     * anio: cantidad de años transcurridos desde que se fabricó la moto.
     * por_inc_anual: porcentaje de incremento anual de la moto.
     */


    class Moto{

        private $codigo;
        private $costo;
        private $anioFabricacion;
        private $descripcion;
        private $porcIncAnual;
        private $activa; //Contiene tipo BOOLEAN (Si la moto esta a la venta)

        //METODO CONSTRUCTOR
        public function __construct($codigoIng, $costoIng, $anio, $desc, $porcentaje, $valActiva){
            $this->codigo = $codigoIng;
            $this->costo = $costoIng;
            $this->anioFabricacion = $anio;
            $this->descripcion = $desc;
            $this->porcIncAnual = $porcentaje;
            $this->activa = $valActiva;
        }

        //METODOS DE ACCESO
        //GETTERS
        public function getCodigo(){
            return $this->codigo;
        }
        public function getCosto(){
            return $this->costo;
        }
        public function getAnio(){
            return $this->anioFabricacion;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getPorcentaje(){
            return $this->porcIncAnual;
        }
        public function getActiva(){
            return $this->activa;
        }
        
        //SETTERS
        public function setCodigo($codigoIng){
            $this->codigo = $codigoIng;
        }
        public function setCosto($costoIng){
            $this->costo = $costoIng;
        }
        public function setAnio($anio){
            $this->anioFabricacion = $anio;
        }
        public function setDescripcion($desc){
            $this->descripcion = $desc;
        }
        public function setPorcentaje($porcentaje){
            $this->porcIncAnual = $porcentaje;
        }
        public function setActiva($valActiva){
            $this->activa = $valActiva;
        }

        
        /**
         * Devuelve el precio de la moto con respecto a su incremento anual,
         * solo si esta disponible a la venta
         * @return DOUBLE
         */
        public function darPrecioVenta(){
            $anio = getdate()["year"] - $this->getAnio();
            $por_inc_anual = $this->getPorcentaje() / 100;
            $_venta=-1;
            if($this->getActiva()){
                $_venta = $this->getCosto() + ( $this->getCosto() * ($anio * $por_inc_anual) );

            }
            return $_venta;

        }




        //STRING
        public function __toString(){
            $stringActiva= "No";
            if($this->getActiva()){
                $stringActiva= "Si";
            }
            return "Codigo: ".$this->getCodigo().", Costo: ".$this->getCosto().", Año de Fabricacion: ".$this->getAnio().", Descripcion:\n".$this->getDescripcion().", Porcentaje de Incremento Anual: ".$this->getPorcentaje()."%, Esta Disponible: ".$stringActiva; 
        }
        
    }



?>