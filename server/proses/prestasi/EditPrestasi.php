<?php

include_once '../../model/Prestasi.php';

$prestasi = new Prestasi();
$old = $prestasi->getById($_POST['id-prestasi']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start(); 
    $value = array();
    $value['nama_kegiatan'] = $_POST['nama-kompetisi'];
    $value['jenis_kegiatan'] = $_POST['jenis-kompetisi'];
    $value['tanggal_mulai'] = $_POST['tanggal-mulai'];
    $value['tanggal_selesai'] = $_POST['tanggal-selesai'];
    $value['tingkat_lomba'] = $_POST['tingkat-lomba'];
    $value['peringkat'] =  $_POST['peringkat'];
    $value['lokasi'] = $_POST['tempat-kompetisi'];
    $value['deskripsi'] = $_POST['deskripsi'];
    $value['dosen_pembimbing'] = $_POST['dosen-pembimbing'];
    $value['status_validasi'] = $_POST['status-validasi'];
    $value['id_prestasi'] = $_POST['id-prestasi'];

    // Ambil ID terakhir
    $lastId = $prestasi->getLastId();
    $id = $lastId + 1;
    if ($id == null) {
        $id = 0;
    }

    if (isset($_FILES['poster-kompetisi']) && $_FILES['poster-kompetisi']['error'] === UPLOAD_ERR_OK) {

        // Direktori tujuan
        $targetDirectory = [
            'karya' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Karya/',
            'poster' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Poster/',
            'dokumentasi' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Dokumentasi/',
            'sertifikat' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Sertifikat/',
            'surat-tugas' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/SuratTugas/'
        ];

        $fileKeys = ['karya', 'poster', 'dokumentasi', 'sertifikat', 'surat-tugas'];


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
    } else {
        $value["file_karya"] = $old[0]['file_karya'];
        $value["file_poster"] = $old[0]['file_poster'];
        $value["file_dokumentasi"] = $old[0]['file_dokumentasi'];
        $value["file_sertifikat"] = $old[0]['file_sertifikat'];
        $value["file_surat_tugas"] = $old[0]['surat_tugas'];
    }

    // Simpan data ke database
    if ($prestasi->updatePrestasi($value)) {
        echo "Prestasi berhasil diupdate.";
    } else {
        echo "Prestasi gagal diupdate.";
    }
} else {
    echo "ada yang salah";
    die;
}
