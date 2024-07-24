<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/salud1.png">
    <style>
        body {
            background-image: url(./img/ll.webp);
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            max-width: 800px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .container.hidden {
            opacity: 0;
            transform: translateY(20px);
        }
        .form-container, .image-container {
            padding: 20px;
            width: 50%;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        label {
            color: #343a40;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            color: #007bff;
            margin-top: 10px;
        }
        .image-container img {
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container" id="register-container">
        <div class="form-container" id="register-form">
            <h2>Registro de Usuario</h2>
            <form action="./registro.php" method="post">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="clave">Clave:</label>
                    <input type="password" class="form-control" id="clave" name="clave" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Registro de Usuario">
                </div>
                <a href="#" onclick="toggleForms()">Inicio de Sesión</a>
            </form>
        </div>
        <div class="image-container">
            <img src="./img/ips.png" alt="Imagen de presentación">
        </div>
    </div>

    <script>
        function toggleForms() {
            document.getElementById('register-container').classList.add('hidden');
            setTimeout(() => {
                window.location.href = './login.php';
            }, 500);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
