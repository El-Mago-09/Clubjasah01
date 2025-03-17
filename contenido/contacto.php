<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Club JASAH</title>
    <link rel="short icon" href="../assets/imagen/fondo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
        }
        .section-title {
            padding: 10px;
            text-align: center;
            margin-bottom: 30px;
        }
        .section-title h2 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }
        .contact-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        .contact-card i {
            font-size: 2em;
            color: #007bff;
        }
        .contact-card p {
            font-size: 1.1em;
            color: #555;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .map-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html">Club JASAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="actividades.php">Actividades</a></li>
                    <li class="nav-item"><a class="nav-link" href="../inicio sesion/secion/login.php">¿Ya eres miembro?</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de contacto -->
    <div class="container mt-5">
        <div class="section-title">
            <h2>Contáctanos</h2>
            <p>Estamos aquí para ayudarte. Llena el formulario y te responderemos lo más pronto posible.</p>
        </div>

        <!-- Detalles de contacto -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-card text-center">
                    <i class="bi bi-telephone-fill"></i>
                    <h5>Teléfono</h5>
                    <p>+1 (234) 567-890</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-card text-center">
                    <i class="bi bi-envelope-fill"></i>
                    <h5>Correo Electrónico</h5>
                    <p>contacto@clubjasah.com</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="contact-card text-center">
                    <i class="bi bi-geo-alt-fill"></i>
                    <h5>Dirección</h5>
                    <p>123 Calle Principal, Ciudad, País</p>
                </div>
            </div>
        </div>

        <!-- Formulario de contacto -->
        <div class="row">
            <div class="col-12">
                <div class="card contact-card">
                    <h3 class="text-center">Envíanos un mensaje</h3>
                    <form id="contactForm" action="procesar_contacto.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre Completo</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Tu correo" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Tu mensaje..." required></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mapa de ubicación -->
    <div class="container map-container">
        <h3 class="text-center">Encuentra nuestra ubicación</h3>
        <div class="row">
            <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.487370263649!2d-77.0368700846792!3d38.89767627758991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b56f7f8cc15f%3A0x7ac3ca4c1d77e2f!2sWhite+House!5e0!3m2!1ses!2sus!4v1655517309229!5m2!1ses!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2025 Club JASAH. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
