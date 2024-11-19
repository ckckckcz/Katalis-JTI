<?php

require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';
require_once '../model/Users.php';
include '../model/Event.php';
require_once '../model/Berita.php';
require_once '../model/Prestasi.php';

// $user = getAllUsers();
// $admin = getAllAdmin();
// $mhs = getAllMahasiswa();
// $evt = getAllEvent();
// $berita = getAllBerita();
$prestasi = getCountPrestasi('lokal');
// var_dump($user);
// var_dump($admin);
// var_dump($mhs);
// var_dump($evt);
// var_dump($berita);
var_dump($prestasi);

