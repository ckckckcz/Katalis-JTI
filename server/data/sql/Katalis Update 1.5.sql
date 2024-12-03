use KATALIS_NEW;

CREATE TABLE Users (
    id_user INT PRIMARY KEY IDENTITY(1,1),
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    role VARCHAR(20) CHECK (role IN ('admin', 'mahasiswa')) NOT NULL
);


-- Membuat tabel Dosen
CREATE TABLE Dosen (
    nidn VARCHAR(20) PRIMARY KEY,
    nama_lengkap VARCHAR(255) NOT NULL,
	jurusan VARCHAR (50) NOT NULL
);


-- Membuat tabel Mahasiswa
CREATE TABLE Mahasiswa (
    nim VARCHAR(10) PRIMARY KEY,
    nama_lengkap VARCHAR(255) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    tahun_angkatan date NOT NULL,
    status_mahasiswa VARCHAR(20) DEFAULT 'aktif' CHECK (status_mahasiswa IN ('aktif', 'nonaktif'))
);

-- Membuat tabel Admin
CREATE TABLE Admin (
    nip VARCHAR(255) PRIMARY KEY,
    nama_lengkap VARCHAR(50) NOT NULL
);

-- Membuat tabel Kegiatan
CREATE TABLE Kegiatan (
	id_kegiatan INT PRIMARY KEY IDENTITY(1,1),
    nama_kegiatan VARCHAR(100) NOT NULL,
    jenis_kegiatan VARCHAR(20) CHECK (jenis_kegiatan IN ('akademik', 'non_akademik')) NOT NULL,
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
	lokasi VARCHAR(255),
    deskripsi TEXT
);

-- Membuat tabel Prestasi
CREATE TABLE Prestasi (
    id_prestasi INT PRIMARY KEY IDENTITY(1,1),
    id_mahasiswa VARCHAR(10),
    id_kegiatan INT,
    id_dosen VARCHAR(20), -- Mengubah tipe data menjadi VARCHAR(20)
    peringkat INT,
    file_karya VARCHAR(255),
    file_poster VARCHAR(255),
    file_dokumentasi VARCHAR(255),
    file_sertifikat VARCHAR(255),
    dibuat_pada DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(nim) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_kegiatan) REFERENCES Kegiatan(id_kegiatan) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_dosen) REFERENCES Dosen(nidn) ON DELETE CASCADE ON UPDATE CASCADE
);


-- Membuat tabel Event
CREATE TABLE Event (
    id_event INT PRIMARY KEY IDENTITY(1,1),
    nama_event VARCHAR(100) NOT NULL,
    tingkat_lomba VARCHAR(20) CHECK (tingkat_lomba IN ('lokal', 'nasional', 'internasional')) NOT NULL,
	instansi_penyelenggara VARCHAR (255),
    deskripsi TEXT,
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    url_event VARCHAR(255),
    poster_gambar VARCHAR(255),
	dibuat_pada DATETIME DEFAULT GETDATE()
	);

-- Membuat tabel Berita
CREATE TABLE Berita (
    id_berita INT PRIMARY KEY IDENTITY(1,1),
    id_prestasi INT,
    nama_berita VARCHAR(255) NOT NULL,
    deskripsi TEXT,
	url_demo VARCHAR (1025) NOT NULL,
	tanggal_upload DATETIME DEFAULT GETDATE(),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Mengisi tabel Users
INSERT INTO Users (username, password, role) VALUES
('2024005', 'password1', 'admin'),
('2024001', 'password2', 'admin'),
('0987654321', 'password3', 'mahasiswa'),
('1234567890', 'password4', 'mahasiswa'),
('2233445566', 'password5', 'mahasiswa');

-- Mengisi tabel Mahasiswa
INSERT INTO Mahasiswa (nim, nama_lengkap, prodi, tahun_angkatan, status_mahasiswa) VALUES
('1234567890', 'Cakra Wangsa M.A.W', 'Teknik Informatika', '2024-09-01', 'aktif'),
('0987654321', 'Galung Erlyan Tama', 'Teknik Informatika', '2024-09-01', 'aktif'),
('1122334455', 'Naditya P A', 'Teknik Informatika', '2024-09-01', 'aktif'),
('2233445566', 'Riovaldo Alfiyan F R', 'Teknik Informatika', '2024-09-01', 'aktif'),
('3344556677', 'Roy Wijaya', 'Teknik Informatika', '2024-09-01', 'aktif');

-- Mengisi tabel Admin
INSERT INTO Admin (nip, nama_lengkap) VALUES
('2024001', 'Agus Prasetyo'),
('2024002', 'Rina Kusuma'),
('2024003', 'Bambang Sugiarto'),
('2024004', 'Siti Aminah'),
('2024005', 'Doni Wahyudi');

-- Mengisi tabel Dosen
INSERT INTO Dosen (nidn, nama_lengkap, jurusan) VALUES
('3012345678', 'Dr. Sutrisno', 'Teknik Informatika'),
('3012345679', 'Dr. Budi', 'Teknik Informatika'),
('3012345680', 'Dr. Sari', 'Teknologi Informasi');

-- Mengisi tabel Kegiatan
INSERT INTO Kegiatan (nama_kegiatan, jenis_kegiatan, tanggal_mulai, tanggal_selesai, tingkat_lomba, lokasi, deskripsi) VALUES
('AI Innovation Challenge', 'akademik', '2024-05-10', '2024-05-15', 'nasional', 'Jakarta', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.'),
('Intuitiva UI UX Competition', 'akademik', '2024-01-05', '2024-01-08', 'nasional', 'Malang', 'Prestasi luar biasa oleh mahasiswa Teknik Informatika.'),
('FESIFO 2.0', 'akademik', '2024-03-20', '2024-03-25', 'nasional', 'Garut', 'Prestasi membanggakan oleh mahasiswa Teknologi Informasi.');

-- Mengisi tabel Prestasi
INSERT INTO Prestasi (id_mahasiswa, id_kegiatan, id_dosen, peringkat, file_karya, file_poster, file_dokumentasi, file_sertifikat) VALUES
('1234567890', 1, '3012345678', 1, 'Sqill Quest.pdf', 'AI Innovation Challenge_2024.jpg', 'dokumentasi AI Innovation Challenge.jpg', 'sertif AI Innovation Challenge.jpg'),
('0987654321', 2, '3012345679', 2, 'Pintar Path.pdf', 'Intuitiva UI UX Competition_2024.jpg', 'dokumentasi Intuitiva UI UX Competition.jpg', 'sertif Intuitiva UI UX Competition.jpg'),
('1122334455', 3, '3012345680', 3, 'ReWear.pdf', 'FESIFO 2.0_2024.jpg', 'dokumentasi FESIFO 2.0.jpg', 'sertif FESIFO 2.0.jpg');


-- Mengisi tabel Event 
INSERT INTO Event (nama_event, tingkat_lomba, instansi_penyelenggara, deskripsi, tanggal_mulai, tanggal_selesai, url_event, poster_gambar) VALUES
('Lomba Pemrograman Nasional', 'nasional', 'Kemenristek', 'Lomba Pemrograman Tingkat Nasional', '2024-05-10', '2024-05-15', 'https://lomba1.com', 'AI Innovation Challenge.jpg'),
('Lomba Pemrograman Lokal', 'lokal', 'Komunitas Pemrograman', 'Lomba Pemrograman Tingkat Lokal', '2024-03-01', '2024-03-03', 'https://lomba2.com', 'Intuitiva UI UX Competition.jpg'),
('Lomba Pemrograman Universitas', 'nasional', 'Universitas A', 'Lomba Pemrograman Tingkat Universitas', '2024-06-20', '2024-06-25', 'https://lomba3.com', 'FESIFO 2.0.jpg');

-- Mengisi tabel Berita
INSERT INTO Berita (id_prestasi, nama_berita, deskripsi, url_demo) VALUES
(1, 'Mahasiswa Raih Juara 2 AI Innovation Challenge', 'Prestasi gemilang oleh mahasiswa Teknik Informatika.', 'https://youtu.be/oaYWN9_gLzk?si=a0J-4dT05GALLbQJ'),
(2, 'Mahasiswa Raih 10 Besar Intuitiva UI UX Competition', 'Prestasi luar biasa oleh mahasiswa Teknik Informatika.', 'https://www.youtube.com/live/aGNTJkomLu0?si=T6dexZLsxInHMqkJ'),
(3, 'Mahasiswa Raih 10 Besar FESIFO 2.0', 'Prestasi membanggakan oleh mahasiswa Teknologi Informasi.', 'https://youtu.be/VOXmSFzgI_s?si=OD5IA_lelDvEP8wK');

--Leaderboard
SELECT 
    ROW_NUMBER() OVER (ORDER BY SUM(
        CASE 
            WHEN k.tingkat_lomba = 'internasional' THEN 3
            WHEN k.tingkat_lomba = 'nasional' THEN 2
            WHEN k.tingkat_lomba = 'lokal' THEN 1
            ELSE 0
        END
    ) DESC) AS ranking,
    m.nama_lengkap AS nama_mahasiswa,
    m.prodi,
    SUM(
        CASE 
            WHEN k.tingkat_lomba = 'internasional' THEN 3
            WHEN k.tingkat_lomba = 'nasional' THEN 2
            WHEN k.tingkat_lomba = 'lokal' THEN 1
            ELSE 0
        END
    ) AS total_poin
FROM 
    Mahasiswa m
JOIN 
    Prestasi p ON m.nim = p.id_mahasiswa
JOIN
    Kegiatan k ON p.id_kegiatan = k.id_kegiatan
GROUP BY 
    m.nama_lengkap, m.prodi
ORDER BY 
    total_poin DESC;

--Filter Mawapres
SELECT *
FROM Prestasi
where DAY(dibuat_pada) BETWEEN 1 AND 30;

-- Export data Mawapres
SELECT 
    p.id_prestasi,
    m.nama_lengkap AS nama_mahasiswa,
    p.id_mahasiswa AS nim_mahasiswa,
    k.nama_kegiatan,
    k.jenis_kegiatan,
    k.tingkat_lomba,
    p.peringkat,
    k.lokasi,
    CONCAT(k.tanggal_mulai, ' s.d. ', k.tanggal_selesai) AS tanggal_mulai_tanggal_selesai,
    d.nama_lengkap AS dosen_pembimbing,
    k.deskripsi,
    p.dibuat_pada AS tanggal_dibuat
FROM 
    Prestasi p
JOIN 
    Mahasiswa m ON p.id_mahasiswa = m.nim
JOIN 
    Kegiatan k ON p.id_kegiatan = k.id_kegiatan
JOIN 
    Dosen d ON p.id_dosen = d.nidn;


-- Traffic Prestasi per Bulan
DECLARE @tahun INT = 2024;
DECLARE @bulan INT = 12;

SELECT 
    YEAR(p.dibuat_pada) AS tahun,
    MONTH(p.dibuat_pada) AS bulan,
    COUNT(p.id_prestasi) AS jumlah_prestasi,
    m.nama_lengkap AS nama_mahasiswa,
    k.nama_kegiatan,
    d.nama_lengkap AS dosen_pembimbing,
    p.peringkat,
    p.file_karya,
    p.file_poster,
    p.file_dokumentasi,
    p.file_sertifikat,
    p.dibuat_pada AS tanggal_dibuat
FROM 
    Prestasi p
JOIN 
    Mahasiswa m ON p.id_mahasiswa = m.nim
JOIN 
    Kegiatan k ON p.id_kegiatan = k.id_kegiatan
JOIN 
    Dosen d ON p.id_dosen = d.nidn
WHERE
    YEAR(p.dibuat_pada) = @tahun AND MONTH(p.dibuat_pada) = @bulan
GROUP BY 
    YEAR(p.dibuat_pada),
    MONTH(p.dibuat_pada),
    m.nama_lengkap,
    k.nama_kegiatan,
    d.nama_lengkap,
    p.peringkat,
    p.file_karya,
    p.file_poster,
    p.file_dokumentasi,
    p.file_sertifikat,
    p.dibuat_pada
ORDER BY 
    tahun, bulan;

