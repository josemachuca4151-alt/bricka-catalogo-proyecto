<?php
/* 
 * PREGUNTA DE ENTREVISTA: ¿Qué es PDO?
 * RESPUESTA: PHP Data Objects. Es una herramienta de PHP que permite conectarse 
 * a diferentes bases de datos (como SQLite o MySQL) de forma segura.
 */

// 1. Definimos la ruta donde se guardará el archivo de la base de datos.
// __DIR__ significa "en esta misma carpeta".
$rutaDB = __DIR__ . '/bricka.db';

try {
    // 2. Creamos la conexión a SQLite usando PDO.
    $conexion = new PDO('sqlite:' . $rutaDB);
    
    // 3. Configuramos PDO para que nos avise si hay errores (Excepciones).
    // Esto es una buena práctica para detectar fallos rápidamente.
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 4. Creamos la tabla 'productos' SOLO si no existe.
    // Usamos comandos SQL estándar.
    $conexion->exec("
        CREATE TABLE IF NOT EXISTS productos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            modelo TEXT NOT NULL,
            categoria TEXT NOT NULL,
            medidas TEXT NOT NULL,
            creado_en TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
        )
    ");
    
} catch (PDOException $e) {
    // Si algo falla al conectar, detenemos el sistema y mostramos el error.
    exit('Error al conectar con la base de datos: ' . $e->getMessage());
}
?>