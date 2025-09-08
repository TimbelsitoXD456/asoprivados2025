<?php
session_start();

$correo_admin = "lanzzianopinzonmanueljose@gmail.com";
$clave_admin = "Admin_N1_Manolo";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if ($correo === $correo_admin && $password === $clave_admin) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        header("Location: login.html?error=1");
        exit();
    }
}
?>
