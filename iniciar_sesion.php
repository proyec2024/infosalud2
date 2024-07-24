<?php
// Inicia la sesión
session_start();

// Verifica si ya hay una sesión activa
if (isset($_SESSION['usuario'])) {
    // Redirige al usuario si ya está autenticado
    header("Location: infosalud.php");
    exit();
}

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["iniciar_sesion"])) {
    // Credenciales de la base de datos
    $hostname = "localhost"; // Cambia a la dirección del servidor si es diferente
    $username = "root"; // Reemplaza con tu nombre de usuario de la base de datos
    $password = ""; // Reemplaza con tu contraseña de la base de datos
    $database = "juanproleo"; // Reemplaza con el nombre de tu base de datos

    // Crear una conexión a la base de datos
    $mysqli = new mysqli($hostname, $username, $password, $database);

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
    }

    // Recupera los valores del formulario
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    // Escapa los valores para evitar inyección de SQL
    $usuario = $mysqli->real_escape_string($usuario);

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($clave, $row['clave'])) {
            // Autenticación exitosa: Inicia la sesión
            $_SESSION['usuario'] = $usuario;

            // Redirige al usuario a la página de bienvenida después de 3 segundos
            echo "<div id='welcome-message' style='text-align: center; padding: 20px; font-size: 24px; color: black;'>
                    Bienvenido, $usuario. 
                  </div>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'infosalud.php';
                    }, 3000);
                  </script>";
        } else {
            // Las credenciales son incorrectas
            echo "<div id='error-message' style='text-align: center; padding: 20px; font-size: 24px; color: red;'>
                    Usuario o contraseña incorrectos.
                  </div>";
        }
    } 

    // Cierra la conexión a la base de datos
    $mysqli->close();
}
?>
