<?php
// 1. Requerimos la conexión. Si falla, el script se detiene.
require 'conexion.php';

/* 
 * ¿Cómo obtienes los datos de SQLite?
 * Hacemos una consulta SELECT usando query() y luego fetchAll() 
 * para convertir los resultados en un arreglo de PHP que podamos leer.
 */
$consulta = $conexion->query('SELECT * FROM productos ORDER BY id DESC');
$productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRICKA - Panel de Administración</title>
    <!-- Obligatorio en la rúbrica: Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4 text-primary">Administración de Catálogo BRICKA</h1>
    
    <!-- Botón para ir al formulario de Crear -->
    <a href="formulario.php" class="btn btn-success mb-3">
        + Agregar Nuevo Producto
    </a>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Modelo</th>
                        <th>Categoría</th>
                        <th>Medidas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Usamos un ciclo foreach para recorrer los productos de la BD -->
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= $producto['id'] ?></td>
                            <!-- htmlspecialchars previene ataques inyectando código malicioso -->
                            <td><?= htmlspecialchars($producto['modelo'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($producto['categoria'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($producto['medidas'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                
                                <div class="d-flex gap-2">
    <!-- El botón de editar lo prepararemos en el siguiente paso -->
    <a href="editar.php?id=<?= $producto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
    
    <!-- PREGUNTA DE ENTREVISTA: ¿Para qué sirve el onsubmit? -->
    <!-- RESPUESTA: Ejecuta código JavaScript que lanza una alerta de confirmación. Si el usuario le da "Cancelar", el formulario no se envía y no se borra nada. (¡Esto cumple el requisito de interactividad JS de tu rúbrica!) -->
    <form action="eliminar.php" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
        <!-- Mandamos el ID oculto -->
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
    </form>
</div>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    
                    <!-- Mensaje si la tabla está vacía -->
                    <?php if (count($productos) === 0): ?>
                        <tr>
                            <td colspan="5" class="text-center">No hay productos en el catálogo.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
