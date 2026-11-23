<?php
// 1. Nos conectamos a la base de datos
require 'conexion.php';

// 2. Obtenemos todos los productos
$consulta = $conexion->query('SELECT * FROM productos ORDER BY id DESC');
$productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Público - BRICKA</title>
    <!-- Bootstrap para diseño responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">BRICKA CATALOGO</a>
        <div class="ms-auto">
            <!-- Botón oculto para el administrador -->
            <a href="admin.php" class="btn btn-outline-light btn-sm">Admin Panel</a>
        </div>
    </div>
</nav>

<!-- Encabezado de la página -->
<header class="bg-primary text-white text-center py-5 mb-5 shadow-sm">
    <div class="container">
        <h1 class="display-4 fw-bold">Nuestros Productos</h1>
        <p class="lead">Explora nuestra selección de materiales y revestimientos</p>
    </div>
</header>

<!-- Cuadrícula de Productos -->
<div class="container mb-5">
    <div class="row g-4">
        <!-- Ciclo para crear una "Tarjeta" por cada producto guardado -->
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <!-- Categoría -->
                        <span class="badge bg-secondary mb-2">
                            <?= htmlspecialchars($producto['categoria'], ENT_QUOTES, 'UTF-8') ?>
                        </span>
                        
                        <!-- Modelo -->
                        <h5 class="card-title fw-bold text-primary mb-3">
                            <?= htmlspecialchars($producto['modelo'], ENT_QUOTES, 'UTF-8') ?>
                        </h5>
                        
                        <!-- Medidas -->
                        <p class="card-text text-muted">
                            <strong>Medidas:</strong><br>
                            <?= htmlspecialchars($producto['medidas'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Mensaje si no hay productos -->
        <?php if (count($productos) === 0): ?>
            <div class="col-12 text-center text-secondary py-5">
                <h3 class="fw-light">Catálogo vacío</h3>
                <p>No hay productos disponibles por el momento.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>