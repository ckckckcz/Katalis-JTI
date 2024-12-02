<?php

include_once '../../model/Prestasi.php';

$prestasi = new Prestasi();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $value = array();
    $value['id_mahasiswa'] = $_SESSION['user_data']['id_mahasiswa'];
    $value['nama_kegiatan'] = $_POST['nama-kompetisi'];
    $value['jenis_kegiatan'] = $_POST['jenis-kompetisi'];
    $value['tanggal_mulai'] = $_POST['tanggal-mulai'];
    $value['tanggal_selesai'] = $_POST['tanggal-selesai'];
    $value['tingkat_lomba'] = $_POST['tingkat-lomba'];
    $value['peringkat'] = $_POST['peringkat'];
    $value['lokasi'] = $_POST['tempat-kompetisi'];
    $value['deskripsi'] = $_POST['deskripsi'];
    $value['dosen_pembimbing'] = $_POST['dosen-pembimbing'];
    $value['file_karya'] = $_POST['karya'];
    $value['file_poster'] = $_POST['poster'];
    $value['file_dokumentasi'] = $_POST['dokumentasi'];
    $value['file_sertifikat'] = $_POST['sertifikat'];

    $lokasi = ['Karya', 'Dokumentasi', 'Poster', 'Sertifikat'];
    $targetDirectory = 'D:/Apps/Laragon/www/katalis/public/Prestasi/';


}