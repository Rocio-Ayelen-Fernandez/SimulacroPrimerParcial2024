<?php

    include 'Moto.php';
    include 'Empresa.php';
    include 'Cliente.php';

    $objMoto = new Moto(123, 1000, 2016, "Una moto ewe", 10, true);
    $objVenta = new Venta(444, "1/2/22", "Pepe", [], 0);

    $objCliente1 = new Cliente("Pablo", "Alba",false, "DNI", 44238322);
    $objCliente2 = new Cliente("Juan", "Alba",true, "DNI", 44238321);
    
    $obMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
    $obMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
    $obMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
    
    $objEmpresa= new Empresa("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2], [$obMoto1, $obMoto2, $obMoto3], []);


    echo $objEmpresa->registrarVenta([11,12,13], $objCliente2)."\n";

    echo $objEmpresa->registrarVenta([0], $objCliente2)."\n";

    echo $objEmpresa->registrarVenta([2], $objCliente2)."\n";


    print_r( $objEmpresa->retornarVentasXCliente($objCliente1->getTipo(),$objCliente1->getDocumento()) );

    print_r( $objEmpresa->retornarVentasXCliente($objCliente2->getTipo(),$objCliente2->getDocumento()) );


    echo $objEmpresa."\n";
?>