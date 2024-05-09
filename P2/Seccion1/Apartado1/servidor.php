<?php

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los valores enviados desde el formulario
    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : 'No especificado';
    $apellido = isset($_POST['apellido']) ? htmlspecialchars($_POST['apellido']) : 'No especificado';
    $correo = isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : 'No especificado';
    $telefono = isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : 'No especificado';
    $checkin = isset($_POST['checkin']) ? htmlspecialchars($_POST['checkin']) : 'No especificado';
    $checkout = isset($_POST['checkout']) ? htmlspecialchars($_POST['checkout']) : 'No especificado';
    $terminosAceptados = isset($_POST['terminos']) ? 'Sí' : 'No';
    
    // Mostrar los detalles de la reserva
    echo "<h1>Detalles de la Reserva</h1>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Apellido:</strong> $apellido</p>";
    echo "<p><strong>Correo:</strong> $correo</p>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<p><strong>Check-In:</strong> $checkin</p>";
    echo "<p><strong>Check-Out:</strong> $checkout</p>";
    echo "<p><strong>Aceptó Términos y Condiciones:</strong> $terminosAceptados</p>";
} else {
    // Si no se accede mediante un POST, redirigir al formulario
    header('Location: cliente.php');
}

?>
