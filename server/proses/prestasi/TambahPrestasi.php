<?php

include_once '../../model/Prestasi.php';

$prestasi = new Prestasi();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start(); 
    $value = array();
    $value['id_mahasiswa'] = $_SESSION['user_data']['nim'];
    $value['nama_kegiatan'] = $_POST['nama-kompetisi'];
    $value['jenis_kegiatan'] = $_POST['jenis-kompetisi'];
    $value['tanggal_mulai'] = $_POST['tanggal-mulai'];
    $value['tanggal_selesai'] = $_POST['tanggal-selesai'];
    $value['tingkat_lomba'] = $_POST['tingkat-lomba'];
    $value['peringkat'] =  empty($_POST['peringkat']) ? 0 : $_POST['peringkat'];
    $value['lokasi'] = $_POST['tempat-kompetisi'];
    $value['deskripsi'] = $_POST['deskripsi'];
    $value['dosen_pembimbing'] = $_POST['dosen-pembimbing'];
    $value['status_validasi'] = 'proses_validasi';

    // Ambil ID terakhir
    $lastId = $prestasi->getLastId();
    $id = $lastId + 1;
    if ($id == null) {
        $id = 0;
    }

    // Direktori tujuan
    $targetDirectory = [
        'karya' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Karya/',
        'poster' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Poster/',
        'dokumentasi' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Dokumentasi/',
        'sertifikat' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Sertifikat/'
    ];

    $fileKeys = ['karya', 'poster', 'dokumentasi', 'sertifikat'];

    foreach ($fileKeys as $key) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {
            $extension = strtolower(pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION));
            // if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
            //     die("Hanya file dengan format JPG, JPEG, PNG yang diperbolehkan untuk $key.");
            // }

            $uniqueFileName = $_FILES[$key]['name'] . "_$id." . $extension;
            $targetPath = $targetDirectory[$key] . $uniqueFileName;

            if (file_exists($targetPath)) {
                die("File dengan nama $uniqueFileName sudah ada.");
            }

            if (move_uploaded_file($_FILES[$key]['tmp_name'], $targetPath)) {
                $value["file_$key"] = $uniqueFileName;
            } else {
                die("Gagal mengunggah file $key.");
            }
        } else {
            $value["file_$key"] = null; // Jika file tidak diunggah
        }
    }
    // Simpan data ke database
    if ($prestasi->insertPrestasi($value)) {
        echo "Prestasi berhasil disimpan.";
    } else {
        echo "Prestasi gagal disimpan.";
    }
} else {
    echo "ada yang salah";
    die;
}
