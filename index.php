<?php
    #Index
    #En el mostraremos la salida de las vistas al usuario y tambien a traves de él enviaremos
    #las distintas acciones que el usuario envie al controlador

    #require(). Estable que el codigo del archivo invocado es requerido
    #es decir, obligatorio para el funcionamiento del programa.
    #Por ello, si el archivo, especificada en ha función require() no se encuentra
    #saldra un error "PHO Fatal error" y el programa PHP se detien
    #
    #require_once, funciona de la misma que su respectivo, salvo que, al
    #utilizar la version ONCE, se impide la carga de un mismo archivo

    require_once "controladores/plantilla.controlador.php";
    require_once "controladores/formularios.controlador.php";
    require_once "modelos/formularios.modelo.php";

    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrTraerPlantilla();

