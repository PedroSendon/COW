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
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="card-title">Iniciar Sesión</h3>
                    </div>
                    <div class="card-body">
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            Usuario no encontrado.
                        </div>
                    <?php endif; ?>
                        <form id="loginForm" action="LogInServidor.php" method="post" onsubmit="return validarFormulario();">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasenya" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasenya" name="contrasenya" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function validarFormulario() {
    var usuario = document.getElementById('usuario').value.trim();
    var contrasenya = document.getElementById('contrasenya').value.trim();
    
    if (usuario === "" || contrasenya === "") {
        alert('Por favor, rellene todos los campos para iniciar sesión.');
        return false;
    }
    return true;
}
</script>
</body>
</html>