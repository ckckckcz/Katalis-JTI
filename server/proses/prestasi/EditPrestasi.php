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
    $value['id_dosen'] = $_POST['dosen-pembimbing'];
    $value['status_validasi'] = $_POST['status-validasi'];
    $value['id_prestasi'] = $_POST['id-prestasi'];
    $value['file_poster'] = $old[0]['file_poster'];
    $value['file_dokumentasi'] = $old[0]['file_dokumentasi'];
    $value['file_sertifikat'] = $old[0]['file_sertifikat'];
    $value['file_surat-tugas'] = $old[0]['surat_tugas'];


    // Direktori tujuan
    $targetDirectory = [
        'poster' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Poster/',
        'dokumentasi' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Dokumentasi/',
        'sertifikat' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/Sertifikat/',
        'surat-tugas' => 'D:/Apps/Laragon/www/katalis/public/Prestasi/SuratTugas/'
    ];

    $fileKeys = ['poster', 'dokumentasi', 'sertifikat', 'surat-tugas'];
    $fileKeysOld = ['file_poster', 'file_dokumentasi', 'file_sertifikat', 'surat_tugas'];

    foreach ($fileKeys as  $index => $key) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {
            $extension = strtolower(pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION));
            $uniqueFileName = $_FILES[$key]['name'] . "_{$old[0]['id_prestasi']}." . $extension;
            $targetPath = $targetDirectory[$key] . $uniqueFileName;
            
            // if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
            //     die("Hanya file dengan format JPG, JPEG, PNG yang diperbolehkan untuk $key.");
            // }

            if (!empty($old[0][$fileKeysOld[$index]])) {
                $oldFilePath = $targetDirectory[$fileKeys[$index]] . $old[0][$fileKeysOld[$index]];
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            if (move_uploaded_file($_FILES[$key]['tmp_name'], $targetPath)) {
                $value["file_$key"] = $uniqueFileName;
            } else {
                die("Gagal mengunggah file $key.");
            }
        }
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
