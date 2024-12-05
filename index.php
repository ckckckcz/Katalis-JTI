<?php

require_once 'server/helper/AuthHelper.php';

session_start(); // Pastikan sesi dimulai
$location = '/katalis';
$request = $_SERVER['REQUEST_URI'];
$filePath = '';
$isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'; // Cek apakah pengguna adalah admin

// Routing
switch ($request) {
    // Anonymous Dashboard Routing
    case $location . '/':
        $filePath = 'client/views/Home.php';
        break;
    case $location . '/leaderboard':
        $filePath = 'client/views/Leaderboard.php';
        break;
    case $location . '/blog':
        $filePath = 'client/views/Blog.php';
        break;
    case $location . '/competition':
        $filePath = 'client/views/Competition.php';
        break;
    case $location . '/blog/read':
        $filePath = 'client/views/Blog/detail.php';
        break;
    case $location . '/login':
        $filePath = 'client/views/auth/Login.php';
        break;
    case $location . '/logout':
        $filePath = 'server/proses/Logout.php';
        break;
    case $location . '/daftar':
        $filePath = 'client/views/auth/Register.php';
        break;
    // Admin Dashboard Routing
    case $location . '/admin':
        // checkAdmin();
        $filePath = 'client/views/admin/Admin.php';
        break;
    case $location . '/kegiatan':
        checkAdmin();
        $filePath = 'client/views/admin/Kegiatan.php';
        break;
    case $location . '/berita':
        checkAdmin();
        $filePath = 'client/views/admin/Berita.php';
        break;
    case $location . '/dataPrestasi':
        checkAdmin();
        $filePath = 'client/views/admin/Prestasi.php';
        break;
    case $location . '/exportData':
        checkAdmin();
        $filePath = 'client/views/admin/User/Export.php';
        break;
    case $location . '/daftarMahasiswa':
        checkAdmin();
        $filePath = 'client/views/admin/User/Mahasiswa.php';
        break;
    // CRUD ADMIN
    case $location . '/kegiatan/tambah_kegiatan':
        checkAdmin();
        $filePath = 'client/views/admin/Functions/Tambah_Kegiatan.php';
        break;
    case $location . '/kegiatan/tambah_prestasi':
        checkAdmin();
        $filePath = 'client/views/admin/Functions/Tambah_Prestasi.php';
        break;
    case $location . '/kegiatan/tambah_berita':
        checkAdmin();
        $filePath = 'client/views/admin/Functions/Tambah_Berita.php';
        break;
    // User Dashboard Routing
    case $location . '/user':
        checkMahasiswa();
        $filePath = 'client/views/User/Dashboard.php';
        break;
    case $location . '/user/daftarPrestasi':
        checkMahasiswa();
        $filePath = 'client/views/User/Prestasi.php';
        break;
    case $location . '/user/tambahPrestasi':
        checkMahasiswa();
        $filePath = 'client/views/User/functions/Tambah_Prestasi.php';
        break;
    default:
        http_response_code(404);
        // $filePath = '404.php';
        die;
}

// Tentukan layout yang akan digunakan
if ($isAdmin) {
    include('public/layout.php'); // Gunakan layoutAdmin untuk admin
} else {
    include('public/layout.php'); // Gunakan layout biasa untuk pengguna
}
?>