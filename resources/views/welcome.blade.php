<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horror World</title>

    {{-- Vite carga CSS y JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.ts'])

    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">

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
            text-decoration: none;
            display: inline-block;
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
    </style>
</head>
<body>

<div class="center-box">
    <h1>HOLA PEQUEÑO PSICÓPATA</h1>
    <a href="/registro-publico" class="btn">INGRESAR</a>
</div>

<a href="/login-desarrollador" class="dev-link">¿Eres desarrollador?</a>

</body>
</html>
