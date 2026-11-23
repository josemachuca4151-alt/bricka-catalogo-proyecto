<?php
// 1. Requerimos la conexión
require 'conexion.php';

// 2. Recibimos el ID del producto que vamos a editar por método GET (viene de la URL)
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    exit('ID de producto inválido.');
}

// 3. Buscamos los datos actuales del producto
$consulta = $conexion->prepare('SELECT * FROM productos WHERE id = ?');
$consulta->execute([$id]);
$producto = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    exit('Producto no encontrado en la base de datos.');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - BRICKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Editar Producto</h4>
        </div>
        <div class="card-body">
            <!-- Mandamos los datos a actualizar.php -->
            <form action="actualizar.php" method="POST">
                <!-- IMPORTANTÍSIMO: Mandamos el ID oculto para saber cuál actualizar -->
                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Modelo</label>
                    <!-- Imprimimos el valor actual dentro del input -->
                    <input type="text" name="modelo" class="form-control" required value="<?= htmlspecialchars($producto['modelo'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Categoría</label>
                    <input type="text" name="categoria" class="form-control" required value="<?= htmlspecialchars($producto['categoria'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Medidas</label>
                    <input type="text" name="medidas" class="form-control" required value="<?= htmlspecialchars($producto['medidas'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
                
                <button type="submit" class="btn btn-primary w-100 mb-2">Guardar Cambios</button>
                <a href="admin.php" class="btn btn-outline-secondary w-100">Cancelar</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>