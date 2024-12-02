<?php 

include_once '../../model/Event.php';

$event = new Event();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = array();
    $value['nama_event'] = $_POST['nama-kegiatan'];
    $value['tingkat_lomba'] = $_POST['tingkat'];
    $value['instansi_penyelenggara'] = $_POST['nama-kompetisi'];
    $value['deskripsi'] = $_POST['deskripsi-kegiatan'];
    $value['tanggal_mulai'] = $_POST['tanggal-mulai'];
    $value['tanggal_selesai'] = $_POST['tanggal-selesai'];
    $value['url_event'] = $_POST['url-kompetisi'];
    $value['poster_gambar'] = $_FILES['poster-kompetisi']['name'];

    // ganti ini ke folder kalian sendiri
    $targetDirectory = 'D:/Apps/Laragon/www/katalis/public/Prestasi/PosterEvent/';
    $targetFile = $targetDirectory . basename($_FILES['poster-kompetisi']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, flags: PATHINFO_EXTENSION));

    if (file_exists($targetFile)) {
        die("File dengan nama tersebut sudah ada.");
    }
    // Hanya izinkan format tertentu
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg'])) {
        die("Hanya file dengan format JPG, JPEG, PNG yang diperbolehkan.");
    }

    // Upload file
    if (move_uploaded_file($_FILES['poster-kompetisi']['tmp_name'], $targetFile)) {
        // Simpan data ke database
        if ($event->createKegiatan($value)) {
            echo "Event berhasil disimpan.";
        } else {
            echo "Gagal menyimpan data event.";
        }
    } else {
        echo "Gagal mengupload file.";
    }
}
