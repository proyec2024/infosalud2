<?php
include 'db.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

$id = $_GET['id'];
$sql = "SELECT * FROM hospitales WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Hospital no encontrado.");
}

$hospital = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $direccion = $_POST['direccion'];
    $imagen = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $old_imagen = $_POST['old_imagen'];
    $imagen_path = $old_imagen;

    if ($imagen) {
        // Mover la nueva imagen al directorio de uploads
        $imagen_path = 'uploads/' . basename($imagen);
        if (move_uploaded_file($imagen_tmp, $imagen_path)) {
            // Eliminar la imagen antigua
            if (file_exists($old_imagen)) {
                unlink($old_imagen);
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al subir la imagen.</div>";
        }
    }

    $sql = "UPDATE hospitales SET nombre=?, descripcion=?, direccion=?, imagen=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nombre, $descripcion, $direccion, $imagen_path, $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'>Hospital actualizado con éxito.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Hospital</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Hospital</h1>
        <form action="edit_hospital.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($hospital['id']); ?>">
            <input type="hidden" name="old_imagen" value="<?php echo htmlspecialchars($hospital['imagen']); ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($hospital['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo htmlspecialchars($hospital['descripcion']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo htmlspecialchars($hospital['direccion']); ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
                <img src="<?php echo htmlspecialchars($hospital['imagen']); ?>" alt="<?php echo htmlspecialchars($hospital['nombre']); ?>" style="max-width: 150px; height: auto;">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
