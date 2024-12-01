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
echo "<pre>";
// var_dump($mhs->getAllMahasiswa());
echo "<pre>";
var_dump($prestasi->getAllPrestasi());
echo "</pre>";

