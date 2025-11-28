<?php
session_start();
include "conexion.php";

$usuario = $_POST["usuario"];
$contra = $_POST["contrasena"];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email='$usuario'";
$res = $conexion->query($sql);

if ($res->num_rows == 1) {
    $data = $res->fetch_assoc();

    if (password_verify($contra, $data["contrasena"])) {
        $_SESSION["id"] = $data["id"];
        $_SESSION["nombre"] = $data["nombre"];
        $_SESSION["tipo"] = $data["tipo_usuario"];

        header("Location: inicio.php");
        exit;
    }
}

echo "Usuario o contraseña incorrectos";
?>