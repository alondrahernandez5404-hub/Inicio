<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu terror</title>
    @vite('resources/css/app.css')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80&w=1920&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 3rem;
            text-shadow: 0 0 15px red;
        }

        .menu-terror {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }

        .tipo-terror {
            width: 220px;
            margin: 15px;
            border: 2px solid red;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .tipo-terror img {
            width: 100%;
            height: 150px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .tipo-terror:hover {
            transform: scale(1.05);
            border-color: darkred;
        }

        .tipo-terror span {
            display: block;
            padding: 10px;
            background: rgba(0,0,0,0.7);
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <h1>Elige el tipo de terror</h1>

    <div class="menu-terror">
        <div class="tipo-terror" onclick="location.href='/peliculas/slasher'">
            <img src="https://images.unsplash.com/photo-1601758125946-6ec2e3f7d3b7?q=80&w=400&auto=format&fit=crop" alt="Slasher">
            <span>Slasher</span>
        </div>
        <div class="tipo-terror" onclick="location.href='/peliculas/psicologico'">
            <img src="https://images.unsplash.com/photo-1580469141190-3b8f7a6f0e9b?q=80&w=400&auto=format&fit=crop" alt="Psicológico">
            <span>Psicológico</span>
        </div>
        <div class="tipo-terror" onclick="location.href='/peliculas/fantasmas'">
            <img src="https://images.unsplash.com/photo-1523323186940-39d46b5f09f8?q=80&w=400&auto=format&fit=crop" alt="Fantasmas">
            <span>Fantasmas</span>
        </div>
        <div class="tipo-terror" onclick="location.href='/peliculas/zombies'">
            <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?q=80&w=400&auto=format&fit=crop" alt="Zombies">
            <span>Zombies</span>
        </div>
    </div>
</body>
</html>
