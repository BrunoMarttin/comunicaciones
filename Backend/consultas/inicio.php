<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="../Frontend/css/style.css">
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

        /* Contenido centrado */
        .page-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .content-container {
            text-align: center;
            background-color: #e0f2fe;
            /* azul muy claro */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .content-container h1 {
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .content-container p {
            color: #1e40af;
            margin-bottom: 30px;
            font-size: 18px;
        }

        .content-container .form-btn {
            background-color: #3b82f6;
            color: #fff;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .content-container .form-btn:hover {
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

    <!-- Contenido principal -->
    <div class="page-wrapper">
        <div class="content-container">
            <h1>Bienvenido</h1>
            <p>Hola, <?php echo $_SESSION["nombre"]; ?>. Estás en el cuaderno digital.</p>
        </div>
    </div>
</body>

</html>