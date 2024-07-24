<?php
// Conectar a la base de datos
include 'db.php'; // Ajusta la ruta si es necesario

// Verifica la conexión
if (!$conn) {
    die("Error: " . mysqli_connect_error());
}

// Recoger datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Escapar datos para prevenir SQL Injection
$usuario = $conn->real_escape_string($usuario);
$clave = $conn->real_escape_string($clave);

// Encriptar la clave antes de almacenarla
$clave = password_hash($clave, PASSWORD_DEFAULT);

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (usuario, clave) VALUES ('$usuario', '$clave')";

if ($conn->query($sql) === TRUE) {
    // Mostrar mensaje de registro exitoso
    $mensaje = "Registro exitoso. Redirigiendo a la página de inicio de sesión...";
    $redirect = "login.php";
} else {
    $mensaje = "Error: " . $conn->error;
    $redirect = ""; // No redirige si hay un error
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .alert {
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-<?php echo ($redirect ? 'success' : 'danger'); ?>" role="alert">
            <?php echo $mensaje; ?>
        </div>
        <?php if ($redirect): ?>
            <meta http-equiv="refresh" content="3;url=<?php echo htmlspecialchars($redirect); ?>">
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
