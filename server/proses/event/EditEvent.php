<?php

include_once '../../model/Event.php';

$event = new Event();
$old = $event->getById($_POST['id-event']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $value = array();
    $eventId = $_POST['id-event'];
    $value['nama_event'] = $_POST['nama-kegiatan'];
    $value['tingkat_lomba'] = $_POST['tingkat'];
    $value['instansi_penyelenggara'] = $_POST['tempat-kompetisi'];
    $value['deskripsi'] = $_POST['deskripsi-kegiatan'];
    $value['tanggal_mulai'] = $_POST['tanggal-mulai'];
    $value['tanggal_selesai'] = $_POST['tanggal-selesai'];
    $value['url_event'] = $_POST['url-kompetisi'];

    
    if (isset($_FILES['poster-kompetisi']) && $_FILES['poster-kompetisi']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['poster-kompetisi']['name'];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
        $newFileName = $fileNameWithoutExtension . "_" . date("Y") . "." . $extension;
        
        // ganti ini ke folder kalian sendiri
        $targetDirectory = 'D:/Apps/Laragon/www/katalis/public/Prestasi/PosterEvent/';
        $targetFile = $targetDirectory . $newFileName;
        $imageFileType = strtolower(pathinfo($targetFile, flags: PATHINFO_EXTENSION));

        // Hanya izinkan format tertentu
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg'])) {
            die("Hanya file dengan format JPG, JPEG, PNG yang diperbolehkan.");
        }

        $oldFilePath = $targetDirectory . $old[0]['poster_gambar'];
        if (file_exists($oldFilePath)) {
            if (!unlink($oldFilePath)) {
                die("Gagal menghapus file lama.");
            }
        }

        // Upload file
        if (move_uploaded_file($_FILES['poster-kompetisi']['tmp_name'], $targetFile)) {
            $value['poster_gambar'] = $newFileName;
        } else {
            die("Gagal mengupload file.");
        }
    }  else {
        $value['poster_gambar'] = $old[0]['poster_gambar'];
    }

    if ($event->editKegiatan($eventId,$value)) {
        echo "Event berhasil diupdate.";
        die;
    } else {
        echo "Gagal mengupdate data event.";
        die;
    }
}