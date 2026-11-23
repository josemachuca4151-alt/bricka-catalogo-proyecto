<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - BRICKA</title>
    <!-- Obligatorio: Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Agregar Nuevo Producto</h4>
        </div>
        <div class="card-body">
            <!-- 
                 ¿Qué hace el method="POST"?
                 Envía los datos del formulario de forma oculta y segura al archivo guardar.php. 
                Si usáramos GET, los datos se verían en la URL de arriba.
            -->
            <form action="guardar.php" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Modelo</label>
                    <input type="text" name="modelo" class="form-control" required placeholder="Ej. SIENNA">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Categoría</label>
                    <input type="text" name="categoria" class="form-control" required placeholder="Ej. PVC MÁRMOL">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Medidas</label>
                    <input type="text" name="medidas" class="form-control" required placeholder="Ej. 2440 X 1220 X 2 MM">
                </div>
                
                <button type="submit" class="btn btn-primary w-100 mb-2">Guardar Producto</button>
                <a href="admin.php" class="btn btn-outline-secondary w-100">Cancelar</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
