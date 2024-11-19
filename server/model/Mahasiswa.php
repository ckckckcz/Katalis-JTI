<?php

@include './server/config/Database.php';

$stmt;
function getAllMahasiswa() {
    $sql = "SELECT * FROM mahasiswa";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getMahasiswaByNim($nim) {
    $sql = "SELECT * FROM mahasiswa WHERE nim = :nim";
    $stmt = getDBConnection()->prepare($sql);
    $stmt->bindParam(':nim', $nim);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
