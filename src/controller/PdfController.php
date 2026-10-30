<?php

namespace controller;

require_once __DIR__ . "/../../fpdf/fpdf.php";

use lib\Pages;
use FPDF;

class PdfController {

    private Pages $pages;
    private FPDF $fpdf;

    function __construct() {
        $this->fpdf = new FPDF();
        $this->pages = new Pages();
        
        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["edad"])) {
            $edadNumero = $_POST["edad"];
            settype($edadNumero, "int");

            $this->generarPdf($_POST["nombre"], $_POST["apellido"], $edadNumero);
        }
    }

    public function inicio() : void {
        $this->pages->render('inicio');
    }

    public function generarPdf(string $nombre, string $apellido, int $edad) : void {
        $this->fpdf->addPage();
        $this->fpdf->SetFont('Arial', 'B', 16);    
        $this->fpdf->Cell(40, 10, $this->setUtf8($nombre), false, true);
        $this->fpdf->Cell(40, 10, $this->setUtf8($apellido), false, true);
        $this->fpdf->Cell(40, 10, $edad, 0, 1);
        $this->fpdf->Output();

        
    }

    private function setUtf8(string $texto) : string | bool {
        return iconv('UTF-8', 'windows-1252', $texto);
    }
}
?>