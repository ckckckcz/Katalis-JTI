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
                    p.id_prestasi,
                    m.nama_lengkap,
                    p.nama_kegiatan,
                    p.tingkat_lomba,
                    p.status_validasi
                FROM dbo.Prestasi p
                INNER JOIN dbo.Mahasiswa m ON p.id_mahasiswa = m.nim";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllByMhs($nim) {
        $sql = "SELECT
                    id_prestasi,
                    nama_kegiatan,
                    tingkat_lomba,
                    jenis_kegiatan,
                    peringkat,
                    status_validasi
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

    function getForDefaultExport() {
        $sql = "SELECT 
                    m.nama_lengkap AS nama_mahasiswa,
                    p.id_mahasiswa AS nim_mahasiswa,
                    p.jenis_kegiatan,
                    p.tingkat_lomba,
                    p.peringkat,
                    p.lokasi,
                    CONCAT(p.tanggal_mulai, ' s.d. ', p.tanggal_selesai) AS tanggal_mulai_tanggal_selesai,
                    p.deskripsi,
                    p.dibuat_pada AS tanggal_dibuat
                FROM Prestasi p
                JOIN Mahasiswa m ON p.id_mahasiswa = m.nim;";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getWithRangeDate($start, $end) {
        $sql = "SELECT 
                    m.nama_lengkap AS nama_mahasiswa,
                    p.id_mahasiswa AS nim_mahasiswa,
                    p.jenis_kegiatan,
                    p.tingkat_lomba,
                    p.peringkat,
                    p.lokasi,
                    CONCAT(p.tanggal_mulai, ' s.d. ', p.tanggal_selesai) AS tanggal_mulai_tanggal_selesai,
                    p.deskripsi,
                    p.dibuat_pada AS tanggal_dibuat
                FROM Prestasi p
                JOIN Mahasiswa m ON p.id_mahasiswa = m.nim
                WHERE p.dibuat_pada >= CONVERT(datetime, ?) 
                AND p.dibuat_pada <= CONVERT(datetime, ?);";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $start);
        $this->stmt->bindParam(2, $end);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllById($id) {
        $sql = "SELECT 
                d.nama_lengkap as dosen_pembimbing,
                p.id_prestasi,
                p.nama_kegiatan,
                p.id_dosen,
                p.jenis_kegiatan,
                p.tanggal_mulai,
                p.tanggal_selesai,
                p.tingkat_lomba,
                p.peringkat,
                p.lokasi,
                p.deskripsi,
                p.file_karya,
                p.file_poster,
                p.file_sertifikat,
                p.file_dokumentasi,
                p.surat_tugas,
                p.status_validasi
                FROM dbo.Prestasi p
                JOIN dbo.Dosen d ON p.id_dosen = d.nidn
                WHERE p.id_prestasi = :id";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam('id', $id);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } 

    function getLastId() {
        $sql = "SELECT TOP 1 id_prestasi
                FROM prestasi
                ORDER BY id_prestasi DESC";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $result = $this->stmt->fetchColumn();
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
                file_sertifikat,
                surat_tugas,
                status_validasi)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
        $this->stmt->bindParam(15, $value['status_validasi']);
        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }

    function getById($id) {
        $sql = "SELECT 
                *
                FROM prestasi 
                WHERE id_prestasi = :id";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam('id', $id);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updatePrestasi($value) {
        $sql = "UPDATE Prestasi SET 
                nama_kegiatan = ?,
                jenis_kegiatan = ?,
                tanggal_mulai = ?,
                tanggal_selesai = ?,
                tingkat_lomba = ?,
                peringkat = ?,
                lokasi = ?,
                deskripsi = ?,
                id_dosen = ?,
                file_karya = ?,
                file_poster = ?,
                file_dokumentasi = ?,
                file_sertifikat = ?,
                surat_tugas = ?,
                status_validasi = ?
                WHERE id_prestasi = ?";
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->bindParam(1, $value['nama_kegiatan']);
        $this->stmt->bindParam(2, $value['jenis_kegiatan']);
        $this->stmt->bindParam(3, $value['tanggal_mulai']);
        $this->stmt->bindParam(4, $value['tanggal_selesai']);
        $this->stmt->bindParam(5, $value['tingkat_lomba']);
        $this->stmt->bindParam(6, $value['peringkat']);
        $this->stmt->bindParam(7, $value['lokasi']);
        $this->stmt->bindParam(8, $value['deskripsi']);
        $this->stmt->bindParam(9, $value['id_dosen']);
        $this->stmt->bindParam(10, $value['file_karya']);
        $this->stmt->bindParam(11, $value['file_poster']);
        $this->stmt->bindParam(12, $value['file_dokumentasi']);
        $this->stmt->bindParam(13, $value['file_sertifikat']);
        $this->stmt->bindParam(14, $value['file_surat_tugas']);
        $this->stmt->bindParam(15, $value['status_validasi']);
        $this->stmt->bindParam(16, $value['id_prestasi']);
        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        };
    }
}