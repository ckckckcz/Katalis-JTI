<?php
session_start(); // Pastikan sesi dimulai
$location = '/UTS';
$request = $_SERVER['REQUEST_URI'];
$filePath = '';
$isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'; // Cek apakah pengguna adalah admin

// Routing
switch ($request) {
    case $location . '/':
        $filePath = 'client/views/Home.php';
        break;
    case $location . '/login':
        $filePath = 'client/views/auth/Login.php';
        break;
    case $location . '/daftar':
        $filePath = 'client/views/auth/Register.php';
        break;
    case $location . '/admin':
        $filePath = 'client/views/admin/Home.php';
        break;
    default:
        http_response_code(404);
        $filePath = '404.php';
        break;
}

// Tentukan layout yang akan digunakan
if ($isAdmin) {
    include('public/layoutAdmin.php'); // Gunakan layoutAdmin untuk admin
} else {
    include('public/layout.php'); // Gunakan layout biasa untuk pengguna
}
?>