<?php
// Recuperar el nombre de la ciudad desde el formulario
$ciudadBuscada = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';

// Variables para la conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=world;charset=utf8';
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos (XAMPP usa '' por defecto)

// Intentar establecer la conexión y buscar la ciudad
try {
    $db = new PDO($dsn, $username, $password);
    $stmt = $db->prepare("SELECT * FROM cities WHERE name = ?");
    $stmt->execute([$ciudadBuscada]);
    
    if ($stmt->rowCount() > 0) {
        // Estudiante encontrado, extraer la información
        $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);
        // Codificar la ciudad para su uso en una URL
        $ciudadCodificada = urlencode($estudiante['name']);
        // Redirigir al enlace de Booking con la ciudad buscada
        header("Location: https://www.booking.com/searchresults.html?ss=" . $ciudadCodificada);
        exit;
    }
     else {
        // Si no se encuentra la ciudad, mostrar la interfaz amigable
        mostrarInterfazCiudadNoEncontrada($ciudadBuscada);
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Función para mostrar la interfaz cuando no se encuentra la ciudad
function mostrarInterfazCiudadNoEncontrada($ciudadBuscada) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ciudad No Encontrada</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Asegúrate de que las rutas a los archivos CSS son correctas -->
    </head>
    <body>
    <div class="container my-4">
        <div class="alert alert-info" role="alert">
            Lo sentimos, no hemos encontrado la ciudad: <strong><?= htmlspecialchars($ciudadBuscada) ?></strong>.
        </div>
        <div class="text-center">
            <a href="Apartado1-Seccion1.php" class="btn btn-primary">Volver a la búsqueda</a>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
}
?>
