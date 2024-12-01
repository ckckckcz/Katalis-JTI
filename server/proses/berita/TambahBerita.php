<?php 

include_once '../../model/Berita.php';

$berita = new Berita();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = array();
    $value['id_prestasi'] = $_POST['prestasi'];
    $value['nama_berita'] = $_POST['nama-berita'];
    $value['deskripsi'] = $_POST['deskripsi-berita'];
    $value['url_demo'] = $_POST['url-demo'];

    if ($berita->insertBerita($value)) {
        echo "Berita berhasil disimpan.";
        die;
    } else {
        echo "Berita gagal disimpan";
        die;
    }
}