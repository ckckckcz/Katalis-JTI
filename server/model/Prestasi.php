<?php

require_once __DIR__ . '/../config/Database.php';

class Prestasi {
    private $conn;
    private $stmt;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    function getAllPrestasi() {
        $sql = "SELECT * FROM prestasi";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllWithMhs() {
        $sql = "SELECT
                    m.nama_lengkap,
                    p.nama_kegiatan,
                    p.tingkat_lomba
                FROM dbo.Prestasi p
                INNER JOIN dbo.Mahasiswa m ON p.id_mahasiswa = m.nim";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllByMhs($nim) {
        $sql = "SELECT
                    nama_kegiatan,
                    tingkat_lomba
                FROM dbo.Prestasi 
                WHERE id_mahasiswa = :id_mahasiswa";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(':id_mahasiswa', $nim);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getCountPrestasi($tipe) {
        $sql = "SELECT COUNT(id_prestasi) as jml
                FROM Prestasi 
                WHERE tingkat_lomba = :tingkat_lomba;";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(':tingkat_lomba', $tipe);
        $this->stmt->execute();
        $result = $this->stmt->fetchColumn();
        return $result;
    }

    function getCountByMhs($tipe, $user_id) {
        $sql = "SELECT COUNT(id_prestasi) as jml
                FROM Prestasi 
                WHERE tingkat_lomba = :tingkat_lomba AND id_mahasiswa = :id_mahasiswa;";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(':tingkat_lomba', $tipe);
        $this->stmt->bindParam(':id_mahasiswa', $user_id);
        $this->stmt->execute();
        $result = $this->stmt->fetchColumn();
        return $result;
    }

    function getForBerita() {
        $sql = "SELECT 
                'Juara ' + CONVERT(varchar, peringkat) + ' ' + nama_kegiatan as input_prestasi,
                id_prestasi
                FROM prestasi WHERE peringkat > 0;";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}