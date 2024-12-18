<?php 

include_once '../../model/Dosen.php';

$dosen = new Dosen();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = array();
    $value['nip'] = $_POST['nip-dosen'];
    $value['nama_lengkap'] = $_POST['nama-dosen'];
    $value['Jurusan'] = $_POST['jurusan-dosen'];

    if ($dosen->insertDosen($value)) {
        header('Location: /katalis/daftarDosen');
    } else {
        echo "Gagal menyimpan Dosen";
    }
}
