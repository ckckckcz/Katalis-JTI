<?php 

include_once '../../model/Event.php';

$event = new Event();

// var_dump($_FILE);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = array();
    $value['nama_event'] = $_POST['nama-kegiatan'];
    $value['tingkat_lomba'] = $_POST['tingkat-lomba'];
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

        $value['poster_gambar'] = $newFileName;

        // ganti ini ke folder kalian sendiri
        $targetDirectory = 'C:/xampp/htdocs/katalis/public/Prestasi/PosterEvent/';
        $targetFile = $targetDirectory . $newFileName;
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
            if ($event->createKegiatan($value)) {
                echo "Event berhasil disimpan.";
                die;
            } else {
                echo "Gagal menyimpan data event.";
                die;
            }
        } else {
            echo "Gagal mengupload file.";
            die;
        }
    }  else {
        echo "Tidak ada file yang diupload.";
        die;
    }
    
}
