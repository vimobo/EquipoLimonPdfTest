<?php
use lib\Pages;
class PdfController {

    private Pages $pages;

    function __construct() {

        $pages = new Pages();
        
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
    }


    public function inicio() {
        $this->pages->render('inicio');
    }
}
?>