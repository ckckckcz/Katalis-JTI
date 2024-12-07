<?php 

include_once '../../model/Berita.php';
include_once '../../helper/ValidationHelper.php';

$berita = new Berita();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = array();
    $value['id_prestasi'] = $_POST['prestasi'];
    $value['nama_berita'] = $_POST['nama_berita'];
    $value['deskripsi'] = $_POST['deskripsi_berita'];
    $value['url_demo'] = $_POST['url_demo'];


    $berita->insertBerita($value);
}