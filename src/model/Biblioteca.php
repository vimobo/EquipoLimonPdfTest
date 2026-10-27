<?php
declare(strict_types=1);

namespace model;

class Biblioteca
{

    private array $listaLibros;
    private array $listaAutores;



    public function __construct()
    {

        $this->listaLibros = [];
        $this->listaAutores = [];
    }

    public function getListaLibros(): array
    {
        return $this->listaLibros;
    }

    public function setListaLibros(array $value)
    {
        $this->listaLibros = $value;
    }

    public function getListaAutores(): array
    {
        return $this->listaAutores;
    }

    public function setListaAutores(array $value)
    {
        $this->listaAutores = $value;
    }

    public function addLibro(Libro $libro): void
    {
        $this->listaLibros[$libro->getId()] = $libro;
    }

    public function addAutor(Autor $autor): void
    {
        $this->listaAutores[$autor->getId()] = $autor;
    }

    static public function imprimirLibros(array $libros):string {
        $string = "";
        foreach ($libros as $libro) {
            $string .= $libro->imprimirLibro();
        }
        return $string;
    }

    public function imprimirLibrosDisponibles():string {
        $string = "";
        foreach ($this->listaLibros as $libro) {
            if ($libro->getDisponible() === true) 
                $string .= $libro->imprimirLibro();
        }
        return $string;
    }

    public function imprimirLibrosYAutor(int $idABuscar)
    {
        $string = "";
        foreach ($this->listaLibros as $libro) {
            $string .= $libro->imprimirLibro();
            $string .= $this->listaAutores[$libro->getAutorId()]->imprimirAutor();
        }
        return $string;
    }

    public function imprimirPorIdAutor(int $idABuscar): string {
        $string = $this->listaAutores[$idABuscar]->imprimirAutor();

        $filteredLibros = array_filter($this->listaLibros, fn($libro) => 
            $idABuscar == $libro->getAutorId());
        return $string .= Biblioteca::imprimirLibros($filteredLibros);
    }
}