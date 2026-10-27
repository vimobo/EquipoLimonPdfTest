<?php
declare(strict_types=1);

namespace controller;

use model\Biblioteca;
use model\Libro;
use model\Autor;
use lib\Pages;

class BibliotecaController
{
    private Biblioteca $biblioteca;
    private Pages $pages;

    public function __construct()
    {
        $this->biblioteca = new Biblioteca();
        $this->pages = new Pages();

        // Autores de prueba
        $autor1 = new Autor("Gabriel García Márquez", "Colombiana");
        $autor2 = new Autor("J. R. R. Tolkien", "Británica");
        $autor3 = new Autor("Miguel de Cervantes", "Española");

        $this->biblioteca->addAutor($autor1);
        $this->biblioteca->addAutor($autor2);
        $this->biblioteca->addAutor($autor3);

        // Libros de prueba
        $this->biblioteca->addLibro(
            new Libro("Cien años de soledad", 1967, $autor1->getId(), true)
        );

        $this->biblioteca->addLibro(
            new Libro("El amor en los tiempos del cólera", 1985, $autor1->getId(), false)
        );

        $this->biblioteca->addLibro(
            new Libro("El Hobbit", 1937, $autor2->getId(), true)
        );

        $this->biblioteca->addLibro(
            new Libro("El Señor de los Anillos", 1954, $autor2->getId(), true)
        );

        $this->biblioteca->addLibro(
            new Libro("Don Quijote de la Mancha", 1605, $autor3->getId(), false)
        );
    }

    public function inicio(): void
    {
        $this->pages->render("inicio");
    }

    public function libros(): void
    {
        $libros = Biblioteca::imprimirLibros(
            $this->biblioteca->getListaLibros()
        );

        $this->pages->render("libros", [
            "content" => $libros
        ]);
    }

    public function libro(): void
    {
        $libros = $this->biblioteca->getListaLibros();
        $id = (int) $_GET["id"];

        $this->pages->render("libro", [
            "content" => $libros[$id]->imprimirLibro()
        ]);
    }


    public function autor(): void
    {
        $id = (int) $_GET['id'];
        $contenido = $this->biblioteca->imprimirPorIdAutor($id);

        $this->pages->render("autor", [
            "content" => $contenido
        ]);
    }

    public function disponible() {
        $libros = $this->biblioteca->imprimirLibrosDisponibles();
        $this->pages->render("disponible", [
            "content" => $libros
        ]);
    } 
}