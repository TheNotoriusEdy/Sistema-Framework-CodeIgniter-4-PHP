<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | CodeMovies</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;800&family=Oswald:wght@600&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: #1a1a2e;
            color: white;
            overflow-x: hidden;
            position: relative;
        }

        /* Fondo de estrellas animado */
        .stars-bg {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 100" opacity="0.1"><circle cx="20" cy="30" r="1" fill="white"/><circle cx="70" cy="10" r="1.2" fill="white"/><circle cx="40" cy="80" r="1" fill="white"/><circle cx="90" cy="50" r="1" fill="white"/><circle cx="15" cy="70" r="0.8" fill="white"/></svg>') repeat;
            animation: moveStars 120s linear infinite;
            z-index: -1;
        }

        @keyframes moveStars { from { background-position: 0 0; } to { background-position: 100vw 100vh; } }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 0;
            z-index: 100;
        }

        .logo {
            text-align: center;
            margin-bottom: 3rem;
            padding: 0 1.5rem;
        }

        .logo h1 {
            font-family: 'Oswald', sans-serif;
            font-size: 1.8rem;
            background: linear-gradient(45deg, #e6b300, #ffcc33);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
        }

        .logo p {
            font-size: 0.75rem;
            color: #a0a0b0;
            margin-top: 0.3rem;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin: 0.5rem 1rem;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 1rem 1.5rem;
            color: #ccc;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .menu a:hover, .menu a.active {
            background: rgba(255, 204, 51, 0.1);
            color: #ffcc33;
            transform: translateX(5px);
        }

        .menu i {
            font-size: 1.2rem;
            width: 25px;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 2rem 3rem;
            min-height: 100vh;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .welcome h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            color: #ffcc33;
        }

        .welcome p {
            color: #a0a0b0;
            margin-top: 0.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e6b300, #ffcc33);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 800;
        }

        .user-info span {
            font-weight: 600;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #e6b300, #ffcc33);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 204, 51, 0.2);
        }

        .stat-icon {
            font-size: 2.5rem;
            color: #ffcc33;
            margin-bottom: 1rem;
        }

        .stat-card h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: #a0a0b0;
            font-size: 0.9rem;
        }

        /* Movies Section */
        .section-title {
            font-family: 'Oswald', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #ffcc33;
            text-transform: uppercase;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 2rem;
        }

        .movie-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
        }

        .movie-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            border-color: #ffcc33;
        }

        .movie-poster {
            width: 100%;
            height: 280px;
            background: linear-gradient(135deg, rgba(230, 179, 0, 0.3), rgba(255, 204, 51, 0.3));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: rgba(255, 204, 51, 0.5);
        }

        .movie-info {
            padding: 1rem;
        }

        .movie-info h4 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .movie-info .rating {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #ffcc33;
            font-size: 0.85rem;
        }

        /* Modal de Bienvenida */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 3rem;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            position: relative;
            transform: scale(0.8);
            transition: all 0.4s;
        }

        .modal-overlay.show .modal-content {
            transform: scale(1);
        }

        .modal-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, #e6b300, #ffcc33);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            animation: bounceIn 0.6s ease-out 0.3s backwards;
        }

        @keyframes bounceIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .modal-content h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            text-transform: uppercase;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #e6b300, #ffcc33);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .modal-content p {
            color: #ccc;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
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
        }

        .btn-modal:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 204, 51, 0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar .logo h1,
            .sidebar .logo p,
            .menu span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
                padding: 1.5rem;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="stars-bg"></div>

    <!-- Modal de Bienvenida -->
    <div class="modal-overlay" id="welcomeModal">
        <div class="modal-content">
            <div class="modal-icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <h2>¡Bienvenido a la Función!</h2>
            <p>Tu cuenta ha sido creada exitosamente. ¡Ahora puedes disfrutar de todas las películas y guardar tus favoritas!</p>
            <button class="btn-modal" onclick="closeModal()">
                Comenzar a Explorar
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>CodeMovies</h1>
            <p>Tu cine digital</p>
        </div>
        <ul class="menu">
            <li><a href="#" class="active"><i class="fas fa-home"></i><span>Inicio</span></a></li>
            <li><a href="#"><i class="fas fa-film"></i><span>Películas</span></a></li>
            <li><a href="#"><i class="fas fa-heart"></i><span>Favoritas</span></a></li>
            <li><a href="#"><i class="fas fa-clock"></i><span>Ver más tarde</span></a></li>
            <li><a href="#"><i class="fas fa-star"></i><span>Mejor valoradas</span></a></li>
            <li><a href="#"><i class="fas fa-fire"></i><span>Tendencias</span></a></li>
            <li><a href="#"><i class="fas fa-cog"></i><span>Configuración</span></a></li>
            <li><a href="<?= base_url('login') ?>"><i class="fas fa-sign-out-alt"></i><span>Cerrar sesión</span></a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="welcome">
                <h2>¡Bienvenido de vuelta!</h2>
                <p>Continúa donde lo dejaste o descubre algo nuevo</p>
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <span><?= session('usuario')['nombre_usuario'] ?? 'Usuario' ?></span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>1,250</h3>
                <p>Películas disponibles</p>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>0</h3>
                <p>Tus favoritas</p>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>0</h3>
                <p>Ver más tarde</p>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-play-circle"></i>
                </div>
                <h3>0</h3>
                <p>Películas vistas</p>
            </div>
        </div>

        <!-- Movies Section -->
        <h3 class="section-title">Películas Populares</h3>
        <div class="movies-grid">
            <div class="movie-card">
                <div class="movie-poster">
                    <i class="fas fa-film"></i>
                </div>
                <div class="movie-info">
                    <h4>Película de Ejemplo 1</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <span>8.5/10</span>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <i class="fas fa-film"></i>
                </div>
                <div class="movie-info">
                    <h4>Película de Ejemplo 2</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <span>9.0/10</span>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <i class="fas fa-film"></i>
                </div>
                <div class="movie-info">
                    <h4>Película de Ejemplo 3</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <span>7.8/10</span>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <i class="fas fa-film"></i>
                </div>
                <div class="movie-info">
                    <h4>Película de Ejemplo 4</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <span>8.2/10</span>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <i class="fas fa-film"></i>
                </div>
                <div class="movie-info">
                    <h4>Película de Ejemplo 5</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <span>9.5/10</span>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <div class="movie-poster">
                    <i class="fas fa-film"></i>
                </div>
                <div class="movie-info">
                    <h4>Película de Ejemplo 6</h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <span>8.8/10</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mostrar modal de bienvenida si viene del registro
        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('registro') === 'exitoso') {
                document.getElementById('welcomeModal').classList.add('show');
            }
        });

        function closeModal() {
            document.getElementById('welcomeModal').classList.remove('show');
            // Limpiar la URL
            const url = new URL(window.location);
            url.searchParams.delete('registro');
            window.history.replaceState({}, '', url);
        }

        // Cerrar modal al hacer clic fuera
        document.getElementById('welcomeModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>

</body>
</html>
