<?php
include 'db.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

$id = $_GET['id'];
$sql = "SELECT imagen FROM hospitales WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Hospital no encontrado.");
}

$hospital = $result->fetch_assoc();
$imagen_path = $hospital['imagen'];

$sql = "DELETE FROM hospitales WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if (file_exists($imagen_path)) {
        unlink($imagen_path);
    }
    echo "<div class='alert alert-success' role='alert'>Hospital eliminado con éxito.</div>";
} else {
    echo "<div class='alert alert-danger' role='alert'>Error: " . htmlspecialchars($stmt->error) . "</div>";
}

$stmt->close();
$conn->close();
?>
<a href="admin_hospitales.php" class="btn btn-primary">Regresar</a>
