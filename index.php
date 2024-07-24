<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Infosalud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./u.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/salud1.png">
    <style>
        .contact-info {
            text-align: left;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            width: 300px; /* Ajusta el ancho del contenedor de la información de contacto */
        }
        .contact-info h3, .contact-info p {
            margin: 0;
            font-size: 1rem;
        }
        .map-container {
            width: 300px; /* Ajusta el tamaño del contenedor del mapa */
            height: 300px; /* Ajusta la altura del contenedor del mapa */
            overflow: hidden;
            position: relative;
            margin-bottom: 20px;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            position: relative;
            top: -60px; /* Ajusta la posición del mapa para ocultar el correo */
        }
        .left-container {
            display: inline-block;
            vertical-align: top;
        }
        .welcome-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .welcome-image {
            max-width: 600px; /* Ajusta el tamaño máximo de la imagen */
            height: auto;
            transition: transform 0.2s;
        }
        .welcome-image:hover {
            transform: scale(1.05); /* Efecto de agrandar imagen al pasar el cursor */
        }
        .image-container {
            text-align: center;
        }
        .carousel-inner img {
            max-height: 500px; /* Ajusta el tamaño máximo de la imagen del carrusel */
            object-fit: cover; /* Mantiene la proporción de la imagen */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="./img/1.png" alt="Logo" width="300px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="acercade.php">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./municipios/quibdo.php">Hospitales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><img src="./icon/th.jpg" alt="" width="20px"> Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/2.webp" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="./img/6.webp" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="./img/5.webp" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="welcome-box p-4">
                    <h2>Bienvenido a Infosalud</h2>
                    <p>Por favor, ingrese sus datos personales para iniciar sesión y acceder a todas las funciones del sitio.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="image-container">
                    <img src="./img/ips.png" alt="Imagen de Bienvenida" class="welcome-image">
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center mt-5">
        <h2>Sitio Web Infosalud</h2>
        <p>Bienvenidos a mi sitio web donde encontrarán todos los centros hospitalarios del departamento del Chocó.</p>
    </div>

    <main class="container mt-5">
        <section class="destacado">
            <h2>Servicios Destacados</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="./img/2.webp" class="card-img-top" alt="Consulta Médica">
                        <div class="card-body">
                            <h5 class="card-title">Consulta Médica</h5>
                            <p class="card-text">Accede a consultas médicas especializadas en nuestro sitio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="./img/7.webp" class="card-img-top" alt="Laboratorio Clínico">
                        <div class="card-body">
                            <h5 class="card-title">Laboratorio Clínico</h5>
                            <p class="card-text">Realiza tus exámenes de laboratorio con resultados confiables.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="./img/8.webp" class="card-img-top" alt="Emergencias">
                        <div class="card-body">
                            <h5 class="card-title">Emergencias</h5>
                            <p class="card-text">Servicio de emergencias disponible las 24 horas del día.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <div class="container mt-5">
        <div class="left-container">
            <div class="contact-info">
                <h3>Dirección: Calle Falsa 123</h3>
                <p>Correo: contacto@infosalud.com</p>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/d/embed?mid=1qTyAnYtD7AFXjJ9bPM-HXuIEAGgaqbM&ehbc=2E312F"></iframe>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2024 Infosalud</p>
        <div class="redes-sociales">
            <a href="https://www.facebook.com/"><img src="./icon/fa1.png" alt="Facebook" width="20px"></a>
            <a href="https://www.whatsapp.com/"><img src="./icon/whap1.png" alt="WhatsApp" width="20px"></a>
            <a href="https://www.instagram.com/"><img src="./icon/inta1.png" alt="Instagram" width="20px"></a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
