<?php
declare (strict_types= 1);

namespace model;

class Libro {

    private static int $idCount = 0; 
    private int $id; 
    private string $titulo; 
    private int $anio; 
    private int $autorId; 
    private bool $disponible; 
  
	public function __construct( string $titulo, int $anio, int $autorId, bool $disponible) {

		$this->id = Libro::$idCount;
        Libro::$idCount++;
		$this->titulo = $titulo;
		$this->anio = $anio;
		$this->autorId = $autorId;
		$this->disponible = $disponible;
	}

	public function getId() : int {
		return $this->id;
	}

	public function setId(int $value) {
		$this->id = $value;
	}

	public function getTitulo() : string {
		return $this->titulo;
	}

	public function setTitulo(string $value) {
		$this->titulo = $value;
	}

	public function getAnio() : int {
		return $this->anio;
	}

	public function setAnio(int $value) {
		$this->anio = $value;
	}

	public function getAutorId() : int {
		return $this->autorId;
	}

	public function setAutorId(int $value) {
		$this->autorId = $value;
	}

	public function getDisponible() : bool {
		return $this->disponible;
	}

	public function setDisponible(bool $value) {
		$this->disponible = $value;
	}

	public function imprimirLibro():string {
		return 	
			"<div>id: " . $this->id . "<br>".
			"titulo: " . $this->titulo . "<br>".
			"anio: " . $this->anio . "<br>".
			"autorId: " . $this->autorId . "<br>".
			"disponible: " . $this->disponible . "<br></div>";
	}

}