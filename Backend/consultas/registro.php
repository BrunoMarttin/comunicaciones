<?php
include "conexion.php";

$email = $_POST['email'];
$usuario = $_POST['usuario'];
$contra = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo_usuario'];

$sql = "INSERT INTO usuarios(email, usuario, contrasena, apellido, nombre, tipo_usuario)
        VALUES ('$email', '$usuario', '$contra', '$apellido', '$nombre', '$tipo')";

if ($conexion->query($sql)) {
    header("Location: ../registro.html?ok");
} else {
    echo "Error: " . $conexion->error;
}
?>