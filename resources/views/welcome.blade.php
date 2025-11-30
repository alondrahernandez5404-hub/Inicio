<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horror World</title>

    {{-- Vite carga CSS y JS compilados correctamente --}}
    @vite(['resources/css/app.css', 'resources/js/app.ts'])

    {{-- Estilos adicionales si los quieres, opcional --}}
    <link rel="stylesheet" href="{{ asset('resources/css/horror.css') }}">

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background: 
            url('https://images.unsplash.com/photo-1601758125946-6ec2e3f7d3b7?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed,
            url('https://www.transparenttextures.com/patterns/dark-mosaic.png') repeat;
        background-size: cover, auto;
        position: relative;
        overflow: hidden;
        height: 100vh;
    }

    body::before {
        content: "";
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.75);
        z-index: 0;
    }

    .center-box {
        position: absolute;
        top: 47%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
        z-index: 10;
    }

    h1 {
        font-size: 5rem;
        color: #ff0000;
        text-shadow: 
            0 0 5px #ff0000,
            0 0 10px #ff0000,
            0 0 20px #ff0000,
            0 0 40px #ff0000,
            0 0 80px #ff0000;
        line-height: 1.2;
        animation: flicker 1.5s infinite;
    }

    @keyframes flicker {
        0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { opacity: 1; }
        20%, 22%, 24%, 55% { opacity: 0.3; }
    }

    .btn {
        padding: 12px 28px;
        background: linear-gradient(45deg, #8B0000, #FF0000);
        border: 2px solid #550000;
        color: #fff;
        font-size: 1.5rem;
        cursor: pointer;
        border-radius: 10px;
        box-shadow: 0 0 10px red;
        transition: 0.3s;
        margin-top: 20px;
    }

    .btn:hover {
        background: linear-gradient(45deg, #FF0000, #8B0000);
        box-shadow: 0 0 20px red, 0 0 40px darkred;
    }

    .dev-link {
        position: fixed;
        bottom: 10px;
        left: 10px;
        color: rgba(255,255,255,0.8);
        cursor: pointer;
        text-decoration: underline;
        z-index: 10;
    }

    .modal-bg {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 20;
    }

    .modal {
        background: #1b1b1b;
        padding: 25px;
        width: 400px;
        border-radius: 12px;
        color: white;
        box-shadow: 0 0 20px red;
        backdrop-filter: blur(10px);
        animation: fadeIn 0.5s;
        font-family: 'Creepster', cursive;
        letter-spacing: 2px;
    }

    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    input, select {
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

    input:focus, select:focus {
        outline: none;
        color: white;
        background: #2b2b2b;
    }

    .close-btn {
        float: right;
        cursor: pointer;
        font-size: 1.2rem;
        color: red;
    }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
</head>
<body>

<div class="center-box">
    <h1>HOLA PEQUEÑO PSICÓPATA</h1>
    <button class="btn" onclick="openUserModal()">INGRESAR</button>
</div>

<div class="dev-link" onclick="openDevModal()">¿Eres desarrollador?</div>

<!-- Modal Usuario -->
<div id="userModalBg" class="modal-bg">
    <div class="modal">
        <span class="close-btn" onclick="closeUserModal()">✖</span>
        <h2>REGISTRO DE MONSTRUOS</h2>

        <form action="/registro-publico" method="POST">
            @csrf
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Correo electrónico:</label>
            <input type="email" name="correo" pattern=".+@gmail\.com" required
                oninvalid="this.setCustomValidity('Correo electrónico no válido')"
                oninput="this.setCustomValidity('')"
            />

            <label>País:</label>
            <select name="pais" required>
                <option value="" disabled selected>Selecciona tu país</option>
                <option value="México">México</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="España">España</option>
                <option value="Francia">Francia</option>
                <option value="Japón">Japón</option>
                <option value="Brasil">Brasil</option>
                <option value="Argentina">Argentina</option>
                <option value="Colombia">Colombia</option>
                <option value="Canadá">Canadá</option>
                <option value="Italia">Italia</option>
                <option value="Alemania">Alemania</option>
                <option value="Reino Unido">Reino Unido</option>
                <option value="Australia">Australia</option>
                <option value="China">China</option>
                <option value="India">India</option>
                <option value="Rusia">Rusia</option>
                <option value="Sudáfrica">Sudáfrica</option>
                <option value="Egipto">Egipto</option>
                <option value="Corea del Sur">Corea del Sur</option>
                <option value="Nueva Zelanda">Nueva Zelanda</option>
            </select>

            <button class="btn" style="margin-top: 15px; width:100%;">Entrar</button>
        </form>
    </div>
</div>

<!-- Modal Desarrollador -->
<div id="devModalBg" class="modal-bg">
    <div class="modal">
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

            <label>País:</label>
            <input type="text" name="pais" required>

            <label>Contraseña:</label>
            <input type="password" name="password" required>

            <button class="btn" style="margin-top: 15px; width:100%;">Acceder</button>
        </form>
    </div>
</div>

<script>
function openUserModal() { document.getElementById('userModalBg').style.display = 'flex'; }
function closeUserModal() { document.getElementById('userModalBg').style.display = 'none'; }
function openDevModal() { document.getElementById('devModalBg').style.display = 'flex'; }
function closeDevModal() { document.getElementById('devModalBg').style.display = 'none'; }
</script>

</body>
</html>
