<?php
require 'conexion.php';

// 1. Recibimos los datos incluyendo el ID
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$modelo = trim($_POST['modelo'] ?? '');
$categoria = trim($_POST['categoria'] ?? '');
$medidas = trim($_POST['medidas'] ?? '');

// 2. Validamos que no vengan vacíos
if (!$id || $modelo === '' || $categoria === '' || $medidas === '') {
    exit('Datos inválidos. Por favor regresa y completa los campos.');
}

/* 
 * PREGUNTA DE ENTREVISTA: ¿Qué diferencia hay entre INSERT y UPDATE?
 * RESPUESTA: INSERT crea un registro nuevo. UPDATE modifica uno existente, 
 * y es CRÍTICO usar la cláusula WHERE, de lo contrario editaríamos todos los productos a la vez.
 */
$consulta = $conexion->prepare('UPDATE productos SET modelo = ?, categoria = ?, medidas = ? WHERE id = ?');
$consulta->execute([$modelo, $categoria, $medidas, $id]);

// 3. Regresamos a la administración
header('Location: admin.php');
exit;
?>