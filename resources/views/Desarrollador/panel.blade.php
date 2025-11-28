<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Desarrollador</title>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background:#000; color:#fff; padding:20px; }
        h1 { font-family: 'Creepster', cursive; color:red; letter-spacing:2px; }
        form { background:#1b1b1b; padding:20px; border-radius:12px; box-shadow:0 0 20px red; max-width:500px; margin-top:20px; }
        input, select, textarea { width:100%; padding:10px; margin:10px 0; border-radius:5px; border:1px solid #444; background:#2b2b2b; color:#fff; }
        button { padding:10px 20px; background:red; color:#fff; border:none; cursor:pointer; border-radius:5px; }
        button:hover { background:#ff0000; }
    </style>
</head>
<body>
    <h1>Panel Desarrollador</h1>
    <p>Aquí puedes añadir películas para que los usuarios las vean según su categoría.</p>
    <form action="/guardar-pelicula" method="POST">
        @csrf
        <input type="text" name="titulo" placeholder="Título de la película" required>
        <input type="text" name="categoria" placeholder="Categoría" required>
        <textarea name="descripcion" placeholder="Descripción" rows="4"></textarea>
        <button type="submit">Guardar Película</button>
    </form>
</body>
</html>
