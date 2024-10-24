<?php
session_start();

// Menghapus semua variabel sesi
$_SESSION = array();
session_destroy();

// Mengarahkan pengguna ke halaman login
header("Location: /UTS/");
exit; // Menghentikan eksekusi script
?>