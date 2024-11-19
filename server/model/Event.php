<?php

@include './server/config/Database.php';

$stmt;

function getAllEvent() {
    $sql = "SELECT * FROM event";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function getIndexWithNim($nim) {
    $sql = "SELECT
            m.nama_lengkap,
            p.nama_kegiatan,
            p.tingkat_lomba
        FROM dbo.Prestasi p
        INNER JOIN dbo.Mahasiswa m ON p.id_mahasiswa = m.nim
        WHERE p.id_mahasiswa = :nim;";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->bindParam(':nim', $nim);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}