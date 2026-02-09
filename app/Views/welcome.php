<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeMovies | Explora Películas y Series</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;800&family=Oswald:wght@700&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css'); /* Iconos */

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: #1a1a2e; /* Color oscuro base para el tema cine */
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Fondo animado de estrellas/partículas */
        .stars-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100" opacity="0.1"><circle cx="10" cy="10" r="1" fill="white"/><circle cx="30" cy="20" r="0.8" fill="white"/><circle cx="50" cy="5" r="1.2" fill="white"/><circle cx="70" cy="15" r="0.9" fill="white"/><circle cx="90" cy="30" r="1.1" fill="white"/><circle cx="20" cy="40" r="0.7" fill="white"/><circle cx="40" cy="60" r="1.3" fill="white"/><circle cx="60" cy="80" r="0.8" fill="white"/><circle cx="80" cy="95" r="1" fill="white"/><circle cx="5" cy="70" r="1.1" fill="white"/></svg>') repeat;
            animation: moveStars 60s linear infinite;
            z-index: -1;
            filter: blur(0.5px);
        }

        @keyframes moveStars {
            from { background-position: 0 0; }
            to { background-position: 100vw 100vh; }
        }

        /* Degradado oscuro superpuesto */
        .dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(26, 26, 46, 0.8) 0%, rgba(26, 26, 46, 1) 100%);
            z-index: -1;
        }

        .main-card {
            position: relative;
            background: rgba(255, 255, 255, 0.05); /* Cristal más oscuro */
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 25px; /* Bordes ligeramente más suaves */
            padding: 3.5rem;
            max-width: 850px; /* Más ancho para el contenido de cine */
            width: 90%;
            text-align: center;
            backdrop-filter: blur(30px); /* Desenfoque más intenso */
            box-shadow: 0 20px 60px rgba(0,0,0,0.6); /* Sombra más pronunciada */
            animation: fadeIn 1.2s ease-out;
            transform-style: preserve-3d; /* Para efecto 3D en hover */
            transition: transform 0.5s ease-out;
        }
        
        .main-card:hover {
            transform: perspective(1000px) rotateY(5deg) rotateX(2deg) scale(1.02); /* Ligero efecto 3D */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.08);
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ccc;
            letter-spacing: 0.5px;
        }

        h1 {
            font-family: 'Oswald', sans-serif; /* Título impactante */
            font-size: 5rem; /* Más grande */
            font-weight: 700;
            line-height: 1;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #e6b300, #ffcc33, #e6b300); /* Gradiente dorado/cinemático */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 15px rgba(255, 204, 51, 0.4); /* Brillo sutil */
        }
        h1 span {
            color: #fff; /* "Cine" en blanco */
            -webkit-text-fill-color: white;
            text-shadow: none;
        }

        p {
            font-size: 1.3rem; /* Más legible */
            color: #a0a0b0;
            margin-bottom: 3rem;
            line-height: 1.7;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Botones Premium con Efecto de Cine */
        .btn-container {
            display: flex;
            gap: 1.8rem; /* Espacio entre botones */
            justify-content: center;
            flex-wrap: wrap; /* Para pantallas pequeñas */
        }

        .btn-cinema {
            position: relative;
            padding: 18px 45px;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            border-radius: 12px; /* Más angulares */
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); /* Transición más suave */
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-transform: uppercase;
            overflow: hidden; /* Para el efecto de brillo */
        }

        /* Efecto de Brillo en Hover */
        .btn-cinema::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .btn-cinema:hover::before {
            left: 100%;
        }

        /* Botón Iniciar Sesión (Dorado/Destacado) */
        .btn-login {
            background: linear-gradient(45deg, #e6b300, #ffcc33); /* Gradiente dorado */
            color: #1a1a2e; /* Texto oscuro */
            border: none;
            box-shadow: 0 10px 30px rgba(255, 204, 51, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 40px rgba(255, 204, 51, 0.5);
        }

        /* Botón Registrarse (Contorno Glaseado) */
        .btn-register {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        }

        .btn-register:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Detalles adicionales (Iconos de cine) */
        .icon-large { font-size: 1.5rem; }
    </style>
</head>
<body>

    <div class="stars-bg"></div>
    <div class="dark-overlay"></div>

    <div class="main-card">
        <div class="badge">
            <i class="fas fa-ticket-alt"></i> Tu Próxima Aventura Cinematográfica
        </div>
        
        <h1>Bienvenido a <span style="background: none; -webkit-background-clip: unset; -webkit-text-fill-color: unset;">Code</span>Movies</h1>
        
        <p>Explora un vasto universo de películas y series. Descubre novedades, guarda tus favoritas y accede a información detallada al instante.</p>
        
        <div class="btn-container">
            <a href="<?= base_url('login') ?>" class="btn-cinema btn-login">
                <i class="fas fa-sign-in-alt icon-large"></i>
                Iniciar Sesión
            </a>
            <a href="<?= base_url('registro') ?>" class="btn-cinema btn-register">
                <i class="fas fa-user-plus icon-large"></i>
                Registrarme
            </a>
        </div>
    </div>

</body>
</html>