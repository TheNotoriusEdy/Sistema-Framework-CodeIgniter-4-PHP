<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta | CodeMovies</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;800&family=Oswald:wght@600&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: #1a1a2e;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Fondo de estrellas animado */
        .stars-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100" opacity="0.1"><circle cx="20" cy="30" r="1" fill="white"/><circle cx="70" cy="10" r="1.2" fill="white"/><circle cx="40" cy="80" r="1" fill="white"/></svg>') repeat;
            animation: moveStars 120s linear infinite;
            z-index: -1;
        }

        @keyframes moveStars { from { background-position: 0 0; } to { background-position: 100vw 100vh; } }

        /* Card de Registro */
        .register-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 2.5rem 3rem;
            width: 100%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }

        h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.3rem;
            text-transform: uppercase;
            margin-bottom: 0.3rem;
            background: linear-gradient(45deg, #e6b300, #ffcc33);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.subtitle { color: #a0a0b0; margin-bottom: 2rem; font-size: 0.9rem; }

        /* Grid para Nombre y Apellido */
        .name-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.2rem;
            text-align: left;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #ffcc33;
            font-size: 1rem;
        }

        input {
            width: 100%;
            padding: 12px 15px 12px 42px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.3s;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #ffcc33;
            box-shadow: 0 0 15px rgba(255, 204, 51, 0.2);
        }

        /* Botón de Registro */
        .btn-register {
            width: 100%;
            padding: 14px;
            margin-top: 1rem;
            border: none;
            border-radius: 10px;
            background: linear-gradient(45deg, #e6b300, #ffcc33);
            color: #1a1a2e;
            font-size: 1.1rem;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.4s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 204, 51, 0.4);
        }

        .footer-links {
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #ccc;
        }

        .footer-links a { color: #ffcc33; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>

    <div class="stars-bg"></div>

    <div class="register-card">
        <h2>Únete a la Función</h2>
        <p class="subtitle">Crea tu cuenta para guardar tus favoritas</p>

        <form action="<?= base_url('registro') ?>" method="POST">
            
            <div class="name-row">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nombre" required
                           name="nombre_usuario"
                           id="nombre_usuario"
                    >
                </div>

                <div class="input-group">
                    <i class="fas fa-id-card"></i>
                    <input type="text" placeholder="Apellido" required
                           name="apellido_usuario"
                           id="apellido_usuario"
                    >
                </div>
            </div>

            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Correo electrónico" required
                       name="correo"
                       id="correo"
                >
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Contraseña" required
                       name="clave"
                       id="clave"
                >
            </div>

            <button type="submit" class="btn-register"
                    name="btnRegistro"
                    id="btnRegistro"
            >
                Obtener mi Ticket
                <i class="fas fa-ticket-alt"></i>
            </button>

        </form>

        <div class="footer-links">
            ¿Ya tienes cuenta? <a href="<?= base_url('login') ?>">Inicia sesión</a>
        </div>
    </div>

</body>
</html>