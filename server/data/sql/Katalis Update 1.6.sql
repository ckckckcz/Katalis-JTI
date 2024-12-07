CREATE TABLE Users (
    id_user INT PRIMARY KEY IDENTITY(1,1),
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    role VARCHAR(20) CHECK (role IN ('admin', 'mahasiswa')) NOT NULL
);

CREATE TABLE Mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    tahun_angkatan date NOT NULL,
    status_mahasiswa VARCHAR(20) DEFAULT 'aktif' CHECK (status_mahasiswa IN ('aktif', 'nonaktif'))
);

CREATE TABLE Dosen (
	nidn VARCHAR(20) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL,
    Jurusan VARCHAR(100) NOT NULL
);

CREATE TABLE Admin (
    nip VARCHAR(20) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL
);

CREATE TABLE Event (
    id_event INT PRIMARY KEY IDENTITY(1,1),
    nama_event VARCHAR(100) NOT NULL,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
	instansi_penyelenggara VARCHAR (255)NOT NULL,
    deskripsi TEXT,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    url_event VARCHAR(255) NOT NULL,
    poster_gambar VARCHAR(255) NOT NULL,
	dibuat_pada DATETIME DEFAULT GETDATE()
	);

CREATE TABLE Prestasi (
    id_prestasi INT PRIMARY KEY IDENTITY(1,1),
    id_mahasiswa VARCHAR(20),
	id_dosen VARCHAR (20),
    nama_kegiatan VARCHAR(100) NOT NULL,
    jenis_kegiatan VARCHAR(20) CHECK (jenis_kegiatan IN ('akademik', 'non_akademik')) NOT NULL,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
    peringkat INT NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    file_karya VARCHAR(255) NOT NULL UNIQUE,
    file_poster VARCHAR(255) NOT NULL,
    file_dokumentasi VARCHAR(255) NOT NULL,
    file_sertifikat VARCHAR(255)NOT NULL,
	surat_tugas VARCHAR (255) NOT NULL,
	status_validasi VARCHAR(20) CHECK (status_validasi IN ('proses_validasi', 'tidak_divalidasi', 'data_tervalidasi')) NOT NULL,
	dibuat_pada DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(nim) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_dosen) REFERENCES Dosen(nidn) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Berita (
    id_berita INT PRIMARY KEY IDENTITY(1,1),
    id_prestasi INT,
    nama_berita VARCHAR(255) NOT NULL,
    deskripsi TEXT,
	url_demo VARCHAR (1025) NOT NULL,
	tanggal_upload DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Users (username, password, role) VALUES
('2024005', 'password1', 'admin'),
('2024001', 'password2', 'admin'),
('2341720032', 'password3', 'mahasiswa'),
('2341720054', 'password4', 'mahasiswa'),
('24410702300', 'password5', 'mahasiswa');


INSERT INTO Mahasiswa (nim, nama_lengkap, prodi, tahun_angkatan, status_mahasiswa) VALUES
('2341720032', 'Cakra Wangsa M.A.W', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2341720054', 'Galung Erlyan Tama', 'Teknik Informatika', '2024-09-01', 'aktif'),
('24410702300', 'Naditya P A', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2341720209', 'Riovaldo Alfiyan F R', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2341720120', 'Roy Wijaya', 'Teknik Informatika', '2024-09-01', 'aktif');


INSERT INTO Admin (nip, nama_lengkap) VALUES
('2024001', 'Agus Prasetyo'),
('2024002', 'Rina Kusuma'),
('2024003', 'Bambang Sugiarto'),
('2024004', 'Siti Aminah'),
('2024005', 'Doni Wahyudi');

INSERT INTO Dosen (nidn, nama_lengkap, jurusan) VALUES
('197903132008121002', 'Arief Prasetyo, S.Kom', 'Teknologi Informasi'),
('197305102008011010', 'Indra Dharma Wijaya, ST., MMT', 'Teknologi Informasi'),
('198211302014041001', 'Luqman Affandi, S.Kom., MMSI', 'Teknologi Informasi');

INSERT INTO Event (nama_event, tingkat_lomba, instansi_penyelenggara, deskripsi, tanggal_mulai, tanggal_selesai, url_event, poster_gambar) VALUES
('Lomba Pemrograman Nasional', 'nasional', 'Kemenristek', 'Lomba Pemrograman Tingkat Nasional', '2024-05-10', '2024-05-15', 'https://lomba1.com', 'AI Innovation Challenge.jpg'),
('Lomba Pemrograman Lokal', 'lokal', 'Komunitas Pemrograman', 'Lomba Pemrograman Tingkat Lokal', '2024-03-01', '2024-03-03', 'https://lomba2.com', 'Intuitiva UI UX Competition.jpg'),
('Lomba Pemrograman Universitas', 'nasional', 'Universitas A', 'Lomba Pemrograman Tingkat Universitas', '2024-06-20', '2024-06-25', 'https://lomba3.com', 'FESIFO 2.0.jpg');

INSERT INTO Prestasi (id_mahasiswa, id_dosen, nama_kegiatan, jenis_kegiatan, tanggal_mulai, tanggal_selesai, tingkat_lomba, peringkat, lokasi, deskripsi, file_karya, file_poster, file_dokumentasi, file_sertifikat, surat_tugas, status_validasi) VALUES
('2341720032', '197903132008121002', 'AI Innovation Challenge', 'akademik', '2024-05-10', '2024-05-15', 'nasional', 2, 'Jakarta', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', 'Sqill Quest.pdf', 'AI Innovation Challenge_2024.jpg', 'dokumentasi AI Innovation Challenge.jpg', 'sertif AI Innovation Challenge.jpg', 'surat_tugas_AI_Innovation_Challenge.pdf', 'proses_validasi'),
('2341720054', '197305102008011010', 'Intuitiva UI UX Competition', 'akademik', '2024-01-05', '2024-01-08', 'nasional', 0, 'Malang', 'Prestasi luar biasa oleh mahasiswa Teknik Informatika.', 'Pintar Path.pdf', 'Intuitiva UI UX Competition_2024.jpg', 'dokumentasi Intuitiva UI UX Competition.jpg', 'sertif Intuitiva UI UX Competition.jpg', 'surat_tugas_Intuitiva_UI_UX_Competition.pdf', 'proses_validasi'),
('24410702300', '198211302014041001', 'FESIFO 2.0', 'akademik', '2024-03-20', '2024-03-25', 'nasional', 0, 'Garut', 'Prestasi membanggakan oleh mahasiswa Teknologi Informasi.', 'ReWear.pdf', 'FESIFO 2.0_2024.jpg', 'dokumentasi FESIFO 2.0.jpg', 'sertif FESIFO 2.0.jpg', 'surat_tugas_FESIFO_2.0.pdf', 'proses_validasi');
	
INSERT INTO Berita (id_prestasi, nama_berita, deskripsi,url_demo) VALUES
(7, 'Mahasiswa Raih Juara 2 AI Innovation Challenge', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.','https://youtu.be/oaYWN9_gLzk?si=a0J-4dT05GALLbQJ'),
(8, 'Mahasiswa Raih 10 Besar Intuitiva UI UX Competition', 'Prestasi luar biasa oleh mahasiswa Teknik Informatika.','https://www.youtube.com/live/aGNTJkomLu0?si=T6dexZLsxInHMqkJ'),
(6, 'Mahasiswa Raih 10 Besar FESIFO 2.0 ', 'Prestasi membanggakan oleh mahasiswa Teknologi Informasi.', 'https://youtu.be/VOXmSFzgI_s?si=OD5IA_lelDvEP8wK');


--Leaderboard berdasarkan tingkatan kompetisi
SELECT DISTINCT
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
    total_poin DESC;

--export data Mawapres
SELECT 
    m.nama_lengkap AS nama_mahasiswa,
    p.id_mahasiswa AS nim_mahasiswa,
    p.jenis_kegiatan,
    p.tingkat_lomba,
    p.peringkat,
    p.lokasi,
    CONCAT(p.tanggal_mulai, ' s.d. ', p.tanggal_selesai) AS tanggal_mulai_tanggal_selesai,
    p.deskripsi,
    p.dibuat_pada AS tanggal_dibuat
FROM 
    Prestasi p
JOIN 
    Mahasiswa m ON p.id_mahasiswa = m.nim;

--Event detail
SELECT 
    nama_event, 
    tingkat_lomba, 
    instansi_penyelenggara, 
    deskripsi, 
    tanggal_mulai, 
    tanggal_selesai, 
    url_event, 
    poster_gambar
FROM Event

--Mahasiswa Detail
SELECT 
    Mahasiswa.nim, 
    Mahasiswa.nama_lengkap, 
    Mahasiswa.prodi,
	Mahasiswa.tahun_angkatan,
	Mahasiswa.status_mahasiswa,
	Prestasi.tingkat_lomba, 
    Prestasi.jenis_kegiatan, 
    Prestasi.peringkat, 
    Prestasi.file_karya
FROM Mahasiswa
INNER JOIN Prestasi ON Mahasiswa.nim = Prestasi.id_mahasiswa;

--traffic update
CREATE PROCEDURE GetTrafficPrestasiPerBulan
    @bulan INT,
    @tahun INT
AS
BEGIN
    SELECT 
        CAST(p.dibuat_pada AS DATE) AS tanggal_input, 
        m.nama_lengkap AS mahasiswa_berprestasi,
        COUNT(p.id_prestasi) AS jumlah_prestasi,
        STRING_AGG(CONCAT('Juara ', p.peringkat, ' (', p.tingkat_lomba, ')'), ', ') AS daftar_juara 
    FROM Prestasi p
    JOIN Mahasiswa m ON p.id_mahasiswa = m.nim 
    WHERE MONTH(p.dibuat_pada) = @bulan AND YEAR(p.dibuat_pada) = @tahun
    GROUP BY CAST(p.dibuat_pada AS DATE), m.nama_lengkap
    ORDER BY tanggal_input, m.nama_lengkap;
END;

EXEC GetTrafficPrestasiPerBulan @bulan = 12, @tahun = 2024;
