<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Panel Desarrollador</title>
<style>
    body { background:#000; color:#fff; font-family:Segoe UI, sans-serif; margin:0; padding:20px; }
    .card { background:#1b1b1b; padding:20px; border-radius:8px; box-shadow:0 0 20px red; max-width:800px; margin:30px auto; }
    h1 { color:#ff0000; text-align:center; }
    .btn { background:linear-gradient(45deg,#8B0000,#FF0000); color:#fff; padding:10px 16px; border-radius:8px; border:none; cursor:pointer; }
    .logout-form { max-width:420px; margin:20px auto 0; }
    label{display:block;margin-top:8px}
    input{width:100%;padding:8px;border-radius:6px;border:1px solid #444;background:#222;color:#fff}
</style>
</head>
<body>
    <div class="card">
        <h1>Bienvenido, {{ $nombre ?? 'Desarrollador' }}</h1>

        <p>Aquí puedes agregar/editar películas (interfaz por implementar).</p>

        <hr>

        <h3>Cerrar sesión</h3>
        <p>Para cerrar sesión ingresa tu <strong>Clave de desarrollador</strong> y <strong>Contraseña</strong>:</p>

        <form action="{{ route('desarrollador.logout') }}" method="POST" class="logout-form">
            @csrf
            <label>Clave de desarrollador</label>
            <input type="password" name="clave" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <button class="btn" type="submit" style="margin-top:12px">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
