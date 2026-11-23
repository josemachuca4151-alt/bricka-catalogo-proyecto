# BRICKA - Catálogo Digital Interactivo

## Descripción del Proyecto

BRICKA es un sistema web de catálogo interactivo diseñado para gestionar y visualizar productos de recubrimiento y decoración (PVC Mármol, Wall Panels, Vigas WPC, etc.). El sistema incluye una vista pública para clientes con diseño responsivo basado en tarjetas (cards) y un panel de administración privado. Implementa operaciones CRUD completas (Crear, Leer, Actualizar, Eliminar) para el control total del inventario.

## Tecnologías Utilizadas

- **Backend:** PHP (Uso de PDO y sentencias preparadas para máxima seguridad).
- **Base de Datos:** SQLite (Archivo de persistencia local).
- **Frontend:** HTML5 Semántico y CSS3.
- **Framework CSS:** Bootstrap 5.3 (Para diseño responsivo y componentes visuales).
- **Interactividad:** JavaScript nativo (Para confirmaciones de seguridad al eliminar registros).

## Instrucciones de Ejecución

1. Descargar o clonar este repositorio en una computadora con un servidor local instalado (se recomienda XAMPP).
2. Mover la carpeta del proyecto (`bricka-catalogo-proyecto`) dentro del directorio de publicación del servidor web:
   - En XAMPP: Colocar en `C:\xampp\htdocs\bricka-catalogo-proyecto`
3. Abrir el panel de control de XAMPP e iniciar el módulo de **Apache**. (No es necesario iniciar MySQL).
4. Abrir un navegador web e ingresar a las siguientes rutas:
   - **Vista Pública (Catálogo):** `http://localhost/bricka-catalogo-proyecto/index.php`
   - **Panel de Administración (CRUD):** `http://localhost/bricka-catalogo-proyecto/admin.php`
5. **Nota sobre la Base de Datos:** El archivo `bricka.db` se generará automáticamente en la carpeta raíz al ejecutar el proyecto por primera vez gracias al script de conexión, o bien, se utilizará el archivo `.db` ya incluido en este repositorio.
