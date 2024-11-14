<?php

require_once '../model/Berita.php';
require_once '../core/Controller.php';

$data = new Berita();
$data = $data->getAllBerita();
var_dump($data);

