<?php
session_start();
include "conexion.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../index.html");
    exit;
}

$sql = "SELECT c.*, u.nombre, u.apellido
        FROM comunicados c
        JOIN usuarios u ON u.id = c.id_preceptor
        ORDER BY c.fecha DESC";
$lista = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Comunicados</title>
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
             font-family: "Times New Roman", Times, serif;
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
            <a href="inicio.php">Inicio</a>
            <a href="cerrar_sesion.php">Cerrar sesión</a>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="form-container">
            <h2>Comunicado General</h2>

            <?php if ($_SESSION["tipo"] === "preceptor"): ?>
                <a class="form-btn crear" href="crear_comunicado.php">Nuevo Comunicado</a>
            <?php endif; ?>

            <hr>

            <?php while ($c = $lista->fetch_assoc()): ?>
                <div class="comunicado">
                    <h3><?php echo $c["titulo"]; ?></h3>
                    <p><?php echo $c["contenido"]; ?></p>
                    <small>
                        Publicado por <?php echo $c["nombre"] . " " . $c["apellido"]; ?> —
                        <?php echo $c["fecha"]; ?>
                    </small>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>