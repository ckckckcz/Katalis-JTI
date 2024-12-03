<?php

require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';
require_once '../model/Users.php';
include '../model/Event.php';
require_once '../model/Berita.php';
require_once '../model/Prestasi.php';

// $user = new Users();
// $admin = new Admin();
// $mhs = new Mahasiswa();
$evt = new Event();
$berita = new Berita();
$prestasi = new Prestasi();

// var_dump($user->getAllUsers());
// var_dump($admin->getAllAdmin());
echo "<pre>";
// var_dump($berita->getAllBerita());
// var_dump($evt->getAllEvent());
// var_dump($prestasi->getLastId());
var_dump($prestasi->getAllPrestasi());
echo "<pre>";
// var_dump($mhs->getAllMahasiswa());
echo "<pre>";
// var_dump($prestasi->getWithRangeDate(, end: date('Y-m-d H:i:s', strtotime('2024-11-30 13:56:10.070'))));
// var_dump(date('Y-m-d H:i:s', strtotime('2024-01-01 13:56:10.070')));
// var_dump($prestasi->getWithRangeDate('2024-11-01 00:00:00', '2024-12-31 23:59:59'));
echo "</pre>";

