<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horror World</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1601758125946-6ec2e3f7d3b7?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
        }

        .blur-overlay {
            backdrop-filter: blur(8px);
        }

        .center-box {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        h1 {
            font-size: 4rem;
            text-shadow: 0 0 15px red;
        }

        .btn {
            padding: 12px 28px;
            background: red;
            border: none;
            color: white;
            font-size: 1.3rem;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn:hover {
            background: darkred;
        }

        .dev-link {
            position: fixed;
            bottom: 10px;
            left: 10px;
            color: rgba(255,255,255,0.8);
            cursor: pointer;
            text-decoration: underline;
        }

        .modal-bg {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal {
            background: #1b1b1b;
            padding: 25px;
            width: 380px;
            border-radius: 12px;
            color: white;
            box-shadow: 0 0 20px red;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: #2b2b2b;
            border: 1px solid #444;
            color: white;
            border-radius: 5px;
        }

        .close-btn {
            float: right;
            cursor: pointer;
            font-size: 1.2rem;
            color: red;
        }

    </style>
</head>
<body>

    <!-- Contenido principal -->
    <div class="center-box">
        <h1>HOLA PEQUEÑO PSICÓPATA</h1>
        <button class="btn" onclick="openUserModal()">INGRESAR</button>
    </div>

    <!-- Link desarrollador -->
    <div class="dev-link" onclick="openDevModal()">
        ¿Eres desarrollador?
    </div>

    <!-- Modal Usuario -->
    <div id="userModalBg" class="modal-bg">
        <div class="modal blur-overlay">
            <span class="close-btn" onclick="closeUserModal()">✖</span>
            <h2>Registro de Usuario</h2>

            <form action="/registro-publico" method="POST">
                @csrf

                <label>Nombre:</label>
                <input type="text" name="nombre" required>

                <label>País / Ciudad:</label>
                <input type="text" name="pais" required>

                <label>Correo (solo Gmail):</label>
                <input type="email" name="correo" pattern=".+@gmail\.com" required>

                <button class="btn" style="margin-top: 15px; width:100%;">Entrar</button>
            </form>
        </div>
    </div>

    <!-- Modal Desarrollador -->
    <div id="devModalBg" class="modal-bg">
        <div class="modal blur-overlay">
            <span class="close-btn" onclick="closeDevModal()">✖</span>
            <h2>Ingreso de Desarrollador</h2>

            <form action="/login-desarrollador" method="POST">
                @csrf

                <label>Nombre Completo:</label>
                <input type="text" name="nombre_completo" required>

                <label>Clave de Desarrollador:</label>
                <input type="text" name="clave" required>

                <label>No. de Teléfono:</label>
                <input type="text" name="telefono" required>

                <label>Código Postal:</label>
                <input type="text" name="cp" required>

                <label>País / Ciudad:</label>
                <input type="text" name="pais" required>

                <label>Contraseña:</label>
                <input type="password" name="password" required>

                <button class="btn" style="margin-top: 15px; width:100%;">Acceder</button>
            </form>
        </div>
    </div>

    <script>
        function openUserModal() {
            document.getElementById('userModalBg').style.display = 'flex';
        }

        function closeUserModal() {
            document.getElementById('userModalBg').style.display = 'none';
        }

        function openDevModal() {
            document.getElementById('devModalBg').style.display = 'flex';
        }

        function closeDevModal() {
            document.getElementById('devModalBg').style.display = 'none';
        }
    </script>

</body>
</html>
