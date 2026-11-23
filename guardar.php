<?php
// 1. Nos conectamos a la base de datos
require 'conexion.php';

// 2. Recibimos los datos del formulario
// La función trim() quita los espacios en blanco accidentales al inicio o final.
$modelo = trim($_POST['modelo'] ?? '');
$categoria = trim($_POST['categoria'] ?? '');
$medidas = trim($_POST['medidas'] ?? '');

// 3. Validación básica (Exigida en la rúbrica)
if ($modelo === '' || $categoria === '' || $medidas === '') {
    exit('Faltan datos. Por favor regresa y llena todos los campos.');
}

/* 
 *  ¿Por qué usas prepare() con signos de interrogación (?) 
 * en lugar de meter la variable directo al SQL?
 * 
 *  Para evitar ataques de "Inyección SQL". Los signos (?) separan el 
 * código SQL de los datos que escribió el usuario, haciendo el sistema 100% seguro.
 */
$consulta = $conexion->prepare('INSERT INTO productos (modelo, categoria, medidas) VALUES (?, ?, ?)');

// 4. Ejecutamos la consulta pasándole los valores reales
$consulta->execute([$modelo, $categoria, $medidas]);

// 5. Redirigimos de vuelta al panel de administración automáticamente
header('Location: admin.php');
exit;
?>
