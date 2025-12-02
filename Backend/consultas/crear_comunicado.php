<?php
session_start();
if ($_SESSION["tipo"] !== "preceptor") {
    die("Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Nuevo Comunicado</title>
    <link rel="stylesheet" href="../../Frontend/css/comunicado.css">
    <style>
        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1e3a8a;
            /* azul oscuro */
            padding: 10px 20px;
            color: #fff;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
            background-color: #3b82f6;
            /* azul más claro */
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div>EPET N°20</div>
        <div>
            <a href="comunicados.php">Comunicados</a>
            <a href="cerrar_sesion.php">Cerrar sesión</a>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="form-container">
            <h2>Crear Comunicado</h2>

            <form action="guardar_comunicado.php" method="POST">
                <label>Título</label>
                <input class="form-input" name="titulo" required>

                <label>Contenido</label>
                <textarea class="form-input" name="contenido" required></textarea>

                <button class="form-btn" type="submit">Publicar</button>
            </form>
        </div>
    </div>
</body>

</html>