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

    function getWithRangeDate($start, $end) {
        $sql = "SELECT *
                FROM prestasi
                WHERE dibuat_pada >= CONVERT(datetime, ?) 
                AND dibuat_pada <= CONVERT(datetime, ?);";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $start);
        $this->stmt->bindParam(2, $end);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertPrestasi($value) {
        $sql = "INSERT INTO prestasi 
                (id_mahasiswa,
                nama_kegiatan,
                jenis_kegiatan,
                tanggal_mulai,
                tanggal_selesai,
                tingkat_lomba,
                peringkat,
                lokasi,
                deskripsi,
                dosen_pembimbing,
                file_karya,
                file_poster,
                file_dokumentasi,
                file_sertifikat)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $value['id_mahasiswa']);
        $this->stmt->bindParam(2, $value['nama_kegiatan']);
        $this->stmt->bindParam(3, $value['jenis_kegiatan']);
        $this->stmt->bindParam(4, $value['tanggal_mulai']);
        $this->stmt->bindParam(5, $value['tanggal_selesai']);
        $this->stmt->bindParam(6, $value['tingkat_lomba']);
        $this->stmt->bindParam(7, $value['peringkat']);
        $this->stmt->bindParam(8, $value['lokasi']);
        $this->stmt->bindParam(9, $value['deskripsi']);
        $this->stmt->bindParam(10, $value['dosen_pembimbing']);
        $this->stmt->bindParam(11, $value['file_karya']);
        $this->stmt->bindParam(12, $value['file_poster']);
        $this->stmt->bindParam(13, $value['file_dokumentasi']);
        $this->stmt->bindParam(14, $value['file_sertifikat']);
        $this->stmt->execute();
    }
}