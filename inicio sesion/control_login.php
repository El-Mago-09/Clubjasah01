<?php
// CONTROLADOR DE LOGIN (control_login.php)

session_start();
include 'conexion_sql.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["cedula"])) {
        $usuario = trim($_POST["usuario"]);
        $cedula = trim($_POST["cedula"]);

        // 1️⃣ Verificar si la persona está registrada
        $verificarPersona = $conn->prepare("SELECT cedula FROM persona WHERE cedula = ?");
        $verificarPersona->bind_param("s", $cedula);
        $verificarPersona->execute();
        $verificarPersona->store_result();

        if ($verificarPersona->num_rows > 0) {
            // 2️⃣ Verificar si tiene un usuario registrado con la misma cédula
            $verificarUsuario = $conn->prepare("SELECT id, usuario FROM usuario WHERE cedula = ? AND usuario = ?");
            $verificarUsuario->bind_param("ss", $cedula, $usuario);
            $verificarUsuario->execute();
            $verificarUsuario->store_result();

            if ($verificarUsuario->num_rows > 0) {
                // 3️⃣ Obtener el ID correctamente
                $verificarUsuario->bind_result($usuario_id, $usuario);
                $verificarUsuario->fetch();
                
                // Guardamos en la sesión
                $_SESSION["usuario_id"] = $usuario_id;
                $_SESSION["usuario"] = $usuario;

                echo '<script>
                alert("Inicio de sesión exitoso. Bienvenido, ' . $usuario . '");
                window.location.href = "../pagina/pagina.php";
                </script>';
            } else {
                echo '<script>
                alert("El usuario no está registrado en el sistema.");
                window.location.href = "secion/login.php";
                </script>';
            }
            $verificarUsuario->close();
        } else {
            echo '<script>
            alert("La cédula no está registrada en la base de datos.");
            window.location.href = "secion/login.php";
            </script>';
        }
        $verificarPersona->close();
    } else {
        echo '<script>
        alert("Por favor, completa todos los campos.");
        window.location.href = "secion/login.php";
        </script>';
    }
} else {
    echo '<script>
    alert("Acceso no autorizado.");
    window.location.href = "secion/login.php";
    </script>';
}
$conn->close();