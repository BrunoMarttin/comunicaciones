<?php
session_start();
include "conexion.php";

if (!isset($_SESSION["id"]) || $_SESSION["tipo"] !== "preceptor") {
    die("Acceso denegado");
}

$titulo = $_POST["titulo"];
$contenido = $_POST["contenido"];
$idPreceptor = $_SESSION["id"];

// Insertar en la base de datos
$sql = "INSERT INTO comunicados(titulo, contenido, id_preceptor)
        VALUES ('$titulo', '$contenido', '$idPreceptor')";
$conexion->query($sql);

// Redirigir a la lista de comunicados
header("Location: comunicados.php");
exit;
?>