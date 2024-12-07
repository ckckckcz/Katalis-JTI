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
        
        if ($old[0]['poster_gambar'] == $newFileName) {
            $value['poster_gambar'] = $old[0]['poster_gambar'];
            die;
        }
        $value['poster_gambar'] = $newFileName;
        
        // ganti ini ke folder kalian sendiri
        $targetDirectory = 'D:/Apps/Laragon/www/katalis/public/Prestasi/PosterEvent/';
        $targetFile = $targetDirectory . $newFileName;
        $imageFileType = strtolower(pathinfo($targetFile, flags: PATHINFO_EXTENSION));

        if (file_exists($targetPath)) {
            die("File dengan nama $uniqueFileName sudah ada.");
        }
        
        // Hanya izinkan format tertentu
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg'])) {
            die("Hanya file dengan format JPG, JPEG, PNG yang diperbolehkan.");
        }

        // Upload file
        if (!move_uploaded_file($_FILES['poster-kompetisi']['tmp_name'], $targetFile)) {
            echo "Gagal mengupload file.";
        }
    }  else {
        $value['poster_gambar'] = $old[0]['poster_gambar'];
    }

    if ($event->editKegiatan($eventId,$value)) {
        echo "Event berhasil disimpan.";
        die;
    } else {
        echo "Gagal menyimpan data event.";
        die;
    }
}