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
        $sql = "SELECT * FROM event";
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
}