<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - Club Jasah</title>
    <link rel="short icon" href="../assets/imagen/fondo.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .hero {
            background: url('../assets/imagen/21.jpg') no-repeat center center/cover;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(43, 43, 43, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
        }
        .galeria img {
            width: 100%;
            height: 250px;
            object-fit: cover;
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
                    <li class="nav-item"><a class="nav-link" href="actividades.php">Actividades</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="../inicio sesion/secion/login.php">¿Ya eres miembro?</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="hero">
        <h1 data-aos="fade-down">Sobre Nosotros</h1>
        <p data-aos="fade-up">Descubre nuestra historia, misión y valores</p>
    </header>

    <div class="container mt-5">
        <section class="row align-items-center mb-5" data-aos="fade-right">
            <div class="col-md-6">
                <h2>Misión</h2>
                <p>Nuestra misión es guiar y formar a jóvenes a través de actividades recreativas, formativas y espirituales que fomenten el liderazgo y el servicio.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="../assets/imagen/20.jpg" class="img-fluid rounded" alt="Misión">
            </div>
        </section>

        <section class="row align-items-center mb-5" data-aos="fade-left">
            <div class="col-md-6 text-center">
                <img src="../assets/imagen/13.jpg" class="img-fluid rounded" alt="Visión">
            </div>
            <div class="col-md-6">
                <h2>Visión</h2>
                <p>Ser un club reconocido por su impacto positivo en la comunidad, formando líderes comprometidos con el servicio y el crecimiento personal.</p>
            </div>
        </section>

        <section class="text-center mb-5" data-aos="fade-up">
            <h2>Nuestros Valores</h2>
            <p>Nos basamos en principios como la honestidad, el compañerismo, la responsabilidad y el servicio a la comunidad.</p>
        </section>

        <section class="text-center mb-5" data-aos="zoom-in">
            <h2>Galería</h2>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/imagen/5.jpg" class="d-block w-100" alt="Imagen 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/imagen/6.jpg" class="d-block w-100" alt="Imagen 2">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/imagen/18.jpg" class="d-block w-100" alt="Imagen 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
            
        </section>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
