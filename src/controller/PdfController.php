<?php

namespace controller;
require_once __DIR__ . "/../lib/fpdf/fpdf.php";

use lib\Pages;
use lib\fpdf\FPDF;
class PdfController {

    private Pages $pages;
    private FPDF $fpdf;



    function __construct() {

        $this->fpdf = new FPDF();
        $this->pages = new Pages();
        
        $nombre = $_POST["nombre"] ?? '';
        $apellido = $_POST["apellido"] ?? '';
        $edad = $_POST["edad"] ?? 0;
    }


    public function inicio() {
        $this->pages->render('inicio');
        $this->generarPdf();
    }

    public function generarPdf () {
        $this->fpdf->addPage();
        $this->fpdf->SetFont('Arial','B',16);    
        $this->fpdf->Cell(40,10,'¡Hola, Mundo!');
        $this->fpdf->Output();
    }
}
?>