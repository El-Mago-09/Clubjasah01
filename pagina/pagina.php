<?php
session_start();
include("../inicio sesion/conexion_sql.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../inicio sesion/secion/login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$query = "SELECT p.nombre, p.apellido, p.correo, p.tipo_usuario_id, tu.nombre AS tipo_usuario, p.foto_perfil, p.telefono, p.nacimiento
          FROM persona p
          JOIN usuario u ON p.cedula = u.cedula
          JOIN tipo_usuario tu ON p.tipo_usuario_id = tu.id
          WHERE u.id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $telefono = $row['telefono'];
    $nacimiento = $row['nacimiento'];
    $correo = $row['correo'];
    $tipo_usuario = $row['tipo_usuario'];
    $tipo_usuario_id = $row['tipo_usuario_id'];
    $foto_perfil = !empty($row['foto_perfil']) && file_exists($row['foto_perfil']) ? $row['foto_perfil'] : '../assets/imagen/imagen_perfil/perfil.jpg';
} else {
    echo "<script>alert('Error: Usuario no encontrado.'); window.location.href = '../inicio sesion/secion/login.php';</script>";
    exit();
}
$stmt->close();
// Obtener tarjetas según tipo de usuario
$query_tarjetas = ($tipo_usuario_id == 1) ?
    "SELECT id, nombre, color, descripcion FROM tarjetas" :
    "SELECT t.id, t.nombre, t.color, t.descripcion
     FROM tarjetas t
     JOIN tipo_usuario_tarjetas tut ON t.id = tut.tarjeta_id
     WHERE tut.tipo_usuario_id = ?";

$stmt_tarjetas = $conn->prepare($query_tarjetas);
if ($tipo_usuario_id != 1) {
    $stmt_tarjetas->bind_param("i", $tipo_usuario_id);
}
$stmt_tarjetas->execute();
$result_tarjetas = $stmt_tarjetas->get_result();
$tarjetas = $result_tarjetas->fetch_all(MYSQLI_ASSOC);
$stmt_tarjetas->close();
// Obtener tipos de usuario para el formulario de registro
$query_tipos_usuario = "SELECT id, nombre FROM tipo_usuario";
$result_tipos_usuario = $conn->query($query_tipos_usuario);

$tipos_usuario = [];
while ($row = $result_tipos_usuario->fetch_assoc()) {
    $tipos_usuario[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Dashboard</title>
    <link rel="short icon" href="../assets/imagen/fondo.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/pagina.css">
    <style>
        body {
    overflow-x: hidden;
}

/* Contenedor principal con flexbox */
#wrapper {
    display: flex;
}

/* Barra lateral fija */
#sidebar-wrapper {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #343a40;
    padding: 20px;
    color: white;
    z-index: 1000; /* Se mantiene por debajo del navbar */
}

/* Contenido principal con margen para evitar solapamiento */
#page-content-wrapper {
    flex-grow: 1;
    margin-left: 250px; /* Ajustar espacio de la barra lateral */
    padding: 20px;
    width: calc(100% - 250px); /* Evita que se solape con la barra lateral */
}

/* Navbar siempre visible en la parte superior */
.navbar {
    z-index: 1050; /* Asegura que la barra de navegación esté por encima */
}
#sidebar-wrapper .card {
    display: flex;
    flex-direction: column;
    align-items: center; /* Esto centra el contenido en el eje horizontal */
    justify-content: center; /* Esto centra el contenido en el eje vertical */
}

#sidebar-wrapper .card img {
    margin-bottom: 15px; /* Esto ajusta el espacio entre la imagen y el nombre */
    width: 100px; /* Puedes ajustar el tamaño según sea necesario */
    height: 100px; /* Para asegurarte que sea una imagen cuadrada */
    object-fit: cover; /* Esto asegura que la imagen no se distorsione */
}
    </style>
</head>
<body>
<div id="sidebar-wrapper">
    <div class="card bg-dark text-white shadow-lg p-3 text-center">
        <img src="<?= htmlspecialchars($foto_perfil) ?>" alt="Foto de perfil" class="rounded-circle mb-3" width="100">
        <h4 class="card-title mb-1"><?= htmlspecialchars($nombre) . ' ' . htmlspecialchars($apellido) ?></h4>
        <p class="card-text"><i class="bi bi-envelope"></i> <?= htmlspecialchars($correo) ?></p>
        <p class="card-text"><i class="bi bi-phone"></i> Teléfono: <?= htmlspecialchars($telefono) ?></p>
        <p class="card-text"><i class="bi bi-calendar"></i> Nacimiento: <?= htmlspecialchars($nacimiento) ?></p>
        <p class="card-text text-muted">@<?= htmlspecialchars($tipo_usuario) ?></p>
        <a href="../inicio sesion/logout/logout.php" class="btn btn-danger btn-sm mt-3">
            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
        </a>
    </div>
</div>
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary mb-4">
        <div class="container-fluid">
            <h3 class="text-white">Panel de Control</h3>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php foreach ($tarjetas as $tarjeta) { ?>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card <?= htmlspecialchars($tarjeta['color']) ?> text-white p-3" data-bs-toggle="modal" data-bs-target="#modal<?= $tarjeta['id'] ?>">
                        <h5><?= htmlspecialchars($tarjeta['nombre']) ?></h5>
                        <p><?= htmlspecialchars($tarjeta['descripcion']) ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<!-- Modales -->
<?php foreach ($tarjetas as $tarjeta) { ?>
    <div class="modal fade" id="modal<?= $tarjeta['id'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= htmlspecialchars($tarjeta['nombre']) ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><?= htmlspecialchars($tarjeta['descripcion']) ?></p>
                </div>
                <div class="modal-footer">
                    <?php if ($tarjeta['nombre'] === "Cerrar Sesión") { ?>
                        <a href="../inicio sesion/logout/logout.php" class="btn btn-danger">Cerrar Sesión</a>
                    <?php } ?>
                    <?php if ($tarjeta['nombre'] === "Registro de Reclutas") { ?>
                        <form action="../inicio sesion/control_register.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="nacimiento" name="nacimiento" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
                                <select class="form-select" id="tipoUsuario" name="tipoUsuario" required>
                                    <option value="">Selecciona un tipo</option>
                                    <?php foreach ($tipos_usuario as $tipo) {
                                        echo "<option value='" . htmlspecialchars($tipo['id']) . "'>" . htmlspecialchars($tipo['nombre']) . "</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto de Perfil</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                                <br>
                                <img id="preview" src="../assets/imagen/imagen_perfil/perfil.jpg" alt="Foto" width="100" height="100">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const submitButton = form.querySelector("button[type='submit']");

    form.addEventListener("submit", function() {
        submitButton.disabled = true;
        submitButton.innerText = "Registrando...";
    });
});
</script>
</body>
</html>