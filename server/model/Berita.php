<?php

require_once __DIR__ . '/../config/Database.php';

class Berita {
    private $conn;
    private $stmt;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getDBConnection();
    }

    function getAllBerita() {
        $sql = "SELECT
                p.file_dokumentasi, 
                b.nama_berita,
                b.deskripsi
                FROM berita b
                JOIN prestasi p ON b.id_prestasi = p.id_prestasi";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getForLeaderboard() {
        $sql = "SELECT 
                    ROW_NUMBER() OVER (ORDER BY SUM(
                        CASE 
                            WHEN p.tingkat_lomba = 'internasional' THEN 3
                            WHEN p.tingkat_lomba = 'nasional' THEN 2
                            WHEN p.tingkat_lomba = 'lokal' THEN 1
                            ELSE 0
                        END
                    ) DESC) AS ranking,
                    m.nama_lengkap AS nama_mahasiswa,
                    m.prodi,
                    SUM(
                        CASE 
                            WHEN p.tingkat_lomba = 'internasional' THEN 3
                            WHEN p.tingkat_lomba = 'nasional' THEN 2
                            WHEN p.tingkat_lomba = 'lokal' THEN 1
                            ELSE 0
                        END
                    ) AS total_poin,
                    p.nama_kegiatan
                FROM 
                    Mahasiswa m
                JOIN 
                    Prestasi p ON m.nim = p.id_mahasiswa
                GROUP BY 
                    m.nama_lengkap, m.prodi, p.nama_kegiatan
                ORDER BY 
                    total_poin DESC;";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
