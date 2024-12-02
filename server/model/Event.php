<?php

require_once __DIR__ . '/../config/Database.php';

class Event {
    private $conn;
    private $stmt;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    function getAllEvent() {
        $sql = "SELECT 
                nama_event,
                tingkat_lomba,
                instansi_penyelenggara,
                tanggal_mulai,
                tanggal_selesai,
                deskripsi,
                url_event,
                poster_gambar
                FROM event";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(':nim', $nim);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function createKegiatan($value) {
        $sql = "INSERT INTO event 
                (nama_event, tingkat_lomba, instansi_penyelenggara, deskripsi, tanggal_mulai, tanggal_selesai, url_event, poster_gambar)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $value['nama_event']);
        $this->stmt->bindParam(2, $value['tingkat_lomba']);
        $this->stmt->bindParam(3, $value['instansi_penyelenggara']);
        $this->stmt->bindParam(4, $value['deskripsi']);
        $this->stmt->bindParam(5, $value['tanggal_mulai']);
        $this->stmt->bindParam(6, $value['tanggal_selesai']);
        $this->stmt->bindParam(7, $value['url_event']);
        $this->stmt->bindParam(8, $value['poster_gambar']);
        $this->stmt->execute();
    }

    function editKegiatan($id, $value) {
        $sql = "UPDATE event SET
                nama_event = ?,
                tingkat_lomba = ?,
                instansi_penyelenggara = ?,
                deskripsi = ?,
                tanggal_mulai = ?,
                tanggal_selesai = ?,
                url_event = ?,
                poster_gambar = ?
                WHERE id_event = ?";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $value['nama_event']);
        $this->stmt->bindParam(2, $value['tingkat_lomba']);
        $this->stmt->bindParam(3, $value['instansi_penyelenggara']);
        $this->stmt->bindParam(4, $value['deskripsi']);
        $this->stmt->bindParam(5, $value['tanggal_mulai']);
        $this->stmt->bindParam(6, $value['tanggal_selesai']);
        $this->stmt->bindParam(7, $value['url_event']);
        $this->stmt->bindParam(8, $value['poster_gambar']);
        $this->stmt->bindParam(9, $id);
        $this->stmt->execute();
    }

    function deleteKegiatan($id) {
        $sql = "DELETE FROM event WHERE id_event = ?";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $id);
        $this->stmt->execute();
    }
}