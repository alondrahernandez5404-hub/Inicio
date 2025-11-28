<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Desarrollador</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Creepster', cursive;
            background: url('https://images.unsplash.com/photo-1601758125946-6ec2e3f7d3b7?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            text-shadow: 0 0 5px red, 0 0 10px red;
        }

        .btn {
            padding: 10px 20px;
            background: linear-gradient(45deg, #8B0000, #FF0000);
            border: 2px solid #550000;
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            border-radius: 10px;
            box-shadow: 0 0 10px red;
            transition: 0.3s;
            margin: 10px 0;
        }

        .btn:hover {
            background: linear-gradient(45deg, #FF0000, #8B0000);
            box-shadow: 0 0 20px red, 0 0 40px darkred;
        }

        .modal-bg {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
        }

        .modal {
            background: #1b1b1b;
            padding: 25px;
            width: 400px;
            border-radius: 12px;
            color: white;
            box-shadow: 0 0 20px red;
            backdrop-filter: blur(10px);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: #2b2b2b;
            border: 1px solid #444;
            color: white;
            border-radius: 5px;
            font-family: 'Segoe UI', sans-serif;
            letter-spacing: normal;
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
    <div class="container">
        <h1>Panel del Desarrollador</h1>

        <button class="btn" onclick="openLogoutModal()">Cerrar Sesión</button>


    </div>

    <div id="logoutModalBg" class="modal-bg">
        <div class="modal">
            <span class="close-btn" onclick="closeLogoutModal()">✖</span>
            <h2>Cerrar Sesión</h2>
            <p>Ingresa tu Clave de Desarrollador y Contraseña para cerrar sesión:</p>

            <form id="logoutForm">
                <label>Clave de Desarrollador:</label>
                <input type="text" id="claveLogout" required>

                <label>Contraseña:</label>
                <input type="password" id="passwordLogout" required>

                <button type="submit" class="btn" style="margin-top: 15px; width:100%;">Cerrar Sesión</button>
            </form>
        </div>
    </div>

    <script>
        function openLogoutModal() { document.getElementById('logoutModalBg').style.display = 'flex'; }
        function closeLogoutModal() { document.getElementById('logoutModalBg').style.display = 'none'; }

        const desarrolladores = [
            { clave: '35149', password: '2EF25' },
            { clave: '83273', password: '7D28A' },
            { clave: '67210', password: 'L28S5' }
        ];

        document.getElementById('logoutForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const clave = document.getElementById('claveLogout').value;
            const password = document.getElementById('passwordLogout').value;

            const valid = desarrolladores.some(d => d.clave === clave && d.password === password);

            if(valid) {
                window.location.href = '/'; 
            } else {
                alert('Clave o contraseña incorrecta'); 
                closeLogoutModal();
            }
        });
    </script>
</body>
</html>
