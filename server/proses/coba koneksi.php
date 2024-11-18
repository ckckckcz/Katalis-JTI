<?php

require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';
require_once '../model/Users.php';

$data = new Users();
$user = $data->getAllUsers();
$data = new Admin();
$admin = $data->getAllAdmin();
$data = new Mahasiswa();
$mhs = $data->getAllMahasiswa();
var_dump($user);

