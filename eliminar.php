<?php
// 1. Conectamos a la base de datos
require 'conexion.php';

/* 
 * PREGUNTA DE ENTREVISTA: ¿Por qué usamos INPUT_POST y no simplemente $_GET?
 * RESPUESTA: Por seguridad. Si borraras usando GET (una simple URL como eliminar.php?id=1), 
 * un bot de Google o un usuario malicioso podría abrir esa URL por accidente y borrarte productos. 
 * POST obliga a que la acción venga de un botón real del sistema.
 */

// 2. Recibimos el ID asegurándonos de que sea un número entero válido
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

// 3. Si el ID existe, procedemos a borrar
if ($id) {
    // Usamos el signo de interrogación para evitar inyección SQL
    $consulta = $conexion->prepare('DELETE FROM productos WHERE id = ?');
    $consulta->execute([$id]);
}

// 4. Regresamos a la tabla
header('Location: admin.php');
exit;
?>