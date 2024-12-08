<?php 

include_once '../../model/Berita.php';

$berita = new Berita();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = array();
    $idBerita = $_POST['id-berita'];
    $value['id_prestasi'] = $_POST['prestasi'];
    $value['nama_berita'] = $_POST['nama-berita'];
    $value['deskripsi'] = $_POST['deskripsi-berita'];
    $value['url_demo'] = $_POST['url-demo'];

    if ($berita->editBerita($idBerita,$value)) {
        header('Location: /katalis/berita');
    } else {
        echo "Gagal mengubah berita";
    }
}