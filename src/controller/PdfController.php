<?php

namespace controller;

require_once __DIR__ . "/../../fpdf/fpdf.php";

use lib\Pages;
use FPDF;

class PdfController
{

    private Pages $pages;
    private FPDF $fpdf;

    function __construct()
    {
        $this->fpdf = new FPDF();
        $this->pages = new Pages();

        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["edad"])) {
            $edadNumero = $_POST["edad"];
            settype($edadNumero, "int");

            $this->generarPdf($_POST["nombre"], $_POST["apellido"], $edadNumero);
        }
    }

    public function inicio(): void
    {
        $this->pages->render('inicio');
    }

    public function generarPdf(string $nombre, string $apellido, int $edad): void
    {
        $this->fpdf->addPage();
        $this->fpdf->SetFont('Arial', 'B', 16);
        $this->fpdf->Image(__DIR__ . "/limon.png", 30, 5, 33);
        $this->fpdf->Cell(120, 20, $this->setUtf8("Equipo Limón"), false, "center", true);
        $this->fpdf->Cell(40, 80, $this->setUtf8("Hola, " . $nombre . " " . $apellido . " te queremos felicitar tu cumpleaños de "), false, true);
        $this->fpdf->Cell(0, 0, $this->setUtf8($edad . " años de parte del equipo limon."), false, true);

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetFillColor(0, 0, 0);
        $this->fpdf->SetTextColor(200, 200, 200);

        $this->fpdf->Ln(20);
        $this->fpdf->Cell(60, 10, 'Nombre', 1, 0, 'C', true);
        $this->fpdf->Cell(60, 10, 'Apellido', 1, 0, 'C', true);
        $this->fpdf->Cell(40, 10, 'Edad', 1, 1, 'C', true);

        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->SetFillColor(230, 230, 230);

        $this->fpdf->Cell(60, 10, $this->setUtf8($nombre), 1, 0, 'C', true);
        $this->fpdf->Cell(60, 10, $this->setUtf8($apellido), 1, 0, 'C', true);
        $this->fpdf->Cell(40, 10, $edad, 1, 1, 'C', true);

        $this->fpdf->Output();

    }

    private function setUtf8(string $texto): string|bool
    {
        return iconv('UTF-8', 'windows-1252', $texto);
    }
}
?>
