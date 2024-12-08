<?php

require_once 'server/helper/AuthHelper.php';

session_start(); // Pastikan sesi dimulai
$location = '/katalis';
$request = $_SERVER['REQUEST_URI'];
$filePath = '';
$isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'; // Cek apakah pengguna adalah admin
$id = isset($_GET['id']) ? $_GET['id'] : null;
$startDate = isset($_GET['start-date']) ? $_GET['start-date'] : null;
$endDate = isset($_GET['end-date']) ? $_GET['end-date'] : null;

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
    case $location . '/daftar':
        $filePath = 'client/views/auth/Register.php';
        break;
    case $location . '/forgot':
        $filePath = 'client/views/auth/Forgot.php';
        break;
    case $location . '/logout':
        if ($_SESSION['is_login'] == true) {
            $filePath = 'server/proses/Logout.php';
        } else {
            http_response_code(404);
        }
        break;
    // Admin Dashboard Routing
    case $location . '/admin':
        checkAdmin();
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
    case $location . '/detailBerita?id='.$id:
        checkAdmin();
        $filePath = 'client/views/admin/blog/detailBlog.php';
        break;
    case $location . '/dataPrestasi':
        checkAdmin();
        $filePath = 'client/views/admin/Prestasi.php';
        break;
    case $location . '/exportData':
        checkAdmin();
        $filePath = 'client/views/admin/User/Export.php';
        break;
    case $location . '/exportData?start-date='.$startDate.'&end-date='.$endDate:
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
    // Detail Admin
    case $location . '/kegiatan/detail?id='.$id:
        checkAdmin();
        $filePath = 'client/views/Admin/Content/Detail_Kegiatan.php';
        break;
    case $location . '/prestasi/detail?id='.$id:
        checkAdmin();
        $filePath = 'client/views/Admin/Content/Detail_Prestasi.php';
        break;
    // EDIT ADMIN
    case $location . '/berita/edit?id='.$id:
        checkAdmin();
        $filePath = 'client/views/Admin/Content/Custom/Edit_Berita.php';
        $id = 0;
        break;
    case $location . '/kegiatan/edit?id='.$id:
        checkAdmin();
        $filePath = 'client/views/Admin/Content/Custom/Edit_Kegiatan.php';
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
    case $location . '/user/detailPrestasi?id='.$id:
        checkMahasiswa();
        $filePath = 'client/views/User/functions/Detail_Prestasi.php';
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