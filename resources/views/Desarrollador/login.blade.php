<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
            margin: 0;
        }
        .login-box {
            background: #1b1b1b;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px red;
            width: 420px;
            font-family: 'Creepster', cursive;
            letter-spacing: 2px;
        }
        h2 { text-align: center; color: #ff0000; margin: 0 0 12px; }

        label { 
            display:block; 
            font-size:0.85rem; 
            margin-top:8px; 
            color:#f2f2f2; 
            font-family: 'Segoe UI', sans-serif; 
            letter-spacing: normal; 
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 5px;
            border: 1px solid #444;
            background: #2b2b2b;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            letter-spacing: normal;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 14px;
            background: linear-gradient(45deg,#8B0000,#FF0000);
            border:2px solid #550000;
            color: #fff;
            font-size: 1.1rem;
            cursor: pointer;
            border-radius: 10px;
            box-shadow: 0 0 10px red;
            transition: 0.2s;
        }
        button:hover {
            background: linear-gradient(45deg,#FF0000,#8B0000);
            box-shadow:0 0 20px red,0 0 40px darkred;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Ingreso Desarrollador</h2>

        <form action="{{ route('desarrollador.validar') }}" method="POST" autocomplete="off">
            @csrf

            <label>Nombre completo</label>
            <input type="text" name="nombre" placeholder="Nombre completo" required autocomplete="off">

            <label>Clave de desarrollador</label>
            <input type="password" name="clave" placeholder="Clave de desarrollador" required autocomplete="off">

            <label>No. de teléfono</label>
            <input type="text" name="telefono" placeholder="No. de teléfono" required autocomplete="off">

            <label>Código Postal</label>
            <input type="text" name="cp" placeholder="Código Postal" required autocomplete="off">

            <label>País</label>
            <input type="text" name="pais" placeholder="País" required autocomplete="off">

            <label>Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña" required autocomplete="off">

            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
