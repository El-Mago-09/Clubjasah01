<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="short icon" href="../../assets/imagen/fondo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/styles/login.css"> <!-- Tu CSS personalizado -->
</head>
<body>

    <div class="login-container">
        <h2>Iniciar Sesión</h2>

        <form action="../control_login.php" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingrese su usuario" required>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" id="contrasena" name="cedula" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100">Iniciar Sesión</button>

            <div class="error-message">
                
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
