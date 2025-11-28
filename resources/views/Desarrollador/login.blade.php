<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Desarrollador</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #1b1b1b;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px red;
            width: 400px;
            font-family: 'Creepster', cursive;
            letter-spacing: 2px;
        }
        h2 { text-align: center; color: #ff0000; }
        input { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #444; background: #2b2b2b; color: #fff; font-family: 'Segoe UI', sans-serif; letter-spacing: normal; }
        button { width: 100%; padding: 12px; margin-top: 10px; background: linear-gradient(45deg,#8B0000,#FF0000); border:2px solid #550000; color: #fff; font-size: 1.2rem; cursor: pointer; border-radius: 10px; box-shadow: 0 0 10px red; transition: 0.3s; }
        button:hover { background: linear-gradient(45deg,#FF0000,#8B0000); box-shadow:0 0 20px red,0 0 40px darkred; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Ingreso Desarrollador</h2>
        <form action="{{ route('desarrollador.validar') }}" method="POST">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="text" name="password" placeholder="Clave de desarrollador" required>
            <input type="text" name="telefono" placeholder="No. de teléfono" required>
            <input type="text" name="cp" placeholder="Código Postal" required>
            <input type="text" name="pais" placeholder="País" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
