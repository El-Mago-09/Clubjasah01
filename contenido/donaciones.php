<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donaciones - Club Jasah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://www.paypal.com/sdk/js?client-id=Aeptt9iTPod0sMGm0ojVBIguqHSJanpJBZbfehvVDvfbMm6XcutlnNPBo6nCsbL8joLlh9brL2EkJFos&currency=USD"></script>
    <style>
        /* Estilos responsivos */
        .header {
            background: url('../assets/imagen/21.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }
        /* Sección de donaciones */
        #donar {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 50px;
        }
         /* Botón de PayPal */
         #paypal-button-container {
            width: 50%;
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .conter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: rgb(139, 139, 139);
            border-radius: 1rem;
            padding: 20px;
        }

        .conter .img {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 50%;
        }

        .conter .img img {
            width: 100%;
            border-radius: 1rem;
        }

        .conter .form {
            flex: 1;
            padding: 20px;
            max-width: 50%;
        }

        @media (max-width: 768px) {
            .conter {
                flex-direction: column;
            }
            .conter .img, .conter .form {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html">Club Jasah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../contenido/actividades.html">Actividades</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contenido/contacto.html">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contenido/nosotros.html">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="../inicio sesion/secion/login.php">¿Ya eres miembro?</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <header class="header">
        <div>
            <h1>Club de Conquistadores Jasah</h1>
        </div>
    </header>
    
    <section class="text-center py-4 bg-light">
        <h2>"Todo lo puedo en Cristo que me fortalece" - Filipenses 4:13</h2>
        <p>Somos un club comprometido con la formación de valores y el servicio a la comunidad.</p>
    </section>
    
    <section id="donar" class="container text-center my-5">
        <h2>Realiza tu donación</h2>
        <p>Tu apoyo nos ayuda a seguir creciendo y sirviendo.</p>
        <div id="paypal-button-container"></div>
    </section>
    
    <section id="contacto" class="container conter my-5">
        <div class="img">
            <img src="../assets/imagen/fondo.jpg" alt="foto">
        </div>
        <div class="form"> 
            <h2 class="text-center">Contáctanos</h2>
            <p class="text-center">Si deseas colaborar con nosotros, escríbenos:</p>
            <form action="control_apoyo/from_apoyo.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" name="mensaje" id="mensaje" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>
    
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Club Jasah. Todos los derechos reservados.</p>
    </footer>
    
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00' 
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Gracias por tu donación, ' + details.payer.name.given_name + '!');
                });
            },
            style: {
                layout: 'vertical',
                color: 'blue',
                shape: 'rect',
                label: 'pay',
                height: 40,
                tagline: false,
                fundingicons: false
            }
        }).render('#paypal-button-container');
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
