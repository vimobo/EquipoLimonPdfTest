<?php
declare(strict_types=1);

namespace model;

class Autor
{
    private static int $idCount = 0;
    private int $id;
    private string $nombre;
    private string $nacionalidad;



	public function __construct(string $nombre, string $nacionalidad) {

		$this->id = Autor::$idCount;
		Autor::$idCount++;
		$this->nombre = $nombre;
		$this->nacionalidad = $nacionalidad;
	}


	public function getId() : int {
		return $this->id;
	}

	public function setId(int $value) {
		$this->id = $value;
	}

	public function getNombre() : string {
		return $this->nombre;
	}

	public function setNombre(string $value) {
		$this->nombre = $value;
	}

	public function getNacionalidad() : string {
		return $this->nacionalidad;
	}

	public function setNacionalidad(string $value) {
		$this->nacionalidad = $value;
	}

    public function imprimirAutor(): string {
        return
            "<div>id: " . $this->id . "<br>" .
            "nombre: " . $this->nombre . "<br>" .
            "nacionalidad: " . $this->nacionalidad . "<br></div>";
    }
}