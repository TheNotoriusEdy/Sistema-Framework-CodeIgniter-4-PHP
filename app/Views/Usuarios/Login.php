<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | CodeMovies</title>
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

        /* Fondo animado (Igual al Welcome) */
        .stars-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100" opacity="0.1"><circle cx="10" cy="10" r="1" fill="white"/><circle cx="50" cy="5" r="1.2" fill="white"/><circle cx="80" cy="95" r="1" fill="white"/></svg>') repeat;
            animation: moveStars 100s linear infinite;
            z-index: -1;
        }

        @keyframes moveStars { from { background-position: 0 0; } to { background-position: 100vw 100vh; } }

        /* Card de Login */
        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, #e6b300, #ffcc33);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.subtitle { color: #a0a0b0; margin-bottom: 2.5rem; font-size: 0.9rem; }

        /* Estilo de los Inputs */
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #ffcc33;
            font-size: 1.1rem;
        }

        input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #ffcc33;
            box-shadow: 0 0 15px rgba(255, 204, 51, 0.2);
        }

        /* Botón de Iniciar Sesión */
        .btn-login {
            width: 100%;
            padding: 15px;
            margin-top: 1rem;
            border: none;
            border-radius: 12px;
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

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 204, 51, 0.4);
            filter: brightness(1.1);
        }

        .footer-links {
            margin-top: 2rem;
            font-size: 0.85rem;
        }

        .footer-links a { color: #ffcc33; text-decoration: none; font-weight: 600; }
        .footer-links a:hover { text-decoration: underline; }

        /* Modal de Error */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: all 0.4s;
        }

        .modal-overlay.show {
            opacity: 1;
            pointer-events: all;
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 30px;
            padding: 3rem 2rem;
            max-width: 420px;
            width: 90vw;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            position: relative;
            transform: scale(0.8);
            transition: all 0.4s;
            overflow-wrap: break-word;
            word-break: break-word;
        }

        .modal-overlay.show .modal-content {
            transform: scale(1);
        }

        .modal-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, #e6b300, #ffcc33);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            animation: bounceIn 0.6s ease-out 0.3s backwards;
        }

        @keyframes bounceIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .btn-modal {
            padding: 15px 40px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(45deg, #e6b300, #ffcc33);
            color: #1a1a2e;
            font-size: 1.1rem;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1.5rem;
        }

        .btn-modal:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 204, 51, 0.4);
        }
        @media (max-width: 600px) {
            .modal-content {
                padding: 2rem 1rem;
                max-width: 98vw;
            }
            .modal-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="stars-bg"></div>

    <div class="login-card">
        <h2>CinePro</h2>
        <p class="subtitle">Bienvenido de nuevo, cinéfilo</p>

        <form action="<?= base_url('login') ?>" method="POST">
            
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" 
                       placeholder="Correo o Usuario" 
                       required
                       name="usuario"
                       id="usuario"
                >
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" 
                       placeholder="Contraseña" 
                       required
                       name="clave"
                       id="clave"
                >
            </div>

            <button type="submit" 
                    class="btn-login"
                    name="btnLogin"
                    id="btnLogin"
            >
                Entrar a la Sala
                <i class="fas fa-play"></i>
            </button>

        </form>

        <div class="footer-links">
            ¿No tienes cuenta? <a href="<?= base_url('registro') ?>">Regístrate aquí</a>
        </div>
    </div>

    <?php if(session('error')): ?>
        <div class="modal-overlay show" id="errorModal">
            <div class="modal-content">
                <div class="modal-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <h2>Error</h2>
                <p><?= session('error') ?></p>
                <button class="btn-modal" onclick="closeErrorModal()">
                    Cerrar
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <script>
        function closeErrorModal() {
            document.getElementById('errorModal').classList.remove('show');
        }
        // Cerrar modal al hacer clic fuera
        if(document.getElementById('errorModal')) {
            document.getElementById('errorModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeErrorModal();
                }
            });
        }
    </script>

</body>
</html>