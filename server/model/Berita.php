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
                b.id_berita,
                p.file_dokumentasi, 
                b.nama_berita,
                b.deskripsi,
                b.tanggal_upload
                FROM berita b
                JOIN prestasi p ON b.id_prestasi = p.id_prestasi";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getForLeaderboard() {
        $sql = "SELECT DISTINCT
                ROW_NUMBER() OVER (ORDER BY total_poin DESC) AS ranking,
                nama_mahasiswa,
                prodi,
                total_poin
            FROM (
                SELECT 
                    m.nama_lengkap AS nama_mahasiswa,
                    m.prodi,
                    SUM(
                        CASE 
                            WHEN p.tingkat_lomba = 'internasional' AND p.peringkat = 1 THEN 6
                            WHEN p.tingkat_lomba = 'internasional' AND p.peringkat = 2 THEN 5
                            WHEN p.tingkat_lomba = 'internasional' AND p.peringkat = 3 THEN 4
                            WHEN p.tingkat_lomba = 'nasional' AND p.peringkat = 1 THEN 4
                            WHEN p.tingkat_lomba = 'nasional' AND p.peringkat = 2 THEN 3
                            WHEN p.tingkat_lomba = 'nasional' AND p.peringkat = 3 THEN 2
                            WHEN p.tingkat_lomba = 'lokal' AND p.peringkat = 1 THEN 2
                            WHEN p.tingkat_lomba = 'lokal' AND p.peringkat = 2 THEN 1
                            WHEN p.tingkat_lomba = 'lokal' AND p.peringkat = 3 THEN 0.5
                            ELSE 0
                        END
                    ) AS total_poin
                FROM 
                    Mahasiswa m
                JOIN 
                    Prestasi p ON m.nim = p.id_mahasiswa
                GROUP BY 
                    m.nama_lengkap, m.prodi
            ) AS Subquery
            ORDER BY 
                total_poin DESC;";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertBerita($value) {
        $sql = "INSERT INTO berita 
                (id_prestasi, nama_berita, deskripsi, url_demo)
                VALUES (?, ?, ?, ?)";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $value['id_prestasi']);
        $this->stmt->bindParam(2, $value['nama_berita']);
        $this->stmt->bindParam(3, $value['deskripsi']);
        $this->stmt->bindParam(4, $value['url_demo']);
        if ($this->stmt->execute()) {
            return true;  // Successfully inserted
        } else {
            return false; // Failed to insert
        }
    }

    function getById($id) {
        $sql = "SELECT 
                b.id_prestasi,
                'Juara ' + CONVERT(varchar, p.peringkat) + ' ' + p.nama_kegiatan as input_prestasi,
                p.file_dokumentasi,
                b.nama_berita,
                b.deskripsi,
                b.url_demo
                FROM prestasi p  
                JOIN berita b ON p.id_prestasi = b.id_prestasi
                WHERE b.id_berita = :id";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam('id', $id);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function editBerita($id, $value) {
        $sql = "UPDATE berita SET
                id_prestasi = ?,
                nama_berita = ?,
                deskripsi = ?,
                url_demo = ?
                WHERE id_berita = ?";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $value['id_prestasi']);
        $this->stmt->bindParam(2, $value['nama_berita']);
        $this->stmt->bindParam(3, $value['deskripsi']);
        $this->stmt->bindParam(4, $value['url_demo']);
        $this->stmt->bindParam(5, $id);
        if ($this->stmt->execute()) {
            return true;  // Successfully inserted
        } else {
            return false; // Failed to insert
        }
    }

    function deleteBerita($id) {
        $sql = "DELETE FROM berita WHERE id_berita = ?";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $id);
        $this->stmt->execute();
    }
}
