<h1>Libros</h1>
<div>
    <p>
        <?= $content ?>
    </p>
    <form action="BibliotecaController.php" method="get">
        <input type="hidden" name="action" value="libro">
        <label for="id">Id a buscar</label>
        <input type="number" id="id" name="id" required>
        <button type="submit">Buscar</button>
    </form>
</div>