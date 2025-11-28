<?php
session_start();
$_SESSION = [];
session_destroy();

// Redirige al login
header("Location: ../index.html");
exit;
?>
