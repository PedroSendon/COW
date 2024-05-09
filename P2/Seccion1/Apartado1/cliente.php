<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styleApartado1-Seccion1.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<header>
        <!-- Encabezado de la página -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Barra de navegación -->
            <div class="container-fluid">
                <!-- Contenedor fluido para ocupar el ancho completo de la pantalla -->
                <a class="navbar-brand" href="#">Reservas de Hoteles</a>
                <!-- Marca del sitio o logo -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Botón para desplegar el menú en dispositivos pequeños -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <!-- Contenido del menú -->
                    <ul class="navbar-nav">
                        <!-- Lista de elementos del menú -->
                        <li class="nav-item">
                            <a class="nav-link" href="#inicio">Inicio</a>
                            <!-- Enlace al inicio de la página -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#hoteles">Hoteles</a>
                            <!-- Enlace a la sección de hoteles -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reservas">Reservas</a>
                            <!-- Enlace a la sección de reservas -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Registrar alojamiento</a>
                            <!-- Enlace para registrar alojamiento -->
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <!-- Botones de acción -->
                    <button class="btn btn-outline-primary me-2" type="button"
                        onclick="location.href='#iniciarSesion'">Iniciar Sesión</button>
                    <!-- Botón para iniciar sesión -->
                    <button class="btn btn-primary" type="button"
                        onclick="location.href='#registrarse'">Registrarse</button>
                    <!-- Botón para registrarse -->
                </div>
            </div>
        </nav>
    </header>

    <hr class="divider"> 

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Realiza tu Reserva</h2>
                <form id="formularioReserva" action="servidor.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Número de Teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="checkin">Check-In:</label>
                        <input type="date" class="form-control" id="checkin" name="checkin" required>
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check-Out:</label>
                        <input type="date" class="form-control" id="checkout" name="checkout" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="terminos" name="terminos" required>
                        <label class="form-check-label" for="terminos">Acepto los Términos y Condiciones</label>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" onclick="validarFormulario()">Realizar Pago Falso</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm" style="border-radius: 20px;"> <!-- Añade sombra y bordes redondeados -->
                    <div class="card-body">
                        <h2 class="card-title">Información del Hotel</h2>
                        <hr class="divider"> 
                        <?php
                        // Asigna valores predeterminados en caso de que no se pasen parámetros
                        $nombreHotel = isset($_GET['nombre']) ? $_GET['nombre'] : 'Nombre del hotel no disponible';
                        $ubicacionHotel = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : 'Ubicación no disponible';
                        $personas = isset($_GET['personas']) ? $_GET['personas'] : 'Número de personas no disponible';
                        $imagenHotel = isset($_GET['imagen1']) ? 'images/'.$_GET['imagen1'] : 'images/placeholder.jpg';
                        ?>
                        
                        <p><?php echo htmlspecialchars($nombreHotel); ?></p>
                        <p><?php echo htmlspecialchars($ubicacionHotel); ?></p>
                        <p><?php echo htmlspecialchars($personas); ?> personas</p>
                        <!-- Muestra la imagen del hotel, asegurándose de usar htmlspecialchars para evitar XSS -->
                        <div class="text-center"> <!-- Envuelve la imagen en un div con la clase text-center -->
                            <img src="<?php echo htmlspecialchars($imagenHotel); ?>" class="img-fluid rounded" alt="Imagen del hotel" style="max-height: 300px; margin: auto;">
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalValidacion" tabindex="-1" role="dialog" aria-labelledby="modalValidacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalValidacionLabel">Validación del Formulario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="mensajeErrorModal">Por favor, completa todos los campos del formulario.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        function validarFormulario() {
            var formulario = document.getElementById('formularioReserva');
            var correo = document.getElementById('correo');
            var telefono = document.getElementById('telefono');
            var checkin = document.getElementById('checkin');
            var checkout = document.getElementById('checkout');
            var name = document.getElementById('nombre');
            var surname = document.getElementById('apellido');
            var terminosAceptados = document.getElementById('terminos').checked;
            var mensajeValidacion = document.getElementById('modalValidacionMensaje');
            var todosLosCamposLlenos = true;
            var mensajeError = '';

            // Resetear estilos
            correo.style.borderColor = '';
            telefono.style.borderColor = '';
            checkin.style.borderColor = '';
            checkout.style.borderColor = '';
            surname.style.borderColor = '';
            name.style.borderColor = '';


            if (name.value.trim() === '') {
                name.style.borderColor = 'red';
                todosLosCamposLlenos = false;
                mensajeError += 'Introduce el nombre. <br>';
            }

            if (surname.value.trim() === '') {
                surname.style.borderColor = 'red';
                todosLosCamposLlenos = false;
                mensajeError += 'Introduce el apellido. <br>';
            }

            // Validación de correo electrónico
            var regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!regexCorreo.test(correo.value)) {
                correo.style.borderColor = 'red';
                todosLosCamposLlenos = false;
                mensajeError += 'Introduce un correo electrónico válido. <br>';
            }

            // Validación de número de teléfono
            var regexTelefono = /^[0-9]{7,10}$/; // Ajusta según necesidad
            if (!regexTelefono.test(telefono.value)) {
                telefono.style.borderColor = 'red';
                todosLosCamposLlenos = false;
                mensajeError += 'Introduce un número de teléfono válido. <br>';
            }

            // Validación de fechas
            var fechaCheckin = new Date(checkin.value);
            var fechaCheckout = new Date(checkout.value);
            if (fechaCheckin >= fechaCheckout) {
                checkin.style.borderColor = 'red';
                checkout.style.borderColor = 'red';
                todosLosCamposLlenos = false;
                mensajeError += 'La fecha de check-out debe ser posterior a la fecha de check-in. <br>';
            }

            // Validación para 'checkin'
            if (checkin.value.trim() === '') {
                checkin.style.borderColor = 'red';
                todosLosCamposLlenos = false;
                mensajeError += 'Introduce la fecha de check-in. <br>';
            }

            // Validación para 'checkout'
            if (checkout.value.trim() === '') {
                checkout.style.borderColor = 'red';
                todosLosCamposLlenos = false;
                mensajeError += 'Introduce la fecha de check-out. <br>';
            } 


            // Verificación de términos y condiciones
            if (!terminosAceptados) {
                todosLosCamposLlenos = false;
                mensajeError += 'Debes aceptar los términos y condiciones para proceder. <br>';
            }

            // Si no todos los campos están llenos o los términos no están aceptados, actualiza y muestra el modal
            if (!todosLosCamposLlenos) {
                var elementoMensajeError = document.getElementById('mensajeErrorModal');
                elementoMensajeError.innerHTML = mensajeError; // Actualiza el mensaje del modal
                $('#modalValidacion').modal('show'); // Muestra el modal con el mensaje actualizado
            } else {

                console.log('Formulario validado correctamente. Procesando...');
                $.ajax({
                    type: "POST",
                    url: "servidor.php",
                    data: $("#formularioReserva").serialize(),
                    success: function(response) {
                        // Mostrar mensaje de éxito o manejar la respuesta como necesites
                        console.log(response); // Por ejemplo, loguear la respuesta del servidor
                        alert("Reserva realizada con éxito!");
                        
                        // Redirigir a la página principal
                        window.location.href = "/Apartado1/Apartado1-Seccion1.php"; 
                    },
                    error: function() {
                        // Manejo de errores
                        alert("Ocurrió un error al procesar la reserva.");
                    }
                });

            }

        }


    </script>
</body>
</html>
