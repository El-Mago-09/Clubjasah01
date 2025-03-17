<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades - Club JASAH</title>
    <link rel="short icon" href="../assets/imagen/fondo.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .hero {
            background: url('../assets/imagen/5.jpg') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
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
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="../inicio sesion/secion/login.php">¿Ya eres miembro?</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="hero">Nuestras Actividades</div>
    <div class="container my-5">
        <h2 class="text-center mb-4">Descubre lo que tenemos para ti</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/imagen/deporte.jpg" class="card-img-top" alt="Deportes">
                    <div class="card-body">
                        <h5 class="card-title">Deportes</h5>
                        <p class="card-text">Únete a nuestras actividades deportivas y mantente en forma.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/imagen/2.jpg" class="card-img-top" alt="Voluntariado">
                    <div class="card-body">
                        <h5 class="card-title">Voluntariado</h5>
                        <p class="card-text">Participa en actividades solidarias y ayuda a la comunidad.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/imagen/recreacion.jpg" class="card-img-top" alt="Recreación">
                    <div class="card-body">
                        <h5 class="card-title">Recreación</h5>
                        <p class="card-text">Disfruta de eventos sociales y actividades de entretenimiento.</p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center mt-5">Galería de Eventos</h3>
        <div class="row gallery mt-3">
            <div class="col-md-3"><img src="../assets/imagen/evento1.jpg" alt="Evento 1"></div>
            <div class="col-md-3"><img src="../assets/imagen/evento2.jpg" alt="Evento 2"></div>
            <div class="col-md-3"><img src="../assets/imagen/evento3.jpg" alt="Evento 3"></div>
            <div class="col-md-3"><img src="../assets/imagen/evento4.jpg" alt="Evento 4"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

