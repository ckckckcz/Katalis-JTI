<?php 

include_once '../../model/Event.php';

$event = new Event();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
echo json_encode($_FILES, JSON_PRETTY_PRINT);
die;

    $value = array();
    $value['nama_event'] = $_POST['nama_event'];
    $value['tingkat_lomba'] = $_POST['tingkat'];
    $value['instansi_penyelenggara'] = $_POST['instansi_penyelenggara'];
    $value['deskripsi'] = $_POST['deskripsi'];
    $value['tanggal_mulai'] = $_POST['tanggal_mulai'];
    $value['tanggal_selesai'] = $_POST['tanggal_selesai'];
    $value['url_event'] = $_POST['url_event'];
    
    if (isset($_FILES['poster-kompetisi']) && $_FILES['poster-kompetisi']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['poster-kompetisi']['name'];

        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
        $newFileName = $fileNameWithoutExtension . "_" . date("Y") . "." . $extension;

        $value['poster_gambar'] = $newFileName;

        // ganti ini ke folder kalian sendiri
        $targetDirectory = 'D:/Apps/Laragon/www/katalis/public/Prestasi/PosterEvent/';
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
