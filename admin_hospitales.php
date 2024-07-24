<?php
include 'db.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

// Consultar todos los hospitales
$sql = "SELECT * FROM hospitales";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Hospitales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Administrar Hospitales</h1>
        <a href="add_hospital.php" class="btn btn-primary mb-3">Agregar Hospital</a>
        <div class="list-group">
            <?php while ($hospital = $result->fetch_assoc()): ?>
                <div class="list-group-item">
                    <h5><?php echo htmlspecialchars($hospital['nombre']); ?></h5>
                    <p><?php echo htmlspecialchars($hospital['descripcion']); ?></p>
                    <p><strong>Dirección:</strong> <?php echo htmlspecialchars($hospital['direccion']); ?></p>
                    <p><img src="<?php echo htmlspecialchars($hospital['imagen']); ?>" alt="<?php echo htmlspecialchars($hospital['nombre']); ?>" style="max-width: 150px; height: auto;"></p>
                    <a href="edit_hospital.php?id=<?php echo $hospital['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="delete_hospital.php?id=<?php echo $hospital['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este hospital?');">Eliminar</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
