<?php
include 'conexion_sql.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["cedula"], $_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["tipoUsuario"], $_POST["telefono"], $_POST["nacimiento"]) &&
        !empty($_POST["cedula"]) && !empty($_POST["nombre"]) && 
        !empty($_POST["apellido"]) && !empty($_POST["correo"]) && !empty($_POST["tipoUsuario"]) &&
        !empty($_POST["telefono"]) && !empty($_POST["nacimiento"])
    ) {
        $cedula = trim($_POST["cedula"]);
        $nombre = trim($_POST["nombre"]);
        $apellido = trim($_POST["apellido"]);
        $telefono = trim($_POST["telefono"]);
        $nacimiento = trim($_POST["nacimiento"]);
        $correo = trim($_POST["correo"]);
        $tipoUsuario = intval($_POST["tipoUsuario"]);
        $fotoRuta = "../assets/imagen/imagen_perfil/default.png"; // Imagen por defecto

        // 1️⃣ **Verificar si la cédula ya existe en persona**
        $verificarCedula = $conn->prepare("SELECT id FROM persona WHERE cedula = ?");
        $verificarCedula->bind_param("s", $cedula);
        $verificarCedula->execute();
        $verificarCedula->store_result();

        if ($verificarCedula->num_rows > 0) {
            echo '<script>alert("La cédula ya existe. Intenta con otra."); window.location.href = "../../pagina/pagina.php";</script>';
            exit();
        }
        $verificarCedula->close();

        // 2️⃣ **Procesar imagen si se subió**
        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
            $directorio = "../assets/imagen/imagen_perfil/";
            $extension = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
            $nombreArchivo = "perfil_" . time() . "_" . uniqid() . "." . $extension;
            $fotoRuta = $directorio . $nombreArchivo;

            $formatosPermitidos = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($extension, $formatosPermitidos)) {
                echo '<script>alert("Formato de imagen no válido. Usa JPG, JPEG, PNG o GIF."); window.location.href = "../../pagina/pagina.php";</script>';
                exit();
            }

            if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $fotoRuta)) {
                echo '<script>alert("Error al subir la imagen."); window.location.href = "../pagina/pagina.php";</script>';
                exit();
            }
        }

        // 3️⃣ **Usar transacción para insertar datos**
        $conn->begin_transaction();

        try {
            // Insertar en persona
            $insertarPersona = $conn->prepare("INSERT INTO persona (cedula, nombre, apellido, telefono, nacimiento, correo, tipo_usuario_id, foto_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $insertarPersona->bind_param("ssssssss", $cedula, $nombre, $apellido, $telefono, $nacimiento, $correo, $tipoUsuario, $fotoRuta);

            if (!$insertarPersona->execute()) {
                throw new Exception("Error al registrar la persona: " . $insertarPersona->error);
            }

            // Obtener el ID de la persona recién insertada
            $persona_id = $conn->insert_id;
            $insertarPersona->close();

            // Generar usuario y encriptar contraseña
            $usuario = strtolower($nombre);
            $contraseña = hash('sha256', $cedula);

            // Insertar en usuario usando persona_id
            $insertarUsuario = $conn->prepare("INSERT INTO usuario (usuario, contraseña, cedula, persona_id) VALUES (?, ?, ?, ?)");
            $insertarUsuario->bind_param("sssi", $usuario, $contraseña, $cedula, $persona_id);

            if (!$insertarUsuario->execute()) {
                throw new Exception("Error al crear el usuario: " . $insertarUsuario->error);
            }
            $insertarUsuario->close();

            // Confirmar la transacción
            $conn->commit();

            echo '<script>alert("Registro exitoso."); window.location.href = "../pagina/pagina.php";</script>';
        } catch (Exception $e) {
            $conn->rollback();
            echo '<script>alert("Error en el registro: ' . $e->getMessage() . '"); window.location.href = "../pagina/pagina.php";</script>';
        }

        $conn->close();
    } else {
        echo '<script>alert("Por favor, completa todos los campos."); window.location.href = "../pagina/pagina.php";</script>';
    }
} else {
    echo '<script>alert("Acceso no autorizado."); window.location.href = "../pagina/pagina.php";</script>';
}
?>
