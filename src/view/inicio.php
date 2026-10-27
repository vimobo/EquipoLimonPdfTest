<h1>Bienvenido a la biblioteca Tus libros</h1>

<p>¡Encuentra tu próxima lectura!</p>

<nav>
    <div>
        <form action="PdfController.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <br><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <br><br>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" min="0" required>

            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</nav>