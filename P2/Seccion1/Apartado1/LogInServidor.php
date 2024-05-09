var_dump($_POST);

<?php
// Datos de conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=simpsons;charset=utf8';
$username = 'root'; // Cambia esto por tu usuario de la base de datos
$password = ''; // Cambia esto por tu contraseña de la base de datos

// Recibir los datos del formulario
$email = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$contrasenya = isset($_POST['contrasenya']) ? $_POST['contrasenya'] : '';

try {
    // Establecer conexión a la base de datos
    $db = new PDO($dsn, $username, $password);

    // Preparar la consulta SQL para buscar el estudiante por email y contraseña
    $stmt = $db->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        // Si el estudiante existe, redirigir a la página de inicio
        header('Location: /Apartado1/Apartado1-Seccion1.php');
        exit;
    } else {
        // Si el estudiante no existe, redirigir al formulario de inicio de sesión con un mensaje de error
        header('Location: LogInCliente.php?error=1');
        exit;
    }
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
