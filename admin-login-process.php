<?php
session_start();

$adminUsername = "admin@admin.com"; // Replace with your admin username
$adminPassword = '$2y$10$IuAa8siFsdhFs6iAQQPr4OVSoumGy9QGhuIF0TbuU96h3AsN.5aU.'; // Replace with your admin password hash

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $adminUsername && password_verify($password, $adminPassword)) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin-dashboard.php");
    exit();
} else {
    echo "Invalid credentials.";
}
?>
