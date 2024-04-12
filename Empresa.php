<?php
    include 'Venta.php';
    /*
    Se registra la siguiente información: denominación, dirección, 
    la colección de clientes, colección de motos y la colección de ventas realizadas.
    2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
    3. Los métodos de acceso para cada una de las variables instancias de la clase.
    4. Redefinir el método _toString para que retorne la información de los atributos de la clase.

    5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
        retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
    6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda 
    y retornar el importe final de la venta.
    7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.


    */
    class Empresa{

        private $denominacion;
        private $direccion;
        private $a_objCliente = [];
        private $a_objMoto =[];
        private $a_objVenta=[];


        //METODO CONSTRUCTOR    
        public function __construct($nombre, $direccionIng, $colCliente, $colMoto, $colVenta){
            $this->denominacion = $nombre;
            $this->direccion = $direccionIng;
            $this->a_objCliente = $colCliente;
            $this->a_objMoto = $colMoto;
            $this->a_objVenta = $colVenta;

        }

        //METODOS DE ACCESO
        //GETTERS

        public function getDenominacion(){
            return $this->denominacion;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getCliente(){
            return $this->a_objCliente;
        }
        public function getMoto(){
            return $this->a_objMoto;
        }
        public function getVenta(){
            return $this->a_objVenta;
        }

        //SETTERS
        public function setDenominacion($nombre){
            $this->denominacion = $nombre;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccionIng;
        }
        public function setCliente($colCliente){
            $this->a_objCliente = $colCliente;
        }
        public function setMoto($colMoto){
            $this->a_objMoto = $colMoto;
        }
        public function setVenta($colVenta){
            $this->a_objVenta = $colVenta;
        }

        /**
         * Verifica que una moto este en la coleccion con el codigo ingresado por parametro
         *  y retorna su indice si lo encuentra
         * @param STRING $codigoMoto
         * @return INT
         */
        public function retornarMoto($codigoMoto){
            $encontrado=-1;
            $i=0;
            $cantidadMoto = count($this->getMoto());
            while($i < $cantidadMoto && $encontrado == -1){

                if(($this->getMoto()[$i])->getCodigo() == $codigoMoto){
                    $encontrado = $i;
                }
                $i++;
            }
            return $encontrado;
        }

   

        /**
         * Verifica que el cliente no este dado de baja, que los codigos de 
         * motos se encuentren en la lista
         * agerga el obj Venta creado a la coleccion de ventas 
         * y devuelve el monto final de la venta
         * @param ARRAY $colCodigosMoto
         * @param OBJ $objCliente
         * @return INT
         */
        public function registrarVenta($colCodigosMoto, $objCliente){
            $numVenta_Actual= count( $this->getVenta() );
            $fecha = getdate()["mday"]."/".getdate()["mon"]."/".getdate()["year"];
            //NUEVO OBJ VENTA
            $objVenta = new Venta($numVenta_Actual, $fecha, $objCliente, null, 0);

            if( ($objCliente->getEstado()) == true ){

                
                

                foreach ($colCodigosMoto as $codigo) {
                    $estadoCodigo= $this->retornarMoto($codigo);
                    if($estadoCodigo >-1){
                        $objMoto_Actual= $this->getMoto()[$estadoCodigo];

                        $objVenta->incorporarMoto($objMoto_Actual);
                    }

                }
            }
            if($objVenta->getA_Moto() != null){
                //SE AGREGA EL OBJ A LA COLECCION
                $nueva_ColVenta = $this->getVenta();
                $nueva_ColVenta[count($nueva_ColVenta)]= $objVenta;
                $this->setVenta($nueva_ColVenta);

            }else{
                $objVenta->setPrecio(-1);
            }
            return $objVenta->getPrecio();

        }


        /**
         * DEVUELVE UN ARREGLO CON LAS VENTAS DEL CLIENTE QUE VERIFIQUE 
         * TIPO Y NUMERO DDE DOCUEMENTO INGRESADO POR PARAMETRO
         * @param STRING $tipo
         * @param INT $numDoc
         * @return ARRAY
         */
        public function retornarVentasXCliente($tipo,$numDoc){
            $encontrado = false;
            $i=0;
            $cantidadCliente = count($this->getCliente());
            $nuevoArray=[];

            while($encontrado == false && $i < $cantidadCliente){
                
                if($this->getCliente()[$i]->getTipo() == $tipo && $this->getCliente()[$i]->getDocumento() == $numDoc){
                    $encontrado = true;
                }
                $i++;

            }
            if ($encontrado){
                
                foreach ($this->getVenta() as $venta) {
                    
                    if($venta->getO_Cliente()->getTipo() == $tipo && $venta->getO_Cliente()->getDocumento() == $numDoc){
                        $nuevoArray[count($nuevoArray)]=$venta;
                    }

                }
            }

            return $nuevoArray;

        }


        //STRING
        public function __toString(){
            //VARIABLES
            $stringCliente="";
            $stringMoto="";
            $stringVenta="";
            foreach ($this->getCliente() as $cliente) {
                $stringCliente = $stringCliente.$cliente."\n";
            }
            foreach ($this->getMoto() as $moto) {
                $stringMoto = $stringMoto.$moto."\n";
            }
            foreach ($this->getVenta() as $venta) {
                $stringVenta = $stringVenta.$venta."\n";
            }


            return "Denominacion: ".$this->getDenominacion().", Direccion: ".$this->getDireccion().", Clientes:\n".$stringCliente."Motos:\n".$stringMoto."Ventas:\n".$stringVenta;

        }

    }



?>