<?php

@include './server/config/Database.php';

$stmt;

function getAllPrestasi() {
    $sql = "SELECT * FROM prestasi";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getAllWithMhs() {
    $sql = "SELECT
                m.nama_lengkap,
                p.nama_kegiatan,
                p.tingkat_lomba
            FROM dbo.Prestasi p
            INNER JOIN dbo.Mahasiswa m ON p.id_mahasiswa = m.nim";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getAllByMhs($nim) {
    $sql = "SELECT
                nama_kegiatan,
                tingkat_lomba
            FROM dbo.Prestasi 
            WHERE id_mahasiswa = :id_mahasiswa";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->bindParam(':id_mahasiswa', $nim);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getCountPrestasi($tipe) {
    $sql = "SELECT COUNT(id_prestasi) as jml
            FROM Prestasi 
            WHERE tingkat_lomba = :tingkat_lomba;";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->bindParam(':tingkat_lomba', $tipe);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}
